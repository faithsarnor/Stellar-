<?php
/*
  Author: Zainab Sajjad 
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

  <!-- Popup -->
  <div id="discount-popup" class="popup">
    <div class="popup-content">
      <span class="close-popup">X</span>
      <p id="popup-message"></p>
    </div>
  </div>

  <!-- Header and Navigation -->
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

      <li><a href="form.html">&nbsp;&nbsp;Skincare Quiz</a></li>
    </ul>

    <!-- Icons -->
    <div class="icons">
      <a href="Log/indi.html" class="icon"><i class="fas fa-user"></i></a>
      <a href="cart.php" class="icon"><i class="fas fa-shopping-bag"></i></a>
    </div>

    <!-- Search -->
    <div class="search-container" id="search-container">
      <div class="search-input-wrapper">
        <input type="text" id="search-input" placeholder="What can we help you find?" />
        <i class="fas fa-times" id="search-close-icon"></i>
      </div>
      <div id="search-results"></div>
    </div>
  </div>
  
  <!--Main Code-->
    <div class="hero" style="display: flex; align-items: center; justify-content: space-around; padding: 60px 20px; background: #ffffff70; flex-wrap: wrap;">
        <div class="hero-text" style="max-width: 500px;">
            <h1 style="font-size: 2.8em; color: #1d2d44;">Filters are great, but real skincare is better.</h1>
            <p style="font-size: 1.1em; color: #444;">Unlock your skin’s potential with science-backed, dermatologist-approved formulas.</p>
            <a href="products.php" style="background: #007bff; color: white; padding: 10px 20px; border-radius: 5px; text-decoration: none; display: inline-block;">Shop Now</a>
        </div>
        <img src="img/skincare1.jpeg" alt="Model skincare" style="width: 300px; border-radius: 8px; margin-top: 20px;">
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

    <br>
    <br>

   

  


    

    <script src="java1.js"></script>
    <script src="glam/script.js"></script> 
</body>
</html>