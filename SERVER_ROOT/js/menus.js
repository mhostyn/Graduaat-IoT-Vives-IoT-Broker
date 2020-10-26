window.addEventListener('DOMContentLoaded', function(){

  var selector = document.querySelector('.selector');

selector.addEventListener('change', init);

function init(){

  var selected = document.querySelector('.selected');

  selection = selector.value;

                switch (selection) {
                    case 'TempratureC':
                      selected.options[0].selected = true ;
                      break;

                    case 'TempratureF':
                      selected.options[1].selected = true ;
                      break;

                    case 'liter':
                      selected.options[2].selected = true ;
                      break;

                    case 'bar':
                      selected.options[3].selected = true ;
                  }

}

});
