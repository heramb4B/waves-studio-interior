<?php
// Database connection
$servername = "localhost";
$username   = "root";
$password   = "";
$dbname     = "wave_studio_interior";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch form data
$name    = $_POST['name'];
$phone   = $_POST['phone'];
$email   = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];

// Insert query
$sql = "INSERT INTO contact_info (name, phone, email, subject, message)
        VALUES ('$name', '$phone', '$email', '$subject', '$message')";

if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Message Sent Successfully'); window.location.href='contact.html';</script>";
} else {
    echo "<script>alert('Error sending message'); window.location.href='contact.html';</script>";
}


$conn->close();
?>
