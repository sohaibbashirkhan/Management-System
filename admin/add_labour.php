<?php
include_once('DatabaseConn.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $labourName = $_POST['labourName'];
    $query = "INSERT INTO labour (name) VALUES ('$labourName')";
    if (mysqli_query($conn, $query)) {
        header('Location: attendance.php');
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }
}
?>
