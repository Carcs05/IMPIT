<?php
include('../config/db.php');

if (isset($_POST['submit'])) {
    $staff_number = $_POST['staff_number'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $address = $_POST['address'];
    $tel_no = $_POST['tel_no'];
    $dob = $_POST['dob'];
    $sex = $_POST['sex'];
    $nin = $_POST['nin'];
    $position = $_POST['position'];
    $salary = $_POST['salary'];
    $salary_scale = $_POST['salary_scale'];
    $contract_type = $_POST['contract_type'];
    $hours_per_week = $_POST['hours_per_week'];
    $payment_type = $_POST['payment_type'];
    $ward_number = $_POST['ward_number'];

    $sql = "INSERT INTO staff (staff_number, first_name, last_name, address, tel_no, dob, sex, nin, position, salary, salary_scale, contract_type, hours_per_week, payment_type, ward_number)
    VALUES ('$staff_number', '$first_name', '$last_name', '$address', '$tel_no', '$dob', '$sex', '$nin', '$position', '$salary', '$salary_scale', '$contract_type', '$hours_per_week', '$payment_type', '$ward_number')";

    if ($conn->query($sql) === TRUE) {
        echo "New staff added successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<h2>Add Staff</h2>
<form method="POST" action="">
    Staff Number: <input type="text" name="staff_number" required><br><br>
    First Name: <input type="text" name="first_name" required><br><br>
    Last Name: <input type="text" name="last_name" required><br><br>
    Address: <input type="text" name="address" required><br><br>
    Telephone: <input type="text" name="tel_no" required><br><br>
    Date of Birth: <input type="date" name="dob" required><br><br>
    Sex: 
    <select name="sex" required>
        <option value="Male">Male</option>
        <option value="Female">Female</option>
    </select><br><br>
    National Insurance Number (NIN): <input type="text" name="nin" required><br><br>
    Position: <input type="text" name="position" required><br><br>
    Salary: <input type="number" name="salary" required><br><br>
    Salary Scale: <input type="text" name="salary_scale" required><br><br>
    Contract Type:
    <select name="contract_type" required>
        <option value="Permanent">Permanent</option>
        <option value="Temporary">Temporary</option>
    </select><br><br>
    Hours Per Week: <input type="number" step="0.01" name="hours_per_week" required><br><br>
    Payment Type:
    <select name="payment_type" required>
        <option value="Weekly">Weekly</option>
        <option value="Monthly">Monthly</option>
    </select><br><br>
    Ward Number: <input type="number" name="ward_number" required><br><br>
    <input type="submit" name="submit" value="Add Staff">
</form>
