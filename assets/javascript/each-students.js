document.getElementById("toFile").addEventListener("change", function () {
  const fileInput = this;
  const file = fileInput.files[0];
  const form = document.getElementById("photoForm");
  const imgElement = document.getElementById("picture");

  if (file) {
    const reader = new FileReader();
    reader.onload = function (e) {
      imgElement.src = e.target.result;
    };
    reader.readAsDataURL(file);
    form.submit();
  }
});
