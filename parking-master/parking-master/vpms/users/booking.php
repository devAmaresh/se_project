<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
include_once ('includes/header.php');
include_once ('includes/sidebar.php');
error_reporting(0);
if (strlen($_SESSION['vpmsuid']==0)) {
  header('location:logout.php');
  } 
$result = null;
if (isset($_GET['city'])) {
 $city = $_GET['city'];

 $sql = "SELECT * FROM parkinglot WHERE city = '$city'";
 $result = mysqli_query($con, $sql);
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
 <div class="p-5 bg-white">
  <h2>Available Parking Lots</h2>
  <form id="cityForm" method="get" action="">
   <select id="citySelect" name="city" onchange="this.form.submit()">
    <option value="">Select City</option>
    <!-- Add options dynamically based on your requirements -->
    <option value="Kolkata">Kolkata</option>
    <option value="Jaipur">Jaipur</option>
    <!-- Add more options as needed -->
   </select>
  </form>
  <div id="parkingLotList">
   <?php
   if ($result && mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
     echo '
         <div class="p-5 bg-white">
             <div class="card" style="width: 18rem;">
                 <img src="https://png.pngtree.com/png-clipart/20230414/original/pngtree-car-parking-sign-design-template-png-image_9055936.png" class="card-img-top" alt="...">
                 <div class="card-body">
                     <h5 class="card-title">' . $row['city'] . '</h5>
                     <p class="card-text">Available Slots: ' . ($row['totalSlot'] - $row['bookedSlot']) . '</p>';

     // Check if slots are available
     if (($row['totalSlot'] - $row['bookedSlot']) > 0) {
      echo '<a href="book_form.php?city=' . $row['city'] . '" class="btn btn-primary">Book Now</a>';
     } else {
      echo '<a href="#" class="btn btn-primary">Filled</a>';
     }

     echo '
                 </div>
             </div>
         </div>';
    }
   } else {
    // If no city selected or no data found, display a message
    echo "<p>Kindly select a city</p>";
   }

   ?>
  </div>
 </div>

</body>

</html>