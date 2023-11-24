<?php
if (!isset($_SESSION)) {
    session_start();
}

$FeedBack = $_POST['txtFeedback'];
$FDate = date('y/m/d');
$Id = $_SESSION['ID'];

// Establish Connection with MYSQL
$con = new mysqli("localhost", "root", "", "shopping");

// Check the connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

// Specify the query to Insert Record
$sql = "INSERT INTO feedback_master(CustomerId, Feedback, Date) VALUES ('$Id', '$FeedBack', '$FDate')";

// execute query
if ($con->query($sql) === TRUE) {
    echo '<script type="text/javascript">alert("Feedback Given Successfully");window.location=\'Feedback.php\';</script>';
} else {
    echo "Error: " . $sql . "<br>" . $con->error;
}

// Close The Connection
$con->close();
?>
