<?php
include_once 'database.php';

// Prepare and execute a query to fetch all data from the 'products' tabl
$query_table_products = "SELECT * FROM products";
$statement_products = $db->prepare($query_table_products);
$statement_products->execute();
$table_products = $statement_products->fetchAll();

?>











<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Products Page</title>
        <link rel="stylesheet" href="main.css">
        
<style>
    table {
        width: 100%;
        border-collapse: collapse;
        font-family: Arial, sans-serif;
    }

    th {
        text-align: left;
        padding: 10px;
        font-weight: bold;
        color: #004080;
        border-bottom: 2px solid #004080;
    }

    tr {
        cursor: pointer;
        padding: 10px;
        transition: background-color 0.3s ease;
    }

    tr:hover {
        background-color: #cce6ff; /* Light blue hover effect */
    }

    td {
        padding: 10px;
        border: none; /* Removed table lines */
    }

    td img {
        width: 100px;
        height: auto;
        border-radius: 5px;
    }
</style>

        
    </head>
    <body>
        <div class="header">
            <h2>PRODUCTS</h2>
        </div>
        <ul class="head">
            <li><a href="index.html">Stellar</a></li>
            <li><a href="about.html">About Us</a></li>
            <li><a href="faq.html">FAQ</a></li>
            <li class="ai">GlamBot</li>
            <li class="dropdown">
                <button class="drop">Products</button>
                <div class="dropdown-menu">
                    <div class="submenu">
                        <a href="#cleansers">Cleanser</a>
                    </div>
                    <div class="submenu">
                        <a href="#moisturizers">Moisturizer</a>
                    </div>
                    <div class="submenu">
                        <a href="#toners">Toner</a>
                    </div>
                </div>
            </li>
        </ul>







        <table border="1">
   <tr>
     <th>Name</th>
     <th>Category</th>
     <th>Price</th>
     <th>Description</th>
     <th>Image</th>
     <th>Stock</th>
   </tr>
   <!-- Loop through the 'products' table to populate rows -->
   <?php foreach ($table_products as $table_product): ?>
   <tr>
     <td><?php echo htmlspecialchars($table_product['name']); ?></td>
     <td><?php echo htmlspecialchars($table_product['category']); ?></td>
     <td><?php echo htmlspecialchars($table_product['price']); ?></td>
     <td><?php echo htmlspecialchars($table_product['description']); ?></td>
     <td><img src="<?php echo htmlspecialchars($table_product['image_url']); ?>" alt="<?php echo htmlspecialchars($table_product['name']); ?>" style="width: 100px; height: auto;"></td>
     <td><?php echo htmlspecialchars($table_product['stock']); ?></td>
   </tr>
   <?php endforeach; ?>
</table>

    </body>
</html>
