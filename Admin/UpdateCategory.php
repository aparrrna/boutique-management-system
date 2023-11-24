<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
$Id = $_POST['txtId'];
$Name = $_POST['txtName'];
$Desc = $_POST['txtDesc'];

// Establish Connection with MySQL using MySQLi
$con = mysqli_connect("localhost", "root", "", "shopping");

// Check connection
if (mysqli_connect_errno()) {
    die("Failed to connect to MySQL: " . mysqli_connect_error());
}

// Specify the query to Update Record
$sql = "UPDATE Category_Master SET CategoryName='".$Name."', Description='".$Desc."' WHERE CategoryId=".$Id;

// Execute query
if (mysqli_query($con, $sql)) {
    echo '<script type="text/javascript">alert("Category Updated Successfully");window.location=\'Category.php\';</script>';
} else {
    echo "Error updating record: " . mysqli_error($con);
}

// Close The Connection
mysqli_close($con);
?>
</body>
</html>
