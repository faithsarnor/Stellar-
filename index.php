<?php
/*
  Author: Faith Sarnor, Zainab Sajjad 
  Modified by: Zainab Sajjad, 4/18/2025
  Description: This HTML file displays the main header and navigation layout for Stellar’s homepage, including discounts, search functionality, and product category menus.
  Attribution: Used Font Awesome for icons and Google Fonts for typography. Some UI/UX interaction logic referenced from online tutorials and customized with the help of ChatGPT.
*/


session_start();
include_once 'database.php';

// Fetch products
$query_table_products = "SELECT product_id, name, category, price, description, image_url, stock FROM products";
$statement_products = $db->prepare($query_table_products);
$statement_products->execute();
$table_products = $statement_products->fetchAll(PDO::FETCH_ASSOC);

// Assign table_products to $products, so it can be used by Javascript
$products = $table_products;



?>
<?php include('glam/glam.html'); ?>


<!--
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Stellar - Products</title>
<<<<<<< HEAD
    <link rel="stylesheet" href="main.css" /> 
    <script>
        // Pass PHP products data to JavaScript
        var products = <?php echo json_encode($products); ?>;
    </script>
    <link rel="stylesheet" href="main.css" /> 
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
     ---  Slider  --- 
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
    ---  Header and Navigation  
    <div class="header">
        <ul class="head">
            <li class="fix"><a href="index.php">Stellar</a></li>
            <li><a href="about.html">About Us</a></li>
            <li><a href="faq.html">FAQ</a></li>    
            <li class="dropdown">
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
    </li>
            <li class="ai">GlamBot</li>
            <li><a href="form.html">     Skincare Quiz</a></li>
        </ul>
        <div class="icons">
      <a href="#" class="icon" id="search-icon"><i class="fas fa-search"></i></a>
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
                    <div class="product" id="product-<?php echo $product['product_id']; ?>">  
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
     --- Footer --- 
    <footer class="footer">
      <span>Feedback</span>  
      <span>Contact US</span>  
      <span>Customer Support</span>
    </footer>
     Script includes  -
    <script src="java1.js"></script>
</body>
</html>
            -->
