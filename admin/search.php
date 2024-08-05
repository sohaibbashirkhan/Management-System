<?php
include_once("auth.php"); 
include_once("DatabaseConn.php");

// Function to search across all tables and columns
function searchDatabase($conn, $search_query) {
    $output = ''; // Initialize output variable

    // Get list of tables in the database
    $tables_query = "SHOW TABLES";
    $tables_result = mysqli_query($conn, $tables_query);

    if(mysqli_num_rows($tables_result) > 0) {
        while($table_row = mysqli_fetch_row($tables_result)) {
            $table_name = $table_row[0];
            // Prepare SQL query to search for records in each table
            $sql = "SELECT * FROM $table_name WHERE CONCAT(";
            $columns_query = "SHOW COLUMNS FROM $table_name";
            $columns_result = mysqli_query($conn, $columns_query);
            $columns = array();
            while($column_row = mysqli_fetch_assoc($columns_result)) {
                $columns[] = $column_row['Field'];
            }
            foreach($columns as $column) {
                $sql .= "$column, ' ', ";
            }
            $sql = rtrim($sql, ", ' ', ");
            $sql .= ") LIKE '%$search_query%'";
            // Execute the query
            $result = mysqli_query($conn, $sql);
            // Check if any records found
            if(mysqli_num_rows($result) > 0) {
                // Append search results to output
                $output .= "<div class='search-results'>";
                $output .= "<h2>Search Results for Table: $table_name</h2>";
                $output .= "<table class='table'>";
                $output .= "<thead><tr>";
                foreach($columns as $column) {
                    $output .= "<th>$column</th>";
                }
                $output .= "</tr></thead>";
                $output .= "<tbody>";
                while($row = mysqli_fetch_assoc($result)) {
                    $output .= "<tr>";
                    foreach($row as $value) {
                        $output .= "<td>$value</td>";
                    }
                    $output .= "</tr>";
                }
                $output .= "</tbody></table>";
                $output .= "</div>";
            }
        }
    } else {
        $output = "No tables found in the database";
    }

    return $output;
}

// Check if search query is set
if(isset($_GET['search_query'])) {
    // Sanitize the search query to prevent SQL injection
    $search_query = mysqli_real_escape_string($conn, $_GET['search_query']);

    // Call search function and store the result
    $search_results = searchDatabase($conn, $search_query);
} else {
    $search_results = "No search query provided"; // If search query is not provided
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for table -->
    <style>
        .search-results {
            margin-top: 20px;
        }

        .search-results table {
            width: 100%;
            border-collapse: collapse;
            border: 1px solid #ddd;
            background-color: #fff;
        }

        .search-results th,
        .search-results td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: left;
        }

        .search-results th {
            background-color: #f8f9fa;
            font-weight: bold;
            color: #333;
        }

        .search-results tbody tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .search-results tbody tr:hover {
            background-color: #e2e6ea;
        }
    </style>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <?php include_once("Header.php"); ?>

    <!-- Search Results -->
    <div id="search-results-container">
        <?php echo $search_results; ?>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>
