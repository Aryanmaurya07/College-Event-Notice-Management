
  <title>Contact Us | CampusConnect</title>
  <link rel="stylesheet" href="../assets/css/contact.css">
  <!-- <link rel="stylesheet" href="../assets/css/style.css"> -->
 
  <!-- Header  -->
  <?php include('../includes/header.php'); ?>

  <!-- Contact Hero -->
  <section class="contact-hero">
    <div class="container">
      <h1>Get in <span>Touch</span></h1>
      <p>Have questions? Reach out to our team for support.</p>
    </div>
  </section>

  <!-- Contact Grid -->
  <section class="contact-grid">
    <div class="container">
      <!-- Contact Form -->
      <div class="contact-form">
        <h2>Send us a Message</h2>
        <form id="contactForm">
          <div class="form-group">
            <input type="text" id="name" placeholder="Your Name" required>
            <i class="fas fa-user"></i>
          </div>
          <div class="form-group">
            <input type="email" id="email" placeholder="Your Email" required>
            <i class="fas fa-envelope"></i>
          </div>
          <div class="form-group">
            <textarea id="message" placeholder="Your Message" rows="5" required></textarea>
            <i class="fas fa-comment"></i>
          </div>
          <button type="submit" class="submit-btn">
            <span>Send Message</span>
            <i class="fas fa-paper-plane"></i>
          </button>
        </form>
      </div>

      <!-- Contact Info -->
      <div class="contact-info">
        <h2>Contact Information</h2>
        <div class="info-card">
          <i class="fas fa-map-marker-alt"></i>
          <h3>Address</h3>
          <p>College Campus, CS Department, Block-C</p>
        </div>
        <div class="info-card">
          <i class="fas fa-envelope"></i>
          <h3>Email</h3>
          <p>support@campusconnect.edu</p>
        </div>
        <div class="info-card">
          <i class="fas fa-phone-alt"></i>
          <h3>Phone</h3>
          <p>+91 XXXXX XXXXX</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Footer  -->
  <?php include('../includes/footer.php'); ?>

  