<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home | Connect.</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/typed.js/2.0.11/typed.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />

</head>

<body>

    <div class="scroll-up-btn">
        <i class="fas fa-angle-up"></i>
    </div>
    <?php include_once "php/html_elements.php"; get_html_header_code(); ?>
    <!-- Navbar start 
    <nav class="navbar">
        <div class="max-width">
            <div class="logo">
                <a href="./index.php">IoT <span>Broker.</span></a>
            </div>
            <ul class="menu">
                <li><a href="./login-user.php" class="menu-btn">Login</a></li>
                 <li><a href="./signup-user.php" class="menu-btn">Register</a></li>
            </ul>
            <div class="menu-btn">
                <i class="fas fa-bars"></i>
            </div>
        </div>
    </nav>-->
    <!-- home section start -->
    <section class="home" id="home">
        <div class="max-width">
            <div class="home-content">
                <div class="text-1">
                    Welcome at</div>
                <div class="text-2">
                    Connect.</div>
                <div class="text-3">
                    Made by <span class="typing"></span></div>
                <a href="./signup-user.php">Register</a>
            </div>
        </div>
    </section>

    <!-- about section start -->
    <section class="about" id="about">
        <div class="max-width">
            <h2 class="title"> About us</h2>
            <div class="about-content">
                <div class="column left">
                    <img src="img/sensors.jpg" alt="">
                </div>
                <div class="column right">
                    <div class="text">
                        The IoT Broker made by <span class="typing-2"></span>
                    </div>
                    <p>
                        This site is an assignment we received within the course Webdevelopment 3.
                        The intention of this project is to work together as a class and to set up a working broker.
                        This means that users can link their sensors to our website and view their data.
                        This project is meant to give us the feeling of what it is like in the real world, the task itself isn't often the problem but the collaboration is.
                    </p>
                    <br>
                    <p>Feel free to take a look at</p>
                    <a href="https://www.vivesinternetofthings.wordpress.com" target="_blank">our blog!</a>
                </div>
            </div>
        </div>
    </section>

    <!-- services section start -->
    <section class="services" id="services">
        <div class="max-width">
            <h2 class="title">The Site</h2>
        </div>
        <div class="serv-content">
            <div class="column left">
                <div class="text">
                    What's this site about?
                </div>
                <p>
                    Welcome to our IoT Broker website. An IoT Broker is basically a place where you can read your sensor data. 
                    We created this website where you can connect your sensors and where its data will be preserved in a database. You will also be able to see your sensors data here and see old data.
                </p>
            </div>
            <div class="column right">
                <img src="img/coding.jpg" alt="">
            </div>
        </div>
    </section>



    <!-- teams section start -->
    <section class="teams" id="teams">
        <div class="max-width">
            <h2 class="title">
                The teams</h2>
            <div class="carousel owl-carousel">
                <div class="card">
                    <div class="box">
                        <img src="img/teamfaces/Rick.jpg" alt="">
                        <div class="text">
                            Rick Tousseyn</div>
                        <p>
                            <i>"Ik hield mij vooral bezig met het coördineren van de groepen en het opstellen van onze blog."</i></p>
                    </div>
                </div>
                <div class="card">
                    <div class="box">
                        <img src="img/teamfaces/Tibo.png" alt="">
                        <div class="text">
                            Tibo Rosseel</div>
                        <p>
                            <i>"Ik hield mij bezig met de php en werking achter de login-, registerpage."</i></p>
                    </div>
                </div>
                <div class="card">
                    <div class="box">
                        <img src="img/teamfaces/Giovanni.png" alt="">
                        <div class="text">
                            Giovanni Callebaut</div>
                        <p>
                            <i>"Voornamelijk gewerkt aan de html en styling van de index-, login-user-, signup-user-, forgot-password-, otp- page."</i></p>
                    </div>
                </div>
                <div class="card">
                    <div class="box">
                        <img src="img/teamfaces/Stan.jpg" alt="">
                        <div class="text">
                            Stan Lioen</div>
                        <p>
                            <i>"Ik heb vooral de code geschreven die data in en uit de database haalt. Alsook het testen van de 'test'-code en -database."</i></p>
                    </div>
                </div>
                <div class="card">
                    <div class="box">
                        <img src="img/teamfaces/Zinédine.jpg" alt="">
                        <div class="text">
                            Zinédine Bousba</div>
                        <p>
                            <i>"Ik heb geholpen met de queries en het opstellen van de database en de server."</i></p>
                    </div>
                </div>
                <div class="card">
                    <div class="box">
                        <img src="img/teamfaces/Unknown.png" alt="">
                        <div class="text">
                            Bowen Meyns</div>
                        <p>
                            <i>"Ik heb de code achter het sturen van e-mails geschreven. Daarnaast heb ik ook de vertaling van Nederlands naar Engels gedaan."</i></p>
                    </div>
                </div>
                <div class="card">
                    <div class="box">
                        <img src="img/teamfaces/Dylan.png" alt="">
                        <div class="text">
                            Dylan Saenen</div>
                        <p>
                            <i>"Voornamelijk bezig geweest met Scripts & Testen van Database."</i></p>
                    </div>
                </div>
                <div class="card">
                    <div class="box">
                        <img src="img/teamfaces/Jonas.jpg" alt="">
                        <div class="text">
                            Jonas Loete</div>
                        <p>
                            <i>"Ik heb vooral het project gemanaged door het Trello bord aan te maken en een blog te schrijven over ons gebruik met GitHub."</i></p>
                    </div>
                </div>
                <div class="card">
                    <div class="box">
                        <img src="img/teamfaces/Lucas.jpg" alt="">
                        <div class="text">
                            Lucas Vandenbussche</div>
                        <p>
                            <i>"Ik heb vooral gewerkt aan de databases meer specifiek user management plus de registratie van de sensor data."</i></p>
                    </div>
                </div>
                <div class="card">
                    <div class="box">
                        <img src="img/teamfaces/Maarten.jpg" alt="">
                        <div class="text">
                            Maarten Hostyn</div>
                        <p>
                            <i>"Ik heb de database opgezet en aangepast waar nodig. Waarna enkele ZigBee sensoren op een Mqtt-Broker ik test-data genereerde. Ook bood ik ondersteuning naar onze GitHub en hielp ik alles code centraal te krijgen."</i></p>
                    </div>
                </div>
                <div class="card">
                    <div class="box">
                        <img src="img/teamfaces/Mathias.jpg" alt="">
                        <div class="text">
                            Mathias Vermeersch</div>
                        <p>
                            <i>"Samen met ons team stond ik in voor de front/back-end van de gebruikers pagina."</i></p>
                    </div>
                </div>
                <div class="card">
                    <div class="box">
                        <img src="img/teamfaces/Mike.jpg" alt="">
                        <div class="text">
                            Mike Ntasinzira</div>
                        <p>
                            <i>"Verantwoordelijk voor het maken van een cookie om nieuwe user's hun voorkeuren op te slaan wanneer ze terug willen surfen naar de website."</i></p>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <?php include_once "php/html_elements.php"; get_html_footer_code(); ?>


    <script src="js/app.js"></script>
</body>

</html>