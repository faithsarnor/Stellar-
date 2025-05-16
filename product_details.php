<?php
/*
Author: Faith Sarnor
Modified by: Awo Asieduwaa Afranie-Adjei, 05/02/2025
Description: Product details page for Stellar. Shows product info, ingredients, ratings, and user reviews. Users can rate using interactive stars and submit written reviews.
Attribution: Font Awesome used for icons, Google Fonts for typography. Rating system adapted with ChatGPT guidance.
*/

include_once 'database.php';
include 'header.php';

if (!isset($_GET['id'])) {
    echo "No product selected.";
    exit;
}

$product_id = intval($_GET['id']);

$query_product = "SELECT * FROM products WHERE product_id = :product_id";
$stmt_product = $db->prepare($query_product);
$stmt_product->bindParam(':product_id', $product_id);
$stmt_product->execute();
$product = $stmt_product->fetch(PDO::FETCH_ASSOC);

if (!$product) {
    echo "Product not found.";
    exit;
}

$query_ingredients = "SELECT ingredient_name FROM product_ingredients WHERE product_id = :product_id";
$stmt_ingredients = $db->prepare($query_ingredients);
$stmt_ingredients->bindParam(':product_id', $product_id);
$stmt_ingredients->execute();
$ingredients = $stmt_ingredients->fetchAll(PDO::FETCH_ASSOC);

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
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        body {
            font-family: "Cormorant Garamond", serif;
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
        }
        .rating-stars {
            margin-top: 10px;
            color: #f5a623;
        }
        .section-title {
            font-size: 28px;
            margin-top: 40px;
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
            display: flex;
            justify-content: space-between;
            align-items: center;
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
        .rating-stars label:hover i,
        .rating-stars label:hover ~ label i {
            color: #f5a623;
        }
        .review .fas.fa-star, .review .far.fa-star {
            color: #f5a623;
        }
        form.review-form {
            background-color: #f9f9f9;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0,0,0,0.05);
        }
        form.review-form input,
        form.review-form textarea {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            margin-bottom: 15px;
        }
        form.review-form button {
            background-color: #1d2d44;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        form.review-form button:hover {
            background-color: #16324f;
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

            <div class="rating-stars">
                <?php
                $averageRating = round($product['rating']);
                for ($i = 1; $i <= 5; $i++) {
                    echo ($i <= $averageRating)
                        ? '<i class="fas fa-star"></i>'
                        : '<i class="far fa-star"></i>';
                }
                ?>
                <span>(<?php echo (int) $product['rating_count']; ?> reviews)</span>
            </div>
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
                <div class="review-name">
                    <span><?php echo htmlspecialchars($review['reviewer_name']); ?></span>
                    <span>
                    <?php
                    for ($i = 1; $i <= 5; $i++) {
                        echo ($i <= $review['rating'])
                            ? '<i class="fas fa-star"></i>'
                            : '<i class="far fa-star"></i>';
                    }
                    ?>
                    </span>
                </div>
                <div class="review-text"><?php echo htmlspecialchars($review['review_text']); ?></div>
                <small><?php echo date('F j, Y', strtotime($review['review_date'])); ?></small>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p>No reviews yet. Be the first to leave a review!</p>
    <?php endif; ?>

    <!-- Styled Review Form -->
    <h2 class="section-title">Leave a Review</h2>
    <form class="review-form" action="submit_review.php" method="POST">
        <input type="hidden" name="product_id" value="<?php echo $product['product_id']; ?>">

        <label for="reviewer_name">Your Name</label>
        <input type="text" name="reviewer_name" required>

        <label for="review_text">Your Review</label>
        <textarea name="review_text" rows="4" required></textarea>

        <label>Rate this product</label>
        <div class="star-rating" style="font-size: 24px; margin-bottom: 15px;">
            <?php for ($i = 1; $i <= 5; $i++): ?>
                <label>
                    <input type="radio" name="rating" value="<?php echo $i; ?>" style="display: none;">
                    <i class="far fa-star" style="cursor: pointer;"></i>
                </label>
            <?php endfor; ?>
        </div>

        <button type="submit">Submit Review</button>
    </form>

    <script>
        const labels = document.querySelectorAll('.star-rating label');
        labels.forEach((label, idx) => {
            const star = label.querySelector('i');
            label.addEventListener('click', () => {
                labels.forEach((l, i) => {
                    const icon = l.querySelector('i');
                    icon.className = i <= idx ? 'fas fa-star' : 'far fa-star';
                });
                label.querySelector('input').checked = true;
            });

            label.addEventListener('mouseover', () => {
                labels.forEach((l, i) => {
                    const icon = l.querySelector('i');
                    icon.className = i <= idx ? 'fas fa-star' : 'far fa-star';
                });
            });

            label.addEventListener('mouseout', () => {
                const checked = document.querySelector('.star-rating input:checked');
                const checkedIndex = Array.from(labels).findIndex(l => l.querySelector('input') === checked);
                labels.forEach((l, i) => {
                    const icon = l.querySelector('i');
                    icon.className = i <= checkedIndex ? 'fas fa-star' : 'far fa-star';
                });
            });
        });
    </script>

    <a href="products.php" style="display:block; margin-top:30px; text-decoration:none; color:#007bff;">&larr; Back to Products</a>
</div>
</body>
</html>

<?php include 'footer.php'; ?>
