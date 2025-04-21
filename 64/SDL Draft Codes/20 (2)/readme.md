🔹 HTML Part:
html
Copy
Edit
<!DOCTYPE html>
Declares the document type as HTML5.

html
Copy
Edit
<html lang="en">
Starts the HTML document and sets the language to English.

html
Copy
Edit
<head>
  <meta charset="UTF-8">
  <title>Cookie Example</title>
</head>
<head> contains meta info.

<meta charset="UTF-8"> defines the character encoding.

<title> sets the title that appears in the browser tab.

html
Copy
Edit
<body>
Begins the visible content of the page.

html
Copy
Edit
  <h2>Enter Your Name</h2>
Displays a heading prompting the user to enter their name.

html
Copy
Edit
  <input type="text" id="username" placeholder="Enter name">
Creates a text input field with:

id="username" so JavaScript can access it.

placeholder="Enter name" to show hint text inside the box.

html
Copy
Edit
  <button onclick="setCookie()">Save Name</button>
A button that, when clicked, calls the setCookie() function defined in the script below.

html
Copy
Edit
  <h3 id="greeting"></h3>
An empty <h3> element to display a greeting later using JavaScript.

🔹 JavaScript Part:
html
Copy
Edit
<script>
Starts the JavaScript block.

javascript
Copy
Edit
function setCookie() {
Declares a function setCookie to save the cookie.

javascript
Copy
Edit
  const name = document.getElementById("username").value;
Gets the value entered by the user in the text input box and stores it in the variable name.

javascript
Copy
Edit
  if (name) {
Checks if the user has actually entered something (not blank).

javascript
Copy
Edit
    const d = new Date();
Creates a new Date object representing the current date/time.

javascript
Copy
Edit
    d.setTime(d.getTime() + (7 * 24 * 60 * 60 * 1000));
Sets the time to 7 days in the future (cookie expiration time).

javascript
Copy
Edit
    const expires = "expires=" + d.toUTCString();
Converts the date to a UTC string format that cookies require.

javascript
Copy
Edit
    document.cookie = "username=" + name + ";" + expires + ";path=/";
Creates a cookie:

Name = username

Value = the user's input

Expiration = 7 days

Path = / (whole website)

javascript
Copy
Edit
    alert("Cookie stored successfully!");
Shows a success message to the user.

javascript
Copy
Edit
    showGreeting();
Calls the showGreeting() function to immediately update the greeting on the page.

javascript
Copy
Edit
  } else {
    alert("Please enter a name.");
  }
}
If the input is empty, alert the user to enter a name.

Function to Get Cookie
javascript
Copy
Edit
function getCookie(cname) {
Declares a function to get a cookie by name.

javascript
Copy
Edit
  const name = cname + "=";
Prepares the search string for the cookie name (e.g. "username=").

javascript
Copy
Edit
  const decodedCookie = decodeURIComponent(document.cookie);
Decodes the cookie string (in case it has special characters).

javascript
Copy
Edit
  const ca = decodedCookie.split(';');
Splits all cookies into an array by ; (cookies are stored as key=value; key=value;).

javascript
Copy
Edit
  for (let i = 0; i < ca.length; i++) {
    let c = ca[i].trim();
    if (c.indexOf(name) === 0) {
      return c.substring(name.length, c.length);
    }
  }
Loops through all cookies and finds the one with the matching name.

If found, returns its value.

javascript
Copy
Edit
  return "";
}
If not found, return an empty string.

Function to Show Greeting
javascript
Copy
Edit
function showGreeting() {
  const user = getCookie("username");
  if (user !== "") {
    document.getElementById("greeting").innerText = "Welcome back, " + user + "!";
  }
}
Gets the stored cookie value.

If it's not empty, displays a personalized greeting in the <h3> tag.

Show Greeting on Page Load
javascript
Copy
Edit
window.onload = showGreeting;
When the page loads, it automatically checks for the cookie and shows the greeting.

html
Copy
Edit
</script>
</body>
</html>
Closes the script, body, and HTML document.

