// Sample data for facilities
const facilities = [
    {
        id: 1,
        name: "Food Processing Center",
        location: "Quezon City, NCR",
        industry: "Food Processing",
        services: ["Production", "Processing", "Packaging", "Training"],
        equipment: ["Industrial oven", "Vacuum packaging machine", "Commercial mixer"],
        rating: 4.8,
        reviews: 24,
        description: "A fully-equipped food processing center with industrial-grade equipment for small to medium-scale food production.",
        image: "https://via.placeholder.com/600x400?text=Food+Processing+Center",
        contact: {
            phone: "(02) 1234-5678",
            email: "foodcenter@example.com",
            address: "123 Food St., Quezon City"
        }
    },
    {
        id: 2,
        name: "Textile Innovation Hub",
        location: "Cebu City, Region VII",
        industry: "Textile",
        services: ["Production", "Design", "Training"],
        equipment: ["Digital textile printer", "Embroidery machine", "Sewing machines"],
        rating: 4.5,
        reviews: 18,
        description: "Modern textile production facility with digital printing capabilities for small fashion businesses.",
        image: "https://via.placeholder.com/600x400?text=Textile+Innovation+Hub",
        contact: {
            phone: "(032) 987-6543",
            email: "textilehub@example.com",
            address: "456 Fashion Ave., Cebu City"
        }
    },
    {
        id: 3,
        name: "Woodworking Cooperative",
        location: "Davao City, Region XI",
        industry: "Furniture",
        services: ["Production", "Design", "Training"],
        equipment: ["CNC router", "Lathe machines", "Sanding equipment"],
        rating: 4.2,
        reviews: 15,
        description: "Shared woodworking facility with high-end equipment for furniture makers and carpenters.",
        image: "https://via.placeholder.com/600x400?text=Woodworking+Cooperative",
        contact: {
            phone: "(082) 555-1234",
            email: "woodcoop@example.com",
            address: "789 Wood St., Davao City"
        }
    },
    {
        id: 4,
        name: "ICT Innovation Lab",
        location: "Makati City, NCR",
        industry: "ICT",
        services: ["Training", "Testing", "Co-working"],
        equipment: ["3D printers", "Laser cutter", "VR equipment"],
        rating: 4.7,
        reviews: 32,
        description: "Tech hub with cutting-edge equipment for startups and digital entrepreneurs.",
        image: "https://via.placeholder.com/600x400?text=ICT+Innovation+Lab",
        contact: {
            phone: "(02) 8765-4321",
            email: "ictlab@example.com",
            address: "321 Tech Blvd., Makati City"
        }
    },
    {
        id: 5,
        name: "Agri-Processing Facility",
        location: "Laguna, Region IV-A",
        industry: "Agriculture",
        services: ["Processing", "Packaging", "Testing"],
        equipment: ["Dehydrator", "Milling machine", "Packaging line"],
        rating: 4.3,
        reviews: 12,
        description: "Facility for agricultural producers to process and package their products professionally.",
        image: "https://via.placeholder.com/600x400?text=Agri-Processing+Facility",
        contact: {
            phone: "(049) 123-4567",
            email: "agrifacility@example.com",
            address: "654 Farm Rd., Laguna"
        }
    },
    {
        id: 6,
        name: "Metalworks Hub",
        location: "Pampanga, Region III",
        industry: "Metals",
        services: ["Production", "Design", "Training"],
        equipment: ["CNC machine", "Welding equipment", "Metal press"],
        rating: 4.6,
        reviews: 21,
        description: "Shared metal fabrication facility for small manufacturers and artisans.",
        image: "https://via.placeholder.com/600x400?text=Metalworks+Hub",
        contact: {
            phone: "(045) 987-1234",
            email: "metalhub@example.com",
            address: "987 Metal St., Pampanga"
        }
    }
];

