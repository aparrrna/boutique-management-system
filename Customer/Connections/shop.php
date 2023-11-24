<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
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
?>
