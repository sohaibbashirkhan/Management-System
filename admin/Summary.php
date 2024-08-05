<?php
include_once("auth.php");
include_once("DatabaseConn.php");

// Fetch total salaries and expenses from labour
$queryLabour = "SELECT SUM(Salary) as TotalSalary, SUM(OtherExpense) as TotalOtherExpense FROM labour";
$resultLabour = mysqli_query($conn, $queryLabour);
$rowLabour = mysqli_fetch_assoc($resultLabour);

$totalSalary = $rowLabour['TotalSalary'];
$totalOtherExpense = $rowLabour['TotalOtherExpense'];
$totalNetSalary = $totalSalary + $totalOtherExpense;

// Fetch total amount from orders
$queryOrder = "SELECT SUM(quantity * price) as TotalOrderAmount FROM orders";
$resultOrder = mysqli_query($conn, $queryOrder);
$rowOrder = mysqli_fetch_assoc($resultOrder);

$totalOrderAmount = $rowOrder['TotalOrderAmount'];

// Fetch total amount from purchases
$queryPurchase = "SELECT SUM(quantity * price) as TotalPurchaseAmount FROM purchase";
$resultPurchase = mysqli_query($conn, $queryPurchase);
$rowPurchase = mysqli_fetch_assoc($resultPurchase);

$totalPurchaseAmount = $rowPurchase['TotalPurchaseAmount'];

// Fetch total amount from home expenses
$queryHomeExpense = "SELECT SUM(price) as TotalHomeExpense FROM homeexpense";
$resultHomeExpense = mysqli_query($conn, $queryHomeExpense);
$rowHomeExpense = mysqli_fetch_assoc($resultHomeExpense);

$totalHomeExpense = $rowHomeExpense['TotalHomeExpense'];

// Fetch total amount from daily expenses
$queryDailyExpense = "SELECT SUM(price) as TotalDailyExpense FROM dailyexpense";
$resultDailyExpense = mysqli_query($conn, $queryDailyExpense);
$rowDailyExpense = mysqli_fetch_assoc($resultDailyExpense);

$totalDailyExpense = $rowDailyExpense['TotalDailyExpense'];

// Fetch total price from company orders
// $queryCompanyOrder = "SELECT SUM(quantity * price) as TotalCompanyOrderPrice FROM companyorder";
// $resultCompanyOrder = mysqli_query($conn, $queryCompanyOrder);
// $rowCompanyOrder = mysqli_fetch_assoc($resultCompanyOrder);

// $totalCompanyOrderPrice = $rowCompanyOrder['TotalCompanyOrderPrice'];

// Check if an amount is entered
$inputAmount = isset($_POST['amount']) ? $_POST['amount'] : 0;

// Calculate combined total from orders and purchases
$totalOrderAndPurchaseAmount = $totalOrderAmount + $totalPurchaseAmount;

// Calculate total expenses
$totalExpense = $totalNetSalary + $totalHomeExpense + $totalDailyExpense + $totalCompanyOrderPrice;

// Calculate profit or loss based on the input amount
$profitOrLoss = $totalOrderAndPurchaseAmount - $totalExpense - $inputAmount;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Dashboard - Summary</title>
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
                <h1 class="h3 mb-2 text-gray-800">Summary</h1>
                
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <div class="table-responsive">
                            <form method="post">
                                <label for="amount">Enter an Amount:</label>
                                <input type="number" id="amount" name="amount" value="<?= $inputAmount ?>">
                                <button type="submit">Submit</button>
                            </form>
                            <table class="table table-bordered" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        
                                        <th>Total Orders Amount</th>
                                        <th>Total Purchases Amount</th>
                                        <th>Labour Salary</th>
                                        <th>Total Home Expenses</th>
                                        <th>Total Daily Expenses</th>
                                        <!--<th>Total Company Orders Price</th>-->
                                        <th>Profit/Loss</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                       
                                        <td><?= $totalOrderAmount ?></td>
                                        <td><?= $totalPurchaseAmount ?></td>
                                         <td><?= $totalNetSalary ?></td>
                                        <td><?= $totalHomeExpense ?></td>
                                        <td><?= $totalDailyExpense ?></td>
                                        <!--<td><?= $totalCompanyOrderPrice ?></td>-->
                                        <td><?= $profitOrLoss ?></td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="text-center">
                                <h3><?= $profitOrLoss >= 0 ? "Profit" : "Loss"; ?>: <?= $profitOrLoss ?></h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <footer class="sticky-footer bg-white">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <div class="text-muted">Copyright &copy; Your Website <?= date("Y"); ?></div>
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
