// Alert demonstration
alert("Welcome to our JavaScript exercises page!");

// Calculate average number of weeks in human lifetime
function calculateLifetimeWeeks() {
    const averageLifespanYears = 73; // Global average lifespan
    const weeksPerYear = 52;
    const lifetimeWeeks = averageLifespanYears * weeksPerYear;
    
    console.log(`Average weeks in human lifetime: ${lifetimeWeeks}`);
    document.getElementById('lifetimeStats').innerHTML = 
        `<p>The average human lives about ${lifetimeWeeks} weeks (${averageLifespanYears} years).</p>`;
    
    return lifetimeWeeks;
}

// Variables storing strings
const greeting = "Hello, JavaScript learner!";
const courseName = "Web Development Fundamentals";
const instructor = "Your Instructor";

console.log(greeting);
console.log(`You're studying ${courseName} with ${instructor}.`);

// Program that tells time of the day
function getTimeOfDay() {
    const now = new Date();
    const currentHour = now.getHours();
    let timeOfDay;
    
    if (currentHour < 12) {
        timeOfDay = "morning";
    } else if (currentHour < 18) {
        timeOfDay = "afternoon";
    } else {
        timeOfDay = "evening";
    }
    
    console.log(`Current time of day: ${timeOfDay}`);
    document.getElementById('timeGreeting').innerHTML = 
        `<p>Good ${timeOfDay}! It's currently ${now.toLocaleTimeString()}.</p>`;
    
    return timeOfDay;
}

// Call the functions when the script loads
calculateLifetimeWeeks();
getTimeOfDay();

// Additional demonstration
const fruits = ["apple", "banana", "cherry"];
console.log("Some fruits:", fruits);