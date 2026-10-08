<?php
	require_once __DIR__ . '/../../config/db.php';
	require_once __DIR__ . '/../../src/Services/ArticleService.php';
	$articleService = new ArticleService($db);

	$timer = $_POST['timer'];

	if($articleService->delete($timer)){
    	echo "success";
    	return true;
    }else{
    	echo "fail";
    	return false;
    }
?>