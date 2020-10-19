<?php
    // de database login gegevens
    
    $dbhost = 'localhost';
    $dbuser = 'webuser';
    $dbpass = 'hFRfjCptDik9RQHH';
    $dbname = 'iotBrokerDB';



define("DB_SERVER", $dbhost);
define("DB_USER", $dbuser);
define("DB_PASS", $dbpass);
define("DB_NAME", $dbname);




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






