<?php 
//|||||||||||||||||||||||1
//--|SET GLOBAL VALUES TO DISPLAY IN THE CARD-DISPLAYER (NAME, ID, TIMESTAMP,....)1.1
$selectAllQuery = "SELECT * FROM sensor ORDER BY sensor_id";

//--|PERFORM QUERY 1.2
$this->values = $this->setValues($selectAllQuery);
//|||||||||||||||||||||||


//|||||||||||||||||||||||2
//--|SET A 'INDEX' VARIABLE EQUAL TO THE NUMBER OF CARDS (TO USE IN THE LOOPS) USE GLOBAL FOR HANDELING IN OTHER CLASSES 2.1
global $numberOfCards;
$numberOfCards = count($this->values);
//|||||||||||||||||||||||


//|||||||||||||||||||||||3
//--|GET AL SENSOR IDS TO PERFORM IN THE WHERE CLAUSULE ($SELECTLASTTENQUERY) 3.1
$selectAllSensorIdQuery = "SELECT sensor_id from sensor";

//--|PERFORM QUERY 3.2
$AllSensorIds = $this->setValues($selectAllSensorIdQuery);

//--|CREATE ROOM (ARRAY) FOR THE VALUE IN THE TABLES 3.3
$this->tableValues = array();

for($t = 0; $t <= (count($AllSensorIds) -1); $t ++){ //3.4

    //--|HANDLE DATATYPE ($ALLSENSORIDS) 3.4.1
    $lastTenString = strval($AllSensorIds[$t]["sensor_id"]);

    //--|GET THE RIGHT QUERY TO PUSH AS AN ELEMENT IN THE ARRAY 3.4.2
    $selectLastTenQuery = "SELECT value FROM data WHERE sensor_id = {$lastTenString} LIMIT 10";

    //--|PERFORM QUERY 3.4.3
    $lastTenToPush = $this->setValues($selectLastTenQuery);

    //--|PUSH DATA IN ARRAY 3.4.4
    array_push($this->tableValues, $lastTenToPush);
}
//|||||||||||||||||||||||



//||||||||||||||||||||||| 4
//--|GET AL THE DATA IDS  4.1
$selectLastTenDataIDQuery = "SELECT data_id FROM data ORDER BY data_id DESC LIMIT 10";
//--|PERFORM QUERY 4.2
$this->dataid = $this->setValues($selectLastTenDataIDQuery);
//|||||||||||||||||||||||


//                         GET SENSORS FROM USER_ID (SESSION) 

//                                                                                         1 is/must be equal to a user_id
// INSERT INTO sensor(name, type, unit, user_id) VALUES ('Temp7', 'temperatuursensor', '°C', 1);
//                                                                                         2 is/must be equal to a user_id
// INSERT INTO sensor(name, type, unit, user_id) VALUES ('Druk8', 'druksensor', 'bar', 2);
// INSERT INTO sensor(name, type, unit, user_id) VALUES ('patat9', 'pattatenmeter', 'boeren', 3);

//                                                 9 is/must be equal to a sensor_id
// INSERT INTO data(value, sensor_id) VALUES (250, 9);
//                                                 10 is/must be equal to a sensor_id
// INSERT INTO data(value, sensor_id) VALUES (650, 10);
// INSERT INTO data(value, sensor_id) VALUES (250500, 11);

// |||---MUST BE FILLED IN FIRST BEFORE PERFORMING THE OTHER QUERYS !!!
// INSERT INTO user(firstname, lastname, password, email, vkey, api_key, status) VALUES ('mat', 'Lioen', 20, 'stan', 'stanlioen@gmail.com', 'ozib','reset_requested');
// INSERT INTO user(firstname, lastname, password, email, vkey, api_key, status) VALUES ('blij', 'Lioen', 20, 'stan', 'stanlioen@gmail.com', 'ozib','reset_requested');
// INSERT INTO user(firstname, lastname, password, email, vkey, api_key, status) VALUES ('bom', 'Lioen', 20, 'stan', 'stanlioen@gmail.com', 'ozib','reset_requested');
?>