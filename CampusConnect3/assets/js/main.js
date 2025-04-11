
// ------------- nav bar -----------------
window.addEventListener("scroll", function () {
    let navbar = document.getElementById("navbar");
    if (window.scrollY > 50) {
        navbar.classList.add("shrink");
    } else {
        navbar.classList.remove("shrink");
    }
});


// ------------ FAQ section --------------
document.querySelectorAll(".faq-question").forEach((question) => {
    question.addEventListener("click", function () {
        let faqItem = this.parentElement;
        let answer = faqItem.querySelector(".faq-answer");
        let icon = faqItem.querySelector(".toggle-icon");

        // Toggle the active class
        faqItem.classList.toggle("active");

        // Smoothly open/close answer
        if (faqItem.classList.contains("active")) {
            answer.style.maxHeight = answer.scrollHeight + "px";
            icon.innerText = "-"; // Change + to −
        } else {
            answer.style.maxHeight = "0px";
            icon.innerText = "+"; // Change − back to +
        }

        // Close other open questions
        document.querySelectorAll(".faq-item").forEach((item) => {
            if (item !== faqItem) {
                item.classList.remove("active");
                item.querySelector(".faq-answer").style.maxHeight = "0px";
                item.querySelector(".toggle-icon").innerText = "+";
            }
        });
    });
});

// -------upcoming events-----------
// Auto-scroll effect for upcoming events slider
let eventSlider = document.querySelector(".event-slider");

function autoSlide() {
    if (eventSlider.scrollLeft + eventSlider.clientWidth >= eventSlider.scrollWidth) {
        eventSlider.scrollTo({ left: 0, behavior: "smooth" });
    } else {
        eventSlider.scrollBy({ left: 320, behavior: "smooth" });
    }
}

setInterval(autoSlide, 3000);


// ------------- Login Form Submission -------------

document.addEventListener("DOMContentLoaded", function () {
    // Select elements
    const loginForm = document.getElementById("loginForm");
    const loginSuccess = document.getElementById("loginSuccess");
    const navContainer = document.getElementById("nav-user-section");
    const studentLoginBtn = document.querySelector("[data-bs-target='#studentLoginModal']");

    // ✅ Handle Student Login
    if (loginForm) {
        loginForm.addEventListener("submit", function (event) {
            event.preventDefault();

            let email = document.getElementById("student-email").value;
            let password = document.getElementById("student-password").value;

            if (email !== "" && password !== "") {
                localStorage.setItem("loggedIn", "true");
                localStorage.setItem("userEmail", email);
                localStorage.setItem("userRole", "student"); // Mark as student login

                // 🔹 Show success message
                loginSuccess.style.display = "block";
                setTimeout(() => {
                    loginSuccess.style.display = "none";
                    location.reload();
                }, 3000);

                // 🔹 Close modal
                let modal = bootstrap.Modal.getInstance(document.getElementById("studentLoginModal"));
                modal.hide();
            }
        });
    }

    // ✅ Update Navbar on Page Load
    updateNavbar();

    function updateNavbar() {
        let isLoggedIn = localStorage.getItem("loggedIn") === "true";
        let userEmail = localStorage.getItem("userEmail");
        let userRole = localStorage.getItem("userRole"); // 'student' or 'admin'

        if (isLoggedIn) {
            navContainer.innerHTML = `
                <div class="dropdown">
                    <button class="btn profile-btn dropdown-toggle" type="button" id="profileDropdown" data-bs-toggle="dropdown">
                        <i class="fas fa-user-circle"></i> ${userEmail}
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Profile</a></li>
                        <li><a class="dropdown-item" href="#">Settings</a></li>
                        ${userRole === "admin" ? '<li><a class="dropdown-item" href="admin-dashboard.php">Admin Dashboard</a></li>' : ""}
                        <li><a class="dropdown-item logout-btn" href="#">Logout</a></li>
                    </ul>
                </div>
            `;

            // 🔹 Logout functionality
            document.querySelector(".logout-btn").addEventListener("click", function () {
                localStorage.removeItem("loggedIn");
                localStorage.removeItem("userEmail");
                localStorage.removeItem("userRole");
                location.reload();
            });

        } else {
            navContainer.innerHTML = `
                <div class="login-dropdown">
                    <a href="#" class="btn primary-btn" data-bs-toggle="modal" data-bs-target="#studentLoginModal">Login</a>
                    <div class="login-options">
                        <a href="admin-login.php"><i class="fas fa-user-shield"></i> Admin Login</a>
                        <a href="#" data-bs-toggle="modal" data-bs-target="#studentLoginModal"><i class="fas fa-user-graduate"></i> Student Login</a>
                    </div>
                </div>
                <a href="register.php" class="btn secoundry-btn ms-2">Register</a>
            `;
        }
    }

    // ✅ Google Login Placeholder
    document.getElementById("google-login").addEventListener("click", function () {
        alert("Google login not implemented yet.");
    });
});



