
<?php
// Establish a database connection
$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'a_repo_sys';

$conn = mysqli_connect($host, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if the delete request is sent
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Prepare the delete query
    $sql = "DELETE FROM users WHERE id = ?";
    
    // Create a prepared statement
    $stmt = mysqli_prepare($conn, $sql);
    
    // Bind the parameter
    mysqli_stmt_bind_param($stmt, "i", $id);
    
    // Execute the statement
    mysqli_stmt_execute($stmt);
    
    // Check if the deletion was successful
    if (mysqli_stmt_affected_rows($stmt) > 0) {
        // Redirect to the dashboard.php page
        header("Location: dashboard.php");
        exit();
    } else {
        // Display an error message
        echo "Error: Unable to delete the record.";
        header("Location:dashboard.php");
    }
}

// Close the database connection
mysqli_close($conn);
?>
