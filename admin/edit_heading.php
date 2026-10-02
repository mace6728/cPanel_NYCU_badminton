<?php    
    header("Content-Type:text/html;charset=utf-8");
    $select_op=$_POST['select_op'];

    if($select_op != ""){
        
        $dbServer = "localhost";
        $dbName = "badadmin_users";
        $dbUser = "badadmin_admin";
        $dbPass = "qpwoeiru51013";
        
        $conn = mysql_pconnect($dbServer, $dbUser, $dbPass) or trigger_error(mysql_error(),E_USER_ERROR); 
        
        mysql_select_db($dbName,$conn);
        mysql_query("SET NAMES UTF8");
        
        $str="SELECT * FROM `article` WHERE `timer` = $select_op";
        $result = mysql_query($str,$conn) or die(mysql_error());
        $row_result = mysql_fetch_assoc($result);
        
        echo $row_result['heading'];
    }
?>