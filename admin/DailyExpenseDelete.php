<?php

include_once("DatabaseConn.php");

$id = $_GET["id"];

$query = "DELETE FROM `dailyexpense` WHERE `id` = $id";

mysqli_query($conn,$query);

?>
<script>
    window.location.assign("Daily.php");
</script>