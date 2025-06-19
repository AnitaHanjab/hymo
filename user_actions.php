<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "logins";

$conn = new mysqli($host, $user, $pass, $db);

$action = $_POST['action'];
$id = $_POST['id'];

if ($action == "report") {
    $conn->query("UPDATE username SET report_count = report_count + 1 WHERE id = $id");
    
    $check = $conn->query("SELECT report_count FROM username WHERE id = $id");
    $data = $check->fetch_assoc();
    if ($data['report_count'] >= 3) {
        $conn->query("UPDATE username SET status = 'Deleted' WHERE id = $id");
    } else {
        $conn->query("UPDATE username SET status = 'Reported' WHERE id = $id");
    }
    echo "Reported";
} elseif ($action == "ban") {
    $conn->query("UPDATE username SET status = 'Banned' WHERE id = $id");
    echo "Banned";
} elseif ($action == "delete") {
    $conn->query("UPDATE username SET status = 'Deleted' WHERE id = $id");
    echo "Deleted";
} else {
    echo "Invalid Action";
}

$conn->close();
?>
