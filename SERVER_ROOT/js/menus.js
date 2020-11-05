window.addEventListener('DOMContentLoaded', function () {

  var selector = document.querySelector('.selector');

  selector.addEventListener('change', init);

  function init() {

    var selected = document.querySelector('.selected');

    selection = selector.value;

    switch (selection) {

      case 'battery':
        selected.options[0].selected = true;
        break;

      case 'humidity':
        selected.options[0].selected = true;
        break;

      case 'illuminance':
        selected.options[1].selected = true;
        break;

      case 'illuminance_lux':
        selected.options[2].selected = true;
        break;

      case 'linkquality':
        selected.options[3].selected = true;
        break;

      case 'occupancy':
        selected.options[4].selected = true;
        break;

      case 'pressure':
        selected.options[5].selected = true;
        break;

      case 'temperature':
        selected.options[6].selected = true;
        break;

      case 'voltage':
        selected.options[9].selected = true;
        break;
    }

  }

});
