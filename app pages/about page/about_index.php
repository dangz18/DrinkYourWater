<?php
session_start();
if(isset($_SESSION['user-id'])){
}else{
  header("Location: \\hydrationapp\\authentication pages\\login\\login_index.html");
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>About</title>
    <link rel="stylesheet" href="about_style.css" />
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
              <a
                href="/hydrationapp/app pages/about page/about_index.php"
                id="current-page"
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
        <img id="image" src="about.png" alt="About Image">
        <div class="text-container">
          <h1>Track Your Progress: </h1>
          <h2><center>Our intuitive interface allows you to easily log your daily water intake. Watch your hydration journey unfold in real-time with insightful charts and graphs.</center></h2>
          <h1>Stay Motivated: </h1>
          <h2><center>Achieve milestones and earn badges as you consistently meet your hydration targets. We believe in celebrating your small wins along the way!</center></h2>
          <h1>Personalized Goals: </h1>
          <h2><center>We understand that everyone's hydration needs are different. Set personalized daily water goals based on your activity level, age, and weight, ensuring you stay on track.</center></h2>
          <h1>Reminders That Work for You: </h1>
          <h2><center>Life can get busy, but staying hydrated shouldn't be a challenge. Choose from a variety of reminder options that fit seamlessly into your routine.</center></h2>
          <h1>Hydration Tips: </h1>
          <h2><center>Our app isn't just about tracking, it's about educating too. Access a wealth of hydration tips and facts that empower you to make informed choices.</center></h2>
        </div>
      </div>
    </div>
  </body>
</html>
