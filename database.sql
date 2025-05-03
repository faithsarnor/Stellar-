-- Create Database
CREATE DATABASE IF NOT EXISTS my_products;
USE my_products;

-- Create Products Table
CREATE TABLE IF NOT EXISTS products (
    product_id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    category VARCHAR(100),
    price DECIMAL(10, 2) NOT NULL,
    description TEXT,
    image_url TEXT,
    stock INT NOT NULL DEFAULT 20
);

-- Insert Products
INSERT INTO products (name, price, category, image_url) VALUES
-- Cleansers
('PanOxyl - Acne Forming', 18.00, 'Cleansers', 'img/PanOxyl.jpg'),
('La Roche-Posay - Hydrating Gentle Face Cleanser', 20.00, 'Cleansers', 'img/La Roche Posay Cleanser.jpg'),
('Aveeno - Calm + Restore Nourishing Oat Facial Cleanser', 15.00, 'Cleansers', 'img/Aveeno cleanser.jpg'),
('Vanicream - Gentle Facial Cleanser', 13.00, 'Cleansers', 'img/Vanicream Cleanser.jpg'),
('Cetaphil - Gentle Skin Cleanser Face Wash', 12.00, 'Cleansers', 'img/cetaphil cleanser.jpg'),
('CeraVe Foaming Facial Cleanser', 15.00, 'Cleansers', 'img/cerave foam cleanser.webp'),
('La Roche-Posay Toleriane Purifying Foaming Cleanser', 18.00, 'Cleansers', 'img/Laroche posay toleraine purifying foaming cleanser.jpg'),
('Neutrogena Oil-Free Acne Wash', 16.00, 'Cleansers', 'img/Neutrogena Oil-Free Acne Wash.webp'),

-- Moisturizers
('Cetaphil - Moisturizing Cream for Dry Skin', 11.00, 'Moisturizers', 'img/cetaphil moisturizer.jpg'),
('La Roche-Posay - Toleriane Double Repair Moisturizer', 25.00, 'Moisturizers', 'img/la roche posay moisturizer.webp'),
('CeraVe - Moisturizing Cream', 15.00, 'Moisturizers', 'img/cerave moisturizer.jpg'),
('Olay - Micro Sculpting Cream', 25.00, 'Moisturizers', 'img/olay moisturizer.jpeg'),
('CeraVe Ultra-Light Moisturizing Gel', 20.00, 'Moisturizers', 'img/Ultra-Light Moisturizing Gel.webp'),
('Cetaphil Gentle Clear Mattifying Acne Moisturizer', 11.00, 'Moisturizers', 'img/Cetaphil Gentle Clear Mattifying Acne Moisturzer.webp'),
('Itk - Prebiotic Gel Moisturizer', 12.00, 'Moisturizers', 'img/cerave moisturizer.jpg'),
('Sephora Collection Hydrating Cica Cream', 20.00, 'Moisturizers', 'img/Sephora Collection Hydrating Cica cream.webp'),

-- Toners
('First Aid Beauty - Ultra Repair Oat Hydrating Toner', 24.00, 'Toners', 'img/First aid beauty toner.jpg'),
('Cetaphil - Brightness Refresh Toner', 22.00, 'Toners', 'img/Cetaphil toner.webp'),
('Thayers - Rose Petal Toner', 11.00, 'Toners', 'img/thayers toner.jpg'),
('Mario Badescu Aloe Vera Toner', 16.00, 'Toners', 'img/mario badescu toner.webp'),
('Good Molecules Niacinamide Brightening Toner', 14.00, 'Toners', 'img/Good Molecules Niacinamide Brightening Toner.jpg'),
('The Ordinary Glycolic Acid 7% Toning Solution', 13.00, 'Toners', 'img/The Ordinary Glycolic Acid 7% Toning Solution.jpeg'),

-- Eye Treatments
('CeraVe Eye Repair Cream', 15.00, 'Eye Treatments', 'img/CeraVe Eye Repair Cream.webp'),
('Haruharu Wonder Black Rice Eye Cream', 10.00, 'Eye Treatments', 'img/HARUHARUWONDERBlackRiceBakuchiolEyeCream_grande.webp'),
('Neutrogena Hydro Boost Eye Gel-Cream', 20.00, 'Eye Treatments', 'img/Neutrogena Hydro Boost Eye Gel-Cream.webp'),

-- Treatments and Serums
('The Ordinary Niacinamide 10% + Zinc 1% Serum', 20.00, 'Treatments and Serums', 'img/The Ordinary Niacinamide 10% + Zin 1% Serum.webp'),
('Differin Adapalene Gel 0.1% Acne Treatment', 15.00, 'Treatments and Serums', 'img/Differin Adapalene Gel 0.1% Acne Treatment.webp'),
('Hero Cosmetics Mighty Patch Original', 12.00, 'Treatments and Serums', 'img/Mighty-Patch-by-Hero.webp'),

-- Sunscreens
('Hero Cosmetics Force Shield SPF 30', 20.00, 'Sunscreens', 'img/Hero Cosmetics Force Shield Superlight Suncreen SPF 30.webp'),
('CeraVe Hydrating Mineral Sunscreen SPF 30', 18.00, 'Sunscreens', 'img/CeraVe Hydrating Mineral Suscreen SPF 30.jpg');

