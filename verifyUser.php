<?php
include 'connect.php';

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['email'], $_POST['status'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $status = $_POST['status'] === "accept" ? 1 : 0;

    $query = "UPDATE username SET is_verified = $status WHERE Email = '$email'";
    echo mysqli_query($conn, $query) ? "success" : "error";
}
?>
