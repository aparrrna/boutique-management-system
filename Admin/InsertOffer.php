<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php

$Valid = $_POST['txtDate'];
$txtName = $_POST['txtName'];
$txtDetail = $_POST['txtDetail'];

// Establish Connection with MYSQLi
$con = mysqli_connect("localhost", "root", "", "shopping");

// Check connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

// Specify the query to Insert Record
$sql = "INSERT INTO Offer_master (Offer, Detail, Valid) VALUES ('$txtName', '$txtDetail', '$Valid')";

// execute query
if (mysqli_query($con, $sql)) {
    echo '<script type="text/javascript">alert("Offer Created Successfully");window.location=\'Offers.php\';</script>';
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($con);
}

// Close The Connection
mysqli_close($con);

?>
</body>
</html>
