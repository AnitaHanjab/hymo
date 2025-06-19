<?php
session_start();
$firstname = isset($_SESSION['Firstname']) ? $_SESSION['Firstname'] : 'Unknown';
$lastname = isset($_SESSION['Lastname']) ? $_SESSION['Lastname'] : 'User';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Notifications | Hymetocean</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
  <link rel="stylesheet" href="admin.css" />
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
        <li><a href="user-notifcation.php" class="active"><span class="fa-solid fa-bell"></span><span>Notifications</span></a></li>
        <li><a href="user-verify.php"><span class="fa-solid fa-id-card"></span><span>Verify ID</span></a></li>
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
        Notifications
      </h2>
      <div class="search-wrapper">
        <span class="fa-solid fa-magnifying-glass"></span>
        <input type="search" placeholder="Search notifications..." />
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
      <div class="card">
        <div class="card-header">
          <h3>Recent Notifications</h3>
        </div>
        <div class="card-body">
          <div class="notification-list">
            <div class="notification-item">
              <span class="fa-solid fa-envelope-open-text"></span>
              <div class="notification-text">
                <h4>Your project "Water Quality Assessment" has been accepted.</h4>
                <small>3 hours ago</small>
              </div>
            </div>
            <div class="notification-item">
              <span class="fa-solid fa-file-circle-check"></span>
              <div class="notification-text">
                <h4>Progress report (60%) has been uploaded for "Marikina River Study".</h4>
                <small>1 day ago</small>
              </div>
            </div>
            <div class="notification-item">
              <span class="fa-solid fa-id-card-clip"></span>
              <div class="notification-text">
                <h4>Your ID verification has been approved by the admin.</h4>
                <small>2 days ago</small>
              </div>
            </div>
            <div class="notification-item">
              <span class="fa-solid fa-circle-check"></span>
              <div class="notification-text">
                <h4>Project "Air Monitoring - Coastal Zone" is marked as completed.</h4>
                <small>4 days ago</small>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>
  </div>
</body>
</html>
