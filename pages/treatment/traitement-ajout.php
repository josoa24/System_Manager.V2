<?php
include "../../inc/function.php";
$add_name = $_POST['admin-name'];
$add_password = $_POST['admin-psw'];
$passwordVerify = $_POST['admin-new-psw'];
$password = $_POST['psw'];
$userId = $_SESSION['idUser'];
$id_School =  intval($_SESSION['id_School']);
addAdmin($userId, $password, $add_name, $add_password, $passwordVerify, $id_School);
