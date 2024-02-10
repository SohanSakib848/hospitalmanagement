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
    $doctorID = $_POST['DoctorID'];

    $sql = "DELETE FROM doctors WHERE DoctorID = $doctorID";

    if ($conn->query($sql) === TRUE) {
        echo "Doctor deleted successfully.";
    } else {
        echo "Error deleting doctor: " . $conn->error;
    }
} else {
    echo 'Invalid request.';
}
?>
