const form = document.getElementById("registrationForm");
const fullName = document.getElementById("fullName");
const email = document.getElementById("email");
const password = document.getElementById("password");
const fullNameError = document.getElementById("fullNameError");
const emailError = document.getElementById("emailError");
const passwordError = document.getElementById("passwordError");

form.addEventListener("submit", function(event){
    if(!validateFullName()){
        event.preventDefault();    // stop submitting the particular form
    }
    if(!validateEmail()){
        event.preventDefault();    // stop submitting the particular form
    }
    if(!validatePassword()){
        event.preventDefault();    // stop submitting the particular form
    }
});

fullName.addEventListener("blur", validateFullName);
email.addEventListener("blur", validateEmail);
password.addEventListener("blur", validatePassword);

function validateFullName(){
    if(fullName.value.trim() === ""){
        fullNameError.textContent = "Full Name is Required!";
        return false;
    } else{
        fullNameError.textContent = "";
        return true;
    }
}

function validateEmail(){
    const emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
    if(!emailPattern.test(email.value)){
        emailError.textContent = "Invalid Email Address!";
        return false;
    } else{
        emailError.textContent = "";
        return true;
    }
}

function validatePassword(){
    const passwordPattern = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$/;
    if(!passwordPattern.test(password.value)){
        passwordError.textContent = "Password must be at least 8 characters, including one uppercase letter, one lowercase letter and one digit!"
        return false;
    } else{
        passwordError.textContent = "";
        return true;
    }
}