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
  <title>Admin Dashboard</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
  <link rel="stylesheet" href="admin.css" />

  <style>
    /* Custom styles for Accept/Decline buttons */
    .btn-verify {
      padding: 6px 14px;
      margin: 2px;
      border: none;
      border-radius: 6px;
      font-weight: 600;
      cursor: pointer;
      font-size: 0.9rem;
      transition: all 0.2s ease-in-out;
    }

    .btn-accept {
      background-color: #28a745;
      color: #fff;
    }

    .btn-accept:hover {
      background-color: #218838;
    }

    .btn-decline {
      background-color: #dc3545;
      color: #fff;
    }

    .btn-decline:hover {
      background-color: #c82333;
    }

    #id-verification-table a {
      color: var(--main-color);
      font-weight: 500;
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
      <li><a href="verification.php" class="active"><span class="fa-solid fa-users-rectangle"></span><span>Verification</span></a></li>
      <li><a href="projects.php"><span class="fa-solid fa-diagram-project"></span><span>Projects</span></a></li>
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
      Dashboard
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
    <!-- ... Dashboard cards and recent projects ... -->

    <!-- Valid ID Verification Section -->
    <div class="card" style="margin-top: 2rem;">
      <div class="card-header">
        <h3>Valid ID Submissions</h3>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table width="100%" id="id-verification-table">
            <thead>
              <tr>
                <td>User</td>
                <td>Role</td>
                <td>Valid ID</td>
                <td>Status</td>
                <td>Action</td>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Donel Lopez</td>
                <td>Businessman</td>
                <td><a href="img/id-donel.jpg" target="_blank">View ID</a></td>
                <td id="status-donel">Pending</td>
                <td>
                  <button onclick="verifyID(this, true)" class="btn-verify btn-accept">Accept</button>
                  <button onclick="verifyID(this, false)" class="btn-verify btn-decline">Decline</button>
                </td>
              </tr>
              <tr>
                <td>Phoebe Lagos</td>
                <td>Student</td>
                <td><a href="img/id-phoebe.jpg" target="_blank">View ID</a></td>
                <td id="status-phoebe">Pending</td>
                <td>
                  <button onclick="verifyID(this, true)" class="btn-verify btn-accept">Accept</button>
                  <button onclick="verifyID(this, false)" class="btn-verify btn-decline">Decline</button>
                </td>
              </tr>
              <!-- Add more rows as needed -->
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </main>
</div>

<script>
  function verifyID(button, accepted) {
    const row = button.closest("tr");
    const statusCell = row.querySelector("td[id^='status']");
    if (accepted) {
      statusCell.textContent = "Verified";
      statusCell.style.color = "green";
    } else {
      statusCell.textContent = "Declined";
      statusCell.style.color = "red";
    }

    // Disable buttons after action
    const buttons = row.querySelectorAll("button");
    buttons.forEach(btn => btn.disabled = true);
  }
</script>

</body>
</html>
