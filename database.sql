-- Create Database and Use It
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
    stock INT NOT NULL DEFAULT 20,
    rating DECIMAL(2,1) DEFAULT 0.0,
    rating_count INT DEFAULT 0
);

-- Insert Products - Cleansers
INSERT INTO products (name, price, category, image_url, description) VALUES
('PanOxyl - Acne Forming', 18.00, 'Cleansers', 'img/PanOxyl.jpg', 'Clears acne with 10% benzoyl peroxide.'),
('La Roche-Posay - Hydrating Gentle Face Cleanser', 20.00, 'Cleansers', 'img/La Roche Posay Cleanser.jpg', 'Hydrating cleanser for sensitive skin.'),
('Aveeno - Calm + Restore Nourishing Oat Facial Cleanser', 15.00, 'Cleansers', 'img/Aveeno cleanser.jpg', 'Soothes and calms irritated skin.'),
('Vanicream - Gentle Facial Cleanser', 13.00, 'Cleansers', 'img/Vanicream Cleanser.jpg', 'Free of dyes, fragrance, and parabens.'),
('Cetaphil - Gentle Skin Cleanser Face Wash', 12.00, 'Cleansers', 'img/cetaphil cleanser.jpg', 'Mild, non-irritating formula.'),
('CeraVe Foaming Facial Cleanser', 15.00, 'Cleansers', 'img/cerave foam cleanser.webp', 'Foaming gel for oily skin.'),
('La Roche-Posay Toleriane Purifying Foaming Cleanser', 18.00, 'Cleansers', 'img/Laroche posay toleraine purifying foaming cleanser.jpg', 'Purifies and soothes.'),
('Neutrogena Oil-Free Acne Wash', 16.00, 'Cleansers', 'img/Neutrogena Oil-Free Acne Wash.webp', 'Oil-free acne wash with salicylic acid.');

-- Insert Products - Moisturizers
INSERT INTO products (name, price, category, image_url, description) VALUES
('Cetaphil - Moisturizing Cream for Dry Skin', 11.00, 'Moisturizers', 'img/cetaphil moisturizer.jpg', 'Intense moisture for dry skin.'),
('La Roche-Posay - Toleriane Double Repair Moisturizer', 25.00, 'Moisturizers', 'img/la roche posay moisturizer.webp', 'Restores skin barrier.'),
('CeraVe - Moisturizing Cream', 15.00, 'Moisturizers', 'img/cerave moisturizer.jpg', 'Rich cream with ceramides.'),
('Olay - Micro Sculpting Cream', 25.00, 'Moisturizers', 'img/olay moisturizer.jpeg', 'Anti-aging face moisturizer.'),
('CeraVe Ultra-Light Moisturizing Gel', 20.00, 'Moisturizers', 'img/Ultra-Light Moisturizing Gel.webp', 'Lightweight gel hydration.'),
('Cetaphil Gentle Clear Mattifying Acne Moisturizer', 11.00, 'Moisturizers', 'img/Cetaphil Gentle Clear Mattifying Acne Moisturzer.webp', 'Mattifies and hydrates.'),
('Itk - Prebiotic Gel Moisturizer', 12.00, 'Moisturizers', 'img/ITK gel moisurizer .jpeg', 'With prebiotics for skin balance.'),
('Sephora Collection Hydrating Cica Cream', 20.00, 'Moisturizers', 'img/Sephora Collection Hydrating Cica cream.webp', 'Soothes and hydrates.');

-- Insert Products - Toners
INSERT INTO products (name, price, category, image_url, description) VALUES
('First Aid Beauty - Ultra Repair Oat Hydrating Toner', 24.00, 'Toners', 'img/First aid beauty toner.jpg', 'Oat-based toner for hydration.'),
('Cetaphil - Brightness Refresh Toner', 22.00, 'Toners', 'img/Cetaphil toner.webp', 'Tones and brightens.'),
('Thayers - Rose Petal Toner', 11.00, 'Toners', 'img/thayers toner.jpg', 'Alcohol-free rose toner.'),
('Mario Badescu Aloe Vera Toner', 16.00, 'Toners', 'img/mario badescu toner.webp', 'Aloe-infused calming toner.'),
('Good Molecules Niacinamide Brightening Toner', 14.00, 'Toners', 'img/Good Molecules Niacinamide Brightening Toner.jpg', 'Brightens and refines.'),
('The Ordinary Glycolic Acid 7% Toning Solution', 13.00, 'Toners', 'img/The Ordinary Glycolic Acid 7% Toning Solution.webp', 'Exfoliating glycolic toner.');

