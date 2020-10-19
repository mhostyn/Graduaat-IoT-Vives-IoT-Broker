
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/t2-style.css" />
    <link
      href="https://fonts.googleapis.com/css2?family=Heebo:wght@500;700&family=Lobster&display=swap"
      rel="stylesheet"
    />
    <title>CONNECT.</title>
  </head>
  <body>
    <main>
      <section class="landing">
        <nav>
          <img class="logo" src="img/Logo-VIVES.png" alt="">
          <h1 id="logo">IoT Broker</h1>
            <a href="register.php"> Register </a>
            <a href="login.php"> Log in </a>
        </nav>
      </section>
      
      <h2 class="big-text">Connect.</h2>

      <div class="content">
        <!-- notification message -->
        <?php if (isset($_SESSION['success'])) : ?>
          <div class="error success" >
            <h3>
              <?php 
                echo $_SESSION['success']; 
                unset($_SESSION['success']);
              ?>
            </h3>
          </div>
        <?php endif ?>

        <!-- logged in user information -->
        <?php  if (isset($_SESSION['firstname'])) : ?>
          <p>Welcome <strong><?php echo $_SESSION['firstname']; ?></strong></p>
          <p> <a href="index.php?logout='1'" style="color: red;">logout</a> </p>
        <?php endif ?>
      </div>

      <p class="uitleg">Welkom op onze IoT Broker website.
        Dit is een opdracht die we gekregen hebben binnen het vak Webdevelopment 3.
        De bedoeling van dit project is om als klas samen te werken en een werkende broker op te zetten. Dit wel zeggen
        dat gebruikers hun sensoren kunnen koppelen aan onze website en zo hun data kunnen bekijken.
        Dit project is bedoeld om ons het gevoel te geven hoe het er in de echte wereld aan toe gaat, de opdracht op
        zich
        is vaak niet de moeilijkheid maar wel het samenwerken.</p>

      
    </main>
    <div class="intro">
      <div class="intro-text">
        <h1 class="hide">
          <span class="text">Internet of things</span>
        </h1>
        <h1 class="hide">
          <span class="text">The broker</span>
        </h1>
        <h1 class="hide">
          <span class="text">Vives.</span>
        </h1>
      </div>
    </div>
    <div class="slider"></div>
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.5.1/gsap.min.js"
      integrity="sha512-IQLehpLoVS4fNzl7IfH8Iowfm5+RiMGtHykgZJl9AWMgqx0AmJ6cRWcB+GaGVtIsnC4voMfm8f2vwtY+6oPjpQ=="
      crossorigin="anonymous"
    ></script>
    <script src="js/app.js"></script>
  </body>
  <footer href="vivesinternetofthings.wordpress.com"> Onze Wordpresspagina </footer>
</html>