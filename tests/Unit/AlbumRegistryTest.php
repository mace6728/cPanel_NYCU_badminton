<?php

namespace Tests;

use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../../src/Services/GalleryService.php';

/**
 * Guards the real config/albums.php against the real files in public/, so a typo
 * in a folder name, a deleted cover or a forgotten page file fails here, not live.
 */
final class AlbumRegistryTest extends TestCase
{
    private \GalleryService $gallery;
    private string $webRoot;

    protected function setUp(): void
    {
        $this->webRoot = __DIR__ . '/../../public';
        $this->gallery = new \GalleryService(require __DIR__ . '/../../config/albums.php', $this->webRoot);
    }

    public function testRegistryMatchesTheFilesOnDisk(): void
    {
        $this->assertSame([], $this->gallery->problems());
    }

    public function testEveryPageFileIsTheStandardOneLineStub(): void
    {
        $slugs = array_merge(array_keys($this->gallery->categories()), array_keys($this->gallery->albums()));
        $this->assertNotEmpty($slugs);

        foreach ($slugs as $slug) {
            $up = str_repeat('../', substr_count($slug, '/') + 2);
            $this->assertSame(
                "<?php\n// Gallery page: everything on it comes from config/albums.php (see templates/gallery/page.php).\n"
                . "require __DIR__ . '/{$up}templates/gallery/page.php';\n",
                file_get_contents("$this->webRoot/gallery/$slug.php"),
                "gallery/$slug.php was hand-edited or has the wrong depth; run `php bin/gallery.php stubs` for a new one"
            );
        }
    }
}
