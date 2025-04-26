<?php
include "../../inc/function.php";
$id = intval($_POST['idStudent']);
$options =  intval($_SESSION['idOption']);
$idLevel = intval($_POST['idLevelTwo']);
$idSession = intval($_SESSION['idSession']);
$payment = intval(getPayment($id));
$id_Admin = intval($_SESSION['idUser']);
insertIntoPayment($id,$id_School, $options, $idLevel, $idSession, $payment,$id_Admin);
insertIntoRoll($id,$id_School, $options, $idLevel, $idSession,$payment,$id_Admin);
