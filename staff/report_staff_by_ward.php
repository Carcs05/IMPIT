<?php
include('../config/db.php');

$sql = "SELECT ward_number, ward_name FROM wards";
$wards = $conn->query($sql);

if (isset($_POST['view'])) {
    $ward_number = $_POST['ward_number'];
    $staff_sql = "SELECT * FROM staff WHERE ward_number = '$ward_number'";
    $staff_result = $conn->query($staff_sql);
}
?>

<h2>Report: Staff Allocated to Ward</h2>

<form method="POST" action="">
    Select Ward:
    <select name="ward_number" required>
        <?php
        if ($wards->num_rows > 0) {
            while($ward = $wards->fetch_assoc()) {
                echo "<option value='".$ward['ward_number']."'>".$ward['ward_name']." (Ward ".$ward['ward_number'].")</option>";
            }
        }
        ?>
    </select>
    <input type="submit" name="view" value="View Staff">
</form>

<?php
if (isset($staff_result)) {
    echo "<h3>Staff List for Selected Ward:</h3>";
    echo "<table border='1' cellpadding='10'>
            <tr>
                <th>Staff Number</th>
                <th>Name</th>
                <th>Position</th>
            </tr>";

    if ($staff_result->num_rows > 0) {
        while($row = $staff_result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>".$row['staff_number']."</td>";
            echo "<td>".$row['first_name']." ".$row['last_name']."</td>";
            echo "<td>".$row['position']."</td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='3'>No staff allocated to this ward.</td></tr>";
    }

    echo "</table>";
}
?>

<a href="view_staff.php">Back to Staff List</a>
