document.addEventListener('DOMContentLoaded', function() {
    const signupForm = document.getElementById('signupForm');
    const welcomeMessage = document.getElementById('welcomeMessage');
    const displayName = document.getElementById('displayName');

    // Field level validation
    document.getElementById('username').addEventListener('blur', validateUsername);
    document.getElementById('password').addEventListener('blur', validatePassword);
    document.getElementById('confirmPassword').addEventListener('blur', validateConfirmPassword);

    function validateUsername() {
        const username = document.getElementById('username').value.trim();
        const usernameError = document.getElementById('usernameError');
        
        if (username.length < 4) {
            usernameError.textContent = 'Username must be at least 4 characters';
            return false;
        } else if (!/^[a-zA-Z0-9]+$/.test(username)) {
            usernameError.textContent = 'Username can only contain letters and numbers';
            return false;
        } else {
            usernameError.textContent = '';
            return true;
        }
    }

    function validatePassword() {
        const password = document.getElementById('password').value;
        const passwordError = document.getElementById('passwordError');
        
        if (password.length < 6) {
            passwordError.textContent = 'Password must be at least 6 characters';
            return false;
        } else {
            passwordError.textContent = '';
            return true;
        }
    }

    function validateConfirmPassword() {
        const password = document.getElementById('password').value;
        const confirmPassword = document.getElementById('confirmPassword').value;
        const confirmPasswordError = document.getElementById('confirmPasswordError');
        
        if (password !== confirmPassword) {
            confirmPasswordError.textContent = 'Passwords do not match';
            return false;
        } else {
            confirmPasswordError.textContent = '';
            return true;
        }
    }

    signupForm.addEventListener('submit', function(e) {
        e.preventDefault();
        
        const isUsernameValid = validateUsername();
        const isPasswordValid = validatePassword();
        const isConfirmPasswordValid = validateConfirmPassword();
        
        if (isUsernameValid && isPasswordValid && isConfirmPasswordValid) {
            // Form is valid, show welcome message
            const username = document.getElementById('username').value.trim();
            displayName.textContent = username;
            signupForm.classList.add('hidden');
            welcomeMessage.classList.remove('hidden');
        }
    });
});