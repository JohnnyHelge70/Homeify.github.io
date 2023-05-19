<?php
// Database configuration
$dbHost = 'localhost';     // Hostname
$dbUsername = 'root';      // Database username
$dbPassword = '';          // Database password (empty for no password)
$dbName = 'homeify';       // Database name

// Create database connection
$conn = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
