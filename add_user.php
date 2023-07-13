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
$email = $_POST['email'];
$username = $_POST['username'];
$phone = $_POST['phone'];
$password = $_POST['password'];

// Validate the input
if (!empty($email) && !empty($username) && !empty($phone) && !empty($password)) {
    // Check if the record already exists
    $checkSql = "SELECT * FROM users WHERE email='$email'";
    $result = $conn->query($checkSql);

    if ($result->num_rows > 0) {
        // Record already exists
        echo '<script>alert("The email \'' . $email . '\' already exists. Please choose a different email."); window.location.href = "dashboard.php";</script>';
    } else {
        // Record does not exist, insert the new record
        // Prepare and execute the SQL query
        $insertSql = "INSERT INTO users (email, username, phone, password) VALUES ('$email', '$username', '$phone', '$password')";
        if ($conn->query($insertSql) === TRUE) {
            header("location: dashboard.php");
        } else {
            echo "Error: " . $insertSql . "<br>" . $conn->error;
        }
    }
} else {
    // Handle empty or null values
    echo '<script>alert("Please fill in all the required fields."); window.location.href = "dashboard.php";</script>';
}

// Close the database connection
$conn->close();
?>
