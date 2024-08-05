<?php
include_once("auth.php");
include_once("DatabaseConn.php");

$searchTerm = ""; // Initialize $searchTerm variable
$colorSearchTerm = ""; // Initialize $colorSearchTerm variable

if (isset($_GET['search'])) {
    $searchTerm = $_GET['search'];
}

if (isset($_GET['colorSearch'])) {
    $colorSearchTerm = $_GET['colorSearch'];
}

// Modify SQL query based on selected category and pack
$categoryFilter = isset($_GET['category']) ? $_GET['category'] : '';
$packFilter = isset($_GET['pack']) ? $_GET['pack'] : '';

$query = "SELECT * FROM `product` WHERE 1";
if (!empty($searchTerm)) {
    $query .= " AND `title` LIKE '%$searchTerm%'";
}
if (!empty($colorSearchTerm)) {
    $query .= " AND `color` LIKE '%$colorSearchTerm%'";
}
if (!empty($categoryFilter)) {
    $query .= " AND `cate_id` = '$categoryFilter'";
}
if (!empty($packFilter)) {
    $query .= " AND `pack` = '$packFilter'";
}

$result = mysqli_query($conn, $query);

// Check for products with zero quantity
$zeroQuantityQuery = "SELECT * FROM `product` WHERE `quantity` = 0";
$zeroQuantityResult = mysqli_query($conn, $zeroQuantityQuery);
$zeroQuantityCount = mysqli_num_rows($zeroQuantityResult);

