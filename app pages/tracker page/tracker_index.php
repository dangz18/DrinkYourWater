<?php
session_start();
if(isset($_SESSION['user-id'])){
  $db = require "../../database_connection.php";
  $currentDateTime = new DateTime('now');
  $todayDate = $currentDateTime->format('Y-m-d');
  $sql1 = "SELECT * FROM hydration_history WHERE user_id = {$_SESSION['user-id']} and hydration_date = '".$todayDate."' ";
	$result1 = mysqli_query($db, $sql1);
	$count1 = mysqli_num_rows($result1);

  //get water per day quantity
  $sql3 = "SELECT user_waterPerDay FROM utilizatori WHERE user_id={$_SESSION['user-id']}";
  $result3 = mysqli_query($db, $sql3);
  $arrayResult3= mysqli_fetch_array($result3);
  $waterPerDay = $arrayResult3['user_waterPerDay'];
	
	if($count1 == 0){ //if user enters for the first time this day
		//insert 0 into water history
    $sql2 = "INSERT INTO hydration_history(user_id, water_consumed, hydration_date) VALUES({$_SESSION['user-id']}, 0, '".$todayDate."')";
		$query2 = mysqli_query($db, $sql2);
    
    //set water consumption progress
    $waterConsumed = 0;
    $waterProgress = 0;
	}else{
    //get water consumption progress
    $arrayResult1 = mysqli_fetch_array($result1);
    $waterConsumed = $arrayResult1['water_consumed'];
    $waterProgress = round($waterConsumed / $waterPerDay * 100, 1);
  }
}else{
  header("Location: \\hydrationapp\\authentication pages\\login\\login_index.html");
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Tracker Page</title>
    <link rel="stylesheet" href="tracker_style.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Alegreya:wght@800&family=VT323&family=Wendy+One&display=swap"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
    />
  </head>
  <body>
    <div class="main" id="blur">
      <div class="banner-container">
        <div class="logo-container">
          <img src="/hydrationapp/logo.png" alt="Logo" id="logo-image" />
        </div>
        <div class="menu-container">
          <ul>
            <li>
              <a href="/hydrationapp/app pages/home page/home_index.php"
                >Home</a
              >
            </li>
            <li id="space"></li>
            <li>
              <a
                href="/hydrationapp/app pages/tracker page/tracker_index.php"
                id="current-page"
                >Tracker</a
              >
            </li>
            <li id="space"></li>
            <li>
              <a href="/hydrationapp/app pages/about page/about_index.php"
                >About</a
              >
            </li>
            <li id="space"></li>
            <li>
              <a
                href="/hydrationapp/app pages/my profile page/myprofile_index.php"
                ><i class="fa-solid fa-user"></i
              ></a>
            </li>
          </ul>
        </div>
      </div>
      <div class="page-container">
        <div class="drops">
          <div class="drop"></div>
          <div class="drop"></div>
          <div class="drop"></div>
          <div class="drop"></div>
        </div>
        <div class="tracker-container">
          <h2><?=$waterConsumed?>/<?=$waterPerDay?> liters</h2>
          <h2><?=$waterConsumed?>/<?=$waterPerDay?> liters</h2>
          <div class="glass">
            <div class="progress" style="height:<?php if($waterProgress>100){echo 400;} else{echo 400*$waterProgress/100;};?>px">
            </div>
            <h3><?=$waterProgress?>%</h3>
          </div>
          <div class="buttons">
            <a id="add-quantityBtn"><img src="addQuantity.png" id="add-quantity"/></a>
            <a id="delete-quantityBtn"><img src="deleteQuantity.png" id="delete-quantity"/></a>
          </div>
        </div>
      </div>
    </div>

    <div class="add-quantity-popup" id="popup-add">
      <h1>Enter the quantity you want to add:</h1>
      <input type="number" id="input-add-quantity" placeholder="Enter the quantity in ml">
      <h2 id="input-add-error"></h2>
      <div class="popup-buttons">
        <button id="addBtn">Add</button>
        <button id="closeAddPopupBtn">Close</button>
      </div>
    </div>

    <div class="delete-quantity-popup" id="popup-delete">
      <h1>Enter the quantity you want to remove:</h1>
      <input type="number" id="input-delete-quantity" placeholder="Enter the quantity in ml">
      <h2 id="input-delete-error"></h2>
      <div class="popup-buttons">
        <button id="deleteBtn">Delete</button>
        <button id="closeDeletePopupBtn">Close</button>
      </div>
    </div>
    <script src="tracker_main.js"></script>
  </body>
</html>
