<?php
include "../../inc/function.php";
if(isset($_POST['sessions_Name'])){
    $sessionsName = $_POST['sessions_Name'];
    $idOption = $_SESSION['idOption'];
    $id_School = intval($_SESSION['id_School']);
    add_Sessions($sessionsName,$idOption,$id_School);
}
?> 