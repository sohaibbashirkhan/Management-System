<?php
include_once("DatabaseConn.php");
$id = $_GET["id"];
$query = "DELETE FROM `homeproduct` WHERE `id` = $id";
mysqli_query($conn,$query);
?>
<script>
    window.location.assign("HomeProduct.php");
</script>