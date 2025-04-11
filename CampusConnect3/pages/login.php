<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login | CampusConnect</title>
    <link rel="stylesheet" href="../assets/css/login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <div class="login-container">
        <form action="login_data.php" method="POST" class="login-form">
            <h2>Login to CampusConnect</h2>

            <div class="form-group">
                <label for="email"><i class="fas fa-envelope"></i> Email</label>
                <input type="email" name="email" required placeholder="Enter your college email">
            </div>

            <div class="form-group">
                <label for="password"><i class="fas fa-lock"></i> Password</label>
                <input type="password" name="password" required placeholder="••••••••">
            </div>

            <button type="submit" name="login" class="login-btn">Login</button>

            <p class="register-link">Don’t have an account? <a href="register.php">Register Here</a></p>
        </form>
    </div>
</body>
</html>
