const form = document.querySelector(".signup form"),
continueBtn = form.querySelector(".button input"),
errorText = form.querySelector(".error-txt");

form.onsubmit = (e) =>{
    e.preventDefault();
}

continueBtn.onclick = ()=> {
    // begining of AJAX
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "php/signup.php", true);
    xhr.onload = ()=>{
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                let data = xhr.response;
                if (data == "Success") {
                    location.href = 'users.php';
                } else {
                    errorText.textContent = data;
                    errorText.style.display = "block";
                }
            }
        }
    }
    // Sending all form data from Ajax to Php
    let formData = new FormData(form); // Creating new formData Object
    xhr.send(formData); // Sending the form to php
}
