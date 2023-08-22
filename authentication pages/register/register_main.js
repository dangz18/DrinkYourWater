var registerBtn = document.getElementById("register-btn");
var userName = document.getElementById("user-name");
var nameText = document.getElementById("name-text");
var userEmail = document.getElementById("user-email");
var emailText = document.getElementById("email-text");
var userPassword = document.getElementById("user-password");
var passwordText = document.getElementById("password-text");
var userConfirmPassword = document.getElementById("user-confirm-password");
var confirmPasswordText = document.getElementById("confirm-password-text");
var waterText = document.getElementById("waterPerDay-text");
var userWaterPerDay = document.getElementById("user-waterPerDay");
var formError = document.getElementById("form-error");

function getInfo() {
  nameText.style.color = "#fff";
  emailText.style.color = "#fff";
  passwordText.style.color = "#fff";
  confirmPasswordText.style.color = "#fff";
  waterText.style.color = "#fff";
  formError.style.display = "none";

  if (userName.value != "") {
    if (userEmail.value != "") {
      if (userPassword.value != "") {
        if (userConfirmPassword.value != "") {
          if (userPassword.value === userConfirmPassword.value) {
            if (userWaterPerDay.value != "") {
              if (userWaterPerDay.value != "0") {
                insertUser();
              } else {
                waterText.style.color = "#FF0000";
                formError.innerHTML = "Enter a water quantity greater than 0!";
                formError.style.display = "block";
              }
            } else {
              waterText.style.color = "#FF0000";
            }
          } else {
            formError.innerHTML =
              "Password and Confirm Password are not the same!";
            formError.style.display = "block";
          }
        } else {
          confirmPasswordText.style.color = "#FF0000";
        }
      } else {
        passwordText.style.color = "#FF0000";
      }
    } else {
      emailText.style.color = "#FF0000";
    }
  } else {
    nameText.style.color = "#FF0000";
  }
}

function insertUser() {
  var httpr = new XMLHttpRequest();

  httpr.onreadystatechange = function () {
    if (httpr.readyState == 4 && httpr.status == 200) {
      if (httpr.responseText == "Success") {
        location.href = "../login/login_index.html";
      } else {
        formError.innerHTML = httpr.responseText;
        formError.style.display = "block";
      }
    }
  };
  httpr.open("POST", "register.php", true);
  httpr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

  httpr.send(
    "userName=" +
      userName.value +
      "&userEmail=" +
      userEmail.value +
      "&userPassword=" +
      userPassword.value +
      "&userWaterPerDay=" +
      userWaterPerDay.value
  );
}

registerBtn.addEventListener("click", () => {
  getInfo();
});
