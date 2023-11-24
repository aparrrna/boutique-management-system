<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Untitled Document</title>
</head>

<body>
<?php
// Get form data
$Name = $_POST['txtName'];
$Desc = $_POST['txtDesc'];

// File upload
$path1 = $_FILES["txtFile"]["name"];
move_uploaded_file($_FILES["txtFile"]["tmp_name"], "../Products/" . $_FILES["txtFile"]["name"]);

// Establish Connection with MYSQL using MySQLi
$con = mysqli_connect("localhost", "root", "", "shopping");

// Check connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

// Prepare and bind the query
$sql = "INSERT INTO Category_Master (CategoryName, Description, Image) VALUES (?, ?, ?)";
$stmt = mysqli_prepare($con, $sql);
mysqli_stmt_bind_param($stmt, "sss", $Name, $Desc, $path1);

// Execute the query
mysqli_stmt_execute($stmt);

// Check for successful insertion
if (mysqli_affected_rows($con) > 0) {
    echo '<script type="text/javascript">alert("Category Inserted Successfully"); window.location=\'Category.php\';</script>';
} else {
    echo '<script type="text/javascript">alert("Failed to Insert Category"); window.location=\'Category.php\';</script>';
}

// Close The Connection
mysqli_stmt_close($stmt);
mysqli_close($con);
?>
</body>
</html>
