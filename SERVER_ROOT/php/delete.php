<?php
require_once('functions.php');

//--|CONNECT
$connection = db_connect();

//---|BUILD QUERY
 if(is_post_request()) {
        if($_POST["action"]=='delete'){
                //--|REMOVE "/" FROM $_POST
                $sensor_id = rtrim($_POST["sensor_id"], "/");
                //--|BUILD QUERY
                $delete_data = "DELETE FROM data WHERE sensor_id ={$sensor_id}; ";
                $delete_sensor = "DELETE FROM sensor WHERE sensor_id={$sensor_id}; ";
                //--|PERFORM QUERY
                mysqli_query($connection, $delete_data);
                mysqli_query($connection, $delete_sensor);
        }
}
//--|CLOSE CONNECTION
db_disconnect($connection);

//--|REDIRECT
redirect_to('../index.php');

//--|TELL CHROME THIS IS THE END OF THE FILE (GOOD PRACTICE)
exit();
?>