<?php

$error = NULL;

if(isset($_POST['submit'])){

  //Get form data
  $firstname = $_POST['firstname'];
  $lastname = $_POST['lastname'];
  $password = $_POST['password'];
  $password2 = $_POST['password2'];
  $email = $_POST['email'];
  

  if(strlen($firstname)<2){
    $error = "<p>Your firstname must be at least 2 characters</p>";
  }
  elseif(strlen($lastname)<5){
    $error = "<p>Your lastname must be at least 5 characters</p>";
  }
  elseif($password != $password2) {
    $error = "<p>Your passwords do not match</p>";
  }
  else{

    // de database login gegevens
    $dbhost = 'localhost';
    $dbuser = 'webuser';
    $dbpass = 'hFRfjCptDik9RQHH';
    $dbname = 'iotBrokerDB';

    // Verbinden met de database
    $connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
    
    //sanatise form data (zorg dat er geen sql comments in kunnen gestoken worden)
    $firstname = mysqli_real_escape_string($connection,$_POST['firstname']);
    $lastname = mysqli_real_escape_string($connection,$_POST['lastname']);
    $password = mysqli_real_escape_string($connection,$_POST['password']);
    $password2 = mysqli_real_escape_string($connection,$_POST['password2']);
    $email = mysqli_real_escape_string($connection,$_POST['email']);

    //generate Verificationkey
    $vkey = md5(time().$firstname);

    //generate api_key
    $apikey = uniqid();
    
    //secure password
    $password = md5 ($password);

    //insert account into the database
    $insert = "INSERT INTO user (firstname, lastname, password, email, vkey, api_key, status) VALUES ('{$firstname}','{$lastname}','{$password}','{$email}','{$vkey}','{$apikey}','verification_sent');";

    mysqli_query($connection,$insert);
    
    /*  php mail

    over te nemen van Bowen

    if($insert){
      $to = $email;
      $subject ="Email Verification";
      $message = "<a href='http://localhost/webprogramming3/IOT-broker/verify.php?vkey=$vkey'>Register account</a>";
      $headers = "From: IOT-broker@gmail.com \r\n";
      $headers .="MIME-Version: 1.0" . "\r\n";
      $headers .="Content-type:text/html;charset=UTF-8" . "\r\n";

      //mail($to,$subject,$message$headers); bekijk node-red uitleg van cursus
      //nog setup doen van mail (Bowen via phpmail)

      
    } else{
      //echo $connection->error;
    }
    */

    header('location: verification_sent.html');

    //close connection to database
    mysqli_close($connection);
  }
}
?>

<html lang="en">
  <head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins&display=swap">

    <title>IoT Broker Register</title>
  </head>

  <header>
    <img src="img/Logo-VIVES.png" alt="" class="logo">
    <nav>
      <ul class="nav_links">
        <li><a href="index.html">Home</a></li>
        <li><a href="#">xxx - pagina</a></li>
        <li><a href="#">xxx - pagina</a></li>
      </ul>
    </nav>
  </header>

  <body>
    <form method="POST" action ="">
      <table>
        <tr>
          <td> First name </td>
          <td><input type="TEXT" name="firstname" required/></td>   
        </tr>
        <tr>
          <td> Last name </td>
          <td><input type="TEXT" name="lastname" required/></td>   
        </tr>
        <tr>
          <td> Password: </td>
          <td><input type="PASSWORD" name="password" required/></td>   
        </tr>
        <tr>
          <td> Repeat Password </td>
          <td><input type="PASSWORD" name="password2" required/></td>   
        </tr>
        <tr>
          <td> Email address </td>
          <td><input type="EMAIL" name="email" required/></td>   
        </tr>
        <tr>
          <td> <input type="SUBMIT" name='submit' value="Register" required/></td>  
        </tr>
      </table>
    </form>  
  </body>

  <?php 
  echo $error

  ?>

</html>
