window.addEventListener('load', function(){

    //--|Get the button
var graphDisplayers = document.querySelectorAll('.chartDisplayers');
    //--| Add events
for(var i = 0; i<graphDisplayers.length; i++){
    graphDisplayers[i].addEventListener('click', init);
}


function init(e){

    //--|Get the text content of the right card (e.target gets the clicked element)
    // var idString =e.target.parentNode.parentNode.parentNode.parentNode.childNodes[1].children[2].children[0].children[0].textContent;

    // When target is in the html block
    var idString = e.target.closest('.card').querySelector('.card_details_ids').textContent;

    // When element is not in  a html block
    // var idtarget = e.target.getAttribute('data-target');
    // var idString = document.getElementById(idtarget).textContent;
    // console.log(idString);

    //--| split the string to get the value
    var sensor_id = idString.substr(11);


async function getPhpData(){

    let response = await fetch(`http://localhost/web-programming/kwartaal_5/sensor_dashboard/php/send_values_to_js.php?` + new URLSearchParams({
        sensor_id: `${sensor_id}`
    }));
    let json = await response.json();

    var values = [];
    var keys = [];

    for (var i in json){
        keys.push(i);
        values.push(json[i].value);
    }

    let myChart = document.getElementById('myChart').getContext('2d');

    let massPopChart = new Chart(myChart, {
        type: 'line', //bar, horizontalbar, pie, line, donut, radar, polararea
        data: {
            labels: keys,

            datasets: [{
                label: 'Hide labels',
                data: values,
                backgroundColor: '#e40b14',
                borderWidth: 1,
                borderColor: '#e40b14',
                hoverBorderWidth: 3,
                hoverBorderColor: 'white',
                fontColor: '#e40b14',
            }],
        },
        options: {
            title: {
                display: true,
                text: 'Last Values',
                fontSize: 25,
                fontColor: '#e40b14',
            },
            // gridLines: {
            //     fontColor: 'rgba(248, 161, 47, 0.7)',
            //     color:'rgba(248, 161, 47, 0.7)',
            // },
            legend: {
                position: 'right',
                labels: {
                fontColor: '#e40b14',
                }
            },
            layout: {
                padding: {
                    left: 0,
                    right: 0,
                    bottom: 0,
                    top: 0,
                    
                }
            }
        },

    });
}

////////RUN CODE
getPhpData();

}
})

