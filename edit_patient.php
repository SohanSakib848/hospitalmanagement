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

    
    $sql = "SELECT * FROM user_info WHERE PatientID = $patientID";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "Patient not found.";
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Patient</title>
    <style>
     
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        form {
            max-width: 400px;
            margin: 20px auto;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            border-radius: 5px;
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        input, select {
            width: 100%;
            padding: 10px;
            margin-bottom: 16px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: #fff;
            border: none;
            padding: 10px;
            cursor: pointer;
            border-radius: 5px;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
    
    </style>
</head>
<body>

<div class="container">
    <div class="header">
        <h1>Edit Patient</h1>
    </div>

    <div class="main-content">
        <form action="update_patient.php" method="post">
            <input type="hidden" name="PatientID" value="<?php echo $row['PatientID']; ?>">
            Name: <input type="text" name="Name" value="<?php echo $row['Name']; ?>"><br>
            Age: <input type="text" name="Age" value="<?php echo $row['Age']; ?>"><br>
            Gender: <input type="text" name="Gender" value="<?php echo $row['Gender']; ?>"><br>
            Contact: <input type="text" name="Contact" value="<?php echo $row['Contact']; ?>"><br>
            <input type="submit" name="submit" value="Update Patient">
        </form>
    </div>

    <div class="footer">
        &copy; 2023 Doctor Management System
    </div>
</div>

</body>
</html>