// Collect names of products with zero quantity
$zeroQuantityNames = [];
while ($row = mysqli_fetch_assoc($zeroQuantityResult)) {
    $zeroQuantityNames[] = $row['color'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Dashboard - Show Product</title>
    <link rel="icon" type="image/x-icon" href="img/mylogo.webp">
    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>
<body id="page-top">
    <?php include_once("Header.php"); ?>
    <div id="wrapper">
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <div class="container-fluid">
                    <h1 class="h3 mb-2 text-gray-800">Product Details</h1>

                    <!-- Notification for products with zero quantity -->
                    <?php if ($zeroQuantityCount > 0) { ?>
                        <div class="alert alert-danger" role="alert">
                            <strong>Attention!</strong> There are <?php echo $zeroQuantityCount; ?> products with zero quantity.
                            <?php if ($zeroQuantityCount > 5) { ?>
                                <button id="showZeroQuantityProductsBtn" class="btn btn-primary btn-sm">Show More</button>
                            <?php } ?>
                            <div id="zeroQuantityProductNames" style="display: none; margin-top: 10px;">
                                <ul>
                                    <?php foreach ($zeroQuantityNames as $name) { ?>
                                        <li><?php echo $name; ?></li>
                                    <?php } ?>
                                </ul>
                            </div>
                        </div>
                    <?php } ?>
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <div class="row">
                                <div class="col-md-6">
                                    <a href="ProductAdd.php" class="btn btn-success">Add New</a>
                                </div>
                                <div class="col-md-6">
                                    <form method="GET" action="">
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" placeholder="Search by Name" name="search" value="<?php echo $searchTerm; ?>">
                                            <input type="text" class="form-control" placeholder="Search by Color" name="colorSearch" value="<?php echo $colorSearchTerm; ?>">
                                            <select class="form-control" name="category">
                                                <option value="">Select Category</option>
                                                <!-- Populate categories from database -->
                                                <?php
                                                $categories_query = "SELECT * FROM categories";
                                                $categories_result = mysqli_query($conn, $categories_query);
                                                while ($category = mysqli_fetch_assoc($categories_result)) {
                                                    $selected = ($category['cate_id'] == $categoryFilter) ? 'selected' : '';
                                                    echo "<option value='".$category['cate_id']."' $selected>".$category['cate_name']."</option>";
                                                }
                                                ?>
                                            </select>
                                            <select class="form-control" name="pack">
                                                <option value="">Select Pack</option>
                                                <!-- Populate packs from database -->
                                                <?php
                                                $packs_query = "SELECT DISTINCT `pack` FROM product";
                                                $packs_result = mysqli_query($conn, $packs_query);
                                                while ($pack = mysqli_fetch_assoc($packs_result)) {
                                                    $selected = ($pack['pack'] == $packFilter) ? 'selected' : '';
                                                    echo "<option value='".$pack['pack']."' $selected>".$pack['pack']."</option>";
                                                }
                                                ?>
                                            </select>
                                            <button class="btn btn-outline-secondary" type="submit">Filter</button>
                                        </div>
                                    </form>
                                </div>
                                <?php if (isset($_GET["add"])) { ?>
                                    <div class="container-fluid hide">
                                        <p class="bg-success text-light p-1 text-center"><b>Product Add Success</b></p>
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
                                            <th>Cate</th>
                                            <th>Title</th>
                                            <th>Color</th>
                                            <th>Pack</th>
                                            <th>Quantity</th>
                                            <th>Price</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if(mysqli_num_rows($result)){
                                            $totalQuantity = 0;
                                            $totalAmount = 0;
                                            while($row = mysqli_fetch_array($result)){
                                                $cat_id = $row[1];
                                                $cat_nameQ = "SELECT * FROM `categories` where cate_id = $cat_id"; 
                                                $cat_name = mysqli_query($conn,$cat_nameQ);
                                                $fetch_cat_name = mysqli_fetch_assoc($cat_name);
                                                
                                                // Calculate total quantity and amount
                                                $totalQuantity += $row[5];
                                                $totalAmount += ($row[5] * $row[6]);
                                        ?>
                                        <tr>
                                            <td><?php echo $row[0];?></td>
                                            <td><?php echo $fetch_cat_name['cate_name'];?></td>
                                            <td><?php echo $row[2];?></td>
                                            <td><?php echo $row[3];?></td>
                                            <td><?php echo $row[4];?></td>
                                            <td><?php echo $row[5];?></td>
                                            <td><?php echo $row[6];?></td>
                                            <td><a href="productedit.php?id=<?=$row['id']?>" class="btn btn-success" >Edit</a> | <a href="productdelete.php?id=<?=$row['id']?>" class="btn btn-danger">Delete</a></td>
                                        </tr>
                                        <?php
                                            }
                                        } else {
                                            echo "<tr><td colspan='8'>No records found.</td></tr>";
                                        }
                                        ?>

             
                                    </tbody>
                                </table>
                                <!-- Table end -->
                            </div>
                        </div>
                    </div>
                    <!-- Additional table for total quantity and amount -->
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <h5 class="card-title">Total Quantity and Amount</h5>
                            <div class="table-responsive">
                                <table class="table table-bordered" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Total Quantity</th>
                                            <th>Total Amount</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><?php echo $totalQuantity; ?></td>
                                            <td><?php echo $totalAmount; ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Your Website <?php echo date("Y"); ?></div>
                        <div>
                            <a href="#">Privacy Policy</a>
                            &middot;
                            <a href="#">Terms &amp; Conditions</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>
        <script src="js/jquery-3.6.3.min.js"></script>
        <!-- Bootstrap core JavaScript-->
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- Core plugin JavaScript-->
        <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
        <!-- Custom scripts for all pages-->
        <script src="js/sb-admin-2.min.js"></script>
        <!-- Page level plugins -->
        <script src="vendor/datatables/jquery.dataTables.min.js"></script>
        <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>
        <!-- Page level custom scripts -->
        <script src="js/demo/datatables-demo.js"></script>
         <script>
            $(document).ready(function() {
                // Show more functionality for product table
                $('#showMoreBtn').click(function() {
                    $('#dataTable tbody tr.d-none').slice(0, 5).removeClass('d-none');
                    if ($('#dataTable tbody tr.d-none').length == 0) {
                        $('#showMoreBtn').hide();
                    }
                });

                // Show more functionality for zero quantity products
                $('#showZeroQuantityProductsBtn').click(function() {
                    $('#zeroQuantityProductNames').toggle();
                });
            });
        </script>
    </body>
    </html>
