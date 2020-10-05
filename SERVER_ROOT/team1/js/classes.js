window.addEventListener('load', function(){

    class Card{
        constructor(){}

        getValues(){

        }
    
        createSelf(){
            var template = `
            <div class="card" id="card">
            <div class="card__side card__side--front">
                <div class="card__picture card__picture--1">
                    &nbsp;
                    <!-- <- Empy  space -->
                </div>
                <h4 class="card__heading">
                    <span class="card__heading-span card__heading-span-1">
                        Project name
                    </span>
                </h4>
                <div class="card__details">
                    <ul>
                        <li>Sensor id:</li>
                        <li>Last seen:</li>
                    </ul>
                </div>
            </div>
            <div class="card__side card__side--back card__side--back-1">
                <div class="card__cta">
                    <div class="card__table">
                        <!--Change this name-->
                        <!-- Create table here -->
                    </div>
                    <!-- Ancre element for redirecting to the pop up part -->
                    <a href="#popup">Vieuw chart!</a>
                </div>
            </div>
        </div>
        </div>
            `;
    
           
            var element = document.createElement("div");
            element.innerHTML = template;
            // element.textContent = template;
     
            document.getElementById('section-card').appendChild(element); 
           
        }
    }




////////GET VARIABLES
    const submitPopUp = document.querySelector('.popup__form__submit');


////////ADD EVENT LISTENERS
    submitPopUp.addEventListener('click', createNewCard);


////////FUNCTIONS
    function createNewCard(){
        
        let card = new Card();

        card.createSelf();
    }


////////RUN CODE

  
})


