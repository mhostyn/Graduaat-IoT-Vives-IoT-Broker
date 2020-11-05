<?php
// Turn off error messages in PHP               error_reporting(E_ERROR | E_PARSE); 

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

session_start();
require "db_handler.php";

$email = "";            //email of user
$firstname = "";        //firstname of user
$lastname = "";         //lastname of user
$password = "";          //password
$cpassword = "";         //confirmed password
$encpassword = "";        //encripted password
$vkey = "";               //verification key, also used for password reset, when vkey is used, vkey goes to "0"
$apikey = "";             //apikey for user
$errors = array();      //all the errors

//if user signup button
if (isset($_POST['signup'])) {
    $firstname = mysqli_real_escape_string($con, $_POST['firstname']);
    $lastname = mysqli_real_escape_string($con, $_POST['lastname']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);
    if ($password !== $cpassword) {
        $errors['password'] = "Confirm password not matched!";
    }

    $email_check = "SELECT * FROM user WHERE email = '$email'";
    $res = mysqli_query($con, $email_check);
    if (mysqli_num_rows($res) > 0) {
        $errors['email'] = "Email that you have entered is already exist!";
    }

    if (count($errors) === 0) {
        $encpassword = md5($password);
        $vkey = rand(9999999999, 1111111111);
        $apikey = uniqid();
        $status = "verification_sent";
        $insert_data = "INSERT INTO user (firstname, lastname, password, email, vkey, api_key, status) 
                        VALUES ('{$firstname}','{$lastname}','{$encpassword}','{$email}','{$vkey}','{$apikey}','{$status}');";
        echo ($insert_data);
        $data_check = mysqli_query($con, $insert_data);

        if ($data_check) {
            // Load Composer's autoloader
            require 'C:\Apache\htdocs\phpmailer\vendor\autoload.php';

            // Instantiation and passing `true` enables exceptions
            $mail = new PHPMailer(true);
            $recipient = $email;

            try {
                //Server settings
                $mail->SMTPDebug  = 0;                                      // Enable verbose debug output
                $mail->isSMTP();                                            // Send using SMTP
                $mail->Mailer     = "smtp";
                $mail->Host       = 'smtp.gmail.com';                       // Set the SMTP server to send through
                $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
                $mail->Username   = 'iot.broker.vives@gmail.com';           // SMTP username
                $mail->Password   = 'Vives2020*';                           // SMTP password
                $mail->SMTPSecure = "tls";                                  // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
                $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

                //Recipients
                $mail->setFrom('iot.broker.vives@gmail.com', 'Connect.');
                $mail->addAddress($recipient);                          // Who's the recipient?
                $body = "<p>Hello,</p><p>Thank you for your registration.</p><p>Here is the verification key: <b>{$vkey}</p></b>";
                $body .= "<p>You will need the verification key to log in to your account.</p><br></p><p>And here is the API: <b>{$apikey}</b></p>";
                $body .= "<p>An API key is a unique identifier for you and the device you will connect in this broker.</p>";
                $body .= "<p style='border-top:2px solid #eee; padding-top:1rem; color:#888; font-size:.8em'>If you did not register an account, you can ignore this e-mail. </p>";
                // Content
                $mail->isHTML(true);                                  // Set email format to HTML
                $mail->Subject = 'Registratie Connect.';
                $mail->Body    = $body;
                $mail->AltBody = strip_tags($body);                   // Backup so that the recipient sees something when HTML doesn't work for some reason

                $mail->send();

                $info = "We've sent a verification code to your email - $email";
                $_SESSION['info'] = $info;
                $_SESSION['email'] = $email;
                $_SESSION['password'] = $password;
                header('location: user-otp.php');
                exit();
            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
        } else {
            $errors['otp-error'] = "Failed while sending code!";
        }
    } else {
        $errors['db-error'] = "Failed while inserting data into database!";
    }
}

//if user click verification vkey submit button     //side note otp => One Time Password
if (isset($_POST['check'])) {
    $_SESSION['info'] = "";
    $otp_vkey = mysqli_real_escape_string($con, $_POST['vkey']);
    $check_vkey = "SELECT * FROM user WHERE vkey = '{$otp_vkey}';";
    $vkey_res = mysqli_query($con, $check_vkey);
    if (mysqli_num_rows($vkey_res) > 0) {
        $fetch_data = mysqli_fetch_assoc($vkey_res);
        $fetch_vkey = $fetch_data['vkey'];
        $email = $fetch_data['email'];
        $status = 'verified';
        $vkey = 0;                                                      //vkey naar 0 zetten om aan te duiden dat de vkey (als OTP) al gebruikt is
        $update_vkey = "UPDATE user SET vkey = '{$vkey}', status = '{$status}' WHERE vkey = '{$fetch_vkey}';";      //update vkey en status waar dat vkey = gefetchte vkey (oude eenmalig wachtwoord)
        $update_res = mysqli_query($con, $update_vkey);
        echo ($update_vkey);
        echo ($update_res);
        if ($update_res) {
            $_SESSION['firstname'] = $firstname;
            $_SESSION['email'] = $email;
            header('location: verification_sent.html');
            exit();
        } else {
            //for testing  $errors['otp-error'] = "Failed while updating code!";
        }
    } else {
        $errors['otp-error'] = "You've entered incorrect code!";
    }
}

//if user click login button
if (isset($_POST['login'])) {
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $encpassword = md5($password);
    $check_email = "SELECT * FROM user WHERE email = '{$email}'";
    $res = mysqli_query($con, $check_email);
    if (mysqli_num_rows($res) > 0) {
        $fetch = mysqli_fetch_assoc($res);
        $fetch_pass = $fetch['password'];
        if ($encpassword == $fetch_pass) {
            $_SESSION['email'] = $email;
            $_SESSION['password'] = $encpassword;
            $status = $fetch['status'];
            if ($status == 'verified') {
                $_SESSION['email'] = $email;
                echo ("to homepage");
                header('location: dashboard.php');
            } else {
                $info = "It's look like you haven't still verify your email - $email";
                $_SESSION['info'] = $info;
                header('location: user-otp.php');
            }
        } else {
            $errors['email'] = "Incorrect email or password!";
        }
    } else {
        $errors['email'] = "It's look like you're not yet a member! Click on the bottom link to signup.";
    }
}

//if user clicks continue button in forgot password form
if (isset($_POST['check-email'])) {
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $check_email = "SELECT * FROM user WHERE email='{$email}';";
    $run_sql = mysqli_query($con, $check_email);
    if (mysqli_num_rows($run_sql) > 0) {
        $vkey = rand(9999999999, 1111111111);
        $insert_vkey = "UPDATE user SET vkey = '{$vkey}' WHERE email = '{$email}';";
        $run_query =  mysqli_query($con, $insert_vkey);
        if ($run_query) {
            // Load Composer's autoloader
            require 'C:\Apache\htdocs\phpmailer\vendor\autoload.php';

            // Instantiation and passing `true` enables exceptions
            $mail = new PHPMailer(true);

            $recipient = $email;

            try {
                //Server settings
                $mail->SMTPDebug  = 0;                                      // Enable verbose debug output
                $mail->isSMTP();
                $mail->Mailer     = "smtp";                                 // Send using SMTP
                $mail->Host       = 'smtp.gmail.com';                       // Set the SMTP server to send through
                $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
                $mail->Username   = 'iot.broker.vives@gmail.com';           // SMTP username
                $mail->Password   = 'Vives2020*';                           // SMTP password
                $mail->SMTPSecure = "tls";                                  // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
                $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above


                //Recipients
                $mail->setFrom('iot.broker.vives@gmail.com', 'Connect.');
                $mail->addAddress($recipient);     // Who's the recipient?
                $body = "Your reset code is <b>{$vkey}<b>";

                // Content
                $mail->isHTML(true);                                  // Set email format to HTML
                $mail->Subject = 'Password reset code';
                $mail->Body    = $body;
                $mail->AltBody = strip_tags($body);                   // Backup so that the recipient sees something when HTML doesn't work for some reason

                $mail->send();
                $info = "We've sent a resetcode to your email - $email";
                $_SESSION['info'] = $info;
                $_SESSION['email'] = $email;
                header('location: reset-code.php');
            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
        } else {
            $errors['otp-error'] = "Failed while sending code!";
        }
    } else {
        $errors['email'] = "This email address does not exist!";
    }
}

//if user click check reset otp button
if (isset($_POST['check-reset-otp'])) {
    $_SESSION['info'] = "";
    $otp_vkey = mysqli_real_escape_string($con, $_POST['vkey']);
    $check_vkey = "SELECT * FROM user WHERE vkey = $otp_vkey";
    $vkey_res = mysqli_query($con, $check_vkey);
    if (mysqli_num_rows($vkey_res) > 0) {
        $fetch_data = mysqli_fetch_assoc($vkey_res);
        $email = $fetch_data['email'];
        $_SESSION['email'] = $email;
        $info = "Please create a new password that you don't use on any other site.";
        $_SESSION['info'] = $info;
        header('location: new-password.php');
        exit();
    } else {
        $errors['otp-error'] = "You've entered incorrect code!";
    }
}

//if user click change password button
if (isset($_POST['change-password'])) {
    $_SESSION['info'] = "";
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);
    if ($password !== $cpassword) {
        $errors['password'] = "Confirm password not matched!";
    } else {
        $vkey = 0;
        $email = $_SESSION['email'];                        //getting the email using session
        $encpassword = md5($password);
        $update_pass = "UPDATE user SET vkey = $vkey, password = '$encpassword' WHERE email = '$email'";
        $run_query = mysqli_query($con, $update_pass);
        if ($run_query) {
            $info = "Your password is changed. Now you can login with your new password.";
            $_SESSION['info'] = $info;
            header('Location: password-changed.php');
        } else {
            //for testing $errors['db-error'] = "Failed to change your password!";
        }
    }
}

//if login now button click
if (isset($_POST['login-now'])) {
    header('Location: login-user.php');
}
