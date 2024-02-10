<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "patient";


$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT id, username, password FROM users WHERE username='$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['username'] = $row['username'];
            header("Location: dashboard.php"); 
            exit();
        } else {
            $error = "Invalid password";
        }
    } else {
        $error = "User not found";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login</title>
    <style>
       
        body {
            background-color: #f0f0f0; 
            background-image: url('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSo1QJ-2URJylPZf4ovdd1gVjSeGBL9OF76CPXdugKaQxe-FBv4gYashScQE_9Ibyj9PxI&usqp=CAU'); /* Replace with your background image URL */
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
        }

        .content {
            margin: 10px auto;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); 
            border-radius: 8px;
        }

        header {
            background-color: #753a88;
            padding: 17px;
        }

        h1 {
            margin: 0;
            font-size: 28px;
            color: white;
        }

        .main-content {
            padding:60px;
            text-align: center;
        }

        .login-form {
            display: flex;
            flex-direction: column;
            align-items: center;
            max-width: 400px;
            margin: 20px auto;
            padding: 20px;
            background-color: #ffffff; 
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); 
            border-radius: 8px;
        }

        label {
            display: block;
            margin: 10px 0;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            box-sizing: border-box;
            border: 1px solid #753a88; 
            border-radius: 5px;
        }

        input[type="submit"] {
            background-color: #753a88; 
            color: white;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #653568; 
        }

        .signup-link {
            color: #753a88; 
            font-weight: bold;
            text-decoration: none;
        }

        .signup-link:hover {
            text-decoration: underline;
        }

        p.error {
            color: red;
            text-align: center;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="content">
        <header>
            <h1>User Authentication</h1>
        </header>
        <div class="main-content">
            <form class="login-form" action="login.php" method="post">
                <label for="username">Username:</label>
                <input type="text" name="username" required>

                <label for="password">Password:</label>
                <input type="password" name="password" required>

                <input type="submit" value="Login">
            </form>
            <p>Not registered? <a class="signup-link" href="signup.php">Sign up here</a>.</p>
            <?php if(isset($error)) { ?>
                <p class="error"><?php echo $error; ?></p>
            <?php } ?>
        </div>
    </div>
    <script src="assets/script.js"></script>
</body>
</html>
