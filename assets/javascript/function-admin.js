const leftContainer = document.querySelector(".content-left");
const shower = document.getElementById("lala");
shower.addEventListener("click",()=>{
  leftContainer.classList.add("makeItHiden");
  leftContainer.classList.remove("makeItShown");
  var div = document.getElementById("admin-div");
  if (div.style.display === "none") {
    div.style.display = "flex";
  } else {
    div.style.display = "none";
  }
  var div = document.querySelector(".each");
  if (div.style.backgroundColor === "") {
    div.style.backgroundColor = "#cfcbcb4a";
  } else {
    div.style.backgroundColor = "";
  }
})

const cancelBtn = document.querySelector(".cancel-btn");
cancelBtn.addEventListener("click",()=>{
  var div = document.getElementById("admin-div");
  div.style.display = "none";

});

function togglePasswordVisibility() {
  var passwordInput = document.getElementById("id");
  var passwordIcon = document.getElementById("passwordIcon");

  if (passwordInput.type === "password") {
    passwordInput.type = "text";
    passwordIcon.src =
      "https://img.icons8.com/material-outlined/24/000000/invisible.png";
  } else {
    passwordInput.type = "password";
    passwordIcon.src =
      "https://img.icons8.com/material-outlined/24/000000/visible--v1.png";
  }
}
function togglePasswordVisibility1() {
  var passwordInput = document.getElementById("admin-add");
  var passwordIcon = document.getElementById("passwordIcon");

  if (passwordInput.type === "password") {
    passwordInput.type = "text";
    passwordIcon.src =
      "https://img.icons8.com/material-outlined/24/000000/invisible.png";
  } else {
    passwordInput.type = "password";
    passwordIcon.src =
      "https://img.icons8.com/material-outlined/24/000000/visible--v1.png";
  }
}
function togglePasswordVisibility2() {
  var passwordInput = document.getElementById("admin-pass");
  var passwordIcon = document.getElementById("passwordIcon2");

  if (passwordInput.type === "password") {
    passwordInput.type = "text";
    passwordIcon.src =
      "https://img.icons8.com/material-outlined/24/000000/invisible.png";
  } else {
    passwordInput.type = "password";
    passwordIcon.src =
      "https://img.icons8.com/material-outlined/24/000000/visible--v1.png";
  }
}
