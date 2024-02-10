<?php

$servername = "localhost";
$username = "your_username";
$password = "your_password";
$dbname = "your_database_name";

$conn = new mysqli('localhost', 'root', '', 'patient');


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $doctorID = $_POST['DoctorID'];
    $name = $_POST['Name'];
    $age = $_POST['Age'];
    $gender = $_POST['Gender'];
    $speciality = $_POST['Speciality'];


    $sql = "UPDATE doctors SET Name = '$name', Age = '$age', Gender = '$gender', Speciality = '$speciality' WHERE DoctorID = '$doctorID'";

    if ($conn->query($sql) === TRUE) {
        echo "Doctor record updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

$conn->close();
?>
