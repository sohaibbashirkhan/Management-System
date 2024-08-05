<?php
include_once("DatabaseConn.php");

$id = $_GET["id"];

// Prepare the DELETE query
$query = "DELETE FROM `labour` WHERE `id` = ?";
$stmt = mysqli_prepare($conn, $query);

if ($stmt) {
    // Bind the parameters
    mysqli_stmt_bind_param($stmt, "i", $id);

    // Execute the statement
    mysqli_stmt_execute($stmt);

    // Close the statement
    mysqli_stmt_close($stmt);
}

// Redirect back to the labour.php page
header("Location: labour.php");
exit();
?>
