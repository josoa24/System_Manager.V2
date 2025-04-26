<?php
include "connect.php";
session_start();

function loginInit($username, $password, $id_School)
{
    $conn = connectDB();
    $sql = "SELECT * FROM admins WHERE adminsName = '$username' AND adminsPassword = '$password' AND idSchool = $id_School";
    $result = $conn->query($sql);
    if ($result->num_rows == 1) {
        $stock = mysqli_fetch_assoc($result);
        $_SESSION['idUser'] = $stock['idAdmin'];
        $_SESSION['userName'] = $stock['adminsName'];
        $_SESSION['id_School'] = $stock['idSchool'];
        return true;
    } else {

        return false;
    }
    $conn->close();
}

//Function add admin
function addAdmin($userId, $password, $newAdminName, $newAdminPassword, $passwordVerify, $id_School)
{
    $conn = connectDB();
    $newAdminName = $conn->real_escape_string($newAdminName);
    $sql = "INSERT INTO admins (idSchool,adminsName, adminsPassword) VALUES ($id_School,'$newAdminName', '$newAdminPassword')";
    $sql2 = "SELECT * FROM admins WHERE idAdmin = '$userId' AND adminsPassword = '$password'";
    $result = $conn->query($sql2);
    if ($result->num_rows == 1 && $newAdminPassword == $passwordVerify) {
        if ($conn->query($sql) === TRUE) {
            header("Location:../pages/admin.php?succes");
        } else {
            echo "Error : " . $conn->error;
        }
    } else {
        header("Location:../pages/admin.php?error");
    }
    $conn->close();
}

//Use option's name as input and return options ID
function get_Options_Id($options_Name)
{
    $conn = connectDB();
    $sql =  "SELECT idOption FROM allOptions WHERE optionsName = '$options_Name'";
    $result = $conn->query($sql);
    while ($r = mysqli_fetch_assoc($result)) {
        return  $r['idOption'];
    }
    $conn->close();
}

//Get all persons who have paid fee
function getPaid($id_School)
{
    $conn = connectDB();
    $sql =  "SELECT * 
    FROM 
    allOptions 
    JOIN payment 
    ON allOptions.idOption = payment.idOption 
    JOIN
    admins
    ON 
    admins.idAdmin = payment.idAdmin
    JOIN students 
    ON payment.idStudent = students.idStudent 
    WHERE payment.montant IS NOT NULL AND payment.date IS NOT NULL AND payment.idSchool = $id_School ORDER BY payment.date DESC ";
    $result = $conn->query($sql);
    $ens = array();
    while ($r = mysqli_fetch_assoc($result)) {
        $ens[] = $r;
    }
    return $ens;
    $conn->close();
}

//Get Total money each school
function getTotal($id_School)
{
    $conn = connectDB();
    $sql =  "SELECT SUM(montant) as sum 
    FROM  payment 
    WHERE montant IS NOT NULL AND date IS NOT NULL AND idSchool = $id_School";
    $result = $conn->query($sql);
    while ($r = mysqli_fetch_assoc($result)) {
        if ($r['sum'] == NULL) {
            return 0;
        }
        return $r['sum'];
    }
    $conn->close();
}

//Get all payement last months
function get_Last_Month($id_School)
{
    $conn = connectDB();
    $sql =  "SELECT SUM(montant) as sum 
    FROM  payment 
    WHERE montant IS NOT NULL AND date IS NOT NULL AND date >= DATE_SUB(NOW(), INTERVAL 1 MONTH) AND idSchool = $id_School";
    $result = $conn->query($sql);
    while ($r = mysqli_fetch_assoc($result)) {
        if ($r['sum'] == NULL) {
            return 0;
        }
        return $r['sum'];
    }
    $conn->close();
}

