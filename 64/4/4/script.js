const form = document.getElementById("registrationForm");

form.addEventListener("submit", function (e) {
  e.preventDefault();
  clearErrors();

  const errors = {};

  const firstName = document.getElementById("firstName").value.trim();
  const lastName = document.getElementById("lastName").value.trim();
  const email = document.getElementById("email").value.trim();
  const password = document.getElementById("password").value;
  const confirmPassword = document.getElementById("confirmPassword").value;
  const dob = document.getElementById("dob").value;
  const gender = document.getElementById("gender").value;

  const emailPattern = /^[a-zA-Z0-9._%+-]+@gmail\.com$/;

  if (!firstName) errors.firstName = "• First name is required.";
  if (!lastName) errors.lastName = "• Last name is required.";
  if (!email) errors.email = "• Gmail address is required.";
  else if (!emailPattern.test(email)) errors.email = "• Email must be a valid Gmail address.";
  if (!password) errors.password = "• Password is required.";
  else if (password.length < 6) errors.password = "• Password must be at least 6 characters.";
  if (!confirmPassword) errors.confirmPassword = "• Please confirm your password.";
  else if (password !== confirmPassword) errors.confirmPassword = "• Passwords do not match.";
  if (!dob) errors.dob = "• Date of birth is required.";
  if (!gender) errors.gender = "• Please select a gender.";

  Object.entries(errors).forEach(([field, message]) => {
    document.getElementById(`error-${field}`).textContent = message;
  });

  if (Object.keys(errors).length === 0) {
    const fullName = `${firstName} ${lastName}`;
    localStorage.setItem("userName", fullName);
    window.location.href = "welcome.html";
  }
});

function clearErrors() {
  document.querySelectorAll(".error-message").forEach(el => el.textContent = "");
}

// Password strength
document.getElementById("password").addEventListener("input", function () {
  const val = this.value;
  let strength = 0;

  if (val.length >= 6) strength++;
  if (/[A-Z]/.test(val)) strength++;
  if (/[0-9]/.test(val)) strength++;
  if (/[\W]/.test(val)) strength++;

  const meter = document.getElementById("passwordStrength");
  if (val.length === 0) {
    meter.style.width = "0%";
  } else if (strength <= 1) {
    meter.style.width = "33%";
    meter.style.background = "red";
  } else if (strength === 2 || strength === 3) {
    meter.style.width = "66%";
    meter.style.background = "orange";
  } else {
    meter.style.width = "100%";
    meter.style.background = "green";
  }
});
