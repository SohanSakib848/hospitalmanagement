<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Management</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
        }

        h1 {
            background-color: #753a88;
            color: white;
            padding: 20px;
            margin: 0;
            width: 100%;
        }

        ul {
            list-style: none;
            padding: 0;
            margin: 0;
            background-color: #4a235a;
            display: flex;
            justify-content: center;
            align-items: center;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        li {
            margin: 0;
            padding: 15px;
        }

        li a {
            text-decoration: none;
            color: white;
            font-weight: bold;
            font-size: 18px;
        }

        li a:hover {
            background-color: #653568;
        }

        div {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin: 20px;
            width: 300px;
        }

        form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        input[type="submit"] {
            background-color: #4caf50;
            color: #fff;
            cursor: pointer;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            margin-top: 10px;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

    <h1>Doctor Management</h1>

  
        <h2>Add Doctor</h2>
        <form action="add_doctor.php" method="post">
            <!-- Add form fields for doctor details -->
            <input type="submit" name="submit" value="Add">
        </form>
    </div>

   
    
    

</body>
</html>
