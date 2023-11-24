<?php
$hostname_shop = "localhost";
$database_shop = "shopping";
$username_shop = "root";
$password_shop = "";

// Create connection
$conn = new mysqli($hostname_shop, $username_shop, $password_shop, $database_shop);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// You can now perform database operations using $conn

// Example query
$query = "SELECT * FROM customer_registration";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        // Process each row
        echo "Customer ID: " . $row["CustomerId"] . " - Name: " . $row["CustomerName"] . "<br>";
    }
} else {
    echo "0 results";
}

// Close connection
$conn->close();
?>
