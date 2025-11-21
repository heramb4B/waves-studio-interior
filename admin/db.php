<?php
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "wave_studio_interior";

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("Database Error: " . $conn->connect_error);
}
?>
