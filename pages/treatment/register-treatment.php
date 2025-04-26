<?php
include "../../inc/function.php";
$name = isset($_POST['name']) ? $_POST['name'] : '';
$firstName = isset($_POST['firstName']) ? $_POST['firstName'] : '';
$sex = isset($_POST['sex']) ? $_POST['sex'] : '';
$adress = isset($_POST['adress']) ? $_POST['adress'] : '';
$phoneNumber = isset($_POST['phoneNumber']) ? $_POST['phoneNumber'] : '';
$id = addStudent($name, $firstName, $sex, $adress, $phoneNumber);
$options =  $_SESSION['idOption'];
$idLevel = $_POST['idLevel'];
$idSession = $_SESSION['idSession'];
$id_School =  intval($_SESSION['id_School']);
$id_Admin = intval($_SESSION['idUser']);
insertIntoPayment($id, $id_School, $options, $idLevel, $idSession, $payement, $id_Admin);
insertIntoRoll($id, $id_School, $options, $idLevel, $idSession, $payement, $id_Admin);
