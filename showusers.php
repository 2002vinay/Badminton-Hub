<?php
include('config.php');
$query = "SELECT * from register";
$result = mysqli_query($conn, $query);
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
    <h1 class="text-white ml-4 mt-4">Users</h1>
    <div class="table-container">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">User Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone Number</th>
                    <th scope="col">Birth Date</th>
                    <th scope="col">Address</th>
                </tr>
            </thead>
            <tbody>
                <?php if (mysqli_num_rows($result) > 0) {
                    while ($data = mysqli_fetch_assoc($result)) { ?>
                        <tr>
                            <td><?php echo $data['name']; ?></td>
                            <td><?php echo $data['email']; ?></td>
                            <td><?php echo $data['phnum']; ?></td>
                            <td><?php echo $data['date']; ?></td>
                            <td><?php echo $data['address']; ?></td>
                        </tr>
                <?php } ?>
                <?php } else { ?>
                    <tr>
                        <td colspan="5">No data found</td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <a href="ad.html" class="btn btn-primary">Back</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ND91+VN6F5vnGKG3iGsQj2c1GgT3poJm6r59wN9e0PFRNH2rV+kSDt9HxIaIlHHj" crossorigin="anonymous"></script>
</body>
</html>
