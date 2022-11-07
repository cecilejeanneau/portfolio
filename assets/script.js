'use strict';

// WORK IN PROGRESS AJAX request

window.addEventListener('DOMContentLoaded', (event) => {
    let inputRequest = document.getElementById("searchbar");

    inputRequest.addEventListener('keydown', () => {
    
        let answers = document.querySelector("#searchbar").value;
    
        let searchMedia = new Request('https://cecilejeanneau.sites.3wa.io/jeanneau-cecile-3WAProject/ajax', {
            method : "POST",
            body : JSON.stringify({mediaFind : answers})
        });
        // link between js and php
    
        fetch(searchMedia).then(response => response.text()).then(response => {
            document.getElementById("answer").innerHTML = response;
        });
    });
});


// MODAL

let modalWindow = document.querySelector(".modal--hidden");
// select the element

modalWindow.onclick = () => modalWindow.classList.toggle("modal");
// display it by changing the class
// CAN'T BE POSSIBLE BECAUSE OF THE GRID