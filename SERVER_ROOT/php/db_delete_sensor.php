<?php
require_once('functions.php');

//--|CONNECT
$connection = db_connect();

//---|BUILD QUERY
if (is_post_request()) {
        if ($_POST["action"] == 'delete_sensor') {
                //--|REMOVE "/" FROM $_POST
                $sensor_id = db_escape($connection, rtrim($_POST["sensor_id"], "/"));
                //--|BUILD QUERY
                $delete_data = "DELETE FROM data WHERE sensor_id ={$sensor_id}; ";
                $delete_sensor = "DELETE FROM sensor WHERE sensor_id={$sensor_id}; ";
                //--|PERFORM QUERY
                mysqli_query($connection, $delete_data);
                mysqli_query($connection, $delete_sensor);
        }

        if ($_POST["action"] == 'delete_data') {
                //--|REMOVE "/" FROM $_POST
                $data_id = db_escape($connection, rtrim($_POST["data_id"], "/"));
                //--|BUILD QUERY
                $delete_data_id = "DELETE FROM data WHERE data_id ={$data_id}; ";
                //--|PERFORM QUERY
                mysqli_query($connection, $delete_data_id);
        }
}
//--|CLOSE CONNECTION
db_disconnect($connection);

//--|REDIRECT
redirect_to('../dashboard.php');

//--|TELL CHROME THIS IS THE END OF THE FILE (GOOD PRACTICE)
exit();
