<?php
include_once('DatabaseConn.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $labourId = $_POST['labour'];
    $date = $_POST['date'];
    $entryTime = $_POST['entryTime'];
    $exitTime = $_POST['exitTime'] ?: NULL;
    $query = "INSERT INTO attendance (labour_id, date, entry_time, exit_time) 
              VALUES ('$labourId', '$date', '$entryTime', '$exitTime')";
    if (mysqli_query($conn, $query)) {
        header('Location: attendance.php');
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }
}
?>
