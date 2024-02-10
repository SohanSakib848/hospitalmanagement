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
    $patientID = $_POST['PatientID'];

  
    $sql = "DELETE FROM user_info WHERE PatientID = $patientID";

    if ($conn->query($sql) === TRUE) {
        echo "Patient deleted successfully.";
    } else {
        echo "Error deleting patient: " . $conn->error;
    }
} else {
    echo 'Invalid request.';
}
?>
