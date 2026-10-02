<?php
require_once('DB.php');
header('Content-Type: application/json; charset=utf-8');

// echo "DWA";
$sth="";
if(isset($_GET['id']) && !empty($_GET['id'])) {
    $sql = "SELECT * FROM `article` where timer=:id";
    $sth = $db->prepare($sql);
    $sth->bindParam(':id', $_GET['id']);
    // print_r($_GET);
}
if(!empty(sql)) {
    // print_r($_GET);
    $sth->execute();
    $row = $sth->fetch();
    // print_r($row);
    echo json_encode($row);
    
}


                        
                        
?>