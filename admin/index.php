<?php
session_start();

// Redirect if not logged in
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: login.php");
    exit();
}

require "db.php"; // DB connection file

$result = $conn->query("SELECT id, name, phone, email, subject, message, time FROM contact_info ORDER BY time DESC");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="icon" type="image/png" href="assets/images/favicon.jpg" />
<meta charset="UTF-8">
<title>Admin Panel - Wave Studio</title>

<style>
    body {
        margin: 0;
        padding: 0;
        font-family: "Poppins", Arial, sans-serif;
        background: #f3f7f8;
    }

    .header {
        background: #0f3d3e;
        padding: 20px;
        color: #fff;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .header h1 {
        margin: 0;
        font-size: 28px;
        letter-spacing: 1px;
    }

    .logout-btn {
        background: #dc3545;
        padding: 10px 18px;
        border: none;
        border-radius: 6px;
        color: white;
        font-size: 15px;
        cursor: pointer;
        transition: 0.25s;
        text-decoration: none;
    }

    .logout-btn:hover {
        background: #c82333;
    }

    .container {
        padding: 25px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        background: white;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 4px 20px rgba(0,0,0,0.08);
    }

    th {
        background: #176b87;
        color: white;
        padding: 14px;
        font-size: 16px;
        text-align: left;
    }

    td {
        padding: 12px 14px;
        font-size: 15px;
        border-bottom: 1px solid #eee;
    }

    tr:hover {
        background: #f7fafa;
    }

    .no-data {
        text-align: center;
        padding: 20px;
        font-size: 18px;
        color: #666;
    }

    .delete-icon:hover {
    color: #b51c2a !important;
    transform: scale(1.15);
    transition: 0.2s;
}


</style>
</head>

<body>

<div class="header">
    <h1>Admin Panel</h1>
    <a href="logout.php" class="logout-btn">Logout</a>
</div>

<div class="container">

<?php
if ($result->num_rows > 0) {
    echo "<table>
            <tr>
                <th>S.No</th>
                <th>Name</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Project Type</th>
                <th>Message</th>
                <th>Time</th>
                <th>Action</th>
            </tr>";

   $sn = 1;
while ($row = $result->fetch_assoc()) {

    echo "<tr>
            <td>{$sn}</td>
            <td>{$row['name']}</td>
            <td>{$row['phone']}</td>
            <td>{$row['email']}</td>
            <td>{$row['subject']}</td>
            <td>{$row['message']}</td>
            <td>{$row['time']}</td>
            <td>
                <a href='delete.php?id={$row['id']}'
                   onclick=\"return confirm('Are you sure you want to delete this record?');\">
                   <span class='delete-icon' style='font-size:20px; color:#dc3545; cursor:pointer;'>🗑️</span>
                </a>
            </td>
          </tr>";

    $sn++;
}

    echo "</table>";
} else {
    echo "<p class='no-data'>No messages found.</p>";
}
?>

</div>

</body>
</html>
