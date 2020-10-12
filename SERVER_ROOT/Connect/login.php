<?php

$error = NULL;

if(isset($_POST['submit'])) {

  // de database login gegevens
  $dbhost = 'localhost';
  $dbuser = 'webuser';
  $dbpass = 'hFRfjCptDik9RQHH';
  $dbname = 'iotBrokerDB';

  // Verbinden met de database
  $connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

  //create empty variables
  $email = "";
  $password = "";
  $error = "";

  //get form data
  $email = mysqli_real_escape_string($connection,$_POST['email']);
  $password = mysqli_real_escape_string($connection,$_POST['password']);
  $password = md5($password);

  //querry the database
  $query = "SELECT * FROM user WHERE email = '$email' AND password = '$password' LIMIT 1";

  // get query from database
  $result_set = mysqli_query($connection,$query);

  if($result_set->num_rows !=0) {

    if($verified = 'veriefied') {
      //continue processing
      echo "your account is verified and you have been logged in";
      //doorsturen naar userpage 
      //locatie van userpage nog invullen
      header("location:voorbeeld.html") ;      
    }else{
      $error = "This account has not yet been verified. An e-mail was sent to $email";
    }

  }else{
    //invalid credentials
    $error = "The e-mail or password you entered is incorrect";
  }

  //drop result from database
  mysqli_free_result($result_set);

  //close connection to database
  mysqli_close($connection);
  
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="style.css">
  </head>
  
  <body>
    <div class="login-box">
      <h1>Login</h1>
      <div class="textbox">
        <i class="fas fa-user"></i>
        <input type="EMAIL" placeholder="e-mail" name="email" required/>
      </div>

      <div class="textbox">
        <i class="fas fa-lock"></i>
        <input type="PASSWORD" placeholder="password" name="password" required/>
      </div>

      <input type="SUBMIT" name="submit" class="btn" value="submit">

      <span class = "error"> <?php echo $error;?> </span>

    </div>
  </body>

</html>
