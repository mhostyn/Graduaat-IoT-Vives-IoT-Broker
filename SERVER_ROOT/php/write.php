<?php
require_once('db_config.php');

//Parameter 1 via GET in variabele waarde plaatsen
if (isset($_GET["api_key"])) {
    $varWaarde1 = $_GET["Api_key"];
} else {             //indien geen parameters opgegeven
    echo "ERROR no key defined in URL!";
    die();
}
echo $varWaarde1;

// Create connection
$conn = new mysqli(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connection successfully";


//querry uitvoeren
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $Sensorid = mysqli_real_escape_string($connection, $_POST['']);
    $Lichtsterkte = mysqli_real_escape_string($connection, $_POST['Lux']);
    $insert = "INSERT INTO sensor (Sensorid, Lichtsterkte) 
        VALUES (now(),'{$Sensorid}','{$Lichtstrekte}');";
    mysqli_query($connection, $insert);
}
$conn->close();
