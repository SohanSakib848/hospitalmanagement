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
    $medicineID = $_POST['MedicineID'];

    $sql = "DELETE FROM medicines WHERE MedicineID = $medicineID";

    if ($conn->query($sql) === TRUE) {
        echo "Medicine deleted successfully.";
    } else {
        echo "Error deleting medicine: " . $conn->error;
    }
} else {
    echo 'Invalid request.';
}
?>
