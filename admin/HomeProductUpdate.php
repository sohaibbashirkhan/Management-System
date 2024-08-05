<?php
include_once("DatabaseConn.php");
$id= $_GET['id'];
$Title = $_POST['txttitle'];
$Price = $_POST['txtprice'];

$query ="UPDATE `homeproduct` SET `title`= '$Title',`price`= '$Price'  WHERE `id`= '$id'";
$q = mysqli_query($conn,$query);

?>
    <script>
    window.location.assign("HomeProduct.php");
</script>