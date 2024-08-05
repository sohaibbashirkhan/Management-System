<?php
include_once("auth.php");
include_once("DatabaseConn.php");

// Initialize variables
$search = isset($_GET['search']) ? $_GET['search'] : '';
$date = isset($_GET['date']) ? $_GET['date'] : '';

// Process search query
$whereClause = "WHERE 1=1"; // Default where clause

if (!empty($search)) {
    $whereClause .= " AND c.name LIKE '%$search%'";
}

if (!empty($date)) {
    $whereClause .= " AND DATE(co.`Date`) = '$date'";
}

$query = "SELECT co.*, c.name AS username, co.`quantity` * co.`price` AS `fullPrice` 
          FROM `creditorders` co 
          INNER JOIN `credit` c ON co.`Userid` = c.`id` 
          $whereClause"; 

// Perform the query
$result = mysqli_query($conn, $query);

// Include the header file
include_once("Header.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Dashboard - Credit Order</title>
    <link rel="icon" type="image/x-icon" href="img/mylogo.webp">

    <!-- Custom fonts -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <!-- Custom styles -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <!-- Custom styles for DataTables -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>
<body id="page-top">

<?php include_once("Header.php"); ?>

<div id="wrapper">
    <div id="content-wrapper" class="d-flex flex-column">
        <div id="content">
            <div class="container-fluid">
                <h1 class="h3 mb-2 text-gray-800"> Credit Order Details</h1>
                 
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <div class="row">
                            <div class="col-md-4">
                                <a href="CreditOrderAdd.php" class="btn btn-success">Add New</a>
                            </div>
                            <div class="col-md-4">
                                <form method="GET" action="">
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" placeholder="Search by Name" name="search" value="<?= htmlspecialchars($search) ?>">
                                        <button class="btn btn-outline-secondary" type="submit">Search</button>
                                    </div>
                                </form>
                            </div>
                            <div class="col-md-4">
                                <form method="GET" action="">
                                    <div class="input-group mb-3">
                                        <input type="date" class="form-control" name="date" value="<?= htmlspecialchars($date) ?>">
                                        <button class="btn btn-outline-secondary" type="submit">Filter by Date</button>
                                    </div>
                                </form>
                            </div>
                            <?php if (isset($_GET["add"])) { ?>
                                <div class="container-fluid hide">
                                    <p class="bg-success text-light p-1 text-center"><b>Order Add Success</b></p>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Username</th>
                                        <th>C_Name</th>
                                        <th>P_Name</th>
                                        <th>Color</th>
                                        <th>Pack</th>
                                        <th>Quantity</th>
                                        <th>U_Price</th>
                                        <th>T_Price</th>
                                        <th>Date</th>
                                        <th>Date End</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Query -->
                                    <?php
                                    $totalAmount = 0; // Initialize total amount
                                    if (mysqli_num_rows($result)) {
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            $totalAmount += $row['fullPrice']; // Add full price to total amount
                                            $pro_id = $row['product_id'];
                                            $cat_id = $row['cate_id'];
                                            $product_nameQ = "SELECT * FROM `product` WHERE id = $pro_id";
                                            $cat_nameQ = "SELECT * FROM `categories` WHERE cate_id = $cat_id";

                                            $product_name = mysqli_query($conn, $product_nameQ);
                                            $cat_name = mysqli_query($conn, $cat_nameQ);

                                            $fetch_pro_name = mysqli_fetch_assoc($product_name);
                                            $fetch_cat_name = mysqli_fetch_assoc($cat_name);

                                            ?>
                                            <tr>
                                                <td><?php echo $row['id']; ?></td>
                                                <td><?php echo $row['username']; ?></td>
                                                <td><?php echo $fetch_cat_name['cate_name']; ?></td>
                                                <td><?php echo $fetch_pro_name['title']; ?></td>
                                                <td><?php echo $fetch_pro_name['color']; ?></td>
                                                <td><?php echo $row['item']; ?></td>
                                                <td><?php echo $row['Quantity']; ?></td>
                                                <td><?php echo $row['Price']; ?></td>
                                                <td><?php echo $row['fullPrice']; ?></td>
                                                <td><?php echo $row['Date']; ?></td>
                                                <td><?php echo $row['Dateend']; ?></td>
                                                <td>
                                                    <a href="CreditBill.php?id=<?= $row['id'] ?>" class="btn btn-info">Print</a>
                                                    <a href="CreditOrderDelete.php?id=<?= $row['id'] ?>" class="btn btn-danger">Delete</a>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                    } else {
                                        echo "<tr><td colspan='12'>No records found</td></tr>";
                                    }
                                    ?>
                                </tbody>
                                <!-- Display total amount row -->
                                <tfoot>
                                    <tr>
                                        <td colspan="8" style="text-align: right;"><b>Total:</b></td>
                                        <td><?php echo $totalAmount; ?></td>
                                        <td></td> <!-- Empty cell for alignment -->
                                    </tr>
                                </tfoot>
                            </table>
                            <!-- table end -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Footer -->
<footer class="py-4 bg-light mt-auto">
    <div class="container-fluid px-4">
        <div class="d-flex align-items-center justify-content-between small">
            <div class="text-muted">Copyright &copy; Your Website <?= date("Y") ?></div>
            <div>
                <a href="#">Privacy Policy</a>
                &middot;
                <a href="#">Terms &amp; Conditions</a>
            </div>
        </div>
    </div>
</footer>
<!-- End of Footer -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Scripts -->
<script src="js/jquery-3.6.3.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="vendor/datatables/jquery.dataTables.min.js"></script>
<script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>
<script src="js/sb-admin-2.min.js"></script>
<script src="js/demo/datatables-demo.js"></script>
</body>
</html>
