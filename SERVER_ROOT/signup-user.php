<?php require_once "php/controllerUserData.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    
    <title>Signup Form | Connect.</title>
    <link rel="stylesheet" href="css/formStyle.css">
</head>
<body>
    <!-- Navbar start -->
    <nav class="navbar">
        <div class="max-width">  
            <div class="logo">
                <a href="./index.php">IoT <span>Broker.</span></a>
            </div>
        </div>
    </nav>

    <!-- Signup form start -->
    <div class="container">
        <div class="form">
            <form action="signup-user.php" method="POST" autocomplete="">
                <h2 class="text-center">Signup Form</h2>
                <p class="text-center">It's quick and easy.</p>
                <?php if(count($errors) == 1){ ?>
                    <div class="alert alert-danger text-center">
                        <?php foreach($errors as $showerror){ echo $showerror; } ?>
                    </div>
                <?php }elseif(count($errors) > 1){ ?>
                    <div class="alert alert-danger">
                        <?php foreach($errors as $showerror){ ?>
                            <p><?php echo $showerror; ?></p>
                        <?php }?>
                    </div>
                <?php } ?>
                <div class="form-group">
                    <input class="form-control" type="text" name="firstname" placeholder="Firstname" required value="<?php echo $firstname ?>">
                </div>
                <div class="form-group">
                    <input class="form-control" type="text" name="lastname" placeholder="Lastname" required value="<?php echo $lastname ?>">
                </div>
                <div class="form-group">
                    <input class="form-control" type="email" name="email" placeholder="Email Address" required value="<?php echo $email ?>">
                </div>
                <div class="form-group">
                    <input class="form-control" type="password" name="password" placeholder="Password" required>
                </div>
                <div class="form-group">
                    <input class="form-control" type="password" name="cpassword" placeholder="Confirm password" required>
                </div>
                <div class="form-group">
                    <input class="form-control button" type="submit" name="signup" value="Signup">
                </div>
                <div class="link login-link text-center">Already a member? 
                    <a href="login-user.php">Login here</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>