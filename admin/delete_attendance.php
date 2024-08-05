<?php
include_once("DatabaseConn.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];

    // Delete the attendance record with the given ID
    $query = "DELETE FROM attendance WHERE id = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "i", $id);

    if (mysqli_stmt_execute($stmt)) {
        $message = "Record deleted successfully.";
    } else {
        $message = "Error deleting record: " . mysqli_error($conn);
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);

    // Redirect back to the main page with a success or error message
    header("Location: attendance.php?message=" . urlencode($message));
    exit;
} else {
    echo "Invalid request.";
}
?>
