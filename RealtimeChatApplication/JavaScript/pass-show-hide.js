const passwdField = document.querySelector(".form input[type='password']"),
toggleBtn = document.querySelector(".form .field i");

toggleBtn.onclick = ()=>{
    if (passwdField.type === "password") {
        passwdField.type = "text";
        toggleBtn.classList.add('active');
    } else {
        passwdField.type = "password";
        toggleBtn.classList.remove('active');
    };
};