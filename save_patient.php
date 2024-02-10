<?php
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "database_name";


$conn = new mysqli('localhost', 'root', '', 'patient');


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$PatientID = $_POST['PatientID'];
$Name = $_POST['Name'];
$Age = $_POST['Age'];
$Gender = $_POST['Gender'];
$phone = $_POST['Contact'];


$checkDuplicateQuery = "SELECT * FROM user_info WHERE PatientID = '$PatientID'";
$duplicateResult = $conn->query($checkDuplicateQuery);

if ($duplicateResult->num_rows > 0) {
    // Duplicate entry found
    echo '<p class="error-message">Duplicate entry for PatientID ' . $PatientID . '. Record not inserted.</p>';
} else {
    
    $insertQuery = "INSERT INTO user_info (PatientID, Name, Age, Gender, Contact)
                    VALUES ('$PatientID', '$Name', '$Age', '$Gender', '$phone')";
    
    if ($conn->query($insertQuery) === TRUE) {
        echo '<p class="success-message">Record inserted successfully</p>';
    } else {
        echo '<p class="error-message">Error: ' . $insertQuery . '<br>' . $conn->error . '</p>';
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Record</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .success-message {
            color: #4CAF50;
            background-color: #e8f5e9;
            padding: 10px;
            border: 1px solid #4CAF50;
            border-radius: 5px;
        }

        .error-message {
            color: #D32F2F;
            background-color: #FFEBEE;
            padding: 10px;
            border: 1px solid #D32F2F;
            border-radius: 5px;
        }
    </style>
</head>
<body>

  

</body>
</html>
