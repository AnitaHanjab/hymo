<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $id = $_POST['id'];
  $action = $_POST['action'];
  $status = '';

  switch ($action) {
    case 'report': $status = 'Reported'; break;
    case 'ban':    $status = 'Banned'; break;
    case 'unban':  $status = 'Active'; break;
    case 'delete': $status = 'Deleted'; break;
    default:       die("Invalid action.");
  }

  $stmt = $conn->prepare("UPDATE users SET status=? WHERE id=?");
  $stmt->bind_param("si", $status, $id);
  $stmt->execute();
  $stmt->close();
}

header("Location: account.php");
exit();
