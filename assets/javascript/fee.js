const img = document.querySelectorAll(".img-btn");
const fee = document.querySelectorAll(".fee-infos");
img.forEach((oneImage) => {
    oneImage.addEventListener("click", () => {
        for (i = 0; i < fee.length; i++) {
            if (oneImage.getAttribute("data-img") == fee[i].getAttribute("data-fee")) {
                fee[i].style.display = "flex";
            } else {
                fee[i].style.display = "none";
            }
        }
    })
})
const canceler = document.querySelectorAll(".canc");
canceler.forEach((calcel) => {
    calcel.addEventListener("click", () => {
        for (i = 0; i < fee.length; i++) {
            fee[i].style.display = "none";
        }
    })
})