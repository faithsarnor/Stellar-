<?php
session_start();

if (!isset($_SESSION['user_name'])) {
    // Session variable is not set, redirecting to login page
    header("Location: indi.html");  // Back to your login form
    exit();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Success</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .container {
            margin-top: 50px;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            color: #333;
        }

        p {
            color: #666;
        }

        .btn {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            display: inline-block;
        }
        .error {
            color: red;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php if (isset($_GET['login']) && $_GET['login'] == 'failed'): ?>
            <p class="error">Invalid username or password</p>
        <?php endif; ?>
        <h2>Login Successful!</h2>
        <p>Welcome, <?php echo htmlspecialchars($_SESSION['user_name']); ?>! You have successfully logged in.</p>
        <a href="index.html" class="btn">Go to Dashboard</a>
    </div>
</body>
</html>