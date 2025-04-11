<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CampusConnect</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    

</head>
<body>
   <!-- ----------- nav bar -------------- -->

   <nav id="navbar" class="navbar navbar-expand-lg fixed-top">
    <div class="container">
        <a class="navbar-brand" href="../index.php"><span class="text-color">Campus</span>Connect</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav m-auto">
                <li class="nav-item"><a class="nav-link" href="../index.php">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="../pages/events.php">Events</a></li>
                <li class="nav-item"><a class="nav-link" href="../pages/notices.php">Notices</a></li>
                <li class="nav-item"><a class="nav-link" href="../pages/about.php">About</a></li>
                <li class="nav-item"><a class="nav-link" href="../pages/contact.php">Contact</a></li>
            </ul>

            <!-- 🔹 Login & Register (Before Login) -->
            <div id="auth-buttons">
                <div class="login-dropdown">
                    <a href="#" class="btn primary-btn" data-bs-toggle="modal" data-bs-target="#studentLoginModal">Login</a>
                    <div class="login-options">
                        <a href="../admin/auth/login.html"><i class="fas fa-user-shield"></i> Admin Login</a>
                        <a href="#" data-bs-toggle="modal" data-bs-target="#studentLoginModal"><i class="fas fa-user-graduate"></i> Student Login</a>
                    </div>
                </div>
                <a href="../pages/register.php" class="btn secoundry-btn ms-2">Register</a>
            </div>

            <!-- 🔹 Profile Dropdown (After Login) -->
            <div id="profile-dropdown" class="dropdown d-none">
                <a class="btn profile-btn dropdown-toggle" href="#" role="button" id="profileMenu" data-bs-toggle="dropdown">
                    <i class="fas fa-user"></i> <span id="username">Profile</span>
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Profile</a></li>
                    <li><a class="dropdown-item" href="#">Settings</a></li>
                    <li><a class="dropdown-item text-danger" href="#" id="logout-btn">Logout</a></li>
                </ul>
            </div>

            <!-- 🔹 Admin Dashboard Link (Only for Admins) -->
            <a href="admin/dashboard.php" id="admin-dashboard" class="btn admin-btn d-none ms-2">Admin Dashboard</a>
        </div>
    </div>
</nav>


<!-- 🔹 Student Login Modal -->
<div class="modal fade" id="studentLoginModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Student Login</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form id="login-form">
                    <div class="mb-3">
                        <label>Email</label>
                        <input type="email" class="form-control" id="email" required>
                    </div>
                    <div class="mb-3">
                        <label>Password</label>
                        <input type="password" class="form-control" id="password" required>
                    </div>
                    <button type="submit" class="btn primary-btn w-100">Login</button>
                </form>

                <div class="text-center mt-3">
                    <p>Don't have an account? <a href="pages/register.html">Register Now</a></p>
                    <p >or</p>
                    <button class="btn google-btn w-100" ><i class="fab fa-google"></i> Sign in with Google</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="../assets/js/main.js"></script>
<!-- </body> -->