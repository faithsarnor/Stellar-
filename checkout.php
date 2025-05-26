<?php
/*
  Author: Zainab Sajjad
  Date: April 18, 2025
  Description: Checkout page for the Stellar skincare website, including billing, shipping, and payment forms.
  Attribution: Font Awesome for icons, Google Fonts for typography, and W3Schools for slideshow example.

*/
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Checkout</title>
    <link rel="stylesheet" href="main.css" />
    <script src="java1.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond&display=swap" >

    <style>
        body {
            font-family: "Cormorant Garamond";
            background: radial-gradient(circle, rgb(227, 226, 223) 0%, rgb(107, 177, 201) 100%); /* From your CSS */
            margin: 0;
            padding: 0;
        }
        .checkout-container {
            max-width: 800px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        input[type="text"],
        input[type="email"],
        input[type="tel"],
        select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box; /* Important for width */
            margin-bottom: 10px;
        }
        .submit-button {
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1.2em;
        }
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-family: "Cormorant Garamond";
            background: lightblue; /* or whatever color you have */
            padding: 10px 20px;
        }
        .header .fix {
            font-family: "Cormorant Garamond";
            font-size: 50px;
            color: #926f34 !important;
            margin-right: 30px;
        }
        .fix a {
            text-decoration: none;
            color: #926f34 !important;
            font-size: 60px !important;
        }
        .head {
            padding: 0;
            margin: 0;
            list-style: none;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .head li {
            margin-right: 20px;
            display: inline;
        }
        .head a {
            text-decoration: none;
            color: #1d2d44; /* Or whatever color you want */
            font-size: 20px;
            margin-right: 12px;
        }
        .head .ai {
            text-decoration: none;
            color: #1d2d44;
            font-size: 20px;
            margin-right: 3px;
            display: inline;
            line-height: 25px;
            top: 3px;
        }
        .dropdown { ... } // Your dropdown styles
        .dropdown .drop { ... }
        .dropdown-menu { ... }
        .dropdown-menu a { ... }
        .dropdown:hover .dropdown-menu { ... }

        /* --- Slideshow Styles (from your CSS) --- */
        .rectangle-22 { ... }
        .slideshow-container { ... }
        .slide { ... }
        .slideshow-nav { ... }

        /* --- Icon Styles (from your CSS) --- */
        .icons { ... }
        .icon { ... }
        .icon:hover { ... }
        .icon i { ... }

         /* Search Bar Styles (Soko Glam Inspired) (from your CSS) */
        .search-container { ... }
        .search-container.active { ... }
        .search-input-wrapper { ... }
        #search-input { ... }
        #search-input::placeholder { ... }
        #search-close-icon { ... }
        #search-results { ... }
        #search-results a { ... }

        /* --- Footer Styles (from your CSS) --- */
        .footer { ... }

    </style>
</head>
<body>
<div class="rectangle-22" >
      <div class="slideshow-container" id="slides">
        
        <div class="slide"  onclick="showPopup('Get 30% off today with the code SAVE30 at checkout! Plus, receive a free 4-piece gift when you shop on first time of Stellar.com. This offer cannot be exchanged for cash or used as credit toward other products and is subject to change without notice. It cannot be combined with any other offers, and free items are eligible for returns or exchanges. Don’t miss out! Keep an eye on our site for 30% off every 3 weeks and other exclusive promotions coming your way!')">
          <span id="pipo">Discounts & Coupons</span></div>
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
        <li class="fix"><a href="index.php">Stellar</a></li> 
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
      </li>
        <li class="ai">GlamBot</li>
        <li><a href="form.html">     Skincare Quiz</a></li>
       
        
      </ul>
      <!--icons-->
      <div class="icons">
        <a href="Log/indi.html" class="icon"><i class="fas fa-user"></i></a>
        <a href="cart.php" class="icon"><i class="fas fa-shopping-bag"></i></a>
    </div>
    <div class="search-container" id="search-container">
      <div class="search-input-wrapper">
        <input type="text" id="search-input" placeholder="What can we help you find?" />
        <i class="fas fa-times" id="search-close-icon"></i>
      </div>
      <div id="search-results"></div>
    </div>
  </div>
    <div class="checkout-container">
        <h2>Checkout</h2>
        <form action="process_order.php" method="post">
            <h3>Billing Information</h3>
            <div class="form-group">
                <label for="billing_first_name">First Name:</label>
                <input type="text" id="billing_first_name" name="billing_first_name" required>
            </div>
            <div class="form-group">
                <label for="billing_last_name">Last Name:</label>
                <input type="text" id="billing_last_name" name="billing_last_name" required>
            </div>
            <div class="form-group">
                <label for="billing_email">Email:</label>
                <input type="email" id="billing_email" name="billing_email" required>
            </div>
            <div class="form-group">
                <label for="billing_phone">Phone:</label>
                <input type="tel" id="billing_phone" name="billing_phone">
            </div>
            <div class="form-group">
                <label for="billing_address">Address:</label>
                <input type="text" id="billing_address" name="billing_address" required>
            </div>
            <div class="form-group">
                <label for="billing_city">City:</label>
                <input type="text" id="billing_city" name="billing_city" required>
            </div>
            <div class="form-group">
                <label for="billing_state">State:</label>
                <input type="text" id="billing_state" name="billing_state" required>
            </div>
            <div class="form-group">
                <label for="billing_zip">Zip Code:</label>
                <input type="text" id="billing_zip" name="billing_zip" required>
            </div>

            <h3>Shipping Information</h3>
            <div class="form-group">
                <label for="shipping_first_name">First Name:</label>
                <input type="text" id="shipping_first_name" name="shipping_first_name" required>
            </div>
            <div class="form-group">
                <label for="shipping_last_name">Last Name:</label>
                <input type="text" id="shipping_last_name" name="shipping_last_name" required>
            </div>
            <div class="form-group">
                <label for="shipping_address">Address:</label>
                <input type="text" id="shipping_address" name="shipping_address" required>
            </div>
            <div class="form-group">
                <label for="shipping_city">City:</label>
                <input type="text" id="shipping_city" name="shipping_city" required>
            </div>
            <div class="form-group">
                <label for="shipping_state">State:</label>
                <input type="text" id="shipping_state" name="shipping_state" required>
            </div>
            <div class="form-group">
                <label for="shipping_zip">Zip Code:</label>
                <input type="text" id="shipping_zip" name="shipping_zip" required>
            </div>
           

            <h3>Payment Information</h3>
            <div class="form-group">
                <label for="card_number">Card Number:</label>
                <input type="text" id="card_number" name="card_number" required>
            </div>
            <div class="form-group">
                <label for="expiry_date">Expiry Date (MM/YY):</label>
                <input type="text" id="expiry_date" name="expiry_date" required>
            </div>
            <div class="form-group">
                <label for="cvv">CVV:</label>
                <input type="text" id="cvv" name="cvv" required>
            </div>

            <button type="submit" class="submit-button">Place Order</button>
        </form>
    </div>

    <br>
    <br>
    <br>
        <!-- --- Footer --- -->
    <footer class="footer">
      <span>Feedback</span>&nbsp;&nbsp;
      <span>Contact US</span>&nbsp;&nbsp;
      <span>Customer Support</span>
    </footer>

    
</body>
</html>