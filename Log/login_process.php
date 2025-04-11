<?php
// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "login_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to sanitize input data
function sanitize_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Start session to store user data after login
session_start();

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and validate input data
    $email = sanitize_input($_POST["email"]);
    $password = $_POST["password"];

    // Prepare and bind SQL statement to fetch user data
    $sql = "SELECT id, name, password_hash FROM user WHERE email = ?";
    $stmt = $conn->prepare($sql);

    if ($stmt === false) {
        die("Error preparing statement: " . $conn->error);
    }

    $stmt->bind_param("s", $email); // "s" indicates a string parameter
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if user exists
    if ($result->num_rows > 0) {
        // Fetch the user data
        $row = $result->fetch_assoc();

        // Verify the hashed password
        if (password_verify($password, $row['password_hash'])) { //password_hash

            // Password matches, login successful
            $_SESSION['user_id'] = $row['id']; // Store user id in session
            $_SESSION['name'] = $row['name']; // Store user name in session

            // Redirect to login success page
            header("Location: login_success.php");
            exit();
        }
    }

    // Redirect to login_success.php with login failed message
    header("Location: login_success.php?login=failed");
    exit();
}

$conn->close();
?>