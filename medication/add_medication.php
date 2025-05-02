<?php
include('../config/db.php');

// Fetch all patients
$patient_sql = "SELECT * FROM patients";
$patient_result = $conn->query($patient_sql);

if (isset($_POST['add'])) {
    $patient_number = $_POST['patient_number'];
    $drug_name = $_POST['drug_name'];
    $dosage = $_POST['dosage'];
    $method_of_admin = $_POST['method_of_admin'];
    $units_per_day = $_POST['units_per_day'];
    $start_date = $_POST['start_date'];
    $finish_date = $_POST['finish_date'];

    $sql = "INSERT INTO medication (patient_number, drug_name, dosage, method_of_admin, units_per_day, start_date, finish_date) 
            VALUES ('$patient_number', '$drug_name', '$dosage', '$method_of_admin', '$units_per_day', '$start_date', '$finish_date')";

    if ($conn->query($sql) === TRUE) {
        echo "Medication added successfully!";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<h2>Add Medication</h2>

<form method="POST" action="">
    Patient:
    <select name="patient_number" required>
        <?php
        if ($patient_result->num_rows > 0) {
            while($patient = $patient_result->fetch_assoc()) {
                echo "<option value='".$patient['patient_number']."'>".$patient['first_name']." ".$patient['last_name']."</option>";
            }
        } else {
            echo "<option>No patients available</option>";
        }
        ?>
    </select><br><br>

    Drug Name: <input type="text" name="drug_name" required><br><br>
    Dosage (e.g., 10mg/ml): <input type="text" name="dosage" required><br><br>
    Method of Administration:
    <select name="method_of_admin" required>
        <option value="Oral">Oral</option>
        <option value="Intravenous">Intravenous</option>
        <option value="Injection">Injection</option>
    </select><br><br>

    Units per Day: <input type="number" name="units_per_day" required><br><br>
    Start Date: <input type="date" name="start_date" required><br><br>
    Finish Date: <input type="date" name="finish_date" required><br><br>

    <input type="submit" name="add" value="Add Medication">
</form>

<a href="view_medication.php">View Medication Records</a>
