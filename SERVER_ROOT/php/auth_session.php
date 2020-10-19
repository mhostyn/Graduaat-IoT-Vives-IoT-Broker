<!-- notification message -->
<?php if (isset($_SESSION['success'])) : ?>
    <div class="error success" >
    <h3>
        <?php 
        echo $_SESSION['success']; 
        unset($_SESSION['success']);
        ?>
    </h3>
    </div>
<?php endif ?>

<!-- logged in user information -->
<?php  if (isset($_SESSION['firstname'])) : ?>
    <p>Welcome <strong>
        <?php echo $_SESSION['firstname']; ?>
    </strong></p>
    <p> <a href="index.php?logout='1'" style="color: red;">Logout</a> </p>
<?php endif ?>