<?php
session_start();
$_SESSION['idStudent'] = $_GET['idStudent'];
header("Location:../pages/each-students.php");
