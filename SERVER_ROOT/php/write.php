<?php
require_once('db_config.php');


$api_key_uservalue1 = "d34db33f11111";
$api_key_uservalue2 = "d34db33f22222";

$api_key= $sensor = $location = $value1 = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $api_key = test_input($_POST["api_key"]);
    if($api_key == $api_key_uservalue1) {
        $sensorid = test_input($_POST[""]);
        $lichtsterkte = test_input($_POST["lux"]);
       
        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } 
        
        $sql = "INSERT INTO sensor (sensorid,lichtsterkte)
        VALUES ('" . $sensorid . "',  '" . $lichtsterkte . "')";
        
        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } 
        else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    
        $conn->close();
    }
   
    if else ($_SERVER["REQUEST_METHOD"] == "POST") {
        $api_key = test_input($_POST["api_key"]);
        if($api_key == $api_key_uservalue2) {
            $sensorid = test_input($_POST[""]);
            $lichtsterkte = test_input($_POST["lux"]);
           
            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);
            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            } 
            
            $sql = "INSERT INTO sensor (sensorid,lichtsterkte)
            VALUES ('" . $sensorid . "',  '" . $lichtsterkte . "')";
            
            if ($conn->query($sql) === TRUE) {
                echo "New record created successfully";
            } 
            else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        
            $conn->close();
        }
    else {
        echo "Wrong API Key provided.";
    }

}
else {
    echo "No data posted with HTTP POST.";
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
