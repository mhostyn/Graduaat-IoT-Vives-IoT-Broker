<?php
require_once('functions.php');
          //--|CONNECT TO DB
          $connection = db_connect();

          //--|HANDE POST REQUESTS
        if(is_post_request())
        {
            $name=mysqli_real_escape_string($connection,$_POST['name']);
            $type=mysqli_real_escape_string($connection,$_POST['type']);
            $unit=mysqli_real_escape_string($connection,$_POST['unit']);
            
            //--|QUERY
            $insert = "INSERT INTO sensor (name, type, unit, user_id) VALUES ('{$name}','{$type}','{$unit}', '2');";
            //--|PERFORM QUERY
            mysqli_query($connection,$insert);

           //--|CLOSE CONNECTION
           mysqli_close($connection);
          };

          //--|REDIRECT
        redirect_to('../index.php');

?>