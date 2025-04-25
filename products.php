<?php
/*
  Author: Faith Sarnor
  Modified by: Zainab Sajjad, 4/18/2025
  Description: Fixed issues with the shopping cart functionality, including properly displaying items from the session and calculating totals. 
               Added PHP code to dynamically retrieve product data (name, price, image) from the MySQL database for each item in the cart.
               Updated CSS to improve the layout and design of the cart page, ensuring better responsiveness and alignment of elements.
  Attribution: Font Awesome for icons, Google Fonts for typography, and W3Schools for slideshow example.
*/


session_start();
include_once 'database.php';

// Fetch products
$query_table_products = "SELECT product_id, name, category, price, description, image_url, stock FROM products";
$statement_products = $db->prepare($query_table_products);
$statement_products->execute();
$table_products = $statement_products->fetchAll(PDO::FETCH_ASSOC);
?>


<!-- <!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Products Page</title>
        <link rel="stylesheet" href="main.css">
    </head>
    <body>
        <div class="header">
            <h2>PRODUCTS</h2>
        </div>
        <ul class="head">
            <li><a href="index.html">Stellar</a></li>
            <li><a href="about.html">About Us</a></li>
            <li><a href="faq.html">FAQ</a></li>
            <li class="ai">GlamBot</li>
            <li class="dropdown">
                <button class="drop">Products</button>
                <div class="dropdown-menu">
                    <div class="submenu">
                        <a href="#cleansers">Cleanser</a>
                    </div>
                    <div class="submenu">
                        <a href="#moisturizers">Moisturizer</a>
                    </div>
                    <div class="submenu">
                        <a href="#toners">Toner</a>
                    </div>
                </div>
            </li>
        </ul>

        <h1>Products</h1>
        
        <section id="cleansers">
            <h2>Cleansers</h2>
            <div class="product-container">
                <div class="product">
                    <h3>CeraVe - Hydrating Facial Cleanser</h3>
                    <p>$18</p>
                    <button class="add-to-cart">Add to Cart</button>
                    <img src="img/:images:cerave-cleanser.jpg" alt="CeraVe Cleanser">
                    
                </div>
                <div class="product">
                    <h3>La Roche-Posay - Hydrating Gentle Face Cleanser</h3>
                    <p>$20</p> 
                    <button class="add-to-cart">Add to Cart</button>
                    <img src="img/La Roche Posay Cleanser.jpg" alt="La Roche-Posay Cleanser">
                    
                </div>
                <div class="product">
                    <h3>Aveeno - Calm + Restore Nourishing Oat Facial Cleanser</h3>
                    <p>$15</p>
                    <button class="add-to-cart">Add to Cart</button>
                    <img src="img/Aveeno cleanser.jpg" alt="Aveeno Cleanser">
                    
                </div>
                <div class="product">
                    <h3> Vanicream- gentle facial cleanser </h3>
                    <p>$13</p>
                    <button class="add-to-cart">Add to Cart</button>
                    <img src="img/Vanicream Cleanser.jpg" alt="Vanicream Cleanser">
                    
                </div>
                <div class="product">
                    <h3>	Cetaphil- gentle skin cleanser face wash, for sensitive skin </h3>
                    <p>$12</p>
                    <button class="add-to-cart">Add to Cart</button>
                    <img src="img/cetaphil cleanser.jpg" alt="Cetaphil Cleanser">
                    
                </div>
            </div>
        </section>

        <section id="moisturizers">
            <h2>Moisturizers</h2>
            <div class="product-container">
                <div class="product">
                    <h3>Cetaphil - Moisturizing Cream for Dry to Very Dry Skin</h3>
                    <p>$11</p>
                    <button class="add-to-cart">Add to Cart</button>
                    <img src="img/cetaphil moisturizer.jpg" alt="Cetaphil Moisturizer">
                    
                </div>
                <div class="product">
                    <h3>La Roche-Posay - Toleriane Double Repair Face Moisturizer</h3>
                    <p>$25</p>
                    <button class="add-to-cart">Add to Cart</button>
                    <img src="img/la roche posay moisturizer.webp" alt="La Roche-Posay Moisturizer">
                    
                </div>
                <div class="product">
                    <h3>CeraVe - Moisturizing Cream</h3>
                    <p>$15</p>
                    <button class="add-to-cart">Add to Cart</button>
                    <img src="img/cerave moisturizer.jpg" alt="Cerave Moisturizer">
                    
                </div>
                <div class="product">
                    <h3>	Olay- micro sculpting cream </h3>
                    <p>$25</p>
                    <button class="add-to-cart">Add to Cart</button>
                    <img src="img/olay moisturizer.jpeg" alt="olay Moisturizer">
                    
                </div>
                <div class="product">
                    <h3>Itk- prebiotic Gel Moisturizer </h3>
                    <p>$12</p>
                    <button class="add-to-cart">Add to Cart</button>
                    <img src="img/cerave moisturizer.jpg" alt="Itk Moisturizer">
                    
                </div>
            </div>
        </section>

        <section id="toners">
            <h2>Toners</h2>
            <div class="product-container">
                <div class="product">
                    <h3>First Aid Beauty - Ultra Repair Wild Oat Hydrating Toner</h3>
                    <p>$24</p>
                    <button class="add-to-cart">Add to Cart</button>
                    <img src="img/First aid beauty toner.jpg" alt="First Aid Beauty Toner">
                    
                </div>
                <div class="product">
                    <h3>Cetaphil - Bright Healthy Radiance Brightness Refresh Toner</h3>
                    <p>$22</p>
                    <button class="add-to-cart">Add to Cart</button>
                    <img src="img/Cetaphil toner.webp" alt="Cetaphil Toner">
                    
                </div>
                <div class="product">
                    <h3>Thayers - Rose Petal Toner</h3>
                    <p>$11</p>
                    <button class="add-to-cart">Add to Cart</button>
                    <img src="img/thayers toner.jpg" alt="Thayers Toner">
                    
                   <div class="product">
                    <h3> Mario Badescu Aloe Vera Toner      </h3>
                        <p>$16</p>
                        <button class="add-to-cart">Add to Cart</button>
                        <img src="img/mario badescu toner.webp" alt="Mario Badescu Toner">
                        
                    </div>
                </div>
            </div>
        </section>
    </body>