-- Create SkinCareRecommendations Table
CREATE TABLE IF NOT EXISTS SkinCareRecommendations (
    id INT AUTO_INCREMENT PRIMARY KEY,
    type VARCHAR(50) NOT NULL,
    skin_problem VARCHAR(50) NOT NULL,
    product VARCHAR(50) NOT NULL,
    recommended_image_url TEXT NOT NULL
);

-- Insert SkinCare Recommendations (continued)
INSERT INTO SkinCareRecommendations (type, skin_problem, product, recommended_image_url) VALUES

('Dry', 'Redness', 'Toner', 'https://i5.walmartimages.com/asr/4a0f073c-8a6b-4ef3-a515-bd8f148fe13c_1.4c6c44f964e162bb799c7c9dd09c34e2.jpeg'),
('Oily', 'Redness', 'Toner', 'https://cdn.shopify.com/s/files/1/0008/7969/3134/products/beauty-of-joseon-green-plum-refreshing-toner-aha-bha-150ml_1.jpg?v=1670501407'),
('Dry', 'Redness', 'Serum', 'https://m.media-amazon.com/images/I/61C1zZCQqfL._SX522_.jpg'),
('Oily', 'Redness', 'Serum', 'https://m.media-amazon.com/images/I/51cvjj5uMjL._SX522_.jpg'),
('Dry', 'Redness', 'Cleanser', 'https://m.media-amazon.com/images/I/61xMxIGXXkL._SX522_.jpg'),
('Oily', 'Redness', 'Cleanser', 'https://m.media-amazon.com/images/I/61EKSnwEfiL._SX522_.jpg');


-- Grant Permissions
GRANT SELECT, INSERT, DELETE, UPDATE ON my_products.* TO 'root'@'localhost';

-- Continued SkinCare Recommendations
INSERT INTO SkinCareRecommendations (type, skin_problem, product, recommended_image_url) VALUES
('Oily', 'Redness', 'Cleanser', 'https://media.ulta.com/i/ulta/2157846?w=1080&h=1080&fmt=auto'),
('Acne', 'Redness', 'Cleanser', 'https://m.media-amazon.com/images/I/61a9G+1e9KL._SX522_.jpg'),
('Dry', 'Acne', 'Moisturizer', 'https://th.bing.com/th/id/OIP.JOgFRUanurAGcghIhE5qhQHaHa?rs=1&pid=ImgDetMain'),
('Oily', 'Acne', 'Moisturizer', 'https://m.media-amazon.com/images/I/61tAp+18-bL._SL1500_.jpg'),
('Acne', 'Acne', 'Moisturizer', 'https://cdn.nicehair.dk/products/89332/clarifying-oil-free-water-gel-50-ml-1596691014.jpg'),
('Acne', 'Acne', 'Cleanser', 'https://media.ulta.com/i/ulta/2615399?w=1080&h=1080&fmt=auto');


-- Access Permissions (optional for local setup)
GRANT SELECT, INSERT, DELETE, UPDATE ON my_products.* TO root@localhost;
GRANT SELECT ON my_products.products TO root@localhost;
GRANT SELECT ON my_products.SkinCareRecommendations TO root@localhost;

-- Ingredients Table
CREATE TABLE product_ingredients (
    ingredient_id INT AUTO_INCREMENT PRIMARY KEY,
    product_id INT NOT NULL,
    ingredient_name VARCHAR(255) NOT NULL,
    FOREIGN KEY (product_id) REFERENCES products(product_id) ON DELETE CASCADE
);


-- Ingredients for Product ID 1 (PanOxyl Example)
INSERT INTO product_ingredients (product_id, ingredient_name) VALUES
(1, 'Benzoyl Peroxide'),
(1, 'Water'),
(1, 'Glycerin'),
(1, 'Sodium Hydroxide');

-- Reviews Table
CREATE TABLE product_reviews (
    review_id INT AUTO_INCREMENT PRIMARY KEY,
    product_id INT NOT NULL,
    reviewer_name VARCHAR(100),
    rating INT CHECK (rating BETWEEN 1 AND 5),
    review_text TEXT,
    review_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (product_id) REFERENCES products(product_id) ON DELETE CASCADE
);


GRANT SELECT
ON my_products.products
TO root@localhost;

GRANT SELECT
ON my_products.SkinCareRecommendations
TO root@localhost;

-- Grant Permissions
GRANT SELECT, INSERT, DELETE, UPDATE ON my_products.* TO 'root'@'localhost';
GRANT SELECT ON my_products.products TO 'root'@'localhost';
GRANT SELECT ON my_products.SkinCareRecommendations TO 'root'@'localhost';

-- Reviews for Product ID 1
INSERT INTO product_reviews (product_id, reviewer_name, rating, review_text) VALUES
(1, 'Faith', 5, 'Absolutely love it! My skin looks so clear!'),
(1, 'Zainab', 4, 'Good but a little drying, use moisturizer after.'),
(1, 'John', 5, 'Cleared up my acne faster than anything else!');


