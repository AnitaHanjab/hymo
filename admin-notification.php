<?php
session_start();
$firstname = isset($_SESSION['Firstname']) ? $_SESSION['Firstname'] : 'Unknown';
$lastname = isset($_SESSION['Lastname']) ? $_SESSION['Lastname'] : 'User';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Messages | Admin Dashboard</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
  <link rel="stylesheet" href="admin.css" />
  <style>
    .message-card {
      background: #fff;
      padding: 1rem;
      margin-bottom: 1rem;
      border-radius: 8px;
      display: flex;
      align-items: flex-start;
      gap: 1rem;
      box-shadow: 0 1px 4px rgba(0,0,0,0.1);
    }
    .message-card img {
      border-radius: 50%;
      width: 60px;
      height: 60px;
      object-fit: cover;
    }
    .message-content h4 {
      margin-bottom: 0.2rem;
    }
    .message-content p {
      margin: 0.3rem 0;
      font-size: 0.9rem;
      color: #333;
    }
    .message-content .label {
      font-weight: 600;
      color: #555;
    }
    .message-content .attachment {
      color: var(--main-color);
    }
  </style>
</head>
<body>
  <input type="checkbox" id="nav-toggle" />
  <div class="sidebar">
    <div class="sidebar-brand">
      <h2><span class="fa-solid fa-water"></span> <span>HYMETOCEAN PEERS CO.</span></h2>
    </div>
    <div class="sidebar-menu">
      <ul>
        <li><a href="admin.php"><span class="fa-solid fa-computer"></span><span>Dashboard</span></a></li>
        <li><a href="verification.php"><span class="fa-solid fa-users-rectangle"></span><span>Verification</span></a></li>
        <li><a href="projects.php"><span class="fa-solid fa-diagram-project"></span><span>Projects</span></a></li>
        <li><a href="admin-notification.php" class="active"><span class="fa-regular fa-message"></span><span>Notification</span></a></li>
        <li><a href="account.php"><span class="fa-solid fa-users"></span><span>Accounts</span></a></li>
        <li><a href="logins.php"><span class="fa-solid fa-right-from-bracket"></span><span>Log out</span></a></li>
      </ul>
    </div>
  </div>

  <div class="main-content">
    <header>
      <h2>
        <label for="nav-toggle"><span class="fa-solid fa-bars"></span></label>
        Notification
      </h2>

      <div class="search-wrapper">
        <span class="fa-solid fa-magnifying-glass"></span>
        <input type="search" placeholder="Search messages" />
      </div>

      <div class="user-wrapper">
        <img src="img/admin-p2.jpg" width="30px" height="30px" alt="" />
        <div>
          <h4><?= htmlspecialchars($firstname . ' ' . $lastname) ?></h4>
          <small>Admin</small>
        </div>
      </div>
    </header>

    <main>
      <div class="card">
        <div class="card-header">
          <h3>Client Messages</h3>
        </div>

        <div class="card-body">

          <div class="message-card">
            <img src="img/user-p1.jpg" alt="Client Profile" />
            <div class="message-content">
              <h4>Donel Lopez</h4>
              <p><span class="label">Email:</span> donel@example.com</p>
              <p><span class="label">Requested Project:</span> Hydrodynamic Modeling</p>
              <p><span class="label">Attachment:</span> <span class="attachment">donel_scope.pdf</span></p>
              <p><span class="label">Message:</span> I would like to request a consultation about the Marikina River study and see if your team can assist with simulations.</p>
            </div>
          </div>

          <div class="message-card">
            <img src="img/user-p1.jpg" alt="Client Profile" />
            <div class="message-content">
              <h4>Phoebe Lagos</h4>
              <p><span class="label">Email:</span> phoebe.lagos@gmail.com</p>
              <p><span class="label">Requested Project:</span> Real-Time Water Quality Monitoring</p>
              <p><span class="label">Attachment:</span> <span class="attachment">river-data.xlsx</span></p>
              <p><span class="label">Message:</span> Hello! I am a student working on a thesis about water quality sensors. May I get data or project references from your team?</p>
            </div>
          </div>

          <div class="message-card">
            <img src="img/user-p1.jpg" alt="Client Profile" />
            <div class="message-content">
              <h4>Joseph Joestar</h4>
              <p><span class="label">Email:</span> joseph.j@joestar.com</p>
              <p><span class="label">Requested Project:</span> Coastal Mapping</p>
              <p><span class="label">Attachment:</span> <span class="attachment">satellite_request.zip</span></p>
              <p><span class="label">Message:</span> I need multitemporal satellite images for coastal zone analysis. Do you offer that service?</p>
            </div>
          </div>

        </div>
      </div>
    </main>
  </div>
</body>
</html>
