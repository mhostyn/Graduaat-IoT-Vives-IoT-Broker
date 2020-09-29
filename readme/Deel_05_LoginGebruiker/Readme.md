# Deel 5 – Login gebruiker

## Doel 1

Uw uitleg

```php
<?php

//volledig aanpassen aan database

//toevoegen van firstname, lastname (los van user_id)
//api-key aan user koppelen
//verified -> status, makkelijker gebruik van new, reset, in use.
//wachtwoord vergeten toevoegen


$error = NULL;

if(isset($_POST['submit'])) {
    //connect to the database
    $mysqli = NEW MySQLi('localhost','root','root','test');   

    //get form data
    $email = $mysqli->real_escapce_string($_POST['email']);
    $password = $mysqli->real_escapce_string($_POST['password']);
    $password = md5($password);

    //querry the database
    $resultSet = $mysqli->query("SELECT * FROM account WHERE email = '$email' AND password = '$password' LIMIT 1");

    if($resultSet->num_rows !=0) {
        //process login
        $row = $resultSet->fetch_assoc();
        $verified = $row['verified'];
        $email = $row['email'];

        if($verified ==1) {
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

    <?php
    echo $error;
    ?>
  </body>
</html>
```

## Doel 2

Link naar extra info

[link](/README.md)

---

[Home](/README.md)
