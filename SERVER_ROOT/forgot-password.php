<?php require_once "php/controllerUserData.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Forgot Password | Connect.</title>
    <link rel="stylesheet" href="css/formStyle.css">
</head>
<body>
    <!-- Navbar start -->
    <nav class="navbar">
        <div class="max-width">
            <div class="logo">
                <a href="./index.php">IoT <span>Broker.</span></a>
            </div>
            <ul class="menu">
                <li><a href="./login-user.php" class="menu-btn">Login</a></li>
                 <li><a href="./signup-user.php" class="menu-btn">Register</a></li>
            </ul>
            <div class="menu-btn">
                <i class="fas fa-bars"></i>
            </div>
        </div>
    </nav>
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
</html>
