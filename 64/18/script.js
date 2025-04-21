const videoURLInput = document.getElementById('videoURL');
const fileInput = document.getElementById('fileInput');
const videoEmbedContainer = document.getElementById('videoEmbedContainer');

let currentVideoType = 'file'; // Tracks whether video is from URL or file upload
let videoElement = null;

// Function to load video from a URL
function loadVideoFromURL() {
  const videoURL = videoURLInput.value.trim();

  if (videoURL) {
    // Check if it's a YouTube URL
    if (videoURL.includes("youtube.com") || videoURL.includes("youtu.be")) {
      const videoID = extractYouTubeID(videoURL);
      // Embed YouTube Video using iframe src
      videoEmbedContainer.innerHTML = `<iframe id="videoPlayer" src="https://www.youtube.com/embed/${videoID}?autoplay=1" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>`;
      videoElement = document.getElementById('videoPlayer');
      currentVideoType = 'url';
    } else {
      alert("Currently, only YouTube URLs are supported.");
    }
  } else {
    alert("Please enter a valid video URL.");
  }
}

// Function to handle file upload
function handleFileUpload() {
  const file = fileInput.files[0];
  if (file) {
    const fileURL = URL.createObjectURL(file);
    // Embed uploaded video using <video> tag
    videoEmbedContainer.innerHTML = `<video id="videoPlayer" controls><source src="${fileURL}" type="${file.type}">Your browser does not support HTML5 video.</video>`;
    videoElement = document.getElementById('videoPlayer');
    currentVideoType = 'file';
  } else {
    alert("Please select a video file.");
  }
}

// Function to extract YouTube video ID from URL
function extractYouTubeID(url) {
  const regex = /(?:youtube\.com\/(?:[^\/\n\s]+\/\S+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([a-zA-Z0-9_-]{11})/;
  const match = url.match(regex);
  return match ? match[1] : null;
}

// Play/Pause toggle
function togglePlay() {
  if (videoElement) {
    // For YouTube iframe, we can't use play/pause directly, so it will require the YouTube API
    if (currentVideoType === 'file' && videoElement.tagName === 'VIDEO') {
      if (videoElement.paused) {
        videoElement.play();
      } else {
        videoElement.pause();
      }
    } else {
      alert('For YouTube videos, use the YouTube player controls.');
    }
  }
}

// Mute/Unmute toggle
function toggleMute() {
  if (videoElement) {
    videoElement.muted = !videoElement.muted;
  }
}

// Increase video volume
function increaseVolume() {
  if (videoElement && videoElement.tagName === 'VIDEO') {
    if (videoElement.volume < 1) videoElement.volume += 0.1;
  }
}

// Decrease video volume
function decreaseVolume() {
  if (videoElement && videoElement.tagName === 'VIDEO') {
    if (videoElement.volume > 0) videoElement.volume -= 0.1;
  }
}
