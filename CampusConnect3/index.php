<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CampusConnect</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css">
    

</head>
<body>
   <!-- ----------- nav bar -------------- -->

   <nav id="navbar" class="navbar navbar-expand-lg fixed-top">
    <div class="container">
        <a class="navbar-brand" href="index.php"><span class="text-color">Campus</span>Connect</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav m-auto">
                <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="pages/events.php">Events</a></li>
                <li class="nav-item"><a class="nav-link" href="pages/notices.php">Notices</a></li>
                <li class="nav-item"><a class="nav-link" href="pages/about.php">About</a></li>
                <li class="nav-item"><a class="nav-link" href="pages/contact.php">Contact</a></li>
            </ul>

            <!-- 🔹 Login & Register (Before Login) -->
            <div id="auth-buttons">
                <div class="login-dropdown">
                    <a href="#" class="btn primary-btn" data-bs-toggle="modal" data-bs-target="#studentLoginModal">Login</a>
                    <div class="login-options">
                        <a href="admin/auth/admin_login.php"><i class="fas fa-user-shield"></i> Admin Login</a>
                        <a href="pages/login.php" data-bs-toggle="modal" data-bs-target="#studentLoginModal"><i class="fas fa-user-graduate"></i> Student Login</a>
                    </div>
                </div>
                <a href="pages/register.php" class="btn secoundry-btn ms-2">Register</a>
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


    
  <!-- --------------- hero section ----------------  -->
  <section id="hero">
    <div id="heroCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="2000">
        <div class="carousel-inner">
            <!-- 🔹 Slide 1 (Image) -->
            <div class="carousel-item active">
                <img src="assets/images/saitm2.jpg" class="d-block w-100" alt="Slide 1">
                <div class="overlay"></div>
                <div class="carousel-caption">
                    <h1>Welcome to <span style="color: #e0e0e0;"><span class="text-color">Campus</span>Connect</span></h1>
                    <p>Stay updated with the latest campus events & notices. Join us now!</p>
                    <a href="register.php" class="btn btn-primary">Join Now</a>
                    <a href="events.php" class="btn btn-outline-light">Explore Events</a>
                </div>
            </div>

            <!-- 🔹 Slide 2 (Image) -->
            <div class="carousel-item">
                <img src="assets/images/hostel.jpg" class="d-block w-100" alt="Slide 2">
                <div class="overlay"></div>
                <div class="carousel-caption">
                    <h1>Connect with Your Campus</h1>
                    <p>Never miss an update. Stay informed and engaged!</p>
                </div>
            </div>

            <!-- 🔹 Slide 3 (Video) -->
            <div class="carousel-item">
                <img src="assets/images/saitm3.jpg" class="d-block w-100" alt="Slide 3">
                <div class="overlay"></div>
                <div class="carousel-caption">
                    <h1>Discover Campus Life</h1>
                    <p>Explore events, workshops, and more. Be a part of something big!</p>
                </div>
            </div>
        </div>
    </div>
</section>



<!-- -----------  upcoming events ---------------  -->

<section id="events" class="events-section">
    <div class="container">
        <h2 class="section-title">Upcoming <span>Events</span></h2>
        <div class="row">
            <!-- Event 1 -->
            <div class="col-lg-4 col-md-6">
                <div class="event-card">
                    <img src="assets/images/event1.jpg" alt="Event 1">
                    <div class="event-info">
                        <h3>Tech Fest 2025</h3>
                        <p class="event-date"><i class="fas fa-calendar-alt"></i> April 15, 2025</p>
                        <p class="event-desc">Join us for an exciting tech fest with coding competitions, robotics, and AI workshops.</p>
                        <a href="#" class="event-btn">View Details</a>
                    </div>
                </div>
            </div>

            <!-- Event 2 -->
            <div class="col-lg-4 col-md-6">
                <div class="event-card">
                    <img src="assets/images/event2.jpg" alt="Event 2">
                    <div class="event-info">
                        <h3>Annual Cultural Fest</h3>
                        <p class="event-date"><i class="fas fa-calendar-alt"></i> May 10, 2025</p>
                        <p class="event-desc">Experience music, dance, and drama performances by students across all departments.</p>
                        <a href="#" class="event-btn">View Details</a>
                    </div>
                </div>
            </div>

            <!-- Event 3 -->
            <div class="col-lg-4 col-md-6">
                <div class="event-card">
                    <img src="assets/images/event3.jpg" alt="Event 3">
                    <div class="event-info">
                        <h3>Entrepreneurship Summit</h3>
                        <p class="event-date"><i class="fas fa-calendar-alt"></i> June 20, 2025</p>
                        <p class="event-desc">A networking event for students to pitch their startup ideas and meet investors.</p>
                        <a href="#" class="event-btn">View Details</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- ------------ Notice section ------------------- -->

