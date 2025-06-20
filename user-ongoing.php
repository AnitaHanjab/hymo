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
  <title>Ongoing Projects | Hymetocean</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
  <link rel="stylesheet" href="admin.css" />
  <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
  <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
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
        <li><a href="user-ongoing.php" class="active"><span class="fa-solid fa-spinner"></span><span>Ongoing Projects</span></a></li>
        <li><a href="user-completed.php"><span class="fa-solid fa-circle-check"></span><span>Completed Projects</span></a></li>
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
        Ongoing Projects
      </h2>
      <div class="search-wrapper">
        <span class="fa-solid fa-magnifying-glass"></span>
        <input type="search" placeholder="Search ongoing projects..." />
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
          <h3>Currently Active Projects</h3>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table width="100%">
              <thead>
                <tr>
                  <td>Project</td>
                  <td>Progress</td>
                  <td>Last Update</td>
                  <td>Status</td>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Hydrological Study - Marikina Watershed</td>
                  <td>
                    <div style="background: #ddd; border-radius: 5px;">
                      <div style="width: 65%; background: #0099cc; color: white; padding: 2px 5px; border-radius: 5px; text-align: center;">65%</div>
                    </div>
                  </td>
                  <td>June 17, 2025</td>
                  <td><span class="status orange"></span>In Progress</td>
                </tr>
                <tr>
                  <td>Air Quality Survey - Urban Zone</td>
                  <td>
                    <div style="background: #ddd; border-radius: 5px;">
                      <div style="width: 40%; background: #0099cc; color: white; padding: 2px 5px; border-radius: 5px; text-align: center;">40%</div>
                    </div>
                  </td>
                  <td>June 16, 2025</td>
                  <td><span class="status orange"></span>In Progress</td>
                </tr>
                <tr>
                  <td>Solar Viability Assessment - Coastal Area</td>
                  <td>
                    <div style="background: #ddd; border-radius: 5px;">
                      <div style="width: 85%; background: #0099cc; color: white; padding: 2px 5px; border-radius: 5px; text-align: center;">85%</div>
                    </div>
                  </td>
                  <td>June 18, 2025</td>
                  <td><span class="status orange"></span>Near Completion</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>

      <!-- Project Map Section -->
      <div class="card" style="margin-top: 20px;">
        <div class="card-header">
          <h3>Project Location Map</h3>
        </div>
        <div class="card-body">
          <div id="map" style="height: 400px;"></div>
        </div>
      </div>
    </main>
  </div>

  <script>
    var map = L.map('map').setView([14.6760, 121.0437], 11);
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
      attribution: '© OpenStreetMap contributors'
    }).addTo(map);

    L.marker([14.6760, 121.0437]).addTo(map)
      .bindPopup('Hydrological Study - Marikina Watershed');

    L.marker([14.5547, 121.0244]).addTo(map)
      .bindPopup('Air Quality Survey - Urban Zone');

    L.marker([18.1978, 120.5936]).addTo(map)
      .bindPopup('Solar Viability Assessment - Coastal Area');
  </script>
</body>
</html>
