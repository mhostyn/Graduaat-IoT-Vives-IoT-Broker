<?php require_once "php/controllerUserData.php"; ?>
<?php 
$email = $_SESSION['email'];
if($email == false){
  header('Location: login-user.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create a New Password | Connect.</title>
    <link rel="stylesheet" href="css/formStyle.css">
</head>

<?php 
/* include_once "php/html_elements.php"; get_html_header_code(); */
?>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4 form">
                <form action="new-password.php" method="POST" autocomplete="off">
                    <h2 class="text-center">New Password</h2>
                    <?php if(isset($_SESSION['info'])){ ?>
                        <div class="alert alert-success text-center">
                            <?php echo $_SESSION['info']; ?>
                        </div>
                    <?php } ?>
                    <?php if(count($errors) > 0){ ?>
                        <div class="alert alert-danger text-center">
                            <?php foreach($errors as $showerror){ echo $showerror; } ?>
                        </div>
                    <?php } ?>
                    <div class="form-group">
                        <input class="form-control" type="password" name="password" placeholder="Create new password" required>
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="password" name="cpassword" placeholder="Confirm your password" required>
                    </div>
                    <div class="form-group">
                        <input class="form-control button" type="submit" name="change-password" value="Change">
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
<?php /* include_once "php/html_elements.php"; get_html_footer_code(); */?>
</html>
