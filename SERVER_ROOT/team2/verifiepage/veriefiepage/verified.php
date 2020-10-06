<?php

if(isset($_GET['vkey'])){
    //Process Verification
    $vkey = $_GET['vkey'];

    $connection = NEW MySQLi('test','test','test');

    $resultSet = $connection->query("SELECT veriefied, vkey FROM User WHERE status = 0 AND vkey='$vkey' LIMIT 1"); //status nog aan te passen aan database

    if($resultSet->num_rows == 1){
        //Validate the email
        $update = $connection->query("UPDATE User set status = 'verified' WHERE vkey = '$vkey' LIMIT 1");

        /* for testing 

        if($update){
            echo"account updated";
        } else { 
            echo $connection->error;
        }

        */

    } else{
        echo "This account is invalid or already verified";
    }
} else{
    die("Somthing went wrong");
}

    //drop result from database
    mysqli_free_result($resultSet);

    //close connection to database
    mysqli_close($connection);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style.css" rel="stylesheet">
    <title>verifiepage</title>
</head>
<body>
    
</body>
</html>