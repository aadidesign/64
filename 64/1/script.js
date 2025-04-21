// Highlight current day
const days = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
const today = new Date().getDay();
document.querySelectorAll('#timetable tbody tr').forEach((row) => {
  if (row.children[0].innerText === days[today]) {
    row.classList.add('highlight-today');
  }
});
