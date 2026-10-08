<?php
    // 1. 強制錯誤顯示 (除錯階段使用，修好後請關閉)
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    try {
        // 2. 建立 PDO 連線
        require_once __DIR__ . '/../../config/db.php';
        require_once __DIR__ . '/../../src/Services/ArticleService.php';
        $articleService = new ArticleService($db);

        // 3. 接收資料並進行基礎安全處理
        // 如果你採用了 URL Encoding 策略，這裡要加 urldecode()
        $category = $_POST['category'] ?? '';
        $heading  = $_POST['heading'] ?? '';
        $content  = $_POST['content'] ?? ''; // 如果有編碼，改用 urldecode($_POST['content'])
        $content = base64_decode($content);
        $time     = !empty($_POST['time']) ? $_POST['time'] : date("Y-m-d H:i:s");
        $timer    = $_POST['timer'] ?? '';

        if (empty($timer)) {
            throw new Exception("缺少識別 ID (timer)");
        }

        // 4. 執行更新
        if ($articleService->update($timer, $category, $heading, $content, $time)) {
            echo "success";
        } else {
            echo "fail";
        }

    } catch (PDOException $e) {
        // 5. 捕捉資料庫層級錯誤 (例如欄位長度不夠)
        http_response_code(500);
        echo "Database Error: " . $e->getMessage();
    } catch (Exception $e) {
        // 捕捉邏輯層級錯誤
        http_response_code(400);
        echo "Error: " . $e->getMessage();
    }
?>