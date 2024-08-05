<?php
include_once("auth.php"); 
include_once("DatabaseConn.php");

if(isset($_POST["submit"])){
    $Customer = $_POST['txtuser'];
    $category_id = $_POST['category'];
    $Product_id = $_POST['txtproduct'];
    $Product_Color = $_POST['txtcolor'];
    $Product_item= $_POST['txtpack'];
    $Quantity = $_POST['txtquantity'];
    $DateEnd = $_POST['txtdateend'];
    $Price = $_POST["price"];

    // Check if product quantity is available
    $product_query = "SELECT quantity FROM product WHERE id = '$Product_id'";
    $product_result = mysqli_query($conn, $product_query);
    $product_row = mysqli_fetch_assoc($product_result);
    $available_quantity = $product_row['quantity'];

    if($available_quantity >= $Quantity) {
        // Insert order record
        $query = "INSERT INTO `creditorders`(`id`, `userid`, `cate_id`, `product_id`, `product_color`,`item`,`quantity`,`dateend`,`price`) VALUES (null,'$Customer','$category_id','$Product_id', '$Product_Color','$Product_item', '$Quantity', '$DateEnd','$Price')";
        mysqli_query($conn, $query);

        // Update product quantity
        $new_quantity = $available_quantity - $Quantity;
        $update_query = "UPDATE product SET quantity = '$new_quantity' WHERE id = '$Product_id'";
        mysqli_query($conn, $update_query);

        ?>
        <script>
            window.location.assign("CreditOrder.php?add");
        </script>
        <?php
    } else {
        // Product quantity not sufficient
        echo "<script>alert('Product quantity not sufficient!');</script>";
    }
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
        <title>Dashboard - Credit Order Add</title>
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
            <h1 class="mt-4">Add Credit Order</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Add Credit Order Dashboard</li>
            </ol>

<!--  =========================== Add Order ADD Form ============================== -->
<form action ="#" method="POST" >

<div class="mb-3">
    <label for="" class="form-label">Select Customer</label>

      <select name="txtuser" class="form-control" id="customerSelect">
        
        <?php
          $selectquery = "SELECT * FROM `credit`";
          $selectresult = mysqli_query($conn,$selectquery);
          if(mysqli_num_rows($selectresult)){
            while ($selectdata = mysqli_fetch_array($selectresult)) {
                ?>
                      <option value="<?php echo $selectdata[0];?>"><?php echo $selectdata[1];?></option>
                <?php
            }
          }
        ?>
       
      
      </select>


  </div>
  <div class="mb-3">
    <label for="" class="form-label">Category</label>
    <select name="category" class="form-control categories" required>
        <option value="">Select Category</option>
        <?php
        // Fetch categories from the database
        $category_query = "SELECT * FROM categories";
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
    <label for="" class="form-label">Color</label>
    <select name="txtproduct" id="txtproduct" class="form-control color_list">
          <option>Select</option>


  <?php
          $selectproduct = "SELECT * FROM `product`";
          $selectproresult = mysqli_query($conn,$selectproduct);
          if(mysqli_num_rows($selectproresult)){
            while ($selectdatarpoduct = mysqli_fetch_assoc($selectproresult)) {
                ?>
                      <option id="pro" value="<?php echo $selectdatarpoduct['color'];?>"><?php echo $selectdatarpoduct['color'];?> </option>
                <?php
            }
          }
        ?>
      </select>

  </div>
  <div class="mb-3">
    <label for="" class="form-label">Product</label>
    <select name="txtcolor" id="txtcolor" class="form-control product_list">
          <option>Select</option>


       <?php
          $selectproduct = "SELECT * FROM `product`";
          $selectproresult = mysqli_query($conn,$selectproduct);
          if(mysqli_num_rows($selectproresult)){
            while ($selectdatarpoduct = mysqli_fetch_assoc($selectproresult)) {
                ?>
                      <option id="pro2" value="<?php echo $selectdatarpoduct['title'];?>"><?php echo $selectdatarpoduct['title'];?></option>
                <?php
            }
          }
        ?>   
      </select>
      <div class="mb-3">
    <label for="" class="form-label">Items</label>
    <select name="txtpack" id="txtpack" class="form-control pack_list">
          <option>Select</option>


       <?php
          $selectproduct = "SELECT * FROM `product`";
          $selectproresult = mysqli_query($conn,$selectproduct);
          if(mysqli_num_rows($selectproresult)){
            while ($selectdatarpoduct = mysqli_fetch_assoc($selectproresult)) {
                ?>
                      <option id="pro3" value="<?php echo $selectdatarpoduct['pack'];?>"><?php echo $selectdatarpoduct['pack'];?></option>
                <?php
            }
          }
        ?>   
      </select>
  </div>
  <div class="mb-3">
        <label for="" class="form-label">Quantity</label>
        <input type="number" id="quantity" name="txtquantity" class="form-control" onchange="calculateTotal()">
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Date End</label>
        <input type="date" id="quantity" name="txtdateend" class="form-control" require>
    </div>
  <div class="mb-3">
    <label for="" class="form-label">Price</label>
    <input type="number" id="price" name="price" class="form-control" readonly>
  </div>
  <div class="mb-3">
        <label for="" class="form-label">Total Price</label>
        <input type="number" id="fullPrice" name="fullPrice" class="form-control" readonly>
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
        <script>
        function calculateTotal() {
            var quantity = document.getElementById('quantity').value;
            var price = document.getElementById('price').value;
            var fullPrice = quantity * price;
            document.getElementById('fullPrice').value = fullPrice;
        }
    </script>
      </body>
</html>
<script>
  setInterval(() => {
    $("document").ready(function(){
  
  $("#txtproduct").change(function(){
    var values = $("#txtproduct").val();
    $.ajax({
      url: "price.php",
      data: {values:values},
      type: "POST",
      success: function(data){
          $("#price").val(data);
      }
    })

  })
  
})
  }, 500);

</script>

<script src="./ajax_js/fetch_price.js"></script>