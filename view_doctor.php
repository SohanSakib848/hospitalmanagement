<?php

$servername = "localhost";
$username = "your_username";
$password = "your_password";
$dbname = "your_database_name";


$conn = new mysqli('localhost', 'root', '', 'patient');


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$sql = "SELECT * FROM doctors";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Management - View Doctors</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-top: 20px;
            border-radius: 5px;
        }

        .header, .footer {
            background-color: #4CAF50;
            color: #fff;
            text-align: center;
            padding: 10px;
        }

        .main-content {
            padding: 20px 0;
        }

        h1, h2 {
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
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

        form {
            display: inline-block;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: #fff;
            border: none;
            padding: 8px 12px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        p {
            color: #888;
        }
    </style>
</head>
<body>

    <div class="container">
        <div class="header">
            <h1>Doctor Management</h1>
        </div>

        <div class="main-content">
            <h2>View Doctors</h2>

            <?php
            if ($result->num_rows > 0) {
                // Output data in a table
                echo '<table>';
                echo '<tr><th>DoctorID</th><th>Name</th><th>Age</th><th>Gender</th><th>Speciality</th><th>Edit</th></tr>';
                while ($row = $result->fetch_assoc()) {
                    echo '<tr>';
                    echo '<td>' . $row['DoctorID'] . '</td>';
                    echo '<td>' . $row['Name'] . '</td>';
                    echo '<td>' . $row['Age'] . '</td>';
                    echo '<td>' . $row['Gender'] . '</td>';
                    echo '<td>' . $row['Speciality'] . '</td>';
                    echo '<td><form action="edit_doctor.php" method="post">';
                    echo '<input type="hidden" name="DoctorID" value="' . $row['DoctorID'] . '">';
                    echo '<input type="submit" name="submit" value="Edit Doctor">';
                    echo '</form></td>';
                    echo '</tr>';
                }
                echo '</table>';
            } else {
                echo '<p>No doctors found.</p>';
            }

            $conn->close();
            ?>

        </div>

        <div class="footer">
            &copy; 2023 Doctor Management System
        </div>
    </div>

</body>
</html>
