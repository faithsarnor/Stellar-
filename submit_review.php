<?php
// Connect to the database
include_once 'database.php';

// Check if form was submitted properly
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $product_id = intval($_POST['product_id']);
    $reviewer_name = trim($_POST['reviewer_name']);
    $rating = intval($_POST['rating']);
    $review_text = trim($_POST['review_text']);

    // Basic validation
    if ($product_id > 0 && $rating >= 1 && $rating <= 5 && !empty($reviewer_name) && !empty($review_text)) {
        // Insert review into the database
        $query = "INSERT INTO product_reviews (product_id, reviewer_name, rating, review_text) 
                  VALUES (:product_id, :reviewer_name, :rating, :review_text)";
        $stmt = $db->prepare($query);
        $stmt->bindParam(':product_id', $product_id);
        $stmt->bindParam(':reviewer_name', $reviewer_name);
        $stmt->bindParam(':rating', $rating);
        $stmt->bindParam(':review_text', $review_text);

        if ($stmt->execute()) {
            // Optional: You can update product rating average here too
            header("Location: product_details.php?id=$product_id");
            exit;
        } else {
            echo "Error submitting review. Please try again.";
        }
    } else {
        echo "Please fill out all fields correctly.";
    }
} else {
    echo "Invalid request.";
}
?>
