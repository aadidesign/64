HTML Structure:
html
Copy
Edit
<!DOCTYPE html>
<html lang="en">
<!DOCTYPE html>: Declares that this is an HTML5 document.

<html lang="en">: Begins the HTML document with the language set to English.

html
Copy
Edit
<head>
  <meta charset="UTF-8">
  <title>Restaurant Data Entry</title>
  <style>
<head>: The head section of the document.

<meta charset="UTF-8">: Defines the character encoding for the document as UTF-8 (standard for international text).

<title>Restaurant Data Entry</title>: Sets the title of the page that appears in the browser's title bar.

<style>: CSS block for styling the page.

html
Copy
Edit
    table {
      border-collapse: collapse;
      width: 60%;
      margin: 20px auto;
    }

    th, td {
      padding: 12px;
      border: 1px solid #ccc;
    }

    input, select, textarea {
      width: 100%;
      padding: 6px;
      font-size: 14px;
    }

    #activity-log {
      width: 60%;
      margin: 20px auto;
      border: 1px solid #888;
      padding: 10px;
      background-color: #f9f9f9;
    }

    h2 {
      text-align: center;
    }

    .btn-submit {
      display: block;
      margin: 20px auto;
      padding: 10px 25px;
      font-size: 16px;
    }
  </style>
table {...}: Defines the style for the table.

border-collapse: collapse;: Collapses table borders into a single border.

width: 60%; margin: 20px auto;: Sets the table width to 60% of the page and centers it horizontally with a margin.

th, td {...}: Defines the style for table cells (<th> for header, <td> for data cells).

padding: 12px; border: 1px solid #ccc;: Adds padding inside cells and a light gray border.

input, select, textarea {...}: Applies styles to form input fields.

width: 100%; padding: 6px; font-size: 14px;: Makes inputs fill the container width, adds padding, and sets the font size.

#activity-log {...}: Styles the activity log container.

width: 60%; margin: 20px auto;: Centers the log container with 60% width and 20px top/bottom margin.

border: 1px solid #888; padding: 10px; background-color: #f9f9f9;: Adds a border and light gray background.

h2 {...}: Centers the heading text.

.btn-submit {...}: Styles the submit button.

display: block; margin: 20px auto; padding: 10px 25px; font-size: 16px;: Centers the button and adds padding and font size.

html
Copy
Edit
</head>
<body>
<body>: Begins the body section of the HTML document.

html
Copy
Edit
<h2>Restaurant Data Entry Form</h2>
<h2>: Displays a level-2 heading for the form title.

html
Copy
Edit
<form id="restaurantForm" onsubmit="submitForm(event)">
<form>: Defines a form element with an id of restaurantForm.

onsubmit="submitForm(event)": Calls the submitForm() JavaScript function when the form is submitted.

html
Copy
Edit
    <table>
      <tr>
        <td>Restaurant Name:</td>
        <td><input type="text" id="name" onchange="logActivity('Name field updated')"></td>
      </tr>
      <tr>
        <td>Location:</td>
        <td><input type="text" id="location" onchange="logActivity('Location field updated')"></td>
      </tr>
      <tr>
        <td>Type:</td>
        <td>
          <select id="type" onchange="logActivity('Restaurant type selected')">
            <option value="">-- Select Type --</option>
            <option value="Veg">Veg</option>
            <option value="Non-Veg">Non-Veg</option>
            <option value="Both">Both</option>
          </select>
        </td>
      </tr>
      <tr>
        <td>Seating Capacity:</td>
        <td><input type="number" id="capacity" onchange="logActivity('Seating capacity updated')"></td>
      </tr>
      <tr>
        <td>Description:</td>
        <td><textarea id="desc" onchange="logActivity('Description updated')"></textarea></td>
      </tr>
    </table>
<table>: Contains the form input elements structured in rows (<tr>).

<tr>: Each row represents one field of the form (e.g., Restaurant Name, Location).

<td>: Table data cell, holds labels and input fields.

<input type="text">: Text input fields for name, location, and seating capacity.

<select>: Dropdown for selecting restaurant type with three options (Veg, Non-Veg, Both).

<textarea>: Multi-line input for the description.

Each input has an onchange attribute to trigger the logActivity() function when the field value is updated.

html
Copy
Edit
    <button class="btn-submit" type="submit">Submit</button>
<button>: A submit button to send the form data. It triggers the submitForm() function when clicked.

html
Copy
Edit
  </form>
</form>: Closes the form element.

html
Copy
Edit
  <div id="activity-log">
    <strong>Activity Log:</strong>
    <ul id="log-list"></ul>
  </div>
<div id="activity-log">: Creates a container to display the activity log.

<strong>: Makes the "Activity Log" text bold.

<ul id="log-list">: An unordered list to display the log messages.

html
Copy
Edit
  <script>
    function logActivity(message) {
      const logList = document.getElementById("log-list");
      const li = document.createElement("li");
      li.textContent = message + " at " + new Date().toLocaleTimeString();
      logList.appendChild(li);
    }
<script>: Defines the JavaScript code that handles activity logging and form submission.

logActivity(message): This function accepts a message, creates a new list item (<li>), and appends it to the log list (<ul id="log-list">).

new Date().toLocaleTimeString(): Fetches the current time in a human-readable format.

logList.appendChild(li): Adds the new list item to the activity log.

html
Copy
Edit
    function submitForm(event) {
      event.preventDefault(); // Prevent form from submitting to server
      logActivity("Form submitted");
      alert("Restaurant data submitted successfully!");
    }
  </script>
submitForm(event): This function is triggered when the form is submitted.

event.preventDefault(): Prevents the default form submission behavior (which would reload the page).

logActivity("Form submitted"): Logs the form submission event.

alert("Restaurant data submitted successfully!"): Displays an alert to the user confirming successful submission.

html
Copy
Edit
</body>
</html>
</body>: Closes the body of the document.

</html>: Closes the HTML document.

Summary:
The form collects restaurant data (name, location, type, seating capacity, and description).

As the user interacts with the form, changes trigger the logActivity() function, which logs the activity with a timestamp.

When the form is submitted, the submitForm() function logs the submission and shows a confirmation alert.

