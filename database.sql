
CREATE DATABASE my_products;
USE my_products;


CREATE TABLE products (
    product_id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL, -- Product name
    category VARCHAR(100), -- Category of the product
    price DECIMAL(10, 2) NOT NULL, -- Price of the product
    description TEXT, -- Product description
    image_url TEXT, -- URL of the product image
    stock INT NOT NULL -- Number of items available in stock
);



INSERT INTO products (name, price, category, image_url) VALUES
-- Cleansers
('CeraVe - Hydrating Facial Cleanser', 18.00, 'Cleansers', 'img/:images:cerave-cleanser.jpg'),
('La Roche-Posay - Hydrating Gentle Face Cleanser', 20.00, 'Cleansers', 'img/La Roche Posay Cleanser.jpg'),
('Aveeno - Calm + Restore Nourishing Oat Facial Cleanser', 15.00, 'Cleansers', 'img/Aveeno cleanser.jpg'),
('Vanicream - Gentle Facial Cleanser', 13.00, 'Cleansers', 'img/Vanicream Cleanser.jpg'),
('Cetaphil - Gentle Skin Cleanser Face Wash, for Sensitive Skin', 12.00, 'Cleansers', 'img/cetaphil cleanser.jpg'),

-- Moisturizers
('Cetaphil - Moisturizing Cream for Dry to Very Dry Skin', 11.00, 'Moisturizers', 'img/cetaphil moisturizer.jpg'),
('La Roche-Posay - Toleriane Double Repair Face Moisturizer', 25.00, 'Moisturizers', 'img/la roche posay moisturizer.webp'),
('CeraVe - Moisturizing Cream', 15.00, 'Moisturizers', 'img/cerave moisturizer.jpg'),
('Olay - Micro Sculpting Cream', 25.00, 'Moisturizers', 'img/olay moisturizer.jpeg'),
('Itk - Prebiotic Gel Moisturizer', 12.00, 'Moisturizers', 'img/cerave moisturizer.jpg'),

-- Toners
('First Aid Beauty - Ultra Repair Wild Oat Hydrating Toner', 24.00, 'Toners', 'img/First aid beauty toner.jpg'),
('Cetaphil - Bright Healthy Radiance Brightness Refresh Toner', 22.00, 'Toners', 'img/Cetaphil toner.webp'),
('Thayers - Rose Petal Toner', 11.00, 'Toners', 'img/thayers toner.jpg'),
('Mario Badescu Aloe Vera Toner', 16.00, 'Toners', 'img/mario badescu toner.webp');


GRANT SELECT, INSERT, DELETE, UPDATE
ON my_products.*
TO root@localhost;

GRANT SELECT
ON my_products.products
TO root@localhost;
















