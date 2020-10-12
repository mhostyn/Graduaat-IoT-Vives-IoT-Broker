<?php 
require_once('functions.php');

//--|CONNECT 
$connection = db_connect();

  //--|GET DATA FROM DATABASE
    //--|QUERY
      $query_select_all = "SELECT value FROM data";
    //--|QUERY SET TO VARIABLE
      $result_Set = mysqli_query($connection, $query_select_all);
    //--|FETCH TO ASSICIATIVE ARRAY
      $json_Data = mysqli_fetch_all($result_Set, MYSQLI_ASSOC);

//--|DUMP RESULT FROM MEMORY
mysqli_free_result($result_Set);


//--|CLOSE CONNECTION
db_disconnect($connection);

//--|SET THE RIGHT HEADERS (CORS POLICY)
header("Access-Control-Allow-Origin: http://127.0.0.1:8080");
header('Access-Control-Allow-Methods: GET');
header("Access-Control-Allow-Headers: Content-Type, Authorization");


//--|DISPLAY JSON WHEN GET REQUEST IS OFFERT
echo json_encode($json_Data);
?>