//Get all payement last week
function get_Last_Week($id_School)
{
    $conn = connectDB();
    $sql =  "SELECT SUM(montant) as sum 
    FROM  payment 
    WHERE montant IS NOT NULL AND date IS NOT NULL AND date >= DATE_SUB(NOW(), INTERVAL 1 WEEK) AND idSchool = $id_School";
    $result = $conn->query($sql);
    while ($r = mysqli_fetch_assoc($result)) {
        if ($r['sum'] == NULL) {
            return 0;
        }
        return $r['sum'];
    }
    $conn->close();
}

//Get all payement today

function get_Today($id_School)
{
    $conn = connectDB();

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $stmt = $conn->prepare("SELECT SUM(montant) as sum 
                            FROM payment 
                            WHERE montant IS NOT NULL AND DATE(date) = CURDATE() AND idSchool = ?");
    $stmt->bind_param("i", $id_School);
    $stmt->execute();
    $stmt->bind_result($sum);
    $stmt->fetch();
    $stmt->close();
    $conn->close();

    return $sum !== null ? $sum : 0;
}

//Get all sessions
function get_All_Sessions($id_Options, $year, $id_School)
{
    $conn = connectDB();
    $sql =  "SELECT *
    FROM allSessions
    WHERE idOption = $id_Options AND YEAR(date) = $year AND idSchool = $id_School  
    ORDER BY idSession DESC";
    $result = $conn->query($sql);
    $return = array();
    while ($r = mysqli_fetch_assoc($result)) {
        $return[] = $r;
    }
    return $return;
}

//Add sessions
function add_Sessions($sessionName, $idOption, $id_School)
{
    $conn = connectDB();
    $sql = "INSERT INTO allSessions VALUES (DEFAULT,$id_School,$idOption,'$sessionName',NOW()) ";
    $result = $conn->query($sql);
    if ($result === true) {
        header("Location:../pages/sessions.php?added");
    } else {
        header("Location:../pages/sessions.php?error");
    }
    $conn->close();
}

function getTypeCours()
{
    $conn = connectDB();
    $sql = "SELECT * FROM cours";
    $result = $conn->query($sql);
    return mysqli_fetch_all($result);
    $conn->close();
}

function getStudentsLevel($id_School, $idLevel, $idOption, $year)
{
    $conn = connectDB();
    $sql =  "SELECT COUNT(date) as counts FROM roll
    WHERE idLevel = $idLevel AND YEAR(date) = $year AND idOption = $idOption AND idSchool = $id_School";
    $result = $conn->query($sql);
    while ($e = mysqli_fetch_assoc($result)) {
        return $e['counts'];
    }
}

function toArray($idSession, $idOption, $year)
{
    $result = array();
    for ($i = 1; $i <= getLevelsNumber($idOption); $i++) {
        $result[] = getStudentsNumberInSessions($idSession, $i, $idOption, $year);
    }
    return $result;
}

function getStudentsNumberInSessions($idSession, $idLevel, $idOption, $year)
{
    $conn = connectDB();
    $sql =  "SELECT COUNT(subquery.years) as counts
    FROM (SELECT YEAR(date) as years, idLevel,idStudent,idOption,idSession FROM roll) AS subquery
    WHERE idLevel = $idLevel AND  idSession = $idSession AND years = $year AND idOption = $idOption";
    $result = $conn->query($sql);
    while ($e = mysqli_fetch_assoc($result)) {
        return $e['counts'];
    }
}

function getStudentsInSessionsInfos($idSession, $idLevel, $idOption, $year)
{
    $conn = connectDB();
    $sql = "SELECT * FROM (
                SELECT *
                FROM (
                    SELECT YEAR(date) AS years, idLevel, idStudent, idOption, idSession
                    FROM roll
                ) AS subquery
                WHERE idLevel = ? AND idSession = ? AND years = ? AND idOption = ?
            ) AS secondSubquery
            JOIN students ON secondSubquery.idStudent = students.idStudent";
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("iiii", $idLevel, $idSession, $year, $idOption);
        $stmt->execute();
        $result = $stmt->get_result();
        $return = array();
        while ($e = $result->fetch_assoc()) {
            $return[] = $e;
        }
        $result->free();
        $stmt->close();
        return $return;
    }
}


