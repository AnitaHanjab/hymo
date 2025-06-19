<?php
session_start();
$firstname = isset($_SESSION['Firstname']) ? $_SESSION['Firstname'] : 'Unknown';
$lastname = isset($_SESSION['Lastname']) ? $_SESSION['Lastname'] : 'User';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="admin.css">
    <style>
      .card-body table td {
        padding: 10px;
      }
      .card-body progress {
        width: 100%;
        height: 18px;
        vertical-align: middle;
      }
      .recent-grid {
        display: flex;
        flex-direction: column;
        width: 100%;
      }
      .Projects {
        width: 100%;
      }
      .table-responsive table {
        width: 100%;
      }
    </style>
</head>
<body>
    <input type="checkbox" id="nav-toggle">
    <div class="sidebar">
        <div class="sidebar-brand">
            <h2><span class="fa-solid fa-water"></span> <span>HYMETOCEAN PEERS CO.  </span></h2>
        </div>
        <div class="sidebar-menu">
            <ul>
                <li><a href="admin.php" class="active"><span class="fa-solid fa-computer"></span><span>Dashboard</span></a></li>
                <li><a href="verification.php"><span class="fa-solid fa-users-rectangle"></span><span>Verification</span></a></li>
                <li><a href="projects.php"><span class="fa-solid fa-diagram-project"></span><span>Projects</span></a></li>
                <li><a href="admin-notification.php"><span class="fa-solid fa-bell"></span><span>Notification</span></a></li>
                <li><a href="account.php"><span class="fa-solid fa-users"></span><span>Accounts</span></a></li>
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
                <input type="search" placeholder="Search here"/>
            </div>
            <div class="user-wrapper">
                <img src="img/admin-p2.jpg" width="30px" height="30px" alt="">
                <div>
                    <h4><?= htmlspecialchars($firstname . ' ' . $lastname) ?></h4>
                    <small>Admin</small>
                </div>
            </div>
        </header>

        <main>
            <div class="cards">
                <div class="card-single">
                    <div>
                        <h1>32</h1>
                        <span>Clients</span>
                    </div>
                    <div><span class="fa-solid fa-users"></span></div>
                </div>
                <div class="card-single">
                    <div>
                        <h1>12</h1>
                        <span>Projects</span>
                    </div>
                    <div><span class="fa-regular fa-clipboard"></span></div>
                </div>
                <div class="card-single">
                    <div>
                        <h1>3</h1>
                        <span>Ongoing Task</span>
                    </div>
                    <div><span class="fa-solid fa-person-digging"></span></div>
                </div>
                <div class="card-single">
                    <div>
                        <h1>8</h1>
                        <span>Finished Task</span>
                    </div>
                    <div><span class="fa-solid fa-calendar-check"></span></div>
                </div>
            </div>

            <div class="recent-grid">
                <div class="Projects">
                    <div class="card" style="width: 100%;">
                        <div class="card-header">
                            <h3>Project Progress Overview</h3>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table>
                                    <thead>
                                        <tr>
                                            <td>Project Title</td>
                                            <td>Status</td>
                                            <td>Progress</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Hydrodynamic Modeling of Marikina River</td>
                                            <td>Review</td>
                                            <td><progress value="30" max="100"></progress> 30%</td>
                                        </tr>
                                        <tr>
                                            <td>Integrated Flood Risk Assessment</td>
                                            <td>Ongoing</td>
                                            <td><progress value="65" max="100"></progress> 65%</td>
                                        </tr>
                                        <tr>
                                            <td>Wave Power Potential Analysis</td>
                                            <td>Pending</td>
                                            <td><progress value="10" max="100"></progress> 10%</td>
                                        </tr>
                                        <tr>
                                            <td>IoT Pollution Source Identification</td>
                                            <td>Review</td>
                                            <td><progress value="25" max="100"></progress> 25%</td>
                                        </tr>
                                        <tr>
                                            <td>AI Forecasting of Water Quality</td>
                                            <td>Review</td>
                                            <td><progress value="40" max="100"></progress> 40%</td>
                                        </tr>
                                        <tr>
                                            <td>Pasig River Real-Time Monitoring</td>
                                            <td>Pending</td>
                                            <td><progress value="15" max="100"></progress> 15%</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>
</html>