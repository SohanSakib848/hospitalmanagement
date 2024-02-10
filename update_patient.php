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
    $name = $_POST['Name'];
    $age = $_POST['Age'];
    $gender = $_POST['Gender'];
    $contact = $_POST['Contact'];

    
    $sql = "UPDATE user_info SET Name='$name', Age='$age', Gender='$gender', Contact='$contact' WHERE PatientID=$patientID";

    if ($conn->query($sql) === TRUE) {
        echo "Patient updated successfully!";
    } else {
        echo "Error updating patient: " . $conn->error;
    }
}

$conn->close();
?>
