<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tufblog";

try {
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    $conn->set_charset('utf8mb4');
} catch (mysqli_sql_exception $e) {
    die($e->getMessage());
}