<section id="notices" class="notices-section">
    <div class="container">
        <h2 class="section-title">Latest <span>Notices</span></h2>
        <div class="row">
            <!-- Notice 1 -->
            <div class="col-lg-4 col-md-6">
                <div class="notice-card">
                    <h3>Exam Schedule Released</h3>
                    <p class="notice-date"><i class="fas fa-calendar-alt"></i> March 28, 2025</p>
                    <p class="notice-desc">Final semester exam schedule has been uploaded. Check the details now.</p>
                    <a href="#" class="notice-btn">Read More</a>
                </div>
            </div>

            <!-- Notice 2 -->
            <div class="col-lg-4 col-md-6">
                <div class="notice-card">
                    <h3>Holiday Announcement</h3>
                    <p class="notice-date"><i class="fas fa-calendar-alt"></i> April 1, 2025</p>
                    <p class="notice-desc">Campus will remain closed on April 5th due to maintenance work.</p>
                    <a href="#" class="notice-btn">Read More</a>
                </div>
            </div>

            <!-- Notice 3 -->
            <div class="col-lg-4 col-md-6">
                <div class="notice-card">
                    <h3>Internship Registration Open</h3>
                    <p class="notice-date"><i class="fas fa-calendar-alt"></i> April 10, 2025</p>
                    <p class="notice-desc">Students can now register for the summer internship program. Limited seats available.</p>
                    <a href="#" class="notice-btn">Read More</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ------------ Gallary section ------------------- -->

<!-- Gallery Section on Home Page -->
<section id="home-gallery" class="container mt-5">
    <h2 class="text-center mb-4 section-title">Popular <span>Events</span></h2>
    <div class="row row-cols-1 row-cols-md-3 g-4">
        <div class="col">
            <div class="card gallery-item">
                <img src="assets/images/event2.jpg" class="card-img-top" alt="Event Image 1">
                <div class="overlay">
                    <h4>Event Name 1</h4>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card gallery-item">
                <img src="assets/images/event3.jpg" class="card-img-top" alt="Event Image 2">
                <div class="overlay">
                    <h4>Event Name 2</h4>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card gallery-item">
                <img src="assets/images/event1.jpg" class="card-img-top" alt="Event Image 3">
                <div class="overlay">
                    <h4>Event Name 3</h4>
                </div>
            </div>
        </div>
    </div>
    <div class="text-center mt-4">
        <a href="gallery.html" class="btn btn-primary">View More</a>
    </div>
</section>


<!-- ------- FAQ section ----------------  -->

<section class="faq-section">
    <div class="container">
        <h2 class="section-title">Ask a Question?</h2>
        <div class="faq">
            <div class="faq-item">
                <div class="faq-question">
                    <span>How can I register for an event?</span>
                    <i class="toggle-icon">+</i>
                </div>
                <div class="faq-answer">
                    Visit the "Events" page, select your event, and click on "Register Now".
                </div>
            </div>

            <div class="faq-item">
                <div class="faq-question">
                    <span>How to post a new notice?</span>
                    <i class="toggle-icon">+</i>
                </div>
                <div class="faq-answer">
                    Only admins can post notices. If you have an important notice, contact the administrator.
                </div>
            </div>

            <div class="faq-item">
                <div class="faq-question">
                    <span>Who can add new events to the website?</span>
                    <i class="toggle-icon">+</i>
                </div>
                <div class="faq-answer">
                    Only authorized faculty members and student coordinators can add events.
                </div>
            </div>

            <div class="faq-item">
                <div class="faq-question">
                    <span>Can I edit or delete my posted event?</span>
                    <i class="toggle-icon">+</i>
                </div>
                <div class="faq-answer">
                    Yes, but only the admin has permission to modify events after posting.
                </div>
            </div>

            <div class="faq-item">
                <div class="faq-question">
                    <span>How do I contact the admin for queries?</span>
                    <i class="toggle-icon">+</i>
                </div>
                <div class="faq-answer">
                    You can go to the "Contact" page and fill out the query form to reach the admin.
                </div>
            </div>
        </div>
    </div>
</section>


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



<!-- footer-------------->
<?php include('includes/footer.php'); ?>
<script src="assets/js/main.js"></script>
