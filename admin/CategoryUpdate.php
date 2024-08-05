<?php
include_once("DatabaseConn.php");
$id= $_GET['cate_id'];
$Name = $_POST['txtname'];
$query ="UPDATE `categories` SET `cate_name`='$Name' WHERE `cate_id`= $id";
 $q = mysqli_query($conn,$query);
?>
    <script>
    window.location.assign("category.php");
</script>