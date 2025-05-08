<?php
// Author: Faith Sarnor
// Description: Displays individual product details, ingredients, reviews, and allows new reviews to be submitted.
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

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
$query_reviews = "SELECT reviewer_name, rating, review_text, review_date FROM product_reviews WHERE product_id = :product_id ORDER BY review_date DESC";
$stmt_reviews = $db->prepare($query_reviews);
$stmt_reviews->bindParam(':product_id', $product_id);
$stmt_reviews->execute();
$reviews = $stmt_reviews->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title><?php echo htmlspecialchars($product['name']); ?> | Stellar</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="main.css">
    <style>
        .product-image img {
            max-width: 400px;
            height: auto;
            border-radius: 10px;
        }
        .star-btn {
            border: none;
            background: none;
            cursor: pointer;
            padding: 0;
        }
        .rating-stars i {
            color: #f5a623;
        }
        .rating-stars input[type="radio"] {
            display: none;
        }
        .rating-stars label {
            cursor: pointer;
        }
        .rating-stars label i {
            font-size: 20px;
            color: #ccc;
        }
        .rating-stars input:checked ~ label i,
        .rating-stars label:hover ~ label i,
        .rating-stars label:hover i {
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
            <h1><?php echo htmlspecialchars($product['name']); ?></h1>
            <p>Price: $<?php echo number_format($product['price'], 2); ?></p>
            <p><?php echo htmlspecialchars($product['description']); ?></p>

            <form action="cart_action.php" method="POST">
                <input type="hidden" name="action" value="add">
                <input type="hidden" name="product_id" value="<?php echo $product['product_id']; ?>">
                <input type="hidden" name="quantity" value="1">
                <button type="submit" class="add-to-cart-btn">Add to Cart</button>
            </form>

            <div class="rating-stars">
                <form action="rate_product.php" method="POST">
                    <input type="hidden" name="product_id" value="<?php echo $product['product_id']; ?>">
                    <?php for ($i = 1; $i <= 5; $i++): ?>
                        <button type="submit" name="rating" value="<?php echo $i; ?>" class="star-btn">
                            <i class="<?php echo ($i <= round($product['rating'])) ? 'fas' : 'far'; ?> fa-star"></i>
                        </button>
                    <?php endfor; ?>
                    <span>(<?php echo (int)$product['rating_count']; ?>)</span>
                </form>
            </div>
        </div>
    </div>

    <h2>Key Ingredients</h2>
    <?php if (!empty($ingredients)): ?>
        <ul>
            <?php foreach ($ingredients as $ingredient): ?>
                <li><?php echo htmlspecialchars($ingredient['ingredient_name']); ?></li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p>No ingredients listed for this product.</p>
    <?php endif; ?>

    <h2>Customer Reviews</h2>
    <?php if (!empty($reviews)): ?>
        <?php foreach ($reviews as $review): ?>
            <div class="review">
                <div><strong><?php echo htmlspecialchars($review['reviewer_name']); ?></strong> - 
                    <?php echo str_repeat('★', $review['rating']) . str_repeat('☆', 5 - $review['rating']); ?>
                </div>
                <p><?php echo htmlspecialchars($review['review_text']); ?></p>
                <small><?php echo date('F j, Y', strtotime($review['review_date'])); ?></small>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p>No reviews yet. Be the first to leave a review!</p>
    <?php endif; ?>

    <h2 class="section-title">Leave a Review</h2>
    <form action="submit_review.php" method="POST">
        <input type="hidden" name="product_id" value="<?php echo $product['product_id']; ?>">

        <label for="reviewer_name">Your Name:</label><br>
        <input type="text" name="reviewer_name" required><br><br>

        <label for="rating">Rating:</label><br>
        <div class="rating-stars">
            <?php for ($i = 5; $i >= 1; $i--): ?>
                <input type="radio" name="rating" value="<?php echo $i; ?>" id="star<?php echo $i; ?>">
                <label for="star<?php echo $i; ?>">
                    <i class="fa fa-star"></i>
                </label>
            <?php endfor; ?>
        </div><br>

        <label for="review_text">Review:</label><br>
        <textarea name="review_text" rows="4" required></textarea><br><br>

        <button type="submit">Submit Review</button>
    </form>

    <a href="products.php" style="display:block; margin-top:30px; text-decoration:none; color:#007bff;">&larr; Back to Products</a>
</div>
</body>
</html>

<?php include 'footer.php'; ?>
