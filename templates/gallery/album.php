<?php
/** gallery/<category>/<name>.php: the photos of one album. Set up by page.php. */
$extraHead = '    <link rel="stylesheet" href="' . $e($basePath) . 'css/baguetteBox.min.css">' . "\n";
require __DIR__ . '/../partials/head.php';
$activePage = 'gallery';
require __DIR__ . '/../partials/navbar.php';

// Album titles are long ("2017香港城市大學友誼賽"); the wider banner keeps them on one line.
$heroColumns = 'col-lg-10 col-lg-offset-1 col-md-12';
require __DIR__ . '/_header.php';

$photos = $gallery->photos($album['slug']);
?>
    <div class="content" oncontextmenu="return false;">
<?php if ($photos === []): ?>
        <p class="text-center">目前沒有照片</p>
<?php else: ?>
        <div class="baguetteBoxOne gallery">
<?php foreach ($photos as $photo): ?>
            <a href="<?= $e($basePath . GalleryService::urlPath($photo['src'])) ?>"><img src="<?= $e($basePath . GalleryService::urlPath($photo['thumb'])) ?>" alt="" loading="lazy"></a>
<?php endforeach; ?>
        </div>
<?php endif; ?>
    </div>

<?php
$extraScripts = '    <script src="' . $e($basePath) . 'js/baguetteBox.min.js"></script>' . "\n"
    . '    <script src="' . $e($basePath) . 'js/album.js"></script>' . "\n";
require __DIR__ . '/../partials/footer.php';
