<?php
session_start();
include_once ('includes/header.php');
include_once ('includes/sidebar.php');
include ('includes/dbconnection.php');
$payment_id=$_GET['payment_id'];
$parking_id = $_SESSION['parking_id'];
$sql = "UPDATE booking SET payment_id='$payment_id' WHERE parking_id='$parking_id'";
$fee=200;
$result = mysqli_query($con, $sql);
$sql1="INSERT INTO  tblvehicle (ParkingCharge) VALUES ('$fee') WHERE ParkingNumber='$parking_id'";
$result1 = mysqli_query($con, $sql1);
if ($result && $result1 ) {
    echo '<script>alert("Booking successfully"); window.location="view-vehicle.php";</script>';
} else {
    echo '<script>alert("Booking unsuccessfull..Plz retry"); window.location="booking.php";</script>';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>Success</title>
</head>
<body>
   You have successfully done payment. Thank you for booking with us. 
</body>
</html>