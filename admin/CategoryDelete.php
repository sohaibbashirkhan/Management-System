<?php
    include_once("DatabaseConn.php");
    $id = $_GET["cate_id"];
    $query = "DELETE FROM `categories` WHERE `cate_id` = $id";
    mysqli_query($conn,$query);
    ?>
    <script>
        window.location.assign("category.php");
    </script>