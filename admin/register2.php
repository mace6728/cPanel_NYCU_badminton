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
	$phone = $_POST['phone'];
	$address = $_POST['address'];
	$birth = $_POST['birth'];
	$account = $_POST['account'];
	$password= $_POST['password'];
	$passAgain = $_POST['passAgain'];

	$sql = "SELECT * FROM `alumni` WHERE`account`=?";
    $sth = $db->prepare($sql);
    $sth->execute(array("$account"));

	if(!$sth->fetch()){

        $ins = "INSERT INTO `alumni`(`name`,`phone`,`email`,`address`,`birth`,`account`,`password`) VALUES (?,?,?,?,?,?,?)";
        $con = $db->prepare($ins);
        if($con->execute(array("$name","$phone","$email","$address","$birth","$account","$password"))){

            $to = '$email';
			$email_subject = "國立交通大學羽球隊確認信";
			$email_body = "以下為您所填寫之註冊資料\n\n"."姓名: $name\n\n聯絡電話: $phone\n\n住址:$address\n\n生日:$birth\n\n帳號:$account\n\n密碼:$password\n\n若有任何錯誤請回覆此信！\n若正確無誤，已可利用此組帳號密碼登入網站！";
			$headers = "From: nctubadadm@gmail.com\n";
			$headers .= "Reply-To: nctubadadm@gmail.com";

			$to2 = "nctubadadm@gmail.com";
            $email_subject2 = "交大羽球隊註冊者電子郵件";
            $email_body2 = "姓名：$name\n電子郵件： $email";
            $headers2 = "From: noreply@domain.com\n";
            $headers2 .= "Reply-To: nctubadadm@gmail.com";
            if( mail($to,$email_subject,$email_body,$headers) && mail($to2,$email_subject2,$email_body2,$headers2)){
            	echo "sucess";
            	return true;
            }else{
            	echo "fail";
            	return false;
            }
        }
        else{
            echo "fail";
            return false;
        }
    }else{
        echo "existed";
        return false;
    }
?>