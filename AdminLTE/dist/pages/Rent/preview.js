{/* <script> */}
  // Function to handle multiple files selection
  function handleFiles(event) {
    const files = event.target.files;  // Get all selected files
    const previewContainer = document.getElementById('filePreviews');
    previewContainer.innerHTML = '';  // Clear previous previews

    let imageCount = 0; // Keep track of how many images we preview

    Array.from(files).forEach(file => {
      const fileSizeInMB = (file.size / (1024 * 1024)).toFixed(2);  // Convert to MB
      const fileType = file.type;

      // Create a container for each file's preview and size
      const fileContainer = document.createElement('div');
      fileContainer.style.marginBottom = '30px';

      // Display the file size
      const fileSizeElement = document.createElement('p');
      fileSizeElement.textContent = `File size: ${fileSizeInMB} MB`;
      fileContainer.appendChild(fileSizeElement);

      // Preview the file based on type
      if (fileType.startsWith('image/')) {
        if (imageCount >= 3) {
          const warning = document.createElement('p');
          warning.style.color = 'red';
          warning.textContent = 'You can only upload 3 images at a time.';
          previewContainer.appendChild(warning);
          return;
        }

        const img = document.createElement('img');
        img.style.width = '70%';
        img.style.display = 'flex';
        img.src = URL.createObjectURL(file);
        img.onload = function () {
          URL.revokeObjectURL(img.src); // Free memory
        };

        fileContainer.appendChild(img);
        imageCount++;

      } else if (fileType === 'application/pdf') {
        const pdfEmbed = document.createElement('embed');
        pdfEmbed.style.width = '100%';
        pdfEmbed.style.height = '100%';
        pdfEmbed.src = URL.createObjectURL(file);
        fileContainer.appendChild(pdfEmbed);

      } else {
        const fileName = document.createElement('p');
        fileName.textContent = `File: ${file.name}`;
        fileContainer.appendChild(fileName);
      }

      // Append the file container to the previews section
      previewContainer.appendChild(fileContainer);
    });
  }
// </script>
