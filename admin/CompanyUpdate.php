<?php
include_once("DatabaseConn.php");
$id= $_GET['id'];
$Name = $_POST['txtname'];
$Phone = $_POST['txtphone'];
$Address = $_POST['txtaddress'];
 $query ="UPDATE `company` SET `name`='$Name',`phone`='$Phone',`address`='$Address' WHERE `id`=$id";
 $q = mysqli_query($conn,$query);
?>
    <script>
    window.location.assign("Company.php");
</script>