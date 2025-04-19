<?php
/*
  Author: Zainab Sajjad
  Date: April 18, 2025
  Description: This PHP file displays the shopping cart page. It shows product images, names, prices, and lets users update quantities or remove items. Cart data is stored in the session and product details are fetched from the database.
  Attribution: Cart logic and table formatting inspired by online e-commerce tutorials. Some code structures enhanced with the help of ChatGPT.
  Notes: Remember to validate inputs from the form and add CSRF protection in future iterations.
*/

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
    <link rel="stylesheet" href="main.css" />
    <link rel="stylesheet" href="cart.css" />
    <script src="java1.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond&display=swap" >

</head>
<body>

<div class="rectangle-22">
    <div class="slideshow-container" id="slides">
        <div class="slide" onclick="showPopup('Get 30% off today with the code SAVE30 at checkout! Plus, receive a free 4-piece gift...')">
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

<div class="header">
    <ul class="head">
        <li class="fix"><a href="index.html">Stellar</a></li>
        <li><a href="about.html">About Us</a></li>
        <li><a href="faq.html">FAQ</a></li>
        <li class="dropdown">
            <a href="Products.php"><button class="drop">Products</button></a>
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
                    <th></th>
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
                    <td>$<?php echo number_format($product['price'], 2); ?></td>
                    <td>
                        <form class="update-quantity-form" action="cart_action.php" method="post">
                            <input type="hidden" name="action" value="update">
                            <input type="hidden" name="product_id" value="<?php echo htmlspecialchars($product_id); ?>">
                            <input type="number" name="new_quantity" value="<?php echo htmlspecialchars($quantity); ?>" min="0" class="quantity-input" onchange="this.form.submit()">
                        </form>
                    </td>
                    <td>$<?php echo number_format($subtotal_item, 2); ?></td>
                    <td>
                        <form action="cart_action.php" method="post">
                            <input type="hidden" name="action" value="remove">
                            <input type="hidden" name="product_id" value="<?php echo htmlspecialchars($product_id); ?>">
                            <button type="submit" class="remove-button">Remove</button>
                        </form>
                    </td>
                </tr>
                <?php endif; endforeach; ?>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="2">Total Items: <?php echo $total_items; ?></td>
                    <td><b>Subtotal:</b></td>
                    <td>$<?php echo number_format($subtotal, 2); ?></td>
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

<footer class="footer">
    <span>FAQ</span>  
    <span>Feedback</span>  
    <span>Contact US</span>  
    <span>Customer Support</span>
</footer>

</body>
</html>
