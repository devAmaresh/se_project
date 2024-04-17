<?php
session_start();
error_reporting(0);
include ('includes/dbconnection.php');
include_once ('includes/header.php');
include_once ('includes/sidebar.php');
error_reporting(0);
if (strlen($_SESSION['vpmsuid'] == 0)) {
    header('location:logout.php');
}
$result = null;
$alert = 0;
if (isset($_GET['city'])) {
    $city = $_GET['city'];
    $sql = "SELECT * FROM parkinglot WHERE city LIKE '$city%'";
    $result = mysqli_query($con, $sql);
    if (mysqli_num_rows($result) == 0) {
        $alert = $alert + 1;
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
    <div class="px-5 py-2 bg-white">
        <?php
        if ($alert > 0) {
            echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
            <strong>No city found</strong> Please try again with a different city name.
            <button type='button' class='close' data-dismiss='alert' aria-label='Close' onclick='closeAlert()'>
            <span aria-hidden='true'>&times;</span>
            </button>
          </div>";
        }
        ?>
        <div>
            <h2 class="mb-2">Available Parking Lots</h2>
            <form action="booking.php" method="get" onsubmit="return validateForm()">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Search by city" name="city">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit">Search</button>
                        <button class="btn btn-secondary" type="button" onclick="clearFilter()">Clear Filter</button>
                    </div>
                </div>
            </form>
        </div>

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
                        echo '<button class="btn btn-primary text-white" disabled>Filled</button>';
                    }

                    echo '
                 </div>
             </div>
         </div>';
                }
            } else {
                $cardsPerPage = 3;

                // Get the current page number from the URL parameter
                $page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int) $_GET['page'] : 1;

                // Calculate the SQL LIMIT clause
                $offset = ($page - 1) * $cardsPerPage;

                // SQL query to fetch records with pagination
                $sqln = "SELECT * FROM parkinglot LIMIT $offset, $cardsPerPage";
                $resultn = mysqli_query($con, $sqln);

                // Check if records are found
                if (mysqli_num_rows($resultn) > 0) {
                    echo '<div class="row">';
                    while ($row = mysqli_fetch_assoc($resultn)) {
                        echo '
            <div class="col-md-4">
                <div class="pt-3 mt-2 px-5 pb-0 bg-white">
                    <div class="card" style="width: 18rem;">
                        <img src="https://png.pngtree.com/png-clipart/20230414/original/pngtree-car-parking-sign-design-template-png-image_9055936.png" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">' . $row['city'] . '</h5>
                            <p class="card-text">Available Slots: ' . ($row['totalSlot'] - $row['bookedSlot']) . '</p>';
                        // Check if slots are available
                        if (($row['totalSlot'] - $row['bookedSlot']) > 0) {
                            echo '<a href="book_form.php?city=' . $row['city'] . '" class="btn btn-primary">Book Now</a>';
                        } else {
                            echo '<button class="btn btn-primary text-white" disabled>Filled</button>';
                        }
                        echo '
                        </div>
                    </div>
                </div>
            </div>';
                    }
                    echo '</div>'; // Close the row
            
                    // Pagination links
                    $sqlCount = "SELECT COUNT(*) AS total FROM parkinglot";
                    $resultCount = mysqli_query($con, $sqlCount);
                    $rowCount = mysqli_fetch_assoc($resultCount)['total'];
                    $totalPages = ceil($rowCount / $cardsPerPage);

                    echo '<ul class="pagination justify-content-center mt-0">';
                    if ($page > 1) {
                        echo '<li class="page-item"><a class="page-link" href="?page=' . ($page - 1) . '">Previous</a></li>';
                    }

                    $startPage = max(1, $page - 1);
                    $endPage = min($totalPages, $startPage + 2);

                    for ($i = $startPage; $i <= $endPage; $i++) {
                        echo '<li class="page-item ' . ($page == $i ? 'active' : '') . '"><a class="page-link" href="?page=' . $i . '">' . $i . '</a></li>';
                    }

                    if ($page < $totalPages) {
                        echo '<li class="page-item"><a class="page-link" href="?page=' . ($page + 1) . '">Next</a></li>';
                    }
                    echo '</ul>';

                } else {
                    echo "No parking lots available";
                }

            }

            ?>
        </div>
    </div>
    <script>
        function clearFilter() {
            window.location.href = 'booking.php';
        }
        function validateForm() {
            var city = document.querySelector('input[name="city"]').value.trim();
            if (city === '') {
                alert('Please enter a city name');
                return false; // Prevent form submission
            }
            return true; // Allow form submission
        }
        function closeAlert() {
        let alertElement = document.querySelector('.alert');
        alertElement.style.display = 'none';
    }
    </script>

</body>

</html>