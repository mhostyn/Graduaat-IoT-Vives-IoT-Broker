<?php require_once "php/controllerUserData.php"; ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title> Login | Connect.</title>
        <link rel="stylesheet" href="css/formStyle.css">
    </head>
    <body>
        
    <?php include "php/html_elements.php"; get_html_navbar_code(); ?>

        <!-- Signup form start -->
        <div class="container">
            <div class="row">
                <div class="form login-form">
                    <form action="login-user.php" method="POST" autocomplete="">
                        <h2>Login Form</h2>
                        <p>Login with your email and password.</p>

                        <?php if(count($errors) > 0){ ?>
                            <div class="alert alert-danger text-center">
                                <?php foreach($errors as $showerror){ echo $showerror; } ?>
                            </div>
                        <?php } ?>
                        
                        <div class="form-group">
                            <input class="form-control" type="email" name="email" placeholder="Email Address" required value="<?php echo $email ?>">
                        </div>
                        <div class="form-group">
                            <input class="form-control" type="password" name="password" placeholder="Password" required>
                        </div>
                        <div class="link forget-pass text-left">
                        <a href="forgot-password.php">Forgot password?</a> 
                        </div>
                        <div class="form-group">
                            <input class="form-control button" type="submit" name="login" value="Login">
                        </div>
                        <div class="link login-link text-center">Not yet a member? 
                        <a href="signup-user.php">Signup now</a> 
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>