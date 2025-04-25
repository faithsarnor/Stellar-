<?php
//Author: Zainab Sajjad
//Date: April 20, 2025
// Description: Handles the processing of orders from the checkout page, sanitizes input, confirms purchase, and displays confirmation.
// Attribution: Font Awesome CDN, Google Fonts, JavaScript slideshow used from local and external sources.

// process_order.php
session_start();
require_once("database.php"); // assumes you have a file to connect to MySQL

// Helper function to sanitize input
function clean_input($data) {
    return htmlspecialchars(stripslashes(trim($data)));
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Collect and clean billing info (as before)
    $billing_first = clean_input($_POST['billing_first_name']);
    $billing_last = clean_input($_POST['billing_last_name']);
    $billing_email = clean_input($_POST['billing_email']);
    $billing_phone = clean_input($_POST['billing_phone']);
    $billing_address = clean_input($_POST['billing_address']);
    $billing_city = clean_input($_POST['billing_city']);
    $billing_state = clean_input($_POST['billing_state']);
    $billing_zip = clean_input($_POST['billing_zip']);

    // Collect and clean shipping info (as before)
    $shipping_first = clean_input($_POST['shipping_first_name']);
    $shipping_last = clean_input($_POST['shipping_last_name']);
    $shipping_address = clean_input($_POST['shipping_address']);
    $shipping_city = clean_input($_POST['shipping_city']);
    $shipping_state = clean_input($_POST['shipping_state']);
    $shipping_zip = clean_input($_POST['shipping_zip']);

    // Collect and clean payment info (as before)
    $card_number = clean_input($_POST['card_number']);
    $expiry_date = clean_input($_POST['expiry_date']);
    $cvv = clean_input($_POST['cvv']);

    // You could also handle session cart items here
    $cart_items = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];

    // Display confirmation
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
        .return a {
            color: white; 
            text-decoration: none; 
            padding: 10px 20px; 
            background-color: blue; 
            border-radius: 5px; 
        }

        .return a:hover {
            background-color: darkblue; 
        }

        </style>
    </head>

    <body>
        <!-- --- Slider --- -->
        <div class="rectangle-22">
            <div class="slideshow-container" id="slides">
                <div class="slide" onclick="showPopup('Get 30% off today with the code SAVE30 at checkout! Plus, receive a free 4-piece gift when you shop on first time of Stellar.com. This offer cannot be exchanged for cash or used as credit toward other products and is subject to change without notice. It cannot be combined with any other offers, and free items are eligible for returns or exchanges. Don’t miss out! Keep an eye on our site for 30% off every 3 weeks and other exclusive promotions coming your way!')">
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

        <!-- Header with Stellar and Navigation Links -->
        <div class="header">
            <ul class="head">
                <li class="fix"><a href="index.html">Stellar</a></li>
                <li><a href="about.html">About Us</a></li>
                <li><a href="faq.html">FAQ</a></li>
                <li class="dropdown">
                    <a href="Products.html">
                        <button class="drop">Products</button>
                    </a>
                    <div class="dropdown-menu">
                        <div class="submenu">
                            <a href="#">Cleanser ▸</a>
                            <div class="submenu-menu">
                                <a href="#">CeraVe</a>
                                <a href="#">La Roche-Posay</a>
                                <a href="#">Aveeno</a>
                                <a href="#">Vanicream</a>
                                <a href="#">Cetaphil</a>
                            </div>
                        </div>
                        <div class="submenu">
                            <a href="#">Moisturizer ▸</a>
                            <div class="submenu-menu">
                                <a href="#">Cetaphil</a>
                                <a href="#">La Roche-Posay</a>
                                <a href="#">Cerave</a>
                                <a href="#">Olay</a>
                                <a href="#">Itk</a>
                            </div>
                            <div class="submenu">
                                <a href="#">Toner ▸</a>
                                <div class="submenu-menu">
                                    <a href="#">First Aid Beauty</a>
                                    <a href="#">Cetaphil</a>
                                    <a href="#">Byoma</a>
                                    <a href="#">Thayers</a>
                                    <a href="#"> Mario Badescu </a>
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

        <div class="confirmation-container">
            <h2>Thank You for Your Order!</h2>
            <p>Your order has been placed successfully.</p>
            <p>A confirmation email will be sent to <strong><?php echo htmlspecialchars($billing_email); ?></strong>.</p>
           <span class= "return" ><a href="index.html">Return to Home</a></span>
        </div>

        <!-- --- Footer --- -->
        <footer class="footer">
            <span> FAQ</span>
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
