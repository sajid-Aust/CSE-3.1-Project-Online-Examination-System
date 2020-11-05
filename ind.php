<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Home1</title>
    </head>
    <body>
        <h2>This is the page</h2>
        <?php
        if(isset($_SESSION['success'])):?>
        <div>
            <h3>
                <?php
                echo $_SESSION['success'];
                unset($_SESSION['success']);
                ?>
            </h3>
       </div>
       <?php endif ?>
       <?php
       if(isset($_SESSION['username'])):?>
       <h3>Welcome<strong><?php echo $_SESSION['username'];?></strong>
       <button><a href="index.php" name="logout">Log Out</a></button>
    <?php endif ?>
    
    </body>
    </html>