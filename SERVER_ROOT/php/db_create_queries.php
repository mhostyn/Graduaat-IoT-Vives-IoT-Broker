<?php 
//|||||||||||||||||||||||1
//--|SET GLOBAL VALUES TO DISPLAY IN THE CARD-DISPLAYER (NAME, ID, TIMESTAMP,....)1.1
// $selectAllQuery = "SELECT * FROM sensor ORDER BY sensor_id";
$selectAllQuery = 'SELECT S.* FROM sensor S, user U WHERE U.email = "'.$_SESSION["email"].'" AND U.password = "'.$_SESSION["password"].'" GROUP BY sensor_id';

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
// $selectAllSensorIdQuery = "SELECT sensor_id from sensor";
$selectAllSensorIdQuery = 'SELECT S.sensor_id from sensor S, user U WHERE U.email = "'.$_SESSION["email"].'" AND U.password ="'.$_SESSION["password"].'" GROUP BY sensor_id';

//--|PERFORM QUERY 3.2
$AllSensorIds = $this->setValues($selectAllSensorIdQuery);

//--|CREATE ROOM (ARRAY) FOR THE VALUES 3.3
$this->tableValues = array();
$this->tableIds = array();
$this->lastValue = array();

for($t = 0; $t <= (count($AllSensorIds) -1); $t ++){ //3.4

    //--|HANDLE DATATYPE ($ALLSENSORIDS) 3.4.1
    $lastTenString = strval($AllSensorIds[$t]["sensor_id"]);

    //--|GET THE RIGHT QUERY TO PUSH AS AN ELEMENT IN THE ARRAY 3.4.2
    // $selectLastTenQuery = "SELECT value FROM data WHERE sensor_id = {$lastTenString} LIMIT 10";
    $selectLastTenQuery = 'SELECT D.value FROM data D, User U WHERE sensor_id = '. $lastTenString .' AND U.email = "'.$_SESSION["email"].'" AND U.password ="'.$_SESSION["password"].'" GROUP BY data_id ORDER BY data_id DESC LIMIT 10';
    //--|PERFORM QUERY 3.4.3
    $lastTenToPush = $this->setValues($selectLastTenQuery);
    //--|PUSH DATA IN ARRAY 3.4.4
    array_push($this->tableValues, $lastTenToPush);
    
    //--|GET THE RIGHT QUERY TO PUSH AS AN ELEMENT IN THE ARRAY 3.4.5
    $last_value = 'SELECT D.value FROM data D, User U WHERE sensor_id = '. $lastTenString .' AND U.email = "'.$_SESSION["email"].'" AND U.password ="'.$_SESSION["password"].'" GROUP BY data_id ORDER BY data_id DESC LIMIT 1';
    //--|PERFORM QUERY 3.4.6
    $lastValueToPush = $this->setValues($last_value);
     //--|PUSH DATA IN ARRAY 3.4.7
    array_push($this->lastValue, $lastValueToPush);
//|||||||

     //--|GET THE RIGHT QUERY TO PUSH AS AN ELEMENT IN THE ARRAY 3.4.8
    // $tableIds = "select data_id from data where sensor_id = {$lastTenString} LIMIT 10";
    $tableIds = 'select D.data_id from data D, User U WHERE sensor_id = '. $lastTenString .' AND U.email = "'.$_SESSION["email"].'" AND U.password="'.$_SESSION["password"].'" GROUP BY data_id ORDER BY data_id DESC LIMIT 10;';
    //--|PERFORM QUERY 3.4.9
    $idsToPush = $this->setValues($tableIds);
    //--|PUSH DATA IN ARRAY 3.4.10
   array_push($this->tableIds, $idsToPush);
//|||||||

}
//|||||||||||||||||||||||


//||||||||||||||||||||||| 4
//--|GET AL THE DATA IDS  4.1
// $selectLastTenDataIDQuery = "SELECT data_id FROM data ORDER BY data_id DESC LIMIT 10";
$selectLastTenDataIDQuery = 'SELECT D.data_id FROM data D, User U WHERE U.email = "'.$_SESSION["email"].'" AND U.password="'.$_SESSION["password"].'" GROUP BY data_id ORDER BY data_id DESC LIMIT 10';

//--|PERFORM QUERY 4.2
$this->dataid = $this->setValues($selectLastTenDataIDQuery);
//|||||||||||||||||||||||

?>
