<!DOCTYPE html>
<html>
<head>
    <title>Logout Confirmation</title>
    <style>
        /* CSS styles go here */
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
        }
        
        h1 {
            color: #333;
            text-align: center;
            margin-top: 50px;
        }
        
        .button-container {
            text-align: center;
            margin-top: 30px;
        }
        
        .button {
            padding: 10px 20px;
            font-size: 16px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-right: 10px;
        }
        
        .button:hover {
            background-color: #0056b3;
        }
    </style>
    <script>
        // JavaScript code remains unchanged
        function showConfirmation() {
            if (confirm("Do you really want to log out?")) {
                window.location.href = 'logout.php?confirm=yes';
            }
        }

        function showStayLoggedInConfirmation() {
            if (confirm("Are you sure you want to stay logged in?")) {
                window.history.back();
            }
        }
    </script>
</head>
<body>
    <?php
    session_start();
    
    if (isset($_SESSION['email'])) {
        if (isset($_GET['confirm']) && $_GET['confirm'] === 'yes') {
            $_SESSION = array();
            session_destroy();
            echo '<script>alert("Logged out successfully.");</script>';
            echo '<script>window.location.href = "main.html";</script>';
            exit();
        } elseif (isset($_GET['confirm']) && $_GET['confirm'] === 'no') {
            echo '<script>alert("You chose not to log out.");</script>';
        }
    } else {
        header("Location: login.php");
        exit();
    }
    ?>
    
    <h1>Do You Really Want To Log Out???</h1>
    
    <div class="button-container">
        <button class="button" onclick="showConfirmation()">Log Out</button>
        <button class="button" onclick="showStayLoggedInConfirmation()">Stay logged in</button>
    </div>
</body>
</html>
