<?php
//--|START THE SESSION
session_start();

//--|STORE THE SESSION IN VARIABLES
$_SESSION["email"] = "joskev@e.mail";
$_SESSION["password"] = "26d01f0b3dcd7cbddb2de08c3a95a740";

/*
 $firstname = $_SESSION['firstname'];
 $email = $_SESSION['email'];
 $password = $_SESSION['password'];
 if($email != false && $password != false){
     $sql = "SELECT * FROM user WHERE email = '$email'";
     $run_Sql = mysqli_query($con, $sql);
     if($run_Sql){
         $fetch_info = mysqli_fetch_assoc($run_Sql);
         $status = $fetch_info['status'];
         $vkey = $fetch_info['vkey'];
         if($status == "verified"){
             if($vkey != 0){
                 header('Location: reset-code.php');
             }
         }else{
             header('Location: user-otp.php');
         }
     }
 }else{
     header('Location: login-user.php');
 }
*/
