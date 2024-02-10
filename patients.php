<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Registration</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        form {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 300px;
        }

        table {
            width: 100%;
        }

        label {
            font-weight: bold;
            display: block;
            margin-bottom: 8px;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type="submit"] {
            background-color: #4caf50;
            color: #fff;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        td {
            padding: 8px;
        }
    </style>
</head>
<body>

    <form action="save_patient.php" method="post">
        <table>
            <tr>
                <td><label for="patientID">Patient ID</label></td>
                <td><input type="text" name="PatientID"></td>
            </tr>
            <tr>
                <td><label for="name">Name</label></td>
                <td><input type="text" name="Name"></td>
            </tr>
            <tr>
                <td><label for="age">Age</label></td>
                <td><input type="text" name="Age"></td>
            </tr>
            <tr>
                <td><label for="gender">Gender</label></td>
                <td><input type="text" name="Gender"></td>
            </tr>
            <tr>
                <td><label for="phone">Phone</label></td>
                <td><input type="text" name="Contact"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="submit" value="Register"></td>
            </tr>
        </table>
    </form>

</body>
</html>
