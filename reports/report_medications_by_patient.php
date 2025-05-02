<?php
include('../config/db.php');

$sql = "SELECT m.*, p.first_name, p.last_name
        FROM medication m
        LEFT JOIN patients p ON m.patient_number = p.patient_number";

$result = $conn->query($sql);
?>

<h2>Report: Medications by Patient</h2>

<table border="1" cellpadding="10">
    <tr>
        <th>Patient Name</th>
        <th>Drug Name</th>
        <th>Dosage</th>
        <th>Method</th>
        <th>Units/Day</th>
        <th>Start Date</th>
        <th>Finish Date</th>
    </tr>

    <?php
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>".$row['first_name']." ".$row['last_name']."</td>";
            echo "<td>".$row['drug_name']."</td>";
            echo "<td>".$row['dosage']."</td>";
            echo "<td>".$row['method_of_admin']."</td>";
            echo "<td>".$row['units_per_day']."</td>";
            echo "<td>".$row['start_date']."</td>";
            echo "<td>".$row['finish_date']."</td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='7'>No medication records found</td></tr>";
    }
    ?>

</table>
