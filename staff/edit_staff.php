<?php
include('../config/db.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM staff WHERE staff_number='$id'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
}

if (isset($_POST['update'])) {
    $staff_number = $_POST['staff_number'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $position = $_POST['position'];
    $ward_number = $_POST['ward_number'];

    $sql = "UPDATE staff SET 
            first_name='$first_name', 
            last_name='$last_name', 
            position='$position', 
            ward_number='$ward_number' 
            WHERE staff_number='$staff_number'";

    if ($conn->query($sql) === TRUE) {
        echo "Staff updated successfully!";
        header("Location: view_staff.php");
        exit();
    } else {
        echo "Error updating record: " . $conn->error;
    }
}
?>

<h2>Edit Staff</h2>

<form method="POST" action="">
    <input type="hidden" name="staff_number" value="<?php echo $row['staff_number']; ?>">
    
    First Name: <input type="text" name="first_name" value="<?php echo $row['first_name']; ?>" required><br><br>
    Last Name: <input type="text" name="last_name" value="<?php echo $row['last_name']; ?>" required><br><br>
    Position: <input type="text" name="position" value="<?php echo $row['position']; ?>" required><br><br>
    Ward Number: <input type="number" name="ward_number" value="<?php echo $row['ward_number']; ?>" required><br><br>
    
    <input type="submit" name="update" value="Update Staff">
</form>

<a href="view_staff.php">Back to Staff List</a>
