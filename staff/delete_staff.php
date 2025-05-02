<?php
include('../config/db.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM staff WHERE staff_number='$id'";

    if ($conn->query($sql) === TRUE) {
        echo "Staff deleted successfully!";
    } else {
        echo "Error deleting staff: " . $conn->error;
    }
}

header("Location: view_staff.php");
exit();
?>
