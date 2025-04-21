function validateSignup() {
    const username = document.getElementById("signup-username").value;
    const password = document.getElementById("signup-password").value;
    if (password.length < 6) {
      alert("Password must be at least 6 characters.");
      return false;
    }
    return true;
  }
  
  function validateLogin() {
    const username = document.getElementById("login-username").value;
    const password = document.getElementById("login-password").value;
    if (!username || !password) {
      alert("All fields are required.");
      return false;
    }
    return true;
  }
  