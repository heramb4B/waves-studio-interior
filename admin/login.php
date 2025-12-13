<?php
session_start();

// Redirect if already logged in
if (isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] === true) {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Admin Login</title>

<style>
    body {
        margin: 0;
        padding: 0;
        font-family: "Poppins", Arial, sans-serif;
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        background: linear-gradient(135deg, #1b7a7a, #0f3d3e);
        color: #fff;
    }

    .login-box {
        width: 350px;
        padding: 40px;
        background: rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(10px);
        border-radius: 12px;
        box-shadow: 0 8px 25px rgba(0,0,0,0.2);
    }

    .login-box h2 {
        text-align: center;
        margin-bottom: 25px;
        font-size: 26px;
        font-weight: 600;
    }

    .login-box input {
        width: 100%;
        padding: 12px;
        margin: 10px 0;
        border-radius: 8px;
        border: none;
        font-size: 15px;
    }

    .btn {
        width: 100%;
        padding: 12px;
        margin-top: 15px;
        background: #27c09e;
        color: #fff;
        border: none;
        border-radius: 8px;
        cursor: pointer;
        font-size: 16px;
        font-weight: 600;
        transition: 0.3s;
    }

    .btn:hover {
        background: #1fa98c;
    }
</style>

</head>

<body>

<div class="login-box">
    <h2>Admin Login</h2>

    <form method="POST" action="auth.php">
        <input type="text" name="username" placeholder="Username" required>

        <input type="password" name="password" placeholder="Password" required>

        <button class="btn" type="submit">Login</button>
    </form>
</div>

</body>
</html>
