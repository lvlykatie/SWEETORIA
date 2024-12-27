-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 27, 2024 at 07:38 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sweetoria`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `product_id` int(10) UNSIGNED NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `original_price` int(11) DEFAULT NULL,
  `product_price` int(11) NOT NULL,
  `product_desc` longtext NOT NULL,
  `product_image` longtext NOT NULL,
  `product_sku` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `product_rate` float NOT NULL DEFAULT 0,
  `deal_id` int(11) DEFAULT NULL,
  `wh_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`product_id`, `product_name`, `original_price`, `product_price`, `product_desc`, `product_image`, `product_sku`, `category_name`, `product_rate`, `deal_id`, `wh_id`, `created_at`, `updated_at`) VALUES
(1, 'All-purpose Flour', 100000, 100000, 'Description for All-purpose Flour', 'https://i.imgur.com/w7bQ2Z3.png', 3715, 'Baking ingredients', 1, NULL, NULL, '2024-11-10 11:10:05', '2024-11-10 11:10:05'),
(2, 'Granulated Sugar', 80050, 80000, 'Description for Granulated Sugar', 'https://pics.walgreens.com/prodimg/447641/450.jpg', 3077, 'Baking ingredients', 2, NULL, NULL, '2024-11-10 11:10:05', '2024-11-10 11:10:05'),
(3, 'Baking Soda', NULL, 60047, 'Description for Baking Soda', 'https://i.imgur.com/FDJdzNJ.png', 7803, 'Baking ingredients', 1, NULL, NULL, '2024-11-10 11:10:05', '2024-11-10 11:10:05'),
(4, 'Butter', 150031, 150000, 'Description for Butter', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQe_xKqzpVzo_7msayWi5Ux6-xEL64harOQAA&s', 1055, 'Baking ingredients', 2, NULL, NULL, '2024-11-10 11:10:05', '2024-11-10 11:10:05'),
(5, 'Milk', 90014, 90000, 'Description for Milk', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSdLYLrpcL-2TKZDY0eljDthboDPMytCCRgVg&s', 3855, 'Baking ingredients', 5, NULL, NULL, '2024-11-10 11:10:05', '2024-11-10 11:10:05'),
(6, 'Yeast', 70050, 70000, 'Description for Yeast', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ1DZDVzucs2zZtNZved4sRwmKR6erSQ6U5BA&s', 6896, 'Baking ingredients', 5, NULL, NULL, '2024-11-10 11:10:05', '2024-11-10 11:10:05'),
(7, 'Vanilla Extract', 120029, 120000, 'Description for Vanilla Extract', 'https://images-na.ssl-images-amazon.com/images/I/61cGNEBT6fL.jpg', 7730, 'Baking ingredients', 4, NULL, NULL, '2024-11-10 11:10:05', '2024-11-10 11:10:05'),
(8, 'Cocoa Powder', 140043, 140000, 'Description for Cocoa Powder', 'https://i.imgur.com/fGyULED.jpeg', 1577, 'Baking ingredients', 4, NULL, NULL, '2024-11-10 11:10:05', '2024-11-10 11:10:05'),
(9, 'Chocolate Chips', 130043, 130000, 'Description for Chocolate Chips', 'https://shop.annam-gourmet.com/pub/media/catalog/product/cache/ee0af4cad0f3673c5271df64bd520339/F/1/F130938_1_ac97.jpg', 5713, 'Baking ingredients', 1, NULL, NULL, '2024-11-10 11:10:05', '2024-11-10 11:10:05'),
(10, 'Brown Sugar', NULL, 85044, 'Description for Brown Sugar', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRbLNKzLk-DWgUUXjTlEsdSx2_Re-9DKqw5Gg&s', 4189, 'Baking ingredients', 4, NULL, NULL, '2024-11-10 11:10:05', '2024-11-10 11:10:05'),
(11, 'Whisk', 50024, 50000, 'Description for Whisk', 'https://images-na.ssl-images-amazon.com/images/I/71r+PFWQ1lL.jpg', 4348, 'Baking tools', 0, NULL, NULL, '2024-11-10 11:10:05', '2024-11-10 11:10:05'),
(12, 'Measuring Cups', 90040, 90000, 'Description for Measuring Cups', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTAtCSdORyiMCPvUM_-WVZaUMAFMQHRKXeGOQ&s', 4306, 'Baking tools', 4, NULL, NULL, '2024-11-10 11:10:05', '2024-11-10 11:10:05'),
(13, 'Rolling Pin', 110030, 110000, 'Description for Rolling Pin', 'https://images-na.ssl-images-amazon.com/images/I/61FPqc29L4L.jpg', 8317, 'Baking tools', 1, NULL, NULL, '2024-11-10 11:10:05', '2024-11-10 11:10:05'),
(14, 'Mixing Bowl', 60022, 60000, 'Description for Mixing Bowl', 'https://i.imgur.com/dTIrXO1.jpeg', 1936, 'Baking tools', 4, NULL, NULL, '2024-11-10 11:10:05', '2024-11-10 11:10:05'),
(15, 'Silicone Spatula', 40038, 40000, 'Description for Silicone Spatula', 'https://images-cdn.ubuy.co.id/634556432e8af91edb3f1cbe-nogis-heat-resistant-spatula-set-rubber.jpg', 5871, 'Baking tools', 3, NULL, NULL, '2024-11-10 11:10:05', '2024-11-10 11:10:05'),
(16, 'Baking Brush', 30024, 30024, 'Description for Baking Brush', 'https://m.media-amazon.com/images/I/718PWu4O0aL.jpg', 5472, 'Baking tools', 0, NULL, NULL, '2024-11-10 11:10:05', '2024-11-10 11:10:05'),
(17, 'Cooling Rack', 70010, 70000, 'Description for Cooling Rack', 'https://images.immediate.co.uk/production/volatile/sites/30/2020/12/wilko-cooling-rack-3145f61.jpg', 5126, 'Baking tools', 4, NULL, NULL, '2024-11-10 11:10:05', '2024-11-10 11:10:05'),
(18, 'Pastry Bag', 45037, 45000, 'Description for Pastry Bag', 'https://bargreen2images.s3-us-west-2.amazonaws.com/THM15111/THM15111', 2442, 'Baking tools', 3, NULL, NULL, '2024-11-10 11:10:05', '2024-11-10 11:10:05'),
(19, 'Parchment Paper', 25019, 25000, 'Description for Parchment Paper', 'https://m.media-amazon.com/images/I/71xp-2Cs1QL.jpg', 9588, 'Baking tools', 1, NULL, NULL, '2024-11-10 11:10:05', '2024-11-10 11:10:05'),
(20, 'Oven Thermometer', 55048, 55000, 'Description for Oven Thermometer', 'https://images-na.ssl-images-amazon.com/images/I/61SRuHmmK5L.jpg', 7478, 'Baking tools', 1, NULL, NULL, '2024-11-10 11:10:05', '2024-11-10 11:10:05'),
(21, 'Baking Tray', 200026, 200026, 'Description for Baking Tray', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSPCf85fVJN5VQpV-5fSbsKzwITGUt1tHIzHw&s', 5037, 'Baking trays, molds', 0, NULL, NULL, '2024-11-10 11:10:05', '2024-11-10 11:10:05'),
(22, 'Cupcake Molds', 75037, 75000, 'Description for Cupcake Molds', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSD7QEJR9sXp_u-iw3nGknuVT88wHjFmKAYaw&s', 4486, 'Baking trays, molds', 1, NULL, NULL, '2024-11-10 11:10:05', '2024-11-10 11:10:05'),
(23, 'Springform Pan', 150045, 150000, 'Description for Springform Pan', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRDJsgtPr8LODibC2X4a_HrqO60wNn-ckqLvQ&s', 6360, 'Baking trays, molds', 5, NULL, NULL, '2024-11-10 11:10:05', '2024-11-10 11:10:05'),
(24, 'Loaf Pan', 90018, 90000, 'Description for Loaf Pan', 'https://bizweb.dktcdn.net/thumb/grande/100/410/640/products/khaygang.jpg?v=1689063477230', 2939, 'Baking trays, molds', 4, NULL, NULL, '2024-11-10 11:10:05', '2024-11-10 11:10:05'),
(25, 'Bundt Pan', 120023, 120023, 'Description for Bundt Pan', 'https://target.scene7.com/is/image/Target/GUEST_520d4adb-05b2-45cc-950a-25c22d096206?wid=488&hei=488&fmt=pjpeg', 6105, 'Baking trays, molds', 3, NULL, NULL, '2024-11-10 11:10:05', '2024-11-10 11:10:05'),
(26, 'Tart Pan', 80017, 80000, 'Description for Tart Pan', 'https://d163axztg8am2h.cloudfront.net/static/img/90/2a/9c08d64f82f7272b2e33873108ec.webp', 3747, 'Baking trays, molds', 0, NULL, NULL, '2024-11-10 11:10:05', '2024-11-10 11:10:05'),
(27, 'Silicone Baking Mat', 100049, 100000, 'Description for Silicone Baking Mat', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQm_Y-JdRWfCs6sTOVjfnVKO_vuD7UcUFpDew&s', 7666, 'Baking trays, molds', 1, NULL, NULL, '2024-11-10 11:10:05', '2024-11-10 11:10:05'),
(28, 'Pie Dish', 85048, 85000, 'Description for Pie Dish', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT3natsnSO9knT0UJsiLoV2NMUOkmi0x3-0bA&s', 7778, 'Baking trays, molds', 5, NULL, NULL, '2024-11-10 11:10:05', '2024-11-10 11:10:05'),
(29, 'Pizza Stone', 130029, 130000, 'Description for Pizza Stone', 'https://soapstoneproducts.com/cdn/shop/products/pizza_round_1000_1000x.jpg?v=1557445486', 1000, 'Baking trays, molds', 1, NULL, NULL, '2024-11-10 11:10:05', '2024-11-10 11:10:05'),
(30, 'Cookie Sheet', 65034, 65000, 'Description for Cookie Sheet', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRg4k4mPehrcaEdTy2uX1p8TlOzhJhv5neNiQ&s', 1262, 'Baking trays, molds', 5, NULL, NULL, '2024-11-10 11:10:05', '2024-11-10 11:10:05'),
(31, 'Piping Bags', 47, 30, 'Description for Piping Bags', 'https://www.seriouseats.com/thmb/nVWSopjftXmnMowQzA1z0CqAn2s=/1500x0/filters:no_upscale():max_bytes(150000):strip_icc()/sea-product-piping-tips-eric-king-13-f72f169d884347218c253696fe1fd433.jpeg', 7724, 'Bags, boxes, cups, jars', 5, NULL, NULL, '2024-11-10 11:10:05', '2024-11-10 11:10:05'),
(32, 'Muffin Liners', 15020, 15000, 'Description for Muffin Liners', 'https://m.media-amazon.com/images/I/31D5-pXFeJL._AC_UF894,1000_QL80_.jpg', 8670, 'Bags, boxes, cups, jars', 1, NULL, NULL, '2024-11-10 11:10:05', '2024-11-10 11:10:05'),
(33, 'Cupcake Boxes', 45011, 45000, 'Description for Cupcake Boxes', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTdPh3rAxKjxpyt3YIJrA8ZFYLFsm-iZmRBfQ&s', 8274, 'Bags, boxes, cups, jars', 1, NULL, NULL, '2024-11-10 11:10:05', '2024-11-10 11:10:05'),
(34, 'Cake Box', 50030, 50000, 'Description for Cake Box', 'https://m.media-amazon.com/images/I/51sDinFMSaL.jpg', 5954, 'Bags, boxes, cups, jars', 0, NULL, NULL, '2024-11-10 11:10:05', '2024-11-10 11:10:05'),
(35, 'Biscuit Tin', 60039, 12008, 'Description for Biscuit Tin', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRdu0aMUtTXBVzxM5j9_zTf463NP63T7hCeFQ&s', 8998, 'Bags, boxes, cups, jars', 3, 17, NULL, '2024-11-10 11:10:05', '2024-11-10 11:10:05'),
(36, 'Cake Stand', 95032, 95000, 'Description for Cake Stand', 'https://img.lazcdn.com/g/p/362a622e9621103748f1c5dc306abdc3.jpg_960x960q80.jpg_.webp', 6867, 'Bags, boxes, cups, jars', 1, NULL, NULL, '2024-11-10 11:10:05', '2024-11-10 11:10:05'),
(37, 'Cookie Bags', 68, 20, 'Description for Cookie Bags', 'https://i5.walmartimages.com/seo/Clear-Plastic-Cookie-Bags-Party-Supplies-Disposable-Wedding-144-Pieces_213d778f-c0e3-4489-86f8-f0f1e9d8d1bf.cc063b4871a1c4b1e01c55be537d60ac.jpeg', 8301, 'Bags, boxes, cups, jars', 2, NULL, NULL, '2024-11-10 11:10:05', '2024-11-10 11:10:05'),
(38, 'Ice Cream Cups', 35021, 35000, 'Description for Ice Cream Cups', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR1hc1JMf5Kb_D4TuxsKMYCBzd1aannwvfLTw&s', 7417, 'Bags, boxes, cups, jars', 0, NULL, NULL, '2024-11-10 11:10:05', '2024-11-10 11:10:05'),
(39, 'Mason Jars', 40026, 40000, 'Description for Mason Jars', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTbSbRxulG98VOJ0QuBAqm0JVPRdQ9KOpt4mg&s', 4979, 'Bags, boxes, cups, jars', 2, NULL, NULL, '2024-11-10 11:10:05', '2024-11-10 11:10:05'),
(40, 'Party Favor Boxes', 55029, 55000, 'Description for Party Favor Boxes', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQVXFt5E2Ay7GOJLaj-XMg3VJnpq9zToJXq8g&s', 6049, 'Bags, boxes, cups, jars', 5, NULL, NULL, '2024-11-10 11:10:05', '2024-11-10 11:10:05'),
(41, 'tét', NULL, 200000, 'testttt', 'flour.jpg', 1, 'Baking trays, molds', 0, NULL, NULL, NULL, NULL),
(42, 'Sugar crush', NULL, 80000, 'Sweet like your crush', 'Granulated-Sugar.jpg', 2000, 'Baking ingredients', 0, NULL, NULL, NULL, NULL),
(43, 'Matcha', NULL, 50000, 'Bitter like your crush', 'cozy-barista-matcha-200g-pcv_e9d1c1bd28a646f4a08b65a257df00c4.webp', 2000, 'Baking ingredients', 0, NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `product_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
