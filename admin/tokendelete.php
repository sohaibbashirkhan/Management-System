<?php
    include_once("DatabaseConn.php");
    $id = $_GET["id"];
    $query = "DELETE FROM `token` WHERE `id` = $id";
    mysqli_query($conn,$query);
    ?>
    <script>
        window.location.assign("TokenCash.php");
    </script>