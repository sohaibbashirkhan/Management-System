<?php
include_once("DatabaseConn.php");
$id = $_GET["id"];
$query = "DELETE FROM `credit` WHERE `Id` = $id";
mysqli_query($conn,$query);
?>
<script>
    window.location.assign("Credit.php");
</script>