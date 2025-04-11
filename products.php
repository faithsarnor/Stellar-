<?php
include_once 'database.php';

// Prepare and execute a query to fetch all data from the 'products' tabl
$query_table_products = "SELECT * FROM products";
$statement_products = $db->prepare($query_table_products);
$statement_products->execute();
$table_products = $statement_products->fetchAll();

?>




<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <title>Stellar</title>
    <link rel="stylesheet" href="main.css" />
    <script src="java1.js"></script>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond&display=swap" >
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <style>
    table {
        width: 100%;
        border-collapse: collapse;
        font-family: Arial, sans-serif;
    }

    th {
        text-align: left;
        padding: 10px;
        font-weight: bold;
        color: #004080;
        border-bottom: 2px solid #004080;
    }

    tr {
        cursor: pointer;
        padding: 10px;
        transition: background-color 0.3s ease;
    }

    tr:hover {
        background-color: #cce6ff; /* Light blue hover effect */
    }

    td {
        padding: 10px;
        border: none; /* Removed table lines */
    }

    td img {
        width: 100px;
        height: auto;
        border-radius: 5px;
    }
</style>

        

  </head>

  <body>
    <div class="rectangle-22" >
      <div class="slideshow-container" id="slides">
        
        <div class="slide"  onclick="showPopup('Get 30% off today with the code SAVE30 at checkout! Plus, receive a free 4-piece gift when 
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
      </li>
        <li class="ai">GlamBot</li>
        <li><a href="form.html"> &nbsp; &nbsp; Skincare Quiz</a></li>
       
        
      </ul>
      <!--icons-->
      <div class="icons">
        <a href="#" class="icon"><i class="fas fa-search"></i></a>
        <a href="Log/indi.html" class="icon"><i class="fas fa-user"></i></a>
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

    </head>
    <body>
        

        <table border="1">
   <tr>
     <th>Name</th>
     <th>Category</th>
     <th>Price</th>
     <th>Description</th>
     <th>Image</th>
     <th>Stock</th>
   </tr>
   <!-- Loop through the 'products' table to populate rows -->
   <?php foreach ($table_products as $table_product): ?>
   <tr>
     <td><?php echo htmlspecialchars($table_product['name']); ?></td>
     <td><?php echo htmlspecialchars($table_product['category']); ?></td>
     <td><?php echo htmlspecialchars($table_product['price']); ?></td>
     <td><?php echo htmlspecialchars($table_product['description']); ?></td>
     <td><img src="<?php echo htmlspecialchars($table_product['image_url']); ?>" alt="<?php echo htmlspecialchars($table_product['name']); ?>" style="width: 100px; height: auto;"></td>
     <td><?php echo htmlspecialchars($table_product['stock']); ?></td>
   </tr>
   <?php endforeach; ?>
</table>

<footer class="footer">
  <span> FAQ</span> &nbsp;&nbsp;
  <span>Feedback</span>&nbsp;&nbsp;
  <span>Contact US</span>&nbsp;&nbsp;
  <span>Customer Support</span>
</footer>

    </body>
</html>
