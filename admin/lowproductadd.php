<?php
include_once("auth.php"); 
include_once("DatabaseConn.php")
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Dashboard - Low Product Add</title>
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
                <h1 class="mt-4">Add Low Product</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Add Low Product Dashboard</li>
                </ol>
                <!-- Add Product Form -->
                <form action="#" method="POST" >
                    <div class="mb-3">
                        <label for="" class="form-label">Product</label>
                        <input type="text" name="txttitle" class="form-control" required >
                    </div>
                    <div class="mb-3">
    <label for="" class="form-label">Category</label>
    <select name="category" class="form-control" required>
        <option value="">Select Category</option>
        <?php
        // Fetch categories from the database
        $category_query = "SELECT * FROM lowcategory";
        $category_result = mysqli_query($conn, $category_query);
        if (mysqli_num_rows($category_result) > 0) {
            while ($row = mysqli_fetch_assoc($category_result)) {
                echo "<option value='" . $row['cate_id'] . "'>" . $row['cate_name'] . "</option>";
            }
        }
        ?>
    </select>
</div>

                    <div class="mb-3">
                        <label for="" class="form-label">Value</label>
                        <input type="text" name="txtcolor" class="form-control"  >
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Pack</label>
                        <select name="txtpack" class="form-control" required >
                            <option value="">Select Pack</option>
                            <option value="Kg">Kg</option>
                            <option value="Liter">Liter</option>
                            <option value="Number">Number</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Quantity</label>
                        <input type="number" name="txtquantity" class="form-control" required >
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Price</label>
                        <input type="number" name="txtprice" class="form-control" required >
                    </div>
                    <button type="submit" class="btn btn-success" name="submit">ADD</button>
                </form>
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

<!-- php -->
<?php
if(isset($_POST["submit"])){
    $Title = $_POST['txttitle'];
    $Cate = $_POST['category'];
    $Color = $_POST['txtcolor'];
    $Pack = $_POST['txtpack'];
    $Quantity = $_POST['txtquantity'];
    $Price = $_POST['txtprice'];

    // Query
    $query="INSERT INTO `lowitemproduct`(`id`,`cate_id`,`title`, `color`, `pack`, `quantity`, `price`) VALUES (null,'$Cate','$Title','$Color','$Pack','$Quantity','$Price')";

    mysqli_query($conn,$query);
?>
    <script>
        window.location.assign("lowproduct.php?add");
    </script>
<?php
}
?>
