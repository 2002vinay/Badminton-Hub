
<?php
?>




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
    <title>Add Services</title>
    <link rel="stylesheet" href="padd.css" />
  </head>
  <body>
    <div class="maincontainer">
      <img src="/home4.jpg" alt="" />
    </div>
    <div class="imgcontainer">
      <p
        style="
          font-family: 'Ubuntu-Bold', sans-serif;
          color: white;
          font-size: 30px;
        "
      >
        Add Services
      </p>
    </div>
    <div class="imgcontainer1">
      <p
        style="
          font-family: 'Ubuntu-Bold', sans-serif;
          color: white;
          font-size: 20px;
        "
      >
        ***Please Enter all the service details here***
      </p>
    </div>
    <form action="addservice.php" method="post" enctype="multipart/form-data" >
      <div class="divcontainer">
        <div class="container">
          <input
            type="text"
            placeholder="Enter Service Name"
            name="sname"
            required
          />
        </div>
        <div class="container">
          <textarea
            name="description"
            id=""
            cols="50"
            rows="5"
            placeholder="Enter Service Description"
          ></textarea>
        </div>
        
        <div class="container">
          <input
            type="number"
            placeholder="Enter the cost in INR"
            name="cost"
            required
          />
        </div>
         <div class="container">
          <label
            for="img"
            style="color: white; font-size: large; padding-right: 10px"
            >Select image:</label
          >
          <input type="file" id="img" name="img" accept="image/*" />
        </div> 
          <button type="submit"><span></span>Add</button>
          <a
            href="admin.php"
            style="color: white; font-family: 'Ubuntu-Bold', sans-serif"
            >Back</a
          >
          
        </div>
      </div>
    </form>
  </body>
</html>
