<?php
include('../config/db.php');

$sql = "SELECT i.*, p.first_name, p.last_name, w.ward_name
        FROM inpatients i
        LEFT JOIN patients p ON i.patient_number = p.patient_number
        LEFT JOIN wards w ON i.ward_number = w.ward_number";

$result = $conn->query($sql);
?>

<h2>Report: Inpatients by Ward</h2>

<table border="1" cellpadding="10">
    <tr>
        <th>Patient Name</th>
        <th>Ward Name</th>
        <th>Bed Number</th>
        <th>Date Placed</th>
        <th>Expected Leave Date</th>
    </tr>

    <?php
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>".$row['first_name']." ".$row['last_name']."</td>";
            echo "<td>".$row['ward_name']."</td>";
            echo "<td>".$row['bed_number']."</td>";
            echo "<td>".$row['date_placed']."</td>";
            echo "<td>".$row['date_expected_leave']."</td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='5'>No inpatients found</td></tr>";
    }
    ?>

</table>
