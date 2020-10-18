<?php include ('server.php') ?>
<!DOCTYPE html>

<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins&display=swap">
    <title>IoT Broker Register</title>
  </head>

  <main>
      <section class="landing">
        <nav>
          <img class="logo" src="images/Logo-VIVES.png" alt="Logo Vives" href="index.html">
          <h1 id="logo">IoT Broker</h1>
            <a href="register.php"> Register </a>
            <a href="login.php"> Log in </a>
        </nav>
      </section>
    </main>

    <body>
        <form method="POST" action="register.php">
        <?php include('errors.php');?>
            <div class="textbox">
                <input placeholder="firstname" type="TEXT" name="firstname" value="<?php echo $firstname; ?>" required/> 
            </div>
            <div class="textbox">
                <input placeholder="lastname" type="TEXT" name="lastname" value="<?php echo $lastname; ?>" required/>
            </div>
            <div class="textbox">
                <input placeholder="password" type="PASSWORD" name="password_1" value="<?php echo $password; ?>" required/>
            </div>
            <div class="textbox">
                <input placeholder= "confirm password" type="PASSWORD" name="password_2" value="<?php echo $password; ?>" required/>
            </div>
            <div class="textbox">
                <input placeholder= "email" type="EMAIL" name="email" value="<?php echo $email; ?>" required/>
            </div>
            <button type="SUBMIT" class="btn" name='submit' required>  Register </button> 
            <p> Already a member ? <a href="login.php"> Sign in </a>  </p>
        </form> 
    </body>
</html>