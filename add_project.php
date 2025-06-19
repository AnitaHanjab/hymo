<?php
include 'conn.php';

$title = $_POST['title'];
$department = $_POST['department'];
$status = $_POST['status'];

$sql = "INSERT INTO projects (title, department, status) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sss", $title, $department, $status);

if ($stmt->execute()) {
  echo "success";
} else {
  echo "error";
}
?>
