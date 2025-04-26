<?php
include "../../inc/function.php";
if (isset($_GET['query']) && isset($_GET['idLevel'])) {
    $query = $_GET['query'];
    $idLevel = $_GET['idLevel'];
    $idSession = $_SESSION['idSession'];
    $idOption = $_SESSION['idOption'];
    $year = $_SESSION['current_Year'];
    $conn = connectDB();
    $sql = "SELECT * FROM (
                SELECT *
                FROM (
                    SELECT YEAR(date) AS years, idLevel, idStudent, idOption, idSession
                    FROM roll
                ) AS subquery
                WHERE idLevel = ? AND idSession = ? AND years = ? AND idOption = ?
            ) AS secondSubquery
            JOIN students ON secondSubquery.idStudent = students.idStudent
            WHERE students.studentsName LIKE ? OR students.StudentsFirstName LIKE ?";
    if ($stmt = $conn->prepare($sql)) {
        $likeQuery = '%' . $query . '%';
        $stmt->bind_param("iiiiss", $idLevel, $idSession, $year, $idOption, $likeQuery, $likeQuery);
        $stmt->execute();
        $result = $stmt->get_result();
        $students = array();
        while ($row = $result->fetch_assoc()) {
            $students[] = $row;
        }
        echo json_encode($students);
        $result->free();
        $stmt->close();
    }
}
?>
