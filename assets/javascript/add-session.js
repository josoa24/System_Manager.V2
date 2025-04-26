document.addEventListener("DOMContentLoaded", function () {
  const adder = document.querySelector(".adder");
  const content1 = document.querySelector(".back");
  const form = document.querySelector(".form-adder");
  const canceler1 = document.querySelector(".canceler1");
  adder.addEventListener("click", () => {
    content1.classList.remove("hiden");
    content1.style.display = "flex";
    form.classList.add("show");
  });
  canceler1.addEventListener("click", () => {
    form.classList.remove("show");
    content1.classList.add("hiden");
    content1.style.display = "none";
  });
});
