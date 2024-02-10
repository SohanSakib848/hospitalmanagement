<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Hospital Management System - Add Medicine</title>

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
    <div class="container">
     

        <div class="content">
            <header style="background-color: #753a88;">
                <h1>Add Medicine</h1>
            </header>
            <div class="main-content">
                <!-- Medicine Form -->
                <form action="add_medicine.php" method="POST">
                    <div class="form-group">
                        <label for="medicine_id">Medicine ID:</label>
                        <input type="text" id="medicine_id" name="medicine_id" required>
                    </div>

                    <div class="form-group">
                        <label for="medicine_name">Medicine Name:</label>
                        <input type="text" id="medicine_name" name="medicine_name" required>
                    </div>

                    <div class="form-group">
                        <label for="generic">Generic:</label>
                        <input type="text" id="generic" name="generic" required>
                    </div>

                    <div class="form-group">
                        <label for="quantity">Quantity:</label>
                        <input type="number" id="quantity" name="quantity" required>
                    </div>

                    <button type="submit">Add Medicine</button>
                </form>
            </div>
        </div>
    </div>
    <script src="assets/script.js"></script>
</body>
</html>