function getAllStudentsYear($id_School, $idOption, $year, $search = '')
{
    $conn = connectDB();

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $search = $conn->real_escape_string($search);

    $sql = "SELECT * FROM 
                allOptions
            JOIN (
                SELECT idStudent, idLevel, YEAR(date) as year, idOption 
                FROM roll 
                WHERE idRoll IN (
                    SELECT MAX(idRoll) AS maxIdRoll 
                    FROM roll
                    GROUP BY idStudent
                ) 
                AND idOption = $idOption 
                AND idSchool = $id_School 
                ORDER BY idRoll DESC
            ) as subquery
            ON allOptions.idOption = subquery.idOption
            JOIN students
            ON subquery.idStudent = students.idStudent              
            WHERE subquery.year = $year
            AND students.studentsName LIKE '%$search%'";

    $result = $conn->query($sql);

    if (!$result) {
        die("Query failed: " . $conn->error);
    }

    $return = array();
    while ($e = $result->fetch_assoc()) {
        $return[] = $e;
    }

    $conn->close();

    return $return;
}

function  getAllLevels($idOption)
{
    $conn = connectDB();
    $sql =  "SELECT * FROM levels
    WHERE idOption = $idOption";
    $result = $conn->query($sql);
    return mysqli_fetch_all($result);
}

function getAllOptions()
{
    $conn = connectDB();
    $sql =  "SELECT * FROM allOptions";
    $result = $conn->query($sql);
    return mysqli_fetch_all($result);
}

function getLevelsNumber($idOption)
{
    $conn = connectDB();
    $sql =  "SELECT COUNT(idLevel) as  counts FROM levels
    WHERE idOption = $idOption";
    $result = $conn->query($sql);
    while ($e = mysqli_fetch_assoc($result)) {
        return $e['counts'];
    }
}

function getLevelsName($idLevel)
{
    if ($idLevel == 1) {
        return "LEVEL";
    }
    return "HSK";
}


function addStudent($name, $firstName, $sex, $adress, $phoneNumber)
{
    $conn = connectDB();
    $sql =  "INSERT INTO
    students (
        studentsName,
        studentsSex,
        StudentsFirstName,
        studentsAdress,
        studentsTelephone
    )
    VALUES (
        '$name',
        '$sex',
        '$firstName',
        '$adress',
        '$phoneNumber'
    )";
    $result = $conn->query($sql);
    $sql2 = "SELECT idStudent FROM students ORDER BY idStudent DESC";
    $result2 = $conn->query($sql2);
    $id = 0;
    while ($e = mysqli_fetch_assoc($result2)) {
        $id = $e['idStudent'];
        return $id;
    }
}

//Function to add teachers
function addTeacher($name, $email, $option, $school, $photo)
{
    $conn = connectDB();
    $sql =  "INSERT INTO
    teachers (
        teachersName,
        email,
        photo
    )
    VALUES (
        '$name',
        '$email',
        '$photo'
    )";
    $result = $conn->query($sql);
    $sql = "SELECT idTeacher FROM teachers ORDER BY idTeacher DESC LIMIT 1";
    $result = $conn->query($sql);
    $idTeacher =  intval(mysqli_fetch_assoc($result)['idTeacher']);
    $sql = "INSERT INTO teacherMovement (idTeacher,idOption,idSchool,active)
    VALUES 
    (
    $idTeacher,
    $option,
    $school,
    TRUE
    )";
    $result = $conn->query($sql);
}

