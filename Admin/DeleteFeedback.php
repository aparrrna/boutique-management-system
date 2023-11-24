<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Untitled Document</title>
</head>

<body>
<?php
// Check if FeedbackId is set in the URL
if (isset($_GET['FeedbackId'])) {
    $Id = $_GET['FeedbackId'];

    // Establish Connection with MYSQLi
    $conn = new mysqli("localhost", "root", "", "shopping");

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Specify the query to delete the record
    $sql = "DELETE FROM Feedback_Master WHERE FeedbackId = ?";
    
    // Prepare the statement
    $stmt = $conn->prepare($sql);

    // Bind parameters
    $stmt->bind_param("i", $Id);

    // Execute the statement
    $stmt->execute();

    // Close The Connection
    $stmt->close();
    $conn->close();

    echo '<script type="text/javascript">alert("Feedback Deleted Successfully");window.location=\'Feedback.php\';</script>';
} else {
    // Redirect to Feedback.php if FeedbackId is not set
    header("Location: Feedback.php");
    exit();
}
?>
</body>
</html>
