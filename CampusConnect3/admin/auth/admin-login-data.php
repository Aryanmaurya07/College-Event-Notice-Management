<?php
session_start();
include '../../includes/db_connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = mysqli_real_escape_string($conn, $_POST['adminEmail']);
    $password = mysqli_real_escape_string($conn, $_POST['adminPassword']);

    $query = "SELECT * FROM admin WHERE email = '$email' LIMIT 1";
    $result = $conn->query($query);

    if ($result && $result->num_rows === 1) {
        $admin = $result->fetch_assoc();

        if ($password === $admin['password']) {
            $_SESSION['admin_logged_in'] = true;
            $_SESSION['admin_email'] = $email;
            header("Location: ../dashboard.php");
            exit();
        } else {
            header("Location: admin_login.php?error=Invalid Password");
            exit();
        }
    } else {
        header("Location: admin_login.php?error=Admin Not Found");
        exit();
    }
} else {
    header("Location: admin_login.php");
    exit();
}
