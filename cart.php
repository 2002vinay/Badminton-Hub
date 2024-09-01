
<?php
session_start();
include 'config.php';

if (isset($_SESSION['email'])) {
  $userId = $_SESSION['email'];
  
  // Delete functionality
  if (isset($_POST['delete'])) {
    $delete = $_POST['cdelete'];

    // Retrieve the quantity from the cart1 table
    $select_query = "SELECT pquantity FROM cart1 WHERE pname = '$delete' AND email = '$userId'";
    $select_result = mysqli_query($conn, $select_query);
    $cart_data = mysqli_fetch_assoc($select_result);

    if ($cart_data) {
      $quantity = $cart_data['pquantity'];
      $select_query = "SELECT pquantity FROM products WHERE pname = '$delete'";
      $result = mysqli_query($conn, $select_query);
      $select = mysqli_fetch_assoc($result);
      $updatedq = intval($select['pquantity']) + intval($quantity);
      $update_query = "UPDATE products SET pquantity = $updatedq WHERE pname = '$delete'";
      mysqli_query($conn, $update_query);

      $delete_query = "DELETE FROM cart1 WHERE pname = '$delete' AND email = '$userId'";
      mysqli_query($conn, $delete_query);
      // Rest of your code here...
    } else {
      // Handle the case when no rows are found
    }
    // Update the products table with the retrieved quantity
  }

  $query = "SELECT * FROM cart1 WHERE email='$userId'";
  $result = mysqli_query($conn, $query);
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <title>Cart</title>
  <link rel="stylesheet" href="home.css">
  <link rel="stylesheet" href="./../../fonts/Poppins-Medium.ttf">
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
      margin: 80px auto;
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
      width: 100%;
      border-collapse: collapse;
      background-color: white; 
    }

    th,
    td {
      padding: 10px;
      text-align: left;
      border-bottom: 1px solid #ddd;
    }

    .table-header {
      background-color: #333;
      color: white;
    }

    .btn {
      background-color: #333;
      color: white;
      border: none;
      padding: 5px 10px;
      cursor: pointer;
    }

    .btn:hover {
      background-color: #555;
    }

    tr:nth-child(even) {
      background-color: white;
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
        <li><a href="orders.php">Orders</a></li>
        <li><a href="cart.php"><strong>Cart</strong></a></li>
        <li style="position: absolute; left: 90%">
        <li class="profile-button">
  <a href="profile.php">Profile</a>
</li>
        </li>
      </ul>
    </nav>
  </div>
  <div>
    <?php if ($result && mysqli_num_rows($result) > 0) { ?>
      <table class="table">
        <tr class="table-header">
          <th>Product Name</th>
          <th>Quantity</th>
          <th>Date Added</th>
          <th>Price</th>
          <th>Action</th>
        </tr>

        <?php
        $total = 0;
        while ($data = mysqli_fetch_assoc($result)) {
          $quantity = $data['pquantity'];
          $cost = $data['pcost'];
          $subtotal = $cost * $quantity;
          $total += $subtotal;
        ?>
          <tr>
            <td><?php echo $data['pname']; ?></td>
            <td><?php echo $data['pquantity']; ?></td>
            <td><?php echo $data['date']; ?></td>
            <td><?php echo $subtotal; ?></td>
            <td>
              <form action="" method="post">
                <input type="hidden" name="cdelete" value="<?php echo $data['pname']; ?>">
                <button type="submit" name="delete" class="btn btn-dark">Remove</button>
              </form>
            </td>
          </tr>
        <?php } ?>
      </table>

      <div style="display: flex; align-items: center; justify-content: center; flex-direction: column;">
        <p style="color: White; font-size: 30px;">Total = <?php echo $total; ?></p>
        <button type="button" class="btn btn-primary"><a href="paymentt.php">Proceed for Payment</a></button>
      </div>

    <?php } else { ?>
      
      <table class="table">
        <tr class="table-header">
          <th>Product Name</th>
          <th>Quantity</th>
          <th>Date Added</th>
          <th>Price</th>
          <th>Action</th>
      <tr>
        <td colspan="5" style="text-align: center; font-size: 18px;">Your cart is empty!!!</td>
      </tr>
    </table>
    <?php } ?>

  </div>
</body>

</html>
