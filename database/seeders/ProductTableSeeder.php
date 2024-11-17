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
        // Baking Tools
        [
            'name' => 'Rolling Pin',
            'image' => 'https://images-na.ssl-images-amazon.com/images/I/61FPqc29L4L.jpg',
            'price' => 110000,
            'category' => 'Baking tools',
            'desc' => 'Durable rolling pin for baking.',
            'origin' => 'USA',
            'weight' => '500g',
            'storage' => 'Keep in a dry place.',
            'expiration' => 'N/A'
        ],
        [
            'name' => 'Mixing Bowl',
            'image' => 'https://i.imgur.com/dTIrXO1.jpeg',
            'price' => 60000,
            'category' => 'Baking tools',
            'desc' => 'Stainless steel mixing bowl.',
            'origin' => 'Germany',
            'weight' => '800g',
            'storage' => 'Wash after use.',
            'expiration' => 'N/A'
        ],
        [
            'name' => 'Silicone Spatula',
            'image' => 'https://images-cdn.ubuy.co.id/634556432e8af91edb3f1cbe-nogis-heat-resistant-spatula-set-rubber.jpg',
            'price' => 40000,
            'category' => 'Baking tools',
            'desc' => 'Heat-resistant silicone spatula set.',
            'origin' => 'China',
            'weight' => '150g',
            'storage' => 'Store flat.',
            'expiration' => 'N/A'
        ],
        [
            'name' => 'Baking Brush',
            'image' => 'https://m.media-amazon.com/images/I/718PWu4O0aL.jpg',
            'price' => 30000,
            'category' => 'Baking tools',
            'desc' => 'Silicone baking brush for applying glazes.',
            'origin' => 'Italy',
            'weight' => '100g',
            'storage' => 'Dry after cleaning.',
            'expiration' => 'N/A'
        ],
        [
            'name' => 'Cooling Rack',
            'image' => 'https://images.immediate.co.uk/production/volatile/sites/30/2020/12/wilko-cooling-rack-3145f61.jpg',
            'price' => 70000,
            'category' => 'Baking tools',
            'desc' => 'Stainless steel cooling rack.',
            'origin' => 'USA',
            'weight' => '400g',
            'storage' => 'Dry before storing.',
            'expiration' => 'N/A'
        ],
        [
            'name' => 'Pastry Bag',
            'image' => 'https://bargreen2images.s3-us-west-2.amazonaws.com/THM15111/THM15111',
            'price' => 45000,
            'category' => 'Baking tools',
            'desc' => 'Reusable pastry bag for decorating.',
            'origin' => 'France',
            'weight' => '200g',
            'storage' => 'Wash after use.',
            'expiration' => 'N/A'
        ],
        [
            'name' => 'Parchment Paper',
            'image' => 'https://m.media-amazon.com/images/I/71xp-2Cs1QL.jpg',
            'price' => 25000,
            'category' => 'Baking tools',
            'desc' => 'Non-stick parchment paper for baking.',
            'origin' => 'USA',
            'weight' => '100g',
            'storage' => 'Keep in a cool, dry place.',
            'expiration' => 'N/A'
        ],
        [
            'name' => 'Oven Thermometer',
            'image' => 'https://images-na.ssl-images-amazon.com/images/I/61SRuHmmK5L.jpg',
            'price' => 55000,
            'category' => 'Baking tools',
            'desc' => 'Accurate oven thermometer.',
            'origin' => 'China',
            'weight' => '250g',
            'storage' => 'Handle with care.',
            'expiration' => '5 years'
        ],
        // Baking Trays and Molds
        [
            'name' => 'Baking Tray',
            'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSPCf85fVJN5VQpV-5fSbsKzwITGUt1tHIzHw&s',
            'price' => 200000,
            'category' => 'Baking trays, molds',
            'desc' => 'Heavy-duty baking tray.',
            'origin' => 'Germany',
            'weight' => '1500g',
            'storage' => 'Store flat.',
            'expiration' => 'N/A'
        ],
        [
            'name' => 'Cupcake Molds',
            'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSD7QEJR9sXp_u-iw3nGknuVT88wHjFmKAYaw&s',
            'price' => 75000,
            'category' => 'Baking trays, molds',
            'desc' => 'Silicone cupcake molds.',
            'origin' => 'USA',
            'weight' => '300g',
            'storage' => 'Clean before storing.',
            'expiration' => 'N/A'
        ],
        [
            'name' => 'Springform Pan',
            'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRDJsgtPr8LODibC2X4a_HrqO60wNn-ckqLvQ&s',
            'price' => 150000,
            'category' => 'Baking trays, molds',
            'desc' => 'Non-stick springform pan.',
            'origin' => 'Italy',
            'weight' => '1200g',
            'storage' => 'Avoid stacking.',
            'expiration' => 'N/A'
        ],
        [
            'name' => 'Loaf Pan',
            'image' => 'https://bizweb.dktcdn.net/thumb/grande/100/410/640/products/khaygang.jpg?v=1689063477230',
            'price' => 90000,
            'category' => 'Baking trays, molds',
            'desc' => 'Aluminum loaf pan.',
            'origin' => 'USA',
            'weight' => '800g',
            'storage' => 'Dry before storing.',
            'expiration' => 'N/A'
        ],
        [
            'name' => 'Bundt Pan',
            'image' => 'https://target.scene7.com/is/image/Target/GUEST_520d4adb-05b2-45cc-950a-25c22d096206?wid=488&hei=488&fmt=pjpeg',
            'price' => 120000,
            'category' => 'Baking trays, molds',
            'desc' => 'Decorative bundt pan.',
            'origin' => 'France',
            'weight' => '1000g',
            'storage' => 'Handle with care.',
            'expiration' => 'N/A'
        ],
        [
            'name' => 'Tart Pan',
            'image' => 'https://d163axztg8am2h.cloudfront.net/static/img/90/2a/9c08d64f82f7272b2e33873108ec.webp',
            'price' => 80000,
            'category' => 'Baking trays, molds',
            'desc' => 'Non-stick tart pan.',
            'origin' => 'USA',
            'weight' => '900g',
            'storage' => 'Avoid stacking.',
            'expiration' => 'N/A'
        ],
        [
            'name' => 'Silicone Baking Mat',
            'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQm_Y-JdRWfCs6sTOVjfnVKO_vuD7UcUFpDew&s',
            'price' => 100000,
            'category' => 'Baking trays, molds',
            'desc' => 'Reusable silicone baking mat.',
            'origin' => 'China',
            'weight' => '200g',
            'storage' => 'Clean after each use.',
            'expiration' => '5 years'
        ],
        [
            'name' => 'Pie Dish',
            'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT3natsnSO9knT0UJsiLoV2NMUOkmi0x3-0bA&s',
            'price' => 85000,
            'category' => 'Baking trays, molds',
            'desc' => 'Glass pie dish.',
            'origin' => 'USA',
            'weight' => '700g',
            'storage' => 'Handle with care.',
            'expiration' => 'N/A'
        ],
        [
            'name' => 'Pizza Stone',
            'image' => 'https://soapstoneproducts.com/cdn/shop/products/pizza_round_1000_1000x.jpg?v=1557445486',
            'price' => 130000,
            'category' => 'Baking trays, molds',
            'desc' => 'Ceramic pizza stone for even baking.',
            'origin' => 'Italy',
            'weight' => '1200g',
            'storage' => 'Cool before cleaning.',
            'expiration' => 'N/A'
        ],
        [
            'name' => 'Cookie Sheet',
            'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRg4k4mPehrcaEdTy2uX1p8TlOzhJhv5neNiQ&s',
            'price' => 65000,
            'category' => 'Baking trays, molds',
            'desc' => 'Aluminum cookie sheet.',
            'origin' => 'USA',
            'weight' => '1000g',
            'storage' => 'Dry before storing.',
            'expiration' => 'N/A'
        ],
        // Additional Products
        [
            'name' => 'Cupcake Boxes',
            'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTdPh3rAxKjxpyt3YIJrA8ZFYLFsm-iZmRBfQ&s',
            'price' => 45000,
            'category' => 'Bags, boxes, cups, jars',
            'desc' => 'High-quality cupcake boxes.',
            'origin' => 'USA',
            'weight' => '200g',
            'storage' => 'Store in a cool, dry place.',
            'expiration' => 'N/A'
        ],
        [
            'name' => 'Cake Box',
            'image' => 'https://m.media-amazon.com/images/I/51sDinFMSaL.jpg',
            'price' => 50000,
            'category' => 'Bags, boxes, cups, jars',
            'desc' => 'Elegant cake boxes for special occasions.',
            'origin' => 'Canada',
            'weight' => '250g',
            'storage' => 'Keep away from moisture.',
            'expiration' => 'N/A'
        ],
        [
            'name' => 'Biscuit Tin',
            'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRdu0aMUtTXBVzxM5j9_zTf463NP63T7hCeFQ&s',
            'price' => 60000,
            'category' => 'Bags, boxes, cups, jars',
            'desc' => 'Sturdy biscuit tins for long-term storage.',
            'origin' => 'Germany',
            'weight' => '300g',
            'storage' => 'Store in a dry place.',
            'expiration' => '2 years'
        ],
        [
            'name' => 'Cake Stand',
            'image' => 'https://img.lazcdn.com/g/p/362a622e9621103748f1c5dc306abdc3.jpg_960x960q80.jpg_.webp',
            'price' => 95000,
            'category' => 'Bags, boxes, cups, jars',
            'desc' => 'Stylish cake stands for elegant presentations.',
            'origin' => 'Italy',
            'weight' => '500g',
            'storage' => 'Handle with care to avoid scratches.',
            'expiration' => 'N/A'
        ],
        [
            'name' => 'Cookie Bags',
            'image' => 'https://i5.walmartimages.com/seo/Clear-Plastic-Cookie-Bags-Party-Supplies-Disposable-Wedding-144-Pieces_213d778f-c0e3-4489-86f8-f0f1e9d8d1bf.cc063b4871a1c4b1e01c55be537d60ac.jpeg',
            'price' => 20,
            'category' => 'Bags, boxes, cups, jars',
            'desc' => 'Disposable clear plastic cookie bags.',
            'origin' => 'China',
            'weight' => '50g',
            'storage' => 'Keep dry and away from direct sunlight.',
            'expiration' => 'N/A'
        ],
        [
            'name' => 'Ice Cream Cups',
            'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR1hc1JMf5Kb_D4TuxsKMYCBzd1aannwvfLTw&s',
            'price' => 35000,
            'category' => 'Bags, boxes, cups, jars',
            'desc' => 'Reusable ice cream cups.',
            'origin' => 'USA',
            'weight' => '150g',
            'storage' => 'Wash before use.',
            'expiration' => 'N/A'
        ],
        [
            'name' => 'Mason Jars',
            'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTbSbRxulG98VOJ0QuBAqm0JVPRdQ9KOpt4mg&s',
            'price' => 40000,
            'category' => 'Bags, boxes, cups, jars',
            'desc' => 'Classic mason jars for various uses.',
            'origin' => 'USA',
            'weight' => '250g',
            'storage' => 'Can be used for canning and storage.',
            'expiration' => 'N/A'
        ],
        [
            'name' => 'Party Favor Boxes',
            'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQVXFt5E2Ay7GOJLaj-XMg3VJnpq9zToJXq8g&s',
            'price' => 55000,
            'category' => 'Bags, boxes, cups, jars',
            'desc' => 'Colorful party favor boxes.',
            'origin' => 'Mexico',
            'weight' => '180g',
            'storage' => 'Store flat in a dry area.',
            'expiration' => 'N/A'
        ],
    ];

    // Thêm từng sản phẩm vào bảng
    foreach ($products as $product) {
        DB::table('tbl_product')->insert([
            'product_name' => $product['name'],
            'original_price' => $product['price'] + rand(10, 50),
            'product_price' => $product['price'],
            'product_desc' => $product['desc'],
            'product_image' => $product['image'],
            'product_sku' => rand(1000, 9999),
            'category_name' => $product['category'],
            'origin' => $product['origin'],
            'weight' => $product['weight'],
            'storage' => $product['storage'],
            'expiration' => $product['expiration'],
            'deal_id' => null,
            'wh_id' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
    }
}
