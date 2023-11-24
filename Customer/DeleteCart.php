<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
$Id = $_GET['CartId'];

// Establish Connection with MYSQLi
$conn = new mysqli("localhost", "root", "", "shopping");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Specify the query to delete record
$sql = "DELETE FROM shopping_cart WHERE CartId='$Id'";

// Execute query
$conn->query($sql);

// Close The Connection
$conn->close();

echo '<script type="text/javascript">alert("Item Deleted Successfully");window.location=\'Cart.php\';</script>';
?>
</body>
</html>
