<?php
include_once("DatabaseConn.php");
$id = $_GET["id"];
$query = "DELETE FROM `homem` WHERE `id` = $id";
mysqli_query($conn,$query);
?>
<script>
    window.location.assign("HomeM.php");
</script>