<?php
include 'conn.php';

$id = $_POST['id'];
$status = $_POST['status'];

$stmt = $conn->prepare("UPDATE projects SET status=? WHERE id=?");
$stmt->bind_param("si", $status, $id);
$stmt->execute();
?>
