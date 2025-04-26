const remover = document.querySelectorAll(".remover");
const confirmation = document.querySelectorAll(".confirm-dialog");
remover.forEach((remove) => {
  remove.addEventListener("click", () => {
    for (i = 0; i < confirmation.length; i++) {
      if (
        remove.getAttribute("data-remover") ==
        confirmation[i].getAttribute("data-confirmation")
      ) {
        confirmation[i].style.display = "flex";
      } else {
        confirmation[i].style.display = "none";
      }
    }
  });
});
const canceler = document.querySelectorAll(".canc");
canceler.forEach((cancel) => {
  cancel.addEventListener("click", () => {
    for (i = 0; i < confirmation.length; i++) {
      confirmation[i].style.display = "none";
    }
  });
});
