var loginBtn = document.getElementById("login-btn");
var userEmail = document.getElementById("user-email");
var emailText = document.getElementById("email-text");
var userPassword = document.getElementById("user-password");
var passwordText = document.getElementById("password-text");
var loginContainer = document.getElementById("login-container");
var formError = document.getElementById("form-error");

function getInfo() {
  emailText.style.color = "#fff";
  passwordText.style.color = "#fff";

  if (userEmail.value != "") {
    if (userPassword.value != "") {
      getUser();
    } else {
      passwordText.style.color = "#FF0000";
    }
  } else {
    emailText.style.color = "#FF0000";
  }
}

function getUser() {
  var httpr = new XMLHttpRequest();

  httpr.onreadystatechange = async function () {
    if (httpr.readyState == 4 && httpr.status == 200) {
      if (httpr.responseText == "Success") {
        if (window.innerWidth >= 1000) {
          loginContainer.style.setProperty("--fill-animation", "block");
          await new Promise((r) => setTimeout(r, 7000));
          location.href =
            "\\hydrationapp\\app pages\\home page\\home_index.php";
          loginContainer.style.setProperty("--fill-animation", "none");
          return true;
        } else {
          location.href =
            "\\hydrationapp\\app pages\\home page\\home_index.php";
          return true;
        }
      } else {
        formError.innerHTML = httpr.responseText;
        formError.style.display = "block";
      }
    }
  };
  httpr.open("POST", "login.php", true);
  httpr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

  httpr.send(
    "userEmail=" + userEmail.value + "&userPassword=" + userPassword.value
  );

  return false;
}

loginBtn.addEventListener("click", async () => {
  getInfo();
});
