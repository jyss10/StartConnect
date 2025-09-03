<?php
include "session_check.php";
if ($_SESSION['role'] !== 'msme') {
    header("Location: index.html");
    exit;
}

// Get user data from database
include "db.php";
$user_id = $_SESSION['user_id'];
$user_query = $conn->query("SELECT u.*, m.business_name, m.business_type 
                           FROM users u 
                           LEFT JOIN msme_profiles m ON u.id = m.user_id 
                           WHERE u.id = $user_id");
$user_data = $user_query->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DTI SSF Platform for MSMEs</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="msmedashboard.css">
</head>
<body>
    <header>
        <div class="container header-content">
            <div class="logo">
                <img src="https://via.placeholder.com/30x30?text=DTI" alt="DTI Logo">
                <span>DTI SSF Platform</span>
            </div>
            <nav>
                <ul>
                    <li><a href="#" id="homeLink">Home</a></li>
                    <li><a href="#" id="facilitiesLink">Facilities</a></li>
                    <li><a href="#" id="dashboardLink">Dashboard</a></li>
                    <li><a href="#">About</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>
            </nav>
            <div class="auth-buttons">
                <div class="user-profile">
                    <img src="https://via.placeholder.com/30x30?text=<?php echo substr($user_data['business_name'] ?: 'U', 0, 1); ?>" 
                         alt="Profile" class="profile-avatar-small">
                    <span><?php echo $user_data['business_name'] ?: $user_data['email']; ?></span>
                </div>
                <a href="logout.php" class="logout-btn"><i class="fas fa-sign-out-alt"></i> Logout</a>
            </div>
        </div>
    </header>

    <main class="container">
        <!-- Home/Facilities Section -->
        <section id="homeSection">
            <section class="hero">
                <div class="container">
                    <h1>Find Shared Service Facilities for Your MSME</h1>
                    <p>Discover and access DTI-registered Shared Service Facilities across the Philippines to help grow your business</p>
                    
                    <div class="search-container">
                        <form class="search-form" id="searchForm">
                            <div class="search-row">
                                <div class="search-group">
                                    <label for="location"><i class="fas fa-map-marker-alt"></i> Location</label>
                                    <select id="location" name="location">
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
                                <div class="search-group">
                                    <label for="industry"><i class="fas fa-industry"></i> Industry</label>
                                    <select id="industry" name="industry">
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
                            <div class="search-row">
                                <div class="search-group">
                                    <label for="service"><i class="fas fa-concierge-bell"></i> Service Type</label>
                                    <select id="service" name="service">
                                        <option value="">Select Service</option>
                                        <option value="Production">Production</option>
                                        <option value="Processing">Processing</option>
                                        <option value="Packaging">Packaging</option>
                                        <option value="Testing">Testing</option>
                                        <option value="Training">Training</option>
                                        <option value="Design">Design</option>
                                    </select>
                                </div>
                                <div class="search-group">
                                    <label for="equipment"><i class="fas fa-tools"></i> Equipment Needed</label>
                                    <input type="text" id="equipment" name="equipment" placeholder="e.g. CNC machine, oven, etc.">
                                </div>
                            </div>
                            <button type="submit" class="search-button"><i class="fas fa-search"></i> Search Facilities</button>
                        </form>
                    </div>
                </div>
            </section>

            <section class="features">
                <div class="container">
                    <h2 class="section-title">How It Works</h2>
                    <div class="features-grid">
                        <div class="feature-card">
                            <div class="feature-icon"><i class="fas fa-search"></i></div>
                            <h3>Find Facilities</h3>
                            <p>Search for Shared Service Facilities by location, industry, services offered, or specific equipment you need.</p>
                        </div>
                        <div class="feature-card">
                            <div class="feature-icon"><i class="fas fa-calendar-check"></i></div>
                            <h3>Book & Use</h3>
                            <p>Contact facility operators directly to book equipment or services for your business needs.</p>
                        </div>
                        <div class="feature-card">
                            <div class="feature-icon"><i class="fas fa-star"></i></div>
                            <h3>Rate & Review</h3>
                            <p>Share your experience to help other MSMEs make informed decisions about which facilities to use.</p>
                        </div>
                    </div>
                </div>
            </section>

            <section class="results-section" id="facilitiesSection">
                <div class="container">
                    <h2 class="section-title">Available Facilities</h2>
                    <div class="filter-sidebar">
                        <h3><i class="fas fa-filter"></i> Refine Your Search</h3>
                        <div class="filter-group">
                            <h4><i class="fas fa-map-marker-alt"></i> Location</h4>
                            <div class="filter-options">
                                <label><input type="checkbox" name="filter-location" value="NCR"> NCR</label>
                                <label><input type="checkbox" name="filter-location" value="Region IV-A"> CALABARZON</label>
                                <label><input type="checkbox" name="filter-location" value="Region VII"> Central Visayas</label>
                                <label><input type="checkbox" name="filter-location" value="Region XI"> Davao Region</label>
                            </div>
                        </div>
                        <div class="filter-group">
                            <h4><i class="fas fa-industry"></i> Industry</h4>
                            <div class="filter-options">
                                <label><input type="checkbox" name="filter-industry" value="Food Processing"> Food Processing</label>
                                <label><input type="checkbox" name="filter-industry" value="Textile"> Textile</label>
                                <label><input type="checkbox" name="filter-industry" value="Furniture"> Furniture</label>
                                <label><input type="checkbox" name="filter-industry" value="ICT"> ICT</label>
                            </div>
                        </div>
                        <div class="filter-group">
                            <h4><i class="fas fa-star"></i> Rating</h4>
                            <div class="filter-options">
                                <label><input type="checkbox" name="filter-rating" value="5"> ⭐⭐⭐⭐⭐</label>
                                <label><input type="checkbox" name="filter-rating" value="4"> ⭐⭐⭐⭐</label>
                                <label><input type="checkbox" name="filter-rating" value="3"> ⭐⭐⭐</label>
                                <label><input type="checkbox" name="filter-rating" value="2"> ⭐⭐</label>
                            </div>
                        </div>
                        <button class="search-button" id="applyFilters"><i class="fas fa-filter"></i> Apply Filters</button>
                    </div>
                    
                    <div class="results-grid" id="facilitiesGrid">
                        <!-- Facility cards will be dynamically inserted here -->
                    </div>
                </div>
            </section>
        </section>

        <!-- Dashboard Section -->
        <section class="dashboard" id="dashboardSection">
            <div class="dashboard-header">
                <div class="user-profile-header">
                    <img src="https://via.placeholder.com/100x100?text=<?php echo substr($user_data['business_name'] ?: 'U', 0, 1); ?>" 
                         alt="Profile" class="profile-avatar" id="profileAvatar">
                    <div class="profile-info">
                        <h1 class="profile-name" id="profileNameDisplay"><?php echo $user_data['business_name'] ?: 'My Business'; ?></h1>
                        <span class="profile-industry" id="profileIndustryDisplay"><?php echo $user_data['business_type'] ?: 'MSME'; ?></span>
                        <div class="profile-location">
                            <i class="fas fa-map-marker-alt"></i>
                            <span id="profileLocationDisplay">Philippines</span>
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
                    <i class="fas fa-clipboard-list"></i> My Requests
                </button>
                <button class="tab-button" data-tab="bookingsTab">
                    <i class="fas fa-calendar-alt"></i> My Bookings
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
                <h2 class="dashboard-title">My Facility Requests</h2>
                <table class="requests-table">
                    <thead>
                        <tr>
                            <th>Facility</th>
                            <th>Date Requested</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody id="requestsTableBody">
                        <!-- Requests will be dynamically inserted here -->
                    </tbody>
                </table>
            </div>
            
            <div class="tab-content" id="bookingsTab">
                <h2 class="dashboard-title">My Bookings</h2>
                <table class="requests-table">
                    <thead>
                        <tr>
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
                    <p>Upload documents to verify your business credentials and increase trust with facility providers. Verified accounts get priority access to facilities.</p>
                    
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
                            <label for="documentUpload"><i class="fas fa-upload"></i> Upload Document</label>
                            <input type="file" id="documentUpload" class="form-control">
                            <small class="text-muted">Accepted formats: PDF, JPG, PNG (Max 5MB)</small>
                        </div>
                        
                        <button type="button" class="submit-button" style="margin-top: 1rem;">
                            <i class="fas fa-cloud-upload-alt"></i> Upload Selected Document
                        </button>
                    </div>
                </div>
            </div>
            
            <!-- Edit Profile Form (hidden by default) -->
            <div id="editProfileForm" class="profile-form" style="display: none;">
                <h2 class="dashboard-title">Edit Profile</h2>
                <form id="profileForm">
                    <div class="avatar-upload">
                        <img src="https://via.placeholder.com/100x100?text=<?php echo substr($user_data['business_name'] ?: 'U', 0, 1); ?>" 
                             alt="Avatar Preview" class="avatar-preview" id="avatarPreview">
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
                                <input type="text" id="profileName" name="name" value="<?php echo $user_data['business_name'] ?: ''; ?>" required>
                            </div>
                        </div>
                        <div class="form-col">
                            <div class="form-group">
                                <label for="profileEmail">Email</label>
                                <input type="email" id="profileEmail" name="email" value="<?php echo $user_data['email']; ?>" required>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-col">
                            <div class="form-group">
                                <label for="profileIndustry">Primary Industry</label>
                                <select id="profileIndustry" name="industry" required>
                                    <option value="">Select Industry</option>
                                    <option value="Agriculture" <?php echo ($user_data['business_type'] == 'Agriculture') ? 'selected' : ''; ?>>Agriculture</option>
                                    <option value="Food Processing" <?php echo ($user_data['business_type'] == 'Food Processing') ? 'selected' : ''; ?>>Food Processing</option>
                                    <option value="Textile" <?php echo ($user_data['business_type'] == 'Textile') ? 'selected' : ''; ?>>Textile and Garments</option>
                                    <option value="Handicrafts" <?php echo ($user_data['business_type'] == 'Handicrafts') ? 'selected' : ''; ?>>Handicrafts</option>
                                    <option value="Furniture" <?php echo ($user_data['business_type'] == 'Furniture') ? 'selected' : ''; ?>>Furniture</option>
                                    <option value="Metals" <?php echo ($user_data['business_type'] == 'Metals') ? 'selected' : ''; ?>>Metals and Engineering</option>
                                    <option value="ICT" <?php echo ($user_data['business_type'] == 'ICT') ? 'selected' : ''; ?>>Information and Communications Technology</option>
                                    <option value="Tourism" <?php echo ($user_data['business_type'] == 'Tourism') ? 'selected' : ''; ?>>Tourism Support</option>
                                    <option value="Health" <?php echo ($user_data['business_type'] == 'Health') ? 'selected' : ''; ?>>Health and Wellness</option>
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

    <!-- Facility Detail Modal -->
    <div class="modal facility-modal" id="facilityModal">
        <div class="modal-content">
            <div class="modal-header">
                <h2 id="facilityModalTitle"><i class="fas fa-info-circle"></i> Facility Details</h2>
                <button class="close-button" id="closeFacilityModal">&times;</button>
            </div>
            <div class="facility-header">
                <h1 class="facility-title" id="facilityName">Food Processing Center</h1>
                <div class="facility-location">
                    <i class="fas fa-map-marker-alt"></i>
                    <span id="facilityLocation">Quezon City, NCR</span>
                </div>
                <div class="facility-rating">
                    <span class="stars">⭐⭐⭐⭐⭐</span>
                    <span id="facilityRating">4.8 (24 reviews)</span>
                </div>
            </div>
            <div class="facility-image" id="facilityImage"></div>
            
            <div class="facility-details">
                <div class="detail-group">
                    <h4><i class="fas fa-info-circle"></i> About This Facility</h4>
                    <p id="facilityDescription">A fully-equipped food processing center with industrial-grade equipment for small to medium-scale food production. Ideal for MSMEs in the food industry looking to scale up their operations.</p>
                    
                    <h4><i class="fas fa-address-card"></i> Contact Information</h4>
                    <p id="facilityContact">
                        <strong><i class="fas fa-phone"></i> Phone:</strong> (02) 1234-5678<br>
                        <strong><i class="fas fa-envelope"></i> Email:</strong> foodcenter@example.com<br>
                        <strong><i class="fas fa-map-marker-alt"></i> Address:</strong> 123 Food St., Quezon City
                    </p>
                </div>
                
                <div class="detail-group">
                    <h4><i class="fas fa-tools"></i> Available Equipment</h4>
                    <ul class="equipment-list" id="facilityEquipment">
                        <li>Industrial oven</li>
                        <li>Vacuum packaging machine</li>
                        <li>Commercial mixer</li>
                        <li>Food dehydrator</li>
                        <li>Meat grinder</li>
                        <li>Blast chiller</li>
                    </ul>
                    
                    <h4><i class="fas fa-concierge-bell"></i> Services Offered</h4>
                    <ul class="service-list" id="facilityServices">
                        <li>Food processing</li>
                        <li>Packaging services</li>
                        <li>Product testing</li>
                        <li>Training sessions</li>
                    </ul>
                </div>
            </div>
            
            <!-- Booking Form -->
            <div class="booking-form" id="bookingForm">
                <h3><i class="fas fa-calendar-plus"></i> Book This Facility</h3>
                <form id="bookingRequestForm">
                    <div class="booking-row">
                        <div class="booking-group">
                            <label for="bookingDate"><i class="fas fa-calendar-day"></i> Requested Date</label>
                            <input type="date" id="bookingDate" name="bookingDate" required>
                        </div>
                        <div class="booking-group">
                            <label for="bookingTime"><i class="fas fa-clock"></i> Time Slot</label>
                            <select id="bookingTime" name="bookingTime" required>
                                <option value="">Select Time</option>
                                <option value="08:00-10:00">8:00 AM - 10:00 AM</option>
                                <option value="10:00-12:00">10:00 AM - 12:00 PM</option>
                                <option value="13:00-15:00">1:00 PM - 3:00 PM</option>
                                <option value="15:00-17:00">3:00 PM - 5:00 PM</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="bookingPurpose"><i class="fas fa-edit"></i> Purpose of Use</label>
                        <textarea id="bookingPurpose" name="purpose" rows="3" required placeholder="Describe what you'll be using the facility for..."></textarea>
                    </div>
                    <div class="form-group">
                        <label for="bookingEquipment"><i class="fas fa-tools"></i> Specific Equipment Needed</label>
                        <input type="text" id="bookingEquipment" name="equipment" placeholder="List any specific equipment you need...">
                    </div>
                    <button type="submit" class="booking-button"><i class="fas fa-paper-plane"></i> Submit Booking Request</button>
                </form>
            </div>
            
            <div class="reviews-section">
                <h3><i class="fas fa-star"></i> Reviews</h3>
                <div class="review-card">
                    <div class="review-header">
                        <span class="review-author">
                            <img src="https://via.placeholder.com/30x30?text=JD" alt="Reviewer" class="review-author-avatar">
                            Juan Dela Cruz
                        </span>
                        <span class="review-date">March 15, 2023</span>
                    </div>
                    <div class="review-rating">⭐⭐⭐⭐⭐</div>
                    <p class="review-text">Excellent facility with modern equipment. The staff was very helpful in teaching us how to use the machines properly.</p>
                </div>
                <div class="review-card">
                    <div class="review-header">
                        <span class="review-author">
                            <img src="https://via.placeholder.com/30x30?text=MS" alt="Reviewer" class="review-author-avatar">
                            Maria Santos
                        </span>
                        <span class="review-date">February 2, 2023</span>
                    </div>
                    <div class="review-rating">⭐⭐⭐⭐</div>
                    <p class="review-text">Great value for money. Helped us scale up our production significantly. Would be perfect with more available time slots.</p>
                </div>
                
                <div class="add-review">
                    <h3><i class="fas fa-star"></i> Add Your Review</h3>
                    <form class="review-form" id="reviewForm">
                        <div class="rating-input">
                            <label>Rating:</label>
                            <label><input type="radio" name="rating" value="5"> ⭐⭐⭐⭐⭐</label>
                            <label><input type="radio" name="rating" value="4"> ⭐⭐⭐⭐</label>
                            <label><input type="radio" name="rating" value="3"> ⭐⭐⭐</label>
                            <label><input type="radio" name="rating" value="2"> ⭐⭐</label>
                            <label><input type="radio" name="rating" value="1"> ⭐</label>
                        </div>
                        <textarea placeholder="Share your experience with this facility..." required></textarea>
                        <button type="submit" class="submit-button"><i class="fas fa-paper-plane"></i> Submit Review</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <footer>
        <div class="container footer-content">
            <div class="logo">
                <img src="https://via.placeholder.com/30x30?text=DTI" alt="DTI Logo">
                <span>DTI SSF Platform</span>
            </div>
            <div class="footer-links">
                <a href="#"><i class="fas fa-info-circle"></i> About Us</a>
                <a href="#"><i class="fas fa-envelope"></i> Contact</a>
                <a href="#"><i class="fas fa-shield-alt"></i> Privacy Policy</a>
                <a href="#"><i class="fas fa-file-contract"></i> Terms of Service</a>
                <a href="#"><i class="fas fa-question-circle"></i> FAQ</a>
            </div>
            <p class="copyright">© 2023 Department of Trade and Industry. All rights reserved.</p>
        </div>
    </footer>

    <script src="msmedashboard.js"></script>
</body>
</html>