// Sample data for user requests and bookings
const userRequests = [
    {
        id: 1,
        facilityId: 1,
        facilityName: "Food Processing Center",
        dateRequested: "2023-05-15",
        status: "approved",
        bookingDate: "2023-06-10",
        timeSlot: "10:00-12:00",
        purpose: "Production of 100 units of our new pastry product"
    },
    {
        id: 2,
        facilityId: 3,
        facilityName: "Woodworking Cooperative",
        dateRequested: "2023-05-20",
        status: "pending",
        bookingDate: "2023-06-15",
        timeSlot: "13:00-15:00",
        purpose: "Prototyping new furniture design"
    },
    {
        id: 3,
        facilityId: 4,
        facilityName: "ICT Innovation Lab",
        dateRequested: "2023-04-28",
        status: "rejected",
        bookingDate: "2023-05-30",
        timeSlot: "15:00-17:00",
        purpose: "3D printing of product prototypes",
        rejectionReason: "Facility undergoing maintenance during requested time"
    }
];

// DOM elements
const loginModal = document.getElementById('loginModal');
const registerModal = document.getElementById('registerModal');
const facilityModal = document.getElementById('facilityModal');
const loginBtn = document.getElementById('loginBtn');
const registerBtn = document.getElementById('registerBtn');
const closeLoginModal = document.getElementById('closeLoginModal');
const closeRegisterModal = document.getElementById('closeRegisterModal');
const closeFacilityModal = document.getElementById('closeFacilityModal');
const showRegisterModal = document.getElementById('showRegisterModal');
const showLoginModal = document.getElementById('showLoginModal');
const switchToSSFLogin = document.getElementById('switchToSSFLogin');
const switchToSSFRegister = document.getElementById('switchToSSFRegister');
const loginModalTitle = document.getElementById('loginModalTitle');
const registerModalTitle = document.getElementById('registerModalTitle');
const facilitiesGrid = document.getElementById('facilitiesGrid');
const searchForm = document.getElementById('searchForm');
const applyFilters = document.getElementById('applyFilters');
const reviewForm = document.getElementById('reviewForm');
const homeSection = document.getElementById('homeSection');
const dashboardSection = document.getElementById('dashboardSection');
const homeLink = document.getElementById('homeLink');
const facilitiesLink = document.getElementById('facilitiesLink');
const dashboardLink = document.getElementById('dashboardLink');
const profileTab = document.getElementById('profileTab');
const requestsTab = document.getElementById('requestsTab');
const bookingsTab = document.getElementById('bookingsTab');
const documentsTab = document.getElementById('documentsTab');
const profileDisplay = document.getElementById('profileDisplay');
const editProfileForm = document.getElementById('editProfileForm');
const editProfileBtn = document.getElementById('editProfileBtn');
const cancelEditBtn = document.getElementById('cancelEditBtn');
const profileForm = document.getElementById('profileForm');
const requestsTableBody = document.getElementById('requestsTableBody');
const bookingsTableBody = document.getElementById('bookingsTableBody');
const bookingRequestForm = document.getElementById('bookingRequestForm');
const profileAvatar = document.getElementById('profileAvatar');
const avatarPreview = document.getElementById('avatarPreview');
const avatarUpload = document.getElementById('avatarUpload');
const profileNameDisplay = document.getElementById('profileNameDisplay');
const profileIndustryDisplay = document.getElementById('profileIndustryDisplay');
const profileLocationDisplay = document.getElementById('profileLocationDisplay');

// Current user state
let currentUser = null;
let isSSFLogin = false;
let isSSFRegister = false;
let currentFacility = null;

