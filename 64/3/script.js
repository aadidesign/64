function validateForm() {
    let valid = true;
  
    document.querySelectorAll(".error").forEach(e => e.textContent = "");
  
    const firstName = document.getElementById("firstName").value.trim();
    const lastName = document.getElementById("lastName").value.trim();
    const email = document.getElementById("email").value.trim();
    const password = document.getElementById("password").value.trim();
    const dob = document.getElementById("dob").value;
    const genderRadios = document.getElementsByName("gender");
    const customGenderInput = document.getElementById("customGender");
  
    const namePattern = /^[A-Za-z]+$/;
    const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    const passwordPattern = /^.{6,}$/;
  
    if (!namePattern.test(firstName)) {
      document.getElementById("firstNameError").textContent = "Enter a valid first name.";
      valid = false;
    }
  
    if (!namePattern.test(lastName)) {
      document.getElementById("lastNameError").textContent = "Enter a valid surname.";
      valid = false;
    }
  
    if (!emailPattern.test(email)) {
      document.getElementById("emailError").textContent = "Enter a valid email or mobile.";
      valid = false;
    }
  
    if (!passwordPattern.test(password)) {
      document.getElementById("passwordError").textContent = "Password must be at least 6 characters.";
      valid = false;
    }
  
    if (!dob) {
      document.getElementById("dobError").textContent = "Please select date of birth.";
      valid = false;
    }
  
    let genderSelected = false;
    let genderValue = "";
  
    for (let radio of genderRadios) {
      if (radio.checked) {
        genderSelected = true;
        genderValue = radio.value;
        break;
      }
    }
  
    if (!genderSelected) {
      document.getElementById("genderError").textContent = "Please select your gender.";
      valid = false;
    }
  
    if (genderValue === "Custom" && customGenderInput.value.trim() === "") {
      document.getElementById("genderError").textContent = "Please enter your gender.";
      valid = false;
    }
  
    if (valid) {
      localStorage.setItem("firstName", firstName);
      window.location.href = "success.html";
    }
  
    return false;
  }
  
  document.querySelectorAll('input[name="gender"]').forEach(radio => {
    radio.addEventListener("change", function () {
      document.getElementById("customGenderDiv").style.display =
        this.value === "Custom" ? "block" : "none";
    });
  });
  