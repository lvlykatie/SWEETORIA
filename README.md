script sql tbl_product
<br/>
INSERT INTO tbl_product (product_name, original_price, product_price, product_desc, product_image, product_sku, category_name, product_quantity, product_fact, status, created_at, updated_at)
VALUES
('Baking Flour', 20000, 18000, 'High-quality baking flour', 'flour.jpg', 10001, 'Flour', 50, 'Produced by ABC Mill', 'show', NOW(), NOW()),

('Granulated Sugar', NULL, 5000, 'Fine granulated sugar for baking', 'sugar.jpg', 10002, 'Sugar', 100, 'Produced by XYZ Sugar Co.', 'show', NOW(), NOW()),

('Butter', 40000, 35000, 'Pure unsalted butter', 'butter.jpg', 10003, 'Dairy', 20, 'Imported from DEF Dairy', 'hide', NOW(), NOW()),

('Eggs', NULL, 2000, 'Farm fresh eggs', 'eggs.jpg', 10004, 'Eggs', 200, 'Locally produced', 'show', NOW(), NOW()),

('Chocolate Chips', 50000, 45000, 'Dark chocolate chips for baking', 'chocolate.png', 10005, 'Chocolate', 150, 'Made by GHI Confectionery', 'show', NOW(), NOW());
