document.addEventListener('DOMContentLoaded', function() {
    const signupForm = document.getElementById('signupForm');
    const welcomeMessage = document.getElementById('welcomeMessage');
    const displayName = document.getElementById('displayName');
    const formErrors = document.getElementById('formErrors');

    signupForm.addEventListener('submit', function(e) {
        e.preventDefault();
        formErrors.style.display = 'none';
        formErrors.innerHTML = '';
        
        const username = document.getElementById('username').value.trim();
        const password = document.getElementById('password').value;
        const confirmPassword = document.getElementById('confirmPassword').value;
        
        let errors = [];
        
        // Validate username
        if (username.length < 4) {
            errors.push('Username must be at least 4 characters');
        }
        if (!/^[a-zA-Z0-9]+$/.test(username)) {
            errors.push('Username can only contain letters and numbers');
        }
        
        // Validate password
        if (password.length < 6) {
            errors.push('Password must be at least 6 characters');
        }
        
        // Validate confirm password
        if (password !== confirmPassword) {
            errors.push('Passwords do not match');
        }
        
        if (errors.length > 0) {
            formErrors.style.display = 'block';
            errors.forEach(error => {
                const errorItem = document.createElement('p');
                errorItem.textContent = error;
                formErrors.appendChild(errorItem);
            });
        } else {
            // Form is valid, show welcome message
            displayName.textContent = username;
            signupForm.classList.add('hidden');
            welcomeMessage.classList.remove('hidden');
        }
    });
});