// ============================= events.js ========================

document.addEventListener("DOMContentLoaded", () => {
    loadEvents();
});

const eventsData = [
    { id: 1, title: "Tech Conference 2025", category: "tech", date: "2025-04-15", description: "An amazing tech event!", image: "event1.jpg" },
    { id: 2, title: "Live Music Night", category: "music", date: "2025-04-20", description: "Enjoy an amazing live concert!", image: "event2.jpg" },
    { id: 3, title: "Inter-College Football", category: "sports", date: "2025-04-25", description: "Biggest football tournament in town!", image: "event3.jpg" }
];

function loadEvents(filteredEvents = eventsData) {
    const eventsContainer = document.querySelector(".events-container");
    eventsContainer.innerHTML = "";

    if (filteredEvents.length === 0) {
        eventsContainer.innerHTML = `<p style="text-align: center; font-size: 1.2rem; color: gray;">No events found.</p>`;
        return;
    }

    filteredEvents.forEach(event => {
        const eventHTML = `
            <div class="event-card">
                <img src="../assets/images/${event.image}" alt="${event.title}">
                <div class="event-details">
                    <h3 class="event-title">${event.title}</h3>
                    <p class="event-date">📅 ${event.date}</p>
                    <p class="event-description">${event.description}</p>
                    <a href="#" class="register-btn">Register Now</a>
                </div>
            </div>
        `;
        eventsContainer.innerHTML += eventHTML;
    });
}

function filterEvents() {
    const searchText = document.getElementById("search-bar").value.toLowerCase();
    const selectedCategory = document.getElementById("category-filter").value;
    const selectedDate = document.getElementById("date-filter").value;

    let filteredEvents = eventsData.filter(event => {
        return (
            (selectedCategory === "all" || event.category === selectedCategory) &&
            (selectedDate === "" || event.date === selectedDate) &&
            (event.title.toLowerCase().includes(searchText) || event.description.toLowerCase().includes(searchText))
        );
    });

    loadEvents(filteredEvents);
}



// ============================ notices.js =========================================
document.addEventListener("DOMContentLoaded", () => {
    loadNotices();
    loadScrollingNotices();
    setupEventListeners();
});

// Notice data
const noticesData = [
    { 
        id: 1, 
        title: "Final Exam Schedule Released", 
        category: "exam", 
        date: "2025-04-10", 
        description: "The final exam schedule for all departments has been published. Please check the academic portal for your specific timetable and room allocations.", 
        link: "#" 
    },
    { 
        id: 2, 
        title: "Annual Cultural Fest Announcement", 
        category: "event", 
        date: "2025-04-15", 
        description: "Join us for the biggest cultural fest of the year! Registrations are now open for performances, stalls, and volunteering opportunities.", 
        link: "#" 
    },
    { 
        id: 3, 
        title: "Semester Registration Deadline Approaching", 
        category: "general", 
        date: "2025-04-20", 
        description: "The last date for semester registration is approaching. Students who haven't completed their registration should do so immediately to avoid late fees.", 
        link: "#" 
    },
    { 
        id: 4, 
        title: "Library Extended Hours During Finals", 
        category: "general", 
        date: "2025-04-05", 
        description: "To accommodate students during finals week, the library will remain open until midnight starting next Monday.", 
        link: "#" 
    },
    { 
        id: 5, 
        title: "Career Fair 2025 - Company List Released", 
        category: "event", 
        date: "2025-05-10", 
        description: "The list of 50+ companies participating in our annual career fair has been published. Prepare your resumes and research the companies.", 
        link: "#" 
    },
    { 
        id: 6, 
        title: "Campus WiFi Upgrade Notice", 
        category: "general", 
        date: "2025-04-08", 
        description: "IT Services will be upgrading campus WiFi infrastructure this weekend. Expect intermittent connectivity between 10pm Saturday and 6am Sunday.", 
        link: "#" 
    }
];

