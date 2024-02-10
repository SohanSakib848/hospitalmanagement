<?php

$host = "your_host";
$username = "your_username";
$password = "your_password";
$database = "your_database";

// Create a database connection
$conn = new mysqli('localhost', 'root', '', 'patient');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $medicine_id = $_POST["medicine_id"];
    $medicine_name = $_POST["medicine_name"];
    $generic = $_POST["generic"];
    $quantity = $_POST["quantity"];

    $check_duplicate_sql = "SELECT * FROM medicines WHERE MedicineID = '$medicine_id'";
    $duplicate_result = $conn->query($check_duplicate_sql);

    if ($duplicate_result->num_rows > 0) {
        echo "Error: Duplicate found for MedicineID '$medicine_id'.";
    } else {
      
        $insert_sql = "INSERT INTO medicines (MedicineID, Name, Generic, Quantity) VALUES ('$medicine_id', '$medicine_name', '$generic', $quantity)";

        if ($conn->query($insert_sql) === TRUE) {
            echo "Record inserted successfully.";
        } else {
            echo "Error: " . $insert_sql . "<br>" . $conn->error;
        }
    }
}

// Close the database connection
$conn->close();

?>
