<?php
include_once("DatabaseConn.php");

$search = isset($_GET['search']) ? $_GET['search'] : '';
$whereClause = !empty($search) ? " WHERE homeexpense.userid LIKE '%$search%' OR homeexpense.Product LIKE '%$search%'" : '';

$query = "SELECT * FROM `homeexpense` $whereClause";
$result = mysqli_query($conn, $query);

$totalAmount = 0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <meta name="description" content=""/>
    <meta name="author" content=""/>
    <title>Dashboard - Expense</title>
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
                <h1 class="h3 mb-2 text-gray-800">Home Expense Details</h1>
                
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <div class="row">
                            <div class="col-md-6">
                                <a href="ExpenseAdd.php" class="btn btn-success">Add New</a>
                            </div>
                            <div class="col-md-6">
                                <form method="GET" action="">
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" placeholder="Search by Name" name="search" value="<?= htmlspecialchars($search) ?>">
                                        <button class="btn btn-outline-secondary" type="submit">Search</button>
                                    </div>
                                </form>
                            </div>
                            <?php if (isset($_GET["add"])) { ?>
                                <div class="container-fluid hide">
                                    <p class="bg-success text-light p-1 text-center"><b>Home Expense Add Success</b></p>
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
                                        <th>User</th>
                                        <th>Product</th>
                                        
                                        <th>Date</th>
                                        <th>Price</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                if (mysqli_num_rows($result) > 0) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $totalAmount += $row['price']; // Add price to total amount
                                        ?>
                                        <tr>
                                            <td><?= $row['id']; ?></td>
                                            <td><?= $row['userid']; ?></td>
                                            <td><?= $row['product']; ?></td>
                                            
                                            <td><?= $row['date']; ?></td>
                                            <td><?= $row['price']; ?></td>
                                            <td><a href="ExpenseDelete.php?id=<?= $row['id'] ?>" class="btn btn-danger">Delete</a></td>
                                        </tr>
                                        <?php
                                    }
                                } else {
                                    ?>
                                    <tr>
                                        <td colspan="7">No records found</td>
                                    </tr>
                                    <?php
                                }

                                // Notification if total amount exceeds 200000
                                if ($totalAmount > 200000) {
                                    ?>
                                    <tr>
                                        <td colspan="5" style="color: red; font-weight: bold;">
                                            Total expense amount exceeds 200000. Please review your expenses.
                                        </td>
                                    </tr>
                                    <?php
                                }
                                ?>
                                <tr>
                                    <td colspan="4" style="text-align: right;"><b>Total:</b></td>
                                    <td><?= $totalAmount; ?></td>
                                    <td></td> <!-- Empty cell for alignment -->
                                </tr>
                                </tbody>
                            </table>
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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="js/scripts.js"></script>
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
<script src="js/datatables-simple-demo.js"></script>
</body>
</html>
