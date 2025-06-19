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
  <title>Projects | Admin Dashboard</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
  <link rel="stylesheet" href="admin.css" />

  <style>
    .add-project-form {
      background: #fff;
      margin: 2rem 0;
      padding: 1rem;
      border-radius: 5px;
    }

    .add-project-form input,
    .add-project-form textarea,
    .add-project-form select {
      margin: 0.5rem 0;
      padding: 0.5rem;
      width: 100%;
      border: 1px solid #ccc;
      border-radius: 4px;
    }

    .add-project-form button {
      margin-top: 0.5rem;
      padding: 0.6rem 1rem;
      border: none;
      border-radius: 6px;
      font-weight: 600;
      font-size: 0.9rem;
      cursor: pointer;
    }

    .btn-accept {
      background-color: #28a745;
      color: white;
    }

    .btn-accept:hover {
      background-color: #218838;
    }

    .btn-decline {
      background-color: #dc3545;
      color: white;
    }

    .btn-decline:hover {
      background-color: #c82333;
    }

    input[type="range"] {
      width: 100%;
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
        <li><a href="projects.php" class="active"><span class="fa-solid fa-diagram-project"></span><span>Projects</span></a></li>
        <li><a href="admin-notification.php"><span class="fa-regular fa-message"></span><span>Notification</span></a></li>
        <li><a href="account.php"><span class="fa-solid fa-users"></span><span>Accounts</span></a></li>
        <li><a href="logins.php"><span class="fa-solid fa-right-from-bracket"></span><span>Log out</span></a></li>
      </ul>
    </div>
  </div>

  <div class="main-content">
    <header>
      <h2>
        <label for="nav-toggle"><span class="fa-solid fa-bars"></span></label>
        Projects
      </h2>

      <div class="search-wrapper">
        <span class="fa-solid fa-magnifying-glass"></span>
        <input type="search" placeholder="Search here" />
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
      <!-- USER PROJECT SUBMISSION PREVIEW -->
      <div class="add-project-form">
        <h3>User Project Submission</h3>

        <label>Chosen Service:</label>
        <input type="text" value="Flood Risk Mapping" disabled />

        <label>Project Address:</label>
        <input type="text" value="123 Manila Road, Metro Manila" disabled />

        <label>Map Preview:</label>
        <iframe
          src="https://www.google.com/maps?q=123+Manila+Road,+Metro+Manila&output=embed"
          width="100%" height="200" style="border:0; margin-bottom: 1rem;" allowfullscreen>
        </iframe>

        <label>Additional Notes:</label>
        <textarea rows="4" disabled>
The area is frequently flooded and needs detailed elevation analysis for drainage planning.
        </textarea>

        <label>Supporting File:</label>
        <p><a href="#">Download: flood_assessment.pdf</a></p>

        <div style="margin-top: 1rem;">
          <button onclick="handleProject(true)" class="btn-accept">Accept</button>
          <button onclick="handleProject(false)" class="btn-decline">Decline</button>
        </div>
      </div>

      <!-- PROJECT LIST -->
      <div class="card" id="project-section" style="display: none;">
        <div class="card-header">
          <h3>Project List</h3>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table width="100%" id="project-table">
              <thead>
                <tr>
                  <td>Project Title</td>
                  <td>Progress</td>
                </tr>
              </thead>
              <tbody>
                <!-- Projects will appear here -->
              </tbody>
            </table>
          </div>
        </div>
      </div>

      <!-- NOTIFICATIONS -->
      <div class="card" id="notification-card" style="margin-top: 2rem;">
        <div class="card-header">
          <h3>Notifications</h3>
        </div>
        <div class="card-body">
          <ul id="notification-log" style="padding-left: 20px;"></ul>
        </div>
      </div>
    </main>
  </div>

  <script>
    function handleProject(accepted) {
      const notifLog = document.getElementById("notification-log");

      if (accepted) {
        document.getElementById("project-section").style.display = "block";

        const table = document.getElementById("project-table").getElementsByTagName("tbody")[0];
        const row = table.insertRow();
        row.innerHTML = `
          <td>Flood Risk Mapping at Manila Road</td>
          <td>
            <input type="range" min="0" max="100" value="0" oninput="updateProgress(this, this.nextElementSibling)" />
            <span>0%</span>
          </td>
        `;

        notifLog.innerHTML += `<li>✅ Project "<strong>Flood Risk Mapping at Manila Road</strong>" has been <strong>ACCEPTED</strong> and added to the list.</li>`;
      } else {
        notifLog.innerHTML += `<li>❌ Project "<strong>Flood Risk Mapping at Manila Road</strong>" has been <strong>DECLINED</strong>. User notified.</li>`;
      }
    }

    function updateProgress(slider, span) {
      span.textContent = slider.value + "%";
      const notifLog = document.getElementById("notification-log");
      notifLog.innerHTML += `<li>📊 Progress updated to <strong>${slider.value}%</strong> for "Flood Risk Mapping at Manila Road".</li>`;
    }
  </script>
</body>
</html>