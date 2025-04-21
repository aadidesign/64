document.getElementById('regForm').addEventListener('submit', function (e) {
    e.preventDefault();
  
    // Clear previous errors
    document.querySelectorAll('.error').forEach(span => span.textContent = '');
  
    const firstName = document.getElementById('firstName').value.trim();
    const lastName = document.getElementById('lastName').value.trim();
    const organization = document.getElementById('organization').value.trim();
    const hobbies = document.getElementById('hobbies').value.trim();
  
    let isValid = true;
  
    if (!firstName) {
      document.getElementById('firstNameError').textContent = 'First name is required.';
      isValid = false;
    }
  
    if (!lastName) {
      document.getElementById('lastNameError').textContent = 'Last name is required.';
      isValid = false;
    }
  
    if (!organization) {
      document.getElementById('organizationError').textContent = 'Organization is required.';
      isValid = false;
    }
  
    if (!hobbies) {
      document.getElementById('hobbiesError').textContent = 'Hobbies are required.';
      isValid = false;
    }
  
    if (!isValid) return;
  
    // Output data
    document.getElementById('output').innerHTML = `
      <h3>Submitted Details:</h3>
      <p><strong>First Name:</strong> ${firstName}</p>
      <p><strong>Last Name:</strong> ${lastName}</p>
      <p><strong>Organization:</strong> ${organization}</p>
      <p><strong>Hobbies:</strong> ${hobbies}</p>
    `;
  
    this.reset();
  });
  