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
('La Roche-Posay Effaclar Medicated Gel Cleanser', 18.00, 'Cleansers', 'https://media.ulta.com/i/ulta/2609330?w=1080&h=1080&fmt=auto'),
('EltaMD Skin Recovery Amino Acid Foaming Facial Cleanser', 28.00, 'Cleansers', 'https://m.media-amazon.com/images/I/617cYpld9UL._SX522_.jpg');



-- Moisturizers
INSERT INTO products (name, price, category, image_url) VALUES
('Cetaphil - Moisturizing Cream for Dry Skin', 11.00, 'Moisturizers', 'img/cetaphil moisturizer.jpg'),
('La Roche-Posay - Toleriane Double Repair Moisturizer', 25.00, 'Moisturizers', 'img/la roche posay moisturizer.webp'),
('CeraVe - Moisturizing Cream', 15.00, 'Moisturizers', 'img/cerave moisturizer.jpg'),
('Olay - Micro Sculpting Cream', 25.00, 'Moisturizers', 'img/Olay cream.jpeg'),
('CeraVe Ultra-Light Moisturizing Gel', 20.00, 'Moisturizers', 'img/Ultra-Light Moisturizing Gel.webp'),
('Cetaphil Gentle Clear Mattifying Acne Moisturizer', 11.00, 'Moisturizers', 'img/Cetaphil Gentle Clear Mattifying Acne Moisturzer.webp'),
('Itk - Prebiotic Gel Moisturizer', 12.00, 'Moisturizers', 'img/ITK gel moisurizer .jpeg'),
('Sephora Collection Hydrating Cica Cream', 20.00, 'Moisturizers', 'img/Sephora Collection Hydrating Cica cream.webp'),
('Murad Clarifying Oil Free Water Gel', 50.00, 'Moisturizers', 'https://cdn.nicehair.dk/products/89332/clarifying-oil-free-water-gel-50-ml-1596691014.jpg');



-- Toners
INSERT INTO products (name, price, category, image_url) VALUES
('First Aid Beauty - Ultra Repair Oat Hydrating Toner', 24.00, 'Toners', 'img/First aid beauty toner.jpg'),
('Cetaphil - Brightness Refresh Toner', 22.00, 'Toners', 'img/Cetaphil toner.webp'),
('Thayers - Rose Petal Toner', 11.00, 'Toners', 'img/thayers toner.jpg'),
('Mario Badescu Aloe Vera Toner', 16.00, 'Toners', 'img/mario badescu toner.webp'),
('Good Molecules Niacinamide Brightening Toner', 14.00, 'Toners', 'img/Good Molecules Niacinamide Brightening Toner.jpg'),
('SOS Daily Rescue Facial Spray with Hypochlorous Acid', 28.00, 'Toners', 'img/SOS Daily Rescue Facial Spray.webp'),
('Watermelon Pink Juice Oil-Free Moisturizer - Glow Recipe', 15.00, 'Toners', 'img/Watermelon Pink Juice Oil-Free Moisturizer - Glow Recipe | Sephora.webp'),
('Paulas Choice Skin Balancing Pore Reducing Toner', 23.20, 'Toners', 'https://m.media-amazon.com/images/I/61PbxvE8UcL._SX522_.jpg'),
('Paulas Choice Skin Recovery Enriched Calming Toner', 29.00, 'Toners', 'https://m.media-amazon.com/images/I/61ktMd4XNtL._SX522_.jpg');


-- Eye Treatments

INSERT INTO products (name, price, category, image_url) VALUES

('CeraVe Eye Repair Cream', 15.00, 'Eye Treatments', 'img/CeraVe Eye Repair Cream.webp'),
('Haruharu Wonder Black Rice Eye Cream', 10.00, 'Eye Treatments', 'img/HARUHARUWONDERBlackRiceBakuchiolEyeCream_grande.webp'),
('Neutrogena Hydro Boost Eye Gel-Cream', 20.00, 'Eye Treatments', 'img/Neutrogena Hydro Boost Eye Gel-Cream.webp');