// Initialize the page
document.addEventListener('DOMContentLoaded', function() {
    // Hide login/register buttons since we're already logged in
    if (loginBtn) loginBtn.style.display = 'none';
    if (registerBtn) registerBtn.style.display = 'none';
    
    renderFacilities(facilities);
    showHomeSection();
    
    // Initialize user data from PHP session
    currentUser = {
        name: document.getElementById('profileNameDisplay').textContent,
        email: "<?php echo $user_data['email']; ?>",
        industry: document.getElementById('profileIndustryDisplay').textContent,
        location: document.getElementById('profileLocationDisplay').textContent,
        avatar: document.getElementById('profileAvatar').src
    };
    
    updateAuthState();
    renderUserProfile();
    renderUserRequests();
    renderUserBookings();
    
    // Event listeners for modals
    if (closeLoginModal) {
        closeLoginModal.addEventListener('click', () => {
            loginModal.style.display = 'none';
        });
    }
    
    if (closeRegisterModal) {
        closeRegisterModal.addEventListener('click', () => {
            registerModal.style.display = 'none';
        });
    }
    
    if (closeFacilityModal) {
        closeFacilityModal.addEventListener('click', () => {
            facilityModal.style.display = 'none';
        });
    }
    
    // Navigation links
    homeLink.addEventListener('click', (e) => {
        e.preventDefault();
        showHomeSection();
    });
    
    facilitiesLink.addEventListener('click', (e) => {
        e.preventDefault();
        showFacilitiesSection();
    });
    
    dashboardLink.addEventListener('click', (e) => {
        e.preventDefault();
        showDashboardSection();
    });
    
    // Tab switching
    document.querySelectorAll('.tab-button').forEach(button => {
        button.addEventListener('click', () => {
            // Remove active class from all buttons and contents
            document.querySelectorAll('.tab-button').forEach(btn => btn.classList.remove('active'));
            document.querySelectorAll('.tab-content').forEach(content => content.classList.remove('active'));
            
            // Add active class to clicked button and corresponding content
            button.classList.add('active');
            const tabId = button.getAttribute('data-tab');
            document.getElementById(tabId).classList.add('active');
        });
    });
    
    // Profile editing
    editProfileBtn.addEventListener('click', () => {
        profileDisplay.style.display = 'none';
        editProfileForm.style.display = 'block';
        
        // Populate form with current user data
        document.getElementById('profileName').value = currentUser.name;
        document.getElementById('profileEmail').value = currentUser.email;
        document.getElementById('profileIndustry').value = currentUser.industry;
        document.getElementById('profileLocation').value = currentUser.location;
        if (currentUser.description) {
            document.getElementById('profileDescription').value = currentUser.description;
        }
    });
    
    cancelEditBtn.addEventListener('click', () => {
        profileDisplay.style.display = 'block';
        editProfileForm.style.display = 'none';
    });
    
    // Avatar upload
    avatarUpload.addEventListener('change', function(e) {
        if (e.target.files && e.target.files[0]) {
            const reader = new FileReader();
            
            reader.onload = function(event) {
                avatarPreview.src = event.target.result;
                if (currentUser) {
                    currentUser.avatar = event.target.result;
                    profileAvatar.src = event.target.result;
                }
            };
            
            reader.readAsDataURL(e.target.files[0]);
        }
    });
    
    // Form submissions
    if (document.getElementById('loginForm')) {
        document.getElementById('loginForm').addEventListener('submit', (e) => {
            e.preventDefault();
            const email = document.getElementById('loginEmail').value;
            const password = document.getElementById('loginPassword').value;
            
            // Simple validation
            if (email && password) {
                currentUser = {
                    name: "Sample Business",
                    email,
                    isSSF: isSSFLogin,
                    industry: "Food Processing",
                    location: "NCR",
                    description: "A small food business specializing in traditional Filipino pastries.",
                    avatar: "https://via.placeholder.com/100x100?text=Logo"
                };
                alert(`Successfully logged in as ${isSSFLogin ? 'SSF Facility' : 'MSME'} user: ${email}`);
                loginModal.style.display = 'none';
                updateAuthState();
                renderUserProfile();
                renderUserRequests();
                renderUserBookings();
            } else {
                alert('Please enter both email and password');
            }
        });
    }
    
    if (document.getElementById('registerForm')) {
        document.getElementById('registerForm').addEventListener('submit', (e) => {
            e.preventDefault();
            const name = document.getElementById('regName').value;
            const email = document.getElementById('regEmail').value;
            const password = document.getElementById('regPassword').value;
            const confirmPassword = document.getElementById('regConfirmPassword').value;
            const industry = document.getElementById('regIndustry').value;
            const location = document.getElementById('regLocation').value;
            
            // Simple validation
            if (password !== confirmPassword) {
                alert('Passwords do not match');
                return;
            }
            
            if (name && email && password && industry && location) {
                currentUser = {
                    name,
                    email,
                    isSSF: isSSFRegister,
                    industry,
                    location,
                    avatar: "https://via.placeholder.com/100x100?text=Logo"
                };
                alert(`Successfully registered as ${isSSFRegister ? 'SSF Facility' : 'MSME'} user: ${name}`);
                registerModal.style.display = 'none';
                updateAuthState();
                renderUserProfile();
                renderUserRequests();
                renderUserBookings();
            } else {
                alert('Please fill in all fields');
            }
        });
    }
    
    profileForm.addEventListener('submit', (e) => {
        e.preventDefault();
        const name = document.getElementById('profileName').value;
        const email = document.getElementById('profileEmail').value;
        const industry = document.getElementById('profileIndustry').value;
        const location = document.getElementById('profileLocation').value;
        const description = document.getElementById('profileDescription').value;
        
        // Update current user
        currentUser = {
            ...currentUser,
            name,
            email,
            industry,
            location,
            description
        };
        
        // Update profile display
        profileNameDisplay.textContent = name;
        profileIndustryDisplay.textContent = industry;
        profileLocationDisplay.textContent = location;
        
        alert('Profile updated successfully!');
        profileDisplay.style.display = 'block';
        editProfileForm.style.display = 'none';
        renderUserProfile();
    });
    
    searchForm.addEventListener('submit', (e) => {
        e.preventDefault();
        const location = document.getElementById('location').value;
        const industry = document.getElementById('industry').value;
        const service = document.getElementById('service').value;
        const equipment = document.getElementById('equipment').value.toLowerCase();
        
        const filtered = facilities.filter(facility => {
            return (!location || facility.location.includes(location)) &&
                   (!industry || facility.industry === industry) &&
                   (!service || facility.services.includes(service)) &&
                   (!equipment || facility.equipment.some(eq => eq.toLowerCase().includes(equipment)));
        });
        
        renderFacilities(filtered);
        showFacilitiesSection();
    });
    
    applyFilters.addEventListener('click', () => {
        applyFiltersFunction();
    });
    
    if (reviewForm) {
        reviewForm.addEventListener('submit', (e) => {
            e.preventDefault();
            if (!currentUser) {
                alert('Please login to submit a review');
                return;
            }
            
            const rating = document.querySelector('input[name="rating"]:checked');
            const reviewText = document.querySelector('.review-form textarea').value;
            
            if (!rating || !reviewText) {
                alert('Please provide both a rating and review text');
                return;
            }
            
            alert(`Thank you for your ${rating.value} star review!`);
            document.querySelector('.review-form textarea').value = '';
            facilityModal.style.display = 'none';
        });
    }
    
    bookingRequestForm.addEventListener('submit', (e) => {
        e.preventDefault();
        if (!currentUser) {
            alert('Please login to submit a booking request');
            return;
        }
        
        const bookingDate = document.getElementById('bookingDate').value;
        const timeSlot = document.getElementById('bookingTime').value;
        const purpose = document.getElementById('bookingPurpose').value;
        const equipment = document.getElementById('bookingEquipment').value;
        
        // Create new request
        const newRequest = {
            id: userRequests.length + 1,
            facilityId: currentFacility.id,
            facilityName: currentFacility.name,
            dateRequested: new Date().toISOString().split('T')[0],
            status: "pending",
            bookingDate,
            timeSlot,
            purpose,
            equipment
        };
        
        userRequests.push(newRequest);
        alert('Booking request submitted successfully!');
        facilityModal.style.display = 'none';
        renderUserRequests();
        renderUserBookings();
    });
});

