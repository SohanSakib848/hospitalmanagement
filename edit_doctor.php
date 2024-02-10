<?php

$servername = "localhost";
$username = "your_username";
$password = "your_password";
$dbname = "your_database_name";


$conn = new mysqli('localhost', 'root', '', 'patient');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['DoctorID'])) {
    $doctorID = $_POST['DoctorID'];

    // Fetch the doctor's information for editing
    $sql = "SELECT * FROM doctors WHERE DoctorID = '$doctorID'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $doctorData = $result->fetch_assoc();
    } else {
        echo "Doctor not found.";
    }
} else {
    echo "DoctorID not set.";
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Doctor</title>
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

    <h1>Edit Doctor</h1>

    <?php if (isset($doctorData)): ?>
        <form action="update_doctor.php" method="post">
            <input type="hidden" name="DoctorID" value="<?php echo $doctorData['DoctorID']; ?>">

            <label for="Name">Name:</label>
            <input type="text" name="Name" value="<?php echo $doctorData['Name']; ?>" required>

            <label for="Age">Age:</label>
            <input type="number" name="Age" value="<?php echo $doctorData['Age']; ?>" required>

            <label for="Gender">Gender:</label>
            <select name="Gender" required>
                <option value="Male" <?php echo ($doctorData['Gender'] === 'Male') ? 'selected' : ''; ?>>Male</option>
                <option value="Female" <?php echo ($doctorData['Gender'] === 'Female') ? 'selected' : ''; ?>>Female</option>
                <option value="Other" <?php echo ($doctorData['Gender'] === 'Other') ? 'selected' : ''; ?>>Other</option>
            </select>

            <label for="Speciality">Speciality:</label>
            <input type="text" name="Speciality" value="<?php echo $doctorData['Speciality']; ?>" required>

            <input type="submit" name="submit" value="Update Doctor">
        </form>
    <?php endif; ?>

</body>
</html>
