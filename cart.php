<?php
session_start();
include_once 'database.php'; // Include your database connection

// Function to fetch product details by ID
function getProductDetails($product_id, $db) {
    $query = "SELECT product_id, name, price, image_url FROM products WHERE product_id = :product_id";
    $stmt = $db->prepare($query);
    $stmt->bindParam(':product_id', $product_id, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

$total_items = 0;
$subtotal = 0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Your Cart</title>
    <link rel="stylesheet" href="main.css">  <!-- Link to your main.css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <style>
        /* Basic cart page styles - adjust to fit your design */
        body {
            font-family: Arial, sans-serif;
            background: radial-gradient(circle, rgb(227, 226, 223) 0%, rgb(107, 177, 201) 100%); /* From your CSS */
            margin: 0;
            padding: 0;
        }
        .cart-container {
            max-width: 800px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        img {
            width: 50px;
            height: auto;
        }
        .update-quantity-form {
            display: inline-block; /* Allows form and button to be on same line */
        }
        .update-quantity-form input[type="number"] {
          width: 40px;
          text-align: center;
          margin-right: 5px;
        }
        .update-quantity-form button {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 5px 10px;
            border-radius: 4px;
            cursor: pointer;
        }
        .remove-button {
          background-color: #dc3545;
          color: white;
          border: none;
          padding: 5px 10px;
          border-radius: 4px;
          cursor: pointer;
        }
        .checkout-button {
            background-color: #28a745;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1.2em;
            display: block; /* Makes button take full width */
            margin-top: 20px; /* Adds space above the button */
            width: 100%; /* Ensures the button fills the width of its container */
            box-sizing: border-box; /* Includes padding and border in the button's total width */
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
        /*  General Body Styles (from your main.css, potentially) --- */
        body {
            background: radial-gradient(circle, rgb(227, 226, 223) 0%, rgb(107, 177, 201) 100%); /* From your CSS */
            font-family: Arial, sans-serif; /* A default font */
            margin: 0;
            padding: 0;
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
          <a href="Products.php">
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
        <a href="#" class="icon"><i class="fas fa-search"></i></a>
        <a href="Log/indi.html" class="icon"><i class="fas fa-user"></i></a>
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
    <div class="cart-container">
        <h2>Your Cart</h2>

        <?php if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])): ?>
            <table>
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Subtotal</th>
                        <th></th> <!-- For remove button -->
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($_SESSION['cart'] as $product_id => $quantity):
                        $product = getProductDetails($product_id, $db);
                        if ($product):
                            $subtotal_item = $product['price'] * $quantity;
                            $subtotal += $subtotal_item;
                            $total_items += $quantity;
                    ?>
                        <tr>
                            <td>
                                <img src="<?php echo htmlspecialchars($product['image_url']); ?>" alt="<?php echo htmlspecialchars($product['name']); ?>">
                                <?php echo htmlspecialchars($product['name']); ?>
                            </td>
                            <td>$<?php echo htmlspecialchars(number_format($product['price'], 2)); ?></td>
                            <td>
                                <form class="update-quantity-form" action="cart_action.php" method="post">
                                    <input type="hidden" name="action" value="update">
                                    <input type="hidden" name="product_id" value="<?php echo htmlspecialchars($product_id); ?>">
                                    <input type="number" name="new_quantity" value="<?php echo htmlspecialchars($quantity); ?>" min="0">
                                    <button type="submit">Update</button>
                                </form>
                            </td>
                            <td>$<?php echo htmlspecialchars(number_format($subtotal_item, 2)); ?></td>
                            <td>
                              <form action="cart_action.php" method="post">
                                <input type="hidden" name="action" value="remove">
                                <input type="hidden" name="product_id" value="<?php echo htmlspecialchars($product_id); ?>">
                                <button type="submit" class="remove-button">Remove</button>
                              </form>
                            </td>
                        </tr>
                    <?php
                        endif; // End if product found
                    endforeach;
                    ?>
                </tbody>
                <tfoot>
                    <tr>
                      <td colspan="2">Total Items: <?php echo $total_items; ?></td>
                      <td><b>Subtotal:</b></td>
                      <td>$<?php echo htmlspecialchars(number_format($subtotal, 2)); ?></td>
                      <td></td>
                    </tr>
                </tfoot>
            </table>

            <form action="checkout.php" method="post">
                <button type="submit" class="checkout-button">Proceed to Checkout</button>
            </form>
        <?php else: ?>
            <p>Your cart is empty.</p>
        <?php endif; ?>
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