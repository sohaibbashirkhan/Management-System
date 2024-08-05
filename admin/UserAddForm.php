<?php
include_once("auth.php"); 
include_once("DatabaseConn.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Dashboard - User Add</title>
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
            <h1 class="mt-4">Add User</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Add User Dashboard</li>
            </ol>

            <!-- Add User Form -->
            <form action="#" method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="" class="form-label">Name</label>
                    <input type="text" name="txtname" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Email</label>
                    <input type="email" name="txtemail" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Password</label>
                    <input type="password" name="txtpass" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Phone</label>
                    <input type="text" name="txtphone" class="form-control" aria-describedby="emailHelp">
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

<!-- PHP -->
<?php
if(isset($_POST["submit"])){
    $Name = $_POST['txtname'];
    $Email = $_POST['txtemail'];
    $Password= $_POST['txtpass'];
    $Phone = $_POST['txtphone'];
    // $DOB = $_POST['txtdob'];
    // $PictureName = $_FILES['txtpicture']["name"];
    // $PictureTmp = $_FILES['txtpicture']["tmp_name"];
    
    // // Path
    // $path = "./picture/" . $PictureName;
    // move_uploaded_file($PictureTmp,$path);
    
    // Query
    // $query = "INSERT INTO `user`(`id`, `name`, `email`, `password`, `phone`, `dob`, `picture`) VALUES (null,'$Name','$Email','$Password','$Phone','$DOB','$PictureName')";
    // mysqli_query($conn,$query);
    
        $query = "INSERT INTO `user`(`id`, `name`, `email`, `password`, `phone`) VALUES (null,'$Name','$Email','$Password','$Phone')";
    mysqli_query($conn,$query);
?>
    <script>
        window.location.assign("UserShow.php?add");
    </script>
<?php
}
?>
