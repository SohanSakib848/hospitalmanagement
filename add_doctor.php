<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Doctor Management</title>
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

        .footer {
            background-color: #753a88;
            color: white;
            text-align: center;
            padding: 10px;
            position: fixed;
            bottom: 0;
            width: 100%;
        }

        table {
            width: 100%;
        }

        input[type="text"],
        input[type="number"],
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
            <h1>Doctor Management</h1>
        </div>

        <div class="main-content">
            <h2>Add Doctor</h2>
            <form action="save_doctor.php" method="post">
                <table>
                    <tr>
                        <td><label for="DoctorID">DoctorID:</label></td>
                        <td><input type="text" name="DoctorID" required></td>
                    </tr>
                    <tr>
                        <td><label for="Name">Name:</label></td>
                        <td><input type="text" name="Name" required></td>
                    </tr>
                    <tr>
                        <td><label for="Age">Age:</label></td>
                        <td><input type="number" name="Age" required></td>
                    </tr>
                    <tr>
                        <td><label for="Gender">Gender:</label></td>
                        <td>
                            <select name="Gender" required>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                                <option value="Other">Other</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="Speciality">Speciality:</label></td>
                        <td><input type="text" name="Speciality" required></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><input type="submit" name="submit" value="Submit"></td>
                    </tr>
                </table>
            </form>
        </div>

        <div class="footer">
            &copy; 2023 Doctor Management System
        </div>
    </div>

</body>
</html>
