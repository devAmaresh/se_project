<?php
session_start();
include_once ('includes/header.php');
include_once ('includes/sidebar.php');
include ('includes/dbconnection.php');

if (isset($_POST['submit'])) {
 if (empty($_POST['VehicleCategory']) || empty($_POST['VehicleCompanyname']) || empty($_POST['RegistrationNumber']) || empty($_POST['inTime'])) {
  echo "<script>alert('Please fill in all fields')</script>";
 } else {
  // Catching form details
  $vehicleCategory = $_POST['VehicleCategory'];
  $vehicleCompanyName = $_POST['VehicleCompanyname'];
  $registrationNumber = $_POST['RegistrationNumber'];
  $user_id = $_SESSION['vpmsuid'];
  $city = $_GET['city'];
  $OwnerContactNumber = $_SESSION['vpmsumn'];
  $inTime = $_POST['inTime'];
  $sql1 = "SELECT * FROM tblregusers WHERE ID = '$user_id'";
  $result1 = mysqli_query($con, $sql1);
  $row1 = mysqli_fetch_array($result1);
  $OwnerName = $row1['FirstName'] . ' ' . $row1['LastName'];
  $parkingnumber = time() . rand(0, 10000000);
  $sql2 = "INSERT INTO tblvehicle (ParkingNumber,OwnerName, OwnerContactNumber, VehicleCategory, VehicleCompanyName, RegistrationNumber,InTime) VALUES ('$parkingnumber','$OwnerName', '$OwnerContactNumber', '$vehicleCategory', '$vehicleCompanyName', '$registrationNumber', '$inTime')";
  $result2 = mysqli_query($con, $sql2);
  $sql ="SELECT * FROM parkinglot WHERE city='$city'";
  $result = mysqli_query($con, $sql);
  $parkinglot_id = $result->fetch_assoc()['id'];
  $sql3 = "INSERT INTO booking (user_id,parking_id,parkinglot_id) VALUES ('$user_id','$parkingnumber','$parkinglot_id')";
  $result3 = mysqli_query($con, $sql3);
  $sql4 = "UPDATE parkinglot SET bookedSlot = bookedSlot+1 WHERE id = '$parkinglot_id'";
  $result4 = mysqli_query($con, $sql4);
  if ($result4) {
   echo '<script>alert("Booking successfully"); window.location="view-vehicle.php";</script>';

  } else {
   echo '<script>alert("Booking unsuccessfull..Plz retry"); window.location="book_form.php";</script>';

  }
 }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>Booking</title>
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

<body>
 <form class="p-5" method="post" action="">
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
   <input type="datetime-local" class="form-control" id="registrationNumber" name="inTime">
  </div>
  <button type="submit" class="btn btn-primary" name="submit">Submit</button>
 </form>
</body>
<?php include_once ('includes/footer.php'); ?>

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