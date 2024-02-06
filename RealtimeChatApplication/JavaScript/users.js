const searchBar = document.querySelector(".users .search input"),
    searchBtn = document.querySelector(".users .search button"),
    usersList = document.querySelector(".users .users-list");

searchBtn.onclick = () => {
    searchBar.classList.toggle("active");
    searchBar.focus()
    searchBtn.classList.toggle("active");
    searchBar.value = "";
}

searchBar.onkeyup = () => {
    let searchTerm = searchBar.value;
    if (searchTerm != "") {
        searchBar.classList.add("active");
    } else {
        searchBar.classList.remove("active");
    }
    let xhr = new XMLHttpRequest(); // Create an XML Object
    xhr.open("POST", "php/search.php", true);
    xhr.onload = () => {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                let data = xhr.response;
                usersList.innerHTML = data;
                // console.log(data); // => Enable it if you want to see the searched terms linked from the db
            }
        }
    }
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.send("searchTerm=" + searchTerm);
}

setInterval(() => {
    // The same as the login, user, signup functions
    let xhr = new XMLHttpRequest(); // Create an XML Object
    xhr.open("GET", "./php/users.php", true);
    xhr.onload = () => {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                let data = xhr.response;
                // console.log(data); // => Enable if you want to see the available users or ONLINE
                if (!searchBar.classList.contains("active")) { // if active not contains search bar
                    usersList.innerHTML = data;                    
                }
            }
        }
    }
    xhr.send();
}, 500);// This function runs frequently every after 500ms