document.addEventListener("DOMContentLoaded", function () {
  const searchInput = document.getElementById("search-input");
  const resultsContainer = document.querySelector(".list-box");

  searchInput.addEventListener("input", function () {
    const query = searchInput.value;
    const idLevel = document.querySelector(".all-students.listActive").dataset
      .anim;

    if (query.length > 0) {
      fetch(
        `search-each-sessions.php?query=${encodeURIComponent(
          query
        )}&idLevel=${idLevel}`
      )
        .then((response) => response.json())
        .then((data) => {
          resultsContainer.innerHTML = "";
          if (data.length > 0) {
            data.forEach((student) => {
              const studentElement = document.createElement("div");
              studentElement.className = "one-students";
              studentElement.innerHTML = `
                  <p>${student.idStudent}</p>
                  <p>${student.studentsName}</p>
                  <p>${student.StudentsFirstName}</p>
                  <p>${student.studentsSex}</p>
                  <p>${student.studentsAdress}</p>
                  <p>${student.studentsTelephone}</p>
                  <p>More Infos <img src="../../assets/images/crayon.png" alt=""></p>
                `;
              resultsContainer.appendChild(studentElement);
            });
          } else {
            resultsContainer.innerHTML =
              '<div class="result-not-found"><img src="../../assets/images/search_24dp_FILL0_wght400_GRAD0_opsz24.png" alt="">Result not found</div>';
          }
        });
    } else {
      resultsContainer.innerHTML = ""; // Effacer les résultats lorsque la recherche est vide
    }
  });
});
