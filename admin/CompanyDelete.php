<?php

include_once("DatabaseConn.php");

$id = $_GET["id"];

$query = "DELETE FROM `company` WHERE `id` = $id";

mysqli_query($conn,$query);

?>
<script>
    window.location.assign("Company.php");
</script>