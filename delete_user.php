<?php
include 'db.php';

$userId = $_POST['id'];

$stmt = $conn->prepare("UPDATE users SET status = 'deleted' WHERE id = ?");
$stmt->bind_param("i", $userId);
$stmt->execute();

echo "Deleted";
