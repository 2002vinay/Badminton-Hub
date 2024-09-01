<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="home.css">
    <title>Cart</title>
    <style>
      body {
        margin: 0;
        padding: 0;
        background-color: rgb(177, 177, 177);
        font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto,
          Oxygen, Ubuntu, Cantarell, "Open Sans", "Helvetica Neue", sans-serif;
      }
      ol,
      ul {
        list-style: none;
      }
      a {
        color: white;
        text-decoration: none;
      }
      a:hover {
        color: white;
      }
      #mainMenu li {
        padding-left: 20px;
        padding-top: 15px;
      }
      #mainMenu {
        display: flex;
        flex-direction: row;
      }
      .navbar-container {
        background-color: black;
        color: white;
        display: flex;
        flex-direction: row;
        margin-bottom: 0;
      }
      .navbar-container header p {
        margin-left: 20px;
        font-size: 25px;
      }
      .small-container {
        display: flex;
        align-items: center;
        justify-content: center;
      }
      .cartpage {
        margin: 0;
  padding: 0;
      }
      .cart-info {
        display: flex;
        flex-wrap: wrap;
      }
      .header {
        width: 100%;
        display: flex;
        align-items: flex-start;
        justify-content: space-between;
      }
      table {
        font-family: "Roboto", sans-serif;
        border-collapse: collapse;
        width: 100%;
      }
      th {
        background-color: #303f9f;
        color: white;
        font-weight: bold;
        padding: 15px;
        text-align: left;
      }
      td {
        border-bottom: 1px solid #ddd;
        padding: 15px;
        text-align: left;
      }
      tr:nth-child(even) {
        background-color: #f2f2f2;
      }
      .empty-orders {
        text-align: center;
        padding: 20px;
        font-style: italic;
        color: #999;
        font-size: 18px;
      }
      .profile-button {
    position: absolute;
    left: 90%;
    background-color: rgba(252, 215, 92, 0.979) ;
    border-radius: 25px;
    padding: 10px;
   
  }
  
  .profile-button a {
    
    color: black;
    margin-bottom: 10px;
     text-align: center;
     font-size: 17px;
     font-weight:bold; 

  }
    </style>
  </head>
  <body>
    <div class="navbar-container">
      <header>
        <p>The Badminton Hub</p>
      </header>
      <nav>
        <ul id="mainMenu">
          <li>
            <a href="home.php">Home</a>
          </li>
          <li><a href="services.php">Services</a></li>
          <li><a href="products.php">Products</a></li>
          <li><a href="orders.php"><strong>Orders</strong></a></li>
          <li><a href="cart.php">Cart</a></li>
          <li style="position: absolute; left: 90%">
          <li class="profile-button">
  <a href="profile.php">Profile</a>
</li>
          </li>
        </ul>
      </nav>
    </div>
    <div class="cartpage">
      <?php
     @include 'config.php';
     session_start();
     
     if (isset($_SESSION['email'])) {
       $userEmail = $_SESSION['email'];
     
       $select = "SELECT * FROM payment1 WHERE email = '$userEmail'";
       $result = mysqli_query($conn, $select);
     
       if (mysqli_num_rows($result) > 0) {
         ?>
         <div class="header">
           <h2>Your Orders</h2>
         </div>
         <div class="cart-info">
           <table>
             <tr>
               <th>Product Name</th>
               <th>Price</th>
               <th>Ordered Date</th>
               <th>Payment ID</th>
               <th>Status</th>
             </tr>
             <?php
             while ($data = mysqli_fetch_assoc($result)) {
               ?>
               <tr>
                 <td><?php echo $data['fname']; ?></td>
                 <td><?php echo $data['lname']; ?></td>
                 <td><?php echo $data['o_date']; ?></td>
                 <td><?php echo $data['id'] ?></td>
                 <td><?php echo $data['delivery_stat'] ?></td>
               </tr>
               <?php
             }
             ?>
           </table>
         </div>
         <?php
       } else {
         ?>
         <div class="empty-orders">
           No Orders!!!
         </div>
         <?php
       }
     } else {
       // Handle the case when the email session variable is not set
     }
     ?>
    </div>
  </body>
</html>