</html>
-->




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Stellar - Products</title>
    <link rel="stylesheet" href="main.css" /> <!-- Include your main CSS -->
    <script src="java1.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond&display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <style>
        /* --- General Body Styles (from your main.css, potentially) --- */
        body {
            background: radial-gradient(circle, rgb(227, 226, 223) 0%, rgb(107, 177, 201) 100%); /* From your CSS */
            font-family: Arial, sans-serif; /* A default font */
            margin: 0;
            padding: 0;
        }
        /* --- Header and Navigation (from your CSS) --- */
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

        /* --- Product Grid Styles (NEW, and also incorporate your existing styles) --- */
        .product-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            padding: 20px;
            max-width: 1200px;
            margin: 0 auto;
        }
        .product {
            background-color: #fff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s ease-in-out;
            display: flex;            /* Use flexbox to arrange content */
            flex-direction: column;   /* Stack content vertically */
            justify-content: space-between; /* Push content to top and bottom */
        }
        .product:hover {
            transform: translateY(-5px);
        }
        .product img {
            width: 100%;
            height: auto;
            display: block;
        }
        .product-details {
            padding: 15px;
            /* NEW:  Add flex to the product-details to control the content layout within */
            display: flex;
            flex-direction: column;
            justify-content: space-between;  /* This is KEY! */
            flex-grow: 1; /* Allow the details section to take up the remaining space */
        }
        .product h3 {
            margin-top: 0; /* Remove default margin */
            font-size: 1.2em;
            margin-bottom: 8px;
        }
        .product p {
            margin-bottom: 10px;
            color: #555;
        }
        /* Add to Cart Button Styling */
        .add-to-cart-btn {
            background-color: #007bff;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1em;
            transition: background-color 0.3s ease;
            width: 100%; /* Full width */
            box-sizing: border-box;
            margin-top: 10px; /* Add space above the button */
        }
        .add-to-cart-btn:hover {
            background-color: #0056b3;
        }
        .quantity-input {
            width: 60px;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            text-align: center;
            margin-right: 10px;
            box-sizing: border-box; /* Include padding/border in width */
            font-size: 1em;
        }
          /* Style for the message */
        .cart-message {
          background-color: #d4edda;
          color: #155724;
          border: 1px solid #c3e6cb;
          padding: 10px;
          margin-bottom: 10px;
          border-radius: 4px;
        }

        /* Add space between the product grid and the footer */
        main {
            padding-bottom: 20px;  /* Or whatever spacing you prefer */
        }
    </style>
</head>

