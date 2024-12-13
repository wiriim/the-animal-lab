<div id="attachment-preview" class="mt-3 d-flex flex-wrap gap-3 justify-content-evenly"></div>

<script>
    let selectedFiles = [];

    document.getElementById('attachment').addEventListener('change', function(event) {
        const files = Array.from(event.target.files);
        const previewContainer = document.getElementById('attachment-preview');

        files.forEach(file => {
            selectedFiles.push(file);

            const card = document.createElement('div');
            card.className = 'card p-0 d-flex flex-column';
            card.style.width = '10rem';
            card.style.height = '15rem';

            const img = document.createElement('img');
            img.className = 'card-img-top';
            img.style.width = '100%';
            img.style.height = '50%';
            img.style.margin = 'auto';
            img.style.objectFit = 'contain';
            img.alt = file.name;

            if (file.type.startsWith('image/')) {
                img.src = URL.createObjectURL(file);
                img.onload = function() {
                    URL.revokeObjectURL(img.src);
                };
            } else {
                img.src = 'https://via.placeholder.com/150';
            }
            card.appendChild(img);

            const cardBody = document.createElement('div');
            cardBody.className = 'card-body d-flex flex-column';

            const cardTitle = document.createElement('h5');
            cardTitle.className = 'card-title text-center fw-semibold';
            cardTitle.style.overflow = 'hidden';
            cardTitle.style.display = '-webkit-box';
            cardTitle.style.webkitBoxOrient = 'vertical';
            cardTitle.style.webkitLineClamp = '1';
            cardTitle.textContent = file.name;

            const cardText = document.createElement('p');
            cardText.className = 'card-text text-center';
            cardText.style.overflow = 'hidden';
            cardText.style.display = '-webkit-box';
            cardText.style.webkitBoxOrient = 'vertical';
            cardText.style.webkitLineClamp = '1'; /* Limit to 2 lines */
            cardText.textContent = `File size: ${(file.size / 1024).toFixed(2)} KB`;

            const removeButton = document.createElement('button');
            removeButton.className =
                'btn btn-danger btn-block w-100 d-flex justify-content-center mt-auto';
            removeButton.textContent = 'Remove';
            removeButton.addEventListener('click', function() {
                removeFile(file.name);
                card.remove();
            });

            cardBody.appendChild(cardTitle);
            cardBody.appendChild(cardText);
            cardBody.appendChild(removeButton);

            card.appendChild(cardBody);

            previewContainer.appendChild(card);
        });

        updateFileInput(event.target, selectedFiles);
    });

    function removeFile(fileName) {
        selectedFiles = selectedFiles.filter(file => file.name !== fileName);

        const fileInput = document.getElementById('attachment');

        updateFileInput(fileInput, selectedFiles);
    }

    function updateFileInput(inputElement, files) {
    const dataTransfer = new DataTransfer();
    
    files.forEach(file => {
        dataTransfer.items.add(file);
    });

    inputElement.files = dataTransfer.files;
}
</script>