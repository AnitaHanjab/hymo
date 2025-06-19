<?php
$servername = "localhost"; // or 127.0.0.1
$username = "root";        // your MySQL username
$password = "";            // your MySQL password
$database = "logins";      // your database name

$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
