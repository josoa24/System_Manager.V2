const iconCloser = document.getElementById("closerIcon");
const iconShower = document.querySelector(".show-container");
iconCloser.addEventListener("click", () => {
  document.querySelector(".content-left").classList.remove("makeItShown");
  document.querySelector(".content-left").classList.add("makeItHiden");
});
iconShower.addEventListener("click", () => {
  document.querySelector(".content-left").classList.add("makeItShown");
  document.querySelector(".content-left").style.display = "block";
  document.querySelector(".content-left").classList.remove("makeItHiden");
});
