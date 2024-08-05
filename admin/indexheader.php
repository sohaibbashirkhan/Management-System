<?php
include_once("DatabaseConn.php");
?>  
 <!-- Page Wrapper -->
 <div id="wrapper">

<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Admin <sup>login</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="index.php">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Interface
    </div>
    <li class="nav-item">
                <a class="nav-link" href="Daily.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Daily Expense  </span></a>
            </li>
    <li class="nav-item">
                <a class="nav-link" href="category.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Category </span></a>
            </li>
             <div class="sidebar-heading">
        Other Details
    </div>
    <hr class="sidebar-divider">
    <!--<li class="nav-item">-->
    <!--    <a class="nav-link" href="Company.php">-->
    <!--        <i class="fas fa-fw fa-table"></i>-->
    <!--        <span>Add Company </span></a>-->
    <!--</li>-->
            <li class="nav-item">
                <a class="nav-link" href="Product.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Product</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="Purchase.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>LocalPurchase</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="Order.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Sales </span></a>
            </li>  
            <!-- <div class="sidebar-heading">-->
            <!--   Low Item -->
            <!--</div>-->
                         <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOne"
        aria-expanded="true" aria-controls="collapseOne">
        <i class="fas fa-fw fa-cog"></i>
        <span>Low Item Details</span>
    </a>
    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionSidebar">
        <div class="bg-white py-3 collapse-inner rounded">
            <h6 class="collapse-header">Low Item Details :</h6>
             <a class="collapse-item" href="lowcategory.php">Low Category </a>
            <a class="collapse-item" href="lowproduct.php">Low Product </a>
            <a class="collapse-item" href="lowpurchase.php">Low Purchase</a>
            <a class="collapse-item" href="lowitem_order.php">Low Sell</a>
        </div>
    </div>
</li>
    <div class="sidebar-heading">
        Add Details 
    </div>
    <hr class="sidebar-divider">
     <!--Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Company Details</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Company Details :</h6>
                <!--<a class="collapse-item" href="Company.php">Company</a>-->
                <a class="collapse-item" href="CompanyOrder.php">Company Order</a>
                <a class="collapse-item" href="CompanyProduct.php">Company Product </a>
                <a class="collapse-item" href="TokenCash.php">Token Cash</a>

            </div>
        </div>
    </li>

    <!-- Nav Item - Utilities Collapse Menu -->
   <!-- Nav Item - Utilities Collapse Menu -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
        aria-expanded="true" aria-controls="collapseUtilities">
        <i class="fas fa-fw fa-wrench"></i>
        <span>Credit Details</span>
    </a>
    <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
        data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Credits About :</h6>
            <a class="collapse-item" href="Credit.php">Credit </a>
            <a class="collapse-item" href="CreditOrder.php">Credit Order</a>
           
        </div>
    </div>
</li>

<!-- Divider -->

<!-- Heading -->

<!-- Nav Item - Pages Collapse Menu -->
<!--<li class="nav-item">-->
<!--    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"-->
<!--        aria-expanded="true" aria-controls="collapsePages">-->
<!--        <i class="fas fa-fw fa-folder"></i>-->
<!--        <span>Home Details</span>-->
<!--    </a>-->
<!--    <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">-->
<!--        <div class="bg-white py-2 collapse-inner rounded">-->
<!--            <h6 class="collapse-header">Home Expense :</h6>-->
<!--            <a class="collapse-item" href="HomeM.php">Home Member</a>-->
<!--            <a class="collapse-item" href="Expense.php">Home Expense</a>-->
<!--            <a class="collapse-item" href="HomeProduct.php">Home Product</a>-->
<!--        </div>-->
<!--    </div>-->
<!--</li>-->
 <li class="nav-item">
                <a class="nav-link" href="Expense.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Home Expense</span></a>
            </li>
    <div class="sidebar-heading">
        Other Details
    </div>
    <hr class="sidebar-divider">
     <li class="nav-item">
        <a class="nav-link" href="attendance.php">
            <i class="fas fa-fw fa-table"></i>
            <span>Working Time</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="Labour.php">
            <i class="fas fa-fw fa-table"></i>
            <span>Labour Expense</span></a>
    </li>
     <li class="nav-item">
        <a class="nav-link" href="Expense.php">
            <i class="fas fa-fw fa-table"></i>
            <span>Home Expense</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="Contact.php">
            <i class="fas fa-fw fa-table"></i>
            <span>User Contact </span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="UserShow.php">
            <i class="fas fa-fw fa-table"></i>
            <span>Admin </span></a>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>
