<?php
   mb_internal_encoding('UTF-8');

// Check for empty fields
if(empty($_POST['name'])  		||
   empty($_POST['email']) 		||
   empty($_POST['message'])	||
   !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
   {
	  echo "empty";
	  return false;
   }

$name = $_POST['name'];
$email_address = $_POST['email'];
if(empty($_POST['phone'])){
   $phone = '沒有留下聯絡電話';
}else{
   $phone = $_POST['phone'];
}
$message = $_POST['message'];

// Create the email and send the message
$to = 'nctubadadm@gmail.com'; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
$email_subject = "來自 $name 的新留言";
$email_body = "來自陽明交通大學羽球隊瀏覽者給管理員的留言\n\n"."細節如下:\n\n留言人姓名: $name\n\nEmail: $email_address\n\n聯絡電話: $phone\n\n留言內容:\n$message";
$headers = "From: $email_address\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
$headers .= "Reply-To: $email_address";
//$mail1 = mail($to,$email_subject,$email_body,$headers);

$to2 = 'deed515@msn.com';
$email_subject2 = "來自 $name 的新留言";
$email_body2 = "來自陽明交通大學羽球隊瀏覽者給管理員的留言\n\n"."細節如下:\n\n留言人姓名: $name\n\nEmail: $email_address\n\n聯絡電話: $phone\n\n留言內容:\n$message";
$headers2 = "From: $email_address\n";
$headers2 .= "Reply-To: $email_address";
//$mail2 = mail($to2,$email_subject2,$email_body2,$headers2);

//echo $mail1.$mail2;
if(mail($to2,$email_subject2,$email_body2,$headers2) && mail($to,$email_subject,$email_body,$headers)){
	echo "success";
}else{
	echo "fail";
}

return true;
?>