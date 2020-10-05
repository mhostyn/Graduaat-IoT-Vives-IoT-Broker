<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" type="image/png" href="img/logo.png">

    <!-- 
        <script src="js/classes.js"></script>   
    <script src="js/create_new_card.js"></script> 
    -->
    
    <title>Dashboard</title>
</head>
<body>

    <header>
    </header>


    <main>

        <section id="section-card">

            <!--  
            ////////////////////////////////////////
            //-- card section 
            //-- added cards through php
            ////////////////////////////////////////
            -->
            <?php include 'php/tester.php';?>



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


    <footer>
    </footer>





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

                </div>

                <div class="popup__bottom">
                    <a href="#section-card" class="popup__close">&times;</a>
                    <p class="popup__text">
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit.
                        Laudantium, ipsam? Quae voluptatem, aspernatur quidem magnam suscipit expedita temporibus illum
                        consequuntur,
                        eligendi repellendus fugit labore ducimus atque sint. Corrupti,
                        temporibus quo.
                        Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                        Assumenda, vero! Nam quis deleniti corporis debitis incidunt est quia?
                        Tempora placeat iusto atque quaerat fugiat exercitationem non eius minima veniam tempore?
                    </p>
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

                    <form action="#" class="popup__form">
                        <label class="popup__form__label" for="name">Name:</label>
                        <input class="popup__form__input" type="text" name="name">

                        <label class="popup__form__label" for="type">Type:</label>
                        <input class="popup__form__input" type="text" name="type">

                        <label class="popup__form__label" for="unit">Unit:</label>
                        <select class="popup__form__selector" name="unit">
                            <option class="popup__form__option" value="celcius">°C</option>
                            <option class="popup__form__option" value="Farenheit">Fahrenheit</option>
                            <option class="popup__form__option" value="liter">L</option>
                            <option class="popup__form__option" value="bar">Bar</option>

                        </select>

                        <input class="popup__form__submit" type="submit" value="Submit">
                    </form>
                </div>
            </div>
        </div>

    </section>


</body>

</html>
