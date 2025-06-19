<?php
// Connect to the database
$conn = new mysqli("localhost", "root", "", "logins");

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL query to fetch Firstname, Lastname, Email
$sql = "SELECT Firstname, Lastname, Email FROM username";
$result = $conn->query($sql);

// Output each user as a styled HTML block
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "
        <div class='customer'>
            <div class='info'>
                <img src='img/user-p1.jpg' width='40px' height='40px' alt=''>
                <div>
                    <h4>{$row['Firstname']} {$row['Lastname']}</h4>
                    <small>{$row['Email']}</small>
                </div>
            </div>
            <div class='contact'>
                <span class='fa fa-user-circle'></span>
                <span class='fa fa-comment'></span>
                <span class='fa fa-phone'></span>
            </div>
        </div>";
    }
} else {
    echo "<p>No clients found.</p>";
}

$conn->close();
?>
