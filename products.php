<?php
session_start();


include_once 'database.php';

$searchTerm = isset($_GET['search']) ? trim($_GET['search']) : '';
$categoryFilter = isset($_GET['category']) ? $_GET['category'] : '';

if ($searchTerm && $categoryFilter) {
    $query = "SELECT * FROM products WHERE category = :category AND name LIKE :search";
    $stmt = $db->prepare($query);
    $stmt->bindParam(':category', $categoryFilter);
    $stmt->bindValue(':search', '%' . $searchTerm . '%');
} elseif ($searchTerm) {
    $query = "SELECT * FROM products WHERE name LIKE :search";
    $stmt = $db->prepare($query);
    $stmt->bindValue(':search', '%' . $searchTerm . '%');
} elseif ($categoryFilter) {
    $query = "SELECT * FROM products WHERE category = :category";
    $stmt = $db->prepare($query);
    $stmt->bindParam(':category', $categoryFilter);
} else {
    $query = "SELECT * FROM products";
    $stmt = $db->prepare($query);
}

$stmt->execute();
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Stellar - Products</title>
    <link rel="stylesheet" href="main.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond&display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <style>
        body {
            font-family: "Cormorant Garamond", serif;
            background: radial-gradient(circle, rgb(227, 226, 223) 0%, rgb(107, 177, 201) 100%);
            margin: 0;
        }

        .header {
            background: lightblue;
            padding: 10px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .head {
            list-style: none;
            display: flex;
            margin: 0;
            padding: 0;
        }

        .head li {
            margin-right: 20px;
            position: relative;
        }

        .head a {
            text-decoration: none;
            color: #1d2d44;
            font-size: 20px;
        }

        .dropdown-menu {
            display: none;
            position: absolute;
            top: 100%;
            background: white;
            padding: 10px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
            z-index: 1000;
        }

        .head li:hover .dropdown-menu {
            display: block;
        }

        .icons a {
            margin-left: 15px;
            color: #1d2d44;
            font-size: 20px;
        }

        .search-bar-container {
            display: flex;
            justify-content: center;
            margin: 20px auto 10px;
            padding: 0 20px;
            max-width: 100%;
        }

        .search-form {
            display: flex;
            width: 100%;
            max-width: 700px;
            background-color: white;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 8px rgba(0,0,0,0.2);
        }

        .search-form input[type="text"] {
            flex-grow: 1;
            padding: 12px 15px;
            font-size: 16px;
            border: none;
            outline: none;
        }

        .search-form button {
            background-color: #1d2d44;
            color: white;
            border: none;
            padding: 0 20px;
            font-size: 18px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .search-form button:hover {
            background-color: #0056b3;
        }

        .product-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 20px;
            padding: 20px;
            max-width: 1200px;
            margin: auto;
        }

        .product {
            background: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s ease;
            display: flex;
            flex-direction: column;
        }

        .product:hover {
            transform: translateY(-5px);
        }

        .product img {
            width: 100%;
            height: 250px;
            object-fit: cover;
        }

        .product-details {
            padding: 15px;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .product h3 {
            margin: 10px 0 5px;
            font-size: 20px;
        }

        .rating-stars i {
            color: #f5a623;
            cursor: pointer;
        }

        .price {
            color: #1d2d44;
            font-size: 16px;
            margin: 5px 0;
        }

        .add-to-cart-btn {
            background-color: #007bff;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 10px;
        }

        .add-to-cart-btn:hover {
            background-color: #0056b3;
        }

    </style>
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

    <div class="header">
        <ul class="head">
            <li class="fix">
                <a href="index.php" class="brand">Stellar</a>
            </li>
            <li><a href="about.html">About Us</a></li>
            <li><a href="faq.html">FAQ</a></li>
            <li class="dropdown">
                <a href="#">Products</a>
                <div class="dropdown-menu">
                    <a href="products.php?category=Cleansers">Cleansers</a>
                    <a href="products.php?category=Moisturizers">Moisturizers</a>
                    <a href="products.php?category=Toners">Toners</a>
                    <a href="products.php?category=Sunscreens">Sunscreens</a>
                </div>
            </li>
            <li><a href="form.html">Skincare Quiz</a></li>
        </ul>


    </ul>
    <div class="icons">
        <a href="Log/indi.html" class="icon"><i class="fas fa-user"></i></a>
        <a href="cart.php" class="icon"><i class="fas fa-shopping-bag"></i></a>
    </div>
</div>

<!-- Search Bar -->
<div class="search-bar-container">
    <form method="GET" action="products.php" class="search-form">
        <input type="text" name="search" placeholder="Search for products..." value="<?php echo htmlspecialchars($searchTerm); ?>">
        <button type="submit"><i class="fas fa-search"></i></button>
    </form>
</div>

<div id="discount-popup" class="popup">
        <div class="popup-content">
            <span class="close-popup">X</span>
            <p id="popup-message"></p>
        </div>
    </div>

<h1 style="text-align:center; color:#1d2d44;">
    <?php echo $categoryFilter ? htmlspecialchars($categoryFilter) : ($searchTerm ? "Search Results for '$searchTerm'" : "Our Products"); ?>
</h1>

<div class="product-grid">
    <?php foreach ($products as $product): ?>
        <div class="product">
            <a href="product_details.php?id=<?php echo $product['product_id']; ?>">
                <img src="<?php echo htmlspecialchars($product['image_url']); ?>" alt="<?php echo htmlspecialchars($product['name']); ?>">
            </a>
            <div class="product-details">
                <a href="product_details.php?id=<?php echo $product['product_id']; ?>" style="text-decoration:none; color:#1d2d44;">
                    <h3><?php echo htmlspecialchars($product['name']); ?></h3>
                </a>
                <div class="price">$<?php echo number_format($product['price'], 2); ?></div>
                <div class="rating-stars">
                    <form action="rate_product.php" method="POST" style="display: inline-block;">
                        <input type="hidden" name="product_id" value="<?php echo $product['product_id']; ?>">
                        <?php for ($i = 1; $i <= 5; $i++): ?>
                            <button type="submit" name="rating" value="<?php echo $i; ?>" style="border:none; background:none; padding:0;">
                                <i class="<?php echo ($i <= round($product['rating'])) ? 'fas' : 'far'; ?> fa-star"></i>
                            </button>
                        <?php endfor; ?>
                        <span>(<?php echo (int)$product['rating_count']; ?>)</span>
                    </form>
                </div>
                <form action="cart_action.php" method="POST">
                <input type="hidden" name="redirect" value="<?php echo $_SERVER['REQUEST_URI']; ?>">

                    <input type="hidden" name="action" value="add">
                    <input type="hidden" name="product_id" value="<?php echo $product['product_id']; ?>">
                    <input type="hidden" name="quantity" value="1">
                    <button type="submit" class="add-to-cart-btn">Add to Cart</button>
                </form>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<br><br><br>

<footer class="footer">
    <span>Feedback</span> &nbsp;&nbsp;
    <span>Contact Us</span>&nbsp;&nbsp;
    <span>Customer Support</span>&nbsp;&nbsp;
</footer>

<script src="java1.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const popup = document.getElementById("cart-popup");
        if (popup) {
            setTimeout(() => {
                popup.style.transition = "opacity 0.5s ease";
                popup.style.opacity = "0";
                setTimeout(() => popup.remove(), 500);
            }, 2500);
        }
    });
</script>
<?php if (isset($_GET['msg']) && $_GET['msg'] === 'added'): ?>
    <div id="cart-alert" style="
        position: fixed;
        top: 20px;
        right: 20px;
        background-color: #d4edda;
        color: #155724;
        border: 1px solid #c3e6cb;
        padding: 12px 20px;
        border-radius: 5px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.2);
        z-index: 1000;
        transition: opacity 0.5s ease;
    ">
        Item added to cart!
    </div>
    <script>
        setTimeout(() => {
            const alert = document.getElementById("cart-alert");
            if (alert) {
                alert.style.opacity = "0";
                setTimeout(() => alert.remove(), 500);
            }

            // Clean up the URL
            const url = new URL(window.location);
            url.searchParams.delete("msg");
            window.history.replaceState({}, document.title, url.pathname + url.search);
        }, 2500);
    </script>
<?php endif; ?>

</body>
</html>