-- Treatments and Serums

INSERT INTO products (name, price, category, image_url) VALUES
('Niacinamide Serum 12% Plus Zinc 2%', 17.00, 'Treatments and Serums', 'img/shopping (1).webp'),
('Hero Cosmetics Mighty Patch Original', 12.00, 'Treatments and Serums', 'img/Mighty-Patch-by-Hero.webp'),
('CeraVe Resurfacing Retinol Serum', 20.00, 'Treatments and Serums', 'https://s4.thcdn.com//productimg/1600/1600/13906946-9374975436100654.jpg'),
('Caudalie Vinopure Pore Minimizing Sali', 50.00, 'Treatments and Serums', 'img/Caudalie Vinopure Pore Minimizing Sali.avif'),
('Niacinamide 10% + Zinc 1%', 20.00, 'Treatments and Serums', 'https://cdn.shopify.com/s/files/1/2626/0488/products/Untitled-2.jpg?v=1615522495');


INSERT INTO products (name, price, category, image_url) VALUES
('Kiehls Since 1851 Clearly Corrective Dark Spot Solution -0.5 oz', 35.00, 'Treatments and Serums', 'img/kiehls serum.webp'),
('Neutrogena Rapid Wrinkle Repair Retinol Face Moisturizer Cream with Hyaluronic Acid - Fragrance Free - 1.7 oz', 30.00, 'Treatments and Serums', 'img/neutrogena rapid wrinkle repair.jpeg'),
('Niacinamide Serum 12% Plus Zinc 2%', 17.00, 'Treatments and Serums', 'img/shopping (1).webp'),
('CeraVe Skin Renewing Retinol Serum', 23.00, 'Treatments and Serums', 'img/CeraVe Skin Renewing Retinol Serum.webp'),
('Hero Cosmetics Mighty Patch Original', 12.00, 'Treatments and Serums', 'img/Mighty-Patch-by-Hero.webp');


-- Sunscreens
INSERT INTO products (name, price, category, image_url) VALUES
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

-- Recommendations
-- Acne
INSERT INTO SkinCareRecommendations (type, skin_problem, product, recommended_image_url) VALUES
('Dry', 'Acne', 'Moisturizer', 'https://th.bing.com/th/id/OIP.JOgFRUanurAGcghIhE5qhQHaHa?rs=1&pid=ImgDetMain'),
('Oily', 'Acne', 'Moisturizer', 'https://m.media-amazon.com/images/I/61tAp+18-bL._SL1500_.jpg'),
('Acne', 'Acne', 'Moisturizer', 'https://cdn.nicehair.dk/products/89332/clarifying-oil-free-water-gel-50-ml-1596691014.jpg'),
('Dry', 'Acne', 'Toner', 'https://m.media-amazon.com/images/I/61ktMd4XNtL._SX522_.jpg'),
('Oily', 'Acne', 'Toner', 'https://m.media-amazon.com/images/I/61PbxvE8UcL._SX522_.jpg'),
('Acne', 'Acne', 'Toner', 'https://m.media-amazon.com/images/I/51tRMi-tQaL._SX679_.jpg'),
('Oily', 'Acne', 'Serum', 'https://www.bing.com/th?id=OPHS.HoaFHcYsXhnGDA474C474'),
('Acne', 'Acne', 'Serum', 'https://s4.thcdn.com//productimg/1600/1600/13906946-9374975436100654.jpg'),
('Dry', 'Acne', 'Cleanser', 'https://m.media-amazon.com/images/I/617cYpld9UL._SX522_.jpg'),
('Oily', 'Acne', 'Cleanser', 'https://media.ulta.com/i/ulta/2609330?w=1080&h=1080&fmt=auto'),
('Acne', 'Acne', 'Cleanser', 'https://media.ulta.com/i/ulta/2615399?w=1080&h=1080&fmt=auto');
-- Hyperpigmentation
INSERT INTO SkinCareRecommendations (type, skin_problem, product, recommended_image_url) VALUES
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
('Acne', 'Hyperpigmentation', 'Cleanser', 'https://www.murad.com/cdn/shop/files/690352_AHA_BHA_Cleanser_Site_Murad_Carousel_1_Soldier.png?v=1741135810');
-- Redness
INSERT INTO SkinCareRecommendations (type, skin_problem, product, recommended_image_url) VALUES
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



