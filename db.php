

<?php
// db_connect.php

// Database connection settings
$host = 'localhost';  // Your database host
$dbname = 'pizza';  // Your database name
$username = 'root';  // Your database username
$password = '';  // Your database password

// Create a connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>