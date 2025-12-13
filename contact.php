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
$name    = $conn->real_escape_string($_POST['name']);
$phone   = $conn->real_escape_string($_POST['phone']);
$email   = $conn->real_escape_string($_POST['email']);
$subject = $conn->real_escape_string($_POST['subject']);
$message = $conn->real_escape_string($_POST['message']);


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
