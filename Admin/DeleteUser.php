<?php
$Id = $_GET['AdminId'];

// Establish Connection with MYSQL
$con = mysqli_connect("localhost", "root", "", "shopping");

// Check connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}

// Specify the query to Delete Record
$sql = "DELETE FROM Admin_Master WHERE AdminId = ?";

// Create a prepared statement
$stmt = mysqli_prepare($con, $sql);

// Bind parameters to the statement
mysqli_stmt_bind_param($stmt, "i", $Id);

// Execute the statement
mysqli_stmt_execute($stmt);

// Check for success
if (mysqli_stmt_affected_rows($stmt) > 0) {
    echo '<script type="text/javascript">alert("User Deleted Successfully");window.location=\'User.php\';</script>';
} else {
    echo '<script type="text/javascript">alert("Failed to delete user");window.location=\'User.php\';</script>';
}

// Close the statement and connection
mysqli_stmt_close($stmt);
mysqli_close($con);
?>
