<?php
$servername = "localhost";
$username = "your_username";
$password = "your_password";
$dbname = "your_database_name";

$conn = new mysqli('localhost', 'root', '', 'patient');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sqlDoctors = "SELECT * FROM doctors";
$resultDoctors = $conn->query($sqlDoctors);

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['confirmAppointment'])) {
    $appointmentID = $_POST['AppointmentID'];
    $desiredDoctor = $_POST['DesiredDoctor'];
    $patientName = $_POST['PatientName'];
    $gender = $_POST['Gender'];
    $time = $_POST['Time'];

    $sqlInsertAppointment = "INSERT INTO appointments (AppointmentID, DesiredDoctor, PatientName, Gender, Time) VALUES ('$appointmentID', '$desiredDoctor', '$patientName', '$gender', '$time')";

    if ($conn->query($sqlInsertAppointment) === TRUE) {
        echo "Appointment confirmed successfully!";
    } else {
        echo "Error confirming appointment: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style1.css">
    <title>Hospital Management System - Appointments</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            font-size: 16px;
            margin: 0;
            padding: 0;
            background-color: #f2f2f2;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            align-items: center;
        }

        .header {
            background-color: #753a88;
            color: #fff;
            text-align: center;
            padding: 20px 0;
        }

        h1 {
            margin: 0;
        }

        .main-content {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin: 20px;
            text-align: center;
        }

        table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #4CAF50;
            color: #fff;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        input[type="text"],
        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }

        input[type="submit"] {
            background-color: #4caf50;
            color: #fff;
            cursor: pointer;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            font-size: 16px;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Hospital Management System</h1>
        </div>
        <div class="main-content">
            <div class="flex-container">
                <!-- Display doctors information -->
                <div class="doctors-section">
                    <h2>Doctors Information</h2>
                    <?php
                    if ($resultDoctors->num_rows > 0) {
                        echo '<table>';
                        echo '<tr><th>DoctorID</th><th>Name</th><th>Speciality</th></tr>';
                        while ($row = $resultDoctors->fetch_assoc()) {
                            echo '<tr>';
                            echo '<td>' . $row['DoctorID'] . '</td>';
                            echo '<td>' . $row['Name'] . '</td>';
                            echo '<td>' . $row['Speciality'] . '</td>';
                            echo '</tr>';
                        }
                        echo '</table>';
                    } else {
                        echo '<p>No doctors found.</p>';
                    }
                    ?>
                </div>

                <div class="appointment-form">
                    <h2>Create New Appointment</h2>
                    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                        <label for="AppointmentID">AppointmentID:</label>
                        <input type="text" name="AppointmentID" required><br>

                        <label for="DesiredDoctor">Desired Doctor:</label>
                        <select name="DesiredDoctor" required>
                            <?php
                            // Populate dropdown with available doctors
                            $resultDoctors = $conn->query($sqlDoctors);
                            while ($row = $resultDoctors->fetch_assoc()) {
                                echo '<option value="' . $row['Name'] . '">' . $row['Name'] . '</option>';
                            }
                            ?>
                        </select><br>

                        <label for="PatientName">Patient Name:</label>
                        <input type="text" name="PatientName" required><br>

                        <label for="Gender">Gender:</label>
                        <select name="Gender" required>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="Other">Other</option>
                        </select><br>

                        <label for="Time">Time:</label>
                        <input type="text" name="Time" required><br>

                        <input type="submit" name="confirmAppointment" value="Confirm Appointment">
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="assets/script.js"></script>
</body>
</html>

<?php
$conn->close();
?>