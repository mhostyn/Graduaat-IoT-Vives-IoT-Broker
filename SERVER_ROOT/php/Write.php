<?php
    // de database login gegevens
    $dbhost = 'localhost';
    $dbuser = 'webuser';
    $dbpass = 'hFRfjCptDik9RQHH';
    $dbname = 'iotbrokerdb';

    // Verbinden met de database
    $connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

    // Is het een POST request?
    if($_SERVER['REQUEST_METHOD']=='POST')
    {
        $temp=mysqli_real_escape_string($connection,$_POST['Temp']);
        $insert = "INSERT INTO sensor (Bewegingssensor 2) 
        VALUES (now(),'{$lux}');";
         mysqli_query($connection,$insert);
        
    }  

    // De verbinding met de database afsluiten
    mysqli_close($connection);
?>