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
  <title>Project History | Hymetocean</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
  <link rel="stylesheet" href="admin.css" />
  <style>
    .project-feedback select {
      padding: 3px;
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
        <li><a href="user-completed.php" class="active"><span class="fa-solid fa-clock-rotate-left"></span><span>Project History</span></a></li>
        <li><a href="user-notifcation.php"><span class="fa-solid fa-bell"></span><span>Notifications</span></a></li>
        <li><a href="user-verify.php"><span class="fa-solid fa-id-card"></span><span>Verify ID</span></a></li>
        <li><a href="user-order-service.php"><span class="fa-solid fa-plus-circle"></span><span>Order a Service</span></a></li>
        <li><a href="front.php"><span class="fa-solid fa-home"></span><span>Home</span></a></li>
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
        Project History
      </h2>
      <div class="search-wrapper">
        <span class="fa-solid fa-magnifying-glass"></span>
        <input type="search" placeholder="Search project history..." />
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
          <h3>Project History</h3>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table width="100%">
              <thead>
                <tr>
                  <td>Project</td>
                  <td>Category</td>
                  <td>Date Completed</td>
                  <td>Progress</td>
                  <td>Feedback</td>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Marine Water Quality Survey</td>
                  <td>Water Quality</td>
                  <td>June 10, 2025</td>
                  <td>
                    <div style="background: #ddd; border-radius: 5px;">
                      <div style="width: 100%; background: #28a745; color: white; padding: 2px 5px; border-radius: 5px; text-align: center;">100%</div>
                    </div>
                  </td>
                  <td class="project-feedback">
                    <form>
                      <select name="rating">
                        <option>⭐</option>
                        <option>⭐⭐</option>
                        <option>⭐⭐⭐</option>
                        <option>⭐⭐⭐⭐</option>
                        <option>⭐⭐⭐⭐⭐</option>
                      </select>
                      <button type="submit">Submit</button>
                    </form>
                  </td>
                </tr>
                <tr>
                  <td>Wind Potential Mapping - Ilocos</td>
                  <td>Energy Study</td>
                  <td>May 25, 2025</td>
                  <td>
                    <div style="background: #ddd; border-radius: 5px;">
                      <div style="width: 100%; background: #28a745; color: white; padding: 2px 5px; border-radius: 5px; text-align: center;">100%</div>
                    </div>
                  </td>
                  <td class="project-feedback">
                    <form>
                      <select name="rating">
                        <option>⭐</option>
                        <option>⭐⭐</option>
                        <option>⭐⭐⭐</option>
                        <option>⭐⭐⭐⭐</option>
                        <option>⭐⭐⭐⭐⭐</option>
                      </select>
                      <button type="submit">Submit</button>
                    </form>
                  </td>
                </tr>
                <tr>
                  <td>Air Quality Baseline - Metro Study</td>
                  <td>Air Quality</td>
                  <td>May 15, 2025</td>
                  <td>
                    <div style="background: #ddd; border-radius: 5px;">
                      <div style="width: 100%; background: #28a745; color: white; padding: 2px 5px; border-radius: 5px; text-align: center;">100%</div>
                    </div>
                  </td>
                  <td class="project-feedback">
                    <form>
                      <select name="rating">
                        <option>⭐</option>
                        <option>⭐⭐</option>
                        <option>⭐⭐⭐</option>
                        <option>⭐⭐⭐⭐</option>
                        <option>⭐⭐⭐⭐⭐</option>
                      </select>
                      <button type="submit">Submit</button>
                    </form>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </main>
  </div>
</body>
</html>