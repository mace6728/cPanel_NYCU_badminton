<?php
/**
 * Single entry point for gallery.php and everything under gallery/. Each of
 * those public files is a one-line stub that requires this file; which page to
 * show comes from the stub's own file name, looked up in config/albums.php
 * (never from the request, so there is nothing a visitor can steer).
 *
 *   gallery.php                    all categories
 *   gallery/<category>.php         the albums of one category
 *   gallery/<category>/<name>.php  one album's photos
 */
require_once __DIR__ . '/../../src/Services/GalleryService.php';

$webRoot = GalleryService::findWebRoot($_SERVER['SCRIPT_FILENAME']);
if ($webRoot === null) {
    http_response_code(500);
    exit('Gallery misconfigured: cannot locate the web root.');
}
$gallery = new GalleryService(require __DIR__ . '/../../config/albums.php', $webRoot);

$slug = $gallery->slugForScript($_SERVER['SCRIPT_FILENAME']);
$category = $slug === null || $slug === '' ? null : $gallery->category($slug);
$album = $slug === null || $slug === '' ? null : $gallery->album($slug);

if ($slug === null || ($slug !== '' && $category === null && $album === null)) {
    http_response_code(404);
    readfile($webRoot . '/404.shtml');
    exit;
}

// Relative prefix back to the web root, as the head/navbar/footer partials expect.
$basePath = str_repeat('../', substr_count($slug, '/') + ($slug === '' ? 0 : 1));

$e = static fn(string $s): string => htmlspecialchars($s, ENT_QUOTES, 'UTF-8');
$brand = '國立陽明交通大學羽球隊 NYCU Badminton';
$keywords = '國立陽明交通大學羽球隊 · 交大羽球隊 · NYCU Badminton';

if ($slug === '') {
    $heading = '活動照片';
    $pageTitle = $e($heading . ' | ' . $brand);
    $pageDescription = $e($keywords . ' · ' . $heading);
    $pageCss = 'sortGallery.min.css';
    require __DIR__ . '/index.php';
} elseif ($category !== null) {
    $heading = $category['title'] . '照片';
    $pageTitle = $e($heading . ' | ' . $brand);
    $pageDescription = $e($keywords . ' · ' . $heading);
    $pageCss = $category['css'] ?? 'sortGallery.min.css';
    require __DIR__ . '/category.php';
} else {
    $heading = $album['title'];
    $pageTitle = $e($heading . '照片 | ' . $brand);
    $pageDescription = $e($keywords . ' · ' . $heading . '照片');
    $pageCss = 'galDetail.min.css';
    require __DIR__ . '/album.php';
}
