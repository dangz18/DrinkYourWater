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
    <title>My Profile</title>
    <link rel="stylesheet" href="myprofile_style.css" />
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
              <a href="/hydrationapp/app pages/home page/home_index.php"
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
                id="current-page"
                ><i class="fa-solid fa-user"></i
              ></a>
            </li>
          </ul>
        </div>
      </div>
      <div class="page-container">
        <img align="right" src="bottle.png" alt="bottle" id="bottle" />
        <div class="form">
          <h2>My name:</h2>
          <div id="inputName-controller">
            <textarea disabled="true" id="nameTextarea"><?= $userData->user_name ?></textarea>
            <div class="editName-controller">
              <button id="editNameBtn">Edit</button>
            </div>
          </div>
          <div id="updateName-controller">
              <button id="saveNameBtn">Save</button>
              <button id="cancelNameBtn">Cancel</button>
          </div>
          
          <h2>My email:</h2>
          <div id="inputEmail-controller">
            <textarea disabled="true" id="emailTextarea"><?= $userData->user_email ?></textarea>
            <div class="editEmail-controller">
              <button id="editEmailBtn">Edit</button>
            </div>
          </div>
          <div id="updateEmail-controller">
              <button id="saveEmailBtn">Save</button>
              <button id="cancelEmailBtn">Cancel</button>
          </div>

          <h2>New Password</h2>
          <input type="password" id="newPassword">

          <h2>Repeat Password</h2>
          <input type="password" id="repeatNewPassword">

          <h2 id="inputError"></h2>

          <button id="updatePasswordBtn">Update Password</button>

          
          <button id="logout-btn"><a href="logout.php">Log Out</a></button>
        </div>
      </div>
    </div>
    <script src="myprofile_main.js"></script>
  </body>
</html>
