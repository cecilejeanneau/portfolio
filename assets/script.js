'use strict';

// AJAX request by fetch

window.addEventListener("DOMContentLoaded", () => {
    // wait for page code loading
    let research = document.getElementById("searchbar");
        // store in a variable searchbar element
    
    research.addEventListener('keyup', () => {
        // listen for a keyboard event when a key is pressed
        let answers = document.querySelector("#searchbar").value;
            // store in a variable what is typed on keyboard namely the searchbar value element
        console.log(answers);
        
        let searchMedia = new Request('https://cecilejeanneau.sites.3wa.io/jeanneau-cecile-3WAProject/medias', {
            // resource request
            method: "POST",
                // post method to retrieve user research
            section: JSON.stringify({ mediaFind: answers })
                // translate JS retrieve post to JSON to be understood by PHP
        });
        // link between JS and PHP
    
        fetch(searchMedia).then(response => response.text()).then(response => {
            document.getElementById("answerList").innerHTML = response;
            // fetch method return Promise, then Promise method
            return response;
        }).catch((errorMessage) => {
            document.write("Aucun média trouvé", errorMessage);
            // manage error
            throw errorMessage;
        });
    });
});


// MODAL

// let modalWindow = document.querySelector(".modal--hidden");
// select the element

// modalWindow.onclick = () => modalWindow.classList.toggle("modal");
// display it by changing the class
// CAN'T BE POSSIBLE BECAUSE OF THE GRID