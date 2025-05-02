<?php
include('../config/db.php');

if (isset($_POST['submit'])) {
    $supplier_number = $_POST['supplier_number'];
    $name = $_POST['name'];
    $address = $_POST['address'];
    $tel_no = $_POST['tel_no'];
    $fax_no = $_POST['fax_no'];

    $sql = "INSERT INTO suppliers (supplier_number, name, address, tel_no, fax_no)
            VALUES ('$supplier_number', '$name', '$address', '$tel_no', '$fax_no')";

    if ($conn->query($sql) === TRUE) {
        echo "Supplier added successfully!";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<h2>Add Supplier</h2>

<form method="POST" action="">
    Supplier Number: <input type="text" name="supplier_number" required><br><br>
    Name: <input type="text" name="name" required><br><br>
    Address: <input type="text" name="address" required><br><br>
    Telephone: <input type="text" name="tel_no" required><br><br>
    Fax: <input type="text" name="fax_no"><br><br>

    <input type="submit" name="submit" value="Add Supplier">
</form>

<a href="view_supplier.php">View Suppliers</a>
