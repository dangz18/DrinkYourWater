<?php
session_start();
$db = require "../../database_connection.php";
if(isset($_POST['newUserPassword']) && isset($_SESSION['user-id'])){
    $newUserPassword = password_hash($_POST['newUserPassword'], PASSWORD_DEFAULT);
    $userId = intval($_SESSION['user-id']);

    $sql = "UPDATE utilizatori SET user_password='$newUserPassword' WHERE user_id='$userId'";
    $result = mysqli_query($db, $sql);
    if($result){
        echo "Success";
    }else{
        echo "Failure";
    }
}
?>