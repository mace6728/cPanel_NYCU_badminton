<?php
	mb_internal_encoding('UTF-8');

	$db_server = "localhost";
	$db_name = "badadmin_users";
	$db_user = "badadmin_admin";
	$db_password = "qpwoeiru51013";

	$dsn= "mysql:host=$db_server;dbname=$db_name;charset=utf8mb4";
	$db= new PDO($dsn, $db_user, $db_password);

	$name = $_POST['name'];
	$email = $_POST['email'];
	$mailAgain = $_POST['mailAgain'];
	$phone = $_POST['phone'];
	$address = $_POST['address'];
	$birth = $_POST['birth'];
	$account = $_POST['account'];
	$password= $_POST['password'];
	$passAgain = $_POST['passAgain'];

	$sql = "SELECT * FROM `users` WHERE`account`=?";
    $sth = $db->prepare($sql);
    $sth->execute(array("$account"));
    if($password == $passAgain){
    	//if($email == $mailAgain){
    		if(!$sth->fetch()){

		        $ins = "INSERT INTO `users`(`name`,`phone`,`email`,`address`,`birth`,`account`,`password`) VALUES (?,?,?,?,?,?,?)";
		        $con = $db->prepare($ins);
		        if($con->execute(array("$name","$phone","$email","$address","$birth","$account","$password"))){
		        	$to = "deed515@msn.com";
	            	$email_subject = "國立交通大學羽球隊註冊確認信";
		            $email_body = "以下網址為目前填寫註冊單後尚未審核的使用者\n\nhttp://badminton.nctu.edu.tw/admin/administrator.php\n\n點選來確認他們的身份\n\n使用者名稱:admin\n密碼:QPWOEIRU51013";
		            $headers = "From: nctubadadm@gmail.com\n";
		            $headers .= "Reply-To: nctubadadm@gmail.com";
		            mail($to,$email_subject,$email_body,$headers);
		            echo "success";
		            $to2 = "nctubadadm@gmail.com";
	            	$email_subject2 = "國立交通大學羽球隊註冊確認信";
		            $email_body2 = "以下網址為目前填寫註冊單後尚未審核的使用者\n\nhttp://badminton.nctu.edu.tw/admin/administrator.php\n\n點選來確認他們的身份\n\n使用者名稱:admin\n密碼:QPWOEIRU51013";
		            $headers2 = "From: nctubadadm@gmail.com\n";
		            $headers2 .= "Reply-To: nctubadadm@gmail.com";
		            mail($to2,$email_subject2,$email_body2,$headers2);
		            return true;
		        }
		        else{
		            echo "fail";
		            return false;
		        }
		    }else{
		        echo "existed";
		        return false;
		    }
    	//}else{
    	//	echo "mailNotSame";
    	//	return false;
	//    }
    }else{
    	echo "notSame";
    	return false;
    }
?>