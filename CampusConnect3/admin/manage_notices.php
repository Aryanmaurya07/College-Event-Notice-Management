<?php include 'sidebar.php'; ?>
<link rel="stylesheet" href="../assets/css/admin.css">

<div class="main-content">
    <header>
        <i class="fas fa-bars toggle-open" id="openSidebar"></i>
        <h1>Manage Notices</h1>
    </header>

    <!-- Notices Management -->
    <div class="notices-management">
        <!-- Tabs Navigation -->
        <div class="tabs">
            <button class="tab-btn active" data-tab="add-notice">Add New Notice</button>
            <button class="tab-btn" data-tab="manage-notices">Manage Notices</button>
        </div>

        <!-- Tab Content -->
        <div class="tab-content">
            <!-- Add Notice Form -->
            <div id="add-notice" class="tab-pane active">
                <div class="form-container">
                    <h2><i class="fas fa-bullhorn"></i> Notice Form</h2>
                    <form id="notice-form" class="notice-form">
                        <div class="form-group">
                            <label for="notice-title">Title</label>
                            <input type="text" id="notice-title" placeholder="Exam Schedule Update" required>
                        </div>

                        <div class="form-row">
                            <div class="form-group">
                                <label for="notice-date">Date</label>
                                <input type="date" id="notice-date" required>
                            </div>
                            <div class="form-group">
                                <label for="notice-category">Category</label>
                                <select id="notice-category" required>
                                    <option value="">Select Category</option>
                                    <option value="academic">Academic</option>
                                    <option value="event">Event</option>
                                    <option value="exam">Exam</option>
                                    <option value="general">General</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="notice-content">Content</label>
                            <textarea id="notice-content" rows="5" placeholder="Notice details..." required></textarea>
                        </div>

                        <div class="form-group">
                            <label for="notice-attachment">Attachment (URL)</label>
                            <input type="url" id="notice-attachment" placeholder="https://example.com/document.pdf">
                        </div>

                        <div class="form-actions">
                            <button type="submit" class="submit-btn">
                                <i class="fas fa-paper-plane"></i> Publish Notice
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Manage Notices Table -->
            <div id="manage-notices" class="tab-pane">
                <div class="notices-list">
                    <div class="search-filter">
                        <input type="text" id="search-notices" placeholder="Search notices...">
                        <select id="filter-notices">
                            <option value="all">All Categories</option>
                            <option value="academic">Academic</option>
                            <option value="event">Event</option>
                            <option value="exam">Exam</option>
                            <option value="general">General</option>
                        </select>
                    </div>
                    
                    <div class="table-container">
                        <table>
                            <thead>
                                <tr>
                                    <th style="width: 30%">Title</th>
                                    <th style="width: 20%">Date</th>
                                    <th style="width: 20%">Category</th>
                                    <th style="width: 15%">Status</th>
                                    <th style="width: 15%">Actions</th>
                                </tr>
                            </thead>
                            <tbody id="notices-table-body">
                                <!-- Sample Notice -->
                                <tr>
                                    <td>Midterm Exam Schedule Update</td>
                                    <td>May 20, 2024</td>
                                    <td><span class="badge academic">Academic</span></td>
                                    <td><span class="status active">Active</span></td>
                                    <td>
                                        <button class="action-btn view-btn" title="View"><i class="fas fa-eye"></i></button>
                                        <button class="action-btn edit-btn" title="Edit"><i class="fas fa-edit"></i></button>
                                        <button class="action-btn delete-btn" title="Delete"><i class="fas fa-trash"></i></button>
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

<!-- Notice View Modal -->
<div class="notice-modal" id="notice-modal" style="display: none;">
    <div class="notice-modal-content">
        <button class="close-modal">&times;</button>
        <h3 id="modal-notice-title"></h3>
        <div class="notice-meta">
            <span><i class="far fa-calendar-alt"></i> <span id="modal-notice-date"></span></span>
            <span><i class="fas fa-tag"></i> <span id="modal-notice-category"></span></span>
            <span><i class="fas fa-info-circle"></i> <span id="modal-notice-status"></span></span>
        </div>
        <div class="notice-body" id="modal-notice-content"></div>
        <div class="notice-attachment-container" id="modal-notice-attachment"></div>
    </div>
</div>

<script src="../assets/js/admin.js"></script>
</body>
</html>