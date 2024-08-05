<?php
// Include necessary files
include_once("auth.php"); 
include_once("DatabaseConn.php");

// Define CompanyEditor class
class CompanyEditor {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    // Method to fetch company data by ID
    public function fetchCompanyData($id) {
        $query = "SELECT * FROM `company` WHERE `id` = ?";
        $stmt = mysqli_prepare($this->conn, $query);
        mysqli_stmt_bind_param($stmt, "i", $id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        return mysqli_fetch_assoc($result);
    }
}

// Initialize CompanyEditor and fetch company data if ID is provided
$row = [];
if(isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];
    $companyEditor = new CompanyEditor($conn);
    $row = $companyEditor->fetchCompanyData($id);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="Edit company details." />
    <meta name="author" content="Your Company Name" />
    <title>Dashboard - Company Edit</title>    <link rel="icon" type="image/x-icon" href="img/mylogo.webp">

    <!-- Custom fonts -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <!-- Custom styles -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <!-- Custom styles for DataTables -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>
<body class="sb-nav-fixed">
    <?php include_once("Header.php"); ?>

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Edit Company</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Edit Company Dashboard</li>
                </ol>
                <form action="CompanyUpdate.php?id=<?= $row['Id'] ?? '' ?>" method="POST">
                    <div class="mb-3">
                        <label for="txtname" class="form-label">Name</label>
                        <input type="text" value="<?= $row['Name'] ?? '' ?>" name="txtname" class="form-control" id="txtname" required>
                    </div>
                    <div class="mb-3">
                        <label for="txtphone" class="form-label">Phone</label>
                        <input type="number" value="<?= $row['Phone'] ?? '' ?>" name="txtphone" class="form-control" id="txtphone" required>
                    </div>
                   
                    <div class="mb-3">
                        <label for="txtaddress" class="form-label">Address</label>
                        <input type="text" value="<?= $row['Address'] ?? '' ?>" name="txtaddress" class="form-control" id="txtaddress" required>
                    </div>
                    <button type="submit" class="btn btn-success" name="submit">Save</button>
                </form>
            </div>
        </main>
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
    </div>
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
