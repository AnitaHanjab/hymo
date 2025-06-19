<?php
// Update these values as needed for your setup
$host = "localhost";
$user = "root";
$password = ""; // usually empty on localhost
$database = "admin_dashboard"; // use your actual DB name

// Create connection
$conn = mysqli_connect($host, $user, $password, $database);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
