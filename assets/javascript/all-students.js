const onglets = document.querySelectorAll(".each-list");
const content = document.querySelectorAll(".all-students");
let index = 0;
onglets.forEach((onglet) => {
  onglet.addEventListener("click", () => {
    if (onglet.classList.contains("activeOnglet")) {
      return;
    } else {
      onglet.classList.add("activeOnglet");
    }
    index = onglet.getAttribute("data-anim");

    for (i = 0; i < onglets.length; i++) {
      if (onglets[i].getAttribute("data-anim") != index) {
        onglets[i].classList.remove("activeOnglet");
      }
    }
    for (i = 0; i < content.length; i++) {
      if (content[i].getAttribute("data-anim") == index) {
        content[i].classList.add("listActive");
      } else {
        content[i].classList.remove("listActive");
      }
    }
  });
});

const onglets2 = document.querySelectorAll(".btnIs");
const content2 = document.querySelectorAll(".contentIs");
let index2 = 0;
onglets2.forEach((onglet) => {
  onglet.addEventListener("click", () => {
    if (onglet.classList.contains("on-hover")) {
      return;
    } else {
      onglet.classList.add("on-hover");
    }
    index2 = onglet.getAttribute("data-show");

    for (i = 0; i < onglets2.length; i++) {
      if (onglets2[i].getAttribute("data-show") != index2) {
        onglets2[i].classList.remove("on-hover");
      }
    }
    for (i = 0; i < content2.length; i++) {
      if (content2[i].getAttribute("data-content") == index2) {
        content2[i].style.display = "block";
        content2[i].classList.add("activeContent");
      } else {
        content2[i].style.display = "none";
        content2[i].classList.remove("activeContent");
      }
    }
  });
});

function hideAndShow() {
  changerBackground();
  var div = document.getElementById("cont");
  if (div.style.display === "none") {
    div.style.display = "block";
  } else {
    div.style.display = "none";
  }
}

function changerBackground() {
  var div = document.getElementById("uni");
  if (div.style.backgroundColor === "") {
    div.style.backgroundColor = "#cfcbcb4a";
  } else {
    div.style.backgroundColor = "";
  }
}
function hideAndShowAdd() {
  changerBackground2();
  var div = document.getElementById("add-Sessions");
  if (div.style.display === "none") {
    div.style.display = "flex";
  } else {
    div.style.display = "none";
  }
}

function changerBackground2() {
  var div = document.getElementById("sessions");
  var bxElement = div.querySelector(".bx");

  if (div.style.backgroundColor === "") {
    div.style.backgroundColor = "#62b47f";
    bxElement.style.color = "white";
    div.style.color = "white";
  } else {
    div.style.backgroundColor = "";
    // div.addEventListener("mouseover", function () {
    //   bxElement.style.color = "white";
    //   div.style.color = "white";
    // });
    div.addEventListener("mouseover", function () {
      div.style.color = "#62b47f";
      bxElement.style.color = "#62b47f";
    });
  }
}
