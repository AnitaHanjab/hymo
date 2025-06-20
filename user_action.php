

<?php
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "logins";

$conn = new mysqli($host, $user, $pass, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$id = $_POST['id'];
$action = $_POST['action'];

if ($action === 'report') {
  $conn->query("UPDATE username SET report_count = report_count + 1 WHERE Id = $id");

  // Auto-ban if report_count reaches 3
  $result = $conn->query("SELECT report_count FROM username WHERE Id = $id");
  $row = $result->fetch_assoc();
  if ($row['report_count'] >= 3) {
    $conn->query("UPDATE username SET status = 'Banned', ban_count = ban_count + 1 WHERE Id = $id");
  } else {
    $conn->query("UPDATE username SET status = 'Reported' WHERE Id = $id");
  }
} elseif ($action === 'ban') {
  $conn->query("UPDATE username SET status = 'Banned', ban_count = ban_count + 1 WHERE Id = $id");
} elseif ($action === 'unban') {
  $conn->query("UPDATE username SET status = 'Active' WHERE Id = $id");
} elseif ($action === 'delete') {
  $conn->query("DELETE FROM username WHERE Id = $id");
}

$conn->close();
?>
