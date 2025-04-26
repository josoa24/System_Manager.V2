<?php
include "../../inc/function.php";
$_SESSION['idOption'] = get_Options_Id($_GET['name']);
$_SESSION['options_Name'] = $_GET['name'];
$_SESSION['current_Year'] = intval($_GET['year']);
$_SESSION['levels_Name'] = getLevelsName($_SESSION['idOption']);
header("Location:../pages/all-students.php");
