<?php
/**
 * 羽球隊網頁 - 發布新文章後端處理
 * 功能：接收前端資料並新增至 article 資料表
 */

require_once __DIR__ . '/../../src/Helpers/sanitize.php';
require_once __DIR__ . '/../../src/Helpers/response.php';

error_reporting(E_ALL);
ini_set('display_errors', 1);

try {
    require_once __DIR__ . '/../../config/db.php';
    require_once __DIR__ . '/../../src/Services/ArticleService.php';
    $articleService = new ArticleService($db);

    $category = post_or_default('category', '一般消息');
    $heading  = post_or_default('heading');
    $content  = decode_rich_text(post_or_default('content'));
    $time     = post_time_or_now();

    // 生成唯一的 timer ID；舊系統習慣用 14 位數時間戳記，例如 20260410203015
    // 【重要】：請務必確認資料庫 timer 欄位已改為 BIGINT 型別
    $new_timer = date('YmdHis');

    if ($articleService->create($category, $heading, $content, $time, $new_timer)) {
        respond_success();
    } else {
        respond_failure();
    }
} catch (PDOException $e) {
    respond_db_error($e);
} catch (Exception $e) {
    respond_logic_error($e);
}
