<?php
        include_once("auth.php"); 
        include_once("DatabaseConn.php");
        ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Billing</title>
        <link rel="icon" type="image/x-icon" href="img/mylogo.webp">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            margin-top: 50px;
            background-color: #fff;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        h1, h2, h3 {
            color: #343a40;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- <h1 class="text-center">Ishtiqa Paint House</h1>
        <h2 class="text-center">Billing</h2> -->
        <?php
        class BillPrinter {
            private $conn;

            public function __construct($conn) {
                $this->conn = $conn;
            }

            public function printBill() {
                if(isset($_POST["submit"])) {
                    $customer = $_POST["customer"];
                    $startdate = $_POST["startdate"];
                    $enddate = $_POST["enddate"];

                    $select = "SELECT companyorder.id, companyorder.Userid, companyproduct.title, companyorder.quantity, companyorder.date, companyorder.price FROM `companyorder` INNER JOIN `companyproduct` ON companyorder.product_id = companyproduct.id
                        WHERE companyorder.id = $customer AND date BETWEEN '$startdate' AND '$enddate'";

                    $count = "SELECT SUM(companyorder.price * companyorder.quantity) 
                                FROM `companyorder` 
                                WHERE companyorder.id = $customer AND date BETWEEN '$startdate' AND '$enddate'";

                    $result = mysqli_query($this->conn, $select);

                    if (!$result) {
                        die("Error executing select query: " . mysqli_error($this->conn));
                    }

                    $countresult = mysqli_query($this->conn, $count);

                    if (!$countresult) {
                        die("Error executing count query: " . mysqli_error($this->conn));
                    }

                    $countdata = mysqli_fetch_array($countresult);

                    if(mysqli_num_rows($result)) {
                        $user = "SELECT * FROM `companyorder` WHERE `id` = $customer";
                        $userresult = mysqli_query($this->conn, $user);
                        $mydata = mysqli_fetch_array($userresult);
                        
                        echo '<div class="container">';
                        echo '<h1 class="text-center">Ishtiqa Paint House</h1>';
                        echo '<h2 class="text-center">Billing Details</h2>';
                        echo '<p class="text-center">Customer Name: ' . $mydata[1] . '</p>';
                        echo '<br>';
                        echo '<table class="table table-bordered">';
                        echo '<thead class="table-primary">';
                        echo '<tr>';
                        echo '<th scope="col">ID</th>';
                        echo '<th scope="col">Product</th>';
                        echo '<th scope="col">Quantity</th>';
                        echo '<th scope="col">Date</th>';
                        echo '<th scope="col">Price</th>';
                        echo '<th scope="col">Total Price</th>';
                        echo '</tr>';
                        echo '</thead>';
                        echo '<tbody>';
                        
                        while($data = mysqli_fetch_array($result)) {
                            echo '<tr>';
                            echo '<td>' . $data[0] . '</td>';
                            echo '<td>' . $data[2] . '</td>';
                            echo '<td>' . $data[3] . '</td>';
                            echo '<td>' . $data[4] . '</td>';
                            echo '<td>' . $data[5] . '</td>';
                            
                            // Calculate total price for each product
                            $totalProductPrice = $data[3] * $data[5];
                            
                            echo '<td>' . $totalProductPrice . '</td>'; // Display total price for each product
                            echo '</tr>';
                        }
                        echo '</tbody>';
                        echo '</table>';
                        echo '<br>';
                        echo '<h3 class="text-center">Total Amount: Pkr:' . $countdata[0] . '</h3>'; // Display total price for all products
                        echo '</div>';
                    }
                }
            }
        }

        // Create an instance of BillPrinter
        $billPrinter = new BillPrinter($conn);
        $billPrinter->printBill();
        ?>
        <br>
        <div class="text-center">
            <button class="btn btn-success" onclick="MyWork()">Print Bill</button>
        </div>
    </div>
</body>
<script type="text/javascript">
    function MyWork(){
        window.print();
    }
</script>
</html>
