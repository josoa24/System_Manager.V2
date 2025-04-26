<?php
include "../../inc/function.php";
$name = $_POST['name'];
$psw = $_POST['psw'];
$id_School = $_POST['school'];
if (loginInit($name, $psw,$id_School)) {
    header("Location:../pages/preparation.php");
} else {
    header("Location:../../index.php?error");
}
