<?php
// Include your database connection code here
include 'config.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);


if (isset($_POST['date']) && isset($_POST['slot'])) {
  $selectedDate = $_POST['date'];
  $selectedSlot = $_POST['slot'];

  // Insert the booked slot into the database
  $query = "INSERT INTO servicebooking(service_date, service_time) VALUES ('$selectedDate', '$selectedSlot')";
  $result = mysqli_query($conn, $query);
 
  if ($result) {
    echo "success";
  } else {
    echo "error";
  }
}
?>
