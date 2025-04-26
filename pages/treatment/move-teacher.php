<?php
include "../../inc/function.php";
$teacher = $_GET['idTeacher'];
$option = $_GET['idOption'];
moveTeacher($teacher, $option, 2);
