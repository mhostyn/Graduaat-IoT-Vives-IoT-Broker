<?php
require_once('db_config.php');

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
 } 

else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
else {
    echo "Wrong API Key provided.";
}
$conn->close();


$qry_user_id_user mysqli_query($con," SELECT `user.user_id` FROM user WHERE user.api_key = `{$post_api_key};`");
$qry_sensor_id_user mysqli_query($con," SELECT `sensor.user_id` FROM sensor WHERE sensor.user_id = `{$post_sensor_id};`");


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if($qry_user_id_user == $qry_sensor_id_user ) {
        $sensorid = test_input($_POST[""]);
        $lichtsterkte = test_input($_POST["lux"]);
       
        $sql = "INSERT INTO sensor (sensorid,lichtsterkte)
        VALUES NOW ('" . $sensorid . "',  '" . $lichtsterkte . "')";
        }
}
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} 
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>
