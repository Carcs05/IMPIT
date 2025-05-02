<?php
include('../config/db.php');

$sql = "SELECT * FROM staff";
$result = $conn->query($sql);
?>

<h2>View Staff</h2>

<table border="1" cellpadding="10">
    <tr>
        <th>Staff Number</th>
        <th>Name</th>
        <th>Position</th>
        <th>Ward Number</th>
        <th>Action</th>
    </tr>

    <?php
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>".$row['staff_number']."</td>";
            echo "<td>".$row['first_name']." ".$row['last_name']."</td>";
            echo "<td>".$row['position']."</td>";
            echo "<td>".$row['ward_number']."</td>";
            echo "<td>
                    <a href='edit_staff.php?id=".$row['staff_number']."'>Edit</a> | 
                    <a href='delete_staff.php?id=".$row['staff_number']."' onclick=\"return confirm('Are you sure you want to delete this staff?');\">Delete</a>
                  </td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='5'>No staff found</td></tr>";
    }
    ?>

</table>

<a href="add_staff.php">Add New Staff</a>
