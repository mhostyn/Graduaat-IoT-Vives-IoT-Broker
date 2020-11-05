<?php
require_once('functions.php');

//--|CONNECT 
$connection = db_connect();

//--| GET THE PASSED IN VARIABLE FROM JS
$sensor_id = $_GET['sensor_id'];

if (is_get_request()) {
    //--|BUILD QUERY
    $send_table_data = "SELECT value FROM data WHERE sensor_id={$sensor_id}; ";
    //--|PERFORM QUERY
    $result_Set = mysqli_query($connection, $send_table_data);

    $json_data = mysqli_fetch_all($result_Set, MYSQLI_ASSOC);

    mysqli_free_result($result_Set);
    //--|DISPLAY JSON WHEN GET REQUEST IS OFFERT
    echo json_encode($json_data);
}


//--|CLOSE CONNECTION
db_disconnect($connection);

//--|SET THE RIGHT HEADERS (CORS POLICY)
header("Access-Control-Allow-Origin: http://127.0.0.1:8080");
header('Access-Control-Allow-Methods: GET');
header("Access-Control-Allow-Headers: Content-Type, Authorization");
