<?php
session_start();
include_once ('includes/header.php');
include_once ('includes/sidebar.php');
include ('includes/dbconnection.php');
use Razorpay\Api\Api;

require "vendor/autoload.php";
$keyId = '';
$keySecret = '';
$s = "SELECT * FROM tblregusers WHERE ID = " . $_SESSION['vpmsuid'];
$res435 = mysqli_query($con, $s);
$yz = mysqli_fetch_array($res435);
$email = $yz['Email'];
$api = new Api($keyId, $keySecret);
$ss = "SELECT * FROM parkinglot WHERE city='" . $_GET['city'] . "'";
$res = mysqli_query($con, $ss);
$ro = mysqli_fetch_array($res);
$amount = $ro['price'];
$amount = $amount * 100;
$receipt = time() . rand(0, 10000000);
$order = $api->order->create(array('receipt' => $receipt, 'amount' => $amount, 'currency' => 'INR'));
$order_id = $order['id'];
$order_receipt = $order['receipt'];
$order_amount = $order['amount'];
$order_currency = $order['currency'];
$order_created_at = $order['created_at'];
$_SESSION['razorpay_order_id'] = $order_id;
$_SESSION['city'] = $_GET['city'];
$_SESSION['amount'] = $ro['price'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking</title>
    <!-- Include your CSS files here -->
    <link rel="apple-touch-icon" href="https://i.imgur.com/QRAUqs9.png">
    <link rel="shortcut icon" href="https://i.imgur.com/QRAUqs9.png">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">
    <link rel="stylesheet" href="../admin/assets/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="../admin/assets/css/style.css">
    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->
    <link href="https://cdn.jsdelivr.net/npm/chartist@0.11.0/dist/chartist.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/jqvmap@1.5.1/dist/jqvmap.min.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/weathericons@2.1.0/css/weather-icons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@3.9.0/dist/fullcalendar.min.css" rel="stylesheet" />

</head>
<style>
    .razorpay-payment-button {
        background-color: #00308F;
        border: none;
        color: white;
        padding: 10px 15px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        transition-duration: 0.4s;
        cursor: pointer;
        border-radius: 10px;
    }

    .razorpay-payment-button {
        background-color: #00308F;
    }

    .razorpay-payment-button[disabled] {
        opacity: 0.6;
        cursor: not-allowed;
    }
</style>

<body>
    <form class="p-5" method="post" action="status.php" id="bookingForm">
        <div class="mb-3">
            <label for="vehicleCategory" class="form-label">Vehicle Category</label>
            <select class="form-control" id="vehicleCategory" name="VehicleCategory">
                <?php
                // Fetching vehicle categories from tblcategory
                $sql = "SELECT VehicleCat FROM tblcategory";
                $result = mysqli_query($con, $sql);
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<option value="' . $row['VehicleCat'] . '">' . $row['VehicleCat'] . '</option>';
                }
                ?>
            </select>
        </div>

        <div class="mb-3">
            <label for="vehicleCompanyName" class="form-label">Vehicle Company Name</label>
            <input type="text" class="form-control" id="vehicleCompanyName" name="VehicleCompanyname">
        </div>
        <div class="mb-3">
            <label for="registrationNumber" class="form-label">Registration Number</label>
            <input type="text" class="form-control" id="registrationNumber" name="RegistrationNumber">
        </div>
        <div class="mb-3">
            <label for="inTime" class="form-label">Date</label>
            <input type="datetime-local" class="form-control" id="inTime" name="inTime">
        </div>
        <!-- <button type="submit" class="btn btn-primary" name="submit">
            Submit
        </button> -->
        <script src="https://checkout.razorpay.com/v1/checkout.js" data-key="<?= $keyId ?>" //
            data-amount="<?= $order_amount ?>" data-currency="<?= $order_currency ?>" data-order_id="<?= $order_id ?>"
            data-buttontext="Book Now" data-name="VPMS"
            data-description="A Wild Sheep Chase is the third novel by Japanese author Haruki Murakami"
            data-image="https://cdn.pixabay.com/photo/2023/03/23/07/56/ai-generated-7871392_1280.jpg" data-prefill.name="Gaurav Kumar"
            data-prefill.email="<?= $email ?>" data-theme.color="#F37254"></script>
    </form>
</body>
<!-- Include your JavaScript files here -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var razorpayButton = document.querySelector('.razorpay-payment-button');
        razorpayButton.disabled = true;

        document.getElementById('bookingForm').addEventListener('input', function () {
            var formInputs = document.querySelectorAll('#bookingForm input');
            var allFilled = true;
            formInputs.forEach(function (input) {
                if (input.value === '') {
                    allFilled = false;
                }
            });
            razorpayButton.disabled = !allFilled;
        });
    });
</script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var inputDateTime = document.getElementById('inTime');
        var now = new Date();
        var ISTOffset = 330 * 60000;
        var ISTDateTime = new Date(now.getTime() + ISTOffset);

        console.log("Current Date and Time (IST):", ISTDateTime);


        var currentDateTime = ISTDateTime.toISOString().slice(0, 16);
        console.log("Current Date and Time (Formatted):", currentDateTime);
        inputDateTime.addEventListener('change', function () {
            var selectedDateTime = new Date(inputDateTime.value);
            var now = new Date();
            if (selectedDateTime <= now) {
                alert("Please select a time ahead of the current time.");
                inputDateTime.value = '';
            }
        });

        inputDateTime.min = currentDateTime;
        console.log("Minimum Value of Input Field (DateTime):", inputDateTime.min);
    });
</script>



<script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
<script src="../admin/assets/js/main.js"></script>

<script src="https://cdn.jsdelivr.net/npm/chart.js@2.7.3/dist/Chart.bundle.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/chartist@0.11.0/dist/chartist.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chartist-plugin-legend@0.6.2/chartist-plugin-legend.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/jquery.flot@0.8.3/jquery.flot.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flot-pie@1.0.0/src/jquery.flot.pie.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flot-spline@0.0.1/js/jquery.flot.spline.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/simpleweather@3.1.0/jquery.simpleWeather.min.js"></script>
<script src="../admin/assets/js/init/weather-init.js"></script>

<script src="https://cdn.jsdelivr.net/npm/moment@2.22.2/moment.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@3.9.0/dist/fullcalendar.min.js"></script>
<script src="../admin/assets/js/init/fullcalendar-init.js"></script>

</html>
<?php include_once ('includes/footer.php'); ?>