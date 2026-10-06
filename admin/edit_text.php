<?php    
    header("Content-Type:text/html;charset=utf-8");
    $select_op=$_POST['select_op'];

    if($select_op != ""){

        require_once __DIR__ . '/../config/db.php';

        $sql = "SELECT * FROM `article` WHERE `timer` = ?";
        $sth = $db->prepare($sql);
        $sth->execute([$select_op]);
        $row_result = $sth->fetch();

        echo $row_result['content'];
    }
?>