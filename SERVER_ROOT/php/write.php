<?php
require_once('db_config.php');

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connection successfully";


//querry uitvoeren
    if($_SERVER['REQUEST_METHOD']=='POST')
    {
        $Sensorid=mysqli_real_escape_string($connection,$_POST['']);
        $Lichtsterkte=mysqli_real_escape_string($connection,$_POST['Lux']);
        $insert = "INSERT INTO sensor (Sensorid, Lichtsterkte,)
        WHERE user_id ='d34db33f11111';
        VALUES (now(),'{$Sensorid}','{$Lichtstrekte}');";
         mysqli_query($connection,$insert);
        
    }  
   
    if else($_SERVER['REQUEST_METHOD']=='POST')
    {
        $Sensorid=mysqli_real_escape_string($connection,$_POST['']);
        $Lichtsterkte=mysqli_real_escape_string($connection,$_POST['Lux']);
        $insert = "INSERT INTO sensor (Sensorid, Lichtsterkte,)
        WHERE user_id ='d34db33f22222';
        VALUES (now(),'{$Sensorid}','{$Lichtstrekte}');";
         mysqli_query($connection,$insert);
        
    }  

    $conn->close();
?>

