<?php

//include_once 'php/db_handler.php';

function get_sensor_types()
{

    $connection = db_connect();

    $element_id = 'sensor_types';
    $element_description = "Sensor Types";
    $element_label_class = "popup__form__label";
    $element_select_class = "popup__form__selector selector";
    $element_option_class = "popup__form__option selector";

    $query = '
    
        SELECT DISTINCT
            CONCAT(sensor.type, " - ", sensor.unit) AS SensorTypes
        FROM
            sensor;
    
    ';

    $result_set = mysqli_query($connection, $query);

    $options = '';

    while ($sensor_types = mysqli_fetch_assoc($result_set)) {

        $options .= '<option class=' . $element_option_class . ' value="' . $sensor_types["SensorTypes"] . '">' . $sensor_types["SensorTypes"] . '</option><br />';
    }

    $options .=       '<option class=' . $element_option_class . ' value="add_new_sensortype">Add new Sensortype</option><br />


    ';

    /* Add New Selection POPUP
    
    https://forums.asp.net/t/1589230.aspx?Textbox+popup+when+particular+selection+is+made+in+dropdown+menu+
    
    */




    $html_element = ' 
        
    <!--    Maarten

    █▓▒░▒▓█▓▒░▒▓█▓▒░▒▓█▓▒░▒▓█▓▒░▒▓█▓▒░▒▓█▓▒░▒▓█▓▒░▒▓█▓▒░▒▓█▓▒░▒▓█▓▒░▒▓█▓▒░▒▓█▓▒░▒▓█--!>
    
        <label class=' . $element_label_class . ' for="' . $element_id . '"> ' . $element_description . ' </label> 
        <select class=' . $element_select_class . ' name=" ' . $element_id . ' " id=" ' . $element_id . ' "> ' . $options . ' </select> 
        
    <!--    Maarten
    
    █▓▒░▒▓█▓▒░▒▓█▓▒░▒▓█▓▒░▒▓█▓▒░▒▓█▓▒░▒▓█▓▒░▒▓█▓▒░▒▓█▓▒░▒▓█▓▒░▒▓█▓▒░▒▓█▓▒░▒▓█▓▒░▒▓█--!>    ';

    return $html_element;

    db_disconnect($connection);
}


function get_sensor_types_raw()
{

    $connection = db_connect();

    $element_id = 'sensor_types';
    $element_description = "Sensor Types";
    $element_label_class = "popup__form__label";
    $element_select_class = "popup__form__selector selector";
    $element_option_class = "popup__form__option selector";

    $query = '
    
        SELECT DISTINCT
            CONCAT(sensor.type, ' - ', sensor.unit) AS SensorTypes
        FROM
            sensor
        ORDER BY SensorTypes ASC;
    
    ';

    $result_set = mysqli_query($connection, $query);

    $options = '';

    while ($sensor_types = mysqli_fetch_assoc($result_set)) {

        $options .= '<option class=' . $element_option_class . ' value="' . $sensor_types["SensorTypes"] . '">' . $sensor_types["SensorTypes"] . '</option><br />';
    }

    $options .=       '<option class=' . $element_option_class . ' value="add_new_sensortype">Add new Sensortype</option><br />


    ';

    /* Add New Selection POPUP
    
    https://forums.asp.net/t/1589230.aspx?Textbox+popup+when+particular+selection+is+made+in+dropdown+menu+
    
    */




    $html_element = ' 
        
    <!--    Maarten

    █▓▒░▒▓█▓▒░▒▓█▓▒░▒▓█▓▒░▒▓█▓▒░▒▓█▓▒░▒▓█▓▒░▒▓█▓▒░▒▓█▓▒░▒▓█▓▒░▒▓█▓▒░▒▓█▓▒░▒▓█▓▒░▒▓█--!>
    
        <label class=' . $element_label_class . ' for="' . $element_id . '"> ' . $element_description . ' </label> 
        <select class=' . $element_select_class . ' name=" ' . $element_id . ' " id=" ' . $element_id . ' "> ' . $options . ' </select> 
        
    <!--    Maarten
    
    █▓▒░▒▓█▓▒░▒▓█▓▒░▒▓█▓▒░▒▓█▓▒░▒▓█▓▒░▒▓█▓▒░▒▓█▓▒░▒▓█▓▒░▒▓█▓▒░▒▓█▓▒░▒▓█▓▒░▒▓█▓▒░▒▓█--!>    ';

    return $html_element;

    db_disconnect($connection);
}