<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Admin Dashboard | CampusConnect</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
    <link rel="stylesheet" href="../assets/css/admin.css" />
</head>
<body>

<div class="admin-container">
    <!-- Sidebar -->
    <aside class="sidebar" id="sidebar">
        <div class="sidebar-header">
            <span>CampusConnect</span>
            <i class="fas fa-times toggle-close" id="closeSidebar"></i>
        </div>
        <ul class="sidebar-menu">
            <li><a href="dashboard.php"><i class="fas fa-home"></i> Dashboard</a></li>
            <li><a href="manage_events.php"><i class="fas fa-calendar-alt"></i> Manage Events</a></li>
            <li><a href="manage_notices.php"><i class="fas fa-bullhorn"></i> Manage Notices</a></li>
            <li><a href="#"><i class="fas fa-users"></i> Users</a></li>
        </ul>
    </aside>

    <!-- Main Content -->
    <div class="main-content">
        <header>
            <i class="fas fa-bars toggle-open" id="openSidebar"></i>
            <h1>Welcome, Admin</h1>
        </header>

        <!-- Dashboard Widgets -->
        <div class="dashboard-widgets">
            <div class="widget-box">
                <i class="fas fa-calendar-alt"></i>
                <div>
                    <h4>Total Events</h4>
                    <p>12</p>
                </div>
            </div>
            <div class="widget-box">
                <i class="fas fa-bullhorn"></i>
                <div>
                    <h4>Total Notices</h4>
                    <p>25</p>
                </div>
            </div>
            <div class="widget-box">
                <i class="fas fa-users"></i>
                <div>
                    <h4>Registered Users</h4>
                    <p>310</p>
                </div>
            </div>
            <div class="widget-box">
                <i class="fas fa-envelope"></i>
                <div>
                    <h4>Feedback</h4>
                    <p>8</p>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="../assets/js/admin.js"></script>
</body>
</html>