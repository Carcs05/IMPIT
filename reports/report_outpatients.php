<?php
include('../config/db.php');

$sql = "SELECT p.patient_number, p.first_name, p.last_name, d.full_name AS doctor_name
        FROM patients p
        LEFT JOIN inpatients i ON p.patient_number = i.patient_number
        LEFT JOIN doctors d ON p.doctor_clinic_number = d.clinic_number
        WHERE i.patient_number IS NULL";

$result = $conn->query($sql);
?>

<h2>Report: Outpatients</h2>

<table border="1" cellpadding="10">
    <tr>
        <th>Patient Number</th>
        <th>Name</th>
        <th>Doctor</th>
    </tr>

    <?php
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>".$row['patient_number']."</td>";
            echo "<td>".$row['first_name']." ".$row['last_name']."</td>";
            echo "<td>".$row['doctor_name']."</td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='3'>No outpatients found</td></tr>";
    }
    ?>

</table>
