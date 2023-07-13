<?php
session_start();

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve the submitted username and password
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Database connection details
    $host = 'localhost';
    $usernameDB = 'root';
    $passwordDB = '';
    $dbname = 'a_repo_sys';

    // Establish a database connection
    $conn = mysqli_connect($host, $usernameDB, $passwordDB, $dbname);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Prepare the SQL statement to retrieve the user from the database
    $query = "SELECT * FROM users WHERE username = ? AND password = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "ss", $username, $password);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    // Check if the query returns any rows
    if (mysqli_num_rows($result) > 0) {
        // Authentication successful
        $_SESSION['username'] = $username;
        header('Location: dashboard.php');
        exit();
    } else {
        // Authentication failed
        echo 'Invalid username or password';
    }

    // Close the database connection
    mysqli_close($conn);
}
?>
