function getImagePreview(event) {
    let fileInput = event.target;
    let files = fileInput.files;

    if (files.length > 0) {
        let image = URL.createObjectURL(files[0]);

        // Remove any existing image preview
        let existingImage = document.getElementById("previewImage");
        if (existingImage) {
            existingImage.parentNode.removeChild(existingImage);
        }

        // Create a new image element for the preview
        let newImg = document.createElement("img");
        newImg.src = image;
        newImg.id = "previewImage";
        newImg.width = "250";
        newImg.height = "250";
        newImg.style.border = "2px solid black";
        newImg.style.borderRadius = "10px";
        newImg.style.marginRight = "5.5vw";

        // Append the new image preview to the container
        let previewContainer = document.getElementById("previewContainer");
        previewContainer.appendChild(newImg);

        // Update form page height if needed
        let formPage = document.getElementById('formpage1');
        formPage.style.height = "140vh";
    }
}

// function getValueFromQueryParam(key) {
// const queryString = window.location.search;
// const urlParams = new URLSearchParams(queryString);
// const value = urlParams.get(key);
// window.location.href = `test.php?value=${value}`;
// }
   

function homepage() {
    window.location.href = "landlordhomepage.html";
}

function accountpage() {
    window.location.href = "landlordaccountpage.html";
}

function contactuspage() {
    window.location.href = "ContactUs.html";
}

function aboutpage() {
    window.location.href = "About.html";
}