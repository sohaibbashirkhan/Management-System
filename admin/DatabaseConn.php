<?php
// Establishing a connection to the MySQL database server
$servername = "localhost"; // MySQL server address (usually localhost)
$username = "ishtiaqp_upaintstore"; // MySQL username
$password = "O+Nv9#Ivd6bA"; // MySQL password (if any)
$database = "ishtiaqp_paintstore"; // Name of the database you want to connect to

// Creating a connection to the MySQL database
$conn = mysqli_connect($servername, $username, $password, $database);

// Checking if the connection was successful
if (!$conn) {
    // If connection fails, output an error message and terminate the script
    die("Connection failed: " . mysqli_connect_error());
}
?>
