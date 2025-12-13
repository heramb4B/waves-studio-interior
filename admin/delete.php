<?php
session_start();

// Protect route
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: login.php");
    exit();
}

require "db.php";

$id = intval($_GET['id']);

$sql = "DELETE FROM contact_info WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    echo "<script>
            alert('Record deleted successfully');
            window.location.href='index.php';
          </script>";
} else {
    echo "<script>
            alert('Error deleting record');
            window.location.href='index.php';
          </script>";
}
?>
