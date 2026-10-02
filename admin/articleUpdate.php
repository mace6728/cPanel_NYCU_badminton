<?php
    // 1. 強制錯誤顯示 (除錯階段使用，修好後請關閉)
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    mb_internal_encoding('UTF-8');

    // 2. 設定資料庫資訊 (建議抽離到 config.php)
    $db_server = "localhost";
    $db_name = "badadmin_users";
    $db_user = "badadmin_admin";
    $db_password = "qpwoeiru51013";

    try {
        $dsn = "mysql:host=$db_server;dbname=$db_name;charset=utf8mb4";
        // 增加屬性：設定錯誤模式為 Exception，並關閉模擬預編譯
        $options = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];
        $db = new PDO($dsn, $db_user, $db_password, $options);

        // 3. 接收資料並進行基礎安全處理
        // 如果你採用了 URL Encoding 策略，這裡要加 urldecode()
        $category = $_POST['category'] ?? '';
        $heading  = $_POST['heading'] ?? '';
        $content  = $_POST['content'] ?? ''; // 如果有編碼，改用 urldecode($_POST['content'])
        $content = base64_decode($content);
        $time     = $_POST['time'] ?? date("Y-m-d H:i:s");
        $timer    = $_POST['timer'] ?? '';

        if (empty($timer)) {
            throw new Exception("缺少識別 ID (timer)");
        }

        // 4. 執行更新
        $sql = "UPDATE `article` SET `category` = ?, `heading` = ?, `content` = ?, `date` = ? WHERE `timer` = ?";
        $stmt = $db->prepare($sql);
        
        // 直接傳入陣列，PDO 會自動處理跳脫 (Escaping)
        if ($stmt->execute([$category, $heading, $content, $time, $timer])) {
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