<?php
require_once('db_config.php');

////////////////////////////////////////////////////////////////////////PHP
function is_post_request(){
    return $_SERVER['REQUEST_METHOD'] == 'POST';
}

function is_get_request(){
    return $_SERVER['REQUEST_METHOD'] == 'GET';
}

function redirect_to($location){
    header("location: " . $location);
    exit;
}

function html($string="") {
    return htmlspecialchars($string);
}

  
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

?>
