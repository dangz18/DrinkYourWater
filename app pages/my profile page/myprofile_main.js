function activateEditNameListeners() {
  const editNameBtn = document.getElementById("editNameBtn");
  const updateNameController = document.getElementById("updateName-controller");
  var inputsName = document.getElementById("nameTextarea");
  editNameBtn.addEventListener("click", () => {
    console.log("Am apasat buton");
    updateNameController.style.display = "block";
    inputsName.disabled = false;
  });
}

function activateSaveNameListeners(currentName) {
  const saveNameBtn = document.getElementById("saveNameBtn");
  const inputsName = document.getElementById("nameTextarea");
  saveNameBtn.addEventListener("click", () => {
    if (currentName == inputsName.value) {
      //if user entered the same name
      location.reload();
    } else {
      updateName(inputsName.value);
    }
  });
}

function activateCancelNameListeners(defaultName) {
  const cancelNameBtn = document.getElementById("cancelNameBtn");
  const inputsName = document.getElementById("nameTextarea");
  const updateNameController = document.getElementById("updateName-controller");

  cancelNameBtn.addEventListener("click", () => {
    updateNameController.style.display = "none";
    inputsName.value = defaultName;
    inputsName.disabled = true;
  });
}

function updateName(newName) {
  var httpr = new XMLHttpRequest();

  httpr.onreadystatechange = function () {
    if (httpr.readyState == 4 && httpr.status == 200) {
      if (httpr.responseText == "Success") {
        location.reload();
      } else {
        console.log("Failure");
      }
    }
  };
  httpr.open("POST", "updateName.php", true);
  httpr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

  httpr.send("newUserName=" + newName);
}

function activateEditEmailListeners() {
  const editEmailBtn = document.getElementById("editEmailBtn");
  const updateEmailController = document.getElementById(
    "updateEmail-controller"
  );
  var inputsEmail = document.getElementById("emailTextarea");
  editEmailBtn.addEventListener("click", () => {
    updateEmailController.style.display = "block";
    inputsEmail.disabled = false;
  });
}

function activateSaveEmailListeners(currentEmail) {
  const saveEmailBtn = document.getElementById("saveEmailBtn");
  const inputsEmail = document.getElementById("emailTextarea");
  saveEmailBtn.addEventListener("click", () => {
    if (currentEmail == inputsEmail.value) {
      location.reload();
    } else {
      updateEmail(inputsEmail.value);
    }
  });
}

function activateCancelEmailListeners(defaultEmail) {
  const cancelEmailBtn = document.getElementById("cancelEmailBtn");
  const inputsEmail = document.getElementById("emailTextarea");
  const updateEmailController = document.getElementById(
    "updateEmail-controller"
  );

  cancelEmailBtn.addEventListener("click", () => {
    updateEmailController.style.display = "none";
    inputsEmail.value = defaultEmail;
    inputsEmail.disabled = true;
  });
}

function updateEmail(newEmail) {
  var httpr = new XMLHttpRequest();

  httpr.onreadystatechange = function () {
    if (httpr.readyState == 4 && httpr.status == 200) {
      if (httpr.responseText == "Success") {
        location.reload();
      } else {
        console.log("Failure");
      }
    }
  };
  httpr.open("POST", "updateEmail.php", true);
  httpr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

  httpr.send("newUserEmail=" + newEmail);
}

function activateUpdatePasswordListeners() {
  const inputNewPassword = document.getElementById("newPassword");
  const inputRepeatPassword = document.getElementById("repeatNewPassword");
  const updatePasswordBtn = document.getElementById("updatePasswordBtn");
  const inputError = document.getElementById("inputError");
  inputError.style.display = "none";

  updatePasswordBtn.addEventListener("click", () => {
    if (inputNewPassword.value == inputRepeatPassword.value) {
      if (inputNewPassword.value != "") {
        updatePassword(inputNewPassword.value);
        inputError.innerHTML = "";
        inputError.style.display = "none";
      } else {
        inputError.innerHTML = "Complete blank fields";
        inputError.style.display = "block";
      }
    } else {
      inputError.innerHTML = "Passwords are not the same";
      inputError.style.display = "block";
    }
  });
}

function updatePassword(newPassword) {
  var httpr = new XMLHttpRequest();

  httpr.onreadystatechange = function () {
    if (httpr.readyState == 4 && httpr.status == 200) {
      if (httpr.responseText == "Success") {
        location.reload();
      } else {
        console.log("Failure");
      }
    }
  };
  httpr.open("POST", "updatePassword.php", true);
  httpr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

  httpr.send("newUserPassword=" + newPassword);
}

function activateAllListeners() {
  var defaultName = document.getElementById("nameTextarea");
  var defaultEmail = document.getElementById("emailTextarea");

  activateEditNameListeners();
  activateSaveNameListeners(defaultName.value);
  activateCancelNameListeners(defaultName.value);

  activateEditEmailListeners();
  activateSaveEmailListeners(defaultEmail.value);
  activateCancelEmailListeners(defaultEmail.value);

  activateUpdatePasswordListeners();
}

window.onload = function () {
  activateAllListeners();
};
