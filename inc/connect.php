<?php
function connectDB()
{
    $host = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = 'AEC';
    $conn = new mysqli($host, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("ERROR ! Please make sure that Xampp is already opened " . $conn->connect_error);
    }
    return $conn;
}
