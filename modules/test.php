<?php
include 'db_connect.inc.php';
$kcyo = mysqlireq("SELECT * from users where userid='admin'");
echo $kcyo['password'];
?>