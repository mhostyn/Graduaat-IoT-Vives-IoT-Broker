<?php include ('server.php') ?>
<!DOCTYPE html>

<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" type="text/css" href="style.css">
  </head>
  
  <body>
    <main>
      <section class="landing">
        <nav>
          <img class="logo" src="images/Logo-VIVES.png" alt="Logo Vives" href="index.html">
          <h1 id="logo">IoT Broker</h1>
            <a href="register.php"> Register </a>
            <a href="login.php"> Login </a>
        </nav>
      </section>
    </main>
    <div class="login-box">
      <form method="POST" action="login.php">
      <h1>Login</h1>
      <div class="textbox">
        <i class="fas fa-user"></i>
        <input type="EMAIL" placeholder="e-mail" name="email" required/>
      </div>
      <div class="textbox">
        <i class="fas fa-lock"></i>
        <input type="PASSWORD" placeholder="password" name="password" required/>
      </div>

      <button type="SUBMIT" name="login_user" class="btn"> Login </button>
    
        <p> Not yet a member ? <a href="register.php"> Sign up </a>

    </div>
  </body>

</html>