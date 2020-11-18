
const inputFile = document.getElementById('image_uploads');
const preview = document.querySelector('.preview');

inputFile.addEventListener('change', updateImageDisplay);


function updateImageDisplay() {
  while(preview.firstChild) {
    preview.removeChild(preview.firstChild);
  }

  const curFiles = inputFile.files;
  if(curFiles.length === 0) {
    const para = document.createElement('p');
    para.textContent = 'No files currently selected for upload';
    preview.appendChild(para);
  } else {
    const list = document.createElement('ol');
    preview.appendChild(list);

    for(const file of curFiles) {
      const listItem = document.createElement('li');
      listItem.style.display = 'block';
      listItem.style.float = 'left';
      listItem.style.width = '100%';
      listItem.style.marginBottom = '10px';
      const para = document.createElement('p');
      para.textContent = `File name ${file.name}`;
      const image = document.createElement('img');
      image.src = URL.createObjectURL(file);
      image.style.maxHeight = '100px';
      image.style.maxWidth = '100px';
      image.style.float = 'right';
      

      listItem.appendChild(image);
      listItem.appendChild(para);
      

      list.appendChild(listItem);
    }
  }
}

function onSelect(e) {
    if (e.files.length > 5) {
        alert("Only 5 files accepted.");
        e.preventDefault();
    }
}