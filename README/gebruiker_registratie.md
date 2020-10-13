# Deel 4 – Registratie gebruiker

```php
<?php
$error = NULL;

if(isset($_POST['submit'])){

    //Get form data
    $user_id = $_POST['username'];
    $password1 = $_POST['password1'];
    $password2 = $_POST['password2'];
    $email = $_POST['email'];
    

    if(strlen($use_idr)<5){
      $error = "<p>Your username must be at least 5 characters</p>";
    }
    elseif($password1 != $password2) {
      $error = "<p>Your passwords do not match</p>";
    }
    else{
      //form is valid

      //connect to the database
      $mysqli = NEW MySQLi('localhost','root','root','test'); //nog aan te passen aan datbase

      //sanatise form data (zorg dat er geen sql comments in username kunnen gestoken worden)
      $firstname = $mysqli->real_escape_string($firstname);
      $lastname = $mysqli->real_escape_string($lastname);
      $password = $mysqli->real_escape_string($password);
      $password2 = $mysqli->real_escape_string($password2);
      $email = $mysqli->real_escape_string($email);

      //generate Verificationkey
      $vkey = md5(time().$user_id);

      //insert account into the database     //meegeven aan database guys dat $user_id automatisch moet optellen
      $password = md5 ($password1);
      $insert = $mysqli->query("INSERT INTO User VALUES('$firstname','$lastname','$password','$email','$vkey')");
      
      /* test
      if($insert){echo"succes";}
      else{ echo $mysqli->error;}
      */
      
      if($insert){
        $to = $email;
        $subject ="Email Verification";
        $message = "<a href='http://localhost/webprogramming3/IOT-broker/verify.php?vkey=$vkey'>Register account</a>";
        $headers = "From: IOT-broker@gmail.com \r\n";
        $headers .="MIME-Version: 1.0" . "\r\n";
        $headers .="Content-type:text/html;charset=UTF-8" . "\r\n";

        //mail($to,$subject,$message$headers); bekijk node-red uitleg van cursus

        header('location:thankyou.php');
      }

      else{
        echo $mysqli->error;
      }
      
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
          <td> Username: </td>
          <td><input type="TEXT" name="username" required/></td>   
        </tr>
        <tr>
          <td> Password: </td>
          <td><input type="PASSWORD" name="password1" required/></td>   
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
```


[Readme](/README.md)
