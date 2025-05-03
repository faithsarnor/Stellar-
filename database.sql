-- Create Database
CREATE DATABASE IF NOT EXISTS my_products;
USE my_products;

-- Create Products Table
<<<<<<< HEAD
CREATE TABLE IF NOT EXISTS products (
=======
CREATE TABLE products (
>>>>>>> 774ec7a0f351b01e2462c2750cf7d3e66a62ef2b
    product_id INT AUTO_INCREMENT PRIMARY KEY,

    name VARCHAR(255) NOT NULL,
    category VARCHAR(100),
    price DECIMAL(10, 2) NOT NULL,
    description TEXT,
    image_url TEXT,
    stock INT NOT NULL DEFAULT 20

    name VARCHAR(255) NOT NULL, -- Product name
    category VARCHAR(100), -- Category of the product
    price DECIMAL(10, 2) NOT NULL, -- Price of the product
    description TEXT, -- Product description (optional, can be updated later)
    image_url TEXT, -- URL of the product image
    stock INT NOT NULL DEFAULT 100 -- Default stock (can change later)

);

-- Insert Products
INSERT INTO products (name, price, category, image_url) VALUES

-- Cleansers
INSERT INTO products (name, price, category, image_url) VALUES

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

-- SkinCare Recommendation Table

('Cetaphil - Gentle Skin Cleanser Face Wash, for Sensitive Skin', 12.00, 'Cleansers', 'img/cetaphil cleanser.jpg'),
('CeraVe Foaming Facial Cleanser', 15.00, 'Cleansers', 'img/cerave foam cleanser.webp'),
('La Roche-Posay Toleriane Purifying Foaming Cleanser', 18.00, 'Cleansers', 'img/Laroche posay toleraine purifying foaming cleanser.jpg'),
('Neutrogena Oil-Free Acne Wash', 16.00, 'Cleansers', 'img/Neutrogena Oil-Free Acne Wash.webp');

-- Moisturizers
INSERT INTO products (name, price, category, image_url) VALUES
('Cetaphil - Moisturizing Cream for Dry to Very Dry Skin', 11.00, 'Moisturizers', 'img/cetaphil moisturizer.jpg'),
('La Roche-Posay - Toleriane Double Repair Face Moisturizer', 25.00, 'Moisturizers', 'img/la roche posay moisturizer.webp'),
('CeraVe - Moisturizing Cream', 15.00, 'Moisturizers', 'img/cerave moisturizer.jpg'),
('Olay - Micro Sculpting Cream', 25.00, 'Moisturizers', 'img/olay moisturizer.jpeg'),
('CeraVe Ultra-Light Moisturizing Gel', 20.00, 'Moisturizers', 'img/Ultra-Light Moisturizing Gel.webp'),
('Cetaphil Gentle Clear Mattifying Acne Moisturzer', 11.00, 'Moisturizers', 'img/Cetaphil Gentle Clear Mattifying Acne Moisturzer.webp'),
('Itk - Prebiotic Gel Moisturizer', 12.00, 'Moisturizers', 'img/itk moisturizer.webp'),
('Sephora Collection Hydrating Cica cream', 20.00, 'Moisturizers', 'img/Sephora Collection Hydrating Cica cream.webp');

-- Toners
INSERT INTO products (name, price, category, image_url) VALUES
('First Aid Beauty - Ultra Repair Wild Oat Hydrating Toner', 24.00, 'Toners', 'img/First aid beauty toner.jpg'),
('Cetaphil - Bright Healthy Radiance Brightness Refresh Toner', 22.00, 'Toners', 'img/Cetaphil toner.webp'),
('Thayers - Rose Petal Toner', 11.00, 'Toners', 'img/thayers toner.jpg'),
('Mario Badescu Aloe Vera Toner', 16.00, 'Toners', 'img/mario badescu toner.webp'),
('Good Molecules Niacinamide Brightening Toner', 14.00, 'Toners', 'img/Good Molecules Niacinamide Brightening Toner.jpg'),
('The Ordinary Glycolic Acid 7% Toning Solution', 13.00, 'Toners', 'img/The Ordinary Glycolic Acid 7% Toning Solution.jpg');

-- Eye Treatments
INSERT INTO products (name, price, category, image_url) VALUES
('CeraVe Eye Repair Cream', 15.00, 'Eye Treatments', 'img/CeraVe Eye Repair Cream.webp'),
('Haruharu Wonder Black Rice Bakuchiol Eye Cream', 10.00, 'Eye Treatments', 'img/HARUHARUWONDERBlackRiceBakuchiolEyeCream_grande.webp'),
('Neutrogena Hydro Boost Eye Gel-Cream', 20.00, 'Eye Treatments', 'img/Neutrogena Hydro Boost Eye Gel-Cream.webp');

-- Treatments and Serums
INSERT INTO products (name, price, category, image_url) VALUES
('The Ordinary Niacinamide 10% + Zinc 1% Serum', 20.00, 'Treatments and Serums', 'img/The Ordinary Niacinamide 10% + Zin 1% Serum.jpg'),
('Differin Adapalene Gel 0.1% Acne Treatment', 15.00, 'Treatments and Serums', 'img/Differin Adapalene Gel 0.1% Acn Treatment.webp'),
('Hero Cosmetics Mighty Patch Original', 12.00, 'Treatments and Serums', 'img/Mighty-Patch-by-Hero.webp');

-- Sunscreens
INSERT INTO products (name, price, category, image_url) VALUES
('Hero Cosmetics Force Shield Superlight Sunscreen SPF 30', 20.00, 'Sunscreens', 'img/Hero Cosmetics Force Shield Superlight Suncreen SPF 30.webp'),
('CeraVe Hydrating Mineral Sunscreen SPF 30', 18.00, 'Sunscreens', 'img/CeraVe Hydrating Mineral Suscreen SPF 30.jpg');

-- Create Recommendations Table

CREATE TABLE SkinCareRecommendations (
    id INT AUTO_INCREMENT PRIMARY KEY,
    type VARCHAR(50) NOT NULL,
    skin_problem VARCHAR(50) NOT NULL,
    product VARCHAR(50) NOT NULL,
    recommended_image_url TEXT NOT NULL
);


-- Insert SkinCare Recommendations
INSERT INTO SkinCareRecommendations (type, skin_problem, product, recommended_image_url) VALUES
-- Acne



-- Sample Inserts
INSERT INTO SkinCareRecommendations (type, skin_problem, product, recommended_image_url) VALUES

-- Acne 


-- Recommendations
INSERT INTO SkinCareRecommendations (type, skin_problem, product, recommended_image_url) VALUES
-- Acne


('Dry', 'Acne', 'Moisturizer', 'https://th.bing.com/th/id/OIP.JOgFRUanurAGcghIhE5qhQHaHa?rs=1&pid=ImgDetMain'),
('Oily', 'Acne', 'Moisturizer', 'https://m.media-amazon.com/images/I/61tAp+18-bL._SL1500_.jpg'),
('Acne', 'Acne', 'Moisturizer', 'https://cdn.nicehair.dk/products/89332/clarifying-oil-free-water-gel-50-ml-1596691014.jpg'),
('Dry', 'Acne', 'Toner', 'https://m.media-amazon.com/images/I/61ktMd4XNtL._SX522_.jpg'),
('Oily', 'Acne', 'Toner', 'https://m.media-amazon.com/images/I/61PbxvE8UcL._SX522_.jpg'),
('Acne', 'Acne', 'Toner', 'https://m.media-amazon.com/images/I/51tRMi-tQaL._SX679_.jpg'),
('Dry', 'Acne', 'Serum', 'https://cdn.shopify.com/s/files/1/2626/0488/products/Untitled-2.jpg?v=1615522495'),
('Oily', 'Acne', 'Serum', 'https://www.bing.com/th?id=OPHS.HoaFHcYsXhnGDA474C474'),
('Acne', 'Acne', 'Serum', 'https://s4.thcdn.com//productimg/1600/1600/13906946-9374975436100654.jpg'),
('Dry', 'Acne', 'Cleanser', 'https://m.media-amazon.com/images/I/617cYpld9UL._SX522_.jpg'),
('Oily', 'Acne', 'Cleanser', 'https://media.ulta.com/i/ulta/2609330?w=1080&h=1080&fmt=auto'),

('Acne', 'Acne', 'Cleanser', 'https://media.ulta.com/i/ulta/2615399?w=1080&h=1080&fmt=auto'),

-- Hyperpigmentation
('Dry', 'Hyperpigmentation', 'Moisturizer', 'https://www.sephora.com/productimages/sku/s2418879-main-zoom.jpg?imwidth=930'),
('Oily', 'Hyperpigmentation', 'Moisturizer', 'https://i.pinimg.com/736x/e9/8e/46/e98e464a8f831c4c7fd1acee0bc80ced.jpg'),
('Dry', 'Hyperpigmentation', 'Toner', 'https://www.cosmetify.com/images/products/cetaphil-healthy-radiance-brightness-refresh-toner-150ml-custom.jpg'),
('Oily', 'Hyperpigmentation', 'Toner', 'https://target.scene7.com/is/image/Target/GUEST_540f802e-0b22-4b0c-ba10-c8b963e6f5f0?wid=800&hei=800&qlt=80&fmt=webp'),
('Dry', 'Hyperpigmentation', 'Serum', 'https://media.ulta.com/i/ulta/2579637?w=800&h=800&fmt=auto'),
('Oily', 'Hyperpigmentation', 'Serum', 'https://www.murad.com/cdn/shop/products/15363-primary__29474.1635812833.1280.1280.png?v=1743737977'),
('Dry', 'Hyperpigmentation', 'Cleanser', 'https://m.media-amazon.com/images/I/51FIhRwRxxL._SX679_.jpg'),
('Oily', 'Hyperpigmentation', 'Cleanser', 'https://m.media-amazon.com/images/I/61Lz0RR3XJL._SX522_.jpg'),

-- Redness
('Dry', 'Redness', 'Moisturizer', 'https://i5.walmartimages.com/asr/0cd31d8c-abac-4182-b103-bc8708e9217c.7346d92fa2d4649d675824a63c9a2640.jpeg'),
('Oily', 'Redness', 'Moisturizer', 'https://m.media-amazon.com/images/I/61i8E2c5QvL._SX679_.jpg'),
('Dry', 'Redness', 'Toner', 'https://media.ulta.com/i/ulta/2539629?w=1080&h=1080&fmt=auto'),
('Oily', 'Redness', 'Toner', 'https://is4.revolveassets.com/images/p4/n/z/TOEI-WU1_V1.jpg'),
('Dry', 'Redness', 'Serum', 'https://www.itcosmetics.com/dw/image/v2/AANG_PRD/on/demandware.static/-/Sites-itcosmetics-master-catalog/default/dw87eb4c86/images/byebye-redness-serum.jpg'),
('Oily', 'Redness', 'Serum', 'https://media.ulta.com/i/ulta/2627243?w=1080&h=1080&fmt=auto'),
('Dry', 'Redness', 'Cleanser', 'https://m.media-amazon.com/images/I/61+rSYzq51L._SX679_.jpg'),

('Oily', 'Redness', 'Cleanser', 'https://media.ulta.com/i/ulta/2157846?w=1080&h=1080&fmt=auto');

-- Grant Permissions
GRANT SELECT, INSERT, DELETE, UPDATE ON my_products.* TO 'root'@'localhost';

('Oily', 'Redness', 'Cleanser', 'https://media.ulta.com/i/ulta/2157846?w=1080&h=1080&fmt=auto'),
('Acne', 'Redness', 'Cleanser', 'https://m.media-amazon.com/images/I/61a9G+1e9KL._SX522_.jpg');

('Dry', 'Acne', 'Moisturizer', 'https://th.bing.com/th/id/OIP.JOgFRUanurAGcghIhE5qhQHaHa?rs=1&pid=ImgDetMain'),
('Oily', 'Acne', 'Moisturizer', 'https://m.media-amazon.com/images/I/61tAp+18-bL._SL1500_.jpg'),
('Acne', 'Acne', 'Moisturizer', 'https://cdn.nicehair.dk/products/89332/clarifying-oil-free-water-gel-50-ml-1596691014.jpg');


-- Add more rows as needed...

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


