<?php
require_once('db_config.php');
include('functions.php'); // thx mathias om mijn leven iets gemakkelijker te maken

$post_api_key;
$post_value;
$post_sensor_id;
$database_api_key;
$database_value;
$database_sensor_id;

$user_id_user;
$user_id_sensor;

function check_apikey($api_key, $sensor_id)
{
    $connection = db_connect();

    if (!$connection) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $qry_user_id_user = "SELECT user.user_id FROM user WHERE user.api_key =`{$api_key}`; ";
    $qry_sensor_id_user = "SELECT sensor.user_id FROM sensor WHERE sensor.user_id =`{$sensor_id}`; ";

    $user_id_user =  mysqli_query($connection, $qry_user_id_user);
    $user_id_sensor =  mysqli_query($connection, $qry_sensor_id_user);

    mysqli_query($connection, $qry_user_id_user);

    db_disconnect($connection);

    if ($user_id_sensor == $user_id_user) {

        return true;
    } else {

        return false;
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (
        isset($_SERVER['QUERY_STRING'])
    ) {
        $connection = db_connect();

        parse_str(db_escape($connection, $_SERVER['QUERY_STRING']), $http_request_data);

        $api_key = $http_request_data['api_key'];
        $value = $http_request_data['value'];
        $sensor_id = $http_request_data['sensor_id'];

        if (
            check_apikey(
                $api_key,
                $sensor_id 
            )
        ){
            $qry_insert_sensor_data = "
            
            INSERT INTO data
            (
                `value`,
                `sensor_id`
                )
            VALUES
            (
                {$value},
                {$sensor_id}
            );
            
            ";

            if (mysqli_query($connection, $qry_insert_sensor_data)) {
                echo "New record created successfully<br>";
            } else {
                echo "Error: " . $qry_insert_sensor_data . "<br>" . mysqli_error($connection);
            }
        } else {

            echo "your api_key does not match<br>";
        }
    } else {

        echo "post data error";
    }
}
