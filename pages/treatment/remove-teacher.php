<?php
include "../../inc/function.php";
$teacher = $_GET['idTeacher'];
$school = $_GET['idSchool'];
deleteTeacher($teacher, $school);
