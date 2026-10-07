<?php
require_once('DB.php');
require_once __DIR__ . '/../src/Services/ArticleService.php';
header('Content-Type: application/json; charset=utf-8');

$articleService = new ArticleService($db);

if(isset($_GET['id']) && !empty($_GET['id'])) {
    $row = $articleService->getByTimer($_GET['id']);
    if ($row !== null) {
        echo json_encode($row);
    }
}


                        
                        
?>