// Enhanced filtering function
function applyFiltersFunction() {
    const locationFilters = Array.from(document.querySelectorAll('input[name="filter-location"]:checked')).map(cb => cb.value);
    const industryFilters = Array.from(document.querySelectorAll('input[name="filter-industry"]:checked')).map(cb => cb.value);
    const ratingFilters = Array.from(document.querySelectorAll('input[name="filter-rating"]:checked')).map(cb => parseInt(cb.value));
    
    const filtered = facilities.filter(facility => {
        const locationMatch = locationFilters.length === 0 || locationFilters.some(loc => facility.location.includes(loc));
        const industryMatch = industryFilters.length === 0 || industryFilters.includes(facility.industry);
        const ratingMatch = ratingFilters.length === 0 || ratingFilters.some(rating => Math.floor(facility.rating) === rating);
        
        return locationMatch && industryMatch && ratingMatch;
    });
    
    renderFacilities(filtered);
}

// Show home section
function showHomeSection() {
    homeSection.style.display = 'block';
    dashboardSection.style.display = 'none';
    document.querySelector('main').style.padding = '0';
}

// Show facilities section
function showFacilitiesSection() {
    homeSection.style.display = 'block';
    dashboardSection.style.display = 'none';
    document.querySelector('main').style.padding = '0';
    document.getElementById('facilitiesSection').scrollIntoView({ behavior: 'smooth' });
}

