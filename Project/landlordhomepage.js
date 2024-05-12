const create = document.getElementById('create');
const manage = document.getElementById('manage');
const managesubpart = document.getElementById('managesubpart');
const createsubpart = document.getElementById('createsubpart');
const residencedetails = document.getElementById('residensedetails');
const recordtable = document.getElementById("recordtable");


function createclick() {
    create.style.border = "2.5px solid black";
    create.style.borderBottom = "none";
    create.style.backgroundColor = "#A2D2FF";
    create.style.marginRight = "2px";
    manage.style.border = "2.5px solid black";
    manage.style.backgroundColor = "#cccccc";
    manage.style.marginLeft = "none";
    managesubpart.style.display = "none";
    createsubpart.style.display = "flex";
}


function addRow(records) {
    var i = 0;
    while (i<records.length) {
        var currentHeight = managesubpart.clientHeight;
        var newRow = document.createElement('tr');
        var idcell = document.createElement('td');
        var imgcell = document.createElement('td');
        var addresscell = document.createElement('td');
        var editcell = document.createElement('td');
        var imagePath = 'uploads/' + records[i].img;
        var imageElement = document.createElement('img');
        var newheight = currentHeight + (30 * window.innerHeight / 100);

        managesubpart.style.height = newheight+'px';
        imageElement.src = imagePath;
        imageElement.height = 250;
        imageElement.width = 250;
        imageElement.style.paddingLeft = "4vw";
        // var endnewRow = document.createElement('/tr');
        
        idcell.textContent = records[i].rid;
        imgcell.appendChild(imageElement);
        addresscell.textContent = records[i].rname+", "+records[i].colony+", "+records[i].strvill+", "+records[i].po+", "+records[i].ps+", "+records[i].disct+", "+records[i].state+", "+records[i].pin;
        addresscell.style.fontSize = "larger";
        editcell.innerHTML = '<a href="editresidencedetails.php?value=' + encodeURIComponent(records[i].rid) + '">edit</a><pre> or </pre><a href="residencedetailsdelete.php?value=' + encodeURIComponent(records[i].rid) + '" onclick="return confirm(\'Are you sure you want to delete this item?\')">delete</a>';


        idcell.style.height = '25vh';
        imgcell.style.height = '25vh';
        addresscell.style.height = '25vh';
        editcell.style.height = '25vh';
        
        newRow.appendChild(idcell);
        newRow.appendChild(imgcell);
        newRow.appendChild(addresscell);
        newRow.appendChild(editcell);
        
        recordtable.appendChild(newRow);
        // recordtable.appendChild(endnewRow);
        i = i+1;

    }
}


function manageclick() {
    manage.style.border = "2.5px solid black";
    manage.style.borderBottom = "none";
    manage.style.backgroundColor = "#A2D2FF";
    create.style.border = "2.5px solid black";
    create.style.backgroundColor = "#cccccc";
    create.style.marginRight = "none";
    manage.style.marginLeft = "2px";
    createsubpart.style.display = "none";
    managesubpart.style.display = "block";
    residencedetails.style.fontFamily = "Montserrat";
    residencedetails.style.textShadow = "2px 2px 4px rgba(0, 0, 0, 0.25)";
    residencedetails.style.paddingTop = "5vh";
    residencedetails.style.paddingLeft = "1.5vw";
    recordtable.style.marginTop = "4vh";

    var xhr = new XMLHttpRequest();
    xhr.open('GET', 'landlordresidencerecordfetch.php', true);
    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                var records = JSON.parse(xhr.responseText);
                addRow(records);
            } else {
                console.error('Failed to fetch records');
            }
        }
    };
    xhr.send();
}


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


function accountpage() {
    window.location.href = "landlordaccountpage.html";
}

function contactuspage() {
    window.location.href = "ContactUs.html";
}

function aboutpage() {
    window.location.href = "About.html";
}





