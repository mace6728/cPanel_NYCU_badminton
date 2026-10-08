<?php
require_once('DB.php');
require_once __DIR__ . '/../../src/Services/ArticleService.php';
require_once __DIR__ . '/../../src/Helpers/response.php';

send_json_header();

$articleService = new ArticleService($db);

if(isset($_GET['id']) && !empty($_GET['id'])) {
    $row = $articleService->getByTimer($_GET['id']);
    if ($row !== null) {
        echo json_encode($row);
    }
}


                        
                        
?>