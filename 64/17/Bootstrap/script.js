const imageInput = document.getElementById('imageUpload');
const gallery = document.getElementById('gallery');
const modalImage = document.getElementById('modalImage');
let images = [];

imageInput.addEventListener('change', (e) => {
  const files = Array.from(e.target.files);

  files.forEach(file => {
    const reader = new FileReader();
    reader.onload = (event) => {
      images.push({
        src: event.target.result,
        name: file.name,
        size: (file.size / 1024).toFixed(1) + ' KB'
      });
      renderGallery();
    };
    reader.readAsDataURL(file);
  });

  e.target.value = ''; // Reset file input
});

function renderGallery() {
  gallery.innerHTML = '';

  images.forEach((img, index) => {
    const col = document.createElement('div');
    col.className = 'col-sm-6 col-md-4 col-lg-3';

    col.innerHTML = `
      <div class="card h-100 shadow-sm">
        <img src="${img.src}" class="card-img-top img-thumbnail" alt="${img.name}" onclick="showPreview('${img.src}')">
        <div class="card-body p-2">
          <h6 class="card-title text-truncate mb-1">${img.name}</h6>
          <p class="card-text text-muted small mb-2">${img.size}</p>
        </div>
        <div class="card-footer">
          <button class="btn btn-sm btn-outline-secondary" onclick="editImageName(${index})">Edit</button>
          <button class="btn btn-sm btn-outline-danger" onclick="deleteImage(${index})">Delete</button>
        </div>
      </div>
    `;

    gallery.appendChild(col);
  });
}

function showPreview(src) {
  modalImage.src = src;
  const modal = new bootstrap.Modal(document.getElementById('previewModal'));
  modal.show();
}

function deleteImage(index) {
  images.splice(index, 1);
  renderGallery();
}

function editImageName(index) {
  const newName = prompt('Enter new name for the image:', images[index].name);
  if (newName) {
    images[index].name = newName;
    renderGallery();
  }
}
