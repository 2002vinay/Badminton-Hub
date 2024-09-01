<?php include_once ("controller.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OTP Verification Form</title>
    <link rel="stylesheet" href="otp.css">
</head>
<body>
    <div id="container">
        <h3>Email Verification</h3>
        <!-- <p>It's quick and easy.</p> -->
        <div id="line"></div>
        <form action="verifyEmail.php" method="POST" autocomplete="off">
            <?php
            if(isset($_SESSION['message'])){
                ?>
                <div id="alert"><?php echo $_SESSION['message']; ?></div>
                <?php
            }
            ?>

            <?php
            if($errors > 0){
                foreach($errors AS $displayErrors){
                ?>
                <div id="alert"><?php echo $displayErrors; ?></div>
                <?php
                }
            }
            ?>      
            <input type="number" name="OTPverify" placeholder="Enter 6 digit OTP" required><br>
            <input type="submit" name="Resend" value="Resend">
            <input type="submit" name="verifyEmail" value="Verify">
            
        </form>
    </div>
</body>
</html>