const markCont = document.querySelectorAll(".confirm-mark");
const btnMarker = document.querySelectorAll(".btn-marker");
btnMarker.forEach((btn) => {
    btn.addEventListener("click", () => {
        for (i = 0; i < markCont.length; i++) {
            if (btn.getAttribute("data-btn") == markCont[i].getAttribute("data-mark")) {
                markCont[i].style.display = "flex";
            } else {
                markCont[i].style.display = "none";
            }
        }
    })
})
const canceler = document.querySelectorAll(".canc");
canceler.forEach((calcel) => {
    calcel.addEventListener("click", () => {
        for (i = 0; i < markCont.length; i++) {
            markCont[i].style.display = "none";
        }
    })
})