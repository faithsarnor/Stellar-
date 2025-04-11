
CREATE DATABASE products_page;
USE products_page;

CREATE TABLE products (
    product_id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL, -- Product name
    category VARCHAR(100), -- Category of the product
    price DECIMAL(10, 2) NOT NULL, -- Price of the product
    description TEXT, -- Product description
    image_url TEXT, -- URL of the product image
    stock INT NOT NULL -- Number of items available in stock
);


INSERT INTO products (name, category, price, description, image_url, stock) VALUES
('Hydrating Moisturizer', 'Skincare', 29.99, 'A lightweight moisturizer perfect for dry skin.', 'https://example.com/images/moisturizer.jpg', 50);



