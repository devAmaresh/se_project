<?php
// Get the current filename
$current_page = basename($_SERVER['PHP_SELF']);
?>

<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">
        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="<?php if($current_page == 'dashboard.php') echo 'active'; ?>">
                    <a href="dashboard.php"><i class="menu-icon fa fa-laptop"></i>Dashboard</a>
                </li>
                <li class="menu-item-has-children dropdown <?php if($current_page == 'add-category.php' || $current_page == 'manage-category.php') echo 'active'; ?>">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="menu-icon fa fa-table"></i>Vehicle Category</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="fa fa-table"></i><a href="add-category.php">Add Category</a></li>
                        <li><i class="fa fa-table"></i><a href="manage-category.php">Manage Category</a></li>
                    </ul>
                </li>
                <li class="<?php if($current_page == 'add-vehicle.php') echo 'active'; ?>">
                    <a href="add-vehicle.php"><i class="menu-icon ti-email"></i>Add Vehicle</a>
                </li>
                <li class="menu-item-has-children dropdown <?php if($current_page == 'manage-incomingvehicle.php' || $current_page == 'manage-outgoingvehicle.php') echo 'active'; ?>">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="menu-icon fa fa-th"></i>Manage Vehicle</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="menu-icon fa fa-th"></i><a href="manage-incomingvehicle.php">Manage In Vehicle</a></li>
                        <li><i class="menu-icon fa fa-th"></i><a href="manage-outgoingvehicle.php">Manage Out Vehicle</a></li>
                    </ul>
                </li>
                <li class="menu-item-has-children dropdown <?php if($current_page == 'bwdates-report-ds.php') echo 'active'; ?>">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="menu-icon fa fa-th"></i>Reports</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="menu-icon fa fa-th"></i><a href="bwdates-report-ds.php">Between Dates Reports</a></li>
                    </ul>
                </li>
                <li class="<?php if($current_page == 'search-vehicle.php') echo 'active'; ?>">
                    <a href="search-vehicle.php"><i class="menu-icon fa fa-search"></i>Search Vehicle</a>
                </li>
                <li class="<?php if($current_page == 'reg-users.php') echo 'active'; ?>">
                    <a href="reg-users.php"><i class="menu-icon ti-user"></i>Reg Users</a>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
</aside>
