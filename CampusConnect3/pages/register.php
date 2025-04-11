<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Join CampusConnect | Register</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/register.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <div class="register-container">
        <div class="register-left">
            <div class="logo">
                <img src="campus-connect-logo.png" alt="CampusConnect Logo">
            </div>
            
            <div class="register-header">
                <h1>Join CampusConnect</h1>
                <p>Your gateway to campus events and important notices</p>
            </div>
            
            <form id="registerForm" method="POST" action="register_data.php" class="register-form">
                <div class="form-group">
                    <label for="fullName">Full Name</label>
                    <div class="input-with-icon">
                        <i class="fas fa-user-graduate"></i>
                        <input type="text" id="fullName" name="name" placeholder="Alex Johnson" required>
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="email">College Email</label>
                    <div class="input-with-icon">
                        <i class="fas fa-envelope"></i>
                        <input type="email" id="email" name="email" required>
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="studentId">Student/Faculty ID</label>
                    <div class="input-with-icon">
                        <i class="fas fa-id-card"></i>
                        <input type="text" id="studentId" name="student_id" required>
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="password">Password</label>
                    <div class="input-with-icon">
                        <i class="fas fa-lock"></i>
                        <input type="password" id="password" name="password" required>
                    </div>
                </div>

                <div class="form-group checkbox-group">
                    <input type="checkbox" id="terms" name="terms" required>
                    <label for="terms">I verify that I'm a current student/faculty member and agree to the <a href="#">Terms</a></label>
                </div>
                
                <button type="submit" name="register" class="register-btn">Create CampusConnect Account</button>
            </form>
            
            <div class="login-link">
                Already have an account? <a href="login.php">Log in to CampusConnect</a>
            </div>
        </div>
        
        <div class="register-right">
            <div class="right-content">
                <h2>Why Join CampusConnect?</h2>
                <p>Never miss important campus updates and connect with your college community.</p>
                <div class="benefits">
                    <div class="benefit-item">
                        <i class="fas fa-calendar-check"></i>
                        <span>Get personalized event recommendations</span>
                    </div>
                    <div class="benefit-item">
                        <i class="fas fa-bell"></i>
                        <span>Receive instant notifications</span>
                    </div>
                    <div class="benefit-item">
                        <i class="fas fa-users"></i>
                        <span>Connect with student clubs</span>
                    </div>
                    <div class="benefit-item">
                        <i class="fas fa-file-alt"></i>
                        <span>Access academic deadlines & documents</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
