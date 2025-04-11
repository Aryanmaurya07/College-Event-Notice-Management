document.addEventListener("DOMContentLoaded", () => {
    const sidebar = document.getElementById("sidebar");
    const openBtn = document.getElementById("openSidebar");
    const closeBtn = document.getElementById("closeSidebar");
    const body = document.body;

    // Toggle sidebar function
    const toggleSidebar = (show) => {
        const shouldShow = typeof show === 'boolean' ? show : !sidebar.classList.contains("active");
        
        if (shouldShow) {
            sidebar.classList.add("active");
            if (window.innerWidth <= 768) {
                body.classList.add("sidebar-open");
            }
        } else {
            sidebar.classList.remove("active");
            body.classList.remove("sidebar-open");
        }
    };

    // Event listeners
    openBtn.addEventListener("click", () => toggleSidebar(true));
    closeBtn.addEventListener("click", () => toggleSidebar(false));

    // Close sidebar when clicking outside
    document.addEventListener("click", (e) => {
        const isClickInsideSidebar = sidebar.contains(e.target);
        const isClickOnOpenBtn = e.target === openBtn || openBtn.contains(e.target);
        
        if (!isClickInsideSidebar && !isClickOnOpenBtn) {
            toggleSidebar(false);
        }
    });

    // Initialize sidebar state - start OPEN on all devices
    toggleSidebar(true); // This is the key change
});



// ==================== manage events =================

document.addEventListener("DOMContentLoaded", function() {
    // Sidebar Toggle
    const sidebar = document.getElementById("sidebar");
    const openBtn = document.getElementById("openSidebar");
    const closeBtn = document.getElementById("closeSidebar");

    function toggleSidebar() {
        sidebar.classList.toggle("active");
    }

    openBtn.addEventListener("click", toggleSidebar);
    closeBtn.addEventListener("click", toggleSidebar);

    // Tab Switching
    const tabBtns = document.querySelectorAll(".tab-btn");
    tabBtns.forEach(btn => {
        btn.addEventListener("click", () => {
            document.querySelectorAll(".tab-btn, .tab-pane").forEach(el => {
                el.classList.remove("active");
            });
            btn.classList.add("active");
            document.getElementById(btn.getAttribute("data-tab")).classList.add("active");
        });
    });

    // Event Form Submission
    const eventForm = document.getElementById("event-form");
    if (eventForm) {
        eventForm.addEventListener("submit", function(e) {
            e.preventDefault();
            
            const formData = {
                name: document.getElementById("event-name").value,
                date: document.getElementById("event-date").value,
                time: document.getElementById("event-time").value,
                location: document.getElementById("event-location").value || "Not specified",
                description: document.getElementById("event-desc").value,
                image: document.getElementById("event-image").value || "https://via.placeholder.com/400x200?text=Event+Cover"
            };
            
            const submitBtn = document.querySelector(".submit-btn");
            
            if (submitBtn.dataset.editingRow) {
                // Update existing event
                const row = document.querySelector(`#events-table-body tr:nth-child(${submitBtn.dataset.editingRow})`);
                if (row) {
                    row.dataset.eventData = JSON.stringify(formData);
                    row.querySelector(".event-info span").textContent = formData.name;
                    row.querySelector(".event-info img").src = formData.image;
                    row.cells[1].textContent = `${formatDate(formData.date)} ${formData.time}`;
                    row.cells[2].textContent = formData.location;
                    
                    showAlert("Event updated successfully!", "success");
                }
                
                // Reset edit mode
                submitBtn.innerHTML = `<i class="fas fa-calendar-plus"></i> Publish Event`;
                submitBtn.classList.remove("updating");
                delete submitBtn.dataset.editingRow;
            } else {
                // Add new event
                addEventToTable(formData);
                showAlert("Event published successfully!", "success");
            }
            
            this.reset();
            document.getElementById("image-preview").style.display = "none";
        });
    }

    // Add Event to Table with Edit Functionality
    function addEventToTable(event) {
        const tableBody = document.getElementById("events-table-body");
        const row = document.createElement("tr");
        row.dataset.eventData = JSON.stringify(event);
        
        row.innerHTML = `
            <td>
                <div class="event-info">
                    <img src="${event.image}" alt="${event.name}" class="event-thumbnail">
                    <span>${event.name}</span>
                </div>
            </td>
            <td>${formatDate(event.date)} ${event.time}</td>
            <td>${event.location}</td>
            <td>
                <button class="action-btn edit-btn"><i class="fas fa-edit"></i></button>
                <button class="action-btn delete-btn"><i class="fas fa-trash"></i></button>
            </td>
        `;
        
        // Delete functionality
        row.querySelector(".delete-btn").addEventListener("click", function() {
            if (confirm("Are you sure you want to delete this event?")) {
                row.remove();
                showAlert("Event deleted successfully!", "success");
            }
        });
        
        // Edit functionality
        row.querySelector(".edit-btn").addEventListener("click", function() {
            const eventData = JSON.parse(row.dataset.eventData);
            
            // Switch to Add Event tab
            document.querySelector('[data-tab="add-event"]').click();
            
            // Fill form
            document.getElementById("event-name").value = eventData.name;
            document.getElementById("event-date").value = eventData.date;
            document.getElementById("event-time").value = eventData.time;
            document.getElementById("event-location").value = eventData.location;
            document.getElementById("event-desc").value = eventData.description;
            document.getElementById("event-image").value = eventData.image;
            
            // Show image preview
            const preview = document.getElementById("image-preview");
            if (eventData.image) {
                preview.src = eventData.image;
                preview.style.display = "block";
            }
            
            // Update submit button
            const submitBtn = document.querySelector(".submit-btn");
            submitBtn.innerHTML = `<i class="fas fa-save"></i> Update Event`;
            submitBtn.classList.add("updating");
            submitBtn.dataset.editingRow = row.rowIndex;
        });
        
        tableBody.prepend(row);
    }

    // Image Preview Handler
    document.getElementById("event-image").addEventListener("input", function() {
        const preview = document.getElementById("image-preview");
        if (this.value) {
            preview.src = this.value;
            preview.style.display = "block";
        } else {
            preview.style.display = "none";
        }
    });

    // Helper function to format date
    function formatDate(dateString) {
        const options = { year: 'numeric', month: 'short', day: 'numeric' };
        return new Date(dateString).toLocaleDateString(undefined, options);
    }

    // Alert notification
    function showAlert(message, type) {
        const alert = document.createElement("div");
        alert.className = `alert alert-${type}`;
        alert.innerHTML = `
            <span>${message}</span>
            <button class="close-alert"><i class="fas fa-times"></i></button>
        `;
        
        document.body.appendChild(alert);
        setTimeout(() => {
            alert.classList.add("show");
        }, 10);
        
        setTimeout(() => {
            alert.remove();
        }, 5000);
        
        alert.querySelector(".close-alert").addEventListener("click", () => {
            alert.remove();
        });
    }

    // Initialize with first tab active
    if (tabBtns.length > 0) {
        tabBtns[0].click();
    }
});



