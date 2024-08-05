<?php
include_once("DatabaseConn.php");

class ExpenseUpdater {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function updateExpense() {
        if(isset($_GET['id']) && isset($_POST['txtname']) && isset($_POST['txtproduct']) && isset($_POST['txtdate']) && isset($_POST['txtprice'])) {
            $id = mysqli_real_escape_string($this->conn, $_GET['id']);
            $Name = mysqli_real_escape_string($this->conn, $_POST['txtname']);
            $Product = mysqli_real_escape_string($this->conn, $_POST['txtproduct']);
            $Date = mysqli_real_escape_string($this->conn, $_POST['txtdate']);
            $Price = mysqli_real_escape_string($this->conn, $_POST['txtprice']);

            $query ="UPDATE `dailyexpense` SET `Name`='$Name',`Product`='$Product',`Date`='$Date',`Price`='$Price' WHERE `id`='$id'";
            $q = mysqli_query($this->conn, $query);

            if($q) {
                header("Location: Daily.php");
                exit();
            } else {
                // Handle query execution failure
                echo "Failed to update expense.";
            }
        } else {
            // Handle missing parameters
            echo "Missing parameters.";
        }
    }
}

// Instantiate the class and update the expense
$expenseUpdater = new ExpenseUpdater($conn);
$expenseUpdater->updateExpense();
?>