// Show dashboard section
function showDashboardSection() {
    homeSection.style.display = 'none';
    dashboardSection.style.display = 'block';
    document.querySelector('main').style.padding = '3rem 0';
    // Activate the first tab by default
    document.querySelector('.tab-button').click();
}

// Render facilities to the grid
function renderFacilities(facilitiesToRender) {
    facilitiesGrid.innerHTML = '';
    
    if (facilitiesToRender.length === 0) {
        facilitiesGrid.innerHTML = `
            <div class="empty-state" style="grid-column: 1 / -1">
                <div class="empty-icon"><i class="fas fa-search"></i></div>
                <h3>No facilities found matching your criteria</h3>
                <p>Try adjusting your search filters or search for a different location</p>
            </div>
        `;
        return;
    }
    
    facilitiesToRender.forEach(facility => {
        const card = document.createElement('div');
        card.className = 'result-card';
        card.innerHTML = `
            <div class="result-image" style="background-image: url('${facility.image}')"></div>
            <div class="result-content">
                <h3>${facility.name}</h3>
                <div class="result-location">📍 ${facility.location}</div>
                <div class="result-rating">
                    <span class="stars">${'⭐'.repeat(Math.round(facility.rating))}</span>
                    <span>${facility.rating} (${facility.reviews} reviews)</span>
                </div>
                <div class="result-services">
                    ${facility.services.map(service => `<span class="service-tag">${service}</span>`).join('')}
                </div>
                <button class="view-button" data-id="${facility.id}">
                    <i class="fas fa-eye"></i> View Details
                </button>
            </div>
        `;
        facilitiesGrid.appendChild(card);
    });
    
    // Add event listeners to view buttons
    document.querySelectorAll('.view-button').forEach(button => {
        button.addEventListener('click', (e) => {
            e.preventDefault();
            const facilityId = parseInt(button.getAttribute('data-id'));
            const facility = facilities.find(f => f.id === facilityId);
            showFacilityDetails(facility);
        });
    });
}

