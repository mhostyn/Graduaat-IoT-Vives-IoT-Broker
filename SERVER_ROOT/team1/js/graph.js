window.addEventListener('load', function(){

////////GET VARIABLES
asyn
                backgroundColor: 'rgba(248, 161, 47, 0.7)',
                borderWidth: 1,
                borderColor: 'rgba(248, 161, 47, 0.7)',
                hoverBorderWidth: 3,
                hoverBorderColor: 'white',
                fontColor: 'rgba(248, 161, 47, 0.7)',
            }],
        },
        options: {
            title: {
                display: true,
                text: 'Last Values',
                fontSize: 25,
                fontColor: 'rgba(248, 161, 47, 0.7)',
            },
            // gridLines: {
            //     fontColor: 'rgba(248, 161, 47, 0.7)',
            //     color:'rgba(248, 161, 47, 0.7)',
            // },
            legend: {
                position: 'right',
                labels: {
                fontColor: 'rgba(248, 161, 47, 0.7)',
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




////////ADD EVENT LISTENERS


////////FUNCTIONS

////////RUN CODE
getPhpData();
  
})


