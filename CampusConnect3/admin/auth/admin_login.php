<?php include('../../includes/db_connect.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Login | CampusConnect</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link rel="stylesheet" href="../../assets/css/admin-auth.css">
</head>
<body>
  <div class="admin-auth-container">
    <div class="admin-auth-card">
      <div class="auth-header">
        <img src="../assets/images/admin-logo.png" alt="Admin Logo" class="auth-logo">
        <h2><i class="fas fa-user-shield"></i> Admin Portal</h2>
        <p>Restricted access to authorized personnel only</p>
      </div>

      <?php if (isset($_GET['error'])): ?>
        <div class="alert alert-danger text-center">
          <?php echo htmlspecialchars($_GET['error']); ?>
        </div>
      <?php endif; ?>

      <form id="adminLoginForm" class="auth-form" method="POST" action="admin-login-data.php">
        <div class="input-group">
          <span class="input-icon"><i class="fas fa-envelope"></i></span>
          <input type="email" name="adminEmail" id="adminEmail" placeholder="Admin Email" required>
        </div>

        <div class="input-group">
          <span class="input-icon"><i class="fas fa-lock"></i></span>
          <input type="password" name="adminPassword" id="adminPassword" placeholder="Password" required minlength="8">
          <span class="toggle-pwd" onclick="togglePassword('adminPassword')">
            <i class="fas fa-eye"></i>
          </span>
        </div>

        <div class="form-footer">
          <button type="submit" class="auth-btn">
            <i class="fas fa-sign-in-alt"></i> Login
          </button>
          <a href="#" id="forgotPassword">Forgot Password?</a>
        </div>

        <div class="security-notice">
          <i class="fas fa-shield-alt"></i>
          <p>All login attempts are monitored and recorded</p>
        </div>
      </form>
    </div>

    <div class="auth-watermark">
      <p>CampusConnect Admin System v2.5</p>
    </div>
  </div>

  <script>
    function togglePassword(id) {
      const pwdInput = document.getElementById(id);
      if (pwdInput.type === "password") {
        pwdInput.type = "text";
      } else {
        pwdInput.type = "password";
      }
    }
  </script>
</body>
</html>
