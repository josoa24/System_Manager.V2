document.addEventListener("DOMContentLoaded", function () {
  var closeIcon = document.getElementById("cc");
  closeIcon.addEventListener("click", () => {
    var toast = document.querySelector(".toast");
    if (toast.style.display === "block") {
      toast.style.display = "none";
    }
  });
});
document.addEventListener("DOMContentLoaded", function () {
  var addElements = document.querySelectorAll(".add");

  addElements.forEach(function (addElement) {
    addElement.addEventListener("click", function () {
      var btnCont = this.querySelector(".btn-cont");
      if (btnCont.style.display === "none") {
        btnCont.style.display = "block";
      } else {
        btnCont.style.display = "none";
      }
    });

    var registerButton = addElement.querySelector(".btn-register");
    var reegisterButton = addElement.querySelector(".btn-reegister");

    registerButton.addEventListener("click", function (event) {
      event.stopPropagation();
      var registerDivs = document.querySelectorAll(".register");
      var index2 = 0;
      index2 = registerButton.getAttribute("data-btn");
      for (i = 0; i < registerDivs.length; i++) {
        if (index2 == registerDivs[i].getAttribute("data-register")) {
          registerDivs[i].style.display = "flex";
        }
      }
    });

    reegisterButton.addEventListener("click", function (event) {
      event.stopPropagation();
      var reegisterDiv = document.querySelectorAll(".reegister");
      var index3 = 0;
      index3 = reegisterButton.getAttribute("data-btn");
      for (i = 0; i < reegisterDiv.length; i++) {
        if (index3 == reegisterDiv[i].getAttribute("data-reegister")) {
          reegisterDiv[i].style.display = "flex";
        }
      }
    });
  });
});
document.addEventListener("DOMContentLoaded", function () {
  var radioM = document.getElementById("m");
  var radioF = document.getElementById("f");

  radioM.addEventListener("change", function () {
    if (radioM.checked) {
      radioF.checked = false;
    }
  });

  radioF.addEventListener("change", function () {
    if (radioF.checked) {
      radioM.checked = false;
    }
  });
});

function hide() {
  var divs = document.querySelectorAll(".register");
  for (i = 0; i < divs.length; i++) {
    if (divs[i].style.display === "flex") {
      divs[i].style.display = "none";
    }
  }
  var div2 = document.querySelectorAll(".reegister");
  for (i = 0; i < div2.length; i++) {
    if (div2[i].style.display === "flex") {
      div2[i].style.display = "none";
    }
  }
}
