<?php
$db = require "../../database_connection.php";

if(isset($_POST['userName']) && isset($_POST['userEmail']) && isset($_POST['userPassword']) && isset($_POST['userWaterPerDay'])){
    $userName = $_POST['userName'];
    $userEmail = $_POST['userEmail'];
    $userPassword = password_hash($_POST['userPassword'], PASSWORD_DEFAULT);
    $userWaterPerDay = doubleval($_POST['userWaterPerDay']) / 1000;



    $sql1="SELECT user_email FROM utilizatori WHERE user_email='$userEmail'";
    $result1 = mysqli_query($db, $sql1);
	$count1 = mysqli_num_rows($result1);
    if($count1 > 0){
		echo "Email already in use";
        exit;
	}else{
        $sql2 = "INSERT INTO utilizatori(user_name, user_email, user_password, user_waterPerDay) VALUES ('$userName', '$userEmail', '$userPassword', '$userWaterPerDay')";
	    $query2 = mysqli_query($db, $sql2);

        if($query2){
            echo "Success";
            exit;
        }else{
            echo "Failure";
        }
    }
}
?>