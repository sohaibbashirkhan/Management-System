<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Labour Attendance System</title>
    <!-- Custom fonts -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <!-- Custom styles -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <!-- Custom styles for DataTables -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>
<body>
    <?php
    include_once("Header.php");
    include_once("DatabaseConn.php");

    // Get the selected date if set
    $selectedDate = isset($_GET['date']) ? $_GET['date'] : '';

    // Get the selected labour ID if set
    $selectedLabourId = isset($_GET['labour']) ? $_GET['labour'] : '';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $labourId = $_POST['labour'];
        $attendanceType = $_POST['attendanceType'];
        $date = $_POST['date'];
        $entryTime = $_POST['entryTime'];
        $exitTime = $_POST['exitTime'];

        // Retrieve labour's current salary
        $query = "SELECT salary FROM labour WHERE id = ?";
        $stmt = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($stmt, "i", $labourId);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $currentSalary);
        mysqli_stmt_fetch($stmt);
        mysqli_stmt_close($stmt);

        // Initialize new salary to current salary
        $newSalary = $currentSalary;

        // Adjust salary based on attendance type
        if ($attendanceType === 'late') {
            // Handle late attendance
            $lateEntryTime = strtotime($entryTime);
            $lateThreshold = strtotime('08:00:00');
            $lateDiff = max(0, $lateEntryTime - $lateThreshold);
            $lateMinutes = ceil($lateDiff / 60); // Calculate late minutes
            $latePenalty = $lateMinutes * 100 / 60; // Calculate late penalty based on custom rate
            $newSalary -= $latePenalty; // Deduct penalty from current salary
        } elseif ($attendanceType === 'overtime') {
            // Handle overtime attendance
            $exitTime = strtotime($exitTime);
            $overtimeThreshold = strtotime('20:00:00');
            if ($exitTime > $overtimeThreshold) {
                $overtimeDiff = $exitTime - $overtimeThreshold;
                $overtimeMinutes = ceil($overtimeDiff / 60); // Calculate overtime minutes
                $overtimeBonus = $overtimeMinutes * 100 / 60; // Calculate overtime bonus based on custom rate
                $newSalary += $overtimeBonus; // Add bonus to current salary
            }
        } elseif ($attendanceType === 'advance') {
            // Handle advance attendance
            $price = $_POST['price']; // Price entered for advance
            $newSalary -= $price; // Deduct advance from current salary
        } elseif ($attendanceType === 'leave') {
            // Deduct Rs. 900 from the salary for leave
            $leaveDeductionAmount = 900;
            $newSalary -= $leaveDeductionAmount;

            // Update the labour's salary in the database
            $query = "UPDATE labour SET salary = ? WHERE id = ?";
            $stmt = mysqli_prepare($conn, $query);
            mysqli_stmt_bind_param($stmt, "di", $newSalary, $labourId);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);

            // Record leave in the database (optional, depending on your system requirements)
            // For example, you can insert a record in the database to mark the day as leave

            // Redirect with a success message using JavaScript
            $message = "Leave recorded successfully. Rs. 900 deducted from salary.";
            echo "<script>alert('$message'); window.location.href = 'attendance.php';</script>";
            exit();
        }

        // Update labour's salary in the database
        $query = "UPDATE labour SET salary = ? WHERE id = ?";
        $stmt = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($stmt, "di", $newSalary, $labourId);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

        // Record attendance in the database
        $query = "INSERT INTO attendance (labour_id, date, entry_time, exit_time) VALUES (?, ?, ?, ?)";
        $stmt = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($stmt, "isss", $labourId, $date, $entryTime, $exitTime);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

        // Record attendance and redirect with a success message using JavaScript
        $message = "Attendance recorded successfully.";
        echo "<script>alert('$message'); window.location.href = 'attendance.php';</script>";
        exit();
    }

    // Function to format late and overtime status
    function formatStatus($time, $threshold) {
        return $time > $threshold ? 'Yes' : 'No';
    }

    // Check for messages in the URL
    if (isset($_GET['message'])) {
        $message = urldecode($_GET['message']);
        echo "<div class='alert alert-info mt-4'>$message</div>";
    }

    // Get the selected labour ID if set
    $selectedLabourId = isset($_GET['labour']) ? $_GET['labour'] : '';
    ?>
    <div class="container">
        <h1 class="mt-4">Labour Attendance System</h1>

        <!-- Form to add new labour -->
        <div class="card mt-4">
            <div class="card-header">Add New Labour</div>
            <div class="card-body">
                <form action="add_labour.php" method="POST">
                    <div class="form-group">
                        <label for="labourName">Labour Name</label>
                        <input type="text" name="labourName" id="labourName" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Add Labour</button>
                </form>
            </div>
        </div>

        <!-- Form to record attendance -->
        <div class="card mt-4">
            <div class="card-header">Record Attendance</div>
            <div class="card-body">
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                    <div class="form-group">
                        <label for="labour">Select Labour</label>
                        <select name="labour" id="labour" class="form-control" required>
                            <option
                            <option value="">Select Labour</option>
                            <?php
                            $query = "SELECT * FROM labour";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<option value='" . $row['id'] . "'>" . $row['name'] . "</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="attendanceType">Attendance Type</label>
                        <select name="attendanceType" id="attendanceType" class="form-control" required>
                            <option value="">Select Attendance Type</option>
                            <option value="late">Late (Deduct from Salary)</option>
                            <option value="overtime">Overtime (Add to Salary)</option>
                            <option value="advance">Advance (Deduct from Salary)</option>
                            <option value="leave">Leave (Deduct Rs. 900 from Salary)</option> <!-- Added leave option -->
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="price">Price</label>
                        <input type="number" name="price" id="price" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="date">Date</label>
                        <input type="date" name="date" id="date" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="entryTime">Entry Time</label>
                        <input type="time" name="entryTime" id="entryTime" class="form-control" >
                    </div>
                    <div class="form-group">
                        <label for="exitTime">Exit Time</label>
                        <input type="time" name="exitTime" id="exitTime" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-primary">Record Attendance</button>
                </form>
            </div>
        </div>

           <div class="container">
        <h1 class="mt-4">Labour Attendance System</h1>

