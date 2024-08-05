<?php
include_once("auth.php"); 
include_once("DatabaseConn.php");

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM product WHERE id = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_assoc($result);
    mysqli_stmt_close($stmt);
}

if(isset($_POST['submit'])) {
    $Title = $_POST['txttitle'];
    $Color = $_POST['txtcolor'];
    $Pack = $_POST['txtpack'];
    $Quantity = $_POST['txtquantity'];
    $Price = $_POST['txtprice'];

    // Handle file upload
    // $picture = $_FILES['txtpicture']['name'];
    // $temp_name = $_FILES['txtpicture']['tmp_name'];
    // $upload_dir = "picture/"; // Update with your upload directory path

    // Check if the file is uploaded successfully
    // if(move_uploaded_file($temp_name, $upload_dir . $picture)) {
        // Update the record in the database with the new picture file name
        $query = "UPDATE product SET title=?, color=?, pack=?, quantity=?, price=? WHERE id=?";
        $stmt = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($stmt, "sssssi", $Title, $Color, $Pack, $Quantity, $Price, $id);
        if(mysqli_stmt_execute($stmt)) {
            mysqli_stmt_close($stmt);
            // Redirect to companyproduct.php after successful update
            header("Location: Product.php");
            exit(); // Make sure to exit after redirection
        } else {
            echo "Error updating record: " . mysqli_error($conn);
        }
    // } else {
    //     echo "Error uploading file";
    // }
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
    <title>Dashboard - Product Edit</title>
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
                <h1 class="mt-4">Edit Product</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Edit Product Dashboard</li>
                </ol>
                <form action="productupdate.php?id=<?= $row['id'] ?>" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="" class="form-label">Title</label>
                        <input type="text" value="<?= $row['title'] ?>" name="txttitle" class="form-control" aria-describedby="emailHelp" required>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Color</label>
                        <input type="text" value="<?= $row['color'] ?>" name="txtcolor" class="form-control" required >
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Pack</label>
                        <select name="txtpack" class="form-control" required >
                            <option value="">Select Pack</option>
                            <option value="Drum" <?php if($row['pack'] == "Drum") echo "selected"; ?>>Drum</option>
                            <option value="Gallon" <?php if($row['pack'] == "Gallon") echo "selected"; ?>>Gallon</option>
                            <option value="Qtr" <?php if($row['pack'] == "Qtr") echo "selected"; ?>>Qtr</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Quantity</label>
                        <input type="number" value="<?= $row['quantity'] ?>" name="txtquantity" class="form-control" required >
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Price</label>
                        <input type="number" value="<?= $row['price'] ?>" name="txtprice" class="form-control" required>
                    </div>
                    <!-- <div class="mb-3">
                        <label for="" class="form-label">Upload Picture</label>
                        <input type="file" name="txtpicture" class="form-control" required>
                    </div> -->
                    <button type="submit" class="btn btn-success" name="submit">Save</button>
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
