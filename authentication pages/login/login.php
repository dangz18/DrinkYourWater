<?php
$db = require "../../database_connection.php";

if(isset($_POST['userEmail']) && isset($_POST['userPassword'])){
    $userEmail = $_POST['userEmail'];
    $userPassword = $_POST['userPassword'];

    $sql1="SELECT * FROM utilizatori WHERE user_email='$userEmail'";
    $result1 = $db->query($sql1);
	$count1 = mysqli_num_rows($result1);
    if($count1 == 0){
		echo "This email is not registered";
        exit;
	}else{
        
        $user = json_encode($result1->fetch_assoc());
        $userData = json_decode($user);
        if($user){
            if(password_verify($userPassword, $userData->user_password)){
                session_start();
                session_regenerate_id();
                $_SESSION["user-id"] = $userData->user_id;
                echo "Success";
            }else{
                echo "Password is incorrect";
                exit;
            }
        
        }

    }
}
?>