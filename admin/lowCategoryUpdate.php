<?php
    include_once("DatabaseConn.php");
    $id = $_GET["cate_id"];
    $query = "DELETE FROM `lowcategory` WHERE `cate_id` = $id";
    mysqli_query($conn,$query);
    ?>
    <script>
        window.location.assign("lowcategory.php");
    </script>