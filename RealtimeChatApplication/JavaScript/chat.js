const form = document.querySelector(".typing-area"),
    inputField = document.querySelector(".input-field"),
    sendBtn = document.querySelector("button"),
    chatBox = document.querySelector(".chat-box");

form.onsubmit = (e) => {
    e.preventDefault(); // Prevent form from submitting
}

sendBtn.onclick = ()=> {
    // begining of AJAX
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "php/insert-chat.php", true);
    xhr.onload = () => {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                inputField.value = ""; // After sending the message to the db then the input be empty.
                scrollToBottom();
            }
        }
    }
    // Sending all form data from Ajax to Php
    let formData = new FormData(form); // Creating new formData Object
    xhr.send(formData); // Sending the form to php
}

setInterval(() => {
    // The same as the login, user, signup functions
    let xhr = new XMLHttpRequest(); // Create an XML Object
    xhr.open("POST", "./php/get-chat.php", true);
    xhr.onload = () => {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                let data = xhr.response;
                // console.log(data); // => Enable if you want to see the available users or ONLINE
                chatBox.innerHTML = data;
                if (!chatBox.classList.contains("active")) { // if active class not contains in chatbox the scroll to bottom 
                    scrollToBottom();
                }
            }
        }
    }
    let formData = new FormData(form); // Creating new formData Object
    xhr.send(formData); // Sending the form to php
}, 500);// This function runs frequently every after 500ms

// Auto scroll up function
function scrollToBottom() {
    chatBox.scrollTop = chatBox.scrollHeight;
}
//fixing the not able to scroll through messages cause ajax is calling every single 500ms 
//causing the scroll function to not work
chatBox.onmouseenter = ()=>{
    chatBox.classList.add("active");
}
chatBox.onmouseleave = ()=>{
    chatBox.classList.remove("active");
}



