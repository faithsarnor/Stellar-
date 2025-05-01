<?php
session_start();
include_once 'database.php';
include 'header.php';
// Get category from URL
if (!isset($_GET['category'])) {
    echo "No category selected.";
    exit;
}

$category = $_GET['category'];

// Fetch products from that category
$query = "SELECT * FROM products WHERE category = :category";
$stmt = $db->prepare($query);
$stmt->bindParam(':category', $category);
$stmt->execute();
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title><?php echo htmlspecialchars($category); ?> - Stellar</title>
    <link rel="stylesheet" href="main.css">
    <style>
        /* You can reuse your products page styling */
        body {
            font-family: "Cormorant Garamond", serif;
            background: radial-gradient(circle, rgb(227, 226, 223) 0%, rgb(107, 177, 201) 100%);
            margin: 0;
            padding: 0;
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
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            transition: transform 0.2s ease-in-out;
            display: flex;
            flex-direction: column;
        }
        .product img {
            width: 100%;
            height: auto;
        }
        .product-details {
            padding: 15px;
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
    </style>
</head>
<body>

<h1 style="text-align: center; color: #1d2d44;"><?php echo htmlspecialchars($category); ?></h1>

<div class="product-grid">
    <?php if (!empty($products)): ?>
        <?php foreach ($products as $product): ?>
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
                    <p>Price: $<?php echo number_format($product['price'], 2); ?></p>
                    <p><?php echo htmlspecialchars($product['description']); ?></p>
                </div>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p style="text-align:center;">No products found in this category.</p>
    <?php endif; ?>
</div>

</body>
</html>

<?php include 'footer.php'; ?> 