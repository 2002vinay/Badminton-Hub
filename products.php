



<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

@include 'config.php';
session_start();
//$userEmail = $_SESSION['email'];

if (isset($_SESSION['email'])) {
  if (isset($_POST['addcart'])) {
    $userEmail =$_SESSION['email'];
    $currentdate = date('Y-m-d');
    $p_name = $_POST['pname'];
    $p_price = $_POST['pcost'];
    $p_image = $_POST['imgg'];
    $quantity = $_POST['quantity'];
   
    // Check if the product quantity is sufficient
    $selectProduct = "SELECT * FROM products WHERE pname = '$p_name'";
    $productResult = mysqli_query($conn, $selectProduct);
    $productData = mysqli_fetch_assoc($productResult);

    if ( $quantity>$productData['pquantity'] ) {
      echo 'Insufficient quantity!';
      exit();
    }

    $select = "SELECT * FROM cart1 WHERE pname = '$p_name' AND email = '$userEmail'";
    $result = mysqli_query($conn, $select);
    $data1 = mysqli_fetch_assoc($result);

    if (mysqli_num_rows($result) > 0 && $data1['pname'] == $p_name) {
      echo 'Already added to cart!';
    } else {
      // Update the product quantity in the database
      $updatedQuantity = intval($productData['pquantity']) - intval($quantity);

      $updateQuery = "UPDATE products SET pquantity = '$updatedQuantity' WHERE pname = '$p_name'";
      mysqli_query($conn, $updateQuery);

      $insert = "INSERT INTO cart1 (pname, pimage, pcost, date, email, pquantity) VALUES ('$p_name', '$p_image', '$p_price', '$currentdate', '$userEmail', '$quantity')";
      if (mysqli_query($conn, $insert)) {
        echo 'Added to cart!';
      } else {
        echo 'Error: ' . mysqli_error($conn);
      }
    }
  }
}
 
      // ...
    

?>



