<?php
session_start();
$db = require "../../database_connection.php";
if(isset($_POST['newUserEmail']) && isset($_SESSION['user-id'])){
    $newUserEmail = $_POST['newUserEmail'];
    $userId = intval($_SESSION['user-id']);

    $sql = "UPDATE utilizatori SET user_email='$newUserEmail' WHERE user_id='$userId'";
    $result = mysqli_query($db, $sql);
    if($result){
        echo "Success";
    }else{
        echo "Failure";
    }
}
?>