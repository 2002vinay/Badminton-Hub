<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300&display=swap"
      rel="stylesheet"
    />
    <title>Create Profile</title>
    <link rel="stylesheet" href="register.css" />
  </head>
  <body>
    <div class="maincontainer">
      <img src="download.jpg" alt="" />
    </div>
    <div class="imgcontainer">
      <p
        style="
          font-family: 'Ubuntu-Bold', sans-serif;
          color: white;
          font-size: 30px;
        "
      >
        Create profile
      </p>
    <form action="register.php"  method="post">
     
      </div>
      <div class="line"></div>
      <div class="divcontainer">
        <div class="container">
          <input
            type="text"
            placeholder="Enter Username"
            name="name"
            required
          />

          

          <input
            type="email"
            placeholder="Enter Email ID"
            name="email"
            required
          />
          <input type="date" name="date" required />
          <input
            type="number"
            placeholder="Enter Phone number"
            name=phnum
            pattern="[789][0-9]{9}" title="please enter correct format"
            required
          />
          <input
            id="pass1"
            type="password"
            placeholder="Enter Password"
            name="password"
            pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"
            required
          />
          <input
            id="pass2"
            type="password"
            placeholder="confirm password"
            name="cpassword"
             title="Enter same as above"
            required
          />
          <textarea
            name="address"
            id=""
            cols="50"
            rows="5"
            placeholder="Enter Address"
          ></textarea>

          <input  type="submit" name="create" value="Create">
          <a
            href="login.html"
            style="color: white; font-family: 'Ubuntu-Bold', sans-serif"
            >Already created?</a>
        </div>
      </div>

   
    
  </body>
</html>


<?php
@include 'config.php';

if(isset($_POST['create'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $date = mysqli_real_escape_string($conn,$_POST['date']);
   $number = mysqli_real_escape_string($conn,$_POST['phnum']);
   $pass = mysqli_real_escape_string($conn,$_POST['password']);
   $cpass = mysqli_real_escape_string($conn,$_POST['cpassword']);
   $address = mysqli_real_escape_string($conn,$_POST['address']);
  
   $user = 'user';

   $error = array(); // Initialize error array

   // Check if email already exists
   $select = "SELECT * FROM register WHERE email = '$email' && password = '$pass'";
   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){
      $error['email'] = 'User already exists!';
   }

   //inserting into table
      $insert = "INSERT INTO register(name,email,date,phnum,password,cpassword,address,user_type) VALUES('$name','$email','$date','$number','$pass','$cpass','$address','$user')";
      mysqli_query($conn, $insert);
      $error ='<div class="Registration successful!!" role="alert">Success</div>';

      header('location:home.php');  

}  
   
//}
?>

