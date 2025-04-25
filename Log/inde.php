<?php
session_start();  // Start the session here
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="stylee.css">
    <title>Login Success</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            text-align: center;
            height: 100vh; /* Full height of the screen */
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0; /* Remove default margin */
        }

        .container {
            background-color: #fff;
            padding: 50px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 500px; /* Set a max width */
            text-align: center;
        }

        h2 {
            color: #333;
            margin-bottom: 10px;
        }

        p {
            color: #666;
            margin-bottom: 20px;
        }

        .btn {
            background-color: #007bff;
            color: #fff;
            padding: 12px 24px;
            text-decoration: none;
            border-radius: 5px;
            display: block; /* Make button centered */
            width: fit-content;
            margin: 20px auto; /* Centering the button */
            font-size: 16px;
        }

        .error {
            color: red;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php if (isset($_GET['login']) && $_GET['login'] == 'failed'): ?>
            <p class="error">Invalid username or password</p>
        <?php endif; ?>
        <h2>Login Successful!</h2>
        <p>Welcome <?php echo isset($_SESSION['user_name']) ? htmlspecialchars($_SESSION['user_name']) : 'to Stellar'; ?>! You are now logged in and ready to explore.</p>
        <a href="../index.php" class="btn">Go to Dashboard</a>
    </div>
</body>
</html>
