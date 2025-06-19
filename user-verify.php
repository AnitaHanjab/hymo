<?php
session_start();

include 'connect.php';

$email = isset($_SESSION['Email']) ? $_SESSION['Email'] : '';

$query = mysqli_query($conn, "SELECT id_attachment, is_verified FROM username WHERE Email = '$email'");
$row = mysqli_fetch_assoc($query);

$idPath = $row ? $row['id_attachment'] : '';
$isVerified = $row ? (int)$row['is_verified'] : 0;

$firstname = isset($_SESSION['Firstname']) ? $_SESSION['Firstname'] : 'Unknown';
$lastname = isset($_SESSION['Lastname']) ? $_SESSION['Lastname'] : 'User';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Verify ID | Hymetocean</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
  <link rel="stylesheet" href="admin.css" />
  <style>
    .verify-section {
      background: #fff;
      padding: 30px;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0,0,0,0.05);
      max-width: 600px;
      margin: 30px auto;
    }
    .verify-section h3 {
      margin-bottom: 20px;
    }
    .attachment-box {
      padding: 15px;
      border: 1px solid #ccc;
      background: #f9f9f9;
      border-radius: 5px;
      margin-top: 10px;
    }
    .verified-status {
      color: green;
      font-weight: bold;
    }
    .security-note {
      font-size: 0.9em;
      color: #555;
      margin-top: 20px;
    }
    .id-preview img {
      max-width: 100%;
      border-radius: 6px;
      border: 1px solid #ccc;
      margin-top: 10px;
    }
  </style>
</head>
<body>
  <input type="checkbox" id="nav-toggle">
  <div class="sidebar">
    <div class="sidebar-brand">
      <h2><span class="fa-solid fa-water"></span> <span>Hymetocean</span></h2>
    </div>
    <div class="sidebar-menu">
      <ul>
        <li><a href="user-dashboard.php"><span class="fa-solid fa-computer"></span><span>Dashboard</span></a></li>
        <li><a href="user-order..php"><span class="fa-solid fa-cart-shopping"></span><span>My Orders</span></a></li>
        <li><a href="user-ongoing.php"><span class="fa-solid fa-spinner"></span><span>Ongoing Projects</span></a></li>
        <li><a href="user-completed.php"><span class="fa-solid fa-circle-check"></span><span>Completed Projects</span></a></li>
        <li><a href="user-notifcation.php"><span class="fa-solid fa-bell"></span><span>Notifications</span></a></li>
        <li><a href="user-verify.php" class="active"><span class="fa-solid fa-id-card"></span><span>Verify ID</span></a></li>
        <li><a href="logins.php"><span class="fa-solid fa-right-from-bracket"></span><span>Log out</span></a></li>
      </ul>
    </div>
  </div>

  <div class="main-content">
    <header>
      <h2>
        <label for="nav-toggle">
          <span class="fa-solid fa-bars"></span>
        </label>
        Verified Identity
      </h2>
      <div class="search-wrapper">
        <span class="fa-solid fa-magnifying-glass"></span>
        <input type="search" placeholder="Search..." />
      </div>
      <div class="user-wrapper">
        <img src="img/user-p1.jpg" width="30" height="30" alt="User">
        <div>
          <h4><?= htmlspecialchars($firstname . ' ' . $lastname) ?></h4>
          <small>Client</small>
        </div>
      </div>
    </header>

    <main>
      <div class="verify-section">
        <h3>ID Verification Summary</h3>
        <p><strong>Status:</strong> 
          <span class="verified-status" style="color: <?= $isVerified ? 'green' : 'red' ?>;">
            <?= $isVerified ? 'Verified' : 'Not Verified' ?>
          </span>
        </p>


        <div class="attachment-box">
          <p><strong>Valid ID Submitted:</strong></p>
          <div class="id-preview">
            <?php if (!empty($idPath)): ?>
              <img src="uploads/valid_ids/<?= htmlspecialchars($idPath) ?>" alt="Uploaded ID" />
            <?php else: ?>
              <p>No ID uploaded.</p>
            <?php endif; ?>
          </div>
        </div>

        <div class="security-note">
          <p><strong>Note:</strong> Your verified ID is securely stored and protected under data privacy protocols. If there are changes in your identity documentation, please contact support to update your records.</p>
        </div>
      </div>
    </main>
  </div>
</body>
</html>
