```php
<!-- op deze manier wordt de code als php gezien in Github -->

<!--TO DO LIST -->
  <!-- nog steeds te controleren met Database !!! -->
  <!-- verified -> status, makkelijker gebruik van new, reset, in use -->
  <!-- wachtwoord vergeten toevoegen -->

<?php

$error = NULL;

if(isset($_POST['submit'])) {
    //connect to the database
    $connection = New MySQLi('localhost','root','root','test');   

    //get form data
    $email = $connection->real_escapce_string($_POST['email']);
    $password = $connection->real_escapce_string($_POST['password']);
    $password = md5($password);

    //querry the database
    $resultSet = $connection->query("SELECT * FROM User WHERE email = '$email' AND password = '$password' LIMIT 1");

    if($resultSet->num_rows !=0) {
        //process login
        $row = $resultSet->fetch_assoc();
        $verified = $row['verified'];
        $email = $row['email'];

        if($verified == 1) {
            //continue processing
            echo "your account is verified and you have been logged in";
            //doorsturen naar userpage 

        }else{
            $error = "This account has not yet been verified. An e-mail was sent to $email";
        }

    }else{
        //invalid credentials
        $error = "The e-mail or password you entered is incorrect";
    }

    //drop result from database
    mysqli_free_result($resultSet);

    //close connection to database
    mysqli_close($connection);
    
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

  <body>
    <form method="POST" action ="">
      <table>
        <tr>
          <td> Email address </td>
          <td><input type="EMAIL" name="email" required/></td>   
        </tr>

        <tr>
          <td> Password: </td>
          <td><input type="PASSWORD" name="password" required/></td>   
        </tr>

        <tr>
          <td> <input type="SUBMIT" name='submit' value="Login" required/></td>  
        </tr>
      </table>
    </form>  
  </body>

  <?php
  echo $error;
  ?>

</html>