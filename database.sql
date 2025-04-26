-- Database and Products Table Setup
CREATE DATABASE my_products;
USE my_products;

CREATE TABLE products (
    product_id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    category VARCHAR(100),
    price DECIMAL(10, 2) NOT NULL,
    description TEXT,
    image_url TEXT,
    stock INT NOT NULL DEFAULT 20
);

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
('Differin Adapalene Gel 0.1% Acne Treatment', 15.00, 'Treatments and Serums', 'img/Differin Adapalene Gel 0.1% Acn Treatment.webp'),
('Hero Cosmetics Mighty Patch Original', 12.00, 'Treatments and Serums', 'img/Mighty-Patch-by-Hero.webp'),

-- Sunscreens
('Hero Cosmetics Force Shield SPF 30', 20.00, 'Sunscreens', 'img/Hero Cosmetics Force Shield Superlight Suncreen SPF 30.webp'),
('CeraVe Hydrating Mineral Sunscreen SPF 30', 18.00, 'Sunscreens', 'img/CeraVe Hydrating Mineral Suscreen SPF 30.jpg');

-- SkinCare Recommendation Table
CREATE TABLE SkinCareRecommendations (
    id INT AUTO_INCREMENT PRIMARY KEY,
    type VARCHAR(50) NOT NULL,
    skin_problem VARCHAR(50) NOT NULL,
    product VARCHAR(50) NOT NULL,
    recommended_image_url TEXT NOT NULL
);
<<<<<<< HEAD


=======
>>>>>>> 2ebc84b (updated index page)

-- Sample Inserts
INSERT INTO SkinCareRecommendations (type, skin_problem, product, recommended_image_url) VALUES
<<<<<<< HEAD
-- Acne 
('Dry', 'Acne', 'Moisturizer', 'https://th.bing.com/th/id/OIP.JOgFRUanurAGcghIhE5qhQHaHa?rs=1&pid=ImgDetMain'),
('Oily', 'Acne', 'Moisturizer', 'https://m.media-amazon.com/images/I/61tAp+18-bL._SL1500_.jpg'),
('Acne', 'Acne', 'Moisturizer', 'https://cdn.nicehair.dk/products/89332/clarifying-oil-free-water-gel-50-ml-1596691014.jpg'),
('Dry', 'Acne', 'Toner', 'https://m.media-amazon.com/images/I/61ktMd4XNtL._SX522_.jpg'),
('Oily', 'Acne', 'Toner', 'https://m.media-amazon.com/images/I/61PbxvE8UcL._SX522_.jpg'),
('Acne', 'Acne', 'Toner', 'https://m.media-amazon.com/images/I/51tRMi-tQaL._SX679_.jpg'),
('Dry', 'Acne', 'Serum', 'https://cdn.shopify.com/s/files/1/2626/0488/products/Untitled-2.jpg?v=1615522495'),
('Oily', 'Acne', 'Serum', 'https://www.bing.com/th?id=OPHS.HoaFHcYsXhnGDA474C474&o=5&pid=21.1&w=148&h=260&qlt=100&dpr=1.5&bw=6&bc=FFFFFF'),
('Acne', 'Acne', 'Serum', 'https://s4.thcdn.com//productimg/1600/1600/13906946-9374975436100654.jpg'),
('Dry', 'Acne', 'Cleanser', 'https://m.media-amazon.com/images/I/617cYpld9UL._SX522_.jpg'),
('Oily', 'Acne', 'Cleanser', 'https://media.ulta.com/i/ulta/2609330?w=1080&h=1080&fmt=auto'),
('Acne', 'Acne', 'Cleanser', 'https://media.ulta.com/i/ulta/2615399?w=1080&h=1080&fmt=auto'),

