<?php
include('../config/db.php');

$sql = "SELECT p.*, d.full_name AS doctor_name, n.full_name AS kin_name 
        FROM patients p 
        LEFT JOIN doctors d ON p.doctor_clinic_number = d.clinic_number
        LEFT JOIN next_of_kin n ON p.next_of_kin_id = n.next_of_kin_id";

$result = $conn->query($sql);
?>

<h2>View Patients</h2>

<table border="1" cellpadding="10">
    <tr>
        <th>Patient Number</th>
        <th>Full Name</th>
        <th>Telephone</th>
        <th>Sex</th>
        <th>Marital Status</th>
        <th>Doctor</th>
        <th>Next of Kin</th>
    </tr>

    <?php
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>".$row['patient_number']."</td>";
            echo "<td>".$row['first_name']." ".$row['last_name']."</td>";
            echo "<td>".$row['tel_no']."</td>";
            echo "<td>".$row['sex']."</td>";
            echo "<td>".$row['marital_status']."</td>";
            echo "<td>".$row['doctor_name']."</td>";
            echo "<td>".$row['kin_name']."</td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='7'>No patients found</td></tr>";
    }
    ?>

</table>

<a href="add_patient.php">Add New Patient</a>
