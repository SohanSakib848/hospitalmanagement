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
    $name = $_POST['Name'];
    $generic = $_POST['Generic'];
    $quantity = $_POST['Quantity'];

  
    $sql = "UPDATE medicines SET Name='$name', Generic='$generic', Quantity='$quantity' WHERE MedicineID=$medicineID";

    if ($conn->query($sql) === TRUE) {
        echo "Medicine updated successfully!";
    } else {
        echo "Error updating medicine: " . $conn->error;
    }
}

$conn->close();
?>
