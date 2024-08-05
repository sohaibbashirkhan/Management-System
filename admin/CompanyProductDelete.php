<?php

include_once("DatabaseConn.php");

$id = $_GET["id"];

$query = "DELETE FROM `companyproduct` WHERE `id` = $id";

mysqli_query($conn,$query);

?>
<script>
    window.location.assign("CompanyProduct.php");
</script>