<?php
mb_internal_encoding('UTF-8');
                        $db_server = "localhost";
                        $db_name = "badadmin_users";
                        $db_user = "badadmin_admin";
                        $db_password = "qpwoeiru51013";

                        $dsn= "mysql:host=$db_server;dbname=$db_name;charset=utf8mb4";
                        $db= new PDO($dsn, $db_user, $db_password);
?>