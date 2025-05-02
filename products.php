<?php
session_start();
include_once 'database.php';

// Fetch products
$query_table_products = "SELECT product_id, name, category, price, description, image_url, stock FROM products";
$statement_products = $db->prepare($query_table_products);
$statement_products->execute();
$table_products = $statement_products->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Stellar - Products</title>
    <link rel="stylesheet" href="main.css" />
    <script>
        var products = <?php echo json_encode($table_products); ?>;
    </script>
    <script src="java1.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond&display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <style>
        body {
            background: radial-gradient(circle, rgb(227, 226, 223) 0%, rgb(107, 177, 201) 100%);
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-family: "Cormorant Garamond";
            background: lightblue;
            padding: 10px 20px;
        }
        .header .fix a {
            text-decoration: none;
            color: #926f34;
            font-size: 60px;
        }
        .head {
            padding: 0;
            margin: 0;
            list-style: none;
            display: flex;
            align-items: center;
        }
        .head li {
            margin-right: 20px;
        }
        .head a {
            text-decoration: none;
            color: #1d2d44;
            font-size: 20px;
        }
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
            display: flex;
            flex-direction: column;
        }
        .product:hover {
            transform: translateY(-5px);
        }
        .product img {
            width: 100%;
            height: auto;
        }
        .product-details {
            padding: 15px;
            display: flex;
            flex-direction: column;
            flex-grow: 1;
        }
        .product h3 {
            margin-top: 0;
            font-size: 1.2em;
            margin-bottom: 8px;
        }
        .product p {
            margin-bottom: 10px;
            color: #555;
        }
        .add-to-cart-btn {
            background-color: #007bff;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1em;
            transition: background-color 0.3s ease;
            width: 100%;
            box-sizing: border-box;
            margin-top: 10px;
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
            font-size: 1em;
        }
        .cart-message {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 4px;
            max-width: 1200px;
            margin: 0 auto;
        }
        main {
            padding-bottom: 20px;
        }
        .footer {
            background-color: #1d2d44;
            color: white;
            text-align: center;
            padding: 20px 0;
        }
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
            <a href="#" class="icon"><i class="fas fa-search"></i></a>
            <a href="Log/indi.html" class="icon"><i class="fas fa-user"></i></a>
            <a href="cart.php" class="icon"><i class="fas fa-shopping-bag"></i></a>
        </div>
    </div>

    <main>
        <h1 style="color: #1d2d44; text-align: center;">Our Products</h1>

        <?php if (isset($_SESSION['cart_message'])): ?>
            <div class="cart-message">
                <?php echo htmlspecialchars($_SESSION['cart_message']); ?>
            </div>
            <?php unset($_SESSION['cart_message']); ?>
        <?php endif; ?>

        <div class="product-grid">
            <?php if (!empty($table_products)): ?>
                <?php foreach ($table_products as $product): ?>
                    <div class="product">
                        <a href="product_details.php?id=<?php echo $product['product_id']; ?>">
                            <img src="<?php echo htmlspecialchars($product['image_url']); ?>" alt="<?php echo htmlspecialchars($product['name']); ?>">
                        </a>
                        <div class="product-details">
                            <h3>
                                <a href="product_details.php?id=<?php echo $product['product_id']; ?>" style="text-decoration: none; color: inherit;">
                                    <?php echo htmlspecialchars($product['name']); ?>
                                </a>
                            </h3>
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

    <footer class="footer">
        <span>Feedback</span>  
        <span>Contact Us</span>  
        <span>Customer Support</span>
    </footer>
</body>
</html>
