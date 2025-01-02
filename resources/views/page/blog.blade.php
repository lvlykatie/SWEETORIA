@extends('layouts.master')

@section('title', 'Blog')

@section('content')
    <div class="mt-16 mx-10">
        <div class="text-center text-6xl font-black rounded-3xl text my-5 py-6 bg-pink mb-24 mx-0">
            Blogs - Our Stories
        </div>
        <div class="text-4xl font-bold mb-7 ">Recent Posts</div>
        <div class="recent-posts w-full flex space-x-7">
            <div class="w-1/2 flex flex-wrap">
                <img src="https://cdn.tgdd.vn/Files/2021/08/17/1375924/huong-dan-cach-lam-cupcake-tra-xanh-mem-xop-don-gian-tai-nha-202201151447398338.jpg" class="w-full" alt="ssss">\
                <p id="time" class="text-2xl font-normal w-full">05/11/2024</p>
                <div class="title text-2xl font-normal"><a href="https://www.bachhoaxanh.com/kinh-nghiem-hay/huong-dan-cach-lam-cupcake-tra-xanh-mem-xop-don-gian-tai-nha-1375924?srsltid=AfmBOooGr_s6TKMlOsrCZpNHPePCZRge1xzQFd75ixdRVnDaSce-sO-d"><b>Matcha Cupcakes: A Perfect Blend of Sweetness and Elegance</b></a></div>
                <div class="description text-2xl font-normal">Bring a touch of sophistication to your dessert table with Matcha Cupcakes! These fluffy, green-tea-infused treats are not only delicious but also packed with a subtle earthy flavor. Perfect for tea lovers and cupcake enthusiasts alike, this recipe is simple yet impressive. Let’s whip up these vibrant delights together!
                </div>
            </div>
            <div class="w-1/2 space-y-14">
                {{-- 1 post --}}
                <div class="flex space-x-7">
                    <img src="https://cdn.tgdd.vn/2022/09/CookDish/2-cach-lam-cheesecake-oreo-don-gian-de-lam-khong-can-lo-nuong-avt-1200x676.jpg" class="w-1/2" alt>
                    <div class="w-1/2 space-y-7">
                        <p id="time" class="text-2xl font-normal w-full">05/11/2024</p>
                        <div class="title text-2xl font-bold"><a href="https://www.dienmayxanh.com/vao-bep/2-cach-lam-cheesecake-oreo-don-gian-de-lam-khong-can-lo-nuong-06738">Oreo cheese cake</a></div>
                        <div class="description text-2xl font-normal">
                        Craving a dessert that’s rich, creamy, and irresistibly delicious? Oreo Cheesecake is the ultimate combination of smooth cream cheese and crunchy chocolate cookies. Easy to make and sure to impress, this recipe is perfect for any occasion. Let’s dive into creating this decadent masterpiece!
                        </div>
                    </div>
                </div>
                <div class="flex space-x-7">
                    <img src="https://cdn.tgdd.vn/2021/01/CookProduct/thumb1-1200x676-12.jpg" class="w-1/2" alt>
                    <div class="w-1/2 space-y-7">
                        <p id="time" class="text-2xl font-normal w-full">05/11/2024</p>
                        <div class="title text-2xl font-bold"><a href="https://www.dienmayxanh.com/vao-bep/mousse-la-gi-thanh-phan-chinh-va-cac-cach-lam-mousse-don-gian-06864">Mousse: Light, Creamy, and Absolutely Divine</a></div>
                        <div class="description text-2xl font-normal">Looking for a dessert that’s both elegant and effortless? Mousse is the perfect choice—a silky, airy treat that melts in your mouth. Whether it’s chocolate, fruit, or vanilla, this versatile dessert is sure to impress. Let’s explore how to create this luxurious delight step by step!
                        </div>
                    </div>
                </div>
                <div class="flex space-x-7">
                    <img src="{{ asset('public/frontend/client/page/image/post_img.jpg') }}" class="w-1/2" alt>
                    <div class="w-1/2 space-y-7">
                        <p id="time" class="text-2xl font-normal w-full">05/11/2024</p>
                        <div class="title text-2xl font-bold"><a href="https://vintagerecipeproject.com/flour-the-foundation-of-baking/">Flour – The Foundation of Textur</a></div>
                        <div class="description text-2xl font-normal">Did you know that flour comes in various types like
                            all-purpose,
                            cake flour, and bread flour? Each type will create a different texture, whether you're aiming
                            for light
                            and airy or chewy and dense.
                            Always keep flour in a cool, dry place away from sunlight to preserve its freshness.
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-4xl font-bold my-7 ">All Posts</div>
        {{-- all post --}}
        <div class="mt-16 w-full flex flex-wrap justify-between">
            {{-- 1 post  --}}
            <div class="post w-[calc(33.33%-20px)] space-y-7 mb-10">
                <img src="https://cdn.tgdd.vn/Files/2021/08/24/1377598/5-cong-thuc-lam-panna-cotta-cuc-ngon-nhu-nha-hang-5-sao-202201171306567825.jpg" class="w-full" alt>
                <p id="time" class="text-2xl font-normal w-full">05/11/2024</p>
                <div class="title text-2xl font-bold"><a href="https://www.bachhoaxanh.com/kinh-nghiem-hay/5-cong-thuc-lam-panna-cotta-cuc-ngon-nhu-nha-hang-5-sao-1377598?srsltid=AfmBOoqqA8Cb08r7Gb3-dKutqVnKJaUUuDj1ajsM83VvyuPhZjqxZUzJ">Panna Cotta: A Creamy Delight with Italian Elegance<</a></div>
                <div class="description text-2xl font-normal">
                Looking for a dessert that’s as simple to make as it is stunning to serve? Panna Cotta is a silky, creamy Italian classic that melts in your mouth. Whether it’s chocolate, fruit, or vanilla, this versatile dessert is sure to impress. Let’s explore how to create this luxurious delight step by step!
                </div>
            </div>
            <div class="post w-[calc(33.33%-20px)] space-y-7 mb-10">
                <img src="https://thermomixvietnam.vn/wp-content/uploads/2021/08/tiramisu-truyen-thong-2.jpg" class="w-full" alt>
                <p id="time" class="text-2xl font-normal w-full">05/11/2024</p>
                <div class="title text-2xl font-bold"><a href="https://fptshop.com.vn/tin-tuc/dien-may/cach-lam-banh-tiramisu-164568">Tiramisu: A Taste of Italy in Every Layer</a></div>
                <div class="description text-2xl font-normal">
                Indulge in the rich, creamy goodness of Tiramisu, the iconic Italian dessert loved worldwide. With its layers of coffee-soaked ladyfingers, velvety mascarpone, and a hint of cocoa, this treat is pure bliss. Surprisingly easy to make, it’s perfect for any occasion. Let’s dive into crafting this decadent masterpiece together!
                </div>
            </div>
            <div class="post w-[calc(33.33%-20px)] space-y-7 mb-10">
                <img src="https://cdn.tgdd.vn/2021/05/CookProduct/kem-pho-mai-viet-quat-thumbnail-1200x676.jpg" class="w-full" alt>
                <p id="time" class="text-2xl font-normal w-full">05/11/2024</p>
                <div class="title text-2xl font-bold"><a href="https://www.dienmayxanh.com/vao-bep/tong-hop-20-cach-lam-kem-tu-trai-cay-tuoi-ngon-mat-lanh-giai-09921">Fruit Ice Cream: A Refreshing Burst of Flavor</a></div>
                <div class="description text-2xl font-normal">
                Beat the heat with homemade fruit ice cream that’s as vibrant as it is delicious! Bursting with the natural sweetness of fresh fruits, this creamy treat is a healthier, tastier alternative to store-bought options. Perfect for any season, it’s a breeze to make and customize. Let’s blend up some fruity goodness today!
                </div>
            </div>
            <div class="post w-[calc(33.33%-20px)] space-y-7 mb-10">
                <img src="https://daylambanh.edu.vn/wp-content/uploads/2019/08/banh-kem-dau-tay-dep-mat.jpg" class="w-full" alt>
                <p id="time" class="text-2xl font-normal w-full">05/11/2024</p>
                <div class="title text-2xl font-bold"><a href="https://1001congthuclambanh.blogspot.com/2016/10/chia-se-quy-trinh-lam-banh-kem-trai-cay.html">Cake Decorating: Crafting Sweet Memories</a></div>
                <div class="description text-2xl font-normal">
                There’s nothing more delightful than a homemade cake, beautifully decorated to suit any celebration. From fluffy layers to creamy frosting, making a cake from scratch is easier than you think! Whether you’re a beginner or a seasoned baker, this guide will help you create a show-stopping centerpiece. Let’s get started on your cake masterpiece!
                </div>
            </div>
        </div>


    </div>
    {{-- pagination --}}
    <div class="flex items-center justify-center border-t border-gray-200 bg-white px-4 py-3 sm:px-6">
        <div class="flex flex-1 justify-center sm:justify-center">
            <nav class="isolate inline-flex -space-x-px rounded-md shadow-sm" aria-label="Pagination">
                <a href="#"
                    class="relative inline-flex items-center rounded-l-md px-2 py-2 text-gray-400 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0">
                    <span class="sr-only">Previous</span>
                    <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
                        <path fill-rule="evenodd"
                            d="M11.78 5.22a.75.75 0 0 1 0 1.06L8.06 10l3.72 3.72a.75.75 0 1 1-1.06 1.06l-4.25-4.25a.75.75 0 0 1 0-1.06l4.25-4.25a.75.75 0 0 1 1.06 0Z"
                            clip-rule="evenodd" />
                    </svg>
                </a>
                <a href="#" aria-current="page"
                    class="relative z-10 inline-flex items-center bg-yellow-200 px-4 py-2 text-2xl font-semibold text-white focus:z-20 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">1</a>
                <a href="#"
                    class="relative inline-flex items-center px-4 py-2 text-2xl font-semibold text-gray-900 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0">2</a>
                <a href="#"
                    class="relative hidden items-center px-4 py-2 text-2xl font-semibold text-gray-900 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0 md:inline-flex">3</a>
                <span
                    class="relative inline-flex items-center px-4 py-2 text-2xl font-semibold text-gray-700 ring-1 ring-inset ring-gray-300 focus:outline-offset-0">...</span>
                <a href="#"
                    class="relative hidden items-center px-4 py-2 text-2xl font-semibold text-gray-900 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0 md:inline-flex">8</a>
                <a href="#"
                    class="relative inline-flex items-center px-4 py-2 text-2xl font-semibold text-gray-900 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0">9</a>
                <a href="#"
                    class="relative inline-flex items-center px-4 py-2 text-2xl font-semibold text-gray-900 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0">10</a>
                <a href="#"
                    class="relative inline-flex items-center rounded-r-md px-2 py-2 text-gray-400 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0">
                    <span class="sr-only">Next</span>
                    <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
                        <path fill-rule="evenodd"
                            d="M8.22 5.22a.75.75 0 0 1 1.06 0l4.25 4.25a.75.75 0 0 1 0 1.06l-4.25 4.25a.75.75 0 0 1-1.06-1.06L11.94 10 8.22 6.28a.75.75 0 0 1 0-1.06Z"
                            clip-rule="evenodd" />
                    </svg>
                </a>
            </nav>
        </div>
    </div>

@endsection
