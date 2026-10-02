<?php
	session_start();
	mb_internal_encoding('UTF-8');

	$db_server = "localhost";
	$db_name = "badadmin_users";
	$db_user = "badadmin_admin";
	$db_password = "qpwoeiru51013";

	$dsn= "mysql:host=$db_server;dbname=$db_name;charset=utf8mb4";
	$db= new PDO($dsn, $db_user, $db_password);

	$account = $_POST['account'];
	$password= $_POST['password'];

	$sql = "SELECT `name` FROM `alumni` WHERE`account`=? AND`password`=?";
    $sth = $db->prepare($sql);
    $sth->execute(array("$account","$password"));
    if($row=$sth->fetch()){
    	$_SESSION['user'] = $row[0];
    	echo "success";
    }else{
    	echo "fail";
    }   
?>