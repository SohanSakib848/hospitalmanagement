<?php
$servername = "localhost";
$username = "your_username";
$password = "your_password";
$dbname = "your_database_name";

$conn = new mysqli('localhost', 'root', '', 'patient');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    $appointmentID = $_POST['AppointmentID'];
    $patientName = $_POST['PatientName'];
    $gender = $_POST['Gender'];
    $desiredDoctor = $_POST['DesiredDoctor'];
    $time = $_POST['Time'];

  
    $sql = "UPDATE appointments 
            SET PatientName = '$patientName', Gender = '$gender', DesiredDoctor = '$desiredDoctor', Time = '$time' 
            WHERE AppointmentID = $appointmentID";

    if ($conn->query($sql) === TRUE) {
        echo "Appointment updated successfully";
    } else {
        echo "Error updating appointment: " . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>
