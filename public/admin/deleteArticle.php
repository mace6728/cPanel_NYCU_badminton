<?php
require_once __DIR__ . '/../../src/Helpers/sanitize.php';
require_once __DIR__ . '/../../src/Helpers/response.php';
require_once __DIR__ . '/../../config/db.php';
require_once __DIR__ . '/../../src/Services/ArticleService.php';
$articleService = new ArticleService($db);

$timer = post_or_default('timer');

if ($articleService->delete($timer)) {
    respond_success();
} else {
    respond_failure();
}
