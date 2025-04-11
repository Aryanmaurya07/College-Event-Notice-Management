<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Events | CampusConnect</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="../assets/css/admin.css">
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
            <li><a href="#"><i class="fas fa-home"></i> Dashboard</a></li>
            <li><a href="#" class="active"><i class="fas fa-calendar-alt"></i> Manage Events</a></li>
            <li><a href="#"><i class="fas fa-bullhorn"></i> Manage Notices</a></li>
            <li><a href="#"><i class="fas fa-users"></i> Users</a></li>
        </ul>
    </aside>

    <!-- Main Content -->
    <div class="main-content">
        <header>
            <i class="fas fa-bars toggle-open" id="openSidebar"></i>
            <h1>Manage Events</h1>
        </header>

        <!-- Events Management -->
        <div class="events-management">
            <!-- Tabs Navigation -->
            <div class="tabs">
                <button class="tab-btn active" data-tab="add-event">Add New Event</button>
                <button class="tab-btn" data-tab="manage-events">Manage Events</button>
            </div>

            <!-- Tab Content -->
            <div class="tab-content">
                <!-- Add Event Form -->
                <div id="add-event" class="tab-pane active">
                    <div class="form-container">
                        <h2>Create New Event</h2>
                        <form id="event-form" class="event-form">
                            <div class="form-group">
                                <label for="event-name">Event Name</label>
                                <input type="text" id="event-name" placeholder="Tech Conference 2024" required>
                            </div>

                            <div class="form-row">
                                <div class="form-group">
                                    <label for="event-date">Date</label>
                                    <input type="date" id="event-date" required>
                                </div>
                                <div class="form-group">
                                    <label for="event-time">Time</label>
                                    <input type="time" id="event-time" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="event-location">Location</label>
                                <input type="text" id="event-location" placeholder="Virtual / Campus Auditorium">
                            </div>

                            <div class="form-group">
                                <label for="event-desc">Description</label>
                                <textarea id="event-desc" rows="4" placeholder="Event details..."></textarea>
                            </div>

                            <div class="form-group">
                                <label for="event-image">Cover Image (URL)</label>
                                <input type="url" id="event-image" placeholder="https://example.com/image.jpg">
                            </div>

                            <div class="form-actions">
                                <button type="submit" class="submit-btn">
                                    <i class="fas fa-calendar-plus"></i> Publish Event
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Manage Events Table -->
                <div id="manage-events" class="tab-pane">
                    <div class="events-list">
                        <div class="search-filter">
                            <input type="text" id="search-events" placeholder="Search events...">
                            <select id="filter-events">
                                <option value="all">All Events</option>
                                <option value="upcoming">Upcoming</option>
                                <option value="past">Past</option>
                            </select>
                        </div>
                        <table>
                            <thead>
                                <tr>
                                    <th>Event</th>
                                    <th>Date & Time</th>
                                    <th>Location</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody id="events-table-body">
                                <!-- Sample Event -->
                                <tr>
                                    <td>
                                        <div class="event-info">
                                            <img src="https://via.placeholder.com/400x200?text=Event+Cover" alt="Sample Event" class="event-thumbnail">
                                            <span>Sample Event</span>
                                        </div>
                                    </td>
                                    <td>May 15, 2024 10:00 AM</td>
                                    <td>Main Auditorium</td>
                                    <td>
                                        <button class="action-btn edit-btn"><i class="fas fa-edit"></i></button>
                                        <button class="action-btn delete-btn"><i class="fas fa-trash"></i></button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="../assets/js/admin.js"></script>
</body>