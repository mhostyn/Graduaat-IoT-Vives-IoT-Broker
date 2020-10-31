<?php
require_once('functions.php');
          //--|CONNECT TO DB
          $connection = db_connect();

          //--|HANDE POST REQUESTS
        if(is_post_request())
        {
            $name= db_escape($connection,$_POST['name']);
            $type= db_escape($connection,$_POST['type']);
            $unit= db_escape($connection,$_POST['unit']);
            

            $userId = $_SESSION["user_id"];
            //--|QUERY
            //--|USE LINE 17 WHEN TEAM 2 FINISHED SESSION FILE
            // $insert = "INSERT INTO sensor (name, type, unit, user_id) VALUES ('{$name}','{$type}','{$unit}', '{$userId}');";
            $insert = "INSERT INTO sensor (name, type, unit, user_id) VALUES ('{$name}','{$type}','{$unit}', '2');";
            //--|PERFORM QUERY
            mysqli_query($connection,$insert);

           //--|CLOSE CONNECTION
           mysqli_close($connection);
          };

          //--|REDIRECT
        redirect_to('../dashboard.php');

?>
