<?php
$host = 'localhost';
$user = 'root';
$password = '';
$schema = 'hydrationdb';

$db = mysqli_connect($host, $user, $password, $schema);
if($db->connect_errno){
    echo "Database connection failed";
}  

return $db;
?>