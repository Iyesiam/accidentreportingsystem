<?php
session_start();

// Database configuration
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "a_repo_sys";

// Create a new connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get the form data
$datetime = $_POST['datetime'];
$location = $_POST['location'];
$severity = $_POST['severity'];
$city = $_POST['city'];
$description = $_POST['description'];

// Get the user ID from the session
$userID = $_SESSION['user_id'];

// Check if any of the fields are empty
if (!empty($datetime) && !empty($location) && !empty($severity) && !empty($city) && !empty($description)) {
    // Prepare and execute the SQL query
    $sql = "INSERT INTO accidents (datetime, location, severity, city, description, user_id) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "sssssi", $datetime, $location, $severity, $city, $description, $userID);

    if (mysqli_stmt_execute($stmt)) {
        header("location: viewrepo.php");
        exit();
    } else {
        echo "Error: " . mysqli_error($conn);
    }
} else {
    echo '<script>alert("Error: All fields are required. Please fill in all the required fields."); window.location.href = "dashboard.php";</script>';
}

// Close the database connection
mysqli_close($conn);
?>
