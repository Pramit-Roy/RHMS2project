function validatePassword() {
    var password = document.getElementById("password").value;
    var confirmPassword = document.getElementById("cpassword").value;
    var passwordError = document.getElementById("passwordError");

    if (password !== confirmPassword) {
        passwordError.innerText = "Passwords do not match!";
        return false; // Prevent form submission
    } else {
        passwordError.innerText = ""; // Clear error message
        return true; // Allow form submission
    }
}

function checkUsernameAvailability() {
    var username = document.getElementById("username").value;
    var usernameError = document.getElementById("usernameError");

    // AJAX call to check username availability on the server
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "tenantcheck_username.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            var response = xhr.responseText;
            if (response === "taken") {
                usernameError.innerText = "Username is already taken. Please choose another.";
            } else {
                usernameError.innerText = ""; // Clear error message
            }
        }
    };
    xhr.send("username=" + username);
}

function checkacnoAvailability() {
    var acno = document.getElementById("acno").value;
    var acnoError = document.getElementById("acnoError");

    // AJAX call to check username availability on the server
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "tenantcheck_acno.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            var response = xhr.responseText;
            if (response === "taken") {
                acnoError.innerText = "Aadhar Card No. is already registered.";
            } else {
                acnoError.innerText = ""; // Clear error message
            }
        }
    };
    xhr.send("acno=" + acno);
}


function homepage() {
    window.location.href = "tenanthomepage.html";
}

function accountpage() {
    window.location.href = "tenantaccountpage.html";
}

function aboutpage() {
    window.location.href = "tenantabout.html";
}

function contactuspage() {
    window.location.href = "tenantcontactus.html";
}