<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Untitled Document</title>
</head>

<body>
<?php
	session_start();
	// Establish Connection with MySQL
	$con = new mysqli("localhost", "root", "", "shopping");

	// Check the connection
	if ($con->connect_error) {
	    die("Connection failed: " . $con->connect_error);
	}

	// Specify the query to Insert Record
	$sqlInsert = "INSERT INTO Shopping_Cart_Final(CustomerID, ItemName, Quantity, Price, Total, OrderDate)
	              SELECT CustomerID, ItemName, Quantity, Price, Total, OrderDate
	              FROM Shopping_Cart
	              WHERE CustomerID=".$_SESSION['ID']."";

	// Execute query
	$con->query($sqlInsert);

	// Specify the query to Delete Records
	$sqlDelete = "DELETE FROM Shopping_Cart WHERE CustomerID=".$_SESSION['ID']."";

	// Execute query
	$con->query($sqlDelete);

	// Close The Connection
	$con->close();

	echo '<script type="text/javascript">alert("Thank You For Your order");window.location=\'Cart.php\';</script>';
?>
</body>
</html>
