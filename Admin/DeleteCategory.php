<?php
// Assuming that $_GET['CatId'] is set and contains a valid category ID
$Id = $_GET['CatId'];

// Establish Connection with Database
$con = mysqli_connect("localhost", "root", "", "shopping");

// Check connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

// Specify the query to delete the record
$sql = "DELETE FROM category_master WHERE CategoryId = ?";
$stmt = mysqli_prepare($con, $sql);

// Bind the parameters
mysqli_stmt_bind_param($stmt, "i", $Id);

// Execute query
mysqli_stmt_execute($stmt);

// Close the statement
mysqli_stmt_close($stmt);

// Close the connection
mysqli_close($con);

// Redirect to Category.php after deletion
header("Location: Category.php");
exit();
?>
