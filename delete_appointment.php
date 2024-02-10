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

    $sql = "DELETE FROM appointments WHERE AppointmentID = $appointmentID";

    if ($conn->query($sql) === TRUE) {
        echo "Appointment deleted successfully.";
    } else {
        echo "Error deleting appointment: " . $conn->error;
    }
} else {
    echo 'Invalid request.';
}
?>
