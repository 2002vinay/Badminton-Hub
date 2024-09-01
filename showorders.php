<?php
@include 'config.php';
session_start();

$select = "SELECT * FROM payment1";
$result = mysqli_query($conn, $select);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thribhuvan Badminton Hub</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="home.css">
    <style>
        body {
            margin: 0;
            padding: 0;
            background-color: rgb(177, 177, 177);
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen, Ubuntu, Cantarell, "Open Sans", "Helvetica Neue", sans-serif;
        }

        .table-container {
            margin: 30px;
            padding: 20px;
            background-color: white;
            border-radius: 10px;
        }
    </style>
</head>
<body>
    <h1 class="text-white ml-4 mt-4">Orders Placed</h1>
    <div class="table-container">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">Product Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Payment ID</th>
                    <th scope="col">User Booked</th>
                    <th scope="col">Set Delivery Status</th>
                </tr>
            </thead>
            <tbody>
                <?php if (mysqli_num_rows($result) > 0) {
                    while ($data = mysqli_fetch_assoc($result)) { ?>
                        <tr>
                            <td><?php echo $data['pname']; ?></td>
                            <td><?php echo $data['pcost']; ?></td>
                            <td><?php echo $data['id']; ?></td>
                            <td><?php echo $data['fname'] . ' ' . $data['lname']; ?></td>
                            <td><?php echo $data['delivery_stat']; ?></td>
                        </tr>
                <?php } ?>
                <?php } else { ?>
                    <tr>
                        <td colspan="5">No Orders!!!</td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <a href="ad.html" class="btn btn-primary">Back</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ND91+VN6F5vnGKG3iGsQj2c1GgT3poJm6r59wN9e0PFRNH2rV+kSDt9HxIaIlHHj" crossorigin="anonymous"></script>
</body>
</html>
