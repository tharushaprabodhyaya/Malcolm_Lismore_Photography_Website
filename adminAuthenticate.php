<?php

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Hardcoded admin credentials
    $adminUsername = 'Tharusha'; 
    $adminPassword = '2006'; 

    if ($username === $adminUsername && $password === $adminPassword) {
        // Set session variable to indicate successful login
        $_SESSION['admin_logged_in'] = true;
        $_SESSION['admin_username'] = $username;

        // Redirect to the admin dashboard
        echo "<script>alert('Login successful!');</script>";
        header("Location: admin.php");
        exit();
    } else {
        // Redirect back to the login page with an error message
        echo "<script>alert('Invalid username or password!'); window.location.href='adminLogin.php';</script>";
    }
}
?>