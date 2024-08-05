<?php
session_start();

// Check if the "name" session variable is not set or empty
if (!isset($_SESSION["name"]) || empty($_SESSION["name"])) {
    // Redirect to the login page if the user is not authenticated
    header("Location: adminlogin.php");
    exit(); // Terminate script execution
}
?>