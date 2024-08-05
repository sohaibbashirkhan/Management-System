<?php
include_once("auth.php");
include_once("DatabaseConn.php");

// Check if form is submitted
if(isset($_POST["submit"])){
    // Retrieve form data
    $Company = $_POST['company'];
    $Token = $_POST['token'];
    $Quantity = $_POST['quantity'];
    $Price = $Token * $Quantity;

    // Insert data into the database
    $query = "INSERT INTO `token`(`companyname`, `token`, `quantity`, `price`) VALUES ('$Company','$Token','$Quantity','$Price')";
    mysqli_query($conn, $query);
    
    // Redirect after insertion
    header("Location: TokenCash.php?add");
    exit; // Terminate script execution after redirection
}

// Initialize variables
$selectedCompany = "";
$selectedToken = "";
$quantity = "";
$price = "";

// Check if form data is present
if(isset($_POST['company'])) {
    $selectedCompany = $_POST['company'];
}
if(isset($_POST['token'])) {
    $selectedToken = $_POST['token'];
}
if(isset($_POST['quantity'])) {
    $quantity = $_POST['quantity'];
    $price = $selectedToken * $quantity; // Calculate the price
}

// Handle search
$searchCompany = "";
$searchToken = "";
$startDate = "";
$endDate = "";
if(isset($_POST['search_company'])) {
    $searchCompany = $_POST['search_company'];
}
if(isset($_POST['search_token'])) {
    $searchToken = $_POST['search_token'];
}
if(isset($_POST['start_date'])) {
    $startDate = $_POST['start_date'];
}
if(isset($_POST['end_date'])) {
    $endDate = $_POST['end_date'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name ="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Dashboard - Show Token</title>
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
                <h1 class="h3 mb-2 text-gray-800">Token Details</h1>
                
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <div class="row">
                            <div class="col-md-12">
                                <form method="POST" action="">
                                    <div class="input-group mb-3">
                                        <!-- Dropdown for Company Name -->
                                        <select class="form-control" name="company">
                                            <option value="">Select Company</option>
                                            <option value="Nelson" <?php if($selectedCompany == "Nelson") echo "selected"; ?>>Nelson</option>
                                            <option value="Gobis" <?php if($selectedCompany == "Gobis") echo "selected"; ?>>Gobis</option>
                                            <option value="OneTouch" <?php if($selectedCompany == "OneTouch") echo "selected"; ?>>OneTouch</option>
                                            <option value="Ekotint" <?php if($selectedCompany == "Ekotint") echo "selected"; ?>>Ekotint</option>
                                            <option value="Reliance" <?php if($selectedCompany == "Reliance") echo "selected"; ?>>Reliance</option>
                                        </select>
                                        <!-- Dropdown for Token -->
                                        <select class="form-control" name="token">
                                            <option value="">Select Token</option>
                                            <option value="50" <?php if($selectedToken == "50") echo "selected"; ?>>50</option>
                                            <option value="100" <?php if($selectedToken == "100") echo "selected"; ?>>100</option>
                                            <option value="200" <?php if($selectedToken == "200") echo "selected"; ?>>200</option>
                                            <option value="300" <?php if($selectedToken == "300") echo "selected"; ?>>300</option>
                                            <option value="400" <?php if($selectedToken == "400") echo "selected"; ?>>400</option>
                                            <option value="500" <?php if($selectedToken == "500") echo "selected"; ?>>500</option>
                                            <option value="600" <?php if($selectedToken == "600") echo "selected"; ?>>600</option>
                                            <option value="1000" <?php if($selectedToken == "1000") echo "selected"; ?>>1000</option>
                                            <option value="1200" <?php if($selectedToken == "1200") echo "selected"; ?>>1200</option>
                                            <option value="1600" <?php if($selectedToken == "1600") echo "selected"; ?>>1600</option>
                                        </select>
                                        <!-- Quantity Input -->
                                        <input type="number" class="form-control" placeholder="Quantity" name="quantity" value="<?php echo $quantity; ?>">
                                        <input type="number" class="form-control" placeholder="Price" name="price" value="<?php echo $price; ?>" readonly>

                                        <button class="btn btn-outline-secondary" type="submit" name="submit">Calculate</button>
                                    </div>
                                </form>
                                <form method="POST" action="">
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" placeholder="Search Company" name="search_company" value="<?php echo $searchCompany; ?>">
                                        <select class="form-control" name="search_token">
                                            <option value="">Select Token</option>
                                            <option value="50" <?php if($searchToken == "50") echo "selected"; ?>>50</option>
                                            <option value="100" <?php if($searchToken == "100") echo "selected"; ?>>100</option>
                                            <option value="200" <?php if($searchToken == "200") echo "selected"; ?>>200</option>
                                            <option value="300" <?php if($searchToken == "300") echo "selected"; ?>>300</option>
                                            <option value="400" <?php if($searchToken == "400") echo "selected"; ?>>400</option>
                                            <option value="500" <?php if($searchToken == "500") echo "selected"; ?>>500</option>
                                            <option value="600" <?php if($searchToken == "600") echo "selected"; ?>>600</option>
                                            <option value="1000" <?php if($searchToken == "1000") echo "selected"; ?>>1000</option>
                                            <option value="1200" <?php if($searchToken == "1200") echo "selected"; ?>>1200</option>
                                            <option value="1600" <?php if($searchToken == "1600") echo "selected"; ?>>1600</option>
                                        </select>
                                        <input type="date" class="form-control" name="start_date" value="<?php echo $startDate; ?>">
                                        <input type="date" class="form-control" name="end_date" value="<?php echo $endDate; ?>">
                                        <button class="btn btn-outline-secondary" type="submit" name="search">Search</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Company Name</th>
                                        <th>Token</th>
                                        <th>Quantity</th>
                                        <th>Date</th>
                                        <th>Price</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $query = "SELECT * FROM `token`";
                                    $conditions = array();
                                    
                                    if(!empty($searchCompany)) {
                                        $conditions[] = "companyname LIKE '%$searchCompany%'";
                                    }
                                    if(!empty($searchToken)) {
                                        $conditions[] = "token = '$searchToken'";
                                    }
                                    if(!empty($startDate)) {
                                        $conditions[] = "date >= '$startDate'";
                                    }
                                    if(!empty($endDate)) {
                                        $conditions[] = "date <= '$endDate'";
                                    }
                                    
                                    if(count($conditions) > 0) {
                                        $query .= " WHERE " . implode(' AND ', $conditions);
                                    }
                                    
                                    $result = mysqli_query($conn, $query);
                                    
                                    $totalTokens = 0;
                                    $totalPrice = 0;

                                    if(mysqli_num_rows($result) > 0){
                                        while($row = mysqli_fetch_assoc($result)){
                                            $totalTokens += $row['quantity'];
                                            $totalPrice += $row['price'];
                                            ?>
                                            <tr>
                                                <td><?php echo $row['id'];?></td>
                                                <td><?php echo $row['companyname'];?></td>
                                                <td><?php echo $row['token'];?></td>
                                                <td><?php echo $row['quantity'];?></td>
                                                <td><?php echo $row['date']; ?></td>
                                                <td><?php echo $row['price'];?></td>
                                                <td><a href="tokendelete.php?id=<?=$row['id']?>" class="btn btn-danger">Delete</a></td>
                                            </tr>
                                            <?php
                                        }
                                    }
                                    ?>
                                </tbody>
                            </table>
                            <div class="total-summary">
                                <h4>Total Tokens: <?php echo $totalTokens; ?></h4>
                                <h4>Total Price: <?php echo $totalPrice; ?></h4>
                            </div>
                            <!-- Table end -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
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

