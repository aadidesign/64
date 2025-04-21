const uploadInput = document.getElementById('imageUpload');
const gallery = document.getElementById('gallery');
const previewModal = document.getElementById('previewModal');
const modalImage = document.getElementById('modalImage');
const modalClose = document.getElementById('modalClose');

let images = [];

uploadInput.addEventListener('change', (e) => {
  const files = Array.from(e.target.files);

  files.forEach(file => {
    const reader = new FileReader();
    reader.onload = function (event) {
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
    const item = document.createElement('div');
    item.className = 'gallery-item';

    const image = document.createElement('img');
    image.src = img.src;
    image.alt = img.name;
    image.addEventListener('click', () => showPreview(img.src));

    const info = document.createElement('div');
    info.className = 'gallery-info';
    info.innerText = `${img.name} (${img.size})`;

    const actions = document.createElement('div');
    actions.className = 'gallery-actions';

    const editBtn = document.createElement('button');
    editBtn.innerText = 'Edit';
    editBtn.onclick = () => editImageName(index);

    const deleteBtn = document.createElement('button');
    deleteBtn.innerText = 'Delete';
    deleteBtn.onclick = () => deleteImage(index);

    actions.appendChild(editBtn);
    actions.appendChild(deleteBtn);

    item.appendChild(image);
    item.appendChild(info);
    item.appendChild(actions);

    gallery.appendChild(item);
  });
}

function showPreview(src) {
  modalImage.src = src;
  previewModal.style.display = 'flex';
}

modalClose.addEventListener('click', () => {
  previewModal.style.display = 'none';
});

function deleteImage(index) {
  images.splice(index, 1);
  renderGallery();
}

function editImageName(index) {
  const newName = prompt("Enter new name:", images[index].name);
  if (newName) {
    images[index].name = newName;
    renderGallery();
  }
}