<!-- Form to filter attendance records -->
<div class="card mt-4">
    <div class="card-header">Filter Attendance Records</div>
    <div class="card-body">
        <form method="GET" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="labourFilter">Select Labour</label>
                    <select name="labour" id="labourFilter" class="form-control">
                        <option value="">All Labours</option>
                        <?php
                        $query = "SELECT * FROM labour";
                        $result = mysqli_query($conn, $query);
                        while ($row = mysqli_fetch_assoc($result)) {
                            $selected = ($row['id'] == $selectedLabourId) ? 'selected' : '';
                            echo "<option value='" . $row['id'] . "' $selected>" . $row['name'] . "</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group col-md-3">
                    <label for="dateFilter">Select Date</label>
                    <input type="date" name="date" id="dateFilter" class="form-control" value="<?php echo $selectedDate; ?>">
                </div>
                <div class="form-group col-md-2">
                    <label for="filterButton">&nbsp;</label>
                    <button type="submit" id="filterButton" class="btn btn-primary form-control">Filter</button>
                </div>
            </div>
        </form>
    </div>
</div>

        <!-- Table to display attendance records -->
        <div class="card mt-4">
            <div class="card-header">Attendance Records</div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Date</th>
                            <th>Entry Time</th>
                            <th>Exit Time</th>
                            <th>Late</th>
                            <th>Overtime</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                       // Modify the query to filter records based on the selected labour and date
$query = "SELECT a.id, l.name, a.date, a.entry_time, a.exit_time 
          FROM attendance a 
          JOIN labour l ON a.labour_id = l.id 
          WHERE 1";
if (!empty($selectedLabourId)) {
    $query .= " AND a.labour_id = $selectedLabourId";
}
if (!empty($selectedDate)) {
    $query .= " AND a.date = '$selectedDate'";
}
$query .= " ORDER BY a.date DESC";

$result = mysqli_query($conn, $query);

while ($row = mysqli_fetch_assoc($result)) {
    $late = formatStatus($row['entry_time'], '08:00:00');
    $overtime = formatStatus($row['exit_time'], '20:00:00');
    echo "<tr>
            <td>{$row['id']}</td>
            <td>{$row['name']}</td>
            <td>{$row['date']}</td>
            <td>{$row['entry_time']}</td>
            <td>{$row['exit_time']}</td>
            <td>{$late}</td>
            <td>{$overtime}</td>
            <td>
                <form action='delete_attendance.php' method='POST' onsubmit='return confirm(\"Are you sure you want to delete this record?\");'>
                    <input type='hidden' name='id' value='{$row['id']}'>
                    <button type='submit' class='btn btn-danger btn-sm'>Delete</button>
                </form>
            </td>
        </tr>";
}

                        

                        mysqli_stmt_close($stmt);
                        ?>
                    </tbody>
                </table>
</div>
</div>
</div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