const importantNoticesData = [
    { 
        id: 101, 
        title: "URGENT: Campus Closure Tomorrow", 
        date: "2025-04-02",
        description: "Due to severe weather warnings, campus will be closed tomorrow. All classes and activities are canceled. Stay safe and monitor your emails for updates." 
    },
    { 
        id: 102, 
        title: "Registration Deadline Extended", 
        date: "2025-03-28",
        description: "The last date for course registration has been extended to April 30th. Late fees will be waived for registrations completed by this date." 
    },
    { 
        id: 103, 
        title: "Scholarship Applications Now Open", 
        date: "2025-04-01",
        description: "Merit-based scholarship applications for the fall semester are now being accepted. Deadline for submissions is May 15th at 5pm." 
    },
    { 
        id: 104, 
        title: "Library Ground Floor Renovation", 
        date: "2025-03-30",
        description: "Starting next Monday, the ground floor will be closed for renovation. Alternative study spaces have been arranged in the Student Center." 
    },
    { 
        id: 105, 
        title: "Final Exam Room Changes", 
        date: "2025-04-03",
        description: "Several exam rooms have been changed due to scheduling conflicts. Please check the updated schedule for your specific exam location." 
    }
];

// Load regular notices
function loadNotices(filteredNotices = noticesData) {
    const noticesContainer = document.getElementById("notices-list");
    noticesContainer.innerHTML = "";

    if (filteredNotices.length === 0) {
        noticesContainer.innerHTML = `
            <div class="col-12">
                <div class="notice-card no-notices">
                    <div class="card-body text-center py-4">
                        <i class="far fa-folder-open fa-3x mb-3" style="color: #ccc;"></i>
                        <h4 class="text-muted">No notices found</h4>
                        <p class="text-muted">Try adjusting your search filters</p>
                    </div>
                </div>
            </div>
        `;
        return;
    }

    filteredNotices.forEach((notice, index) => {
        const noticeHTML = `
            <div class="col-md-6">
                <div class="notice-card ${notice.category}">
                    <div class="card-header">
                        <h3 class="notice-title">${notice.title}</h3>
                        <span class="category-badge">${notice.category.toUpperCase()}</span>
                    </div>
                    <div class="card-body">
                        <p class="notice-date">
                            <i class="far fa-calendar-alt"></i> 
                            ${formatDate(notice.date)}
                        </p>
                        <p class="notice-description">${notice.description}</p>
                    </div>
                    <div class="card-footer">
                        <a href="${notice.link}" class="view-btn">
                            View Details <i class="fas fa-arrow-right"></i>
                        </a>
                        ${notice.category === 'exam' ? 
                            '<span class="urgency-tag">URGENT</span>' : ''}
                    </div>
                </div>
            </div>
        `;
        noticesContainer.innerHTML += noticeHTML;
    });
}

// Load scrolling important notices
function loadScrollingNotices() {
    const scrollingContainer = document.getElementById("scrolling-notices");
    scrollingContainer.innerHTML = "";

    // Add visual indicator when paused
    scrollingContainer.addEventListener('mouseenter', () => {
        scrollingContainer.style.cursor = 'row-resize';
    });
    
    scrollingContainer.addEventListener('mouseleave', () => {
        scrollingContainer.style.cursor = 'default';
    });

    // Double notices + add subtle fade effect
    const doubledNotices = [...importantNoticesData, ...importantNoticesData];
    
    doubledNotices.forEach((notice, index) => {
        const noticeItem = document.createElement("li");
        noticeItem.className = "scrolling-notice-item";
        noticeItem.innerHTML = `
            <div class="notice-priority ${index % 3 === 0 ? 'high' : 'normal'}"></div>
            <strong>${notice.title}</strong>
            <div class="notice-content">${notice.description}</div>
            <div class="notice-meta">
                <span class="notice-id">ID: ${notice.id.toString().padStart(3, '0')}</span>
                <span class="notice-time">${formatRelativeTime(notice.date)}</span>
            </div>
        `;
        scrollingContainer.appendChild(noticeItem);
    });

    // Smoother animation reset
    requestAnimationFrame(() => {
        scrollingContainer.style.animation = "none";
        void scrollingContainer.offsetWidth; // Trigger reflow
        scrollingContainer.style.animation = "scrollNotices 40s linear infinite";
    });
}

