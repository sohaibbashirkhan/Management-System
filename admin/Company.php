<?php
// Include necessary files
include_once("auth.php");
include_once("DatabaseConn.php");

// Define CompanyDashboard class
class CompanyDashboard {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    // Method to display company dashboard
    public function displayCompanyDashboard() {
        // Handle search functionality
        $search = isset($_GET['search']) ? $_GET['search'] : '';
        $query = "SELECT * FROM `company`";
        if (!empty($search)) {
            $search = mysqli_real_escape_string($this->conn, $search);
            $query .= " WHERE `Name` LIKE '%$search%'";
            // Add order by clause to prioritize results matching the search term
            $query .= " ORDER BY CASE WHEN `Name` LIKE '$search%' THEN 0 ELSE 1 END, `Name`";
        }
        $result = mysqli_query($this->conn, $query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="Your company dashboard description." />
    <meta name="author" content="Your Company Name" />
    <title>Dashboard - Show Company</title>
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


<?php
include_once("Header.php")
?>

<div id="wrapper">
    <div id="content-wrapper" class="d-flex flex-column">
        <div id="content">
            <div class="container-fluid">
                <h1 class="h3 mb-2 text-gray-800">Company Details</h1>
                
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <div class="row">
                            <div class="col-md-6">
                                <a href="CompanyAdd.php" class="btn btn-success">Add New</a>
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
                                    <p class="bg-success text-light p-1 text-center"><b>Company Add Success</b></p>
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
                                        <th>Name</th>
                                        <th>Phone</th>
                                        <th>Address</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Display company rows -->
                                    <?php
                                    if ($result && mysqli_num_rows($result) > 0) {
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            ?>
                                            <tr>
                                                <td><?= htmlspecialchars($row['Id']) ?></td>
                                                <td><?= htmlspecialchars($row['Name']) ?></td>
                                                <td><?= htmlspecialchars($row['Phone']) ?></td>
                                                <td><?= htmlspecialchars($row['Address']) ?></td>
                                                <td>
                                                    <a href="CompanyEdit.php?id=<?= htmlspecialchars($row['Id']) ?>" class="btn btn-success">Edit</a> |
                                                    <a href="CompanyDelete.php?id=<?= htmlspecialchars($row['Id']) ?>" class="btn btn-danger">Delete</a>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                    } else {
                                        echo "<tr><td colspan='6'>No companies found</td></tr>";
                                    }
                                    ?>
                                </tbody>
                            </table>
                            <!-- table end -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
<?php
    }
}

// Instantiate the class and display the company dashboard
$companyDashboard = new CompanyDashboard($conn);
$companyDashboard->displayCompanyDashboard();
?>
