<?php
include('../config/db.php');

if (isset($_POST['search'])) {
    $qualification = $_POST['qualification'];

    $sql = "SELECT * FROM staff WHERE qualifications LIKE '%$qualification%'";
    $result = $conn->query($sql);
}
?>

<h2>Search Staff by Qualification</h2>

<form method="POST" action="">
    Qualification: 
    <input type="text" name="qualification" required>
    <input type="submit" name="search" value="Search">
</form>

<?php
if (isset($result)) {
    echo "<h3>Search Results:</h3>";
    echo "<table border='1' cellpadding='10'>
            <tr>
                <th>Staff Number</th>
                <th>Name</th>
                <th>Qualification</th>
                <th>Position</th>
            </tr>";

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>".$row['staff_number']."</td>";
            echo "<td>".$row['first_name']." ".$row['last_name']."</td>";
            echo "<td>".$row['qualifications']."</td>";
            echo "<td>".$row['position']."</td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='4'>No staff found with that qualification.</td></tr>";
    }

    echo "</table>";
}
?>

<a href="view_staff.php">Back to Staff List</a>
