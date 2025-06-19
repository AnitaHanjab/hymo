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
  <title>User Dashboard | Hymetocean</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
  <link rel="stylesheet" href="admin.css" />
  <style>
    .progress-bar {
      background: #e0e0e0;
      border-radius: 4px;
      height: 8px;
      margin-top: 5px;
    }
    .progress-fill {
      background: #007bff;
      height: 8px;
      border-radius: 4px;
    }
    .btn-view, .btn-chat {
      padding: 4px 8px;
      background: #004080;
      color: white;
      border-radius: 4px;
      text-decoration: none;
      font-size: 12px;
    }
    .btn-view:hover, .btn-chat:hover {
      background: #002a5c;
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
        <li><a href="user-dashboard.php" class="active"><span class="fa-solid fa-computer"></span><span>Dashboard</span></a></li>
        <li><a href="user-order..php"><span class="fa-solid fa-cart-shopping"></span><span>My Orders</span></a></li>
        <li><a href="user-ongoing.php"><span class="fa-solid fa-spinner"></span><span>Ongoing Projects</span></a></li>
        <li><a href="user-completed.php"><span class="fa-solid fa-circle-check"></span><span>Completed Projects</span></a></li>
        <li><a href="user-notifcation.php"><span class="fa-solid fa-bell"></span><span>Notifications</span></a></li>
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
        Dashboard
      </h2>

      <div class="search-wrapper">
        <span class="fa-solid fa-magnifying-glass"></span>
        <input type="search" placeholder="Search projects..." />
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
      <div class="cards">
        <div class="card-single">
          <div>
            <h1>5</h1>
            <span>Ordered Services</span>
          </div>
          <div><span class="fa-solid fa-cart-shopping"></span></div>
        </div>

        <div class="card-single">
          <div>
            <h1>3</h1>
            <span>Ongoing Projects</span>
          </div>
          <div><span class="fa-solid fa-spinner"></span></div>
        </div>

        <div class="card-single">
          <div>
            <h1>8</h1>
            <span>Completed Projects</span>
          </div>
          <div><span class="fa-solid fa-circle-check"></span></div>
        </div>

        <div class="card-single">
          <div>
            <h1>4</h1>
            <span>Notifications</span>
          </div>
          <div><span class="fa-solid fa-bell"></span></div>
        </div>
      </div>

      <div class="recent-grid">
        <div class="Projects">
          <div class="card">
            <div class="card-header">
              <h3>My Ordered Projects</h3>
              <button>View All <span class="fa fa-arrow-circle-right"></span></button>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table width="100%">
                  <thead>
                    <tr>
                      <td>Project</td>
                      <td>Status</td>
                      <td>Progress</td>
                      <td>Actions</td>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>Water Quality Monitoring - Pasig River</td>
                      <td><span class="status orange"></span>Ongoing</td>
                      <td>
                        <div class="progress-bar">
                          <div class="progress-fill" style="width: 60%"></div>
                        </div>
                        <small>60%</small>
                      </td>
                      <td>
                        <a href="project-details.html" class="btn-view">View</a>
                        <a href="user-messages.html" class="btn-chat">Message</a>
                      </td>
                    </tr>
                    <tr>
                      <td>Wind Study - Coastal Area</td>
                      <td><span class="status pink"></span>Pending</td>
                      <td>
                        <div class="progress-bar">
                          <div class="progress-fill" style="width: 0%"></div>
                        </div>
                        <small>0%</small>
                      </td>
                      <td>
                        <a href="project-details.html" class="btn-view">View</a>
                        <a href="user-messages.html" class="btn-chat">Message</a>
                      </td>
                    </tr>
                    <tr>
                      <td>Hydro Study - Marikina</td>
                      <td><span class="status purple"></span>Completed</td>
                      <td>
                        <div class="progress-bar">
                          <div class="progress-fill" style="width: 100%"></div>
                        </div>
                        <small>100%</small>
                      </td>
                      <td>
                        <a href="project-details.html" class="btn-view">View</a>
                        <a href="user-messages.html" class="btn-chat">Message</a>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>

        <div class="customers">
          <div class="card">
            <div class="card-header">
              <h3>Recent Notifications</h3>
            </div>
            <div class="card-body">
              <div class="customer">
                <div class="info">
                  <span class="fa-solid fa-envelope-open-text"></span>
                  <div>
                    <h4>Your project "Pasig River" is now 60% done.</h4>
                    <small>2 hours ago</small>
                  </div>
                </div>
              </div>
              <div class="customer">
                <div class="info">
                  <span class="fa-solid fa-envelope-open-text"></span>
                  <div>
                    <h4>"Wind Study" was received and is under review.</h4>
                    <small>1 day ago</small>
                  </div>
                </div>
              </div>
              <div class="customer">
                <div class="info">
                  <span class="fa-solid fa-envelope-open-text"></span>
                  <div>
                    <h4>Account verified with submitted ID.</h4>
                    <small>3 days ago</small>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>
  </div>
</body>
</html>
