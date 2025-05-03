<?php

/* Author: Awo Asieduwaa Afranie-Adjei
Date: 05/02/2025  
Description: Handles star rating submissions for Stellar products. Inserts new rating into reviews table, recalculates the average, and updates product data.  
Attribution: PHP and SQL logic supported with guidance from online resources
*/

include_once 'database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $product_id = intval($_POST['product_id']);
    $rating = intval($_POST['rating']);
    $reviewer_name = 'Anonymous'; // Optional: get from session

    if ($product_id && $rating >= 1 && $rating <= 5) {
        // Insert the review
        $stmt = $db->prepare("INSERT INTO product_reviews (product_id, reviewer_name, rating) VALUES (:product_id, :reviewer_name, :rating)");
        $stmt->bindParam(':product_id', $product_id);
        $stmt->bindParam(':reviewer_name', $reviewer_name);
        $stmt->bindParam(':rating', $rating);
        $stmt->execute();

        // Recalculate new average
        $avg_stmt = $db->prepare("SELECT AVG(rating) AS avg_rating, COUNT(*) AS count FROM product_reviews WHERE product_id = :product_id");
        $avg_stmt->bindParam(':product_id', $product_id);
        $avg_stmt->execute();
        $result = $avg_stmt->fetch(PDO::FETCH_ASSOC);

        $new_avg = round($result['avg_rating'], 2);
        $new_count = $result['count'];

        // Update product table
        $update = $db->prepare("UPDATE products SET rating = :rating, rating_count = :count WHERE product_id = :product_id");
        $update->bindParam(':rating', $new_avg);
        $update->bindParam(':count', $new_count);
        $update->bindParam(':product_id', $product_id);
        $update->execute();
    }

    // Redirect back to the product page
    header("Location: product_details.php?id=$product_id");
    exit;
}
?>
