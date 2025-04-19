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
('PanOxyl - Acne Forming', 18.00, 'Cleanser', 'img/PanOxyl.jpg'),
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

CREATE TABLE SkinCareRecommendations (
    id INT AUTO_INCREMENT PRIMARY KEY,
    type VARCHAR(50) NOT NULL,
    skin_problem VARCHAR(50) NOT NULL,
    product VARCHAR(50) NOT NULL,
    recommended_image_url TEXT NOT NULL
);

INSERT INTO SkinCareRecommendations (type, skin_problem, product, recommended_image_url) VALUES
-- Acne 
('Dry', 'Acne', 'Moisturizer', 'https://th.bing.com/th/id/OIP.JOgFRUanurAGcghIhE5qhQHaHa?rs=1&pid=ImgDetMain'),
('Oily', 'Acne', 'Moisturizer', 'https://m.media-amazon.com/images/I/61tAp+18-bL._SL1500_.jpg'),
('Acne', 'Acne', 'Moisturizer', 'https://cdn.nicehair.dk/products/89332/clarifying-oil-free-water-gel-50-ml-1596691014.jpg'),
('Dry', 'Acne', 'Toner', 'https://m.media-amazon.com/images/I/61ktMd4XNtL._SX522_.jpg'),
('Oily', 'Acne', 'Toner', 'https://m.media-amazon.com/images/I/61PbxvE8UcL._SX522_.jpg'),
('Acne', 'Acne', 'Toner', 'https://www.dermstore.com/images?url=https://static.thcdn.com/productimg/original/11429030-288521311698'),
('Dry', 'Acne', 'Serum', 'https://cdn.shopify.com/s/files/1/2626/0488/products/Untitled-2.jpg?v=1615522495'),
('Oily', 'Acne', 'Serum', 'https://www.jeancoutu.com/catalogue-images/455901/viewer-zoom/0/caudalie-vinopure-serum-perfecteur-de-peau-'),
('Acne', 'Acne', 'Serum', 'https://s4.thcdn.com//productimg/1600/1600/13906946-9374975436100654.jpg'),
('Dry', 'Acne', 'Cleanser', 'https://m.media-amazon.com/images/I/617cYpld9UL._SX522_.jpg'),
('Oily', 'Acne', 'Cleanser', 'https://media.ulta.com/i/ulta/2609330?w=1080&h=1080&fmt=auto'),
('Acne', 'Acne', 'Cleanser', 'https://media.ulta.com/i/ulta/2615399?w=1080&h=1080&fmt=auto'),

-- Hyperpigmentation 
('Dry','Hyperpigmentation','Moisturizer', 'https://drgavinsandercoe.com.au/wp-content/uploads/2022/01/SkinCeuticals%C2%AE-Renew-Overnight-Dry-Moisturiser-60mL-1.jpg'),
('Oily','Hyperpigmentation','Moisturizer', 'https://i5.walmartimages.com/seo/CeraVe-Oil-Control-Moisturizing-Gel-Cream-Face-Moisturizer-To-Rebalance-Oily-Skin-3-fl-oz_8d16eacf-567a-4ad7-b079-3835455dd4af.18e3f7b033e0765323b5b280b8089b3e.jpeg?odnHeight=640&odnWidth=640&odnBg=FFFFFF'),
('Acne','Hyperpigmentation','Moisturizer', ''),
('Dry','Hyperpigmentation','Toner', ''),
('Oily','Hyperpigmentation','Toner', ''),
('Acne','Hyperpigmentation','Toner', ''),
('Dry','Hyperpigmentation','Serum', 'https://media.ulta.com/i/ulta/2579637?w=800&h=800&fmt=auto'),
('Oily','Hyperpigmentation','Serum', ''),
('Acne','Hyperpigmentation','Serum', ''),
('Dry','Hyperpigmentation','Cleanser', ''),
('Oily','Hyperpigmentation','Cleanser', ''),
('Acne','Hyperpigmentation','Cleanser', '');

GRANT SELECT, INSERT, DELETE, UPDATE
ON my_products.*
TO root@localhost;

GRANT SELECT
ON my_products.products
TO root@localhost;

GRANT SELECT
ON my_products.SkinCareRecommendations
TO root@localhost;
