<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

@include 'config.php';

$conn = mysqli_connect('localhost','root', '','badminto');

if (isset($_SESSION['email'])) {
 $query = "SELECT * from cart1";
$result = mysqli_query($conn, $query);
  $data = mysqli_fetch_assoc($result);
    $total=0;
    $quantity = $data['pquantity'];
        
        $cost = $data['pcost'];
    $total += $cost * $quantity;

}



if(isset($_POST['pay'])){

  $fname = mysqli_real_escape_string($conn, $_POST['fname']);
  $lname = mysqli_real_escape_string($conn, $_POST['lname']);
  $email = mysqli_real_escape_string($conn,$_POST['email']);
  $addres = mysqli_real_escape_string($conn,$_POST['address']);
  $pin = mysqli_real_escape_string($conn,$_POST['pin']);
  $amount = mysqli_real_escape_string($conn,$total);
 // $deliverystatus = mysqli_real_escape_string($conn,$_POST['']);
 
  

  //inserting into table
     $payment = "INSERT INTO payment(fname,lname,email,address,pin,amount) VALUES('$fname','$lname','$email','$addres','$pin','$amount')";
     mysqli_query($conn, $payment);
     $error ='<div class="Payment successful!!" role="alert">Success</div>';

     header('location:order.php');  

}  
if(isset($_POST['pay'])&&isset($_POST['gotopay'])){
$dle="delete *from cart";
mysqli_query($conn, $del);
}
else{
  header('location:login.php');
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
        <div class="row g-5">
          <div class="col-md-5 col-lg-4 order-md-last">
          
              
            <h4 class="d-flex justify-content-between align-items-center mb-3">
              <span class="text-primary">Your cart</span>
              <span class="badge bg-primary rounded-pill"><%=count  %> </span>
            </h4>
            
           
  <ul class="list-group mb-3">
             
              
              <div>
              
              <?php
              $_SESSION['email'];
              mysqli_data_seek($result, 0); // Reset the result pointer to the beginning 
  while($data = mysqli_fetch_assoc($result)) {?> 
   <li class="list-group-item d-flex justify-content-between lh-sm">
  <div>
                  <h6 class="my-0"><?php echo $data['pname']; ?> </h6>
                  <small class="text-muted"><?php echo $data['pquantity']; ?></small>
  </div>
                  <span class="text-muted"><?php echo $data['pcost']* $data['pquantity']; ?></span>
                  </li>
                  <?php }?>
              
             
              <li class="list-group-item d-flex justify-content-between">
                <span>Total (Rupees)
                </span>
                <strong><i class="fa fa-rupee"></i><?php echo $total; ?></strong>
              </li>
            </ul>

              
              
              
            
          </div>
          <div class="col-md-7 col-lg-8">
            <h4 class="mb-3">Billing address</h4>
            
              <div class="row g-3">
                <div class="col-sm-6">
                  <label for="firstName" class="form-label">First name</label>
                  <input
                    type="text"
                    name="fname"
                    class="form-control"
                    id="firstName"
                    placeholder=""
                    value=""
                    required
                  />
                  <div class="invalid-feedback">
                    Valid first name is required.
                  </div>
                </div>

                <div class="col-sm-6">
                  <label for="lastName" class="form-label">Last name</label>
                  <input
                    type="text"
                    name="lname"
                    class="form-control"
                    id="lastName"
                    placeholder=""
                    value=""
                    required
                  />
                  <div class="invalid-feedback">
                    Valid last name is required.
                  </div>
                </div>

               

                <div class="col-12">
                  <label for="email" class="form-label"
                    >Email </label
                  >
                  <input
                    type="email"
                    name="email"
                    class="form-control"
                    id="email"
                    placeholder="you@example.com"
                  />
                  <div class="invalid-feedback">
                    Please enter a valid email address for shipping updates.
                  </div>
                </div>

                <div class="col-12">
                  <label for="address" class="form-label">Address</label>
                  <input
                    type="text"
                    name="address"
                    class="form-control"
                    id="address"
                    placeholder="1234 Main St"
                    required
                  />
                  <div class="invalid-feedback">
                    Please enter your shipping address.
                  </div>
                </div>

                

                

                <div class="col-md-3">
                  <label for="zip" class="form-label">PIN</label>
                  <input
                    type="text"
                    name="pin"
                    class="form-control"
                    id="zip"
                    placeholder=""
                    required
                  />
                  <div class="invalid-feedback">Zip code required.</div>
                </div>
              </div>

              <hr class="my-4" />

              <div class="form-check">
                <input
                  type="checkbox"
                  class="form-check-input"
                  id="same-address"
                />
                <label class="form-check-label" for="same-address"
                  >Shipping address is the same as my billing address</label
                >
              </div>

              <div class="form-check">
                <input
                  type="checkbox"
                  class="form-check-input"
                  id="save-info"
                />
                <label class="form-check-label" for="save-info"
                  >Save this information for next time</label
                >
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
                    onclick="show1()"
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
                    onclick="show1()"
                  />
                  <label class="form-check-label" for="debit">Debit card</label>
                </div>
                <div class="form-check">
                  <input
                    id="paypal"
                    name="paymentMethod"
                    type="radio"
                    class="form-check-input"
                    required
                    onclick="show2()"
                  />
                  <label class="form-check-label" for="paypal">Cash On Delivery</label>
                </div>
              </div>
              <div id="visible" style="display: none;">
              <div class="row gy-3" >
                <div class="col-md-6">
                  <label for="cc-name" class="form-label">Name on card</label>
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
                  <div class="invalid-feedback">Name on card is required</div>
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
                  <div class="invalid-feedback">Expiration date required</div>
                </div>

                <div class="col-md-3">
                  <label for="cc-cvv" class="form-label">CVV</label>
                  <input
                    type="text"
                    class="form-control"
                    id="cc-cvv"
                    placeholder=""
                    required
                  />
                  <div class="invalid-feedback">Security code required</div>
                </div>
              </div>
            </div>
              <hr class="my-4" />
            <form action="" method="post">
              <button class="w-100 btn btn-primary btn-lg" type="submit"name="pay" >
                Continue to checkout
              </button>
            </form>
            
          </div>
        </div>
      </main>
    </div>

    

  </body>
</html>