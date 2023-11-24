<?php
	session_start();
	$Id = $_GET['Id'];

	// Establish Connection with Database using MySQLi
	$conn = new mysqli("localhost", "root", "", "shopping");

	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}

	// Specify the query to execute
	$sql = "SELECT * FROM Item_Master WHERE ItemId=" . $Id;

	// Execute query
	$result = $conn->query($sql);

	// Loop through each record
	while ($row = $result->fetch_assoc()) {
	    $Id = $row['ItemId'];
	    $Name = $row['ItemName'];
	    $Description = $row['Description'];
	    $Size = $row['Size'];
	    $Price = $row['Price'];
	    $Discount = $row['Discount'];
	    $Total = $row['Total'];
	    $Image = $row['Image'];
	}

	$Qty = $_POST['txtQty'];
	$CID = $_SESSION['ID'];
	$ODate = date('y/m/d');
	$Net = $Total * $Qty;

	// Close The Connection
	$conn->close();

	// Establish Connection with MYSQLi
	$conn = new mysqli("localhost", "root", "", "shopping");

	// Specify the query to Insert Record
	$sql = "INSERT INTO Shopping_Cart (CustomerId, ItemName, Quantity, Price, Total, OrderDate) VALUES ($CID, '$Name', $Qty, $Total, $Net, '$ODate')";

	// execute query
	$conn->query($sql);

	// Close The Connection
	$conn->close();

	echo '<script type="text/javascript">alert("Item Added To the cart");window.location=\'Products.php\';</script>';
?>
