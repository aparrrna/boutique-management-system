<?php
$Id = $_GET['OfferId'];

// Establish Connection with MySQLi
$con = mysqli_connect("localhost", "root", "", "shopping");

// Check connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

// Specify the query to delete the record
$sql = "DELETE FROM Offer_Master WHERE OfferId='" . $Id . "'";

// Execute query
if (mysqli_query($con, $sql)) {
    echo '<script type="text/javascript">alert("Offer Deleted Successfully");window.location=\'Offers.php\';</script>';
} else {
    echo "Error deleting record: " . mysqli_error($con);
}

// Close the connection
mysqli_close($con);
?>
