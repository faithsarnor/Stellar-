<?php
session_start(); // Start the session

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['action']) && $_POST['action'] == 'add') {
        $product_id = $_POST['product_id'];
        $quantity = (int)$_POST['quantity']; // Sanitize and cast to integer

        // Basic input validation
        if (empty($product_id) || $quantity <= 0) {
            // Handle invalid input (e.g., set an error in the session)
            $_SESSION['cart_error'] = "Invalid quantity.";
            header("Location: products.php"); // Redirect back to products
            exit();
        }

        // Add the product to the cart
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = array();
        }

        if (isset($_SESSION['cart'][$product_id])) {
            $_SESSION['cart'][$product_id] += $quantity; // Increment quantity
        } else {
            $_SESSION['cart'][$product_id] = $quantity; // Add new item
        }

        // Set a success message in the session
        $_SESSION['cart_message'] = "Item added to cart!";
        header("Location: products.php"); // Redirect back to products
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
    // Handle direct access to this script
    header("Location: products.php");
    exit();
}
?>