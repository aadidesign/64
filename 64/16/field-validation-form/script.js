// Function to validate first and last names (letters only)
function validateName(name) {
    const namePattern = /^[A-Za-z]+$/;
    return namePattern.test(name);
  }
  
  // Function to validate organization name (letters, spaces, and basic symbols)
  function validateOrganization(organization) {
    const orgPattern = /^[A-Za-z0-9\s&.,'-]+$/;
    return orgPattern.test(organization);
  }
  
  // Function to validate hobbies (not empty)
  function validateHobbies(hobbies) {
    return hobbies.trim().length > 0;
  }
  
  // Field-Level Validation for First Name
  document.getElementById('firstname').addEventListener('blur', function() {
    const firstname = this.value.trim();
    const errorElement = document.getElementById('firstnameError');
  
    if (!firstname) {
      errorElement.textContent = 'First name is required.';
      this.style.borderColor = '#e63946';
    } else if (!validateName(firstname)) {
      errorElement.textContent = 'First name must contain only letters.';
      this.style.borderColor = '#e63946';
    } else {
      errorElement.textContent = '';
      this.style.borderColor = '#ccc';
    }
  });
  
  // Field-Level Validation for Last Name
  document.getElementById('lastname').addEventListener('blur', function() {
    const lastname = this.value.trim();
    const errorElement = document.getElementById('lastnameError');
  
    if (!lastname) {
      errorElement.textContent = 'Last name is required.';
      this.style.borderColor = '#e63946';
    } else if (!validateName(lastname)) {
      errorElement.textContent = 'Last name must contain only letters.';
      this.style.borderColor = '#e63946';
    } else {
      errorElement.textContent = '';
      this.style.borderColor = '#ccc';
    }
  });
  
  // Field-Level Validation for Organization
  document.getElementById('organization').addEventListener('blur', function() {
    const organization = this.value.trim();
    const errorElement = document.getElementById('organizationError');
  
    if (!organization) {
      errorElement.textContent = 'Organization is required.';
      this.style.borderColor = '#e63946';
    } else if (!validateOrganization(organization)) {
      errorElement.textContent = 'Organization name contains invalid characters.';
      this.style.borderColor = '#e63946';
    } else {
      errorElement.textContent = '';
      this.style.borderColor = '#ccc';
    }
  });
  
  // Field-Level Validation for Hobbies
  document.getElementById('hobbies').addEventListener('blur', function() {
    const hobbies = this.value.trim();
    const errorElement = document.getElementById('hobbiesError');
  
    if (!hobbies) {
      errorElement.textContent = 'Hobbies cannot be empty.';
      this.style.borderColor = '#e63946';
    } else {
      errorElement.textContent = '';
      this.style.borderColor = '#ccc';
    }
  });
  
  // Submit the form and show results after validation
  document.getElementById('regForm').addEventListener('submit', function(e) {
    e.preventDefault(); // Prevent form submission to display errors
  
    const firstname = document.getElementById('firstname').value.trim();
    const lastname = document.getElementById('lastname').value.trim();
    const organization = document.getElementById('organization').value.trim();
    const hobbies = document.getElementById('hobbies').value.trim();
  
    let isValid = true;
  
    // Validate First Name
    if (!firstname) {
      document.getElementById('firstnameError').textContent = 'First name is required.';
      isValid = false;
    } else if (!validateName(firstname)) {
      document.getElementById('firstnameError').textContent = 'First name must contain only letters.';
      isValid = false;
    }
  
    // Validate Last Name
    if (!lastname) {
      document.getElementById('lastnameError').textContent = 'Last name is required.';
      isValid = false;
    } else if (!validateName(lastname)) {
      document.getElementById('lastnameError').textContent = 'Last name must contain only letters.';
      isValid = false;
    }
  
    // Validate Organization
    if (!organization) {
      document.getElementById('organizationError').textContent = 'Organization is required.';
      isValid = false;
    } else if (!validateOrganization(organization)) {
      document.getElementById('organizationError').textContent = 'Organization name contains invalid characters.';
      isValid = false;
    }
  
    // Validate Hobbies
    if (!hobbies) {
      document.getElementById('hobbiesError').textContent = 'Hobbies cannot be empty.';
      isValid = false;
    }
  
    // Show the results if the form is valid
    if (isValid) {
      document.getElementById('output').innerHTML = `
        <h3>Submitted Details:</h3>
        <p><strong>First Name:</strong> ${firstname}</p>
        <p><strong>Last Name:</strong> ${lastname}</p>
        <p><strong>Organization:</strong> ${organization}</p>
        <p><strong>Hobbies:</strong> ${hobbies}</p>
      `;
    }
  });
  