<?php
session_start();
if(isset($_SESSION['user-id'])){
  $db = require "../../database_connection.php";
  $sql = "SELECT * FROM utilizatori WHERE user_id={$_SESSION["user-id"]}";
  $result = $db->query($sql);
  $user = json_encode($result->fetch_assoc());
  $userData = json_decode($user);
}else{
  header("Location: \\hydrationapp\\authentication pages\\login\\login_index.html");
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Home</title>
    <link rel="stylesheet" href="home_style.css" />
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
    <div class="main">
      <div class="banner-container">
        <div class="logo-container">
          <img src="/hydrationapp/logo.png" alt="Logo" id="logo-image" />
        </div>
        <div class="menu-container">
          <ul>
            <li>
              <a
                href="/hydrationapp/app pages/home page/home_index.php"
                id="current-page"
                >Home</a
              >
            </li>
            <li id="space"></li>
            <li>
              <a href="/hydrationapp/app pages/tracker page/tracker_index.php"
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
        <div class="text-container">
          <h1><center>Wellcome <?= $userData->user_name ?></center></h1><br>
          <h2><center>We're thrilled to have you on board with us at DrinkYourWater, your ultimate water consumption tracker. At DrinkYourWater, we believe that proper hydration is the cornerstone of a healthy lifestyle. Whether you're an athlete, a student, a professional, or just someone looking to improve their wellness, our app is here to help you monitor and improve your water intake effortlessly.</center></h2>
        </div>
      </div>
    </div>
  </body>
</html>
