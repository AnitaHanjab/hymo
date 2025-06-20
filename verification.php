<?php
session_start();
include 'connect.php';

// Fetch all users with uploaded IDs
$users = mysqli_query($conn, "SELECT * FROM username WHERE id_attachment IS NOT NULL");

$firstname = $_SESSION['Firstname'] ?? 'Unknown';
$lastname = $_SESSION['Lastname'] ?? 'User';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Admin Dashboard - ID Verification</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
  <link rel="stylesheet" href="admin.css" />
  <style>
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
    .btn-accept { background-color: #28a745; color: #fff; }
    .btn-accept:hover { background-color: #218838; }
    .btn-decline { background-color: #dc3545; color: #fff; }
    .btn-decline:hover { background-color: #c82333; }
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
      <img src="img/admin-p2.jpg" width="30" height="30" alt="Admin">
      <div>
        <h4><?= htmlspecialchars($firstname . ' ' . $lastname) ?></h4>
        <small>Admin</small>
      </div>
    </div>
  </header>

  <main>
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
              <?php while ($user = mysqli_fetch_assoc($users)): ?>
                <?php
                  $fullName = htmlspecialchars($user['Firstname'] . ' ' . $user['Lastname']);
                  $role = htmlspecialchars($user['Role'] ?? 'Client');
                  $email = htmlspecialchars($user['Email']);
                  $file = htmlspecialchars($user['id_attachment']);
                  $status = (int)$user['is_verified'];
                ?>
                <tr>
                  <td><?= $fullName ?></td>
                  <td><?= $role ?></td>
                  <td>
                    <a href="uploads/valid_ids/<?= $file ?>" target="_blank">View ID</a>
                  </td>
                  <td id="status-<?= $email ?>" style="color: <?= $status ? 'green' : 'orange' ?>">
                    <?= $status ? 'Verified' : 'Pending' ?>
                  </td>
                  <td>
                    <?php if (!$status): ?>
                      <button onclick="verifyID(this, '<?= $email ?>', true)" class="btn-verify btn-accept">Accept</button>
                      <button onclick="verifyID(this, '<?= $email ?>', false)" class="btn-verify btn-decline">Decline</button>
                    <?php else: ?>
                      <span style="color:gray;">No Action Needed</span>
                    <?php endif; ?>
                  </td>
                </tr>
              <?php endwhile; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </main>
</div>

<script>
  function verifyID(button, email, accepted) {
    const row = button.closest("tr");
    const statusCell = row.querySelector("td[id^='status']");
    const status = accepted ? "accept" : "decline";

    fetch("verifyUser.php", {
      method: "POST",
      headers: { "Content-Type": "application/x-www-form-urlencoded" },
      body: `email=${encodeURIComponent(email)}&status=${status}`
    })
    .then(res => res.text())
    .then(response => {
      if (response.trim() === "success") {
        statusCell.textContent = accepted ? "Verified" : "Declined";
        statusCell.style.color = accepted ? "green" : "red";
        const buttons = row.querySelectorAll("button");
        buttons.forEach(btn => btn.disabled = true);
      } else {
        alert("Failed to update status. Try again.");
      }
    });
  }
</script>

</body>
</html>
