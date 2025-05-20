<?php
/* Author: Awo Asieduwaa Afranie-Adjei
Date: 05/02/2025  
Description: Handles user rating and review submission. Saves rating and review to product_reviews table, recalculates average rating, and updates the products table.  
Attribution: Built using PHP + SQL, logic improved with ChatGPT guidance.
*/

include_once 'database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $product_id = intval($_POST['product_id']);
    $reviewer_name = trim($_POST['reviewer_name']);
    $review_text = trim($_POST['review_text']);
    $rating = intval($_POST['rating']);

    if ($product_id && $rating >= 1 && $rating <= 5 && $reviewer_name && $review_text) {
        // 1. Insert review into product_reviews
        $stmt = $db->prepare("INSERT INTO product_reviews (product_id, reviewer_name, rating, review_text) VALUES (:product_id, :reviewer_name, :rating, :review_text)");
        $stmt->bindParam(':product_id', $product_id);
        $stmt->bindParam(':reviewer_name', $reviewer_name);
        $stmt->bindParam(':rating', $rating);
        $stmt->bindParam(':review_text', $review_text);
        $stmt->execute();

        // 2. Calculate new average rating
        $avg_stmt = $db->prepare("SELECT AVG(rating) AS avg_rating, COUNT(*) AS count FROM product_reviews WHERE product_id = :product_id");
        $avg_stmt->bindParam(':product_id', $product_id);
        $avg_stmt->execute();
        $result = $avg_stmt->fetch(PDO::FETCH_ASSOC);

        $new_avg = round($result['avg_rating'], 2);
        $new_count = $result['count'];

        // 3. Update products table
        $update = $db->prepare("UPDATE products SET rating = :rating, rating_count = :rating_count WHERE product_id = :product_id");
        $update->bindParam(':rating', $new_avg);
        $update->bindParam(':rating_count', $new_count);
        $update->bindParam(':product_id', $product_id);
        $update->execute();
    }

    header("Location: product_details.php?id=$product_id");
    exit;
}
?>
