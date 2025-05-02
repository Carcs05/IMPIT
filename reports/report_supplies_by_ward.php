<?php
include('../config/db.php');

$sql = "SELECT r.*, w.ward_name
        FROM requisitions r
        LEFT JOIN wards w ON r.ward_number = w.ward_number";

$result = $conn->query($sql);
?>

<h2>Report: Supplies Requested by Ward</h2>

<table border="1" cellpadding="10">
    <tr>
        <th>Ward Name</th>
        <th>Item Name</th>
        <th>Quantity</th>
        <th>Cost per Unit</th>
        <th>Date Ordered</th>
    </tr>

    <?php
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>".$row['ward_name']."</td>";
            echo "<td>".$row['item_name']."</td>";
            echo "<td>".$row['quantity']."</td>";
            echo "<td>".$row['cost_per_unit']."</td>";
            echo "<td>".$row['date_ordered']."</td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='5'>No requisitions found</td></tr>";
    }
    ?>

</table>
