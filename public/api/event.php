<?php
require_once('DB.php');
require_once __DIR__ . '/../../src/Services/ArticleService.php';
require_once __DIR__ . '/../../src/Helpers/response.php';

send_json_header();

$articleService = new ArticleService($db);

$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
if ($id) {
    $row = $articleService->getById($id);
    if ($row !== null) {
        echo json_encode($row);
    }
}


                        
                        
?>