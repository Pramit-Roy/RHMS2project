const fnameid= document.getElementById('namevalue');
const email= document.getElementById('emailvalue');
const cn= document.getElementById('cnvalue');
const acno= document.getElementById('acnovalue');
const un= document.getElementById('unvalue');
const image = document.getElementById('image');

// function generateMD5(email) {
//     return md5(email.trim().toLowerCase());
// }


function homepage() {
    window.location.href = "tenanthomepage.html";
}
function contactuspage() {
    window.location.href = "tenantcontactus.html";
}

function aboutpage() {      
    window.location.href = "tenantabout.html";
}

function confirmDelete() {
    return confirm('Are you sure you want to delete this account?');
}

function confirmLogout() {
    return confirm('Do you want to log-out from rentBuddy?');
}


fetch('tenantaccountpage.php')
    .then(response => response.json())
    .then(data => {
        console.log(data);
        const fullname = data.fname + " " + data.mname + " " + data.sname;
        fnameid.innerText = fullname;
        email.innerText = data.email;
        cn.innerText = data.mono;
        acno.innerText = data.acno;
        un.innerText = data.username;

        // const emailid = 'rpramit415@gmail.com';
        // const hash = generateMD5(data.email);
        // const gravatarURL = `https://www.gravatar.com/avatar/${hash}?s=200`;
        // image.setAttribute('src',gravatarURL);
    });