// Show facility details in modal
function showFacilityDetails(facility) {
    currentFacility = facility;
    
    document.getElementById('facilityName').textContent = facility.name;
    document.getElementById('facilityLocation').textContent = facility.location;
    document.getElementById('facilityRating').textContent = `${facility.rating} (${facility.reviews} reviews)`;
    document.getElementById('facilityDescription').textContent = facility.description;
    document.getElementById('facilityImage').style.backgroundImage = `url('${facility.image}')`;
    document.getElementById('facilityContact').innerHTML = `
        <strong><i class="fas fa-phone"></i> Phone:</strong> ${facility.contact.phone}<br>
        <strong><i class="fas fa-envelope"></i> Email:</strong> ${facility.contact.email}<br>
        <strong><i class="fas fa-map-marker-alt"></i> Address:</strong> ${facility.contact.address}
    `;
    
    // Clear previous equipment and services
    const equipmentList = document.getElementById('facilityEquipment');
    const serviceList = document.getElementById('facilityServices');
    
    equipmentList.innerHTML = '';
    serviceList.innerHTML = '';
    
    // Add new equipment and services
    facility.equipment.forEach(item => {
        const li = document.createElement('li');
        li.textContent = item;
        equipmentList.appendChild(li);
    });
    
    facility.services.forEach(service => {
        const li = document.createElement('li');
        li.textContent = service;
        serviceList.appendChild(li);
    });
    
    // Reset booking form
    document.getElementById('bookingRequestForm').reset();
    
    facilityModal.style.display = 'flex';
}

// Render user profile
function renderUserProfile() {
    if (!currentUser) return;
    
    profileDisplay.innerHTML = `
        <div class="profile-card" style="background-color: white; padding: 1.5rem; border-radius: var(--border-radius); box-shadow: var(--box-shadow);">
            <div class="profile-field"><strong><i class="fas fa-building"></i> Business Name:</strong> ${currentUser.name}</div>
            <div class="profile-field"><strong><i class="fas fa-envelope"></i> Email:</strong> ${currentUser.email}</div>
            <div class="profile-field"><strong><i class="fas fa-industry"></i> Industry:</strong> ${currentUser.industry}</div>
            <div class="profile-field"><strong><i class="fas fa-map-marker-alt"></i> Location:</strong> ${currentUser.location}</div>
            ${currentUser.description ? `
            <div class="profile-field" style="margin-top: 1rem;">
                <strong><i class="fas fa-align-left"></i> Description:</strong>
                <p style="margin-top: 0.5rem;">${currentUser.description}</p>
            </div>` : ''}
        </div>
    `;
}

// Render user requests
function renderUserRequests() {
    if (!currentUser) return;
    
    requestsTableBody.innerHTML = '';
    
    if (userRequests.length === 0) {
        requestsTableBody.innerHTML = `
            <tr>
                <td colspan="4" class="empty-state">
                    <div class="empty-icon"><i class="fas fa-clipboard-list"></i></div>
                    <h4>No facility requests found</h4>
                    <p>You haven't made any facility requests yet</p>
                </td>
            </tr>
        `;
        return;
    }
    
    userRequests.forEach(request => {
        const row = document.createElement('tr');
        
        let statusBadge;
        if (request.status === 'approved') {
            statusBadge = '<span class="status-badge status-approved"><i class="fas fa-check-circle"></i> Approved</span>';
        } else if (request.status === 'rejected') {
            statusBadge = '<span class="status-badge status-rejected"><i class="fas fa-times-circle"></i> Rejected</span>';
        } else {
            statusBadge = '<span class="status-badge status-pending"><i class="fas fa-clock"></i> Pending</span>';
        }
        
        row.innerHTML = `
            <td><strong>${request.facilityName}</strong></td>
            <td>${request.dateRequested}</td>
            <td>${statusBadge}</td>
            <td>
                <div class="action-buttons">
                    <button class="view-button" data-id="${request.id}" style="padding: 0.25rem 0.5rem; font-size: 0.8rem;">
                        <i class="fas fa-eye"></i> View
                    </button>
                </div>
            </td>
        `;
        requestsTableBody.appendChild(row);
    });
    
    // Add event listeners to view buttons
    document.querySelectorAll('#requestsTableBody .view-button').forEach(button => {
        button.addEventListener('click', (e) => {
            e.preventDefault();
            const requestId = parseInt(button.getAttribute('data-id'));
            const request = userRequests.find(r => r.id === requestId);
            showRequestDetails(request);
        });
    });
}

