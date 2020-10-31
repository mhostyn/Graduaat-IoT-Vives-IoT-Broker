<?php

include "db_config.php";

////////////////////////////////////////////////////////////////////////SQL
function db_connect(){
    $connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
    return $connection;
};

//Disconnect DB
function db_disconnect($connection){
    if(isset($connection)){
    mysqli_close($connection);
}};

function db_escape($connection, $string){
    return mysqli_real_escape_string($connection, $string);
}

