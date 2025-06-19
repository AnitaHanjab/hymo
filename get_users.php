<?php
$host = "localhost";
$user = "root";
$pass = ""; // Change this if your MySQL has a password
$dbname = "logins";

// Connect to DB
$conn = new mysqli($host, $user, $pass, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query all users from 'username' table
$sql = "SELECT Id, Firstname, Lastname, Email, status, report_count, ban_count, Role FROM username";
$result = $conn->query($sql);

$users = [];

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $users[] = $row;
    }
}

echo json_encode($users);
$conn->close();
?>
