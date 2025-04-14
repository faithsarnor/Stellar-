<?php
session_start(); // Start the session to manage the cart

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['action']) && $_POST['action'] == 'add') {
        $product_id = $_POST['product_id'];
        $quantity = (int)$_POST['quantity']; // Sanitize and cast to integer

        // Basic input validation
        if (empty($product_id) || $quantity <= 0) {
            // Handle invalid input (e.g., redirect back to the product page with an error)
            header("Location: products.php?error=invalid_quantity");
            exit();
        }

        // Add the product to the cart (using session variables)
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = array(); // Initialize the cart if it doesn't exist
        }

        // Check if the product is already in the cart
        if (isset($_SESSION['cart'][$product_id])) {
            $_SESSION['cart'][$product_id] += $quantity; // Increment quantity
        } else {
            $_SESSION['cart'][$product_id] = $quantity; // Add new item
        }

        // Redirect back to the products page (or the cart page)
        header("Location: cart.php?success=added"); // Indicate success
        exit();
    }
    elseif (isset($_POST['action']) && $_POST['action'] == 'update') {
      // This part handles updates in cart page (quantity)
      if (isset($_POST['product_id']) && isset($_POST['new_quantity']) && is_numeric($_POST['new_quantity']) && $_POST['new_quantity'] >= 0) {
          $product_id = $_POST['product_id'];
          $new_quantity = (int)$_POST['new_quantity'];
          if (isset($_SESSION['cart'][$product_id])) {
              if ($new_quantity == 0) {
                  unset($_SESSION['cart'][$product_id]); // Remove if quantity is zero
              } else {
                  $_SESSION['cart'][$product_id] = $new_quantity; // Update quantity
              }
          }
      }
      header("Location: cart.php"); // Redirect back to cart.php
      exit();
    }
    elseif (isset($_POST['action']) && $_POST['action'] == 'remove') {
      //This part handles remove from cart
      if(isset($_POST['product_id'])) {
        $product_id = $_POST['product_id'];
        if(isset($_SESSION['cart'][$product_id])) {
          unset($_SESSION['cart'][$product_id]); // Remove product from cart
        }
      }
      header("Location: cart.php");
      exit();
    }
} else {
    // Handle direct access to this script (e.g., redirect to a safe page)
    header("Location: products.php");
    exit();
}
?>