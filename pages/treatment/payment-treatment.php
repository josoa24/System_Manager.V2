<?php
include "../../inc/function.php";
$idPayment = intval($_POST['idPayment']);
$values = intval($_POST['values']);
payment($idPayment,$values);