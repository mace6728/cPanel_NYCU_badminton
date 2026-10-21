<?php

namespace Tests;

use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../../src/Services/GalleryService.php';

final class GalleryServiceTest extends TestCase
{
    private string $root;

    protected function setUp(): void
    {
        $this->root = sys_get_temp_dir() . '/gallery_test_' . bin2hex(random_bytes(4));
        mkdir($this->root . '/gallery/cup', 0777, true);
        mkdir($this->root . '/css');
        file_put_contents($this->root . '/css/sortGallery.min.css', '');
    }

    protected function tearDown(): void
    {
        $this->rmrf($this->root);
    }

    private function rmrf(string $path): void
    {
        if (is_dir($path) && !is_link($path)) {
            foreach (scandir($path) as $entry) {
                if ($entry !== '.' && $entry !== '..') {
                    $this->rmrf("$path/$entry");
                }
            }
            rmdir($path);
        } elseif (file_exists($path) || is_link($path)) {
            unlink($path);
        }
    }

    private function touch(string ...$files): void
    {
        foreach ($files as $file) {
            @mkdir(dirname("$this->root/$file"), 0777, true);
            file_put_contents("$this->root/$file", 'x');
        }
    }

    private function gallery(array $album = [], array $category = []): \GalleryService
    {
        return new \GalleryService(['categories' => ['cup' => $category + [
            'title' => '盃', 'cover' => 'img/cover.jpg', 'css' => 'sortGallery.min.css',
            'albums' => ['cup/2018' => $album + ['title' => '2018', 'cover' => 'img/cover.jpg', 'dir' => 'img/a']],
        ]]], $this->root);
    }

    private function names(\GalleryService $g): array
    {
        return array_column($g->photos('cup/2018'), 'name');
    }

    public function testListsImagesInNaturalOrder(): void
    {
        $this->touch('img/a/2.jpg', 'img/a/10.jpg', 'img/a/1.jpg');

        $this->assertSame(['1.jpg', '2.jpg', '10.jpg'], $this->names($this->gallery()));
    }

    public function testExtensionsAreCaseInsensitiveAndNonImagesAreIgnored(): void
    {
        $this->touch('img/a/a.JPG', 'img/a/b.png', 'img/a/c.WebP', 'img/a/notes.txt', 'img/a/Thumbs.db', 'img/a/.hidden.jpg', 'img/a/sub/d.jpg');

        $this->assertSame(['a.JPG', 'b.png', 'c.WebP'], $this->names($this->gallery()));
    }

    public function testExcludeHidesFilesAndOrderPutsThemFirst(): void
    {
        $this->touch('img/a/1.jpg', 'img/a/2.jpg', 'img/a/3.jpg', 'img/a/4.jpg');
        $g = $this->gallery(['exclude' => ['2.jpg'], 'order' => ['4.jpg', '1.jpg']]);

        $this->assertSame(['4.jpg', '1.jpg', '3.jpg'], $this->names($g));
    }

    public function testThumbnailLookupPrefersTnPrefixThenSameNameThenOriginal(): void
    {
        $this->touch('img/a/1.jpg', 'img/a/2.jpg', 'img/a/3.jpg', 'img/a/thumbnails/tn_1.jpg', 'img/a/thumbnails/2.jpg');
        $byName = array_column($this->gallery()->photos('cup/2018'), 'thumb', 'name');

        $this->assertSame('img/a/thumbnails/tn_1.jpg', $byName['1.jpg']);
        $this->assertSame('img/a/thumbnails/2.jpg', $byName['2.jpg']);
        $this->assertSame('img/a/3.jpg', $byName['3.jpg']);
    }

    public function testPhotosFromSeveralFoldersAreMerged(): void
    {
        $this->touch('img/a/big/1.jpg', 'img/a/small/2.jpg');
        $g = $this->gallery(['dir' => ['img/a/big', 'img/a/small']]);

        $this->assertSame(['img/a/big/1.jpg', 'img/a/small/2.jpg'], array_column($g->photos('cup/2018'), 'src'));
    }

    public function testAFolderOutsideTheWebRootIsRefused(): void
    {
        mkdir(dirname($this->root) . '/gallery_outside_' . basename($this->root));
        $g = $this->gallery(['dir' => '../gallery_outside_' . basename($this->root)]);

        try {
            $this->expectException(\RuntimeException::class);
            $g->photos('cup/2018');
        } finally {
            rmdir(dirname($this->root) . '/gallery_outside_' . basename($this->root));
        }
    }

