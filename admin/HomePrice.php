<?php

include_once("DatabaseConn.php");

$values = $_POST["values"];

$select = "SELECT CAST(price AS DECIMAL(10,2)) AS price FROM `homeproduct` WHERE `title` = '$values'";

$result = mysqli_query($conn, $select);

while ($row = mysqli_fetch_array($result)) {
    echo $row["price"];
}

?>
