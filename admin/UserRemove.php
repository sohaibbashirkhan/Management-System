<?php
include_once("DatabaseConn.php");

// Retrieve user ID from GET request
$id = $_GET["id"];

// Prepare the SQL query to delete user based on ID
$query = "DELETE FROM `user` WHERE `id` = $id";

// Execute the query
mysqli_query($conn, $query);

// Redirect to the UserShow.php page after deletion
header("Location: UserShow.php");
exit; // Terminate script execution
?>
