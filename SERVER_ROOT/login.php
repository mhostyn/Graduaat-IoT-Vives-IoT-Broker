<?php include ('server.php') ?>

<!DOCTYPE html>
<html class="login-html" lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Login | Connect.</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body class="login-body">
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
      <div class="title">Login Form</div>
      <form method="POST" action="login.php">
        <div class="field">
          <input type="email" required>
          <label>Email Address</label>
        </div>
<div class="field">
          <input type="password" required>
          <label>Password</label>
        </div>
<div class="content">
          <div class="checkbox">
            <input type="checkbox" id="remember-me">
            <label for="remember-me">Remember me</label>
          </div>
<div class="pass-link">
<a href="#">Forgot password?</a></div>
</div>
<div class="field">
          <input type="submit" name="login_user" value="Login">
        </div>
<div class="signup-link">
Not a member? <a href="./register.php">Signup now</a></div>
</form>
</div>
</body>
</html>