-- Insert Products - Eye Treatments & More
INSERT INTO products (name, price, category, image_url, description) VALUES
('CeraVe Eye Repair Cream', 15.00, 'Eye Treatments', 'img/CeraVe Eye Repair Cream.webp', 'Reduces puffiness and dark circles.'),
('Haruharu Wonder Black Rice Eye Cream', 10.00, 'Eye Treatments', 'img/HARUHARUWONDERBlackRiceBakuchiolEyeCream_grande.webp', 'Black rice and bakuchiol formula.'),
('Neutrogena Hydro Boost Eye Gel-Cream', 20.00, 'Eye Treatments', 'img/Neutrogena Hydro Boost Eye Gel-Cream.webp', 'Hydrating gel with hyaluronic acid.'),
('The Ordinary Niacinamide 10% + Zinc 1% Serum', 20.00, 'Treatments and Serums', 'img/The Ordinary Niacinamide 10% + Zinc 1% Serum.webp', 'Controls sebum and brightens.'),
('Differin Adapalene Gel 0.1% Acne Treatment', 15.00, 'Treatments and Serums', 'img/Differin Adapalene Gel 0.1% Acne Treatment.webp', 'Topical retinoid for acne.'),
('Hero Cosmetics Mighty Patch Original', 12.00, 'Treatments and Serums', 'img/Mighty-Patch-by-Hero.webp', 'Hydrocolloid acne patches.'),
('Hero Cosmetics Force Shield SPF 30', 20.00, 'Sunscreens', 'img/Hero Cosmetics Force Shield Superlight Suncreen SPF 30.webp', 'Lightweight mineral sunscreen.'),
('CeraVe Hydrating Mineral Sunscreen SPF 30', 18.00, 'Sunscreens', 'img/CeraVe Hydrating Mineral Suscreen SPF 30.jpg', 'Zinc oxide-based SPF.');

-- Create Ingredients Table
CREATE TABLE IF NOT EXISTS product_ingredients (
    ingredient_id INT AUTO_INCREMENT PRIMARY KEY,
    product_id INT NOT NULL,
    ingredient_name VARCHAR(255) NOT NULL,
    FOREIGN KEY (product_id) REFERENCES products(product_id) ON DELETE CASCADE
);

-- Insert Ingredients (sample for 5 products)
INSERT INTO product_ingredients (product_id, ingredient_name) VALUES
(1, 'Benzoyl Peroxide'), (1, 'Water'), (1, 'Glycerin'), (1, 'Sodium Hydroxide'),
(2, 'Ceramide-3'), (2, 'Glycerin'), (2, 'Niacinamide'), (2, 'La Roche-Posay Prebiotic Thermal Water'),
(3, 'Glycerin'), (3, 'Avena Sativa (Oat) Kernel Flour'), (3, 'Polysorbate 20'), (3, 'Poloxamer 188'),
(3, 'Phenoxyethanol'), (3, 'Chrysanthemum Parthenium (Feverfew) Flower/Leaf/Stem Juice'),
(4, 'Purified Water'), (4, 'Glycerin'), (4, 'Cocamidopropyl Hydoxysultaine'),
(4, 'Sodium Chloride'), (4, 'Sodium Lauroyl Sarcosinate'), (4, 'Sorbitol'),
(4, 'Coco-Glucoside'), (4, 'Glyceryl Oleate'), (4, 'Citric Acid'), (4, 'Sodium Benzoate'),
(5, 'Hydrating glycerin'), (5, 'Panthenol'), (5, 'Niacinamide'), (5, 'Triple acid blend');

-- Create Reviews Table
CREATE TABLE IF NOT EXISTS product_reviews (
    review_id INT AUTO_INCREMENT PRIMARY KEY,
    product_id INT NOT NULL,
    reviewer_name VARCHAR(100),
    rating INT CHECK (rating BETWEEN 1 AND 5),
    review_text TEXT,
    review_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (product_id) REFERENCES products(product_id) ON DELETE CASCADE
);

-- Sample Reviews
INSERT INTO product_reviews (product_id, reviewer_name, rating, review_text) VALUES
(1, 'Faith', 5, 'Absolutely love it! My skin looks so clear!'),
(1, 'Zainab', 4, 'Good but a little drying, use moisturizer after.'),
(1, 'John', 5, 'Cleared up my acne faster than anything else!');
