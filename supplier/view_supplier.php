<?php
include('../config/db.php');

$sql = "SELECT * FROM suppliers";
$result = $conn->query($sql);
?>

<h2>View Suppliers</h2>

<table border="1" cellpadding="10">
    <tr>
        <th>Supplier Number</th>
        <th>Name</th>
        <th>Address</th>
        <th>Telephone</th>
        <th>Fax</th>
    </tr>

    <?php
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>".$row['supplier_number']."</td>";
            echo "<td>".$row['name']."</td>";
            echo "<td>".$row['address']."</td>";
            echo "<td>".$row['tel_no']."</td>";
            echo "<td>".$row['fax_no']."</td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='5'>No suppliers found</td></tr>";
    }
    ?>

</table>
