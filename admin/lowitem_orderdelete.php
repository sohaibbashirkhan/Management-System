<?php
    include_once("DatabaseConn.php");
    $id = $_GET["id"];
    $query = "DELETE FROM `lowitemorder` WHERE `id` = $id";
    mysqli_query($conn,$query);
    ?>
    <script>
        window.location.assign("lowitem_order.php");
    </script>