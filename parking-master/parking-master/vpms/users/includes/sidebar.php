<?php
$current_page = basename($_SERVER['PHP_SELF']);
?>
 <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">
            <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
    <li class="<?php if($current_page == 'dashboard.php') echo 'active'; ?>">
        <a href="dashboard.php"><i class="menu-icon fa fa-laptop"></i>Dashboard </a>
    </li>
    <li class="<?php if($current_page == 'view-vehicle.php') echo 'active'; ?>">
        <a href="view-vehicle.php"> <i class="menu-icon ti-truck"></i>View Vehicle </a>
    </li>
    <li class="<?php if($current_page == 'booking.php') echo 'active'; ?>">
        <a href="booking.php"> <i class="menu-icon ti-bookmark-alt"></i>Booking </a>
    </li>
</ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside>