<?php
/** gallery/<category>.php: one card per album in the category. Set up by page.php. */
require __DIR__ . '/../partials/head.php';
$activePage = 'gallery';
require __DIR__ . '/../partials/navbar.php';

require __DIR__ . '/_header.php';

$cards = [];
foreach ($category['albums'] ?? [] as $albumSlug => $a) {
    // The album page lives at gallery/<albumSlug>.php; this page is gallery/<category>.php.
    $cards[] = ['cover' => $a['cover'], 'title' => $a['card'] ?? $a['title'], 'href' => $albumSlug . '.php'];
}
require __DIR__ . '/_cards.php';

$extraScripts = '    <script src="' . $e($basePath) . 'js/blog.js"></script>' . "\n";
require __DIR__ . '/../partials/footer.php';