-- Create Ingredients Table
CREATE TABLE product_ingredients (
    ingredient_id INT AUTO_INCREMENT PRIMARY KEY,
    product_id INT NOT NULL,
    ingredient_name VARCHAR(255) NOT NULL,
    FOREIGN KEY (product_id) REFERENCES products(product_id) ON DELETE CASCADE
);

-- Ingredients for Product ID 1 (PanOxyl Example)
INSERT INTO product_ingredients (product_id, ingredient_name) VALUES
(1, 'Benzoyl Peroxide'), (1, 'Water'), (1, 'Glycerin'), (1, 'Sodium Hydroxide'),
(2, 'Ceramide-3'), (2, 'Glycerin'), (2, 'Niacinamide'), (2, 'La Roche-Posay Prebiotic Thermal Water'),
(3, 'Glycerin'), (3, 'Avena Sativa (Oat) Kernel Flour'), (3, 'Polysorbate 20'), (3, 'Poloxamer 188'), (3, 'Phenoxyethanol'), (3, 'Chrysanthemum Parthenium (Feverfew) Flower/Leaf/Stem Juice'),
(4, 'Purified Water'), (4, 'Glycerin'), (4, 'Cocamidopropyl Hydoxysultaine'), (4, 'Sodium Chloride'), (4, 'Sodium Lauroyl Sarcosinate'), (4, 'Sorbitol'), (4, 'Coco-Glucoside'), (4,'Glyceryl Oleate'), (4,'Citric Acid'), (4,'Sodium Benzoate'),
(5, 'Hydrating glycerin'), (5, 'Panthenol'), (5, 'Niacinamide'), (5, 'Triple acid blend'),
(6, 'Hyaluronic acid'), (6, 'Ceramides'), (6, 'Squalane'), (6, 'Triglycerides'), (6, 'Niacinamide'),
(7, 'La Roche-Posay Prebiotic Thermal Water'), (7,'Glycerin'), (7, 'Coco-Betaine'), (7, 'Propylene Glycol'), (7, 'Sodium Cocoyl Glycinate'),
(7, 'Citric Acid'), (7,'Niacinamide'),
(8, 'Salicylic Acid (2%)'), (8, 'Water'), (8,'Sodium Chloride'), (8, 'Benzalkonium Chloride'),
(9, 'Propylene Glycol'), (9,'Light Mineral Oil'), (9, 'Glycerin'), (9, 'Sodium Hydroxide'), (9, 'Purified Water'),
(10, 'Ceramide-3'), (10, 'Niacinamide'), (10, 'Glycerin'), (10, 'Thermal Water'),
(11, 'Essential ceramides'), (11,'Hyaluronic acid'), (11, 'Petrolatum'), (11, 'Vitamin E'), (11, 'Aloe vera'), (11, 'Avocado Oil'),
(12, 'Niacinamide'), (12, 'Glycerin'), (12, 'Palmitoyl Pentapeptide-4'), (12, 'Sodium PEG-7'), (12, 'Olive oil carboxylate'), (12, 'Peucedanum Graveolens (Dill) Extract'),
(13, 'Ceramides'), (13,'Niacinamide'), (13, 'Hyaluronic acid'), (13, 'MVE Technology'),
(14, 'Salicylic Acid (0.5%)'), (14, 'Bisabolol'), (14, 'Kojic Acid'), (14, 'Licorice Root Extract'), (14, 'Zinc Gluconate'),
(15, 'Glycerin'), (15, 'Niacinamide'), (15, 'Sodium Hyaluronate'), (15, 'Phenoxyethanol'), (15,'Potassium Sorbate'), (15, 'Glucose'),
(16, 'Water'), (16, 'Glycerin'), (16, 'Butyrospermum Parkii (Shea Butter)'), (16, 'Panthenol'), (16, 'Centella Asiatica Extract'),
(17, 'Collodial Oatmeal'), (17, 'Hyaluronic Acid'), (17, 'Squalane'), (17, 'Glycerin'), (17, 'Proplis Extract'), 
(18, 'Water'), (18, 'Butylene Glycol'), (18, 'Niacinamide'), (18, 'Glycerin'), (18, 'Citric Acid'), (18, 'Pancratium Maritimum Extract'), (18, 'Hydrolyzed Cicer Seed Extract'),
(19, 'Purified Water'), (19, 'Witch Hazel'), (19, 'Aloe Barbadensis Leaf Juice'), (19, 'Glycerin'), (19, 'Citric Acid'), (19, 'Caprylyl Glycol'), (19, 'Fragrance (Natural Rose)'),
(20, 'Aqua (Water)'), (20, 'Aloe Barbadensis Leaf Juice'), (20, 'Sodium Chloride'), (20, 'Methylparaben'), (20, 'CI 19140 (Yellow 5)'), (20, 'CI 42090 (Blue 1)'),
(21, 'Water'), (21, 'Glycerin'), (21, 'Niacinamide'), (21, '1,2-Hexanediol'), (21, 'Arbutin'), (21, 'Propanediol'), (21, 'Betaine'), (21, 'Sodium Hyaluronate'), (21, 'Licorice Root Extract'), (21, 'Ethylhexylglycerin'), (21, 'Carbomer'), (21, 'Tromethamine'), (21, 'Trisodium Ethylenediamine Disuccinate'), (21, 'Dextrin'),
(22, 'Electrolyzed Water'), (22, 'Sodium Chloride'), (22, 'Hypochlorous Acid'),
(23, 'Purified Water'), 
(23, 'Niacinamide'), 
(23, 'Cetyl Alcohol'), 
(23, 'Caprylic/Capric Triglyceride'), 
(23, 'Glycerin'), 
(23, 'Propanediol'), 
(23, 'Isononyl Isononanoate'), 
(23, 'Jojoba Esters'), 
(23, 'PEG-20 Methyl Glucose Sesquistearate'), 
(23, 'Cetearyl Alcohol'), 
(23, 'Dimethicone'), 
(23, 'Methyl Glucose Sesquistearate'), 
(23, 'Ceramide 3'), 
(23, 'Ceramide 6-II'), 
(23, 'Ceramide 1'), 
(23, 'Hyaluronic Acid'), 
(23, 'Zinc Citrate'), 
(23, 'Prunus Amygdalus Dulcis (Almond) Oil'), 
(23, 'Aloe Barbadensis Leaf Juice'), 
(23, 'Chrysanthellum Indicum Extract'), 
(23, 'Tocopherol'), 
(23, 'Equisetum Arvense Extract'), 
(23, 'Asparagopsis Armata Extract'), 
(23, 'Ascophyllum Nodosum Extract'), 
(23, 'Phenoxyethanol'), 
(23, 'Carbomer'), 
(23, 'Behentrimonium Methosulfate'), 
(23, 'Sorbitol'), 
(23, 'Triethanolamine'), 
(23, 'Laureth-4'), 
(23, 'Butylene Glycol'), 
(23, 'Hydrogenated Vegetable Oil'), 
(23, 'Tetrasodium EDTA'), 
(23, 'Ethylhexylglycerin'), 
(23, 'Sodium Lauroyl Lactylate'), 
(23, 'Sodium Hydroxide'), 
(23, 'Phytosphingosine'), 
(23, 'Cholesterol'), 
(23, 'Xanthan Gum'),
(24, 'Water'), (24, 'Glycerin'), (24, 'Helianthus Annuus (Sunflower) Seed Oil'), (24, 'Caprylic/Capric Triglyceride'), (24, 'Niacinamide'), (24, 'Bakuchiol'), (24, 'Panax Ginseng Root Extract'), (24, 'Madecassoside'), (24, 'Sodium Hyaluronate'), (24, 'Wheat Amino Acids'), (24, 'Adenosine'),
(25, 'Water'), 
(25, 'Dimethicone'), 
(25, 'Glycerin'), 
(25, 'Cetearyl Olivate'), 
(25, 'Polyacrylamide'), 
(25, 'Sorbitan Olivate'), 
(25, 'Phenoxyethanol'), 
(25, 'Dimethicone/Vinyl Dimethicone Crosspolymer'), 
(25, 'Synthetic Beeswax'), 
(25, 'C13-14 Isoparaffin'), 
(25, 'Dimethiconol'), 
(25, 'Dimethicone Crosspolymer'), 
(25, 'Chlorphenesin'), 
(25, 'Laureth-7'), 
(25, 'Carbomer'), 
(25, 'Sodium Hyaluronate'), 
(25, 'Ethylhexylglycerin'), 
(25, 'C12-14 Pareth-12'), 
(25, 'Sodium Hydroxide'),
(26, 'Water'), 
(26, 'Niacinamide'), 
(26, 'Propanediol'), 
(26, 'Glycerin'), 
(26, 'Zinc PCA'), 
(26, 'Polyacrylate Crosspolymer-11'), 
(26, 'Sodium Hyaluronate'), 
(26, 'Dimethicone'), 
(26, 'Caprylyl Glycol'), 
(26, 'Phenoxyethanol'), 
(26, 'Xanthan Gum'), 
(26, 'Potassium Sorbate'), 
(26, 'Glyceryl Polyacrylate'), 
(26, 'Tocopheryl Acetate'), 
(26, 'Hexylene Glycol'), 
(26, 'Citric Acid'),
(27, 'Water'), 
(27, 'Glycerin'), 
(27, 'Caprylic/Capric Triglyceride'), 
(27, 'Potassium Cetyl Phosphate'), 
(27, 'Hydrogenated Palm Glycerides'), 
(27, 'Polysorbate 20'), 
(27, 'PEG-40 Stearate'), 
(27, 'Cyclopentasiloxane'), 
(27, 'Hydroxyethylcellulose'), 
(27, 'Potassium Phosphate'), 
(27, 'Ceramide NP'), 
(27, 'Ceramide AP'), 
(27, 'Ceramide EOP'), 
(27, 'Carbomer'), 
(27, 'Niacinamide'), 
(27, 'Isoceteth-10'), 
(27, 'Dimethicone/Vinyl Dimethicone Crosspolymer'), 
(27, 'Triethanolamine'), 
(27, 'Cetearyl Alcohol'), 
(27, 'Behentrimonium Methosulfate'), 
(27, 'Cichorium Intybus (Chicory) Root Extract'), 
(27, 'Lecithin'), 
(27, 'Retinol'), 
(27, 'Silica'), 
(27, 'Sodium Lauroyl Lactylate'), 
(27, 'Cholesterol'), 
(27, 'Phenoxyethanol'), 
(27, 'Tocopherol'), 
(27, 'Alcohol'), 
(27, 'Hydroxyacetophenone'), 
(27, 'Citric Acid'), 
(27, 'Hydrolyzed Hyaluronic Acid'), 
(27, 'Pentylene Glycol'), 
(27, 'Xanthan Gum'), 
(27, 'Phytosphingosine'), 
(27, 'Butyrospermum Parkii (Shea) Butter'), 
(27, 'Ethylhexylglycerin'),
(28, 'Hydrocolloid'),
(29, 'Zinc Oxide'), (29, 'Ectoin'), (29, 'Alteromonas Ferment Extract'), (29, 'Camellia Sinensis (Green Tea) Leaf Extract'), (29, 'Bisabolol'), (29, 'Glycerin'), (29, 'Tocopherol'),
(30, 'Zinc Oxide'), (30, 'Titanium Dioxide'), (30, 'Ceramides'),
(31, 'Water'), (31, 'Dimethicone'), (31, 'Glycerin'),(31, 'Niacinamide'),(31, 'Sodium Hyaluronate'),(31, 'Phenoxyethanol'),(31, 'Chlorphenesin'),(31, 'Dimethiconol'),(31, 'Cetearyl Olivate'),(31, 'Sorbitan Olivate'),
(32, 'Water'), (32, 'Niacinamide'),
(32, 'Zinc PCA'),
(32, 'Pentylene Glycol'),
(32, 'Propylene Glycol'),
(32, '1,2-Hexanediol'),
(32, 'Tamarindus Indica Seed Gum'),
(32, 'Ethylhexylglycerin'),
(32, 'Sodium Hyaluronate'),
(33, 'Water'),
(33, 'Niacinamide'),
(33, 'Dimethicone'),
(33, 'Glycerin'),
(33, 'Retinol'),
(33, 'Ceramide NP'),
(33, 'Ceramide AP'),
(33, 'Ceramide EOP'),
(33, 'Cholesterol'),
(33, 'Phytosphingosine'),
(34, 'Hydrocolloid'),
(35, 'Water'),
(35, 'Niacinamide'),
(35, 'Capryloyl Salicylic Acid'),
(35, 'Dimethicone'),
(35, 'Ceramide NP'),
(35, 'Ceramide AP'),
(35, 'Ceramide EOP'),
(35, 'Cholesterol'),
(35, 'Retinol'),
(35, 'Phytosphingosine'),

