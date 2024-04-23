<?php
session_start();
use Razorpay\Api\Api;
use Razorpay\Api\Errors\SignatureVerificationError;
require "vendor/autoload.php";
$success = true;

$error = "Payment Failed";
$keyId = 'rzp_test_w6piYgRbvr2gD1';
$keySecret = '0BCuZqTRBmwyaruKUkipjXoY';
if (empty($_POST['razorpay_payment_id']) === false)
{
    $api = new Api($keyId, $keySecret);

    try
    {
        $attributes = array(
            'razorpay_order_id' => $_SESSION['razorpay_order_id'],
            'razorpay_payment_id' => $_POST['razorpay_payment_id'],
            'razorpay_signature' => $_POST['razorpay_signature']
        );

        $api->utility->verifyPaymentSignature($attributes);
    }
    catch(SignatureVerificationError $e)
    {
        $success = false;
        $error = 'Razorpay Error : ' . $e->getMessage();
    }
}

if ($success === true && isset($_POST['razorpay_payment_id']))
{
    $html = "<p>Your payment was successful</p>
             <p>Payment ID: {$_POST['razorpay_payment_id']}</p>";
             include ('includes/dbconnection.php');
                     $payment_id = $_POST['razorpay_payment_id'];
                     $parkingCharge = $_SESSION['amount'];
                     $vehicleCategory = $_POST['VehicleCategory'];
                     $vehicleCompanyName = $_POST['VehicleCompanyname'];
                     $registrationNumber = $_POST['RegistrationNumber'];
                     $user_id = $_SESSION['vpmsuid'];
                     $city = $_SESSION['city'];
                     $OwnerContactNumber = $_SESSION['vpmsumn'];
                     $inTime = $_POST['inTime'];
                     $sql1 = "SELECT * FROM tblregusers WHERE ID = '$user_id'";
                     $result1 = mysqli_query($con, $sql1);
                     $row1 = mysqli_fetch_array($result1);
                     $OwnerName = $row1['FirstName'] . ' ' . $row1['LastName'];
                     $parkingnumber = time() . rand(0, 10000000);
                     $sql2 = "INSERT INTO tblvehicle (ParkingNumber,OwnerName, OwnerContactNumber, VehicleCategory, VehicleCompanyName, RegistrationNumber,InTime,ParkingCharge) VALUES ('$parkingnumber','$OwnerName', '$OwnerContactNumber', '$vehicleCategory', '$vehicleCompanyName', '$registrationNumber', '$inTime','$parkingCharge')";
                     $result2 = mysqli_query($con, $sql2);
                     $sql = "SELECT * FROM parkinglot WHERE city='$city'";
                     $result = mysqli_query($con, $sql);
                     $parkinglot_id = $result->fetch_assoc()['id'];
                     $sql3 = "INSERT INTO booking (user_id,parking_id,parkinglot_id,payment_id) VALUES ('$user_id','$parkingnumber','$parkinglot_id','$payment_id')";
                     $result3 = mysqli_query($con, $sql3);
                     $sql4 = "UPDATE parkinglot SET bookedSlot = bookedSlot+1 WHERE id = '$parkinglot_id'";
                     $result4 = mysqli_query($con, $sql4);
             
                     if ($result4) {
                         echo '<script>alert("Booking successfull.."); window.location="view-vehicle.php";</script>';
                     } else {
                         echo '<script>alert("Booking unsuccessfull..Plz retry"); window.location="book_form.php";</script>';
                     }
                 }
else
{
    $html = "<p>Your payment failed</p>
               <a href='booking.php'>Return to booking</a>
               <script>alert('Error in payment Plz retry')</script>;
             <p>{$error}</p>";
}

echo $html;
