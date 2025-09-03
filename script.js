// Role selection
const roleButtons = document.querySelectorAll('.role-btn');
let selectedRole = 'msme';

function handleRoleSelection() {
  roleButtons.forEach(btn => btn.classList.remove('active'));
  this.classList.add('active');
  selectedRole = this.getAttribute('data-role');

  document.getElementById('loginRoleInput').value = selectedRole;
  document.getElementById('signupRoleInput').value = selectedRole;

  document.querySelector('.msme-fields').style.display = selectedRole === 'msme' ? 'block' : 'none';
  document.querySelector('.ssf-fields').style.display = selectedRole === 'ssf' ? 'block' : 'none';
}

roleButtons.forEach(button => button.addEventListener('click', handleRoleSelection));

// Switch forms
document.getElementById('switchToSignup').addEventListener('click', e => {
  e.preventDefault();
  document.getElementById('loginForm').classList.remove('active');
  document.getElementById('signupForm').classList.add('active');
  hideAlert();
});

document.getElementById('switchToLogin').addEventListener('click', e => {
  e.preventDefault();
  document.getElementById('signupForm').classList.remove('active');
  document.getElementById('loginForm').classList.add('active');
  hideAlert();
});

// Password visibility toggle
function setupPasswordToggle(passwordFieldId, toggleButtonId) {
  const passwordField = document.getElementById(passwordFieldId);
  const toggleButton = document.getElementById(toggleButtonId);
  
  toggleButton.addEventListener('click', function() {
    if (passwordField.type === 'password') {
      passwordField.type = 'text';
      this.innerHTML = '<i class="fas fa-eye-slash"></i>';
    } else {
      passwordField.type = 'password';
      this.innerHTML = '<i class="fas fa-eye"></i>';
    }
  });
}

setupPasswordToggle('loginPassword', 'loginPasswordToggle');
setupPasswordToggle('signupPassword', 'signupPasswordToggle');
setupPasswordToggle('confirmPassword', 'confirmPasswordToggle');

// Alert functions
function showAlert(message, type) {
  const alert = document.getElementById('authAlert');
  alert.textContent = message;
  alert.className = `alert alert-${type}`;
  alert.style.display = 'block';
  
  // Auto hide after 5 seconds
  setTimeout(hideAlert, 5000);
}

function hideAlert() {
  const alert = document.getElementById('authAlert');
  alert.style.display = 'none';
}

// Form validation - FIXED to allow form submission
document.getElementById('signupEmailForm').addEventListener('submit', function(e) {
  const password = document.getElementById('signupPassword').value;
  const confirmPassword = document.getElementById('confirmPassword').value;
  
  // Validate password strength
  if (!validatePassword(password)) {
    e.preventDefault();
    showAlert('Password must be at least 8 characters with uppercase, lowercase, number, and special character', 'danger');
    return false;
  }
  
  // Check if passwords match
  if (password !== confirmPassword) {
    e.preventDefault();
    showAlert('Passwords do not match', 'danger');
    return false;
  }
  
  // If validation passes, allow form submission
  return true;
});

function validatePassword(password) {
  // Minimum 8 characters, at least one uppercase, one lowercase, one number and one special character
  const regex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;
  return regex.test(password);
}

// Ensure form can submit even if JavaScript validation fails
document.getElementById('signupEmailForm').addEventListener('submit', function(e) {
  // Let the form submit normally, server will do validation too
  return true;
});