<?php
include_once("auth.php"); 
include_once("DatabaseConn.php");

if(isset($_POST["submit"])) {
    $User = $_POST['txtname'];
    $Product = $_POST['txtproduct'];
    $txtquntity = $_POST['txtquntity'];
    $price = $_POST["price"];
    
    // Query
    $query = "INSERT INTO `homeexpense`(`id`, `userid`, `Product`, `price`) VALUES (null,'$User','$Product',$price)";
    mysqli_query($conn, $query);
    ?>  
    <script>
        window.location.assign("Expense.php?add");
    </script>
<?php
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
    <title>Dashboard - Expense Add</title>
        <link rel="icon" type="image/x-icon" href="img/mylogo.webp">

    <!-- Custom fonts -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <!-- Custom styles -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
</head>
<body class="sb-nav-fixed">
<?php include_once("Header.php"); ?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Add Expense</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Add Expense Dashboard</li>
            </ol>
            <!-- Add Expense Form -->
            <form action="#" method="POST">
                <div class="mb-3">
                    <label for="" class="form-label">Name</label>
                    <input type="text" id="txtname" name="txtname" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Product</label>
                    <input type="text" id="txtproduct" name="txtproduct" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Price</label>
                    <input type="number" id="price" name="price" class="form-control" >
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

</body>
</html>
