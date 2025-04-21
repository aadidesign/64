HTML File (index.html)
html
Copy
Edit
<!DOCTYPE html>
<html lang="en">
This line declares the document type (<!DOCTYPE html>) to indicate the HTML version being used (HTML5 here). It also opens the <html> tag and sets the language to English using lang="en".

html
Copy
Edit
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Life Expectancy & Time of Day</title>
  <script src="script.js" defer></script>
</head>
The <head> section contains meta-information about the HTML document.

<meta charset="UTF-8">: Specifies the character encoding for the document as UTF-8, allowing special characters to be displayed correctly.

<meta name="viewport" content="width=device-width, initial-scale=1.0">: This makes the page mobile-friendly by controlling the viewport's width and scale.

<title>Life Expectancy & Time of Day</title>: Sets the title of the page, which is displayed in the browser tab.

<script src="script.js" defer></script>: Links to the external JavaScript file script.js. The defer attribute ensures the script is executed after the HTML document is fully parsed.

html
Copy
Edit
<body>
  <h1>Human Lifetime and Time of Day Program</h1>
  <p id="average-lifetime">Loading...</p>
  <p id="time-of-day">Loading...</p>
The <body> section contains the content of the webpage that is visible to users.

<h1>: This is a header element displaying the title "Human Lifetime and Time of Day Program".

<p id="average-lifetime">Loading...</p>: A paragraph element with an ID of "average-lifetime" that will later display the calculated number of weeks in the average human lifetime.

<p id="time-of-day">Loading...</p>: Another paragraph element with an ID of "time-of-day" that will display a message about the time of day (morning, afternoon, or night).

html
Copy
Edit
  <button onclick="showAlert()">Click Me for an Alert</button>
</body>
</html>
<button onclick="showAlert()">Click Me for an Alert</button>: This is a button that, when clicked, triggers the showAlert() function in the JavaScript file to show an alert.

JavaScript File (script.js)
javascript
Copy
Edit
function showAlert() {
  alert("Hello! Welcome to the Human Lifetime and Time of Day Program.");
}
function showAlert() {...}: This defines a function called showAlert that, when invoked, shows a browser alert with the message "Hello! Welcome to the Human Lifetime and Time of Day Program."

javascript
Copy
Edit
function calculateAverageLifetime() {
  const averageLifeExpectancy = 72; // Average life expectancy in years
  const weeksInYear = 52; // Number of weeks in a year
  const averageWeeks = averageLifeExpectancy * weeksInYear; // Total weeks in average human lifetime
  return averageWeeks;
}
function calculateAverageLifetime() {...}: This defines a function calculateAverageLifetime to compute the total number of weeks in the average human lifetime.

const averageLifeExpectancy = 72;: A variable to store the average life expectancy (72 years).

const weeksInYear = 52;: A variable to store the number of weeks in a year (52 weeks).

const averageWeeks = averageLifeExpectancy * weeksInYear;: The total number of weeks is calculated by multiplying the life expectancy by the number of weeks in a year.

return averageWeeks;: The calculated number of weeks is returned by the function.

javascript
Copy
Edit
function getTimeOfDay() {
  const hours = new Date().getHours(); // Get current hour

  if (hours >= 6 && hours < 12) {
    return "Good Morning!";
  } else if (hours >= 12 && hours < 18) {
    return "Good Afternoon!";
  } else {
    return "Good Night!";
  }
}
function getTimeOfDay() {...}: This defines a function getTimeOfDay that determines the time of day based on the current hour.

const hours = new Date().getHours();: This creates a Date object and gets the current hour (from 0 to 23).

The if condition checks the time range:

If the current hour is between 6 and 12 (inclusive), it returns "Good Morning!".

If the current hour is between 12 and 18 (inclusive), it returns "Good Afternoon!".

Otherwise, it returns "Good Night!" for hours between 18 and 6.

javascript
Copy
Edit
const greeting = "Welcome to the Human Lifetime and Time of Day Program!";
This creates a variable greeting and assigns it a string message. This string will be logged to the console later.

javascript
Copy
Edit
window.onload = function() {
  const lifetimeInWeeks = calculateAverageLifetime();
  document.getElementById('average-lifetime').textContent = `The average human lifetime in weeks is: ${lifetimeInWeeks} weeks.`;

  const timeMessage = getTimeOfDay();
  document.getElementById('time-of-day').textContent = timeMessage;

  console.log(greeting);
}
window.onload = function() {...}: This is an event handler that runs the code inside it when the webpage has finished loading.

const lifetimeInWeeks = calculateAverageLifetime();: Calls the calculateAverageLifetime() function to calculate the average number of weeks in a human lifetime and stores the result in lifetimeInWeeks.

document.getElementById('average-lifetime').textContent = ...;: Updates the content of the <p> element with the ID "average-lifetime" to display the calculated number of weeks in a human lifetime.

const timeMessage = getTimeOfDay();: Calls the getTimeOfDay() function to get the appropriate message based on the current time.

document.getElementById('time-of-day').textContent = timeMessage;: Updates the content of the <p> element with the ID "time-of-day" to display the time-of-day message.

console.log(greeting);: Logs the greeting string to the browser's console for debugging purposes.

Summary:
HTML: Sets up the structure of the page, linking to an external JavaScript file.

JavaScript:

Defines functions to show an alert, calculate the number of weeks in an average human lifetime, determine the time of day, and update the page content dynamically.

Displays the calculated data on the page once it has finished loading.

Uses window.onload to trigger functions once the page is ready.