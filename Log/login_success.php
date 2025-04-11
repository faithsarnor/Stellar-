<?php
session_start();

if (!isset($_SESSION['name'])) {
    // Session variable is not set, redirecting to login page
    header("Location: inde.php");  // Back to your login form
    exit();
}

?>