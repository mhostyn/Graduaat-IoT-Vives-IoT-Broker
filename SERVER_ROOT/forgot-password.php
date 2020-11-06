<?php 
require_once "php/controllerUserData.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Forgot Password | Connect.</title>
    <link rel="stylesheet" href="css/formStyle.css">
</head>
<body>  
    <?php include_once "php/html_elements.php"; get_html_header_code(); ?>
    <!-- Signup form start -->
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4 form">
                <form action="forgot-password.php" method="POST" autocomplete="">
                    <h2 class="text-center">Forgot Password</h2>
                    <p class="text-center">Enter your email address</p>
                    <?php if(count($errors) > 0){  ?>
                        <div class="alert alert-danger text-center">
                            <?php  foreach($errors as $error){ echo $error; } ?>
                        </div>
                    <?php } ?>
                    <div class="form-group">
                        <input class="form-control" type="email" name="email" placeholder="Enter email address" required value="<?php echo $email ?>">
                    </div>
                    <div class="form-group">
                        <input class="form-control button" type="submit" name="check-email" value="Continue">
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
<?php /* include_once "php/html_elements.php"; get_html_footer_code(); */?>
</html>
