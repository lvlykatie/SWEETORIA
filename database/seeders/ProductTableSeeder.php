<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Product;


class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       // Danh sách 50 sản phẩm với các thuộc tính cố định
       $products = [
        ['name' => 'All-purpose Flour', 'image' => asset('public/backend/image/Pillsbury-Best-All-Purpose-Flour-5-Lb-Bag_1fce33af-7b19-4da7-b101-9eee8c128722.63a7c43b9d4335d6747c76118f500f9e.jpg'), 'price' => 100000, 'category' => 'Baking ingredients'],
        ['name' => 'Granulated Sugar', 'image' => 'https://pics.walgreens.com/prodimg/447641/450.jpg', 'price' => 80000, 'category' => 'Baking ingredients'],
        ['name' => 'Baking Soda', 'image' => 'https://i.imgur.com/FDJdzNJ.png', 'price' => 60000, 'category' => 'Baking ingredients'],
        ['name' => 'Butter', 'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQe_xKqzpVzo_7msayWi5Ux6-xEL64harOQAA&s', 'price' => 150000, 'category' => 'Baking ingredients'],
        ['name' => 'Milk', 'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSdLYLrpcL-2TKZDY0eljDthboDPMytCCRgVg&s', 'price' => 90000, 'category' => 'Baking ingredients'],
        ['name' => 'Yeast', 'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ1DZDVzucs2zZtNZved4sRwmKR6erSQ6U5BA&s', 'price' => 70000, 'category' => 'Baking ingredients'],
        ['name' => 'Vanilla Extract', 'image' => 'https://images-na.ssl-images-amazon.com/images/I/61cGNEBT6fL.jpg', 'price' => 120000, 'category' => 'Baking ingredients'],
        ['name' => 'Cocoa Powder', 'image' => 'https://havamall.com/wp-content/uploads/2021/01/6000197313446.jpg', 'price' => 140000, 'category' => 'Baking ingredients'],
        ['name' => 'Chocolate Chips', 'image' => 'https://shop.annam-gourmet.com/pub/media/catalog/product/cache/ee0af4cad0f3673c5271df64bd520339/F/1/F130938_1_ac97.jpg', 'price' => 130000, 'category' => 'Baking ingredients'],
        ['name' => 'Brown Sugar', 'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRbLNKzLk-DWgUUXjTlEsdSx2_Re-9DKqw5Gg&s', 'price' => 85000, 'category' => 'Baking ingredients'],

        ['name' => 'Whisk', 'image' => 'https://images-na.ssl-images-amazon.com/images/I/71r+PFWQ1lL.jpg', 'price' => 50000, 'category' => 'Baking tools'],
        ['name' => 'Measuring Cups', 'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTAtCSdORyiMCPvUM_-WVZaUMAFMQHRKXeGOQ&s', 'price' => 90000, 'category' => 'Baking tools'],
        ['name' => 'Rolling Pin', 'image' => 'https://images-na.ssl-images-amazon.com/images/I/61FPqc29L4L.jpg', 'price' => 110000, 'category' => 'Baking tools'],
        ['name' => 'Mixing Bowl', 'image' => 'https://i.imgur.com/dTIrXO1.jpeg', 'price' => 60000, 'category' => 'Baking tools'],
        ['name' => 'Silicone Spatula', 'image' => 'https://images-cdn.ubuy.co.id/634556432e8af91edb3f1cbe-nogis-heat-resistant-spatula-set-rubber.jpg', 'price' => 40000, 'category' => 'Baking tools'],
        ['name' => 'Baking Brush', 'image' => 'https://m.media-amazon.com/images/I/718PWu4O0aL.jpg', 'price' => 30000, 'category' => 'Baking tools'],
        ['name' => 'Cooling Rack', 'image' => 'https://images.immediate.co.uk/production/volatile/sites/30/2020/12/wilko-cooling-rack-3145f61.jpg', 'price' => 70000, 'category' => 'Baking tools'],
        ['name' => 'Pastry Bag', 'image' => 'https://bargreen2images.s3-us-west-2.amazonaws.com/THM15111/THM15111', 'price' => 45000, 'category' => 'Baking tools'],
        ['name' => 'Parchment Paper', 'image' => 'https://m.media-amazon.com/images/I/71xp-2Cs1QL.jpg', 'price' => 25000, 'category' => 'Baking tools'],
        ['name' => 'Oven Thermometer', 'image' => 'https://images-na.ssl-images-amazon.com/images/I/61SRuHmmK5L.jpg', 'price' => 55000, 'category' => 'Baking tools'],

        ['name' => 'Baking Tray', 'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSPCf85fVJN5VQpV-5fSbsKzwITGUt1tHIzHw&s', 'price' => 200000, 'category' => 'Baking trays, molds'],
        ['name' => 'Cupcake Molds', 'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSD7QEJR9sXp_u-iw3nGknuVT88wHjFmKAYaw&s', 'price' => 75000, 'category' => 'Baking trays, molds'],
        ['name' => 'Springform Pan', 'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRDJsgtPr8LODibC2X4a_HrqO60wNn-ckqLvQ&s', 'price' => 150000, 'category' => 'Baking trays, molds'],
        ['name' => 'Loaf Pan', 'image' => 'https://bizweb.dktcdn.net/thumb/grande/100/410/640/products/khaygang.jpg?v=1689063477230', 'price' => 90000, 'category' => 'Baking trays, molds'],
        ['name' => 'Bundt Pan', 'image' => 'https://target.scene7.com/is/image/Target/GUEST_520d4adb-05b2-45cc-950a-25c22d096206?wid=488&hei=488&fmt=pjpeg', 'price' => 120000, 'category' => 'Baking trays, molds'],
        ['name' => 'Tart Pan', 'image' => 'https://d163axztg8am2h.cloudfront.net/static/img/90/2a/9c08d64f82f7272b2e33873108ec.webp', 'price' => 80000, 'category' => 'Baking trays, molds'],
        ['name' => 'Silicone Baking Mat', 'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQm_Y-JdRWfCs6sTOVjfnVKO_vuD7UcUFpDew&s', 'price' => 100000, 'category' => 'Baking trays, molds'],
        ['name' => 'Pie Dish', 'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT3natsnSO9knT0UJsiLoV2NMUOkmi0x3-0bA&s', 'price' => 85000, 'category' => 'Baking trays, molds'],
        ['name' => 'Pizza Stone', 'image' => 'https://soapstoneproducts.com/cdn/shop/products/pizza_round_1000_1000x.jpg?v=1557445486', 'price' => 130000, 'category' => 'Baking trays, molds'],
        ['name' => 'Cookie Sheet', 'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRg4k4mPehrcaEdTy2uX1p8TlOzhJhv5neNiQ&s', 'price' => 65000, 'category' => 'Baking trays, molds'],

        ['name' => 'Piping Bags', 'image' => 'https://www.seriouseats.com/thmb/nVWSopjftXmnMowQzA1z0CqAn2s=/1500x0/filters:no_upscale():max_bytes(150000):strip_icc()/sea-product-piping-tips-eric-king-13-f72f169d884347218c253696fe1fd433.jpeg', 'price' => 30, 'category' => 'Bags, boxes, cups, jars'],
        ['name' => 'Muffin Liners', 'image' => 'https://m.media-amazon.com/images/I/31D5-pXFeJL._AC_UF894,1000_QL80_.jpg', 'price' => 15000, 'category' => 'Bags, boxes, cups, jars'],
        ['name' => 'Cupcake Boxes', 'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTdPh3rAxKjxpyt3YIJrA8ZFYLFsm-iZmRBfQ&s', 'price' => 45000, 'category' => 'Bags, boxes, cups, jars'],
        ['name' => 'Cake Box', 'image' => 'https://m.media-amazon.com/images/I/51sDinFMSaL.jpg', 'price' => 50000, 'category' => 'Bags, boxes, cups, jars'],
        ['name' => 'Biscuit Tin', 'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRdu0aMUtTXBVzxM5j9_zTf463NP63T7hCeFQ&s', 'price' => 60000, 'category' => 'Bags, boxes, cups, jars'],
        ['name' => 'Cake Stand', 'image' => 'https://img.lazcdn.com/g/p/362a622e9621103748f1c5dc306abdc3.jpg_960x960q80.jpg_.webp', 'price' => 95000, 'category' => 'Bags, boxes, cups, jars'],
        ['name' => 'Cookie Bags', 'image' => 'https://i5.walmartimages.com/seo/Clear-Plastic-Cookie-Bags-Party-Supplies-Disposable-Wedding-144-Pieces_213d778f-c0e3-4489-86f8-f0f1e9d8d1bf.cc063b4871a1c4b1e01c55be537d60ac.jpeg', 'price' => 20, 'category' => 'Bags, boxes, cups, jars'],
        ['name' => 'Ice Cream Cups', 'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR1hc1JMf5Kb_D4TuxsKMYCBzd1aannwvfLTw&s', 'price' => 35000, 'category' => 'Bags, boxes, cups, jars'],
        ['name' => 'Mason Jars', 'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTbSbRxulG98VOJ0QuBAqm0JVPRdQ9KOpt4mg&s', 'price' => 40000, 'category' => 'Bags, boxes, cups, jars'],
        ['name' => 'Party Favor Boxes', 'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQVXFt5E2Ay7GOJLaj-XMg3VJnpq9zToJXq8g&s', 'price' => 55000, 'category' => 'Bags, boxes, cups, jars'],
    ];

    // Thêm từng sản phẩm vào bảng
    foreach ($products as $product) {
        DB::table('tbl_product')->insert([
            'product_name' => $product['name'],
            'original_price' => $product['price'] + rand(10, 50),
            'product_price' => $product['price'],
            'product_desc' => 'Description for ' . $product['name'],
            'product_image' => $product['image'],
            'product_sku' => rand(1000, 9999),
            'category_name' => $product['category'],
            'product_rate' => rand(0, 5),
            'deal_id' => null,
            'wh_id' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }// Danh sách 50 sản phẩm với các thuộc tính cố định
        $products = [
            ['name' => 'All-purpose Flour', 'image' => 'public/backend/image/Pillsbury-Best-All-Purpose-Flour-5-Lb-Bag_1fce33af-7b19-4da7-b101-9eee8c128722.63a7c43b9d4335d6747c76118f500f9e.jpg', 'price' => 100000, 'category' => 'Baking ingredients'],
            ['name' => 'Granulated Sugar', 'image' => 'https://pics.walgreens.com/prodimg/447641/450.jpg', 'price' => 80000, 'category' => 'Baking ingredients'],
            ['name' => 'Baking Soda', 'image' => 'https://i.imgur.com/FDJdzNJ.png', 'price' => 60000, 'category' => 'Baking ingredients'],
            ['name' => 'Butter', 'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQe_xKqzpVzo_7msayWi5Ux6-xEL64harOQAA&s', 'price' => 150000, 'category' => 'Baking ingredients'],
            ['name' => 'Milk', 'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSdLYLrpcL-2TKZDY0eljDthboDPMytCCRgVg&s', 'price' => 90000, 'category' => 'Baking ingredients'],
            ['name' => 'Yeast', 'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ1DZDVzucs2zZtNZved4sRwmKR6erSQ6U5BA&s', 'price' => 70000, 'category' => 'Baking ingredients'],
            ['name' => 'Vanilla Extract', 'image' => 'https://images-na.ssl-images-amazon.com/images/I/61cGNEBT6fL.jpg', 'price' => 120000, 'category' => 'Baking ingredients'],
            ['name' => 'Cocoa Powder', 'image' => 'https://havamall.com/wp-content/uploads/2021/01/6000197313446.jpg', 'price' => 140000, 'category' => 'Baking ingredients'],
            ['name' => 'Chocolate Chips', 'image' => 'https://shop.annam-gourmet.com/pub/media/catalog/product/cache/ee0af4cad0f3673c5271df64bd520339/F/1/F130938_1_ac97.jpg', 'price' => 130000, 'category' => 'Baking ingredients'],
            ['name' => 'Brown Sugar', 'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRbLNKzLk-DWgUUXjTlEsdSx2_Re-9DKqw5Gg&s', 'price' => 85000, 'category' => 'Baking ingredients'],

            ['name' => 'Whisk', 'image' => 'https://images-na.ssl-images-amazon.com/images/I/71r+PFWQ1lL.jpg', 'price' => 50000, 'category' => 'Baking tools'],
            ['name' => 'Measuring Cups', 'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTAtCSdORyiMCPvUM_-WVZaUMAFMQHRKXeGOQ&s', 'price' => 90000, 'category' => 'Baking tools'],
            ['name' => 'Rolling Pin', 'image' => 'https://images-na.ssl-images-amazon.com/images/I/61FPqc29L4L.jpg', 'price' => 110000, 'category' => 'Baking tools'],
            ['name' => 'Mixing Bowl', 'image' => 'https://i.imgur.com/dTIrXO1.jpeg', 'price' => 60000, 'category' => 'Baking tools'],
            ['name' => 'Silicone Spatula', 'image' => 'https://images-cdn.ubuy.co.id/634556432e8af91edb3f1cbe-nogis-heat-resistant-spatula-set-rubber.jpg', 'price' => 40000, 'category' => 'Baking tools'],
            ['name' => 'Baking Brush', 'image' => 'https://m.media-amazon.com/images/I/718PWu4O0aL.jpg', 'price' => 30000, 'category' => 'Baking tools'],
            ['name' => 'Cooling Rack', 'image' => 'https://images.immediate.co.uk/production/volatile/sites/30/2020/12/wilko-cooling-rack-3145f61.jpg', 'price' => 70000, 'category' => 'Baking tools'],
            ['name' => 'Pastry Bag', 'image' => 'https://bargreen2images.s3-us-west-2.amazonaws.com/THM15111/THM15111', 'price' => 45000, 'category' => 'Baking tools'],
            ['name' => 'Parchment Paper', 'image' => 'https://m.media-amazon.com/images/I/71xp-2Cs1QL.jpg', 'price' => 25000, 'category' => 'Baking tools'],
            ['name' => 'Oven Thermometer', 'image' => 'https://images-na.ssl-images-amazon.com/images/I/61SRuHmmK5L.jpg', 'price' => 55000, 'category' => 'Baking tools'],

            ['name' => 'Baking Tray', 'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSPCf85fVJN5VQpV-5fSbsKzwITGUt1tHIzHw&s', 'price' => 200000, 'category' => 'Baking trays, molds'],
            ['name' => 'Cupcake Molds', 'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSD7QEJR9sXp_u-iw3nGknuVT88wHjFmKAYaw&s', 'price' => 75000, 'category' => 'Baking trays, molds'],
            ['name' => 'Springform Pan', 'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRDJsgtPr8LODibC2X4a_HrqO60wNn-ckqLvQ&s', 'price' => 150000, 'category' => 'Baking trays, molds'],
            ['name' => 'Loaf Pan', 'image' => 'https://bizweb.dktcdn.net/thumb/grande/100/410/640/products/khaygang.jpg?v=1689063477230', 'price' => 90000, 'category' => 'Baking trays, molds'],
            ['name' => 'Bundt Pan', 'image' => 'https://target.scene7.com/is/image/Target/GUEST_520d4adb-05b2-45cc-950a-25c22d096206?wid=488&hei=488&fmt=pjpeg', 'price' => 120000, 'category' => 'Baking trays, molds'],
            ['name' => 'Tart Pan', 'image' => 'https://d163axztg8am2h.cloudfront.net/static/img/90/2a/9c08d64f82f7272b2e33873108ec.webp', 'price' => 80000, 'category' => 'Baking trays, molds'],
            ['name' => 'Silicone Baking Mat', 'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQm_Y-JdRWfCs6sTOVjfnVKO_vuD7UcUFpDew&s', 'price' => 100000, 'category' => 'Baking trays, molds'],
            ['name' => 'Pie Dish', 'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT3natsnSO9knT0UJsiLoV2NMUOkmi0x3-0bA&s', 'price' => 85000, 'category' => 'Baking trays, molds'],
            ['name' => 'Pizza Stone', 'image' => 'https://soapstoneproducts.com/cdn/shop/products/pizza_round_1000_1000x.jpg?v=1557445486', 'price' => 130000, 'category' => 'Baking trays, molds'],
            ['name' => 'Cookie Sheet', 'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRg4k4mPehrcaEdTy2uX1p8TlOzhJhv5neNiQ&s', 'price' => 65000, 'category' => 'Baking trays, molds'],

            ['name' => 'Piping Bags', 'image' => 'https://www.seriouseats.com/thmb/nVWSopjftXmnMowQzA1z0CqAn2s=/1500x0/filters:no_upscale():max_bytes(150000):strip_icc()/sea-product-piping-tips-eric-king-13-f72f169d884347218c253696fe1fd433.jpeg', 'price' => 30, 'category' => 'Bags, boxes, cups, jars'],
            ['name' => 'Muffin Liners', 'image' => 'https://m.media-amazon.com/images/I/31D5-pXFeJL._AC_UF894,1000_QL80_.jpg', 'price' => 15000, 'category' => 'Bags, boxes, cups, jars'],
            ['name' => 'Cupcake Boxes', 'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTdPh3rAxKjxpyt3YIJrA8ZFYLFsm-iZmRBfQ&s', 'price' => 45000, 'category' => 'Bags, boxes, cups, jars'],
            ['name' => 'Cake Box', 'image' => 'https://m.media-amazon.com/images/I/51sDinFMSaL.jpg', 'price' => 50000, 'category' => 'Bags, boxes, cups, jars'],
            ['name' => 'Biscuit Tin', 'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRdu0aMUtTXBVzxM5j9_zTf463NP63T7hCeFQ&s', 'price' => 60000, 'category' => 'Bags, boxes, cups, jars'],
            ['name' => 'Cake Stand', 'image' => 'https://img.lazcdn.com/g/p/362a622e9621103748f1c5dc306abdc3.jpg_960x960q80.jpg_.webp', 'price' => 95000, 'category' => 'Bags, boxes, cups, jars'],
            ['name' => 'Cookie Bags', 'image' => 'https://i5.walmartimages.com/seo/Clear-Plastic-Cookie-Bags-Party-Supplies-Disposable-Wedding-144-Pieces_213d778f-c0e3-4489-86f8-f0f1e9d8d1bf.cc063b4871a1c4b1e01c55be537d60ac.jpeg', 'price' => 20, 'category' => 'Bags, boxes, cups, jars'],
            ['name' => 'Ice Cream Cups', 'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR1hc1JMf5Kb_D4TuxsKMYCBzd1aannwvfLTw&s', 'price' => 35000, 'category' => 'Bags, boxes, cups, jars'],
            ['name' => 'Mason Jars', 'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTbSbRxulG98VOJ0QuBAqm0JVPRdQ9KOpt4mg&s', 'price' => 40000, 'category' => 'Bags, boxes, cups, jars'],
            ['name' => 'Party Favor Boxes', 'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQVXFt5E2Ay7GOJLaj-XMg3VJnpq9zToJXq8g&s', 'price' => 55000, 'category' => 'Bags, boxes, cups, jars'],
        ];

        // Thêm từng sản phẩm vào bảng
        foreach ($products as $product) {
            DB::table('tbl_product')->insert([
                'product_name' => $product['name'],
                'original_price' => $product['price'] + rand(10, 50),
                'product_price' => $product['price'],
                'product_desc' => 'Description for ' . $product['name'],
                'product_image' => $product['image'],
                'product_sku' => rand(1000, 9999),
                'category_name' => $product['category'],
                'product_rate' => rand(0, 5),
                'deal_id' => null,
                'wh_id' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
