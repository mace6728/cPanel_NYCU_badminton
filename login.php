<?php
	session_start();
	session_unset();
	session_destroy();
	header('Content-Type: text/plain; charset=UTF-8');
	http_response_code(403);
	echo "登入功能已停用";
	exit;
?>