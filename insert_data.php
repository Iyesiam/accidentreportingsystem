<?php
// Database configuration
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "a_repo_sys";

// Create a new connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the form data
$datetime = $_POST['datetime'];
$location = $_POST['location'];
$severity = $_POST['severity'];
$city = $_POST['city'];
$description = $_POST['description'];

// Check if any of the fields are empty
if (!empty($datetime) && !empty($location) && !empty($severity) && !empty($city) && !empty($description)) {
    // Prepare and execute the SQL query
    $sql = "INSERT INTO accidents (datetime, location, severity, city, description) VALUES ('$datetime', '$location', '$severity', '$city', '$description')";
    if ($conn->query($sql) === TRUE) {
        header("location: dashboard.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    echo '<script>alert("Error: All fields are required. Please fill in all the required fields."); window.location.href = "dashboard.php";</script>';
}

// Close the database connection
$conn->close();
?>
