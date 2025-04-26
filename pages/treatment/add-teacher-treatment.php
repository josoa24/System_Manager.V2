<?php
include '../../inc/function.php';
if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['option'])) {
    $fichier = basename($_FILES['file']['name']);
    $taille = filesize($_FILES['file']['tmp_name']);
    $extension = strrchr($_FILES['file']['name'], '.');
    addTeacher($_POST['name'], $_POST['email'], $_POST['option'], $_SESSION['id_School'], basename($_FILES['file']['name']));
    uploadPhotoTeacher($fichier, $taille, $extension);
}



