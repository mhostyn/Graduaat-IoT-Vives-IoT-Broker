<?php include ('server.php') ?>

<!DOCTYPE html>
<html class="register-html" lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Register | Connect.</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body class="register-body">
  <nav class="navbar">
        <div class="max-width">
          
            <div class="logo">
<a href="./index.html">IoT <span>Broker.</span></a></div>
<ul class="menu">
  <li><a href="./login.php" class="menu-btn">Login</a></li>
  <li><a href="./register.php" class="menu-btn">Register</a></li>
</ul>
<div class="menu-btn">
                <i class="fas fa-bars"></i>
            </div>
</div>
</nav>
    <div class="wrapper">
      <div class="title">Register Form</div>
      <form method="POST" action="register.php">
      <?php include('errors.php');?>
        <!-- Firstname -->
        <div class="field">
        <input type="TEXT" name="firstname" required/>
          <label>First name</label>
        </div>
        <!-- Lastname --> 
        <div class="field">
          <input type="text" name="lastname" required>
          <label>Last name</label>
        </div>
        <!-- Password -->
        <div class="field">
          <input type="password" name="password_1" required>
          <label>Password</label>
        </div>
        <!-- Password Comfirm -->
        <div class="field">
          <input type="password" name="password_2" required>
          <label>Password Comfirmation</label>
        </div>
        <!-- Email -->
        <div class="field">
          <input type="email" name="email" required>
          <label>Email</label>
        </div>
<div class="pass-link">
<a href="#">Forgot password?</a></div>
</div>
<div class="field">
          <input type="submit" name="submit" value="Register">
        </div>
<div class="signup-link">
Already a member? <a href="login.php">Login now</a></div>
</form>
</div>
</body>
</html>