<!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <form action="search.php" method="GET" class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
    <div class="input-group">
        <input type="text" name="search_query" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
        <div class="input-group-append">
            <button class="btn btn-primary" type="submit">
                <i class="fas fa-search fa-sm"></i>
            </button>
        </div>
    </div>
</form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

 <!-- Nav Item - Alerts -->
<li class="nav-item dropdown no-arrow mx-1">
    <a class="nav-link dropdown-toggle" href="index.php" id="alertsDropdown" role="button"
        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-bell fa-fw"></i>
        <!-- Counter - Alerts -->
        <span class="badge badge-danger badge-counter"></span>
    </a>
    <!-- Dropdown - Alerts -->
    <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
        aria-labelledby="alertsDropdown">
        <h6 class="dropdown-header">
            Alerts Center
        </h6>
        <?php

// Retrieving current date
$current_date = date("Y-m-d");

// Retrieving data from database
$sql = "SELECT creditorders.dateend, credit.id AS userid, credit.name FROM creditorders INNER JOIN credit ON creditorders.Userid = credit.id WHERE creditorders.dateend <= '$current_date'";
$result = $conn->query($sql);

if ($result === false) {
    // Query execution failed
    echo "Error: " . $conn->error;
} else {
    if ($result->num_rows > 0) {
        // Output data of each row
        while($row = $result->fetch_assoc()) {
            echo "<a class='dropdown-item d-flex align-items-center' href='#'>";
            echo "<div class='mr-3'>";
            echo "<div class='icon-circle bg-primary'>";
            echo "<i class='fas fa-file-alt text-white'></i>";
            echo "</div>";
            echo "</div>";
            echo "<div>";
            echo "<div class='small text-gray-500'>" . $row["dateend"] . "</div>";
            echo "<span class='font-weight-bold'>" . $row["userid"] . " -: " . $row["name"] . "</span>";
            echo "</div>";
            echo "</a>";
        }
    } else {
        echo "<a class='dropdown-item d-flex align-items-center' href='#'>No notifications found</a>";
    }
}
?>

        <!-- End Dynamic Notifications -->
        <a class="dropdown-item text-center small text-gray-500" href="CreditOrder.php">Show All Alerts</a>
    </div>
</li>

<script>
    // Update notification count
    function updateNotificationCount(count) {
        var badgeCounter = document.querySelector('.badge-counter');
        if (badgeCounter) {
            badgeCounter.textContent = count;
        }
    }

    // Call this function with the count of notifications from your server side
    updateNotificationCount(<?php echo $result->num_rows; ?>);
</script>


<li class="nav-item dropdown no-arrow mx-1">
    <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"
        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-envelope fa-fw"></i>
        <!-- Counter - Messages -->
        <?php
        // Calculate total expense amount
        include_once("DatabaseConn.php");
        $query = "SELECT SUM(price) AS total FROM homeexpense";
        $result = mysqli_query($conn, $query);
        $totalAmount = 0;
        if ($row = mysqli_fetch_assoc($result)) {
            $totalAmount = $row['total'];
        }

        // Check if total amount exceeds 200000
        if ($totalAmount > 200000) {
            ?>
            <span class="badge badge-danger badge-counter">!</span>
            <?php
        } else {
            ?>
            <span class="badge badge-success badge-counter">0</span>
            <?php
        }
        ?>
    </a>
    <!-- Dropdown - Messages -->
    <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
        aria-labelledby="messagesDropdown">
        <h6 class="dropdown-header">
            Message Center
        </h6>
        <?php
        // Display a specific message if total amount exceeds 200000
        if ($totalAmount > 200000) {
            ?>
            <a class="dropdown-item d-flex align-items-center" href="#">
                <div class="font-weight-bold">
                    <div class="text-truncate">Total expense amount exceeds 200000. Please review your expenses.</div>
                </div>
            </a>
            <?php
        }
        ?>
        <!-- Your existing messages -->
        <a class="dropdown-item d-flex align-items-center" href="#">
            <!-- Message content -->
        </a>
        <a class="dropdown-item text-center small text-gray-500" href="Expense.php">Show All Alerts</a>
    </div>
</li>


                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Ishtiaq Paint</span>
                                <img class="img-profile rounded-circle"
                                    src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Activity Log
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="logout.php">
    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
    Logout
</a> 
<!-- data-toggle="modal" data-target="#logoutModal" -->

                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->