// Filter notices
function filterNotices() {
    const searchText = document.getElementById("search-bar").value.toLowerCase();
    const selectedCategory = document.getElementById("category-filter").value;
    const selectedDate = document.getElementById("date-filter").value;
    
    // Add loading state
    const noticesContainer = document.getElementById("notices-list");
    noticesContainer.innerHTML = `
        <div class="col-12 text-center py-5">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
            <p class="mt-3 text-muted">Finding matching notices...</p>
        </div>
    `;
    
    // Simulate network delay (remove in production)
    setTimeout(() => {
        let filteredNotices = noticesData.filter(notice => {
            const matchesSearch = notice.title.toLowerCase().includes(searchText) || 
                                notice.description.toLowerCase().includes(searchText);
            const matchesCategory = selectedCategory === "all" || 
                                  notice.category === selectedCategory;
            const matchesDate = selectedDate === "" || notice.date === selectedDate;
            
            return matchesSearch && matchesCategory && matchesDate;
        });
        
        loadNotices(filteredNotices);
    }, 600); // This timeout is just for UX - remove in real implementation
}

// Helper functions
function formatDate(dateString) {
    const options = { year: 'numeric', month: 'short', day: 'numeric' };
    return new Date(dateString).toLocaleDateString('en-US', options);
}

function formatRelativeTime(dateString) {
    const date = new Date(dateString);
    const now = new Date();
    const diffInDays = Math.floor((now - date) / (1000 * 60 * 60 * 24));
    
    if (diffInDays === 0) return "Today";
    if (diffInDays === 1) return "Yesterday";
    if (diffInDays < 7) return `${diffInDays} days ago`;
    if (diffInDays < 30) return `${Math.floor(diffInDays/7)} weeks ago`;
    return formatDate(dateString);
}

// Setup event listeners
function setupEventListeners() {
    document.getElementById("search-bar").addEventListener("input", debounce(filterNotices, 300));
    document.getElementById("category-filter").addEventListener("change", filterNotices);
    document.getElementById("date-filter").addEventListener("change", filterNotices);
    
    // Reset date filter when clicking on it
    document.getElementById("date-filter").addEventListener("click", function() {
        if (this.value) this.value = "";
    });
}

// Debounce function for search input
function debounce(func, wait) {
    let timeout;
    return function() {
        const context = this, args = arguments;
        clearTimeout(timeout);
        timeout = setTimeout(() => {
            func.apply(context, args);
        }, wait);
    };
}



// =============================== register.js ==============================

