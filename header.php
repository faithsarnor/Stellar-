<!DOCTYPE html>
<html lang="en">
<head>
    <title>Stellar</title>
    <link rel="stylesheet" href="main.css" />
    <script src="java1.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond&display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>

<body>
<!-- --- Discount Slider --- -->
<div class="font">
  <div class="rectangle-22">
    <div class="slideshow-container" id="slides">
      <div class="slide" onclick="showPopup('Get 30% off today with the code SAVE30...')">
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

<!-- --- Header and Navigation --- -->
<div class="header">
    <ul class="head">
        <li class="fix"><a href="index.php">Stellar</a></li>
        <li><a href="about.html">About Us</a></li>
        <li><a href="faq.html">FAQ</a></li> &nbsp;&nbsp;&nbsp;
        <li class="dropdown">
            <div class="dropdown">
                <a href="products.php" class="drop">Products</a>
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
        <li><a href="form.html">Skincare Quiz</a></li>
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
