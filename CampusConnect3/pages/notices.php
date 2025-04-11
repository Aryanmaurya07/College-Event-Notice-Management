
        <title>Notices | CampusConnect</title>
    <link rel="stylesheet" href="../assets/css/notices.css">
    <?php include('../includes/header.php'); ?>

    <!-- 🔹 Notices Header -->
    <section class="notices-header">
        <h2><i class="fas fa-bullhorn"></i> Campus Notices</h2>
    </section>

    <!-- 🔹 Filters Section -->
    <section class="container notice-filters">
        <div class="row justify-content-center g-3">
            <div class="col-md-4">
                <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-search"></i></span>
                    <input type="text" class="form-control" id="search-bar" placeholder="Search notices...">
                </div>
            </div>
            <div class="col-md-3">
                <select class="form-select" id="category-filter">
                    <option value="all">All Categories</option>
                    <option value="general">General</option>
                    <option value="exam">Exams</option>
                    <option value="event">Events</option>
                </select>
            </div>
            <div class="col-md-3">
                <div class="input-group">
                    <span class="input-group-text"><i class="far fa-calendar"></i></span>
                    <input type="date" class="form-control" id="date-filter">
                </div>
            </div>
        </div>
    </section>

    <!-- 🔹 Main Notices Container - UPDATED SECTION -->
    <section class="container-fluid notices-container px-4">
        <div class="row gx-5">
            <!-- Left Column - Important Notices (Touches left edge) -->
            <div class="col-lg-4 ps-0">
                <div class="scrolling-notices-container h-100 me-4">
                    <div class="scrolling-notices-header">
                        <h3><i class="fas fa-exclamation-triangle"></i> IMPORTANT NOTICES</h3>
                    </div>
                    <div class="scrolling-notices-wrapper">
                        <ul class="scrolling-notices-list" id="scrolling-notices">
                            <!-- Items will be added dynamically -->
                        </ul>
                    </div>
                </div>
            </div>
            
            <!-- Right Column - Regular Notices (With larger gap) -->
            <div class="col-lg-8">
                <div class="row g-3" id="notices-list">
                    <!-- Notices will load dynamically here -->
                </div>
            </div>
        </div>
    </section>

    <!-- Bootstrap JS -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script> -->
    
    <!-- Custom Script -->
    <!-- <script src="../assets/js/main.js"></script> -->
 <!-- Footer  -->
 <?php include('../includes/footer.php'); ?>