<html lang="en">
  <head>
    <title>Products</title>
    <link
      href="https://fonts.googleapis.com/css?family=Bentham|Playfair+Display|Raleway:400,500|Suranna|Trocchi"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="home.css" />
  </head>
  <style>
    body {
      margin: 0;
      padding: 0;
      background-color: rgb(48, 48, 48);
      font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen,
        Ubuntu, Cantarell, "Open Sans", "Helvetica Neue", sans-serif;
    }
    .wrapper {
      height: 420px;
      width: 654px;
      margin: 50px auto;
      border-radius: 7px 7px 7px 7px;
      /* VIA CSS MATIC https://goo.gl/cIbnS */
      -webkit-box-shadow: 0px 14px 32px 0px rgba(0, 0, 0, 0.15);
      -moz-box-shadow: 0px 14px 32px 0px rgba(0, 0, 0, 0.15);
      box-shadow: 0px 14px 32px 0px rgba(0, 0, 0, 0.15);
    }
    .product-img {
      float: left;
      height: 420px;
      width: 327px;
    }
    .product-img img {
      border-radius: 7px 0 0 7px;
    }
    .product-info {
      float: left;
      height: 420px;
      width: 327px;
      border-radius: 0 10px 10px 0;
      background-color: rgba(252, 215, 92, 0.979);
    }
    .product-text h1 {
      padding-top: 10px;
      font-size: 20px;
      color: black;
      padding-left: 10px;
      margin-left: 10px;
      overflow-y: scroll;
      height: 10px;
    }
    .product-text h1,
    .product-price-btn p {
      font-family: "Bentham", serif;
    }
    .product-price-btn p {
      display: inline-block;
      font-family: "Trocchi", serif;
      margin-top: 0;
      font-size: 28px;
      font-weight: lighter;
      color: #474747;
    }
    .product-price-btn button {
      display: inline-block;
      height: 50px;
      width: 176px;
      position: relative;
      box-sizing: border-box;
      border: transparent;
      border-radius: 60px;
      font-family: "Raleway", sans-serif;
      font-size: 14px;
      font-weight: 500;
      text-transform: uppercase;
      letter-spacing: 0.2em;
      color: #ffffff;
      background-color: #070707;
      cursor: pointer;
      outline: none;
    }
    .product-price-btn button:hover {
      background-color: #79b0a1;
    }
    .container {
      display: grid;
      grid-template-columns: auto auto;
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
      padding-left: 10px;
      padding-top: 5px;
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
      height: 50px;
    }
    .navbar-container header p {
      margin-left: 10px;
    
      font-size: 25px;
    }
    .description::-webkit-scrollbar {
      width: 5px; /* Remove scrollbar space */
      background: transparent;
      /* Optional: just make scrollbar invisible */
    }
    /* Optional: show position indicator in red */
    .description::-webkit-scrollbar-thumb {
      background: white;
      border-radius: 3px;
    }
    .heading::-webkit-scrollbar {
      width: 5px; /* Remove scrollbar space */
      background: transparent;
      /* Optional: just make scrollbar invisible */
    }
    /* Optional: show position indicator in red */
    .heading::-webkit-scrollbar-thumb {
      background: white;
      border-radius: 3px;
    }
    .description {
      margin-left: 10px;
      overflow-y: scroll;
      height: 150px;
    }
    #select1 {
      flex-direction: row;
      width: 10em;
      height: 2em;
      font-size: larger;
      color: white;
      padding-left: 20px;
      outline: none;
      border-radius: 2em;
      border: 2px solid white;
      background-color: rgb(46, 46, 46);
      position: absolute;
      top: 0;
      left: 15%;
    }
    .select {
      position: relative;
      top: 10px;
      left: 30%;
    }
    /* Set a style for all buttons */
    .Search-btn {
      border-radius: 25px;
      width: 100px;
      padding: 15px 0;
      margin-left: 20px;
      font-weight: bold;
      border: 1px solid #fff;
      background: transparent;
      color: #fff;
      position: absolute;
      overflow: hidden;
      top: 0;
      left: 28%;
    }
    /* Add a hover effect for buttons */
    .search-span {
      background: #fff;
      height: 100%;
      width: 0;
      border-radius: 25px;
      position: absolute;
      left: 0;
      bottom: 0;
      z-index: -1;
      transition: 0.5s;
    }
    .Search-btn:hover span {
      width: 100%;
    }
    .Search-btn:hover {
      border: none;
      color: black;
    }
    .quantity-input-container {
    display: flex;
    align-items: center;
    width: 200px;
  }

  .quantity-input-label {
    font-size: 16px;
    margin-right: 10px;
  }

  .quantity-input {
    width: 70px;
    padding: 8px;
    font-size: 14px;
    border: 1px solid #ccc;
    border-radius: 4px;
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

  <body>
    <div class="navbar-container">
      <header>
        <p>The Badminton Hub</p>
      </header>
      <nav>
        <ul id="mainMenu">
          <li>
            <a href="home.php">Home </a>
          </li>
          <li><a href="services.php">Services</a></li>
          <li>
            <a href="products.php"><strong>Products</strong></a>
          </li>
          <li><a href="orders.php">Orders</a></li>
          <li><a href="cart.php">Cart</a></li>
          <li style="position: absolute; left: 90%">
          
          <li class="profile-button">
  <a href="profile.php">Profile</a>
</li>
          </li>
        </ul>
      </nav>
    </div>



   

   
   
   
   
    <!-- <div class="select">
      <label style="color: white; font-size: large; padding-right: 10px"
        >What Are you looking for?</label
      >
      <form action="search_products" method="get">
        <select name="select_product" id="select1">
        
          
        
        <option value="<?php echo $raquet1; ?>">Racquets</option>
          <option value="<?php echo $shuttle1; ?>">Shuttle</option>
          <option value="<?php echo $shoe1; ?>">Shoes</option>
          <option value="<?php echo $gripper1; ?>">Grippers</option>
         
        </select>
        <button class="Search-btn" type="submit">
          <span class="search-span"></span>Search
        </button>
      </form>
    </div> -->


    <div class="select">
  <label style="color: white; font-size: large; padding-right: 10px">What are you looking for?</label>
  <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="get">
    <select name="select_product" id="select1">
    <option value="all" <?php if(!isset($_GET['select_product']) || $_GET['select_product'] === 'all') echo 'selected'; ?>>All Products</option>
        
    <option value="Racquet" <?php if(isset($_GET['select_product']) && $_GET['select_product'] === 'Racquet') echo 'selected'; ?>>Racquets</option>
      <option value="Shuttle" <?php if(isset($_GET['select_product']) && $_GET['select_product'] === 'Shuttle') echo 'selected'; ?>>Shuttle</option>
      <option value="Shoes" <?php if(isset($_GET['select_product']) && $_GET['select_product'] === 'Shoes') echo 'selected'; ?>>Shoes</option>
      <option value="Gripper" <?php if(isset($_GET['select_product']) && $_GET['select_product'] === 'Gripper') echo 'selected'; ?>>Grippers</option>
    </select>
    <button class="Search-btn" type="submit" name="search">
      <span class="search-span"></span>Search
    </button>
  </form>
</div>







    
    <div class="container"> 
    
    
    <?php
@include 'config.php';

$ch = 0;

// Check if a specific category is selected
if (isset($_GET['search']) && isset($_GET['select_product'])) {
  $selectedCategory = $_GET['select_product'];

  if ($selectedCategory === 'all') {
    // Fetch all products from the database
    $query = "SELECT * FROM products";
  } else {
    // Perform a database query to retrieve products of the selected category
    $query = "SELECT * FROM products WHERE pcat = '$selectedCategory'";
  }
} else {
  // Fetch all products from the database
  $query = "SELECT * FROM products";
}

$result = mysqli_query($conn, $query);

// Display the products
if (mysqli_num_rows($result) > 0) {
  while ($data = mysqli_fetch_assoc($result)) {
    // Display product information here
    $productId = $data['p_id']; // Unique identifier for each product
?>

<div class="wrapper" id="product<?php echo $productId; ?>">
  <div class="product-img">
    <img src="./image/<?php echo $data['imgg']; ?>" height="420" width="327" />
  </div>

  <div class="product-info">
    <div class="product-text">
      <h1 class="heading"><?php echo $data['pname']; ?></h1>
      <p style="padding-left: 10px">
        <span style="font-size: large; font-weight: bold; font-family: 'Bentham', serif;">Type: <?php echo $data['pcat']; ?></span>
        <span style="margin-left: 10px"></span>
      </p>
      <p class="description">
        <?php echo $data['pdescript']; ?>
      </p>
      <p class="">Instock <?php echo $data['pquantity']; ?></p>

      <div class="quantity-input-container">
        <label class="quantity-input-label" for="quantity-input-<?php echo $productId; ?>">Quantity:</label>
        <input type="number" id="quantity-input-<?php echo $productId; ?>" class="quantity-input" name="quantity[<?php echo $productId; ?>]" value="1" min="1" oninput="updateHiddenInput(this.value, '<?php echo $productId; ?>')">
      </div>
    </div>

    <div class="product-price-btn">
      <p>
        <img src="rupee.png" alt="" width="20px" height="20px" /><?php echo $data['pcost']; ?><span></span>
      </p>

      <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" style="position: absolute; display: inline-block; margin-left: 50px;">
        <input type="hidden" name="pname" value="<?php echo $data['pname']; ?>">
        <input type="hidden" name="pcost" value="<?php echo $data['pcost']; ?>">
        <input type="hidden" name="imgg" value="<?php echo $data['imgg']; ?>">
        <input type="hidden" name="quantity" value="1" min="1" id="hiddenQuantity-<?php echo $productId; ?>">
        <button type="submit" name="addcart">Add To Cart</button>
      </form>
    </div>
  </div>
</div>

<script>
  function updateHiddenInput(value, productId) {
    if (value == '' || value == 0 || value == 1) {
      value = 1;
    }
    document.getElementById("hiddenQuantity-" + productId).value = value;
  }
</script>

<?php
  }
  echo '<p style="color: white; position: relative; left: 90%; top: 20%">That\'s All!!!</p>';
} else {
  echo '<p style="color: white; position: relative; left: 90%; top: 20%">No Products To Display!!!</p>';
}
?>


     
      
    </div>

    <footer class="footer">
      <div class="about">
        <p><strong>About</strong></p>
        <p>Contact Us</p>
        <p>About us</p>
        <p>Our Social Media Handles:</p>
        <div class="icons">
          <a href="#"
            ><img src="whatsapp.png" alt="" width="20" height="20"
          /></a>
          <a href="#"
            ><img src="facebook.png" alt="" width="20" height="20"
          /></a>
          <a href="#"
            ><img src="instagram.png" alt="" width="20" height="20"
          /></a>
        </div>
      </div>

      <div class="help">
        <p><strong>Help</strong></p>
        <p>Payments</p>
        <p>Shipping</p>
      </div>
      <div class="address">
        <p><strong>Visit our Shop:</strong></p>
        <iframe
          src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3884.197886376466!2d75.00047231461471!3d13.212889390697955!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bbb57ccb46f93fd%3A0x5463a907579f060!2sThribhuvan%20badminton%20Hub%20and%20Gutting%20centre!5e0!3m2!1sen!2sin!4v1640965345331!5m2!1sen!2sin"
          width="200"
          height="200"
          style="border: 0"
          allowfullscreen=""
          loading="lazy"
        ></iframe>
      </div>
    </footer>
  </body>
 
</html>


<?php
// @include 'config.php';
// $raquet="select * from products where  pcat=Racquet";
// $raquet1 = mysqli_query($conn, $raquet);

// $shuttle="select * from products where  pcat=Shuttle";
// $shuttle1 = mysqli_query($conn, $shuttle);

// $shoe="select * from products where  pcat=Shoes";
// $shoe1 = mysqli_query($conn, $shoe);

// $gripper="select * from products where  pcat=Gripper";
// $gripper1 = mysqli_query($conn, $gripper);



?>