<body>
    <!-- ---  Slider  --- -->
     <div class="font">
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
      </div>

    <div id="discount-popup" class="popup">
      <div class="popup-content">
        <span class="close-popup">X</span>
        <p id="popup-message"></p>
      </div>

    </div>
    <!-- ---  Header and Navigation  --- -->
    <div class="header">
        <ul class="head">
            <li class="fix"><a href="index.html">Stellar</a></li>
            <li><a href="about.html">About Us</a></li>
            <li><a href="faq.html">FAQ</a></li>
            <li class="dropdown">
                <a href="products.php">
                    <button class="drop">Products</button>
                </a>
                <div class="dropdown-menu">
                    <div class="submenu">
                        <a href="#">Cleanser ▸</a>
                        <div class="submenu-menu">
                            <a href="#">CeraVe</a> <a href="#">La Roche-Posay</a> <a href="#">Aveeno</a> <a href="#">Vanicream</a> <a href="#">Cetaphil</a>
                        </div>
                    </div>
                    <div class="submenu">
                        <a href="#">Moisturizer ▸</a>
                        <div class="submenu-menu">
                            <a href="#">Cetaphil</a> <a href="#">La Roche-Posay</a> <a href="#">Cerave</a> <a href="#">Olay</a> <a href="#">Itk</a>
                        </div>
                    </div>
                    <div class="submenu">
                        <a href="#">Toner ▸</a>
                        <div class="submenu-menu">
                            <a href="#">First Aid Beauty</a> <a href="#">Cetaphil</a> <a href="#">Byoma</a> <a href="#">Thayers</a> <a href="#"> Mario Badescu </a>
                        </div>
                    </div>
                </div>
            </li>
            <li class="ai">GlamBot</li>
            <li><a href="form.html">     Skincare Quiz</a></li>
        </ul>
        <div class="icons">
            <a href="#" class="icon"><i class="fas fa-search"></i></a>
            <a href="Log/indi.html" class="icon"><i class="fas fa-user"></i></a>
            <a href="cart.php" class="icon"><i class="fas fa-shopping-bag"></i></a>
        </div>
    </div>
    <div class="search-container" id="search-container">
        <div class="search-input-wrapper">
            <input type="text" id="search-input" placeholder="What can we help you find?" />
            <i class="fas fa-times" id="search-close-icon"></i>
        </div>
        <div id="search-results"></div>
    </div>
    <!-- --- Product Grid  --- -->
    <main>
        <h1 style=" color: #1d2d44; text-align: center;">Our Products</h1>
        <?php if (isset($_SESSION['cart_message'])): ?>
            <div class="cart-message">
                <?php echo htmlspecialchars($_SESSION['cart_message']); ?>
            </div>
            <?php unset($_SESSION['cart_message']); // Clear the message after displaying ?>
        <?php endif; ?>
        <div class="product-grid">
            <?php if (!empty($table_products)): ?>
                <?php foreach ($table_products as $product): ?>
                    <div class="product">
                        <img src="<?php echo htmlspecialchars($product['image_url']); ?>" alt="<?php echo htmlspecialchars($product['name']); ?>">
                        <div class="product-details">
                            <h3><?php echo htmlspecialchars($product['name']); ?></h3>
                            <p>Price: $<?php echo htmlspecialchars(number_format($product['price'], 2)); ?></p>
                            <p><?php echo htmlspecialchars($product['description']); ?></p>
                            <form action="cart_action.php" method="post">
                                <input type="hidden" name="action" value="add">
                                <input type="hidden" name="product_id" value="<?php echo $product['product_id']; ?>">
                                <label for="quantity_<?php echo $product['product_id']; ?>" class="visually-hidden">Quantity:</label>
                                <input type="number" id="quantity_<?php echo $product['product_id']; ?>" name="quantity" value="1" class="quantity-input">
                                <button type="submit" class="add-to-cart-btn">Add to Cart</button>
                            </form>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>No products found.</p>
            <?php endif; ?>
        </div>
    </main>
    <!-- --- Footer --- -->
    <footer class="footer">
      <span>Feedback</span>&nbsp;&nbsp;
      <span>Contact US</span>&nbsp;&nbsp;
      <span>Customer Support</span>
    </footer>
    &nbsp;
    &nbsp;
    &nbsp;
    &nbsp;
    &nbsp;
    &nbsp;
    &nbsp;
    &nbsp;
    &nbsp;
    &nbsp;
    &nbsp;
    &nbsp;
    &nbsp;
    &nbsp;
    &nbsp;
    &nbsp;
    &nbsp;
    &nbsp;
    &nbsp;
    &nbsp;
    &nbsp;
    &nbsp;

   


    <!--  Script includes  -->
    <script src="java1.js"></script>
</body>
</html>
