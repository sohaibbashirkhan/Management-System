<?php
include_once("auth.php"); 
// Include necessary files
include_once("DatabaseConn.php");

// Define CompanyAdder class
class CompanyAdder {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    // Method to add company
    public function addCompany() {
        if(isset($_POST["submit"])) {
            $Name = mysqli_real_escape_string($this->conn, $_POST['txtname']);
            $Phone = mysqli_real_escape_string($this->conn, $_POST['txtphone']);
            $Address = mysqli_real_escape_string($this->conn, $_POST['txtaddress']);

            $query = "INSERT INTO `company`(`id`, `name`, `phone`, `address`) VALUES (null, '$Name', '$Phone','$Address')";
            if(mysqli_query($this->conn, $query)) {
                header("Location: Company.php?add");
                exit();
            } else {
                echo "Failed to add company.";
            }
        }
    }
}

// Instantiate the class and add the company
$companyAdder = new CompanyAdder($conn);
$companyAdder->addCompany();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="Add a new company to the dashboard." />
    <meta name="author" content="Your Company Name" />
    <title>Dashboard - Add Company</title>
    <!-- Custom fonts -->
        <link rel="icon" type="image/x-icon" href="img/mylogo.webp">

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
            <h1 class="mt-4">Add Company</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Add Company Dashboard</li>
            </ol>

            <!-- Add New Company Form -->
            <form action="" method="POST">
                <div class="mb-3">
                    <label for="txtname" class="form-label">Name</label>
                    <input type="text" name="txtname" class="form-control" id="txtname" required>
                </div>
                <div class="mb-3">
                    <label for="txtphone" class="form-label">Phone</label>
                    <input type="number" name="txtphone" class="form-control" id="txtphone" required>
                </div>
            
                <div class="mb-3">
                    <label for="txtaddress" class="form-label">Address</label>
                    <input type="text" name="txtaddress" class="form-control" id="txtaddress" required>
                </div>
                <button type="submit" class="btn btn-success" name="submit">ADD</button>
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
