<?php
/**
 * Maintenance tool for the photo albums. Run from the repository root:
 *
 *   php bin/gallery.php check            list problems in config/albums.php (exit 1 if any)
 *   php bin/gallery.php thumbs [--dry]   create thumbnails for photos that have none
 *   php bin/gallery.php stubs  [--dry]   create the one-line page file of any new album
 *
 * `thumbs` needs PHP's GD extension. Run it on your own machine, then commit the
 * new thumbnails with the photos; the web server never generates anything.
 */
if (PHP_SAPI !== 'cli') {
    http_response_code(404);
    exit;
}

require __DIR__ . '/../src/Services/GalleryService.php';

const THUMB_WIDTH = 300;
const THUMB_QUALITY = 82;

$webRoot = __DIR__ . '/../public';
$gallery = new GalleryService(require __DIR__ . '/../config/albums.php', $webRoot);
$command = $argv[1] ?? '';
$dry = in_array('--dry', $argv, true);

switch ($command) {
    case 'check':
        $problems = $gallery->problems();
        foreach ($problems as $problem) {
            echo "- $problem\n";
        }
        echo $problems === [] ? "OK: albums.php is consistent with the files on disk.\n" : count($problems) . " problem(s).\n";
        exit($problems === [] ? 0 : 1);

    case 'stubs':
        $slugs = array_merge(array_keys($gallery->categories()), array_keys($gallery->albums()));
        $created = 0;
        foreach ($slugs as $slug) {
            $file = "$webRoot/gallery/$slug.php";
            if (is_file($file)) {
                continue;
            }
            echo ($dry ? 'would create ' : 'creating ') . "public/gallery/$slug.php\n";
            if (!$dry) {
                if (!is_dir(dirname($file))) {
                    mkdir(dirname($file), 0755, true);
                }
                // gallery/<slug>.php sits (substr_count(slug, '/') + 2) levels below the repo's public/..
                $up = str_repeat('../', substr_count($slug, '/') + 2);
                file_put_contents($file, "<?php\n// Gallery page: everything on it comes from config/albums.php (see templates/gallery/page.php).\n"
                    . "require __DIR__ . '/{$up}templates/gallery/page.php';\n");
            }
            $created++;
        }
        echo "$created page file(s) " . ($dry ? 'to create' : 'created') . ".\n";
        break;

    case 'thumbs':
        if (!extension_loaded('gd')) {
            fwrite(STDERR, "The GD extension is required.\n");
            exit(2);
        }
        $made = 0;
        foreach ($gallery->albums() as $album) {
            foreach ((array) $album['dir'] as $dir) {
                foreach (scandir("$webRoot/$dir") as $name) {
                    $source = "$webRoot/$dir/$name";
                    if ($name[0] === '.' || !is_file($source) || !preg_match('/\.(jpe?g|png|gif|webp)$/i', $name)) {
                        continue;
                    }
                    // Any existing thumbnail, under either naming convention, counts.
                    if (is_file("$webRoot/$dir/thumbnails/tn_$name") || is_file("$webRoot/$dir/thumbnails/$name")) {
                        continue;
                    }
                    echo ($dry ? 'would create ' : 'creating ') . "$dir/thumbnails/tn_$name\n";
                    if (!$dry) {
                        if (!is_dir("$webRoot/$dir/thumbnails")) {
                            mkdir("$webRoot/$dir/thumbnails", 0755);
                        }
                        if (!makeThumbnail($source, "$webRoot/$dir/thumbnails/tn_$name")) {
                            fwrite(STDERR, "  skipped $dir/$name: not a readable JPEG/PNG/GIF/WebP (an iPhone HEIC renamed to .jpg?)\n");
                            continue;
                        }
                    }
                    $made++;
                }
            }
        }
        echo "$made thumbnail(s) " . ($dry ? 'to create' : 'created') . ".\n";
        break;

    default:
        fwrite(STDERR, "Usage: php bin/gallery.php check|thumbs|stubs [--dry]\n");
        exit(2);
}

function makeThumbnail(string $source, string $target): bool
{
    $info = @getimagesize($source);
    if ($info === false) {
        return false;
    }
    $image = match ($info[2]) {
        IMAGETYPE_JPEG => @imagecreatefromjpeg($source),
        IMAGETYPE_PNG  => @imagecreatefrompng($source),
        IMAGETYPE_GIF  => @imagecreatefromgif($source),
        IMAGETYPE_WEBP => @imagecreatefromwebp($source),
        default        => false,
    };
    if ($image === false) {
        return false;
    }

    // Browsers rotate photos by their EXIF tag; a resized copy loses the tag, so apply it now.
    if ($info[2] === IMAGETYPE_JPEG && function_exists('exif_read_data')) {
        $orientation = @exif_read_data($source)['Orientation'] ?? 1;
        $angle = [3 => 180, 6 => -90, 8 => 90][$orientation] ?? 0;
        if ($angle !== 0) {
            $image = imagerotate($image, $angle, 0);
        }
    }

    $width = imagesx($image);
    $height = imagesy($image);
    $newWidth = min(THUMB_WIDTH, $width);
    $newHeight = (int) round($height * $newWidth / $width);
    $thumb = imagecreatetruecolor($newWidth, $newHeight);
    if ($info[2] === IMAGETYPE_PNG || $info[2] === IMAGETYPE_GIF || $info[2] === IMAGETYPE_WEBP) {
        imagealphablending($thumb, false);
        imagesavealpha($thumb, true);
    }
    imagecopyresampled($thumb, $image, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);

    return match ($info[2]) {
        IMAGETYPE_PNG  => imagepng($thumb, $target),
        IMAGETYPE_GIF  => imagegif($thumb, $target),
        IMAGETYPE_WEBP => imagewebp($thumb, $target, THUMB_QUALITY),
        default        => imagejpeg($thumb, $target, THUMB_QUALITY),
    };
}
