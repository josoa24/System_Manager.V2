<?php
require "../inc/function.php";
$options = $_SESSION['idOption'];
$year = $_SESSION['current_Year'];
if (isset($_GET['search'])) {
  $search = $_GET['search'];
  $id_School = intval($_SESSION['id_School']);
  $students = getAllStudentsYear($id_School,$options, $year, $search);
  if (count($students) > 0) {
    foreach ($students as $student) {
      echo "<div class='one-students'>
                    <p>{$student['idStudent']}</p>
                    <p>{$student['studentsName']}</p>
                    <p>{$student['StudentsFirstName']}</p>
                    <p>{$student['optionsName']}</p>
                    <p>{$student['idLevel']}</p>
                    <p>{$student['studentsTelephone']}</p>
                    <a href='traitement-each-students.php?idStudent={$student['idStudent']}'>
                      <p>More infos <img src='../assets/images/crayon.png' alt=''></p>
                    </a>
                  </div>";
    }
  } else {
    echo '<div class="result-not-found">
        <img src="../../assets/images/search_24dp_FILL0_wght400_GRAD0_opsz24.png" alt="">
        Result not found
      </div>';
  }
}