document.addEventListener('DOMContentLoaded', function() {
    const registerForm = document.getElementById('registerForm');
    const passwordInput = document.getElementById('password');
    const confirmPasswordInput = document.getElementById('confirmPassword');
    const strengthBar = document.querySelector('.strength-bar');
    const strengthText = document.querySelector('.strength-text');
    
    // Password strength indicator
    passwordInput.addEventListener('input', function() {
        const password = passwordInput.value;
        const strength = calculatePasswordStrength(password);
        
        updateStrengthIndicator(strength);
    });
    
    // Form submission
    registerForm.addEventListener('submit', function(e) {
        e.preventDefault();
        
        // Validate passwords match
        if (passwordInput.value !== confirmPasswordInput.value) {
            alert('Passwords do not match!');
            return;
        }
        
        // Validate password strength (example: at least medium)
        const strength = calculatePasswordStrength(passwordInput.value);
        if (strength.score < 2) {
            alert('Please choose a stronger password');
            return;
        }
        
        // Form is valid - in a real app, you would send data to server here
        alert('Account created successfully! Redirecting...');
        // registerForm.reset();
        
        // In a real application, you would submit the form or make an AJAX request
        // window.location.href = '/dashboard.html';
    });
    
    // Calculate password strength
    function calculatePasswordStrength(password) {
        let score = 0;
        let feedback = '';
        
        // Check length
        if (password.length === 0) {
            score = 0;
            feedback = '';
        } else if (password.length < 6) {
            score = 1;
            feedback = 'Too short';
        } else if (password.length < 10) {
            score = 2;
            feedback = 'Could be longer';
        } else {
            score += 3;
        }
        
        // Check for mixed case
        if (/[a-z]/.test(password) && /[A-Z]/.test(password)) {
            score += 1;
        }
        
        // Check for numbers
        if (/\d/.test(password)) {
            score += 1;
        }
        
        // Check for special chars
        if (/[^a-zA-Z0-9]/.test(password)) {
            score += 1;
        }
        
        // Determine strength level
        let strength;
        if (score <= 2) {
            strength = 'weak';
        } else if (score <= 4) {
            strength = 'medium';
        } else {
            strength = 'strong';
        }
        
        return {
            score: score,
            strength: strength,
            feedback: feedback
        };
    }
    
    // Update the strength indicator UI
    function updateStrengthIndicator(strength) {
        const bar = strengthBar.querySelector('::after') || strengthBar;
        
        switch(strength.strength) {
            case 'weak':
                strengthBar.style.setProperty('--strength-color', 'var(--error-color)');
                strengthText.textContent = 'Password strength: weak';
                strengthBar.querySelector('::after').style.width = '33%';
                break;
            case 'medium':
                strengthBar.style.setProperty('--strength-color', 'orange');
                strengthText.textContent = 'Password strength: medium';
                strengthBar.querySelector('::after').style.width = '66%';
                break;
            case 'strong':
                strengthBar.style.setProperty('--strength-color', 'var(--success-color)');
                strengthText.textContent = 'Password strength: strong';
                strengthBar.querySelector('::after').style.width = '100%';
                break;
            default:
                strengthBar.style.setProperty('--strength-color', 'var(--light-gray)');
                strengthText.textContent = 'Password strength: ';
        }
    }
});

// Toggle password visibility
function togglePasswordVisibility() {
    const passwordInput = document.getElementById('password');
    const toggleIcon = document.querySelector('.toggle-password i');
    
    if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        toggleIcon.classList.remove('fa-eye');
        toggleIcon.classList.add('fa-eye-slash');
    } else {
        passwordInput.type = 'password';
        toggleIcon.classList.remove('fa-eye-slash');
        toggleIcon.classList.add('fa-eye');
    }
}




// ======================= about.js ================================
// Add animations or interactive elements
document.addEventListener('DOMContentLoaded', function() {
    // Animate team cards on scroll
    const teamCards = document.querySelectorAll('.team-card');
    
    const observer = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          entry.target.style.opacity = '1';
          entry.target.style.transform = 'translateY(0)';
        }
      });
    }, { threshold: 0.1 });
  
    teamCards.forEach(card => {
      card.style.opacity = '0';
      card.style.transform = 'translateY(20px)';
      card.style.transition = 'all 0.6s ease';
      observer.observe(card);
    });
  });


//   =============================== contact.js ======================
document.addEventListener('DOMContentLoaded', function() {
    const contactForm = document.getElementById('contactForm');
  
    // Form Submission
    contactForm.addEventListener('submit', function(e) {
      e.preventDefault();
      
      // Get form values
      const name = document.getElementById('name').value.trim();
      const email = document.getElementById('email').value.trim();
      const message = document.getElementById('message').value.trim();
  
      // Simple validation
      if (!name || !email || !message) {
        alert('Please fill all fields!');
        return;
      }
  
      // Simulate form submission (replace with actual AJAX/fetch)
      const submitBtn = contactForm.querySelector('.submit-btn');
      submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Sending...';
      submitBtn.disabled = true;
  
      setTimeout(() => {
        submitBtn.innerHTML = '<i class="fas fa-check"></i> Sent!';
        contactForm.reset();
        
        // Reset button after 2 seconds
        setTimeout(() => {
          submitBtn.innerHTML = '<span>Send Message</span><i class="fas fa-paper-plane"></i>';
          submitBtn.disabled = false;
        }, 2000);
      }, 1500);
    });
  
    // Input field animations
    const inputs = document.querySelectorAll('.form-group input, .form-group textarea');
    inputs.forEach(input => {
      input.addEventListener('focus', function() {
        this.parentNode.querySelector('i').style.color = 'var(--base-dark)';
      });
      input.addEventListener('blur', function() {
        this.parentNode.querySelector('i').style.color = 'var(--base-color)';
      });
    });
  });