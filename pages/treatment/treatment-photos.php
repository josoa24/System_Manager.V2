<?php
include "../../inc/function.php";
$fichier = basename($_FILES['photo']['name']);
$taille = filesize($_FILES['photo']['tmp_name']);
$extension = strrchr($_FILES['photo']['name'], '.');
$idStudent =  intval($_SESSION['idStudent']);
uploadPhoto($idStudent, $fichier, $taille, $extension);

