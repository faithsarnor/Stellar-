<?php
//Author: Zainab Sajjad
//Date: April 20, 2025
// Description: Handles the processing of orders from the checkout page, sanitizes input, confirms purchase, and displays confirmation.
// Attribution: Font Awesome CDN, Google Fonts, JavaScript slideshow used from local and external sources.

session_start();
require_once("database.php"); // assumes you have a file to connect to MySQL

// Helper function to sanitize input
function clean_input($data) {
    return htmlspecialchars(stripslashes(trim($data)));
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Collect and clean billing info
    $billing_first = clean_input($_POST['billing_first_name']);
    $billing_last = clean_input($_POST['billing_last_name']);
    $billing_email = clean_input($_POST['billing_email']);
    $billing_phone = clean_input($_POST['billing_phone']);
    $billing_address = clean_input($_POST['billing_address']);
    $billing_city = clean_input($_POST['billing_city']);
    $billing_state = clean_input($_POST['billing_state']);
    $billing_zip = clean_input($_POST['billing_zip']);

    // Collect and clean shipping info
    $shipping_first = clean_input($_POST['shipping_first_name']);
    $shipping_last = clean_input($_POST['shipping_last_name']);
    $shipping_address = clean_input($_POST['shipping_address']);
    $shipping_city = clean_input($_POST['shipping_city']);
    $shipping_state = clean_input($_POST['shipping_state']);
    $shipping_zip = clean_input($_POST['shipping_zip']);

    // Collect and clean payment info
    $card_number = clean_input($_POST['card_number']);
    $expiry_date = clean_input($_POST['expiry_date']);
    $cvv = clean_input($_POST['cvv']);

    // You could also handle session cart items here
    $cart_items = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];

    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Order Confirmation</title>
        <link rel="stylesheet" href="main.css">
        <script src="java1.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond&display=swap">

        <style>
        /* Confirmation Box Styling */
        .confirmation-container {
            max-width: 600px;
            margin: 60px auto;
            padding: 40px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            text-align: center;
            font-family: 'Cormorant Garamond', serif;
            animation: fadeIn 1s ease-in-out;
        }

        .confirmation-container h2 {
            font-size: 2em;
            margin-bottom: 15px;
            color: #2b2b2b;
        }

        .confirmation-container p {
            font-size: 1.1em;
            color: #555;
            margin: 10px 0;
        }

        .confirmation-container strong {
            color: #0073e6;
        }

        .return {
            margin-top: 30px;
        }

        .return a {
            display: inline-block;
            background-color: #0073e6;
            color: white;
            padding: 12px 24px;
            border-radius: 5px;
            text-decoration: none;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }

        .return a:hover {
            background-color: #005bb5;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(15px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        </style>
    </head>

    <body>
        <!-- --- Slider --- -->

        <div class="rectangle-22">
            <div class="slideshow-container" id="slides">

        <div class="font">
        <div class="rectangle-22">
            <div class="slideshow-container" id="slides">
                <div class="slide" onclick="showPopup('Get 30% off today with the code SAVE30 at checkout!')">

                    <span id="pipo">Discounts & Coupons</span>
                </div>
                <div class="slide"><span>Get 40% off Your First Order</span></div>
                <div class="slide"><span>Free Shipping on Orders $110+</span></div>
            </div>
            <div class="slideshow-nav">
                <button id="prev-slide"><</button>
                <button id="next-slide">></button>
            </div>
        </div>


        <div id="discount-popup" class="popup">
            <div class="popup-content">
                <span class="close-popup">X</span>
                <p id="popup-message"></p>
            </div>
        </div>

    </div>


        <!-- Header -->
        <div class="header">
            <ul class="head">
                <li class="fix"><a href="index.php">Stellar</a></li>
                <li><a href="about.html">About Us</a></li>
                <li><a href="faq.html">FAQ</a></li>
                <li class="dropdown">
                    <a href="Products.php">
                        <button class="drop">Products</button>
                    </a>
                    <div class="dropdown">
          <a href="products.php" class="drop">Products</a> <!-- Products is a link now -->
          <div class="dropdown-menu">
            <a href="category.php?category=Cleansers">Cleansers</a>
            <a href="category.php?category=Moisturizers">Moisturizers</a>
            <a href="category.php?category=Toners">Toners</a>
            <a href="category.php?category=Eye Treatments">Eye Treatments</a>
            <a href="category.php?category=Sunscreens">Sunscreens</a>
          </div>
        </div>    
                        </div>
                    </div>
                </li>
                <li class="ai">GlamBot</li>
                <li><a href="form.html">     Skincare Quiz</a></li>
            </ul>
            <!-- icons -->
            <div class="icons">
                <a href="#" class="icon"><i class="fas fa-search"></i></a>
                <a href="Log/indi.html" class="icon"><i class="fas fa-user"></i></a>
                <a href="cart.php" class="icon"><i class="fas fa-shopping-bag"></i></a>
            </div>
        </div>

        <!-- Order Confirmation Box -->
        <div class="confirmation-container">
            <h2>Thank You for Your Order!</h2>
            <p>Your order has been placed successfully.</p>
            <p>A confirmation email will be sent to <strong><?php echo htmlspecialchars($billing_email); ?></strong>.</p>
            <div class="return"><a href="index.html">Return to Home</a></div>
        </div>

        <!-- Footer -->
        <footer class="footer">
            <span>FAQ</span>
            <span>Feedback</span>
            <span>Contact US</span>
            <span>Customer Support</span>
        </footer>
    </body>
    </html>

    <?php
    // Clear cart after order
    unset($_SESSION['cart']);
} else {
    // If accessed directly, redirect
    header("Location: checkout.php");
    exit();
}
?>
