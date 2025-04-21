// Function to set a cookie with the username
function setCookie() {
    const nameInput = document.getElementById("username");
    const name = nameInput.value.trim();
    const greetingElement = document.getElementById("greeting");
    const cookieValueElement = document.getElementById("cookie-value");
    
    if (name) {
        // Set cookie to expire in 7 days
        const expirationDate = new Date();
        expirationDate.setTime(expirationDate.getTime() + (7 * 24 * 60 * 60 * 1000));
        const expires = "expires=" + expirationDate.toUTCString();
        
        // Set cookie with SameSite attribute for security
        document.cookie = `username=${encodeURIComponent(name)}; ${expires}; path=/; SameSite=Lax`;
        
        // Show success feedback
        nameInput.value = "";
        updateCookieDisplay();
        
        greetingElement.textContent = `Hello, ${name}! Your name has been saved.`;
        greetingElement.classList.add("success");
        
        // Reset after 2 seconds
        setTimeout(() => {
            greetingElement.classList.remove("success");
            showGreeting();
        }, 2000);
    } else {
        alert("Please enter a valid name.");
        nameInput.focus();
    }
}

// Function to get a cookie value by name
function getCookie(cookieName) {
    const name = cookieName + "=";
    const decodedCookie = decodeURIComponent(document.cookie);
    const cookieArray = decodedCookie.split(';');
    
    for (let i = 0; i < cookieArray.length; i++) {
        let cookie = cookieArray[i].trim();
        if (cookie.indexOf(name) === 0) {
            return cookie.substring(name.length, cookie.length);
        }
    }
    return "";
}

// Update the cookie status display
function updateCookieDisplay() {
    const username = getCookie("username");
    const cookieValueElement = document.getElementById("cookie-value");
    
    if (username) {
        cookieValueElement.textContent = `Set (${username})`;
        cookieValueElement.className = "success";
    } else {
        cookieValueElement.textContent = "Not set";
        cookieValueElement.className = "";
    }
}

// Show greeting using the cookie if it exists
function showGreeting() {
    const username = getCookie("username");
    const greetingElement = document.getElementById("greeting");
    
    if (username) {
        greetingElement.textContent = `Welcome back, ${username}!`;
    } else {
        greetingElement.textContent = "";
    }
}

// Initialize on page load
window.onload = function() {
    updateCookieDisplay();
    showGreeting();
    
    // Focus on input field if no cookie exists
    if (!getCookie("username")) {
        document.getElementById("username").focus();
    }
};

// Add event listener for Enter key
document.getElementById("username").addEventListener("keypress", function(event) {
    if (event.key === "Enter") {
        setCookie();
    }
});