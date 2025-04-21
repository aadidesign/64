document.addEventListener("DOMContentLoaded", () => {
    if (Notification.permission !== 'granted') {
      Notification.requestPermission().then(permission => {
        console.log("Notification permission:", permission);
      });
    }
  });
  
  const form = document.getElementById('eventForm');
  const successMessage = document.getElementById('successMessage');
  
  form.addEventListener('submit', function (e) {
    e.preventDefault();
  
    const eventName = document.getElementById('eventName').value.trim();
    const eventDetails = document.getElementById('eventDetails').value.trim();
    const scheduleTime = document.getElementById('scheduleTime').value;
  
    if (!eventName || !eventDetails || !scheduleTime) {
      alert('Please fill in all fields.');
      return;
    }
  
    const eventData = {
      name: eventName,
      details: eventDetails,
      time: scheduleTime
    };
  
    // Save for event-details.html
    localStorage.setItem('eventData', JSON.stringify(eventData));
  
    // ✅ Show browser notification immediately (after permission check)
    if (Notification.permission === 'granted') {
      const notification = new Notification(`📢 ${eventName}`, {
        body: `${eventDetails}\nClick to view details.`,
        icon: 'https://cdn-icons-png.flaticon.com/512/1827/1827392.png'
      });
  
      notification.onclick = () => {
        window.location.href = 'event-details.html';
      };
    } else {
      alert("Please allow notifications from your browser.");
    }
  
    // ✅ Show success message
    successMessage.style.display = 'block';
  
    // Optional: schedule future notification
    scheduleSystemNotification(eventData);
  
    // Reset form
    form.reset();
  });
  
  function scheduleSystemNotification(data) {
    const eventTime = new Date(data.time).getTime();
    const now = new Date().getTime();
    const delay = eventTime - now;
  
    if (delay > 0) {
      setTimeout(() => {
        if (Notification.permission === 'granted') {
          new Notification(`⏰ Reminder: ${data.name}`, {
            body: `${data.details}\nStarts soon.`,
            icon: 'https://cdn-icons-png.flaticon.com/512/1827/1827392.png'
          });
        }
      }, delay);
    }
  }
  