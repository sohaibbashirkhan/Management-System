<?php
include_once("auth.php"); 
include_once("DatabaseConn.php");

// Retrieve user ID from GET request
$id = $_GET['id'];

// Fetch user data from the database based on the ID
$query = "SELECT * FROM user WHERE id='$id'";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Dashboard - User Edit</title>
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
                <h1 class="mt-4">Edit User</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Edit User Dashboard</li>
                </ol>
                <form action="UserUpdate.php?id=<?= $row['id'] ?>" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="txtName" class="form-label">Name</label>
                        <input type="text" id="txtName" value="<?= $row['name'] ?>" name="txtName" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="txtEmail" class="form-label">Email</label>
                        <input type="text" id="txtEmail" value="<?= $row['email'] ?>" name="txtEmail" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="txtPassword" class="form-label">Password</label>
                        <input type="text" id="txtPassword" value="<?= $row['password'] ?>" name="txtPassword" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="txtPhone" class="form-label">Phone</label>
                        <input type="text" id="txtPhone" value="<?= $row['phone'] ?>" name="txtPhone" class="form-control">
                    </div>
                    <!--<div class="mb-3">-->
                    <!--    <label for="txtDOB" class="form-label">Date of Birth</label>-->
                    <!--    <input type="date" id="txtDOB" value="<?= $row['dob'] ?>" name="txtDOB" class="form-control">-->
                    <!--</div>-->
                    <!--<div class="mb-3">-->
                    <!--    <label for="txtPicture" class="form-label">Picture</label>-->
                    <!--    <input type="file" id="txtPicture" name="txtPicture" class="form-control">-->
                    <!--</div>-->
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
