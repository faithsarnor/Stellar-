<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Stellar Recommendation Result</title>
  <link rel="stylesheet" href="main.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond&display=swap">
  <style>
    body {
      font-family: 'Cormorant Garamond', serif;
      background-color: #fdfdfd;
      padding: 40px;
      margin: 0;
    }
    h1 {
      text-align: center;
      font-size: 2.5rem;
      margin-bottom: 10px;
    }
    p.description {
      text-align: center;
      font-size: 1.1rem;
      margin-bottom: 40px;
    }
    .routine-container {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      gap: 30px;
    }
    .routine-card {
      width: 260px;
      border: 1px solid #ddd;
      padding: 20px;
      border-radius: 10px;
      text-align: center;
      background-color: #fff;
      transition: box-shadow 0.3s ease;
    }
    .routine-card:hover {
      box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    }
    .routine-card img {
      width: 100%;
      border-radius: 8px;
    }
    .routine-card h3 {
      margin: 10px 0;
      font-size: 1.1rem;
    }
    .routine-card .price {
      color: #333;
      margin: 10px 0;
    }
    .routine-card a.button {
      display: inline-block;
      margin-top: 10px;
      padding: 10px 15px;
      background: #000;
      color: #fff;
      text-decoration: none;
      border-radius: 5px;
    }
  </style>
</head>
<body>

<?php
if (isset($_POST['type']) && isset($_POST['skin']) && isset($_POST['product'])) {
    $type = $_POST['type'];
    $skin_problem = $_POST['skin'];
    $product = $_POST['product'];

    $conn = new mysqli('localhost', 'root', '', 'my_products');
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT recommended_image_url FROM SkinCareRecommendations WHERE type = ? AND skin_problem = ? AND product = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('sss', $type, $skin_problem, $product);
    $stmt->execute();
    $result = $stmt->get_result();

    echo "<h1>Your Skincare Recommendation</h1>";
    echo "<p class='description'>Based on your skin type and concern, here is our top recommended product:</p>";

    if ($result->num_rows > 0) {
        echo "<div class='routine-container'>";
        while ($row = $result->fetch_assoc()) {
            echo "<div class='routine-card'>";
            echo "<img src='" . htmlspecialchars($row['recommended_image_url']) . "' alt='Recommended Product'>";
            echo "<h3>Recommended Product</h3>";
            echo "<a class='button' href='products.php'>Shop Now</a>";
            echo "</div>";
        }
        echo "</div>";
    } else {
        echo "<p style='text-align:center;'>Sorry, we couldn't find a product that matches your selection. Please try again.</p>";
    }

    $stmt->close();
    $conn->close();
} else {
    echo "<p style='text-align:center;'>It looks like you haven't completed the quiz yet.</p>";
}
?>
<form action="recroutine.php" method="POST">
  <input type="hidden" name="type" value="<?php echo htmlspecialchars($type); ?>">
  <input type="hidden" name="skin" value="<?php echo htmlspecialchars($skin_problem); ?>">
  <input type="hidden" name="product" value="<?php echo htmlspecialchars($product); ?>">
  <button type="submit" style="margin-top: 20px; padding: 10px 15px; font-size: 1rem; background: black; color: white; border: none; border-radius: 5px;">See Full Routine</button>
</form>

</body>
</html>