    public function testUnknownAlbumHasNoPhotos(): void
    {
        $this->assertSame([], $this->gallery()->photos('nope/none'));
        $this->assertNull($this->gallery()->album('nope/none'));
        $this->assertNull($this->gallery()->category('nope'));
    }

    public function testAlbumsCarryTheirSlugAndCategory(): void
    {
        $album = $this->gallery()->album('cup/2018');

        $this->assertSame('cup/2018', $album['slug']);
        $this->assertSame('cup', $album['category']);
    }

    public function testUrlPathEncodesEachSegment(): void
    {
        $this->assertSame('img/2017%20%2869%29.JPG', \GalleryService::urlPath('img/2017 (69).JPG'));
        $this->assertSame('img/%E7%9B%83/a.jpg', \GalleryService::urlPath('img/盃/a.jpg'));
    }

    public function testSlugForScript(): void
    {
        $this->touch('gallery.php', 'gallery/cup.php', 'gallery/cup/2018.php', 'index.php', 'gallery/readme.txt');
        $g = $this->gallery();

        $this->assertSame('', $g->slugForScript("$this->root/gallery.php"));
        $this->assertSame('cup', $g->slugForScript("$this->root/gallery/cup.php"));
        $this->assertSame('cup/2018', $g->slugForScript("$this->root/gallery/cup/2018.php"));
        $this->assertNull($g->slugForScript("$this->root/index.php"));
        $this->assertNull($g->slugForScript("$this->root/gallery/readme.txt"));
        $this->assertNull($g->slugForScript('/etc/passwd'));
    }

    public function testFindWebRootWalksUpFromAnyGalleryScript(): void
    {
        $this->touch('gallery.php', 'gallery/cup.php', 'gallery/cup/2018.php');
        $root = realpath($this->root);

        $this->assertSame($root, \GalleryService::findWebRoot("$this->root/gallery.php"));
        $this->assertSame($root, \GalleryService::findWebRoot("$this->root/gallery/cup.php"));
        $this->assertSame($root, \GalleryService::findWebRoot("$this->root/gallery/cup/2018.php"));
        $this->assertNull(\GalleryService::findWebRoot(sys_get_temp_dir() . '/nowhere/x.php'));
    }

    private function healthy(): \GalleryService
    {
        $this->touch('img/cover.jpg', 'img/a/1.jpg', 'gallery/cup.php', 'gallery/cup/2018.php');

        return $this->gallery();
    }

    public function testProblemsIsEmptyForAConsistentSetup(): void
    {
        $this->assertSame([], $this->healthy()->problems());
    }

    public function testProblemsReportsEachKindOfMistake(): void
    {
        $this->healthy();
        $broken = [
            'missing cover'       => [['cover' => 'img/nope.jpg'], [], 'cover not found'],
            'missing folder'      => [['dir' => 'img/nowhere'], [], 'not found or outside'],
            'stale exclude'       => [['exclude' => ['gone.jpg']], [], "'exclude' names a file"],
            'stale order'         => [['order' => ['gone.jpg']], [], "'order' names a file"],
            'empty title'         => [['title' => ''], [], 'has no title'],
            'missing stylesheet'  => [[], ['css' => 'nope.css'], 'stylesheet not found'],
            'missing category pg' => [[], ['cover' => 'img/nope.jpg'], "category 'cup': cover not found"],
        ];

        foreach ($broken as $label => [$album, $category, $expected]) {
            $problems = implode("\n", $this->gallery($album, $category)->problems());
            $this->assertStringContainsString($expected, $problems, $label);
        }
    }

    public function testProblemsReportsAnAlbumWithNoPhotosAndMissingOrStrayPages(): void
    {
        $this->healthy();
        unlink("$this->root/img/a/1.jpg");
        $this->assertStringContainsString('shows no photos', implode("\n", $this->gallery()->problems()));

        $this->touch('img/a/1.jpg', 'gallery/cup/stray.php');
        unlink("$this->root/gallery/cup/2018.php");
        $problems = implode("\n", $this->gallery()->problems());
        $this->assertStringContainsString('page file not found: gallery/cup/2018.php', $problems);
        $this->assertStringContainsString('gallery/cup/stray.php has no entry', $problems);
    }
}
