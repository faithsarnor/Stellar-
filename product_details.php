<?php
// database.php connection assumed
include_once 'database.php';
include 'header.php';
// Get product ID from URL
if (!isset($_GET['id'])) {
    echo "No product selected.";
    exit;
}

$product_id = intval($_GET['id']);

// Fetch product
$query_product = "SELECT * FROM products WHERE product_id = :product_id";
$stmt_product = $db->prepare($query_product);
$stmt_product->bindParam(':product_id', $product_id);
$stmt_product->execute();
$product = $stmt_product->fetch(PDO::FETCH_ASSOC);

if (!$product) {
    echo "Product not found.";
    exit;
}

// Fetch ingredients
$query_ingredients = "SELECT ingredient_name FROM product_ingredients WHERE product_id = :product_id";
$stmt_ingredients = $db->prepare($query_ingredients);
$stmt_ingredients->bindParam(':product_id', $product_id);
$stmt_ingredients->execute();
$ingredients = $stmt_ingredients->fetchAll(PDO::FETCH_ASSOC);

// Fetch reviews
$query_reviews = "SELECT reviewer_name, rating, review_text, review_date FROM product_reviews WHERE product_id = :product_id";
$stmt_reviews = $db->prepare($query_reviews);
$stmt_reviews->bindParam(':product_id', $product_id);
$stmt_reviews->execute();
$reviews = $stmt_reviews->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title><?php echo htmlspecialchars($product['name']); ?> | Stellar</title>
    <link rel="stylesheet" href="main.css">
    <style>
        body {
            font-family: "Cormorant Garamond", serif;
            margin: 0;
            padding: 0;
            background: radial-gradient(circle, rgb(227, 226, 223) 0%, rgb(107, 177, 201) 100%);
        }
        .container {
            max-width: 1200px;
            margin: 50px auto;
            padding: 20px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
        }
        .product-top {
            display: flex;
            flex-wrap: wrap;
        }
        .product-image {
            flex: 1;
            min-width: 300px;
            padding: 20px;
        }
        .product-details {
            flex: 2;
            padding: 20px;
        }
        .product-image img {
            width: 100%;
            border-radius: 10px;
        }
        .product-name {
            font-size: 32px;
            color: #1d2d44;
            margin-bottom: 10px;
        }
        .product-price {
            font-size: 24px;
            margin-bottom: 20px;
            color: #1d2d44;
        }
        .section-title {
            margin-top: 40px;
            font-size: 28px;
            border-bottom: 2px solid #eee;
            padding-bottom: 10px;
            color: #1d2d44;
        }
        ul {
            padding-left: 20px;
        }
        .review {
            border-bottom: 1px solid #eee;
            padding: 10px 0;
        }
        .review-name {
            font-weight: bold;
        }
        .rating {
            color: #f5a623;
        }
    </style>
</head>

<body>
<div class="container">
    <div class="product-top">
        <div class="product-image">
            <img src="<?php echo htmlspecialchars($product['image_url']); ?>" alt="<?php echo htmlspecialchars($product['name']); ?>">
        </div>
        <div class="product-details">
            <h1 class="product-name"><?php echo htmlspecialchars($product['name']); ?></h1>
            <p class="product-price">$<?php echo number_format($product['price'], 2); ?></p>
            <p><?php echo htmlspecialchars($product['description']); ?></p>
        </div>
    </div>

    <h2 class="section-title">Key Ingredients</h2>
    <?php if (!empty($ingredients)): ?>
        <ul>
            <?php foreach ($ingredients as $ingredient): ?>
                <li><?php echo htmlspecialchars($ingredient['ingredient_name']); ?></li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p>No ingredients listed for this product.</p>
    <?php endif; ?>

    <h2 class="section-title">Customer Reviews</h2>
    <?php if (!empty($reviews)): ?>
        <?php foreach ($reviews as $review): ?>
            <div class="review">
                <div class="review-name"><?php echo htmlspecialchars($review['reviewer_name']); ?> <span class="rating"><?php echo str_repeat('★', $review['rating']); ?></span></div>
                <div class="review-text"><?php echo htmlspecialchars($review['review_text']); ?></div>
                <small><?php echo date('F j, Y', strtotime($review['review_date'])); ?></small>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p>No reviews yet. Be the first to leave a review!</p>
    <?php endif; ?>

    <a href="products.php" style="display:block; margin-top:30px; text-decoration:none; color:#007bff;">← Back to Products</a>
</div>
</body>
</html>

<?php include 'footer.php'; ?> 