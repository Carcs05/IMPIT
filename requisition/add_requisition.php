<?php
include('../config/db.php');

// Fetch all staff
$staff_sql = "SELECT * FROM staff";
$staff_result = $conn->query($staff_sql);

// Fetch all wards
$ward_sql = "SELECT * FROM wards";
$ward_result = $conn->query($ward_sql);

if (isset($_POST['submit'])) {
    $staff_number = $_POST['staff_number'];
    $ward_number = $_POST['ward_number'];
    $item_name = $_POST['item_name'];
    $quantity = $_POST['quantity'];
    $cost_per_unit = $_POST['cost_per_unit'];
    $date_ordered = date('Y-m-d');

    $sql = "INSERT INTO requisitions (staff_number, ward_number, item_name, quantity, cost_per_unit, date_ordered)
            VALUES ('$staff_number', '$ward_number', '$item_name', '$quantity', '$cost_per_unit', '$date_ordered')";

    if ($conn->query($sql) === TRUE) {
        echo "Requisition added successfully!";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<h2>Add Requisition</h2>

<form method="POST" action="">
    Staff:
    <select name="staff_number" required>
        <?php
        if ($staff_result->num_rows > 0) {
            while($staff = $staff_result->fetch_assoc()) {
                echo "<option value='".$staff['staff_number']."'>".$staff['first_name']." ".$staff['last_name']."</option>";
            }
        } else {
            echo "<option>No staff available</option>";
        }
        ?>
    </select><br><br>

    Ward:
    <select name="ward_number" required>
        <?php
        if ($ward_result->num_rows > 0) {
            while($ward = $ward_result->fetch_assoc()) {
                echo "<option value='".$ward['ward_number']."'>".$ward['ward_name']." (Ward ".$ward['ward_number'].")</option>";
            }
        } else {
            echo "<option>No wards available</option>";
        }
        ?>
    </select><br><br>

    Item Name: <input type="text" name="item_name" required><br><br>
    Quantity: <input type="number" name="quantity" required><br><br>
    Cost Per Unit: <input type="number" step="0.01" name="cost_per_unit" required><br><br>

    <input type="submit" name="submit" value="Add Requisition">
</form>

<a href="view_requisition.php">View Requisitions</a>
