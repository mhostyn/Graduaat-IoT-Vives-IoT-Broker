window.addEventListener('load', function(){
    var selector = document.querySelector('.selector');

    selector.addEventListener('click', function(){

            var selectorString = selector.options[selector.selectedIndex].textContent;
            var selection= document.querySelector('.popup__form__label_unit');
            

            switch (selectorString) {
                case 'Celcius':
                    selection.textContent = "Unit: °C";
                  break;
                case 'Farenheit':
                    selection.textContent = "Unit: °F";
                  break;
                case 'Volume':
                    selection.textContent = "Unit: l";
                  break;
                case 'Pressure':
                    selection.textContent = "Unit: Bar";
              }
    })
});


