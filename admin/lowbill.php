<?php
include_once("auth.php"); 
include_once("DatabaseConn.php");

class BillingForm {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function generateCustomerOptions() {
        $selectquery = "SELECT * FROM `lowitempurchase`";
        $selectresult = mysqli_query($this->conn, $selectquery);

        if(mysqli_num_rows($selectresult) > 0) {
            while ($selectdata = mysqli_fetch_array($selectresult)) {
                echo '<option value="' . $selectdata[0] . '">' . $selectdata[1] . '</option>';
            }
        }
    }
}

// Create an instance of BillingForm
$billingForm = new BillingForm($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Dashboard - Admin</title>
    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>
<body class="sb-nav-fixed">
    <?php include_once("Header.php") ?>

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Billing Data</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
                <form action="lowbillprint.php" method="POST">
                    <label for="">Select Customer</label>
                    <select name="customer" class="form-control">
                        <option>Select</option>
                        <?php $billingForm->generateCustomerOptions(); ?>
                    </select>
                    <br>
                    <?php if(isset($_GET["add"])): ?>
                        <div class="container-fluid hide">
                            <p class="bg-success text-light p-1 text-center"><b>Bill add success</b></p>
                        </div>
                    <?php endif; ?>
                    <div class="form-group">
                        <label for="">Start Date</label>
                        <input type="date" name="startdate" class="form-control">
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="">End Date</label>
                        <input type="date" name="enddate" class="form-control">
                    </div>
                    <br><br>
                    <div class="form-group">
                        <input type="submit" value="Generate Bill" name="submit" class="btn btn-success">
                    </div>
                </form>
            </div>
        </main>
        <footer class="py-4 bg-light mt-auto">
            <div class="container-fluid px-4">
                <div class="d-flex align-items-center justify-content-between small">
                    <div class="text-muted">Copyright &copy; Your Website 2023</div>
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
</body>
</html>
