<?php
include 'config.php';
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
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
      crossorigin="anonymous"
    />
    <title>Welcome | Admin</title>
    <link rel="stylesheet" href='addhome.css' />
  </head>
  <body>
    <div class="maincontainer">
      <img src="admin.jpg" alt="" height="100%" />
      <button
        style="
          font-family: 'Ubuntu-Bold', sans-serif;
          color: black;
          font-size: 15px;
        "
        class="profile"
      >
        <a href="profile">Profile</a>
      </button>
    </div>

    <div class="imgcontainer">
      <p
        style="
          font-family: 'Ubuntu-Bold', sans-serif;
          color: white;
          font-size: 30px;
        "
      >
        Welcome to The Badminton Hub
      </p>
      <p
        style="
          font-family: 'Ubuntu-Bold', sans-serif;
          color: white;
          font-size: 20px;
          padding-left: 60px;
        "
      >
        Hey Admin! You can manage the features here
      </p>
    </div>

    <div class="divcontainer">
      <div class="container">
      <form action="productadd.html">
          <button type="submit" class="btn btn-primary mt-4">
            Add Products  
          </button>
        </form>
        <form action="addservice.php">
          <button type="submit" class="btn btn-primary mt-4">
            Add Services
          </button>
        </form>
        <form action="showorders.php" method="get">
          <button type="submit" class="btn btn-primary mt-4">
            Orders placed
          </button>
        </form>
        <form action="bookedsevices.php">
          <button type="submit" class="btn btn-primary mt-4">
            Booked services
          </button>
        </form>
        <form action="modifyproducts.php">
          <button type="submit" class="btn btn-primary mt-4">
            Update or Delete Products
          </button>
        </form>
        <form action="showusers.php">
          <button type="submit" class="btn btn-primary mt-4">
            Show All users registered
          </button>
        </form>
      </div>
    </div>

    <script>
      function validate() {
        let pas1 = document.getElementById("pass1").value;
        let pas2 = document.getElementById("pass2").value;
        if (pas1 != pas2) {
          alert("Passwords are not Matching!!");
        }
      }
    </script>
  </body>
</html>