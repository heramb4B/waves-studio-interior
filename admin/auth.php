<?php
session_start();
require "db.php";

$username = $_POST['username'];
$password = md5($_POST['password']); // match stored MD5 hash

$sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
$result = $conn->query($sql);

if ($result->num_rows === 1) {
    $_SESSION['admin_logged_in'] = true;
    header("Location: index.php");
    exit();
} else {
    echo "<script>
            alert('Invalid username or password!');
            window.location.href='login.php';
          </script>";
}
?>
