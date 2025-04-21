// Display an alert when the button is clicked
function showAlert() {
    alert("Hello! Welcome to the Human Lifetime and Time of Day Program.");
  }
  
  // Calculate average number of weeks in human lifetime
  function calculateAverageLifetime() {
    const averageLifeExpectancy = 72; // Average life expectancy in years
    const weeksInYear = 52; // Number of weeks in a year
    const averageWeeks = averageLifeExpectancy * weeksInYear; // Total weeks in average human lifetime
    return averageWeeks;
  }
  
  // Get the current time of the day (morning, afternoon, night)
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
  
  // Store a string in a variable
  const greeting = "Welcome to the Human Lifetime and Time of Day Program!";
  
  // Update the page with the calculated data
  window.onload = function() {
    // Calculate and display the average weeks in a human lifetime
    const lifetimeInWeeks = calculateAverageLifetime();
    document.getElementById('average-lifetime').textContent = `The average human lifetime in weeks is: ${lifetimeInWeeks} weeks.`;
  
    // Display the time of day message
    const timeMessage = getTimeOfDay();
    document.getElementById('time-of-day').textContent = timeMessage;
  
    // Log the greeting string to the console
    console.log(greeting);
  }
  