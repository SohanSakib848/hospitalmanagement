
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>User Authentication</title>
    <style>
        body {
            background-color: #f0f0f0; /* Light gray background */
            background-image: url('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSo1QJ-2URJylPZf4ovdd1gVjSeGBL9OF76CPXdugKaQxe-FBv4gYashScQE_9Ibyj9PxI&usqp=CAU'); /* Replace with your background image URL */
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }

        .content {
            margin: 50px auto;
          /* Semi-transparent white background */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Light box shadow */
            border-radius: 8px;
        }

        .main-content {
            padding: 20px;
            text-align: center;
        }

        .login-form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .login-form label {
            margin: 10px 0;
        }

        .login-form input {
            padding: 10px;
            margin-bottom: 15px;
            width: 50%;
            box-sizing: border-box;
            border: 1px solid #753a88; /* Matching the sidebar color */
            border-radius: 5px;
        }

        .login-form input[type="submit"] {
            background-color: #753a88; /* Matching the sidebar color */
            color: white;
            cursor: pointer;
        }

        .login-form input[type="submit"]:hover {
            background-color: #653568; /* Darker color on hover */
        }

        .signup-link {
            color: #753a88; /* Matching the sidebar color */
            font-weight: bold;
            text-decoration: none;
        }

        .signup-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="content">
        <header style="background-color: #753a88;">
            <h1 style="margin: 0; padding: 15px; font-size: 28px;">User Authentication</h1>
        </header>
        <div class="main-content">
            <form class="login-form" action="login.php" method="post">
                <label for="username">Username:</label>
                <input type="text" name="username" required>

                <label for="password">Password:</label>
                <input type="password" name="password" required>

                <input type="submit" value="Login">
            </form>
            <p style="margin-top: 20px;">Not registered? <a class="signup-link" href="signup.php">Sign up here</a>.</p>
        </div>
    </div>
    <script src="assets/script.js"></script>
</body>
</html>
