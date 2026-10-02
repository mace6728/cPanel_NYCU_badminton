<?php

$dbServer = "localhost";
$dbName = "badadmin_users";
$dbUser = "badadmin_admin";
$dbPass = "qpwoeiru51013";

$conn = mysql_pconnect($dbServer, $dbUser, $dbPass) or trigger_error(mysql_error(),E_USER_ERROR); 

mysql_select_db($dbName,$conn);
mysql_query("SET NAMES big5");

$str="SELECT * FROM `article` order by `date`";
$result = mysql_query($str,$conn) or die(mysql_error());
$row_result = mysql_fetch_assoc($result);
echo "<select>";
do
{
echo "<option value = ".$row_result['heading'].">";
echo $row_result['heading'];
echo "</option>";
}while($row_result = mysql_fetch_assoc($result));
echo "</select>";
?>