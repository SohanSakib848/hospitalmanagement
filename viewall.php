<?php
$servername = "localhost";
$username = "your_username";
$password = "your_password";
$dbname = "your_database_name";

$conn = new mysqli('localhost', 'root', '', 'patient');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$sqlDoctors = "SELECT * FROM doctors";
$resultDoctors = $conn->query($sqlDoctors);

$sqlMedicines = "SELECT * FROM medicines";
$resultMedicines = $conn->query($sqlMedicines);

$sqlPatients = "SELECT * FROM user_info";
$resultPatients = $conn->query($sqlPatients);


$sqlAppointments = "SELECT * FROM appointments";
$resultAppointments = $conn->query($sqlAppointments);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Management - View Data</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-top: 20px;
            border-radius: 5px;
        }

        .header, .footer {
            background-color: #4CAF50;
            color: #fff;
            text-align: center;
            padding: 10px;
        }

        .main-content {
            padding: 20px 0;
        }

        h1, h2 {
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #4CAF50;
            color: #fff;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        form {
            display: inline-block;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: #fff;
            border: none;
            padding: 8px 12px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        p {
            color: #888;
        }
  
    </style>
</head>
<body>

<div class="container">
    <div class="header">
        <h1>Doctor Management</h1>
    </div>

    <div class="main-content">
        <h2>View Doctors</h2>

        <?php
        if ($resultDoctors->num_rows > 0) {
            echo '<table>';
            echo '<tr><th>DoctorID</th><th>Name</th><th>Age</th><th>Gender</th><th>Speciality</th><th>Edit</th><th>Delete</th></tr>';
            while ($row = $resultDoctors->fetch_assoc()) {
                echo '<tr>';
                echo '<td>' . $row['DoctorID'] . '</td>';
                echo '<td>' . $row['Name'] . '</td>';
                echo '<td>' . $row['Age'] . '</td>';
                echo '<td>' . $row['Gender'] . '</td>';
                echo '<td>' . $row['Speciality'] . '</td>';
                echo '<td><form action="edit_doctor.php" method="post">';
                echo '<input type="hidden" name="DoctorID" value="' . $row['DoctorID'] . '">';
                echo '<input type="submit" name="submit" value="Edit Doctor">';
                echo '</form></td>';
                echo '<td><form action="delete_doctor.php" method="post">';
                echo '<input type="hidden" name="DoctorID" value="' . $row['DoctorID'] . '">';
                echo '<input type="submit" name="submit" value="Delete Doctor">';
                echo '</form></td>';
                echo '</tr>';
            }
            echo '</table>';
        } else {
            echo '<p>No doctors found.</p>';
        }
        ?>

        <h2>View Medicines</h2>

        <?php
        if ($resultMedicines->num_rows > 0) {
            echo '<table>';
            echo '<tr><th>MedicineID</th><th>Name</th><th>Generic</th><th>Quantity</th><th>Edit</th><th>Delete</th></tr>';
            while ($row = $resultMedicines->fetch_assoc()) {
                echo '<tr>';
                echo '<td>' . $row['MedicineID'] . '</td>';
                echo '<td>' . $row['Name'] . '</td>';
                echo '<td>' . $row['Generic'] . '</td>';
                echo '<td>' . $row['Quantity'] . '</td>';
                echo '<td><form action="edit_medicine.php" method="post">';
                echo '<input type="hidden" name="MedicineID" value="' . $row['MedicineID'] . '">';
                echo '<input type="submit" name="submit" value="Edit Medicine">';
                echo '</form></td>';
                echo '<td><form action="delete_medicine.php" method="post">';
                echo '<input type="hidden" name="MedicineID" value="' . $row['MedicineID'] . '">';
                echo '<input type="submit" name="submit" value="Delete Medicine">';
                echo '</form></td>';
                echo '</tr>';
            }
            echo '</table>';
        } else {
            echo '<p>No medicines found.</p>';
        }
        ?>

        <h2>View Patients</h2>

        <?php
        if ($resultPatients->num_rows > 0) {
            echo '<table>';
            echo '<tr><th>PatientID</th><th>Name</th><th>Age</th><th>Gender</th><th>Contact</th><th>Edit</th><th>Delete</th></tr>';
            while ($row = $resultPatients->fetch_assoc()) {
                echo '<tr>';
                echo '<td>' . $row['PatientID'] . '</td>';
                echo '<td>' . $row['Name'] . '</td>';
                echo '<td>' . $row['Age'] . '</td>';
                echo '<td>' . $row['Gender'] . '</td>';
                echo '<td>' . $row['Contact'] . '</td>';
                echo '<td><form action="edit_patient.php" method="post">';
                echo '<input type="hidden" name="PatientID" value="' . $row['PatientID'] . '">';
                echo '<input type="submit" name="submit" value="Edit Patient">';
                echo '</form></td>';
                echo '<td><form action="delete_patient.php" method="post">';
                echo '<input type="hidden" name="PatientID" value="' . $row['PatientID'] . '">';
                echo '<input type="submit" name="submit" value="Delete Patient">';
                echo '</form></td>';
                echo '</tr>';
            }
            echo '</table>';
        } else {
            echo '<p>No patients found.</p>';
        }
        ?>

        <h2>View Appointments</h2>

        <?php
        if ($resultAppointments->num_rows > 0) {
            echo '<table>';
            echo '<tr><th>AppointmentID</th><th>PatientName</th><th>Gender</th><th>DesiredDoctor</th><th>Time</th><th>Edit</th><th>Delete</th></tr>';
            while ($row = $resultAppointments->fetch_assoc()) {
                echo '<tr>';
                echo '<td>' . $row['AppointmentID'] . '</td>';
                echo '<td>' . $row['PatientName'] . '</td>';
                echo '<td>' . $row['Gender'] . '</td>';
                echo '<td>' . $row['DesiredDoctor'] . '</td>';
                echo '<td>' . $row['Time'] . '</td>';
                echo '<td><form action="edit_appointment.php" method="post">';
                echo '<input type="hidden" name="AppointmentID" value="' . $row['AppointmentID'] . '">';
                echo '<input type="submit" name="submit" value="Edit Appointment">';
                echo '</form></td>';
                echo '<td><form action="delete_appointment.php" method="post">';
                echo '<input type="hidden" name="AppointmentID" value="' . $row['AppointmentID'] . '">';
                echo '<input type="submit" name="submit" value="Delete Appointment">';
                echo '</form></td>';
                echo '</tr>';
            }
            echo '</table>';
        } else {
            echo '<p>No appointments found.</p>';
        }
        ?>
    </div>

    <div class="footer">
        &copy; 2023 Doctor Management System
    </div>
</div>

</body>
</html>
