<?php
session_start();

@include 'config.php';
 
// Delete functionality
if (isset($_POST['delete'])) {
  $delete = $_POST['cdelete'];
  // if (!empty($delete)) {
      //$placeholders = rtrim(str_repeat('?,', count($delete_ids)), ',');
      $delete_query = "DELETE FROM cart WHERE pname ='$delete'";
      $result1 = mysqli_query($conn,$delete_query );
      //$stmt = mysqli_prepare($conn, $delete_query);
      //mysqli_stmt_bind_param($stmt, str_repeat('i', count($delete_ids)), ...$delete_ids);
      
      // if (mysqli_stmt_execute($stmt)) {
      //     header('location: cart.php');
      //     exit();
      // } else {
      //     echo "Error: " . mysqli_stmt_error($stmt);
      // }
      // mysqli_stmt_close($stmt);
  }
$query = "SELECT * from cart";
$result = mysqli_query($conn, $query);
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
        /*font-family: 'Poppins-Medium';*/
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
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
      }
      td,
      th {
        border: 1px solid white;
        text-align: left;
        padding: 20px;
      }
      tr:nth-child(even) {
        background-color: yellow;
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
            <a href="profile">Profile</a>
          </li>
        </ul>
      </nav>
    </div>
    <div>
      <table>
        <tr>
          <th>Product Name</th>
          <th>Quantity</th>
          <th>Date Added</th>
          <th>Price</th>
        </tr>
        
        <?php
        $total = 0;
        
        if (mysqli_num_rows($result) > 0) {
          while($data = mysqli_fetch_assoc($result)) {
            $quantity = $data['pquantity'];
            $cost = $data['pcost'];
            $total += $cost * $quantity;
            ?>
            <tr>
              <td><?php echo $data['pname']; ?></td>
              <td><?php echo $data['pquantity']; ?></td>
              <td><?php echo $data['date']; ?></td>
              <td><?php echo $data['pcost'] * $data['pquantity']; ?></td>
              <td>
                <form action="" method="post">
                  <input type="hidden" name="cdelete" value="<?php echo $data['pname']; ?>"> 
                  <button type="submit" name="delete" class="btn btn-dark">Remove</button>
                </form>
              </td>
            </tr>
            <?php
          }
        } else {
          ?>
          <tr>
            <td colspan="4">Your cart is empty!!!</td>
          </tr>
          <?php
        }
        ?>
        
      </table>
      
      <?php
      if (mysqli_num_rows($result) > 0) {
        ?>
        <div style="display: flex;align-items: center;justify-content: center;flex-direction: column;">
          <p style="color: white;font-size: 30px;">Total = <?php echo $total; ?></p>
          <button type="button" class="btn btn-primary" name='gotopay'><a href="payment.php">Proceed for Payment</a></button>
        </div>
        <?php
      } else {
        ?>
        <div style="display: flex;align-items: center;justify-content: center;flex-direction: column;">
          <p style="color: white;font-size: 30px;">Total = 0</p>
          <button type="button" class="btn btn-primary" disabled>Proceed for payment</button>
        </div>
        <?php
      }
      ?>
    </div>
  </body>
</html>