function insertIntoRoll($id_Students, $id_School, $id_Options, $id_Levels, $id_Sessions, $payment_Nbr, $id_Admin)
{
    $conn = connectDB();
    $sql = "INSERT INTO roll (idStudent,idSchool, idOption, idLevel, idSession, payment, idAdmin, date) VALUES (?, ?, ?, ?, ?, ?, ?, NOW())";

    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("iiiiiii", $id_Students, $id_School, $id_Options, $id_Levels, $id_Sessions, $payment_Nbr, $id_Admin);
        if ($stmt->execute()) {
            header("Location:../pages/each-sessions.php?added");
        } else {
            echo "Erreur : " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "Erreur de préparation de la requête : " . $conn->error;
    }
    $conn->close();
}

function getAllPayment($idStudent)
{
    $conn = connectDB();
    $sql =  "SELECT * FROM payment WHERE idStudent = $idStudent";
    $result = $conn->query($sql);
    $return = array();
    while ($e = mysqli_fetch_assoc($result)) {
        $return[] = $e;
    }
    return $return;
    $conn->close();
}

function getPayment($idStudent)
{
    $conn = connectDB();
    $sql =  "SELECT * FROM roll WHERE idStudent = $idStudent";
    $result = $conn->query($sql);
    while ($e = mysqli_fetch_assoc($result)) {
        return $e['payment'];
    }
    $conn->close();
}

function insertIntoPayment($idStudent, $id_School, $idOption, $idLevel, $idSession, $payment, $id_Admin)
{
    $conn = connectDB();
    for ($i = 0; $i < $payment; $i++) {
        $sql = "INSERT INTO payment (idStudent,idSchool, idOption, idLevel, idSession,typePayment, idAdmin) VALUES (?, ?, ?, ?, ?, ?, ?)";
        if ($stmt = $conn->prepare($sql)) {
            $value = $i + 1;
            $stmt->bind_param("iiiiiii", $idStudent, $id_School, $idOption, $idLevel, $idSession, $value, $id_Admin);
            $stmt->execute();
            $stmt->close();
        } else {
            echo "Erreur de préparation de la requête : " . $conn->error;
        }
    }
    $conn->close();
}

function getAllYears($idOption, $year, $id_School)
{
    $conn = connectDB();
    $sql = "SELECT DISTINCT datas FROM(SELECT YEAR(date) as datas
    FROM roll 
    WHERE idOption = $idOption AND idSchool = $id_School) as sub WHERE datas != '$year' ";
    $result = $conn->query($sql);
    $return = array();
    while ($e = mysqli_fetch_assoc($result)) {
        $return[] =  $e;
    }
    return $return;
}

function uploadPhotoTeacher($fichier, $taille, $extension)
{

    $dossier = '../../assets/images/';
    $taille_maxi = 100000000;
    $extensions = array('.png', '.gif', '.jpg', '.jpeg');
    if (!in_array($extension, $extensions)) {
        $erreur = 'Vous devez uploader un fichier de type png, gif, jpg, jpeg, txt ou doc';
    }
    if ($taille > $taille_maxi) {
        $erreur = 'Le fichier est trop gros...';
    }
    if (!isset($erreur)) {
        $fichier = strtr(
            $fichier,
            'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ',
            'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy'
        );
        $fichier = preg_replace('/([^.a-z0-9]+)/i', '-', $fichier);
        if (move_uploaded_file($_FILES['file']['tmp_name'], $dossier . $fichier)) {
            header("Location:../pages/teachers.php?added");
        } else {
            echo 'Echec de l\'upload !';
        }
    } else {
        echo $erreur;
    }
}



