<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/t1-style.css">
    <link rel="shortcut icon" type="image/png" href="img/guage-logo.png">

    <script src="https://code.jquery.com/jquery-3.5.1.js"
        integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
        
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
    <script src="js/graph.js"></script>   
    <script src="js/menus.js"></script>   
        
    <title>Dashboard</title>
</head>

<?php include_once 'php/html_elements.php'; get_html_header_code(); ?>

<body>
    <?php include 'php/controllerUserData.php';?>

    <main>
        <section id="section-card">

            <!--  
            ////////////////////////////////////////
            //-- card section 
            //-- added cards through php
            ////////////////////////////////////////
            -->
            <?php include 'php/get_cards.php';?>

            <!--  
            ////////////////////////////////////////
            //-- card section 
            //-- adding card
            ////////////////////////////////////////
            -->
            <div class="card" id="card">
                <div class="card__side card__side--front">
                    <div class="card__picture card__picture--2">
                        &nbsp;
                        <!-- <- Empy  space -->
                    </div>
                    <h4 class="card__heading">
                        <span class="card__heading-span card__heading-span-2">
                            Add new sensor
                        </span>
                    </h4>

                </div>
                <div class="card__side card__side--back card__side--back-2">
                    <div class="card__cta">
                        <div class="card__price-box">
                            <!--Change this name-->
                            <!-- Create table here -->
                        </div>
                        <!-- Ancre element for redirecting to the pop up part -->
                        <a href="#popupform">Add now!</a>
                    </div>
                </div>
            </div>
            </div>
        </section>
    </main>
    
    <!--  
            ////////////////////////////////////////
            //-- pop-up section 
            //-- chart popup
            ////////////////////////////////////////
            -->
    <section class="section-popup">

        <div class="popup" id="popup">
            <div class="popup__content">
                <div class="popup__top">
                <canvas id="myChart" class="chart"></canvas>
                </div>

                <div class="popup__bottom">
                    <a href="#section-card" class="popup__close">&times;</a>
                </div>
            </div>
        </div>

        <!--  
        ////////////////////////////////////////
        //-- pop-up section 
         //-- form pop-up
        ////////////////////////////////////////
        -->
        <div class="popup" id="popupform">
            <div class="popup__content">
                <div class="popup__top">

                </div>

                <div class="popup__bottom">
                    <a href="#section-card" class="popup__close">&times;</a>

                    <form action="php/send_to_db.php" method="POST" class="popup__form">
                        <label class="popup__form__label" for="name">Name:</label>
                        <input class="popup__form__input" type="text" name="name">

                        <!-- 
                            <label class="popup__form__label" for="api">Api-key:</label>
                            <input class="popup__form__input" type="text" name="api"> 
                        -->


                        

                        <label class="popup__form__label" for="type">Type:</label>
                        <select class="popup__form__selector selector" name="type">

                            <option class="popup__form__option selector" value="battery">Battery Percentage</option>
                            <option class="popup__form__option selector" value="humidity">Relative humidity</option>
                            <option class="popup__form__option selector" value="illuminance">Lighting</option>
                            <option class="popup__form__option selector" value="illuminance_lux">Lighting Lux</option>
                            <option class="popup__form__option selector" value="linkquality">Link Quality</option>
                            <option class="popup__form__option selector" value="occupancy">Occupancy Detection</option>
                            <option class="popup__form__option selector" value="pressure">Atmospheric Pressure</option>
                            <option class="popup__form__option selector" value="temperature">Temperature</option>
                            <option class="popup__form__option selector" value="voltage">Battery Voltage</option>

                        </select>
                      
                        <!-- 
                            <label class="popup__form__label_unit" for="unit" value='unit'>Unit:</label>
                            <input class="popup__form__input" type="hidden" name="unit"> 
                        -->
                        
                        <label class="popup__form__label" for="unit">Unit:</label>
                        <select class="popup__form__selector selected" name="unit">

                            <option class="popup__form__option" value="%">%</option>
                            <option class="popup__form__option" value=""></option>
                            <option class="popup__form__option" value="lux">lux</option>
                            <option class="popup__form__option" value="lqi">lqi</option>
                            <option class="popup__form__option" value="bool">bool</option>
                            <option class="popup__form__option" value="hpa">hpa</option>
                            <option class="popup__form__option" value="°C">°C</option>
                            <option class="popup__form__option" value="°F">°F</option>
                            <option class="popup__form__option" value="°K">°K</option>
                            <option class="popup__form__option" value="mv">mV</option>

                        </select>

                        <input class="popup__form__submit" name="action" type="hidden" value="insert">
                        <input class="popup__form__submit" type="submit" value="Submit">
                    </form>
                </div>
            </div>
        </div>

    </section>
</body>

<?php include_once 'php/html_elements.php'; get_html_footer_code(); ?>

</html>
