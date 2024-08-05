<?php
include_once("auth.php"); 
include_once("DatabaseConn.php");
// In the PHP code, update $searchTerm to $_GET['search']
$search = isset($_GET['search']) ? $_GET['search'] : '';

class DailyExpenseDashboard {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function displayExpenseData($search = '') {
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="utf-8" />
            <meta http-equiv="X-UA-Compatible" content="IE=edge" />
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
            <meta name="description" content="" />
            <meta name="author" content="" />
            <title>Dashboard - Show Category</title>
                <!-- Custom fonts for this template -->
                    <link rel="icon" type="image/x-icon" href="img/mylogo.webp">

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
                <h1 class="h3 mb-2 text-gray-800">Categories Details</h1>
                
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <div class="row">
                            <div class="col-md-6">
                                <a href="lowcategoryadd.php" class="btn btn-success">Add New</a>
                            </div>
                            <div class="col-md-6">
                                <form method="GET" action="">
                                    <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder="Search by Name" name="search" value="<?php echo $search; ?>">
                                        <button class="btn btn-outline-secondary" type="submit">Search</button>
                                    </div>
                                </form>
                            </div>
                            <?php if (isset($_GET["add"])) { ?>
                                <div class="container-fluid hide">
                                    <p class="bg-success text-light p-1 text-center"><b>Categories Add Success</b></p>
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
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Query -->
                                    <?php
                                    $whereClause = !empty($search) ? "WHERE cate_name LIKE '%$search%'" : '';
                                    $query = "SELECT * FROM `lowcategory` $whereClause";
                                    $result = mysqli_query($this->conn, $query);  
                                    $totalAmount = 0; // Initialize total amount
                                    if(mysqli_num_rows($result)){
                                        while($row = mysqli_fetch_array($result)){
                                            ?>
                                            <tr>
                                                <td><?php echo $row[0];?></td>
                                                <td><?php echo $row[1];?></td>
                                                <td>
                                                      <a href="lowCategoryEdit.php?cate_id=<?=$row['cate_id']?>" class="btn btn-success">Edit</a> |
                                              <a href="lowCategoryDelete.php?cate_id=<?=$row['cate_id']?>" class="btn btn-danger">Delete</a></td>
                                            </tr>
                                            <?php                                        }
                                    }                                     
                                    ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                    
                                    </tr>
                                </tfoot>
                            </table>
                            <!-- table end -->
                      
                    
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

// Instantiate the class and display the expense data
$search = isset($_GET['search']) ? $_GET['search'] : '';
$dashboard = new DailyExpenseDashboard($conn);
$dashboard->displayExpenseData($search);
?>
