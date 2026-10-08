<?php
require_once __DIR__ . '/../../src/Helpers/sanitize.php';
require_once __DIR__ . '/../../src/Helpers/response.php';

error_reporting(E_ALL);
ini_set('display_errors', 1);

try {
    require_once __DIR__ . '/../../config/db.php';
    require_once __DIR__ . '/../../src/Services/ArticleService.php';
    $articleService = new ArticleService($db);

    $category = post_or_default('category');
    $heading  = post_or_default('heading');
    $content  = decode_rich_text(post_or_default('content'));
    $time     = post_time_or_now();
    $timer    = post_or_default('timer');

    if (empty($timer)) {
        throw new Exception('缺少識別 ID (timer)');
    }

    if ($articleService->update($timer, $category, $heading, $content, $time)) {
        respond_success();
    } else {
        respond_failure();
    }
} catch (PDOException $e) {
    respond_db_error($e);
} catch (Exception $e) {
    respond_logic_error($e, 'Error: ');
}
