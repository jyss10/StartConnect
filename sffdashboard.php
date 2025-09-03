<?php
include "session_check.php";
if ($_SESSION['role'] !== 'ssf') {
    header("Location: index.html");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DTI SSF Platform - Facility Providers</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="ssfdashboard.css">

    <style>
        
        
    
    </style>
</head>
<body>
    <header>
        <div class="container header-content">
            <div class="logo">
                <img src="https://via.placeholder.com/30x30?text=DTI" alt="DTI Logo">
                <span>DTI SSF Platform - Facility Providers</span>
            </div>
            <nav>
                <ul>
                    <li><a href="#" id="dashboardLink">Dashboard</a></li>
                    <li><a href="#" id="requestsLink">Requests</a></li>
                    <li><a href="#" id="facilitiesLink">My Facilities</a></li>
                    <li><a href="#" id="bookingsLink">Bookings</a></li>
                </ul>
            </nav>
            <div class="auth-buttons">
                <button id="logoutBtn"><i class="fas fa-sign-out-alt"></i> Logout</button>
            </div>
        </div>
    </header>

    <main class="container">
            
            <div class="dashboard-header">
                <div class="user-profile-header">
                    <img src="https://via.placeholder.com/100x100?text=ABC" alt="Profile" class="profile-avatar" id="profileAvatar">
                    <div class="profile-info">
                        <h1 class="profile-name" id="profileNameDisplay">ABC Manufacturing Co.</h1>
                        <span class="profile-industry" id="profileIndustryDisplay">Manufacturing</span>
                        <div class="profile-location">
                            <i class="fas fa-map-marker-alt"></i>
                            <span id="profileLocationDisplay">National Capital Region (NCR)</span>
                        </div>
                        <div class="verification-badge verification-pending">
                            <i class="fas fa-user-check"></i>
                            <span>Verification Pending</span>
                        </div>
                    </div>
                </div>
                <div class="dashboard-actions">
                    <button id="editProfileBtn" class="submit-button"><i class="fas fa-user-edit"></i> Edit Profile</button>
                </div>
            </div>
            
            <div class="dashboard-tabs">
                <button class="tab-button active" data-tab="profileTab">
                    <i class="fas fa-user"></i> Profile
                </button>
                <button class="tab-button" data-tab="requestsTab">
                    <i class="fas fa-clipboard-list"></i> Access Requests
                </button>
                <button class="tab-button" data-tab="facilitiesTab">
                    <i class="fas fa-warehouse"></i> My Facilities
                </button>
                <button class="tab-button" data-tab="bookingsTab">
                    <i class="fas fa-calendar-alt"></i> Bookings
                </button>
                <button class="tab-button" data-tab="documentsTab">
                    <i class="fas fa-file-upload"></i> Documents
                </button>
            </div>
            
            <div class="tab-content active" id="profileTab">
                <div class="profile-info">
                    <h2 class="dashboard-title">Profile Information</h2>
                    <div id="profileDisplay">
                        <!-- Profile info will be displayed here -->
                    </div>
                </div>
            </div>
            
            <div class="tab-content" id="requestsTab">
                <h2 class="dashboard-title">Access Requests</h2>
                <table class="requests-table">
                    <thead>
                        <tr>
                            <th>MSME</th>
                            <th>Facility</th>
                            <th>Request Date</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody id="requestsTableBody">
                        <!-- Requests will be dynamically inserted here -->
                    </tbody>
                </table>
            </div>
            
            <div class="tab-content" id="facilitiesTab">
                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1.5rem;">
                    <h2 class="dashboard-title">My Facilities</h2>
                    <button id="addFacilityBtn" class="submit-button"><i class="fas fa-plus"></i> Add Facility</button>
                </div>
                
                <div id="facilitiesList">
                    <!-- Facilities will be dynamically inserted here -->
                </div>
            </div>
            
            <div class="tab-content" id="bookingsTab">
                <h2 class="dashboard-title">Confirmed Bookings</h2>
                <table class="requests-table">
                    <thead>
                        <tr>
                            <th>MSME</th>
                            <th>Facility</th>
                            <th>Booking Date</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody id="bookingsTableBody">
                        <!-- Bookings will be dynamically inserted here -->
                    </tbody>
                </table>
            </div>
            
            <div class="tab-content" id="documentsTab">
                <h2 class="dashboard-title">Verification Documents</h2>
                <div class="profile-form">
                    <p>Upload documents to verify your business credentials. Verified accounts gain more visibility to MSMEs.</p>
                    
                    <div class="documents-upload">
                        <h3><i class="fas fa-file-alt"></i> Required Documents</h3>
                        
                        <div class="document-item">
                            <div class="document-info">
                                <i class="fas fa-file-pdf document-icon"></i>
                                <div>
                                    <div>Business Permit</div>
                                    <small>Upload your current business permit or DTI registration</small>
                                </div>
                            </div>
                            <span class="document-status status-missing">Not Uploaded</span>
                        </div>
                        
                        <div class="document-item">
                            <div class="document-info">
                                <i class="fas fa-file-image document-icon"></i>
                                <div>
                                    <div>Valid ID</div>
                                    <small>Government-issued ID of business owner/representative</small>
                                </div>
                            </div>
                            <span class="document-status status-missing">Not Uploaded</span>
                        </div>
                        
                        <div class="form-group" style="margin-top: 2rem;">
                            <label for="documentType"><i class="fas fa-file"></i> Document Type</label>
                            <select id="documentType" class="form-control">
                                <option value="">Select Document Type</option>
                                <option value="business_permit">Business Permit</option>
                                <option value="valid_id">Valid ID</option>
                                <option value="other">Other</option>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label for="documentUpload"><i class="fas fa-upload"></i> Upload Document</label>
                            <input type="file" id="documentUpload" class="form-control" accept=".pdf,.jpg,.jpeg,.png">
                            <small class="text-muted">Accepted formats: PDF, JPG, PNG (Max 5MB)</small>
                        </div>
                        
                        <button type="button" class="submit-button" style="margin-top: 1rem;" id="uploadDocumentBtn">
                            <i class="fas fa-cloud-upload-alt"></i> Upload Document
                        </button>
                    </div>
                </div>
            </div>
            
            <!-- Edit Profile Form (hidden by default) -->
            <div id="editProfileForm" class="profile-form" style="display: none;">
                <h2 class="dashboard-title">Edit Profile</h2>
                <form id="profileForm">
                    <div class="avatar-upload">
                        <img src="https://via.placeholder.com/100x100?text=ABC" alt="Avatar Preview" class="avatar-preview" id="avatarPreview">
                        <div class="upload-btn">
                            <label for="avatarUpload" class="upload-label">
                                <i class="fas fa-camera"></i> Change Logo
                            </label>
                            <input type="file" id="avatarUpload" accept="image/*">
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-col">
                            <div class="form-group">
                                <label for="profileName">Business Name</label>
                                <input type="text" id="profileName" name="name" required>
                            </div>
                        </div>
                        <div class="form-col">
                            <div class="form-group">
                                <label for="profileEmail">Email</label>
                                <input type="email" id="profileEmail" name="email" required>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-col">
                            <div class="form-group">
                                <label for="profileIndustry">Primary Industry</label>
                                <select id="profileIndustry" name="industry" required>
                                    <option value="">Select Industry</option>
                                    <option value="Agriculture">Agriculture</option>
                                    <option value="Food Processing">Food Processing</option>
                                    <option value="Textile">Textile and Garments</option>
                                    <option value="Handicrafts">Handicrafts</option>
                                    <option value="Furniture">Furniture</option>
                                    <option value="Metals">Metals and Engineering</option>
                                    <option value="ICT">Information and Communications Technology</option>
                                    <option value="Tourism">Tourism Support</option>
                                    <option value="Health">Health and Wellness</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-col">
                            <div class="form-group">
                                <label for="profileLocation">Business Location</label>
                                <select id="profileLocation" name="location" required>
                                    <option value="">Select Region</option>
                                    <option value="NCR">National Capital Region (NCR)</option>
                                    <option value="CAR">Cordillera Administrative Region (CAR)</option>
                                    <option value="Region I">Region I - Ilocos Region</option>
                                    <option value="Region II">Region II - Cagayan Valley</option>
                                    <option value="Region III">Region III - Central Luzon</option>
                                    <option value="Region IV-A">Region IV-A - CALABARZON</option>
                                    <option value="Region IV-B">Region IV-B - MIMAROPA</option>
                                    <option value="Region V">Region V - Bicol Region</option>
                                    <option value="Region VI">Region VI - Western Visayas</option>
                                    <option value="Region VII">Region VII - Central Visayas</option>
                                    <option value="Region VIII">Region VIII - Eastern Visayas</option>
                                    <option value="Region IX">Region IX - Zamboanga Peninsula</option>
                                    <option value="Region X">Region X - Northern Mindanao</option>
                                    <option value="Region XI">Region XI - Davao Region</option>
                                    <option value="Region XII">Region XII - SOCCSKSARGEN</option>
                                    <option value="Region XIII">Region XIII - Caraga</option>
                                    <option value="BARMM">Bangsamoro Autonomous Region (BARMM)</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="profileDescription">Business Description</label>
                        <textarea id="profileDescription" name="description" rows="4" placeholder="Tell us about your business..."></textarea>
                    </div>
                    
                    <button type="submit" class="submit-button"><i class="fas fa-save"></i> Save Changes</button>
                    <button type="button" id="cancelEditBtn" class="submit-button secondary-button" style="margin-top: 0.5rem;">
                        <i class="fas fa-times"></i> Cancel
                    </button>
                </form>
            </div>
        </section>
    </main>

    <!-- Add/Edit Facility Modal -->
    <div class="modal facility-modal" id="facilityModal">
        <div class="modal-content">
            <div class="modal-header">
                <h2 id="facilityModalTitle"><i class="fas fa-warehouse"></i> Add Facility</h2>
                <button class="close-button" id="closeFacilityModal">&times;</button>
            </div>
            <form id="facilityForm">
                <input type="hidden" id="facilityId">
                <div class="form-row">
                    <div class="form-col">
                        <div class="form-group">
                            <label for="facilityName"><i class="fas fa-signature"></i> Facility Name</label>
                            <input type="text" id="facilityName" required>
                        </div>
                    </div>
                    <div class="form-col">
                        <div class="form-group">
                            <label for="facilityType"><i class="fas fa-tags"></i> Facility Type</label>
                            <select id="facilityType" required>
                                <option value="">Select Type</option>
                                <option value="manufacturing">Manufacturing</option>
                                <option value="processing">Processing</option>
                                <option value="packaging">Packaging</option>
                                <option value="testing">Testing</option>
                                <option value="training">Training</option>
                                <option value="design">Design</option>
                                <option value="storage">Storage</option>
                            </select>
                        </div>
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="facilityDescription"><i class="fas fa-align-left"></i> Description</label>
                    <textarea id="facilityDescription" rows="4" required placeholder="Describe your facility and services..."></textarea>
                </div>
                
                <div class="form-row">
                    <div class="form-col">
                        <div class="form-group">
                            <label for="facilityLocation"><i class="fas fa-map-marker-alt"></i> Location</label>
                            <input type="text" id="facilityLocation" required placeholder="Full address of the facility">
                        </div>
                    </div>
                    <div class="form-col">
                        <div class="form-group">
                            <label for="facilityCapacity"><i class="fas fa-users"></i> Capacity</label>
                            <input type="number" id="facilityCapacity" required placeholder="Number of people it can accommodate">
                        </div>
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="facilityEquipment"><i class="fas fa-tools"></i> Equipment Available</label>
                    <textarea id="facilityEquipment" rows="3" placeholder="List the equipment available in this facility (comma separated)"></textarea>
                </div>
                
                <div class="form-group">
                    <label for="facilityServices"><i class="fas fa-concierge-bell"></i> Services Offered</label>
                    <textarea id="facilityServices" rows="3" placeholder="List the services offered (comma separated)"></textarea>
                </div>
                
                <div class="form-group">
                    <label for="facilityAvailability"><i class="fas fa-calendar-check"></i> Availability</label>
                    <select id="facilityAvailability" required>
                        <option value="available">Available</option>
                        <option value="limited">Limited Availability</option>
                        <option value="unavailable">Currently Unavailable</option>
                    </select>
                </div>
                
                <div class="form-group">
                    <label for="facilityImage"><i class="fas fa-image"></i> Facility Image</label>
                    <input type="file" id="facilityImage" accept="image/*">
                    <small class="text-muted">Upload a photo of your facility (JPG/PNG, max 5MB)</small>
                </div>
                
                <button type="submit" class="submit-button"><i class="fas fa-save"></i> Save Facility</button>
            </form>
        </div>
    </div>

    <!-- Booking Details Modal -->
    <div class="modal booking-modal" id="bookingModal">
        <div class="modal-content">
            <div class="modal-header">
                <h2 id="bookingModalTitle"><i class="fas fa-calendar-alt"></i> Booking Details</h2>
                <button class="close-button" id="closeBookingModal">&times;</button>
            </div>
            <div class="booking-details" id="bookingDetailsContent">
                <!-- Booking details will be inserted here -->
            </div>
            <div class="modal-actions" id="bookingActions">
                <!-- Action buttons will be inserted here -->
            </div>
        </div>
    </div>
    
    <script>
        // Sample data for demonstration
        const sampleData = {
            provider: {
                id: 1,
                name: "ABC Manufacturing Co.",
                email: "provider@example.com",
                businessType: "manufacturing",
                location: "NCR",
                contactPerson: "Juan Dela Cruz",
                contactNumber: "+63 912 345 6789",
                address: "123 Business Ave, Makati City, Philippines",
                description: "A leading provider of shared manufacturing facilities for MSMEs",
                status: "pending", // pending, approved, rejected
                avatar: "https://via.placeholder.com/100x100?text=ABC"
            },
            facilities: [
                { 
                    id: 1, 
                    name: "Packaging Line 1", 
                    type: "packaging", 
                    description: "Fully automated packaging line for small to medium scale production", 
                    location: "Makati City, NCR",
                    capacity: 5,
                    equipment: ["Automatic filling machine", "Labeling machine", "Sealing machine"],
                    services: ["Product packaging", "Labeling services", "Quality control"],
                    availability: "available",
                    image: "https://via.placeholder.com/600x400?text=Packaging+Line"
                },
                { 
                    id: 2, 
                    name: "CNC Workshop", 
                    type: "manufacturing", 
                    description: "Precision CNC machining for metal and wood products", 
                    location: "Quezon City, NCR",
                    capacity: 3,
                    equipment: ["CNC milling machine", "Lathe", "Drill press"],
                    services: ["Prototyping", "Small batch production", "Design consultation"],
                    availability: "available",
                    image: "https://via.placeholder.com/600x400?text=CNC+Workshop"
                },
                { 
                    id: 3, 
                    name: "Testing Laboratory", 
                    type: "testing", 
                    description: "Quality control and product testing laboratory", 
                    location: "Pasig City, NCR",
                    capacity: 4,
                    equipment: ["Spectrophotometer", "Moisture analyzer", "Texture analyzer"],
                    services: ["Quality testing", "Product certification", "Research support"],
                    availability: "limited",
                    image: "https://via.placeholder.com/600x400?text=Testing+Lab"
                }
            ],
            requests: [
                { 
                    id: 1, 
                    msmeId: 101, 
                    msmeName: "XYZ Foods", 
                    facilityId: 1, 
                    facilityName: "Packaging Line 1", 
                    dateRequested: "2023-05-15", 
                    bookingDate: "2023-06-10", 
                    timeSlot: "10:00-12:00",
                    purpose: "Packaging of 500 units of our new pastry product",
                    status: "pending",
                    equipmentRequested: "Automatic filling machine, Sealing machine"
                },
                { 
                    id: 2, 
                    msmeId: 102, 
                    msmeName: "123 Crafts", 
                    facilityId: 2, 
                    facilityName: "CNC Workshop", 
                    dateRequested: "2023-05-12", 
                    bookingDate: "2023-06-08", 
                    timeSlot: "13:00-15:00",
                    purpose: "Prototype development for new furniture line",
                    status: "approved",
                    equipmentRequested: "CNC milling machine"
                },
                { 
                    id: 3, 
                    msmeId: 103, 
                    msmeName: "Sample Textiles", 
                    facilityId: 3, 
                    facilityName: "Testing Laboratory", 
                    dateRequested: "2023-05-18", 
                    bookingDate: "2023-06-15", 
                    timeSlot: "09:00-11:00",
                    purpose: "Fabric quality testing for export compliance",
                    status: "rejected",
                    rejectionReason: "Facility undergoing maintenance during requested time",
                    equipmentRequested: "Spectrophotometer"
                }
            ],
            bookings: [
                { 
                    id: 2, 
                    msmeId: 102, 
                    msmeName: "123 Crafts", 
                    facilityId: 2, 
                    facilityName: "CNC Workshop", 
                    dateBooked: "2023-05-12", 
                    bookingDate: "2023-06-08", 
                    timeSlot: "13:00-15:00",
                    purpose: "Prototype development for new furniture line",
                    status: "confirmed",
                    equipmentRequested: "CNC milling machine"
                }
            ]
        };

        // State management
        let state = {
            currentUser: sampleData.provider,
            currentFacility: null,
            currentRequest: null,
            currentBooking: null,
            isEditingFacility: false,
            isEditingProfile: false
        };

        // DOM Elements
        const facilityModal = document.getElementById('facilityModal');
        const bookingModal = document.getElementById('bookingModal');
        const closeFacilityModal = document.getElementById('closeFacilityModal');
        const closeBookingModal = document.getElementById('closeBookingModal');
        const homeSection = document.getElementById('homeSection');
        const dashboardSection = document.getElementById('dashboardSection');
        const profileTab = document.getElementById('profileTab');
        const requestsTab = document.getElementById('requestsTab');
        const facilitiesTab = document.getElementById('facilitiesTab');
        const bookingsTab = document.getElementById('bookingsTab');
        const documentsTab = document.getElementById('documentsTab');
        const profileDisplay = document.getElementById('profileDisplay');
        const editProfileForm = document.getElementById('editProfileForm');
        const editProfileBtn = document.getElementById('editProfileBtn');
        const cancelEditBtn = document.getElementById('cancelEditBtn');
        const profileForm = document.getElementById('profileForm');
        const requestsTableBody = document.getElementById('requestsTableBody');
        const facilitiesList = document.getElementById('facilitiesList');
        const bookingsTableBody = document.getElementById('bookingsTableBody');
        const addFacilityBtn = document.getElementById('addFacilityBtn');
        const facilityForm = document.getElementById('facilityForm');
        const facilityModalTitle = document.getElementById('facilityModalTitle');
        const bookingDetailsContent = document.getElementById('bookingDetailsContent');
        const bookingActions = document.getElementById('bookingActions');
        const uploadDocumentBtn = document.getElementById('uploadDocumentBtn');
        const documentUpload = document.getElementById('documentUpload');
        const documentType = document.getElementById('documentType');
        const profileAvatar = document.getElementById('profileAvatar');
        const avatarPreview = document.getElementById('avatarPreview');
        const avatarUpload = document.getElementById('avatarUpload');
        const profileNameDisplay = document.getElementById('profileNameDisplay');
        const profileIndustryDisplay = document.getElementById('profileIndustryDisplay');
        const profileLocationDisplay = document.getElementById('profileLocationDisplay');
        const logoutBtn = document.getElementById('logoutBtn');
        const facilitiesCount = document.getElementById('facilitiesCount');
        const requestsCount = document.getElementById('requestsCount');
        const bookingsCount = document.getElementById('bookingsCount');

        // Initialize the application
        document.addEventListener('DOMContentLoaded', function() {
            // Event listeners for modals
            closeFacilityModal.addEventListener('click', () => {
                facilityModal.style.display = 'none';
            });
            
            closeBookingModal.addEventListener('click', () => {
                bookingModal.style.display = 'none';
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
                state.isEditingProfile = true;
                profileDisplay.style.display = 'none';
                editProfileForm.style.display = 'block';
                
                // Populate form with current data
                document.getElementById('profileName').value = state.currentUser.name;
                document.getElementById('profileEmail').value = state.currentUser.email;
                document.getElementById('profileIndustry').value = state.currentUser.businessType;
                document.getElementById('profileLocation').value = state.currentUser.location;
                document.getElementById('profileDescription').value = state.currentUser.description || '';
            });
            
            cancelEditBtn.addEventListener('click', () => {
                state.isEditingProfile = false;
                profileDisplay.style.display = 'block';
                editProfileForm.style.display = 'none';
            });
            
            // Avatar upload
            avatarUpload.addEventListener('change', function(e) {
                if (e.target.files && e.target.files[0]) {
                    const reader = new FileReader();
                    
                    reader.onload = function(event) {
                        avatarPreview.src = event.target.result;
                        profileAvatar.src = event.target.result;
                        state.currentUser.avatar = event.target.result;
                    };
                    
                    reader.readAsDataURL(e.target.files[0]);
                }
            });
            
            // Document upload
            uploadDocumentBtn.addEventListener('click', function() {
                const file = documentUpload.files[0];
                const type = documentType.value;
                
                if (!type) {
                    alert('Please select a document type');
                    return;
                }
                
                if (!file) {
                    alert('Please select a file to upload');
                    return;
                }
                
                // Check file type
                const validTypes = ['application/pdf', 'image/jpeg', 'image/png'];
                if (!validTypes.includes(file.type)) {
                    alert('Please upload a PDF, JPG, or PNG file');
                    return;
                }
                
                // Check file size (5MB max)
                if (file.size > 5 * 1024 * 1024) {
                    alert('File size must be less than 5MB');
                    return;
                }
                
                // In a real app, this would upload to a server
                alert(`Successfully uploaded ${file.name} as ${type.replace('_', ' ')}`);
                
                // Update UI to show document is uploaded
                const documentItems = document.querySelectorAll('.document-item');
                documentItems.forEach(item => {
                    const docType = item.querySelector('div').textContent.trim();
                    if ((type === 'business_permit' && docType === 'Business Permit') || 
                        (type === 'valid_id' && docType === 'Valid ID')) {
                        item.querySelector('.document-status').className = 'document-status status-pending';
                        item.querySelector('.document-status').textContent = 'Pending Verification';
                    }
                });
                
                // Reset form
                documentUpload.value = '';
            });
            
            // Facility management
            addFacilityBtn.addEventListener('click', () => {
                state.isEditingFacility = false;
                state.currentFacility = null;
                facilityModalTitle.textContent = 'Add New Facility';
                facilityForm.reset();
                document.getElementById('facilityId').value = '';
                facilityModal.style.display = 'flex';
            });
            
            // Form submissions
            profileForm.addEventListener('submit', (e) => {
                e.preventDefault();
                const name = document.getElementById('profileName').value;
                const email = document.getElementById('profileEmail').value;
                const industry = document.getElementById('profileIndustry').value;
                const location = document.getElementById('profileLocation').value;
                const description = document.getElementById('profileDescription').value;
                
                // Update current user
                state.currentUser = {
                    ...state.currentUser,
                    name,
                    email,
                    businessType: industry,
                    location,
                    description
                };
                
                // Update profile display
                profileNameDisplay.textContent = name;
                profileIndustryDisplay.textContent = industry;
                profileLocationDisplay.textContent = location;
                
                alert('Profile updated successfully!');
                state.isEditingProfile = false;
                profileDisplay.style.display = 'block';
                editProfileForm.style.display = 'none';
                renderUserProfile();
            });
            
            facilityForm.addEventListener('submit', (e) => {
                e.preventDefault();
                const id = document.getElementById('facilityId').value;
                const name = document.getElementById('facilityName').value;
                const type = document.getElementById('facilityType').value;
                const description = document.getElementById('facilityDescription').value;
                const location = document.getElementById('facilityLocation').value;
                const capacity = document.getElementById('facilityCapacity').value;
                const equipment = document.getElementById('facilityEquipment').value;
                const services = document.getElementById('facilityServices').value;
                const availability = document.getElementById('facilityAvailability').value;
                
                if (state.isEditingFacility) {
                    // Update existing facility
                    const facilityIndex = sampleData.facilities.findIndex(f => f.id === parseInt(id));
                    if (facilityIndex !== -1) {
                        sampleData.facilities[facilityIndex] = {
                            ...sampleData.facilities[facilityIndex],
                            name,
                            type,
                            description,
                            location,
                            capacity,
                            equipment: equipment.split(',').map(item => item.trim()),
                            services: services.split(',').map(item => item.trim()),
                            availability
                        };
                    }
                    alert('Facility updated successfully!');
                } else {
                    // Add new facility
                    const newId = sampleData.facilities.length > 0 ? 
                        Math.max(...sampleData.facilities.map(f => f.id)) + 1 : 1;
                    
                    sampleData.facilities.push({
                        id: newId,
                        name,
                        type,
                        description,
                        location,
                        capacity,
                        equipment: equipment.split(',').map(item => item.trim()),
                        services: services.split(',').map(item => item.trim()),
                        availability,
                        image: "https://via.placeholder.com/600x400?text=" + encodeURIComponent(name)
                    });
                    alert('Facility added successfully!');
                }
                
                // Update UI
                renderFacilitiesList();
                updateStatistics();
                facilityModal.style.display = 'none';
            });

            // Logout button
            logoutBtn.addEventListener('click', () => {
                if (confirm('Are you sure you want to logout?')) {
                    alert('You have been logged out');
                    // In a real app, this would redirect to the login page
                }
            });

            // Initialize the dashboard
            renderUserProfile();
            renderFacilitiesList();
            renderAccessRequests();
            renderBookings();
            updateStatistics();
        });

        // Update statistics
        function updateStatistics() {
            facilitiesCount.textContent = sampleData.facilities.length;
            requestsCount.textContent = sampleData.requests.filter(r => r.status === 'pending').length;
            bookingsCount.textContent = sampleData.bookings.length;
        }
        
        // Render user profile
        function renderUserProfile() {
            if (!state.currentUser) return;
            
            profileDisplay.innerHTML = `
                <div style="background-color: white; padding: 1.5rem; border-radius: var(--border-radius); box-shadow: var(--box-shadow);">
                    <div style="margin-bottom: 1rem;">
                        <strong><i class="fas fa-building"></i> Business Name:</strong> ${state.currentUser.name}
                    </div>
                    <div style="margin-bottom: 1rem;">
                        <strong><i class="fas fa-envelope"></i> Email:</strong> ${state.currentUser.email}
                    </div>
                    <div style="margin-bottom: 1rem;">
                        <strong><i class="fas fa-industry"></i> Industry:</strong> ${state.currentUser.businessType}
                    </div>
                    <div style="margin-bottom: 1rem;">
                        <strong><i class="fas fa-map-marker-alt"></i> Location:</strong> ${state.currentUser.location}
                    </div>
                    ${state.currentUser.description ? `
                    <div style="margin-top: 1rem;">
                        <strong><i class="fas fa-align-left"></i> Description:</strong>
                        <p style="margin-top: 0.5rem;">${state.currentUser.description}</p>
                    </div>` : ''}
                </div>
            `;
            
            // Update profile display in header
            profileNameDisplay.textContent = state.currentUser.name;
            profileIndustryDisplay.textContent = state.currentUser.businessType;
            profileLocationDisplay.textContent = state.currentUser.location;
            
            // Set avatar if available
            if (state.currentUser.avatar) {
                profileAvatar.src = state.currentUser.avatar;
                avatarPreview.src = state.currentUser.avatar;
            }
        }
        
        // Render facilities list
        function renderFacilitiesList() {
            if (!state.currentUser) return;
            
            facilitiesList.innerHTML = '';
            
            if (sampleData.facilities.length === 0) {
                facilitiesList.innerHTML = `
                    <div class="empty-state">
                        <div class="empty-icon"><i class="fas fa-warehouse"></i></div>
                        <h3>No Facilities Added</h3>
                        <p>You haven't added any facilities yet. Click "Add Facility" to get started.</p>
                    </div>
                `;
                return;
            }
            
            sampleData.facilities.forEach(facility => {
                const card = document.createElement('div');
                card.className = 'facility-card';
                card.innerHTML = `
                    <div class="facility-header">
                        <div>
                            <h3 class="facility-title">${facility.name}</h3>
                            <span class="facility-type">${facility.type}</span>
                        </div>
                        <span class="status-badge ${facility.availability === 'available' ? 'status-approved' : 
                            facility.availability === 'limited' ? 'status-pending' : 'status-rejected'}">
                            ${facility.availability.charAt(0).toUpperCase() + facility.availability.slice(1)}
                        </span>
                    </div>
                    <p class="facility-description">${facility.description}</p>
                    <div class="facility-details">
                        <div class="facility-detail">
                            <i class="fas fa-map-marker-alt"></i>
                            <span>${facility.location}</span>
                        </div>
                        <div class="facility-detail">
                            <i class="fas fa-users"></i>
                            <span>Capacity: ${facility.capacity} people</span>
                        </div>
                    </div>
                    <div class="facility-actions">
                        <button class="view-button edit-facility" data-id="${facility.id}">
                            <i class="fas fa-edit"></i> Edit
                        </button>
                        <button class="view-button danger-button delete-facility" data-id="${facility.id}">
                            <i class="fas fa-trash"></i> Delete
                        </button>
                    </div>
                `;
                facilitiesList.appendChild(card);
            });
            
            // Add event listeners to facility action buttons
            document.querySelectorAll('.edit-facility').forEach(button => {
                button.addEventListener('click', (e) => {
                    e.preventDefault();
                    const facilityId = parseInt(button.getAttribute('data-id'));
                    editFacility(facilityId);
                });
            });
            
            document.querySelectorAll('.delete-facility').forEach(button => {
                button.addEventListener('click', (e) => {
                    e.preventDefault();
                    const facilityId = parseInt(button.getAttribute('data-id'));
                    deleteFacility(facilityId);
                });
            });
        }
        
        // Edit facility
        function editFacility(facilityId) {
            const facility = sampleData.facilities.find(f => f.id === facilityId);
            if (!facility) return;
            
            state.isEditingFacility = true;
            state.currentFacility = facility;
            facilityModalTitle.textContent = 'Edit Facility';
            
            // Populate form
            document.getElementById('facilityId').value = facility.id;
            document.getElementById('facilityName').value = facility.name;
            document.getElementById('facilityType').value = facility.type;
            document.getElementById('facilityDescription').value = facility.description;
            document.getElementById('facilityLocation').value = facility.location;
            document.getElementById('facilityCapacity').value = facility.capacity;
            document.getElementById('facilityEquipment').value = facility.equipment.join(', ');
            document.getElementById('facilityServices').value = facility.services.join(', ');
            document.getElementById('facilityAvailability').value = facility.availability;
            
            facilityModal.style.display = 'flex';
        }
        
        // Delete facility
        function deleteFacility(facilityId) {
            if (!confirm('Are you sure you want to delete this facility?')) return;
            
            // In a real app, this would delete from a server
            sampleData.facilities = sampleData.facilities.filter(f => f.id !== facilityId);
            alert('Facility deleted successfully');
            renderFacilitiesList();
            updateStatistics();
        }
        
        // Render access requests
        function renderAccessRequests() {
            if (!state.currentUser) return;
            
            requestsTableBody.innerHTML = '';
            
            if (sampleData.requests.length === 0) {
                requestsTableBody.innerHTML = `
                    <tr>
                        <td colspan="5" class="empty-state">
                            <div class="empty-icon"><i class="fas fa-clipboard-list"></i></div>
                            <h3>No Access Requests</h3>
                            <p>You don't have any pending access requests from MSMEs</p>
                        </td>
                    </tr>
                `;
                return;
            }
            
            sampleData.requests.forEach(request => {
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
                    <td>${request.msmeName}</td>
                    <td>${request.facilityName}</td>
                    <td>${request.dateRequested}</td>
                    <td>${statusBadge}</td>
                    <td>
                        <div class="action-buttons">
                            <button class="view-button view-request" data-id="${request.id}" style="padding: 0.25rem 0.5rem; font-size: 0.8rem;">
                                <i class="fas fa-eye"></i> View
                            </button>
                            ${request.status === 'pending' ? `
                            <button class="view-button success-button approve-request" data-id="${request.id}" style="padding: 0.25rem 0.5rem; font-size: 0.8rem;">
                                <i class="fas fa-check"></i> Approve
                            </button>
                            <button class="view-button danger-button reject-request" data-id="${request.id}" style="padding: 0.25rem 0.5rem; font-size: 0.8rem;">
                                <i class="fas fa-times"></i> Reject
                            </button>
                            ` : ''}
                        </div>
                    </td>
                `;
                requestsTableBody.appendChild(row);
            });
            
            // Add event listeners to request action buttons
            document.querySelectorAll('.view-request').forEach(button => {
                button.addEventListener('click', (e) => {
                    e.preventDefault();
                    const requestId = parseInt(button.getAttribute('data-id'));
                    viewRequestDetails(requestId);
                });
            });
            
            document.querySelectorAll('.approve-request').forEach(button => {
                button.addEventListener('click', (e) => {
                    e.preventDefault();
                    const requestId = parseInt(button.getAttribute('data-id'));
                    approveRequest(requestId);
                });
            });
            
            document.querySelectorAll('.reject-request').forEach(button => {
                button.addEventListener('click', (e) => {
                    e.preventDefault();
                    const requestId = parseInt(button.getAttribute('data-id'));
                    rejectRequest(requestId);
                });
            });
        }
        
        // View request details
        function viewRequestDetails(requestId) {
            const request = sampleData.requests.find(r => r.id === requestId);
            if (!request) return;
            
            state.currentRequest = request;
            
            let statusMessage = '';
            if (request.status === 'rejected' && request.rejectionReason) {
                statusMessage = `<p><strong>Reason for rejection:</strong> ${request.rejectionReason}</p>`;
            } else if (request.status === 'pending') {
                statusMessage = `<p><i class="fas fa-info-circle"></i> This request is awaiting your approval</p>`;
            }
            
            bookingDetailsContent.innerHTML = `
                <div class="booking-field">
                    <strong><i class="fas fa-building"></i> MSME:</strong> ${request.msmeName}
                </div>
                <div class="booking-field">
                    <strong><i class="fas fa-warehouse"></i> Facility:</strong> ${request.facilityName}
                </div>
                <div class="booking-field">
                    <strong><i class="fas fa-calendar-day"></i> Requested Date:</strong> ${request.dateRequested}
                </div>
                <div class="booking-field">
                    <strong><i class="fas fa-clock"></i> Booking Date:</strong> ${request.bookingDate} (${request.timeSlot})
                </div>
                <div class="booking-field">
                    <strong><i class="fas fa-info-circle"></i> Status:</strong> ${request.status.charAt(0).toUpperCase() + request.status.slice(1)}
                </div>
                <div class="booking-field">
                    <strong><i class="fas fa-edit"></i> Purpose:</strong> ${request.purpose}
                </div>
                <div class="booking-field">
                    <strong><i class="fas fa-tools"></i> Equipment Requested:</strong> ${request.equipmentRequested || 'None specified'}
                </div>
                ${statusMessage}
            `;
            
            // Set up action buttons based on request status
            bookingActions.innerHTML = '';
            if (request.status === 'pending') {
                bookingActions.innerHTML = `
                    <button class="submit-button success-button" id="modalApproveRequest">
                        <i class="fas fa-check"></i> Approve Request
                    </button>
                    <button class="submit-button danger-button" id="modalRejectRequest" style="margin-left: 0.5rem;">
                        <i class="fas fa-times"></i> Reject Request
                    </button>
                `;
                
                document.getElementById('modalApproveRequest').addEventListener('click', () => {
                    approveRequest(requestId);
                    bookingModal.style.display = 'none';
                });
                
                document.getElementById('modalRejectRequest').addEventListener('click', () => {
                    const reason = prompt('Please enter reason for rejection:');
                    if (reason) {
                        rejectRequest(requestId, reason);
                        bookingModal.style.display = 'none';
                    }
                });
            }
            
            bookingModalTitle.textContent = 'Request Details';
            bookingModal.style.display = 'flex';
        }
        
        // Approve request
        function approveRequest(requestId) {
            const request = sampleData.requests.find(r => r.id === requestId);
            if (!request) return;
            
            // In a real app, this would update on a server
            request.status = 'approved';
            
            // Add to bookings if not already there
            const existingBooking = sampleData.bookings.find(b => b.id === requestId);
            if (!existingBooking) {
                sampleData.bookings.push({
                    ...request,
                    status: 'confirmed',
                    dateBooked: new Date().toISOString().split('T')[0]
                });
            }
            
            alert('Request approved successfully!');
            renderAccessRequests();
            renderBookings();
            updateStatistics();
        }
        
        // Reject request
        function rejectRequest(requestId, reason) {
            const request = sampleData.requests.find(r => r.id === requestId);
            if (!request) return;
            
            // In a real app, this would update on a server
            request.status = 'rejected';
            request.rejectionReason = reason;
            
            alert('Request rejected');
            renderAccessRequests();
            updateStatistics();
        }
        
        // Render bookings
        function renderBookings() {
            if (!state.currentUser) return;
            
            bookingsTableBody.innerHTML = '';
            
            if (sampleData.bookings.length === 0) {
                bookingsTableBody.innerHTML = `
                    <tr>
                        <td colspan="5" class="empty-state">
                            <div class="empty-icon"><i class="fas fa-calendar-alt"></i></div>
                            <h3>No Confirmed Bookings</h3>
                            <p>You don't have any confirmed bookings yet</p>
                        </td>
                    </tr>
                `;
                return;
            }
            
            sampleData.bookings.forEach(booking => {
                const row = document.createElement('tr');
                
                row.innerHTML = `
                    <td>${booking.msmeName}</td>
                    <td>${booking.facilityName}</td>
                    <td>${booking.bookingDate} (${booking.timeSlot})</td>
                    <td><span class="status-badge status-approved"><i class="fas fa-check-circle"></i> Confirmed</span></td>
                    <td>
                        <div class="action-buttons">
                            <button class="view-button view-booking" data-id="${booking.id}" style="padding: 0.25rem 0.5rem; font-size: 0.8rem;">
                                <i class="fas fa-eye"></i> View
                            </button>
                            <button class="view-button secondary-button" data-id="${booking.id}" style="padding: 0.25rem 0.5rem; font-size: 0.8rem;">
                                <i class="fas fa-download"></i> Receipt
                            </button>
                        </div>
                    </td>
                `;
                bookingsTableBody.appendChild(row);
            });
            
            // Add event listeners to booking action buttons
            document.querySelectorAll('.view-booking').forEach(button => {
                button.addEventListener('click', (e) => {
                    e.preventDefault();
                    const bookingId = parseInt(button.getAttribute('data-id'));
                    viewBookingDetails(bookingId);
                });
            });
        }
        
        // View booking details
        function viewBookingDetails(bookingId) {
            const booking = sampleData.bookings.find(b => b.id === bookingId);
            if (!booking) return;
            
            state.currentBooking = booking;
            
            bookingDetailsContent.innerHTML = `
                <div class="booking-field">
                    <strong><i class="fas fa-building"></i> MSME:</strong> ${booking.msmeName}
                </div>
                <div class="booking-field">
                    <strong><i class="fas fa-warehouse"></i> Facility:</strong> ${booking.facilityName}
                </div>
                <div class="booking-field">
                    <strong><i class="fas fa-calendar-day"></i> Booked Date:</strong> ${booking.dateBooked}
                </div>
                <div class="booking-field">
                    <strong><i class="fas fa-clock"></i> Booking Date:</strong> ${booking.bookingDate} (${booking.timeSlot})
                </div>
                <div class="booking-field">
                    <strong><i class="fas fa-info-circle"></i> Status:</strong> ${booking.status.charAt(0).toUpperCase() + booking.status.slice(1)}
                </div>
                <div class="booking-field">
                    <strong><i class="fas fa-edit"></i> Purpose:</strong> ${booking.purpose}
                </div>
                <div class="booking-field">
                    <strong><i class="fas fa-tools"></i> Equipment Requested:</strong> ${booking.equipmentRequested || 'None specified'}
                </div>
            `;
            
            // Set up action buttons
            bookingActions.innerHTML = '';
            
            bookingModalTitle.textContent = 'Booking Details';
            bookingModal.style.display = 'flex';
        }
    </script>
</body>
</html>