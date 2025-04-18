
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
  if (isset($_POST['type']) && isset($_POST['skin']) && isset($_POST['product'])) {
      // Retrieve form data
      $type = $_POST['type'];
      $skin_problem = $_POST['skin'];
      $product = $_POST['product'];
  
      // Database connection
      $conn = new mysqli('localhost', 'root', '', 'my_products');
      if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
      }
  
      // Query to fetch the recommended product
      $sql = "SELECT recommended_image_url 
              FROM SkinCareRecommendations 
              WHERE type = ? AND skin_problem = ? AND product = ?";
      $stmt = $conn->prepare($sql);
      $stmt->bind_param('sss', $type, $skin_problem, $product);
      $stmt->execute();
      $result = $stmt->get_result();
  
      // Display the recommended product if found
      if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
              echo 'Here is a recommended product:<br>';
              echo '<img src="' . htmlspecialchars($row['recommended_image_url']) . '"><br>';
          }
      } else {
          echo "No recommendations found for the selected options.";
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