(36, 'Salicylic Acid'),
(36, 'Niacinamide'),
(36, 'Grape Seed Polyphenols'),
(36, 'Organic Rose Water'),
(36, 'Butylene Glycol'),


(37, 'Hyaluronic Acid'),
(37, 'Niacinamide'),
(37, 'Vitamin E'),
(37, 'Squalane'),
(37, 'Panthenol'),

(38, 'Zinc Oxide'),
(38, 'Ectoin'),
(38, 'Green Tea Extract'),
(38, 'Bisabolol'),
(38, 'Glycerin'),


(39, 'Zinc Oxide'),
(39, 'Titanium Dioxide'),
(39, 'Ceramides'),
(39, 'Niacinamide'),
(39, 'Hyaluronic Acid');



-- Create Reviews Table
CREATE TABLE product_reviews (
    review_id INT AUTO_INCREMENT PRIMARY KEY,
    product_id INT NOT NULL,
    reviewer_name VARCHAR(100),
    rating INT CHECK (rating BETWEEN 1 AND 5),
    review_text TEXT,
    review_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (product_id) REFERENCES products(product_id) ON DELETE CASCADE
);

-- Reviews for Product ID 1
INSERT INTO product_reviews (product_id, reviewer_name, rating, review_text) VALUES
(1, 'Faith', 5, 'Absolutely love it! My skin looks so clear!'),
(1, 'Zainab', 4, 'Good but a little drying, use moisturizer after.'),
(1, 'John', 5, 'Cleared up my acne faster than anything else!');

-- Access Permissions (optional for local setup)
GRANT SELECT, INSERT, DELETE, UPDATE ON my_products.* TO 'root'@'localhost';
GRANT SELECT ON my_products.products TO 'root'@'localhost';
GRANT SELECT ON my_products.SkinCareRecommendations TO 'root'@'localhost';





