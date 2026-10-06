<?php
	session_start();
	session_unset();
	session_destroy();
	header('Content-Type: text/plain; charset=UTF-8');
	echo "已登出";
?>