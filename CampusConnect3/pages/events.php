
    <title>Events | CampusConnect</title>
    <link rel="stylesheet" href="../assets/css/events.css">
    <?php include('../includes/header.php'); ?>

    <!-- 🔹 Page Heading -->
    <section class="events-header">
        <h1>Upcoming Events</h1>
    </section>

    <!-- 🔹 Search & Filter Section -->
    <section class="event-filters">
        <input type="text" id="search-bar" placeholder="Search events..." oninput="filterEvents()">
        <select id="category-filter" onchange="filterEvents()">
            <option value="all">All Categories</option>
            <option value="tech">Tech</option>
            <option value="music">Music</option>
            <option value="sports">Sports</option>
        </select>
        <input type="date" id="date-filter" onchange="filterEvents()">
    </section>

    <!-- 🔹 Event Listings -->
    <section class="events-container">
        <!-- Events will be loaded dynamically here -->
    </section>

    <!-- Footer  -->
  <?php include('../includes/footer.php'); ?>