// ============================== manage notices =============================

document.addEventListener("DOMContentLoaded", function() {
    // Tab Switching
    document.querySelectorAll(".tab-btn").forEach(btn => {
        btn.addEventListener("click", () => {
            document.querySelectorAll(".tab-btn, .tab-pane").forEach(el => {
                el.classList.remove("active");
            });
            btn.classList.add("active");
            document.getElementById(btn.getAttribute("data-tab")).classList.add("active");
        });
    });

    // Notice Form Submission
    const noticeForm = document.getElementById("notice-form");
    if (noticeForm) {
        noticeForm.addEventListener("submit", function(e) {
            e.preventDefault();
            
            const formData = {
                title: document.getElementById("notice-title").value,
                date: document.getElementById("notice-date").value,
                category: document.getElementById("notice-category").value,
                content: document.getElementById("notice-content").value,
                attachment: document.getElementById("notice-attachment").value || null
            };
            
            const submitBtn = document.querySelector(".submit-btn");
            
            if (submitBtn.dataset.editingId) {
                // Update existing notice
                const row = document.querySelector(`#notices-table-body tr:nth-child(${submitBtn.dataset.editingId})`);
                if (row) {
                    row.dataset.noticeData = JSON.stringify(formData);
                    updateNoticeRow(row, formData);
                    showAlert("Notice updated successfully!", "success");
                }
                
                // Reset form
                submitBtn.innerHTML = '<i class="fas fa-paper-plane"></i> Publish Notice';
                submitBtn.classList.remove("updating");
                delete submitBtn.dataset.editingId;
            } else {
                // Add new notice
                addNoticeToTable(formData);
                showAlert("Notice published successfully!", "success");
            }
            
            this.reset();
        });
    }

    // Add Notice to Table
    function addNoticeToTable(notice, isNew = true) {
        const tableBody = document.getElementById("notices-table-body");
        const row = document.createElement("tr");
        row.dataset.noticeData = JSON.stringify(notice);
        
        updateNoticeRow(row, notice);
        
        // Add action buttons
        const actionsCell = document.createElement("td");
        actionsCell.innerHTML = `
            <button class="action-btn view-btn" title="View"><i class="fas fa-eye"></i></button>
            <button class="action-btn edit-btn" title="Edit"><i class="fas fa-edit"></i></button>
            <button class="action-btn delete-btn" title="Delete"><i class="fas fa-trash"></i></button>
        `;
        row.appendChild(actionsCell);
        
        // Add event listeners
        row.querySelector(".delete-btn").addEventListener("click", () => {
            if (confirm("Delete this notice?")) {
                row.remove();
                showAlert("Notice deleted!", "success");
            }
        });
        
        row.querySelector(".edit-btn").addEventListener("click", () => {
            editNotice(row);
        });
        
        row.querySelector(".view-btn").addEventListener("click", () => {
            viewNotice(JSON.parse(row.dataset.noticeData));
        });
        
        if (isNew) {
            tableBody.prepend(row);
        } else {
            tableBody.appendChild(row);
        }
    }

    function updateNoticeRow(row, notice) {
        row.innerHTML = `
            <td>${notice.title}</td>
            <td>${formatDate(notice.date)}</td>
            <td><span class="badge ${notice.category}">${notice.category}</span></td>
        `;
    }

    function editNotice(row) {
        const noticeData = JSON.parse(row.dataset.noticeData);
        
        // Switch to Add Notice tab
        document.querySelector('[data-tab="add-notice"]').click();
        
        // Fill form
        document.getElementById("notice-title").value = noticeData.title;
        document.getElementById("notice-date").value = noticeData.date;
        document.getElementById("notice-category").value = noticeData.category;
        document.getElementById("notice-content").value = noticeData.content;
        document.getElementById("notice-attachment").value = noticeData.attachment || "";
        
        // Update submit button
        const submitBtn = document.querySelector(".submit-btn");
        submitBtn.innerHTML = '<i class="fas fa-save"></i> Update Notice';
        submitBtn.classList.add("updating");
        submitBtn.dataset.editingId = row.rowIndex;
    }

    function viewNotice(notice) {
        const modal = document.createElement("div");
        modal.className = "notice-modal";
        modal.innerHTML = `
            <div class="notice-modal-content">
                <button class="close-modal">&times;</button>
                <h3>${notice.title}</h3>
                <div class="notice-meta">
                    <span><i class="far fa-calendar-alt"></i> ${formatDate(notice.date)}</span>
                    <span><i class="fas fa-tag"></i> <span class="badge ${notice.category}">${notice.category}</span></span>
                </div>
                <div class="notice-body">${notice.content.replace(/\n/g, '<br>')}</div>
                ${notice.attachment ? `
                <div class="notice-attachment-container">
                    <a href="${notice.attachment}" class="notice-attachment" target="_blank">
                        <i class="fas fa-paperclip"></i> Download Attachment
                    </a>
                </div>
                ` : ''}
            </div>
        `;
        
        document.body.appendChild(modal);
        modal.style.display = "flex";
        
        modal.querySelector(".close-modal").addEventListener("click", () => {
            modal.remove();
        });
    }

    // Helper functions
    function formatDate(dateString) {
        const options = { year: 'numeric', month: 'short', day: 'numeric' };
        return new Date(dateString).toLocaleDateString(undefined, options);
    }

    function showAlert(message, type) {
        const alert = document.createElement("div");
        alert.className = `alert alert-${type}`;
        alert.innerHTML = `
            <span>${message}</span>
            <button class="close-alert"><i class="fas fa-times"></i></button>
        `;
        
        document.body.appendChild(alert);
        setTimeout(() => alert.classList.add("show"), 10);
        
        setTimeout(() => alert.remove(), 3000);
        
        alert.querySelector(".close-alert").addEventListener("click", () => {
            alert.remove();
        });
    }

    // Initialize with first tab active
    if (document.querySelectorAll(".tab-btn").length > 0) {
        document.querySelector(".tab-btn").click();
    }
});