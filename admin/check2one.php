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

	$sql = "SELECT * FROM `users` WHERE`account`=?";
	$sth = $db->prepare($sql);
        $sth->execute(array("$account"));
    
	if($sth->fetch()){
    
	        $ins = "UPDATE `users` SET `checked`=1 WHERE`account`=?";
	        $con = $db->prepare($ins);
	        if($con->execute(array("$account"))){
	            echo "success";
	            return true;
	        }
	        else{
	            echo "fail";
	            return false;
	        }
       }else{
           echo "not existed";
           return false;
       }
?>