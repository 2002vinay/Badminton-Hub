<?php
session_start();
include 'config.php';
@include 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $name = $_POST['pname'];
  $descript = $_POST['pdescript'];
  $cost = $_POST['pcost'];
  $category = $_POST['pcat'];
  $quantity = $_POST['pquantity'];

  // Code to handle file upload and store the filename in $filename variable

  // Insert the new product into the products table
  $ins = "INSERT INTO products (pname, pdescript, pcost, pcat, imgg, pquantity) VALUES ('$name', '$descript', '$cost', '$category', '$filename', '$quantity')";
  mysqli_query($conn, $ins);

  // Redirect to the admin.php page after successful product addition
  header("Location: ad.html");
  exit();


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $pname = $_POST['pname'];

  if (isset($_POST['update'])) {
    // Fetch the product details from the database based on the product name
    $select_query = "SELECT * FROM products WHERE pname = '$pname'";
    $result = mysqli_query($conn, $select_query);
    $product = mysqli_fetch_assoc($result);
?>

    <div class="container">
      <h2>Update Product</h2>
      <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <input type="hidden" name="pname" value="<?php echo $product['pname']; ?>">
        <input type="text" name="pdescript" value="<?php echo $product['pdescript']; ?>" required>
        <input type="number" name="pcost" value="<?php echo $product['pcost']; ?>" required>
        <input type="text" name="pcat" value="<?php echo $product['pcat']; ?>" required>
        <input type="number" name="pquantity" value="<?php echo $product['pquantity']; ?>" required>
        <button type="submit" name="updateProduct">Update Product</button>
      </form>
    </div>

<?php
  } elseif (isset($_POST['updateProduct'])) {
    // Code to handle updating the product based on the submitted form values
    $pname = $_POST['pname'];
    $pdescript = $_POST['pdescript'];
    $pcost = $_POST['pcost'];
    $pcat = $_POST['pcat'];
    $pquantity = $_POST['pquantity'];

    $update_query = "UPDATE products SET pdescript = '$pdescript', pcost = '$pcost', pcat = '$pcat', pquantity = '$pquantity' WHERE pname = '$pname'";
    mysqli_query($conn, $update_query);

    // Redirect back to the admin.php page after successful update
    header("Location: ad.html");
    exit();
  }elseif (isset($_POST['delete'])) {
    $delete_query = "DELETE FROM products WHERE pname = '$pname'";
    mysqli_query($conn, $delete_query);
  }

  // Redirect back to the admin.php page after update or delete
  header("Location: ad.html");
  exit();
}
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Panel</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
    }

    .container {
      max-width: 500px;
      margin: 20px auto;
      padding: 20px;
      background-color: #f0f0f0;
    }

    h1,
    h2 {
      text-align: center;
    }

    input,
    button {
      display: block;
      margin-bottom: 10px;
      width: 100%;
      padding: 10px;
    }

    button {
      background-color: #333;
      color: white;
      border: none;
      cursor: pointer;
    }

    button:hover {
      background-color: #555;
    }
  </style>
</head>

<body>
  <h1>Admin Panel</h1>

  <div class="container">
    <h2>Add New Product</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
      <input type="text" name="pname" placeholder="Product Name" required>
      <input type="text" name="pdescript" placeholder="Product Description" required>
      <input type="number" name="pcost" placeholder="Product Cost" required>
      <input type="text" name="pcat" placeholder="Product Category" required>
      <input type="number" name="pquantity" placeholder="Product Quantity" required>
      <input type="file" name="image" accept="image/*" required>
      <button type="submit">Add Product</button>
    </form>
  </div>

  <div class="container">
    <h2>Manage Products</h2>
    <?php
    $query = "SELECT * FROM products";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
      while ($row = mysqli_fetch_assoc($result)) {
    ?>
        <div>
          <h3><?php echo $row['pname']; ?></h3>
          <p><?php echo $row['pdescript']; ?></p>
          <p>Price: $<?php echo $row['pcost']; ?></p>
          <p>Quantity: <?php echo $row['pquantity']; ?></p>
          <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <input type="hidden" name="pname" value="<?php echo $row['pname']; ?>">
            <button type="submit" name="update">Update</button>
            <button type="submit" name="delete">Delete</button>
          </form>
        </div>
    <?php
      }
    } else {
      echo "<p>No products found.</p>";
    }
    ?>
  </div>
</body>

</html>
