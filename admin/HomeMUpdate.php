<?php
include_once("DatabaseConn.php");
$id= $_GET['id'];
$Name = $_POST['txtname'];
$Phone = $_POST['txtphone'];
$query ="UPDATE `homem` SET `Name`='$Name',`Phone`='$Phone' WHERE `id`= $id";
 $q = mysqli_query($conn,$query);
?>
    <script>
    window.location.assign("HomeM.php");
</script>