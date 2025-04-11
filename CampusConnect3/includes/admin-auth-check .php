<?php
// admin/register.php (Only accessible by super-admins)

// Database connection and session start
require_once '../includes/db_connect.php';
require_once '../includes/auth_check.php';

// Verify super-admin access
if ($_SESSION['role'] !== 'super-admin') {
    header("Location: /admin/unauthorized.php");
    exit();
}

// Form processing would go here
?>

<div class="admin-container">
    <h1><i class="fas fa-user-plus"></i> Register New Admin</h1>
    
    <div class="admin-card">
        <form id="adminRegisterForm" method="POST">
            <div class="form-group">
                <label>College Email</label>
                <input type="email" name="email" required 
                       pattern="[a-zA-Z0-9._%+-]+@yourcollege\.edu$"
                       title="Must use official college email">
            </div>
            
            <div class="form-group">
                <label>Full Name</label>
                <input type="text" name="full_name" required>
            </div>
            
            <div class="form-group">
                <label>Department</label>
                <select name="department" required>
                    <option value="">Select Department</option>
                    <option value="academics">Academics</option>
                    <option value="administration">Administration</option>
                    <option value="examination">Examination</option>
                </select>
            </div>
            
            <div class="form-group">
                <label>Admin Level</label>
                <select name="role" required>
                    <option value="moderator">Moderator</option>
                    <option value="admin">Administrator</option>
                    <option value="super-admin">Super Admin</option>
                </select>
            </div>
            
            <div class="form-footer">
                <button type="submit" class="btn btn-danger">
                    <i class="fas fa-user-shield"></i> Create Admin Account
                </button>
            </div>
        </form>
    </div>
    
    <div class="security-notice">
        <i class="fas fa-exclamation-triangle"></i>
        <p>All admin registrations are logged and require principal approval</p>
    </div>
</div>