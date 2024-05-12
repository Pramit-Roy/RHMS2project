const slides = document.querySelectorAll('.slide');
var count = 0;
const totalSlides = slides.length;
var imgarray = [];
var imgdivarray = [];
var addrdivarray = [];
var ownerdivarray = [];
var addrownerdivarray = [];

for (let index = 0; index < 5; index++) {
    var imageElement = document.createElement('img');
    imgarray.push(imageElement);
    var imgdiv = document.createElement('div');
    imgdivarray.push(imgdiv);
    var addrdiv = document.createElement('div');
    addrdivarray.push(addrdiv);
    var ownerdiv = document.createElement('div');
    ownerdivarray.push(ownerdiv);
    var addrownerdiv = document.createElement('div');
    addrownerdivarray.push(addrownerdiv);
}



slides.forEach(
    (slide, index) => {
        slide.style.left = `${index * 100}%`;
    }
);

function slidediv() {
    slides.forEach(
        (slide) => {
            slide.style.transform = `translateX(-${count * 100}%)`;
        }
    );
}

function goPrev() {
    if (count > 0) {
        count--;
        slidediv();
    }
}

function goNext() {
    if (count < totalSlides - 1) {
        count++;
        slidediv();
    }
}



fetch('tenanthomepage.php')
    .then(response => response.json())
    .then(data => {
        data.forEach((record, index) => {
            var imagePath = 'uploads/' + `${record.img}`;
            imgarray[index].src = imagePath;
            imgarray[index].style.height = "100%";
            imgarray[index].style.width = "100%";
            imgarray[index].style.borderTopLeftRadius = '10px';
            imgarray[index].style.borderBottomLeftRadius = '10px';
            imgarray[index].style.position = 'absolute';
            imgdivarray[index].style.display = 'flex';
            imgdivarray[index].style.justifyContent = 'center';
            imgdivarray[index].style.alignItems = 'center';
            imgdivarray[index].style.height = '60vh';
            imgdivarray[index].style.width = '30%';
            // imgdivarray[index].style.backgroundColor = '#2AFC98';
            imgdivarray[index].style.position = 'relative';
            imgdivarray[index].appendChild(imgarray[index]);

            addrownerdivarray[index].style.height = '60vh';
            addrownerdivarray[index].style.width = '70%';
            addrownerdivarray[index].style.fontFamily = 'Montserrat';
            addrownerdivarray[index].style.fontSize = 'larger';
            
            ownerdivarray[index].style.height = '30vh';
            ownerdivarray[index].style.width = '100%';
            ownerdivarray[index].style.padding = '20px';
            // ownerdivarray[index].style.backgroundColor = '#16C172';
            ownerdivarray[index].style.backgroundColor = '#bbdefb';
            ownerdivarray[index].innerHTML = `<h3 style='margin-bottom: 15px;'><u>About Owner</u></h3>${record.fname} ${record.mname} ${record.lname}<br><br><i><u>E-mail:</u></i>   ${record.email}<br><i><u>Contact No.:</u></i>   ${record.phno}`;
            
            addrdivarray[index].style.height = '30vh';
            addrdivarray[index].style.width = '100%';
            addrdivarray[index].style.padding = '20px';
            // addrdivarray[index].style.backgroundColor = '#09E85E';
            addrdivarray[index].style.backgroundColor = '#6da5d6';
            // addrdivarray[index].appendChild(resiheading);
            addrdivarray[index].innerHTML = `<h3 style='margin-bottom: 15px;'><u>About Residence</u></h3>${record.rid} , ${record.rname} , ${record.strvill} , ${record.colony} , ${record.po} , ${record.ps} , ${record.disct} , ${record.state} , ${record.pin}`;

            addrownerdivarray[index].appendChild(addrdivarray[index]);
            addrownerdivarray[index].appendChild(ownerdivarray[index]);
            slides[index].appendChild(imgdivarray[index]);
            slides[index].appendChild(addrownerdivarray[index]);
            // slides[index].innerText = `${record.rid} - ${record.rname} - ${record.strvill} - ${record.colony} - ${record.po} - ${record.ps} - ${record.disct} - ${record.state} - ${record.pin} - ${record.img}`;
        });
    })
    .catch(error => console.error('Error fetching data:', error));






function accountpage() {
    window.location.href = "tenantaccountpage.html";
}

function aboutpage() {
    window.location.href = "tenantabout.html";
}

function contactuspage() {
    window.location.href = "tenantcontactus.html";
}