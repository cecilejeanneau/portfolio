'use strict';

    // MODAL
    
modal();
    
function modal() {
    
    let sectionModal = document.querySelectorAll("section[classList='articles']");
    let modalWindow = document.querySelectorAll(".img__modal--hidden");
    let bodyGrid = document.querySelector(".body--grid");
    let mainGrid = document.querySelector(".main--grid");
    let sectionGrid = document.querySelector(".section--grid");
        // select the element


    let x = 0;

    for(let i = 0; i <= modalWindow.length; i++) {
        let img = x++;
  
        
        let picturesAsButton = document.getElementById(img);
            // event listener to all the images
        if (picturesAsButton !== null) {
    
            picturesAsButton.addEventListener("click", () => { picturesAsButton.classList.toggle("img__modal--size") + bodyGrid.classList.toggle("body--no-grid") + mainGrid.classList.toggle("main--no-grid") + sectionGrid.classList.toggle("section--no-grid") }, false);
            
            // display it by changing the classes
        }
    }
}


    // AJAX request by fetch

let research = document.getElementById("searchbar");
    // store in a variable searchbar element
if(research != null) {
    
    research.addEventListener('keyup', () => {
        // listen for a keyboard event when a key is pressed
        let answers = document.querySelector("#searchbar").value;
            // store in a variable what is typed on keyboard namely the searchbar value element
        
        let searchMedia = new Request('https://cecilejeanneau.sites.3wa.io/jeanneau-cecile-3WAProject/ajax', {
            // resource request
            method: "POST",
                // post method to retrieve user research
            body: JSON.stringify({ mediaFind: answers })
                // translate JS retrieve post to JSON to be understood by PHP
        });
            // link between JS and PHP
        try {
            fetch(searchMedia).then(response => response.text()).then(response => {
                document.getElementById("answerList").innerHTML = response;
                    // fetch method return Promise, then Promise method
            return response;
            
            })
        } catch(errorMessage) {
            document.write("Aucun média trouvé", errorMessage);
            // manage error
            throw errorMessage;
        };
        
    });
    
};