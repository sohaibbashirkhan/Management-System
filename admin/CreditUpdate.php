<?php
include_once("DatabaseConn.php");
$id= $_GET['id'];
$Name = $_POST['txtname'];
$Phone = $_POST['txtphone'];
$Address = $_POST['txtaddress'];
$query ="UPDATE `credit` SET `Name`='$Name',`Phone`='$Phone', `Address`='$Address' WHERE `id`= $id";
 $q = mysqli_query($conn,$query);
?>
    <script>
    window.location.assign("Credit.php");
</script>