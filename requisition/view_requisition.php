<?php
include('../config/db.php');

$sql = "SELECT r.*, s.first_name, s.last_name, w.ward_name 
        FROM requisitions r 
        LEFT JOIN staff s ON r.staff_number = s.staff_number
        LEFT JOIN wards w ON r.ward_number = w.ward_number";

$result = $conn->query($sql);
?>

<h2>View Requisitions</h2>

<table border="1" cellpadding="10">
    <tr>
        <th>Requisition No.</th>
        <th>Staff</th>
        <th>Ward</th>
        <th>Item Name</th>
        <th>Quantity</th>
        <th>Cost per Unit</th>
        <th>Date Ordered</th>
    </tr>

    <?php
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>".$row['requisition_number']."</td>";
            echo "<td>".$row['first_name']." ".$row['last_name']."</td>";
            echo "<td>".$row['ward_name']."</td>";
            echo "<td>".$row['item_name']."</td>";
            echo "<td>".$row['quantity']."</td>";
            echo "<td>".$row['cost_per_unit']."</td>";
            echo "<td>".$row['date_ordered']."</td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='7'>No requisitions found</td></tr>";
    }
    ?>

</table>

<a href="add_requisition.php">Add New Requisition</a>
