<?php
session_start();
$UserName = $_POST['txtUserName'];
$Password = $_POST['txtPassword'];
$UserType = $_POST['rdType'];

if ($UserType == "Admin") {
    $con = new mysqli("localhost", "root", "", "shopping");

    if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
    }

    $sql = "SELECT * FROM Admin_Master WHERE UserName='$UserName' AND Password='$Password'";
    $result = $con->query($sql);

    if (!$result) {
        die("Query failed: " . $con->error);
    }

    $records = $result->num_rows;

    if ($records == 0) {
        echo '<script type="text/javascript">alert("Wrong UserName or Password");window.location=\'index.php\';</script>';
    } else {
        header("location:Admin/index.php");
    }

    $con->close();
} elseif ($UserType == "Customer") {
    $con = new mysqli("localhost", "root", "", "shopping");

    if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
    }

    $sql = "SELECT * FROM Customer_Registration WHERE UserName='$UserName' AND Password='$Password'";
    $result = $con->query($sql);

    if (!$result) {
        die("Query failed: " . $con->error);
    }

    $records = $result->num_rows;

    if ($records == 0) {
        echo '<script type="text/javascript">alert("Wrong Username or Password");window.location=\'index.php\';</script>';
    } else {
        $row = $result->fetch_assoc();
        $_SESSION['ID'] = $row['CustomerId'];
        $_SESSION['Name'] = $row['CustomerName'];
        header("location:Customer/index.php");
    }

    $con->close();
}
?>
