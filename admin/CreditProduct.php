<?php 
// Include necessary files
include_once("auth.php"); 
include_once("DatabaseConn.php"); 

// Define $searchTerm
$searchTerm = isset($_GET['search']) ? $_GET['search'] : '';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="Dashboard for displaying company product details." />
    <meta name="author" content="Your Company Name" />
    <title>Dashboard - Show Product</title>
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

<?php include_once("Header.php"); ?>

<div id="wrapper">
    <div id="content-wrapper" class="d-flex flex-column">
        <div id="content">
            <div class="container-fluid">
                <h1 class="h3 mb-2 text-gray-800">Credit Product Details</h1>
                
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <div class="row">
                            <div class="col-md-6">
                                <a href="CreditProductAdd.php" class="btn btn-success">Add New</a>
                            </div>
                            <div class="col-md-6">
                                <form method="GET" action="">
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" placeholder="Search by Name" name="search" value="<?= htmlspecialchars($searchTerm); ?>" id="searchInput" onkeyup="myFunction()">
                                        <button class="btn btn-outline-secondary" type="submit">Search</button>
                                    </div>
                                </form>
                            </div>
                            <?php if (isset($_GET["add"])) { ?>
                                <div class="container-fluid hide">
                                    <p class="bg-success text-light p-1 text-center"><b>Credit Product Add Success</b></p>
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
                                <th>Category</th>
                                <th>Title</th>
                                <th>Color</th>
                                <th>Pack</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                   <!-- Query -->
                            <?php
                            include_once("DatabaseConn.php");
                            $search = isset($_GET['search']) ? $_GET['search'] : '';
                            $query = "SELECT * FROM `creditproduct`";
                            if (!empty($search)) {
                                $query .= " WHERE `title` LIKE '%$search%'";
                            }
                            $result = mysqli_query($conn, $query);  
                            if(mysqli_num_rows($result)){
                                while($row = mysqli_fetch_array($result)){
                                    $cat_id = $row[1];
                                    $cat_nameQ = "SELECT * FROM `categories` where cate_id = $cat_id"; 
                                    $cat_name = mysqli_query($conn,$cat_nameQ);
                                    $fetch_cat_name = mysqli_fetch_assoc($cat_name);

                            ?>
                            <tr>
                                <td><?php echo $row[0];?></td>
                                <td><?php echo $fetch_cat_name['cate_name'];?></td>
                                <td><?php echo $row[2];?></td>
                                <td><?php echo $row[3];?></td>
                                <td><?php echo $row[4];?></td>
                                <td><?php echo $row[5];?></td>
                                <td><?php echo $row[6];?></td>
                                <!-- <td><img src="./picture/<?php echo $row[3];?>" width="100px"></td> -->
                                <td><a href="CreditProductEdit.php?id=<?=$row['id']?>" class="btn btn-success" >Edit</a> | <a href="CreditProductDelete.php?id=<?=$row['id']?>" class="btn btn-danger">Delete</a></td>
                            </tr>
                            <?php
                                }
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
</div>

<!-- JavaScript -->
<script src="js/jquery-3.6.3.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="js/sb-admin-2.min.js"></script>
<script src="vendor/datatables/jquery.dataTables.min.js"></script>
<script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>
<script src="js/demo/datatables-demo.js"></script>
<script>
    function myFunction() {
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("searchInput");
        filter = input.value.toUpperCase();
        table = document.getElementsByTagName("table")[0];
        tr = table.getElementsByTagName("tr");
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[1];
            if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }
</script>
</body>
</html>
