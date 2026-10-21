<?php
/**
 * Photo albums, driven by the folders on disk.
 *
 * config/albums.php says which albums exist (title, folder, cover); the photos
 * themselves are whatever image files sit in the album's folder, so adding a
 * photo means copying a file, never editing a page. See README ("Photo albums").
 *
 * All paths handled here are relative to the web root, e.g. "img/jinzhu/2017".
 */
class GalleryService
{
    private const IMAGE_EXTENSIONS = ['jpg', 'jpeg', 'png', 'gif', 'webp'];

    /** Thumbnail naming conventions found in the existing albums, in lookup order. */
    private const THUMBNAIL_PREFIXES = ['tn_', ''];

    private array $registry;
    private string $webRoot;

    public function __construct(array $registry, string $webRoot)
    {
        $this->registry = $registry;
        $this->webRoot = rtrim($webRoot, '/\\');
    }

    /** @return array<string, array> category slug => category (with its own 'slug') */
    public function categories(): array
    {
        $out = [];
        foreach ($this->registry['categories'] ?? [] as $slug => $category) {
            $out[$slug] = ['slug' => $slug] + $category;
        }

        return $out;
    }

    public function category(string $slug): ?array
    {
        return $this->categories()[$slug] ?? null;
    }

    /** @return array<string, array> album slug => album, across every category */
    public function albums(): array
    {
        $out = [];
        foreach ($this->categories() as $categorySlug => $category) {
            foreach ($category['albums'] ?? [] as $slug => $album) {
                $out[$slug] = ['slug' => $slug, 'category' => $categorySlug] + $album;
            }
        }

        return $out;
    }

    public function album(string $slug): ?array
    {
        return $this->albums()[$slug] ?? null;
    }

    /**
     * The photos of an album in display order.
     *
     * @return array<int, array{src:string, thumb:string, name:string}>
     *         `thumb` falls back to `src` when the photo has no thumbnail yet.
     */
    public function photos(string $albumSlug): array
    {
        $album = $this->album($albumSlug);
        if ($album === null) {
            return [];
        }

        $exclude = array_flip($album['exclude'] ?? []);
        $photos = [];
        foreach ((array) $album['dir'] as $dir) {
            $absolute = $this->resolveDir($dir);
            foreach (scandir($absolute) ?: [] as $name) {
                if (!$this->isImage($absolute . '/' . $name) || isset($exclude[$name])) {
                    continue;
                }
                $photos[] = [
                    'src'   => $dir . '/' . $name,
                    'thumb' => $this->thumbnailFor($dir, $name),
                    'name'  => $name,
                ];
            }
        }

        usort($photos, static fn(array $a, array $b): int => strnatcasecmp($a['src'], $b['src']));

        return $this->applyOrder($photos, $album['order'] ?? []);
    }

    /**
     * Everything wrong with the registry as it stands: missing folders, covers
     * or stylesheets, stale `exclude`/`order` names, empty albums, and page files
     * that have no registry entry (or entries with no page file). Empty = healthy.
     *
     * @return string[]
     */
    public function problems(): array
    {
        $problems = [];
        $pages = [];

        foreach ($this->categories() as $slug => $category) {
            $pages[$slug] = true;
            $where = "category '$slug'";
            $this->expectFile($problems, $where, 'cover', $category['cover'] ?? '');
            $this->expectFile($problems, $where, 'stylesheet', 'css/' . ($category['css'] ?? ''));
            $this->expectFile($problems, $where, 'page file', "gallery/$slug.php");
            if (($category['title'] ?? '') === '') {
                $problems[] = "$where has no title";
            }
        }

        foreach ($this->albums() as $slug => $album) {
            $pages[$slug] = true;
            $where = "album '$slug'";
            $this->expectFile($problems, $where, 'cover', $album['cover'] ?? '');
            $this->expectFile($problems, $where, 'page file', "gallery/$slug.php");
            if (($album['title'] ?? '') === '') {
                $problems[] = "$where has no title";
            }

            try {
                $names = [];
                foreach ((array) ($album['dir'] ?? []) as $dir) {
                    $absolute = $this->resolveDir($dir);
                    $names = array_merge($names, array_filter(scandir($absolute) ?: [], fn($n) => $this->isImage("$absolute/$n")));
                }
                if ($this->photos($slug) === []) {
                    $problems[] = "$where shows no photos";
                }
                foreach (['exclude', 'order'] as $key) {
                    foreach (array_diff($album[$key] ?? [], $names) as $stale) {
                        $problems[] = "$where: '$key' names a file that is not in the folder: $stale";
                    }
                }
            } catch (RuntimeException $e) {
                $problems[] = "$where: " . $e->getMessage();
            }
        }

        $galleryDir = $this->webRoot . '/gallery';
        if (is_dir($galleryDir)) {
            $files = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($galleryDir, FilesystemIterator::SKIP_DOTS));
            foreach ($files as $file) {
                if ($file->getExtension() === 'php') {
                    $slug = substr(str_replace('\\', '/', $file->getPathname()), strlen($galleryDir) + 1, -4);
                    if (!isset($pages[$slug])) {
                        $problems[] = "gallery/$slug.php has no entry in config/albums.php";
                    }
                }
            }
        }

