<?php
include_once("auth.php"); 
include_once("DatabaseConn.php");

class ExpenseEditor {
    private $conn;
    private $expenseData;

    public function __construct($conn) {
        $this->conn = $conn;
        $this->fetchExpenseData();
    }

    private function fetchExpenseData() {
        if(isset($_GET['id'])) {
            $id = mysqli_real_escape_string($this->conn, $_GET['id']);
            $query = "SELECT * FROM dailyexpense WHERE id='$id'";
            $result = mysqli_query($this->conn, $query);
            $this->expenseData = mysqli_fetch_assoc($result);
        }
    }

    public function displayExpenseEditForm() {
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="utf-8" />
            <meta http-equiv="X-UA-Compatible" content="IE=edge" />
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
            <meta name="description" content="" />
            <meta name="author" content="" />
            <title>Dashboard - Daily Expense Edit</title>
                <link rel="icon" type="image/x-icon" href="img/mylogo.webp">

 <!-- Custom fonts for this template -->
 <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
        </head>
        <body class="sb-nav-fixed">
    <?php include_once("Header.php"); ?>

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Edit Daliy Expense</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Edit Daliy Expense Dashboard</li>
                </ol>
                            <form action ="DailyExpenseUpdate.php?id=<?= $this->expenseData['id'] ?>" method="POST">
                                <div class="mb-3">
                                    <label for="" class="form-label">Name</label>
                                    <input type="text" value="<?= $this->expenseData['name'] ?>" name="txtname" class="form-control" >
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Product</label>
                                    <input type="text" value="<?= $this->expenseData['product'] ?>" name="txtproduct" class="form-control" >
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Date</label>
                                    <input type="date" value="<?= $this->expenseData['date'] ?>" name="txtdate" class="form-control" >
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Price</label>
                                    <input type="number" value="<?= $this->expenseData['price'] ?>" name="txtprice" class="form-control" >
                                </div>
                                <button type="submit" class="btn btn-success" name="submit">Save</button>
                            </form>
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
        </body>
        </html>
        <?php
    }
}

// Instantiate the class and display the edit form
$expenseEditor = new ExpenseEditor($conn);
$expenseEditor->displayExpenseEditForm();
?>
