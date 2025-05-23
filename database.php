<?php

// Define the Data Source Name (DSN) for database connection
$dsn = 'mysql:host=localhost;dbname=my_products';
// Define the database username and password
$username = 'root';
$password = '';

try {
    // Create a new PDO instance to establish a database connection
    $db = new PDO($dsn, $username, $password);
} catch (PDOException $e) {
    // Handle any errors during the connection process and display an error message
    $error_message = $e->getMessage();
    echo "<p>Database Error: $error_message</p>";
    exit();
}
?>
