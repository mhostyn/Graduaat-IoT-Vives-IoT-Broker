```php
<!-- op deze manier wordt de code als php gezien in Github -->

<!--TO DO LIST -->
  <!-- nog steeds te controleren met Database !!! -->
  <!-- api-key aan user koppelen -->
  
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
      //when form is valid
      //connect to the database
      $connection = NEW MySQLi('localhost','root','root','test'); //nog aan te passen aan database

      //sanatise form data (zorg dat er geen sql comments in username kunnen gestoken worden)
      $firstname = $connection->real_escape_string($firstname);
      $lastname = $connection->real_escape_string($lastname);
      $password = $connection->real_escape_string($password);
      $password2 = $connection->real_escape_string($password2);
      $email = $connection->real_escape_string($email);

      //generate Verificationkey
      $vkey = md5(time().$user_id);

      //insert account into the database     //meegeven aan database guys dat $user_id automatisch moet optellen
      $password = md5 ($password);
      $insert = $connection->query("INSERT INTO User VALUES('$firstname','$lastname','$password','$email','$vkey')");
      
      /* test
      if($insert){echo"succes";}
      else{ echo $connection->error;}
      */
      
      if($insert){
        $to = $email;
        $subject ="Email Verification";
        $message = "<a href='http://localhost/webprogramming3/IOT-broker/verify.php?vkey=$vkey'>Register account</a>";
        $headers = "From: IOT-broker@gmail.com \r\n";
        $headers .="MIME-Version: 1.0" . "\r\n";
        $headers .="Content-type:text/html;charset=UTF-8" . "\r\n";

        //mail($to,$subject,$message$headers); bekijk node-red uitleg van cursus
        //nog setup doen van mail (Bowen via phpmail)

        header('location: .php');//nog aan te maken pagina
      }

      else{
        echo $connection->error;
      }

      //drop result from database
      mysqli_free_result($resultSet);

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
    <a href="list.html" class="cta"><button>Log in</button></a>
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
