<?php
/** gallery.php: one card per category. Set up by page.php. */
require __DIR__ . '/../partials/head.php';
$activePage = 'gallery';
require __DIR__ . '/../partials/navbar.php';

require __DIR__ . '/_header.php';

$cards = [];
foreach ($gallery->categories() as $categorySlug => $cat) {
    $cards[] = ['cover' => $cat['cover'], 'title' => $cat['title'], 'href' => 'gallery/' . $categorySlug . '.php'];
}
require __DIR__ . '/_cards.php';

$extraScripts = '    <script src="js/blog.js"></script>' . "\n";
require __DIR__ . '/../partials/footer.php';
