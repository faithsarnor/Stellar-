
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Success</title>
    <style>
       body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            text-align: center;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0;
        }

        .container {
            background-color: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 350px; /* Increased width */
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
            display: block;
            width: fit-content;
            margin: 20px auto;
            font-size: 16px;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php if (isset($_GET['login']) && $_GET['login'] == 'failed'): ?>
            <p class="error">Invalid username or password</p>
        <?php endif; ?>
        <h2>Login Successful!</h2>
        <p>Welcome, <?php echo htmlspecialchars($_SESSION['name']); ?>! You have successfully logged in.</p>
        <a href="index.html" class="btn">Go to Dashboard</a>
    </div>
</body>
</html>