// Render user bookings
function renderUserBookings() {
    if (!currentUser) return;
    
    bookingsTableBody.innerHTML = '';
    
    // Filter approved requests to show as bookings
    const approvedBookings = userRequests.filter(request => request.status === 'approved');
    
    if (approvedBookings.length === 0) {
        bookingsTableBody.innerHTML = `
            <tr>
                <td colspan="4" class="empty-state">
                    <div class="empty-icon"><i class="fas fa-calendar-alt"></i></div>
                    <h4>No confirmed bookings found</h4>
                    <p>Your approved requests will appear here</p>
                </td>
            </tr>
        `;
        return;
    }
    
    approvedBookings.forEach(booking => {
        const row = document.createElement('tr');
        
        row.innerHTML = `
            <td><strong>${booking.facilityName}</strong></td>
            <td>${booking.bookingDate} (${booking.timeSlot})</td>
            <td><span class="status-badge status-approved"><i class="fas fa-check-circle"></i> Confirmed</span></td>
            <td>
                <div class="action-buttons">
                    <button class="view-button" data-id="${booking.id}" style="padding: 0.25rem 0.5rem; font-size: 0.8rem;">
                        <i class="fas fa-eye"></i> View
                    </button>
                    <button class="view-button success-button" data-id="${booking.id}" style="padding: 0.25rem 0.5rem; font-size: 0.8rem;">
                        <i class="fas fa-download"></i> Receipt
                    </button>
                </div>
            </td>
        `;
        bookingsTableBody.appendChild(row);
    });
    
    // Add event listeners to view buttons
    document.querySelectorAll('#bookingsTableBody .view-button').forEach(button => {
        button.addEventListener('click', (e) => {
            e.preventDefault();
            const bookingId = parseInt(button.getAttribute('data-id'));
            const booking = userRequests.find(r => r.id === bookingId);
            
            if (button.classList.contains('success-button')) {
                // Download receipt action
                alert('Downloading receipt for booking at ' + booking.facilityName);
            } else {
                // View details action
                showBookingDetails(booking);
            }
        });
    });
}

// Show request details
function showRequestDetails(request) {
    let statusMessage = '';
    if (request.status === 'rejected' && request.rejectionReason) {
        statusMessage = `<p><strong>Reason for rejection:</strong> ${request.rejectionReason}</p>`;
    } else if (request.status === 'pending') {
        statusMessage = `<p><i class="fas fa-info-circle"></i> Your request is being reviewed by the facility operator</p>`;
    }
    
    alert(`
        <strong><i class="fas fa-building"></i> Facility:</strong> ${request.facilityName}\n
        <strong><i class="fas fa-calendar-day"></i> Requested Date:</strong> ${request.dateRequested}\n
        <strong><i class="fas fa-clock"></i> Booking Date:</strong> ${request.bookingDate} (${request.timeSlot})\n
        <strong><i class="fas fa-info-circle"></i> Status:</strong> ${request.status}\n
        <strong><i class="fas fa-edit"></i> Purpose:</strong> ${request.purpose}\n
        ${statusMessage}
    `);
}

// Show booking details
function showBookingDetails(booking) {
    alert(`
        <strong><i class="fas fa-building"></i> Facility:</strong> ${booking.facilityName}\n
        <strong><i class="fas fa-calendar-day"></i> Booking Date:</strong> ${booking.bookingDate} (${booking.timeSlot})\n
        <strong><i class="fas fa-info-circle"></i> Status:</strong> Confirmed\n
        <strong><i class="fas fa-edit"></i> Purpose:</strong> ${booking.purpose}\n
        <strong><i class="fas fa-tools"></i> Equipment Requested:</strong> ${booking.equipment || 'None specified'}
    `);
}

// Update authentication state in UI
function updateAuthState() {
    if (currentUser) {
        // Set profile avatar if available
        if (currentUser.avatar) {
            profileAvatar.src = currentUser.avatar;
        }
    }
}