        return $problems;
    }

    private function expectFile(array &$problems, string $where, string $what, string $path): void
    {
        if ($path === '' || !is_file($this->webRoot . '/' . $path)) {
            $problems[] = "$where: $what not found: $path";
        }
    }

    /**
     * The web root, found by walking up from a gallery script until the folder that
     * holds gallery.php and gallery/. Independent of the server's DOCUMENT_ROOT,
     * which differs between hosts, proxies and symlinked document roots.
     */
    public static function findWebRoot(string $scriptFilename): ?string
    {
        $dir = realpath(dirname($scriptFilename));
        while ($dir !== false && $dir !== dirname($dir)) {
            if (is_file($dir . '/gallery.php') && is_dir($dir . '/gallery')) {
                return $dir;
            }
            $dir = dirname($dir);
        }

        return null;
    }

    /** Encode a web-root-relative path for use in an href/src ("a b/1.jpg" -> "a%20b/1.jpg"). */
    public static function urlPath(string $path): string
    {
        return implode('/', array_map('rawurlencode', explode('/', $path)));
    }

    /**
     * Which registry page a script file serves: "" for gallery.php, "jinzhu" for
     * gallery/jinzhu.php, "jinzhu/2017jinzhu" for gallery/jinzhu/2017jinzhu.php.
     * Returns null for a script outside gallery.php / gallery/.
     */
    public function slugForScript(string $scriptFilename): ?string
    {
        $root = realpath($this->webRoot);
        $script = realpath($scriptFilename);
        if ($root === false || $script === false || strncmp($script, $root . DIRECTORY_SEPARATOR, strlen($root) + 1) !== 0) {
            return null;
        }

        $relative = str_replace(DIRECTORY_SEPARATOR, '/', substr($script, strlen($root) + 1));
        if ($relative === 'gallery.php') {
            return '';
        }
        if (strncmp($relative, 'gallery/', 8) !== 0 || substr($relative, -4) !== '.php') {
            return null;
        }

        return substr($relative, 8, -4);
    }

    /** Absolute path of an album folder, refusing anything outside the web root. */
    private function resolveDir(string $dir): string
    {
        $root = realpath($this->webRoot);
        $absolute = realpath($this->webRoot . '/' . $dir);

        if ($root === false || $absolute === false || !is_dir($absolute)
            || strncmp($absolute, $root . DIRECTORY_SEPARATOR, strlen($root) + 1) !== 0) {
            throw new RuntimeException("Album folder not found or outside the web root: $dir");
        }

        return $absolute;
    }

    private function isImage(string $path): bool
    {
        $name = basename($path);

        return $name[0] !== '.'
            && is_file($path)
            && in_array(strtolower(pathinfo($name, PATHINFO_EXTENSION)), self::IMAGE_EXTENSIONS, true);
    }

    private function thumbnailFor(string $dir, string $name): string
    {
        foreach (self::THUMBNAIL_PREFIXES as $prefix) {
            $candidate = $dir . '/thumbnails/' . $prefix . $name;
            if (is_file($this->webRoot . '/' . $candidate)) {
                return $candidate;
            }
        }

        return $dir . '/' . $name;
    }

    /** Photos named in `$order` come first, in that order; the rest keep their natural order. */
    private function applyOrder(array $photos, array $order): array
    {
        if ($order === []) {
            return $photos;
        }

        $rank = array_flip($order);
        usort($photos, static function (array $a, array $b) use ($rank): int {
            return ($rank[$a['name']] ?? PHP_INT_MAX) <=> ($rank[$b['name']] ?? PHP_INT_MAX);
        });

        return $photos;
    }
}
