<?php
include_once("DatabaseConn.php");
$id= $_GET['id'];
$Title = $_POST['txttitle'];
$Color = $_POST['txtcolor'];
$Pack = $_POST['txtpack'];
$Quantity = $_POST['txtquantity'];
$Price = $_POST['txtprice'];


$query ="UPDATE `companyproduct` SET `title`= '$Title',`color`= '$Color',`pack`= '$Pack',`quantity`= '$Quantity',`price`= '$Price' WHERE `id`= '$id'";
$q = mysqli_query($conn,$query);

?>
    <script>
    window.location.assign("CompanyProduct.php");
</script>