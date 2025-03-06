<?php
// Database connection details (replace with your actual credentials)
$servername = "localhost";
$username = "root"; // Use the 'root' user
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

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

  // Validate and sanitize input data
  $fullname = sanitize_input($_POST["fullname"]);
  $email = sanitize_input($_POST["email"]);
  $password = $_POST["password"]; // Don't sanitize password before hashing

  // Basic email validation
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "Invalid email format";
    exit;
  }

  // Password Hashing (Crucial for security)
  $hashed_password = password_hash($password, PASSWORD_DEFAULT);

  // Prepare and bind SQL statement
  $sql = "INSERT INTO user (name, email, password_hash) VALUES (?, ?, ?)";
  $stmt = $conn->prepare($sql);



if ($stmt === false) {
    echo "Error preparing statement: " . $conn->error;
    exit;
}

$stmt->bind_param("sss", $fullname, $email, $hashed_password); // Fixed variable name

// Execute the statement
if ($stmt->execute()) {
    header("Location: signup_success.php");
    exit();
} else {
    echo "Error executing statement: " . $stmt->error;
}

$stmt->close();
}
