<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: login_form.php');
    exit();
}

// Check if the delete request is sent
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Database configuration
    $host = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = 'a_repo_sys';

    // Create a new connection
    $conn = mysqli_connect($host, $username, $password, $dbname);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Prepare the delete query
    $sql = "DELETE FROM accidents WHERE id = ?";

    // Create a prepared statement
    $stmt = mysqli_prepare($conn, $sql);

    // Bind the parameter
    mysqli_stmt_bind_param($stmt, "i", $id);

    // Execute the statement
    mysqli_stmt_execute($stmt);

    // Check if the deletion was successful
    if (mysqli_stmt_affected_rows($stmt) > 0) {
        // Redirect to the appropriate page based on the user's role
        if ($_SESSION['role'] == 'admin') {
            header("Location: dashboard.php");
        } else {
            header("Location: viewrepo.php");
        }
        exit();
    } else {
        // Display an error message
        echo "Error: Unable to delete the record.";
    }

    // Close the statement
    mysqli_stmt_close($stmt);

    // Close the database connection
    mysqli_close($conn);
}
?>
