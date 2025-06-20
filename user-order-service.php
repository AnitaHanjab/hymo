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
  <title>Order a Service | Hymetocean</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
  <link rel="stylesheet" href="admin.css" />
  <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
  <style>
    #map {
      height: 200px;
      width: 100%;
      border-radius: 5px;
      margin-top: 10px;
    }
    .map-controls {
      margin-top: 10px;
      text-align: right;
    }
    .map-controls button {
      padding: 5px 10px;
      font-size: 0.9rem;
      background: #666;
      color: white;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }
    .map-controls button:hover {
      background: #444;
    }
    .card-body form label {
      font-weight: bold;
      display: block;
      margin-top: 15px;
    }
    .card-body form input,
    .card-body form select,
    .card-body form textarea {
      width: 100%;
      padding: 10px;
      margin-top: 5px;
      border: 1px solid #ccc;
      border-radius: 5px;
    }
    .card-body form button[type="submit"] {
      margin-top: 20px;
      width: 100%;
      background: #004080;
      color: #fff;
      padding: 12px;
      font-size: 16px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }
    .card-body form button[type="submit"]:hover {
      background: #003366;
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
        <li><a href="user-completed.php"><span class="fa-solid fa-clock-rotate-left"></span><span>Project History</span></a></li>
        <li><a href="user-notifcation.php"><span class="fa-solid fa-bell"></span><span>Notifications</span></a></li>
        <li><a href="user-verify.php"><span class="fa-solid fa-id-card"></span><span>Verify ID</span></a></li>
        <li><a href="user-order-service.php" class="active"><span class="fa-solid fa-plus-circle"></span><span>Order a Service</span></a></li>
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
        Order a Service
      </h2>
      <div class="search-wrapper">
        <span class="fa-solid fa-magnifying-glass"></span>
        <input type="search" placeholder="Search service..." />
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
          <h3>Service Order Form</h3>
        </div>
        <div class="card-body">
          <form action="#" method="POST" enctype="multipart/form-data" onsubmit="return confirm('Are you sure you want to submit this order?');">
            <label for="service">Select Service</label>
            <select name="service" id="service" required>
              <option value="">-- Choose Service --</option>
              <option value="Water Quality Study">Water Quality Study</option>
              <option value="Air Monitoring">Air Monitoring</option>
              <option value="Coastal Risk Mapping">Coastal Risk Mapping</option>
              <option value="Energy Site Analysis">Renewable Energy Site Analysis</option>
              <option value="Remote Sensing & GIS">Remote Sensing & GIS</option>
            </select>

            <label for="address">Project Address</label>
            <input type="text" name="address" id="address" placeholder="Enter full address..." onblur="locateAddress()" required>

            <div class="map-controls">
              <button type="button" onclick="resetMap()">Reset Map</button>
            </div>
            <div id="map"></div>

            <input type="hidden" name="latitude" id="latitude">
            <input type="hidden" name="longitude" id="longitude">

            <label for="notes">Additional Notes / Requirements</label>
            <textarea name="notes" id="notes" rows="4" placeholder="Enter any specific requests or info..."></textarea>

            <label for="attachment">Upload Supporting File (optional)</label>
            <input type="file" name="attachment" id="attachment" accept=".jpg,.png,.pdf,.docx">

            <button type="submit">Submit Order</button>
          </form>
        </div>
      </div>
    </main>
  </div>

  <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
  <script>
    let map = L.map('map').setView([14.5995, 120.9842], 11);
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
      attribution: '© OpenStreetMap contributors'
    }).addTo(map);

    let marker = L.marker([14.5995, 120.9842]).addTo(map)
      .bindPopup('Waiting for address...').openPopup();

    function locateAddress() {
      const address = document.getElementById('address').value;
      if (!address) return;

      fetch(`https://nominatim.openstreetmap.org/search?format=json&q=${encodeURIComponent(address)}`)
        .then(res => res.json())
        .then(data => {
          if (data.length > 0) {
            const lat = data[0].lat;
            const lon = data[0].lon;
            if (marker) map.removeLayer(marker);
            marker = L.marker([lat, lon]).addTo(map).bindPopup(address).openPopup();
            map.setView([lat, lon], 15);
            document.getElementById('latitude').value = lat;
            document.getElementById('longitude').value = lon;
          }
        });
    }

    function resetMap() {
      map.setView([14.5995, 120.9842], 11);
      if (marker) map.removeLayer(marker);
      marker = L.marker([14.5995, 120.9842]).addTo(map)
        .bindPopup('Waiting for address...').openPopup();
      document.getElementById('address').value = '';
      document.getElementById('latitude').value = '';
      document.getElementById('longitude').value = '';
    }
  </script>
</body>
</html>
