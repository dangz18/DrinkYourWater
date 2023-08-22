const addPopupBtn = document.getElementById("add-quantityBtn");
const deletePopupBtn = document.getElementById("delete-quantityBtn");

const addBtn = document.getElementById("addBtn");
const deleteBtn = document.getElementById("deleteBtn");

const closeAddPopupBtn = document.getElementById("closeAddPopupBtn");
const closeDeletePopupBtn = document.getElementById("closeDeletePopupBtn");

const inputAddQuantity = document.getElementById("input-add-quantity");
const inputDeleteQuantity = document.getElementById("input-delete-quantity");
const inputAddError = document.getElementById("input-add-error");
const inputDeleteError = document.getElementById("input-delete-error");

addPopupBtn.addEventListener("click", () => {
  var blur = document.getElementById("blur");
  blur.classList.toggle("active");
  var popup = document.getElementById("popup-add");
  popup.classList.toggle("active");
});

deletePopupBtn.addEventListener("click", () => {
  var blur = document.getElementById("blur");
  blur.classList.toggle("active");
  var popup = document.getElementById("popup-delete");
  popup.classList.toggle("active");
});

closeAddPopupBtn.addEventListener("click", () => {
  var blur = document.getElementById("blur");
  blur.classList.toggle("active");
  var popupAdd = document.getElementById("popup-add");
  popupAdd.classList.toggle("active");

  inputAddQuantity.value = "";
  inputAddError.style.display = "none";
});

closeDeletePopupBtn.addEventListener("click", () => {
  var blur = document.getElementById("blur");
  blur.classList.toggle("active");
  var popupDelete = document.getElementById("popup-delete");
  popupDelete.classList.toggle("active");

  inputDeleteQuantity.value = "";
  inputDeleteError.style.display = "none";
});

addBtn.addEventListener("click", () => {
  if (inputAddQuantity.value != "") {
    addQuantity(inputAddQuantity.value);
  } else {
    inputAddError.innerHTML = "Please enter a valid quantity to add";
    inputAddError.style.display = "block";
  }
});

function addQuantity(quantity) {
  var httpr = new XMLHttpRequest();

  httpr.onreadystatechange = function () {
    if (httpr.readyState == 4 && httpr.status == 200) {
      if (httpr.responseText == "Success") {
        location.reload();
      } else if (httpr.responseText == "Zero entered") {
        inputAddError.innerHTML = "Quantity should be greater than 0";
        inputAddError.style.display = "block";
      } else {
        console.alert("Failed");
      }
    }
  };
  httpr.open("POST", "addQuantity.php", true);
  httpr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

  httpr.send("newQuantity=" + quantity);
}

deleteBtn.addEventListener("click", () => {
  if (inputDeleteQuantity.value != "") {
    deleteQuantity(inputDeleteQuantity.value);
  } else {
    inputDeleteError.innerHTML = "Please enter a valid quantity to remove";
    inputDeleteError.style.display = "block";
  }
});

function deleteQuantity(quantity) {
  var httpr = new XMLHttpRequest();

  httpr.onreadystatechange = function () {
    if (httpr.readyState == 4 && httpr.status == 200) {
      if (httpr.responseText == "Success") {
        location.reload();
      } else if (httpr.responseText == "Zero entered") {
        inputDeleteError.innerHTML = "Quantity should be greater than 0";
        inputDeleteError.style.display = "block";
      } else if (
        httpr.responseText ==
        "You entered a quantity biger than consumed quantity"
      ) {
        inputDeleteError.innerHTML =
          "You entered a quantity biger than consumed quantity";
        inputDeleteError.style.display = "block";
      } else {
        console.alert("Failed");
      }
    }
  };
  httpr.open("POST", "deleteQuantity.php", true);
  httpr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

  httpr.send("newQuantity=" + quantity);
}
