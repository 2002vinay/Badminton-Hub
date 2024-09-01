<?php
session_start();

@include 'config.php';

$conn = mysqli_connect('localhost', 'root', '', 'badminto');

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$query = "SELECT * FROM cart1";
$result = mysqli_query($conn, $query);
$data = mysqli_fetch_assoc($result);
$total = 0;

if (isset($_POST['pay'])) {
    $currentdate = date('Y-m-d');
    $fname = mysqli_real_escape_string($conn, $_POST['fname']);
    $lname = mysqli_real_escape_string($conn, $_POST['lname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $pin = mysqli_real_escape_string($conn, $_POST['pin']);
    $amount = mysqli_real_escape_string($conn, $total);

    // Inserting into table
    $payment = "INSERT INTO payment (fname, lname, email, address, pin, amount, o_date, pname, pcost, pquantity) VALUES ('$fname', '$lname', '$email', '$address', '$pin', '$amount', '$currentdate', '$name', '$cost', '$quantity')";
    mysqli_query($conn, $payment);
    $query = "DELETE FROM cart";
    $result = mysqli_query($conn, $query);
    echo '<script>alert("Paid Successfully!!!"); window.location = "orders.php";</script>';
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title>Payment</title>

    <link
        rel="canonical"
        href="https://getbootstrap.com/docs/5.1/examples/checkout/"
    />

    <!-- Bootstrap core CSS -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
        crossorigin="anonymous"
    />

    <!-- Favicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        body{
            margin: 30px;
        }
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }
        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>
    <script>
        function show1(){
            document.getElementById('visible').style.display ='block';
        }
        function show2(){
            document.getElementById('visible').style.display = 'none';
        }
    </script>

    <!-- Custom styles for this template -->
    <link href="form-validation.css" rel="stylesheet" />
</head>
<body class="bg-light">
<div class="container">
    <main>
        <div class="py-5 text-center">
            <img
                class="d-block mx-auto mb-4"
                src="logo.png"
                alt=""
                width="72"
                height="57"
            />
            <h2>Checkout form</h2>
            <p class="lead">
                Below is your cart summary and payment details.
            </p>
        </div>

        <div class="row g-5">
            <div class="col-md-5 col-lg-4 order-md-last">
                <h4 class="d-flex justify-content-between align-items-center mb-3">
                    <span class="text-primary">Your cart</span>
                </h4>
                <ul class="list-group mb-3">
                    <?php
                    $query = "SELECT * FROM cart1";
                    $result = mysqli_query($conn, $query);
                    while ($data = mysqli_fetch_assoc($result)) {
                        $quantity = $data['pquantity'];
                        $name = $data['pname'];
                        $cost = $data['pcost'];
                        $total += $cost * $quantity;
                        ?>
                        <li class="list-group-item d-flex justify-content-between lh-sm">
                            <div>
                                <h6 class="my-0"><?php echo $name; ?></h6>
                                <small class="text-muted">Quantity: <?php echo $quantity; ?></small>
                            </div>
                            <span class="text-muted">$<?php echo $cost * $quantity; ?></span>
                        </li>
                        <?php
                    }
                    ?>
                    <li class="list-group-item d-flex justify-content-between">
                        <span>Total (Rs)</span>
                        <strong>$<?php echo $total; ?></strong>
                    </li>
                </ul>
            </div>
            <div class="col-md-7 col-lg-8">
                <h4 class="mb-3">Billing address</h4>
                <form class="needs-validation" method="post" action="payment.php" novalidate>
                    <div class="row g-3">
                        <div class="col-sm-6">
                            <label for="firstName" class="form-label"
                            >First name</label
                            >
                            <input
                                type="text"
                                class="form-control"
                                id="firstName"
                                placeholder=""
                                value=""
                                name="fname"
                                required
                            />
                            <div class="invalid-feedback">
                                Valid first name is required.
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <label for="lastName" class="form-label"
                            >Last name</label
                            >
                            <input
                                type="text"
                                class="form-control"
                                id="lastName"
                                placeholder=""
                                value=""
                                name="lname"
                                required
                            />
                            <div class="invalid-feedback">
                                Valid last name is required.
                            </div>
                        </div>

                        <div class="col-12">
                            <label for="email" class="form-label"
                            >Email <span class="text-muted"></span></label
                            >
                            <input
                                type="email"
                                class="form-control"
                                id="email"
                                placeholder="you@example.com"
                                name="email"
                                required
                            />
                            <div class="invalid-feedback">
                                Please enter a valid email address.
                            </div>
                        </div>

                        <div class="col-12">
                            <label for="address" class="form-label"
                            >Address</label
                            >
                            <input
                                type="text"
                                class="form-control"
                                id="address"
                                placeholder="1234 Main St"
                                name="address"
                                required
                            />
                            <div class="invalid-feedback">
                                Please enter your shipping address.
                            </div>
                        </div>

                        <div class="col-md-5">
                            <label for="pin" class="form-label">Pin</label>
                            <input
                                type="text"
                                class="form-control"
                                id="pin"
                                placeholder=""
                                name="pin"
                                required
                            />
                            <div class="invalid-feedback">
                                Pin code required.
                            </div>
                        </div>
                    </div>

                    <hr class="my-4" />

                    <h4 class="mb-3">Payment</h4>

                    <div class="my-3">
                        <div class="form-check">
                            <input
                                id="credit"
                                name="paymentMethod"
                                type="radio"
                                class="form-check-input"
                                checked
                                required
                            />
                            <label class="form-check-label" for="credit"
                            >Credit card</label
                            >
                        </div>
                        <div class="form-check">
                            <input
                                id="debit"
                                name="paymentMethod"
                                type="radio"
                                class="form-check-input"
                                required
                            />
                            <label class="form-check-label" for="debit"
                            >Debit card</label
                            >
                        </div>
                        <div class="form-check">
                            <input
                                id="paypal"
                                name="paymentMethod"
                                type="radio"
                                class="form-check-input"
                                required
                            />
                            <label class="form-check-label" for="paypal"
                            >Paypal</label
                            >
                        </div>
                    </div>

                    <div class="row gy-3">
                        <div class="col-md-6">
                            <label for="cc-name" class="form-label"
                            >Name on card</label
                            >
                            <input
                                type="text"
                                class="form-control"
                                id="cc-name"
                                placeholder=""
                                required
                            />
                            <small class="text-muted"
                            >Full name as displayed on card</small
                            >
                            <div class="invalid-feedback">
                                Name on card is required
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label for="cc-number" class="form-label"
                            >Credit card number</label
                            >
                            <input
                                type="text"
                                class="form-control"
                                id="cc-number"
                                placeholder=""
                                required
                            />
                            <div class="invalid-feedback">
                                Credit card number is required
                            </div>
                        </div>

                        <div class="col-md-3">
                            <label for="cc-expiration" class="form-label"
                            >Expiration</label
                            >
                            <input
                                type="text"
                                class="form-control"
                                id="cc-expiration"
                                placeholder=""
                                required
                            />
                            <div class="invalid-feedback">
                                Expiration date required
                            </div>
                        </div>

                        <div class="col-md-3">
                            <label for="cc-cvv" class="form-label"
                            >CVV</label
                            >
                            <input
                                type="text"
                                class="form-control"
                                id="cc-cvv"
                                placeholder=""
                                required
                            />
                            <div class="invalid-feedback">
                                Security code required
                            </div>
                        </div>
                    </div>

                    <hr class="my-4" />

                    <div class="d-flex justify-content-between">
                        <button class="w-100 btn btn-primary btn-lg" type="submit" name="pay">Continue to checkout</button>
                    </div>
                </form>
            </div>
        </div>
    </main>

    <footer class="my-5 pt-5 text-muted text-center text-small">
        <p class="mb-1">&copy; 2023 Company Name</p>
        <ul class="list-inline">
            <li class="list-inline-item"><a href="#">Privacy</a></li>
            <li class="list-inline-item"><a href="#">Terms</a></li>
            <li class="list-inline-item"><a href="#">Support</a></li>
        </ul>
    </footer>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C5gAeNJfA6H0jpSqGM/JkATYdGOIuaC9eFvS+uJvM3UzDm25JGLmBKF7o/b6kPWq"
        crossorigin="anonymous"></script>

<script src="form-validation.js"></script>
</body>
</html>
