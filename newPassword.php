<?php include_once ("controller.php");
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>
    <link rel="stylesheet" href="forgot.css">
</head>
<body>
<div id="container">
        <h3>Set New Password 🔑</h3>
        <!-- <p>It's quick and easy.</p> -->
        <div id="line"></div>
        <form action="newPassword.php" method="POST" autocomplete="off">
            <?php
            if ($errors > 0) {
                foreach ($errors as $displayErrors) {
            ?>
                    <div id="alert"><?php echo $displayErrors; ?></div>
            <?php
                }
            }
            ?>
            <input type="password" name="password" placeholder="Enter New Password" required><br>
            <input type="password" name="confirmPassword" placeholder="Confirm New Password" required><br>
            <input type="submit" name="changePassword" value="Save">
        </form>
    </div>
</body>
</html>