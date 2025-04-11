<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <title>Stellar</title>
    <link rel="stylesheet" href="main.css" />
    <script src="java1.js"></script>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond&display=swap" >
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

  </head>

  <body>
    <div class="rectangle-22">
      <div class="slideshow-container" id="slides">
        <div class="slide"><span>Free Shipping on Orders $300+</span></div>
        <div class="slide"><span>Get 40% off Your First Order</span></div>
        <div class="slide"><span>Discounts & Coupons</span></div>
      </div>
      <div class="slideshow-nav">
        <button id="prev-slide"></button>
        <button id="next-slide">></button>
      </div>
    </div>

    <!-- Header with Stellar and Navigation Links -->
    <div class="header">
      <ul class="head">
        <li class="fix"><a href="index.html">Stellar</a></li> 
        <li><a href="about.html">About Us</a></li>
        <li><a href="faq.html">FAQ</a></li>
        <li><a href="Products.html">Products</a></li>
        <li class="ai">GlamBot</li>
        <li><a href="form.html"> &nbsp; &nbsp; Skincare Quiz</a></li>
       
        
      </ul>
      <!--icons-->
      <div class="icons">
        <a href="#" class="icon"><i class="fas fa-search"></i></a>
        <a href="login.html" class="icon"><i class="fas fa-user"></i></a>
        <a href="wishlist.html" class="icon"><i class="fas fa-heart"></i></a>
        <a href="cart.html" class="icon"><i class="fas fa-shopping-bag"></i></a>
    </div>
    <div class="search-container" id="search-container">
      <div class="search-input-wrapper">
        <input type="text" id="search-input" placeholder="What can we help you find?" />
        <i class="fas fa-times" id="search-close-icon"></i>
      </div>
      <div id="search-results"></div>
    </div>
  </div>
  <?php
  if (isset($_POST['type']) && isset($_POST['skin']) && isset($_POST['product'])) { // Check if form data is set
    $type = $_POST['type'];
    $problem = $_POST['skin'];
    $product = $_POST['product'];
    
    if ($type == "Dry" && $problem == "Acne" && $product == "Moisturizer") {
        echo 'Here is a recommended product:<br>';
        echo '<img src="https://th.bing.com/th/id/OIP.JOgFRUanurAGcghIhE5qhQHaHa?rs=1&pid=ImgDetMain"><br>';
    } elseif ($type == "Oily" && $problem == "Acne" && $product == "Moisturizer") {
        echo 'Here is a recommended product: <br>';
        echo '<img src="https://m.media-amazon.com/images/I/61tAp+18-bL._SL1500_.jpg"><br>'; 
    } elseif ($type == "Acne" && $problem == "Acne" && $product == "Moisturizer") {
        echo 'Here is a recommended product.<br>';
        echo '<img src="https://cdn.nicehair.dk/products/89332/clarifying-oil-free-water-gel-50-ml-1596691014.jpg"><br>';
    }



    if ($type == "Dry" && $problem == "Acne" && $product == "Toner") {
      echo 'Here is a recommended product:<br>';
      echo '<img src="https://m.media-amazon.com/images/I/61ktMd4XNtL._SX522_.jpg"><br>';
  } elseif ($type == "Oily" && $problem == "Acne" && $product == "Toner") {
      echo 'Here is a recommended product: <br>';
      echo '<img src="https://m.media-amazon.com/images/I/61PbxvE8UcL._SX522_.jpg"><br>'; 
  } elseif ($type == "Acne" && $problem == "Acne" && $product == "Toner") {
      echo 'Here is a recommended product.<br>';
      echo '<img src="https://www.dermstore.com/images?url=https://static.thcdn.com/productimg/original/11429030-2885213116989150.jpg&format=webp&auto=avif&width=985&height=985&fit=cover&dpr=2"><br>';
  } 
    


if ($type == "Dry" && $problem == "Acne" && $product == "Serum") {
  echo 'Here is a recommended product:<br>';
  echo '<img src="https://cdn.shopify.com/s/files/1/2626/0488/products/Untitled-2.jpg?v=1615522495"><br>';
} elseif ($type == "Oily" && $problem == "Acne" && $product == "Serum") {
  echo 'Here is a recommended product: <br>';
  echo '<img src="https://www.jeancoutu.com/catalogue-images/455901/viewer-zoom/0/caudalie-vinopure-serum-perfecteur-de-peau-30-ml.png"><br>'; 
} elseif ($type == "Acne" && $problem == "Acne" && $product == "Serum") {
  echo 'Here is a recommended product.<br>';
  echo '<img src="https://s4.thcdn.com//productimg/1600/1600/13906946-9374975436100654.jpg"><br>';
} 

if ($type == "Dry" && $problem == "Acne" && $product == "Cleanser") {
  echo 'Here is a recommended product:<br>';
  echo '<img src="https://m.media-amazon.com/images/I/617cYpld9UL._SX522_.jpg"><br>';
} elseif ($type == "Oily" && $problem == "Acne" && $product == "Cleanser") {
  echo 'Here is a recommended product: <br>';
  echo '<img src="https://media.ulta.com/i/ulta/2609330?w=1080&h=1080&fmt=auto"><br>'; 
} elseif ($type == "Acne" && $problem == "Acne" && $product == "Cleanser") {
  echo 'Here is a recommended product.<br>';
  echo '<img src="https://media.ulta.com/i/ulta/2615399?w=1080&h=1080&fmt=auto"><br>';
} 













  }








  


?>

    <footer class="footer">
      <span> FAQ</span> &nbsp;&nbsp;
      <span>Feedback</span>&nbsp;&nbsp;
      <span>Contact US</span>&nbsp;&nbsp;
      <span>Customer Support</span>
    </footer>

  
</body>
</html>