-- Hyperpigmentation
('Dry', 'Hyperpigmentation', 'Moisturizer', 'https://www.sephora.com/productimages/sku/s2418879-main-zoom.jpg?imwidth=930'),
('Oily', 'Hyperpigmentation', 'Moisturizer', 'https://i.pinimg.com/736x/e9/8e/46/e98e464a8f831c4c7fd1acee0bc80ced.jpg'),
('Acne', 'Hyperpigmentation', 'Moisturizer', 'https://www.bing.com/th?id=OPHS.O%2fpgdYNVVVDVog474C474&o=5&pid=21.1&w=148&h=260&qlt=100&dpr=1.5&bw=6&bc=FFFFFF'),
('Dry', 'Hyperpigmentation', 'Toner', 'https://www.cosmetify.com/images/products/cetaphil-healthy-radiance-brightness-refresh-toner-150ml-custom.jpg'),
('Oily', 'Hyperpigmentation', 'Toner', 'https://target.scene7.com/is/image/Target/GUEST_540f802e-0b22-4b0c-ba10-c8b963e6f5f0?wid=800&hei=800&qlt=80&fmt=webp'),
('Acne', 'Hyperpigmentation', 'Toner', 'https://media.ulta.com/i/ulta/2551155?w=1080&h=1080&fmt=auto'),
('Dry', 'Hyperpigmentation', 'Serum', 'https://media.ulta.com/i/ulta/2579637?w=800&h=800&fmt=auto'),
('Oily', 'Hyperpigmentation', 'Serum', 'https://www.murad.com/cdn/shop/products/15363-primary__29474.1635812833.1280.1280.png?v=1743737977'),
('Acne', 'Hyperpigmentation', 'Serum', 'https://m.media-amazon.com/images/I/51kKAqJ9t5L._SX522_.jpg'),
('Dry', 'Hyperpigmentation', 'Cleanser', 'https://m.media-amazon.com/images/I/51FIhRwRxxL._SX679_.jpg'),
('Oily', 'Hyperpigmentation', 'Cleanser', 'https://m.media-amazon.com/images/I/61Lz0RR3XJL._SX522_.jpg'),
('Acne', 'Hyperpigmentation', 'Cleanser', 'https://www.murad.com/cdn/shop/files/690352_AHA_BHA_Cleanser_Site_Murad_Carousel_1_Soldier.png?v=1741135810'),
-- Redness
('Dry', 'Redness', 'Moisturizer', 'https://i5.walmartimages.com/asr/0cd31d8c-abac-4182-b103-bc8708e9217c.7346d92fa2d4649d675824a63c9a2640.jpeg'),
('Oily', 'Redness', 'Moisturizer', 'https://m.media-amazon.com/images/I/61i8E2c5QvL._SX679_.jpg'),
('Acne', 'Redness', 'Moisturizer', 'https://m.media-amazon.com/images/I/61NrboQzGeL._SX522_.jpg'),
('Dry', 'Redness', 'Toner', 'https://media.ulta.com/i/ulta/2539629?w=1080&h=1080&fmt=auto'),
('Oily', 'Redness', 'Toner', 'https://is4.revolveassets.com/images/p4/n/z/TOEI-WU1_V1.jpg'),
('Acne', 'Redness', 'Toner', 'https://www.murad.com/cdn/shop/files/ClarifyingToner_Carousel_1_MURAD.png?v=1743045495'),
('Dry', 'Redness', 'Serum', 'https://www.itcosmetics.com/dw/image/v2/AANG_PRD/on/demandware.static/-/Sites-itcosmetics-master-catalog/default/dw87eb4c86/images/byebye-redness-serum.jpg'),
('Oily', 'Redness', 'Serum', 'https://media.ulta.com/i/ulta/2627243?w=1080&h=1080&fmt=auto'),
('Acne', 'Redness', 'Serum', 'https://www.bing.com/th?id=OPHS.ElMjDQqaxJhALw474C474&o=5&pid=21.1&w=148&h=260&qlt=100&dpr=1.5&bw=6&bc=FFFFFF'),
('Dry', 'Redness', 'Cleanser', 'https://m.media-amazon.com/images/I/61+rSYzq51L._SX679_.jpg'),
('Oily', 'Redness', 'Cleanser', 'https://media.ulta.com/i/ulta/2157846?w=1080&h=1080&fmt=auto'),
('Acne', 'Redness', 'Cleanser', 'https://m.media-amazon.com/images/I/61a9G+1e9KL._SX522_.jpg');
=======
('Dry', 'Acne', 'Moisturizer', 'https://th.bing.com/th/id/OIP.JOgFRUanurAGcghIhE5qhQHaHa?rs=1&pid=ImgDetMain'),
('Oily', 'Acne', 'Moisturizer', 'https://m.media-amazon.com/images/I/61tAp+18-bL._SL1500_.jpg'),
('Acne', 'Acne', 'Moisturizer', 'https://cdn.nicehair.dk/products/89332/clarifying-oil-free-water-gel-50-ml-1596691014.jpg');
>>>>>>> 2ebc84b (updated index page)

-- Add more rows as needed...

<<<<<<< HEAD

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
=======
-- Grant Permissions
GRANT SELECT, INSERT, DELETE, UPDATE ON my_products.* TO 'root'@'localhost';
GRANT SELECT ON my_products.products TO 'root'@'localhost';
GRANT SELECT ON my_products.SkinCareRecommendations TO 'root'@'localhost';
>>>>>>> 2ebc84b (updated index page)
