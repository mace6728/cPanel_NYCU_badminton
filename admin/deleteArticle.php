<?php
	require_once __DIR__ . '/../config/db.php';

	$timer = $_POST['timer'];

	$sql = "DELETE FROM `article` WHERE `timer`=?";
    $con = $db->prepare($sql);
    if($con->execute(array("$timer"))){
    	echo "success";
    	return true;
    }else{
    	echo "fail";
    	return false;
    }
?>