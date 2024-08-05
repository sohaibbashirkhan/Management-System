<?php
include_once("auth.php"); 
include_once("DatabaseConn.php");

$searchTerm = '';
$startDate = '';
$endDate = '';

if (isset($_GET['search'])) {
    $searchTerm = htmlspecialchars($_GET['search']);
    $startDate = $_GET['start_date'];
    $endDate = $_GET['end_date'];
    
    // Using prepared statement to prevent SQL injection
    $query = "SELECT * FROM `labour` WHERE Name LIKE ?";

    if (!empty($startDate) && !empty($endDate)) {
        $query .= " AND date BETWEEN ? AND ?";
    }

    $stmt = mysqli_prepare($conn, $query);

    if (!empty($startDate) && !empty($endDate)) {
        mysqli_stmt_bind_param($stmt, "sss", $searchTerm, $startDate, $endDate);
    } else {
        mysqli_stmt_bind_param($stmt, "s", $searchTerm);
    }

    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
} else {
    $query = "SELECT * FROM `labour`";
    $result = mysqli_query($conn, $query);
}

$totalSalary = 0; // Initialize total salary
$totalOtherExpense = 0; // Initialize total other expense
$totalNetSalary = 0; // Initialize total net salary
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Dashboard - Show Labour</title>
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
                <h1 class="h3 mb-2 text-gray-800">Labour Details</h1>
                
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <div class="row">
                            <div class="col-md-6">
                                <a href="LabourAdd.php" class="btn btn-success">Add New</a>
                            </div>
                            <div class="col-md-6">
                                <form method="GET" action="">
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" placeholder="Search by Name" name="search" value="<?php echo $searchTerm; ?>">
                                        <input type="date" class="form-control" name="start_date" value="<?php echo $startDate; ?>">
                                        <input type="date" class="form-control" name="end_date" value="<?php echo $endDate; ?>">
                                        <button class="btn btn-outline-secondary" type="submit">Search</button>
                                    </div>
                                </form>
                            </div>
                            <?php if (isset($_GET["add"])) { ?>
                                <div class="container-fluid hide">
                                    <p class="bg-success text-light p-1 text-center"><b>Labour Add Success</b></p>
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
                                        <th>Cnic</th>
                                        <th>Date</th>
                                        <th>Address</th>
                                        <th>OtherExpense</th>
                                        <th>Salary</th>
                                        <th>Net Salary</th> <!-- New column for Net Salary -->
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (mysqli_num_rows($result)) {
                                        while ($row = mysqli_fetch_array($result)) {
                                            $salary = intval($row['Salary']);
                                            $otherExpense = intval($row['OtherExpense']);
                                            $netSalary = $salary - $otherExpense; // Calculate net salary

                                            $totalSalary += $salary; // Add salary to total salary
                                            $totalOtherExpense += $otherExpense; // Add other expense to total other expense
                                            $totalNetSalary += $netSalary; // Add net salary to total net salary
                                    ?>
                                            <tr>
                                                <td><?php echo $row['id']; ?></td>
                                                <td><?php echo $row['name']; ?></td>
                                                <td><?php echo $row['Phone']; ?></td>
                                                <td><?php echo $row['Cnic']; ?></td>
                                                <td><?php echo $row['date']; ?></td>
                                                <td><?php echo $row['Address']; ?></td>
                                                <td><?php echo $row['OtherExpense']; ?></td>
                                                <td><?php echo $row['Salary']; ?></td>
                                                <td><?php echo $netSalary; ?></td> <!-- Display net salary -->
                                                <td>
                                                    <a href="LabourEdit.php?id=<?php echo $row['id']; ?>" class="btn btn-success">Edit</a>
                                                    <a href="LabourDelete.php?id=<?php echo $row['id']; ?>" class="btn btn-danger">Delete</a>
                                                </td>
                                            </tr>
                                    <?php }
                                    } ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="6" style="text-align: right;"><b>Total Other Expense :</b></td>
                                        <td><?php echo $totalOtherExpense; ?></td>
                                        <td colspan="1" style="text-align: right;"><b>Total Salary :</b></td>
                                        <td><?php echo $totalSalary; ?></td>
                                        <td></td> <!-- Empty column for alignment -->
                                    </tr>
                                    <tr>
                                        <td colspan="8" style="text-align: right;"><b>Total Net Salary :</b></td>
                                        <td><?php echo $totalNetSalary; ?></td>
                                        <td></td> <!-- Empty column for alignment -->
                                    </tr>
                                    <tr>
                                        <td colspan="8" style="text-align: right;"><b>Total Expense :</b></td>
                                        <td colspan="2"><?php echo $totalOtherExpense + $totalSalary; ?></td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <footer class="sticky-footer bg-white">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <div class="text-muted">Copyright &copy; Your Website <?php echo date("Y"); ?></div>
                </div>
            </div>
        </footer>
    </div>
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
