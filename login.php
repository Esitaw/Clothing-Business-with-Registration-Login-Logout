<?php require_once '/Users/saman/OneDrive/Documents/WEBSITE/BusinessIdea/core/dbConfig.php'; ?>
<?php require_once '/Users/saman/OneDrive/Documents/WEBSITE/BusinessIdea/core/models.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }
        form {
            width: 300px;
            margin: 100px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        form p {
            margin: 15px 0;
        }
        form input[type="text"], form input[type="password"] {
            width: 93%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        form input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        form input[type="submit"]:hover {
            background-color: #45a049;
        }
        .register-link {
            text-align: center;
            margin-top: 10px;
        }
        .register-link a {
            color: #4CAF50;
            text-decoration: none;
        }
        .register-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<form action="/BusinessIdea/core/handleForms.php" method="POST">
    <h2>Login</h2>
    <p>
        <label for="username">Username</label>
        <input type="text" name="username" required>
    </p>
    <p>
        <label for="password">Password</label>
        <input type="password" name="password" required>
    </p>
    <p>
        <input type="submit" name="loginBtn" value="Login">
    </p>
    <div class="register-link">
        <p>Don't have an account yet? <a href="/BusinessIdea/register.php">Register here</a></p>
    </div>
</form>

</body>
</html>
