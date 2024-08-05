<?php
include_once('DatabaseConn.php');

if (isset($_POST['labourId'])) {
    $labourId = $_POST['labourId'];
    $query = "SELECT date, entry_time, exit_time, 
                     IF(entry_time > '07:00:00', 'Yes', 'No') AS late, 
                     IF(exit_time > '22:00:00', 'Yes', 'No') AS overtime 
              FROM attendance 
              WHERE id = '$labourId'";
    $result = mysqli_query($conn, $query);
    
    $lateDays = 0;
    $overtimeDays = 0;

    echo "<table class='table table-bordered'>
            <thead>
            <tr>
                <th>Date</th>
                <th>Entry Time</th>
                <th>Exit Time</th>
                <th>Late</th>
                <th>Overtime</th>
            </tr>
            </thead>
            <tbody>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
                <td>{$row['date']}</td>
                <td>{$row['entry_time']}</td>
                <td>{$row['exit_time']}</td>
                <td>{$row['late']}</td>
                <td>{$row['overtime']}</td>
              </tr>";
        if ($row['late'] == 'Yes') $lateDays++;
        if ($row['overtime'] == 'Yes') $overtimeDays++;
    }
    echo "</tbody>
        </table>";

    echo "<p>Late Days: $lateDays</p>";
    echo "<p>Overtime Days: $overtimeDays</p>";
}
?>
