<?php    
    header("Content-Type:text/html;charset=utf-8");
    $select_op=$_POST['select_op'];

    if($select_op != ""){

        require_once __DIR__ . '/../../config/db.php';
        require_once __DIR__ . '/../../src/Services/ArticleService.php';
        $articleService = new ArticleService($db);

        $row_result = $articleService->getByTimer($select_op);

        echo $row_result ? $row_result['heading'] : '';
    }
?>