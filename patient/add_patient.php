<?php
include('../config/db.php');

// Fetch all doctors for dropdown
$doctor_sql = "SELECT * FROM doctors";
$doctor_result = $conn->query($doctor_sql);

if (isset($_POST['submit'])) {
    // Insert next of kin first
    $kin_full_name = $_POST['kin_full_name'];
    $kin_relationship = $_POST['kin_relationship'];
    $kin_address = $_POST['kin_address'];
    $kin_tel_no = $_POST['kin_tel_no'];

    $sql_kin = "INSERT INTO next_of_kin (full_name, relationship, address, tel_no) 
                VALUES ('$kin_full_name', '$kin_relationship', '$kin_address', '$kin_tel_no')";

    if ($conn->query($sql_kin) === TRUE) {
        $next_of_kin_id = $conn->insert_id;

        // Insert patient
        $patient_number = $_POST['patient_number'];
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $address = $_POST['address'];
        $tel_no = $_POST['tel_no'];
        $dob = $_POST['dob'];
        $sex = $_POST['sex'];
        $marital_status = $_POST['marital_status'];
        $date_registered = date('Y-m-d');
        $doctor_clinic_number = $_POST['doctor_clinic_number'];

        $sql_patient = "INSERT INTO patients (patient_number, first_name, last_name, address, tel_no, dob, sex, marital_status, date_registered, next_of_kin_id, doctor_clinic_number)
                        VALUES ('$patient_number', '$first_name', '$last_name', '$address', '$tel_no', '$dob', '$sex', '$marital_status', '$date_registered', '$next_of_kin_id', '$doctor_clinic_number')";

        if ($conn->query($sql_patient) === TRUE) {
            echo "Patient added successfully!";
        } else {
            echo "Error adding patient: " . $conn->error;
        }
    } else {
        echo "Error adding next of kin: " . $conn->error;
    }
}
?>

<h2>Add Patient</h2>

<form method="POST" action="">
    <h3>Patient Details</h3>
    Patient Number: <input type="text" name="patient_number" required><br><br>
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
    Marital Status: 
    <select name="marital_status" required>
        <option value="Single">Single</option>
        <option value="Married">Married</option>
    </select><br><br>

    Referring Doctor:
    <select name="doctor_clinic_number" required>
        <?php
        if ($doctor_result->num_rows > 0) {
            while($doctor = $doctor_result->fetch_assoc()) {
                echo "<option value='".$doctor['clinic_number']."'>".$doctor['full_name']." (".$doctor['clinic_number'].")</option>";
            }
        } else {
            echo "<option>No doctors available</option>";
        }
        ?>
    </select><br><br>

    <h3>Next of Kin Details</h3>
    Full Name: <input type="text" name="kin_full_name" required><br><br>
    Relationship: <input type="text" name="kin_relationship" required><br><br>
    Address: <input type="text" name="kin_address" required><br><br>
    Telephone: <input type="text" name="kin_tel_no" required><br><br>

    <input type="submit" name="submit" value="Add Patient">
</form>

<a href="view_patient.php">View Patients</a>
