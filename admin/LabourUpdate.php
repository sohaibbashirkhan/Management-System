<?php
include_once("DatabaseConn.php");

// Retrieve data from POST
$id = $_GET['id'];
$Name = $_POST['txtname'];
$Phone = $_POST['txtphone'];
$Cnic = $_POST['txtcnic'];
$Address = $_POST['txtaddress'];
$OtherExpense = $_POST['txtexpense'];
$Salary = $_POST['txtsalary'];

// Prepare the UPDATE query
$query = "UPDATE `labour` SET `name`=?, `phone`=?, `cnic`=?, `address`=?, `otherexpense`=?, `salary`=? WHERE `id`=?";
$stmt = mysqli_prepare($conn, $query);

if ($stmt) {
    // Bind parameters
    mysqli_stmt_bind_param($stmt, "ssssssi", $Name, $Phone, $Cnic, $Address, $OtherExpense, $Salary, $id);
    
    // Execute the statement
    mysqli_stmt_execute($stmt);

    // Close the statement
    mysqli_stmt_close($stmt);
}

// Redirect back to the Labour.php page
header("Location: Labour.php");
exit();
?>
