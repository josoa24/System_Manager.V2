<?php
include "../../inc/function.php";
$_SESSION['sessionsName'] = $_GET['sessionsName'];
$_SESSION['idSession'] = $_GET['idSession'];
header("Location:../pages/each-sessions.php");