<!--
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Stellar - Welcome</title>
    <link rel="stylesheet" href="main.css">
    <script src="java1.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond&display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <style>
        body {
            background: #f5f5f5;
            font-family: Arial, sans-serif;
            margin: 0;
        }
        .header { display: flex; justify-content: space-between; align-items: center; padding: 10px 20px; background: lightblue; font-family: 'Cormorant Garamond'; }
        .header .fix a { font-size: 50px; color: #926f34; text-decoration: none; }
        .head { list-style: none; display: flex; gap: 20px; }
        .head a { color: #1d2d44; text-decoration: none; font-size: 18px; }
        .icons a { margin-left: 15px; color: #1d2d44; text-decoration: none; font-size: 20px; }
        .hero {
            display: flex;
            align-items: center;
            justify-content: space-around;
            padding: 60px 20px;
            background: #fff;
        }
        .hero-text { max-width: 500px; }
        .hero-text h1 { font-size: 2.8em; margin-bottom: 20px; color: #1d2d44; }
        .hero-text p { font-size: 1.1em; margin-bottom: 25px; color: #444; }
        .hero-text a { background: #007bff; color: #fff; padding: 10px 20px; border-radius: 5px; text-decoration: none; }
        .hero img { width: 400px; border-radius: 8px; }
        .section-title { text-align: center; margin: 40px 0 20px; font-size: 2em; color: #1d2d44; }
        .product-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 20px; padding: 20px; max-width: 1100px; margin: auto; }
        .product { background: #fff; padding: 15px; border-radius: 8px; box-shadow: 0 2px 5px rgba(0,0,0,0.1); text-align: center; }
        .product img { width: 100%; height: auto; border-radius: 5px; }
        .product h3 { font-size: 1.2em; margin: 10px 0 5px; }
        .product p { color: #666; font-size: 0.9em; }
        .product a { display: inline-block; margin-top: 10px; background: #007bff; color: #fff; padding: 8px 12px; border-radius: 4px; text-decoration: none; }
        .quiz-section, .faq-section {
            background: #e9f0f4;
            padding: 40px 20px;
            text-align: center;
        }
        .quiz-section a, .faq-section a {
            display: inline-block;
            background: #1d2d44;
            color: #fff;
            padding: 10px 20px;
            border-radius: 4px;
            text-decoration: none;
            margin-top: 10px;
        }
        footer { background: #1d2d44; color: #fff; padding: 20px; text-align: center; margin-top: 50px; }
    </style>
</head>
<body>
    <div class="header">
        <ul class="head">
            <li class="fix"><a href="index.php">Stellar</a></li>
            <li><a href="about.html">About Us</a></li>
            <li><a href="faq.html">FAQ</a></li>
            <li><a href="products.php">Products</a></li>
            <li><a href="form.html">Skincare Quiz</a></li>
        </ul>
        <div class="icons">
            <a href="#"><i class="fas fa-search"></i></a>
            <a href="Log/indi.html"><i class="fas fa-user"></i></a>
            <a href="cart.php"><i class="fas fa-shopping-bag"></i></a>
        </div>
    </div>

    <div class="hero">
        <div class="hero-text">
            <h1>Filters are great, but real skincare is better.</h1>
            <p>Unlock your skin’s potential with science-backed, dermatologist-approved formulas. Try Stellar today.</p>
            <a href="products.php">Shop Now</a>
        </div>
        <img src="images/hero-model.jpg" alt="Model skincare">
    </div>

    <div class="section-title">Bestsellers</div>
    <div class="product-grid">
        <?php for ($i = 0; $i < min(4, count($table_products)); $i++): $product = $table_products[$i]; ?>
        <div class="product">
            <img src="<?php echo htmlspecialchars($product['image_url']); ?>" alt="<?php echo htmlspecialchars($product['name']); ?>">
            <h3><?php echo htmlspecialchars($product['name']); ?></h3>
            <p>$<?php echo htmlspecialchars(number_format($product['price'], 2)); ?></p>
            <a href="products.php">View Product</a>
        </div>
        <?php endfor; ?>
    </div>

    <div class="quiz-section">
        <h2>Find Your Perfect Skincare Routine</h2>
        <p>Take our quick skincare quiz to get product recommendations tailored just for you.</p>
        <a href="form.html">Take the Quiz</a>
    </div>

    <div class="faq-section">
        <h2>Got Questions?</h2>
        <p>We’ve got answers. Check out our FAQ section to learn more about shipping, returns, and skincare tips.</p>
        <a href="faq.html">Visit FAQ</a>
    </div>

    <footer>
        &copy; 2025 Stellar Skincare. All rights reserved.
    </footer>
</body>
</html>
    -->

    <!DOCTYPE html>
<html lang="en">
<head>
    <title>Stellar - Welcome</title>
    <link rel="stylesheet" href="main.css">
    <script src="java1.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond&display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>
<body>
    <div class="header">
        <ul class="head">
            <li class="fix"><a href="index.php">Stellar</a></li>
            <li><a href="about.html">About Us</a></li>
            <li><a href="faq.html">FAQ</a></li>
            <li><a href="products.php">Products</a></li>
            <li><a href="form.html">Skincare Quiz</a></li>
        </ul>
        <div class="icons">
            <a href="#" class="icon"><i class="fas fa-search"></i></a>
            <a href="Log/indi.html" class="icon"><i class="fas fa-user"></i></a>
            <a href="cart.php" class="icon"><i class="fas fa-shopping-bag"></i></a>
        </div>
    </div>

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
    </div>

    <div id="discount-popup" class="popup">
        <div class="popup-content">
            <span class="close-popup">X</span>
            <p id="popup-message"></p>
        </div>
    </div>

    <div class="hero" style="display: flex; align-items: center; justify-content: space-around; padding: 60px 20px; background: #ffffff70; flex-wrap: wrap;">
        <div class="hero-text" style="max-width: 500px;">
            <h1 style="font-size: 2.8em; color: #1d2d44;">Filters are great, but real skincare is better.</h1>
            <p style="font-size: 1.1em; color: #444;">Unlock your skin’s potential with science-backed, dermatologist-approved formulas.</p>
            <a href="products.php" style="background: #007bff; color: white; padding: 10px 20px; border-radius: 5px; text-decoration: none; display: inline-block;">Shop Now</a>
        </div>
        <img src="images/hero-model.jpg" alt="Model skincare" style="width: 300px; border-radius: 8px; margin-top: 20px;">
    </div>

    <h2 class="section-title" style="text-align: center; color: #1d2d44;">Bestsellers</h2>
    <div class="product-grid" style="display: flex; justify-content: center; gap: 40px; padding: 20px; max-width: 1200px; margin: 0 auto; overflow-x: auto; white-space: nowrap;">
        <?php for ($i = 0; $i < min(4, count($table_products)); $i++): $product = $table_products[$i]; ?>
        <div class="product" style="width: 250px; background: white; border-radius: 10px; box-shadow: 0 4px 8px rgba(0,0,0,0.1); padding: 15px; text-align: center; display: inline-block; white-space: normal;">
            <img src="<?php echo htmlspecialchars($product['image_url']); ?>" alt="<?php echo htmlspecialchars($product['name']); ?>" style="width: 100%; height: auto; border-radius: 8px;">
            <div class="product-details">
                <h3 style="font-family: 'Cormorant Garamond', serif; color: #1d2d44; font-size: 1.2em; margin: 10px 0 5px;">
                    <?php echo htmlspecialchars($product['name']); ?>
                </h3>
                <p style="color: #457b9d; font-weight: bold; margin-bottom: 10px;">
                    $<?php echo htmlspecialchars(number_format($product['price'], 2)); ?>
                </p>
                <a href="products.php" style="background: #457b9d; color: white; padding: 8px 12px; border-radius: 5px; text-decoration: none;">View Product</a>
            </div>
        </div>
        <?php endfor; ?>
    </div>

    <div class="quiz-section" style="background: #e9f0f4; padding: 40px 20px; text-align: center;">
        <h2 style="color: #1d2d44;">Find Your Perfect Skincare Routine</h2>
        <p>Take our quick skincare quiz to get product recommendations tailored just for you.</p>
        <a href="form.html" style="background: #1d2d44; color: white; padding: 10px 20px; border-radius: 4px; text-decoration: none; display: inline-block;">Take the Quiz</a>
    </div>

    <div class="faq-section" style="background: #e9f0f4; padding: 40px 20px; text-align: center;">
        <h2 style="color: #1d2d44;">Got Questions?</h2>
        <p>We’ve got answers. Check out our FAQ section to learn more about shipping, returns, and skincare tips.</p>
        <a href="faq.html" style="background: #1d2d44; color: white; padding: 10px 20px; border-radius: 4px; text-decoration: none; display: inline-block;">Visit FAQ</a>
    </div>



  

    <footer class="footer">
        <span>Feedback</span>&nbsp;&nbsp;
        <span>Contact US</span>&nbsp;&nbsp;
        <span>Customer Support</span>
    </footer>



    <script src="java1.js"></script>
<<<<<<< HEAD
    <script src="glam/script.js"></script> 
 (updated index page)
=======
>>>>>>> 774ec7a0f351b01e2462c2750cf7d3e66a62ef2b
</body>
</html>