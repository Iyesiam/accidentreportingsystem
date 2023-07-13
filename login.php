<?php
session_start();

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve the submitted username and password
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Add your database connection code here

    // Check the username and password against the database
    if ($username == 'iyesiam' && $password == 'kigali10') {
        // Authentication successful
        $_SESSION['username'] = $username;
        header('Location: dashboard.php');
        exit();
    } else {
        // Authentication failed
        echo 'Invalid username or password';
    }
}
?>
