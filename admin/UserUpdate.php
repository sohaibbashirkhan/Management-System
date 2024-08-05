<?php
include_once("DatabaseConn.php");

// Retrieve data from the form
$id = $_GET['id'];
$Name = mysqli_real_escape_string($conn, $_POST['txtname']);
$Email = mysqli_real_escape_string($conn, $_POST['txtemail']);
$Password = mysqli_real_escape_string($conn, $_POST['txtpass']);
$Phone = mysqli_real_escape_string($conn, $_POST['txtphone']);
// $DOB = mysqli_real_escape_string($conn, $_POST['txtdob']);

// // Handle picture upload
// $PictureName = '';
// if ($_FILES['txtpicture']['error'] == 0) {
//     $PictureName = mysqli_real_escape_string($conn, $_FILES['txtpicture']['name']);
//     $PictureTmp = $_FILES['txtpicture']['tmp_name'];
//     move_uploaded_file($PictureTmp, "upload/" . $PictureName);
// }

// Prepare the SQL query to update user information
$query = "UPDATE `user` SET `name`='$Name', `email`='$Email', `password`='$Password', `phone`='$Phone'";
// if (!empty($PictureName)) {
//     $query .= ", `picture`='$PictureName'";
// }
// $query .= " WHERE `id`=$id";

// Execute the query
$q = mysqli_query($conn, $query);

// Redirect to the UserShow.php page
header("Location: UserShow.php");
exit; // Terminate script execution
?>
