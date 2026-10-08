<?php
/**
 * 羽球隊網頁 - 發布新文章後端處理
 * 功能：接收前端資料並新增至 article 資料表
 */

// 1. 環境設定：開發階段開啟錯誤回報，修復後可關閉
error_reporting(E_ALL);
ini_set('display_errors', 1);

try {
    // 2. 建立 PDO 連線
    require_once __DIR__ . '/../../config/db.php';
    require_once __DIR__ . '/../../src/Services/ArticleService.php';
    $articleService = new ArticleService($db);

    // 4. 接收 POST 資料
    // 使用 Null Coalescing Operator 設定預設值
    $category = $_POST['category'] ?? '一般消息';
    $heading  = $_POST['heading']  ?? '';
    // 接收資料
    $content = $_POST['content'] ?? '';
    
    // 解碼（將 %3C 轉回 <）
    $content = base64_decode($content);
    $time     = !empty($_POST['time']) ? $_POST['time'] : date("Y-m-d H:i:s");

    // 5. 生成唯一的 timer ID
    // 舊系統習慣用 14 位數時間戳記，例如 20260410203015
    // 【重要】：請務必確認資料庫 timer 欄位已改為 BIGINT 型別
    $new_timer = date("YmdHis");

    // 6. 執行 INSERT 指令 (新增文章)
    if ($articleService->create($category, $heading, $content, $time, $new_timer)) {
        // 回傳 success 字串供前端 JavaScript 判斷
        echo "success";
    } else {
        echo "fail";
    }

} catch (PDOException $e) {
    // 捕捉資料庫錯誤 (例如：Out of range, Data too long)
    http_response_code(500);
    echo "Database Error: " . $e->getMessage();
} catch (Exception $e) {
    // 捕捉一般邏輯錯誤
    http_response_code(400);
    echo "Logic Error: " . $e->getMessage();
}
?>