<?php  
function  createConfirmationmbox() {  
    echo '<script type="text/javascript"> ';  
    echo ' function openulr(newurl) {';  
    echo '  if (confirm("Are you sure you want to open new URL")) {';  
    echo '    document.location = newurl;';  
    echo '  }';  
    echo '}';  
    echo '</script>';  
}  
?>  
<! doctype html>  
<html>  
<head>  
<meta charset="utf-8">  
<title> javascript </title>  
<style>  
body {  
    background-color: green;  
}  
a {  
    font-size: 30px;  
    color: red;   
}  
.confirm {  
    margin: 100px;  
    color: red;  
}  
a.button1 {  
    display: inline-block;  
    padding: 0.35em 1.2em;  
    border: 0.1em solid #FFFFFF;  
    margin: 0 0.3em 0.3em 0;  
    border-radius: 0.12em;  
    box-sizing: border-box;  
    text-decoration: none;  
    font-family: 'Roboto',sans-serif;  
    font-weight: 300;  
    color: #FFFFFF;  
    text-align: center;  
    transition: all 0.2s;  
}  
a.button1:hover {  
    color: #000000;  
    background-color: #FFFFFF;  
}  
</style>  
<?php  
createConfirmationmbox();  
?>  
</head>  
<body>  
<center>  
<div class ="confirm">  
<strong>  <b> <a href="login.php" class="button1"> Login again.... </a> </b> </strong>  
</div>  
</center>  
</body>  
</html>  