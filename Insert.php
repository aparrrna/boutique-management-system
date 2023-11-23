<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Name = $_POST['txtName'];
    $Address = $_POST['txtAddress'];
    $City = $_POST['cmbCity'];
    $Email = $_POST['txtEmail'];
    $Mobile = $_POST['txtMobile'];
    $Gender = $_POST['rdGender'];
    $BirthDate = $_POST['txtDate'];
    $UserName = $_POST['txtUserName'];
    $Password = $_POST['txtPassword'];

    // Establish Connection with MySQLi
    $conn = new mysqli("localhost", "root", "", "shopping");

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare the SQL statement to insert the record
    $sql = "INSERT INTO customer_registration (CustomerName, Address, City, Email, Mobile, Gender, BirthDate, UserName, Password) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

    // Use prepared statement to prevent SQL injection
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssssss", $Name, $Address, $City, $Email, $Mobile, $Gender, $BirthDate, $UserName, $Password);

    // Execute the statement
    $stmt->execute();

    // Close the prepared statement and the connection
    $stmt->close();
    $conn->close();

    echo '<script type="text/javascript">alert("Registration Completed Successfully");window.location=\'index.php\';</script>';
}
?>
<form method="post" action="">
    <!-- Your registration form goes here -->
    <label for="txtName">Name:</label>
    <input type="text" name="txtName" id="txtName" required><br>

    <label for="txtAddress">Address:</label>
    <input type="text" name="txtAddress" id="txtAddress" required><br>

    <label for="cmbCity">City:</label>
    <select name="cmbCity" id="cmbCity" required>
        <option value="City1">City 1</option>
        <option value="City2">City 2</option>
        <!-- Add more cities as needed -->
    </select><br>

    <!-- Add the rest of your form fields -->

    <input type="submit" value="Register">
</form>
</body>
</html>