function uploadPhoto($idStudent, $fichier, $taille, $extension)
{
    $dossier = '../../assets/images/';
    $taille_maxi = 100000000;
    $extensions = array('.png', '.gif', '.jpg', '.jpeg');
    $idStudent = intval($idStudent);
    if (!in_array($extension, $extensions)) {
        $erreur = 'Vous devez uploader un fichier de type png, gif, jpg, jpeg, txt ou doc';
    }
    if ($taille > $taille_maxi) {
        $erreur = 'Le fichier est trop gros...';
    }
    if (!isset($erreur)) {
        $fichier = strtr(
            $fichier,
            'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ',
            'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy'
        );
        $fichier = preg_replace('/([^.a-z0-9]+)/i', '-', $fichier);
        if (move_uploaded_file($_FILES['photo']['tmp_name'], $dossier . $fichier)) {
            $conn = connectDB();
            $sql = "UPDATE students SET studentsPhoto = '$fichier' WHERE idStudent = $idStudent";
            $result = $conn->query($sql);
            header("Location:../pages/each-students.php");
        } else {
            echo 'Echec de l\'upload !';
        }
    } else {
        echo $erreur;
    }
}

function getPhotos($idStudent)
{
    $conn = connectDB();
    $idStudent = intval($idStudent);
    $sql = "SELECT * FROM students WHERE idStudent = $idStudent";
    $result = $conn->query($sql);
    if ($result && $result->num_rows > 0) {
        $e = $result->fetch_assoc();
        return $e['studentsPhoto'];
    } else {
        $sql2 = "SELECT * FROM students WHERE idStudent = $idStudent";
        $result2 = $conn->query($sql2);
        $e = $result2->fetch_assoc();
        if ($e['studentsSex'] == "M") {
            return "defaultHomme.png";
        } else {
            return "defaultFemme.png";
        }
    }
}


function getTeachers($idSchool)
{
    $conn = connectDB();
    $sql =  "SELECT *
    FROM allOptions 
    JOIN teacherMovement 
    ON teacherMovement.idOption = allOptions.idOption
    JOIN  teachers 
    ON teacherMovement.idTeacher = teachers.idTeacher 
    JOIN
    school
    ON school.idSchool = teacherMovement.idSchool
    WHERE  teacherMovement.idSchool = $idSchool AND teacherMovement.active = 1";
    $result = $conn->query($sql);
    return mysqli_fetch_all($result);
}

function deleteTeacher($idTeacher, $idSchool)
{
    $conn = connectDB();
    $sql =  "UPDATE teacherMovement SET active = FALSE WHERE idTeacher = $idTeacher AND idSchool = $idSchool";
    $result = $conn->query($sql);
    header("Location:../pages/teachers.php?added");
}

function moveTeacher($idTeacher, $idOption, $idSchool)
{
    $conn = connectDB();
    $sql =  "SELECT * FROM  teacherMovement WHERE idTeacher = $idTeacher AND idOption = $idOption AND idSchool = $idSchool)";
    if (mysqli_num_rows($conn->query($sql)) == 0) {
        $sql =  "INSERT INTO teacherMovement VALUES ($idTeacher,$idOption,$idSchool,TRUE)";
        $result = $conn->query($sql);
        header("Location:../pages/teachers.php?added");
    } else {
        header("Location:../pages/teachers.php?erreur");
    }
}

function getStudent($idStudent)
{
    $conn = connectDB();
    $sql =  "SELECT *
    FROM students WHERE idStudent = $idStudent";
    $result = $conn->query($sql);
    $return = array();
    while ($e = mysqli_fetch_assoc($result)) {
        $return[] =  $e;
        return $return[0];
    }
}
function get_Students_Current_Level($id_School, $idOption, $id_Students)
{
    $conn = connectDB();
    $sql = "SELECT * FROM (SELECT  MAX(idRoll) as idRoll,idStudent,idLevel 
    FROM roll WHERE idStudent = $id_Students AND idSchool = $id_School AND `idOption` = $idOption GROUP BY idStudent) as subquery ORDER BY subquery.idRoll DESC";
    $result = $conn->query($sql);
    while ($e = mysqli_fetch_assoc($result)) {
        return  $e['idLevel'];
    }
}
function payment($idPayment, $values)
{
    $conn = connectDB();
    $sql = "UPDATE payment SET `montant` = $values, `date` = now() WHERE idPayment = $idPayment";
    $result = $conn->query($sql);
    header("Location:../pages/each-students.php");
    exit;
}
