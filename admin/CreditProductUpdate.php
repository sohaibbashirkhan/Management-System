<?php
include_once("DatabaseConn.php");
$id= $_GET['id'];
$Title = $_POST['txttitle'];
$Price = $_POST['txtprice'];
$PictureName = $_FILES['txtpicture']["name"];
$PictureTmp = $_FILES['txtpicture']["tmp_name"];

$query ="UPDATE `creditproduct` SET `title`= '$Title',`price`= '$Price',`Picture`= '$PictureName'  WHERE `id`= '$id'";
$q = mysqli_query($conn,$query);

?>
    <script>
    window.location.assign("CreditProduct.php");
</script>