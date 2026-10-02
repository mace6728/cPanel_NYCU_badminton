<!DOCTYPE html>
<html lang="zh-tw">
<head>
	<meta charset="utf-8">
	<title>check!</title>
	<link rel="stylesheet" href="../css/check.min.css">
	<link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' >
	<script src="../js/jquery.js"></script>
	<script>
	function doIt(userID){
		var name = document.getElementById(userID).children[0].innerHTML;
		var phone= document.getElementById(userID).children[1].innerHTML;
		var mail = document.getElementById(userID).children[2].innerHTML;
		var addr = document.getElementById(userID).children[3].innerHTML;
		var birth= document.getElementById(userID).children[5].innerHTML;
		var user = document.getElementById(userID).children[6].innerHTML;
		var password=document.getElementById(userID).children[7].innerHTML;
		
		$.post("../register2.php",
          {'name':name,'email':mail,'phone':phone,'address':addr,'birth':birth,'account':user,'password':password},
          function(data,state){
          	console.log(data);
          	if(data=="success"){
          		document.getElementById(userID).children[4].innerHTML = "確認成功";
          	}else if(data=="fail"){
          		document.getElementById(userID).children[4].innerHTML = "重整頁面再試一次！";
          	}else{//something wrong
          		document.getElementById(userID).children[4].innerHTML = "重整頁面再試一次！";
          	}
          }
    );
    $.post("../check2one.php",
      {'account':user},
      function(data,state){
      	console.log(data);
      	if(data=="success"){
      		document.getElementById(userID).children[4].innerHTML = "確認成功";
      	}else if(data=="fail"){
      		document.getElementById(userID).children[4].innerHTML = "重整頁面再試一次！";
      	}else if(data="not exist"){//something wrong
      		document.getElementById(userID).children[4].innerHTML = "重整頁面再試一次！";
      	}else{
      		//something wrong
      	}
      }
    );   
	}
	function denyIt(userID){
		
		var user = document.getElementById(userID).children[6].innerHTML;
		$.post("../check2one.php",
          {'account':user},
          function(data,state){
          	console.log(data);
          	if(data=="success"){
          		document.getElementById(userID).children[4].innerHTML = "確認成功";
          	}else if(data=="fail"){
          		document.getElementById(userID).children[4].innerHTML = "重整頁面再試一次！";
          	}else if(data="not exist"){//something wrong
          		document.getElementById(userID).children[4].innerHTML = "重整頁面再試一次！";
          	}else{
          		//something wrong
          	}
          }
    );
	}
	</script>
</head>
<body>
<?php
	
	mb_internal_encoding('UTF-8');

	$db_server = "localhost";
	$db_name = "badadmin_users";
	$db_user = "badadmin_admin";
	$db_password = "qpwoeiru51013";

	$dsn= "mysql:host=$db_server;dbname=$db_name;charset=utf8mb4";
	$db= new PDO($dsn, $db_user, $db_password);

    $sql = "SELECT * FROM `users` WHERE`checked`=0";
    $sth = $db->prepare($sql);
    $sth->execute();
    $counter = 1;
    while($row = $sth->fetch()){
    	if(empty($tmp)){
    		echo '<table><tr><th>姓名</th><th>電話</th><th>電子郵件</th><th>住址</th><th>確認校友身份</th>';
    	}
    	$tmp = $row;
		echo '<tr id="'.$counter.'"><td>'.$row[1].'</td><td>'.$row[2].'</td><td>'.$row[3].'</td><td>'.$row[4].'</td><td><button onclick="doIt('.$counter.')">是</button><button onclick="denyIt('.$counter.')">否</button></td><td class="no">'.$row[5].'</td><td class="no">'.$row[6].'</td><td class="no">'.$row[7].'</td></tr>';
		$counter = $counter+1;
    }
    if(isset($tmp)){
    	echo '</table>';
    }
?>
</body>