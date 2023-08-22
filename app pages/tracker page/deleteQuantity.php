<?php
session_start();
$db = require "../../database_connection.php";
if(isset($_POST['newQuantity']) && isset($_SESSION['user-id'])){

    $newQuantity = $_POST['newQuantity'] / 1000;
    if($newQuantity==0){
        echo "Zero entered";
        exit;
    }

    $userId = intval($_SESSION['user-id']);

    $currentDateTime = new DateTime('now');
    $todayDate = $currentDateTime->format('Y-m-d');

    //get WaterConsumed
    $sql2 = "SELECT water_consumed FROM hydration_history WHERE user_id = {$_SESSION['user-id']} and hydration_date = '".$todayDate."'";
    $result2 = mysqli_query($db, $sql2);
    $arrayResult2 = mysqli_fetch_array($result2);
    $waterConsumed = $arrayResult2['water_consumed'];

    //verify if quantity to remove is greater than WaterConsumed
    if($newQuantity<=$waterConsumed){
        //update database
        $newQuantity = $waterConsumed - $newQuantity;
        $sql3 = "UPDATE hydration_history SET water_consumed='$newQuantity' WHERE user_id = {$_SESSION['user-id']} and hydration_date = '$todayDate' ";
        $result3 = mysqli_query($db, $sql3);
        if($result3){
            echo "Success";
        }else{
            echo "Failure";
        }
    }else{
        echo "You entered a quantity biger than consumed quantity";
    }
}
?>