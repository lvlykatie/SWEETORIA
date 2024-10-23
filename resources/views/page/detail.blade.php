@extends('layouts.master')

@section('title', 'Product')
@section('content')
    <div class="mt-32 mb-14">
        <div class="text-center text-6xl font-black rounded-3xl my-5" style="background-color: #FFCCCC">
            PRODUCT DESCRIPTION
        </div>
        <div class="flex justify-around">
            <div class="w-full md:w-1/3 flex flex-col items-center">
                <img src="{{ asset('public/frontend/client/page/image/bestsell.png') }}" width="299"
                    alt="Whipping Cream Anchor" />
                <div class="item-name text-3xl text-center font-extrabold">
                    Whipping cream Anchor
                </div>
                <div class="price relative text-center pt-2">
                    <span class="text-3xl font-normal">148,000</span>
                </div>
                {{-- <div class="flex flex-wrap pt-6 justify-center">
                    <button class="text-center w-1/2 h-auto bg-red-500 rounded-2xl text-white font-black w-1/2 md:w-[300px]"
                        style="font-size: 50px; line-height: 61px;">BUY
                        NOW</button>
                </div> --}}

            </div>
            <div class="w-full md:w-1/3">
                <div class="text-left mt-4">
                    <p class="text-black font-inter text-2xl font-normal leading-[60px] tracking-[0.5px]">
                        <strong>Origin:</strong> New Zealand
                    </p>
                    <p class="text-black font-inter text-2xl font-normal leading-[60px] tracking-[0.5px]">
                        <strong>Weight:</strong> 1000g
                    </p>
                    <p class="text-black font-inter text-2xl font-normal leading-[60px] tracking-[0.5px]">
                        <strong>Storage:</strong> Refrigerate
                    </p>
                    <p class="text-black font-inter text-2xl font-normal leading-[60px] tracking-[0.5px]">
                        <strong>Expiration:</strong> 12 months from the date of production. After opening, Anchor cream
                        cheese should be used within 7 days.
                    </p>

                </div>
            </div>

        </div>
        {{-- 2 cái nút --}}
        <div class="flex mt-7">
            <div class="w-1/2 flex justify-center">
                <button class="text-center h-auto bg-red-500 rounded-2xl text-white font-black w-1/2 md:w-[300px]"
                    style="font-size: 50px; line-height: 61px;">ADD CART
                </button>
            </div>
            <div class="w-1/2 flex justify-center">
                <button class="text-center h-auto bg-red-500 rounded-2xl text-white font-black w-1/2 md:w-[300px]"
                    style="font-size: 50px; line-height: 61px;">BUY
                    NOW</button>
            </div>
        </div>

        {{-- thanh ngang --}}
        <hr class=" mt-20 h-1 bg-black">
        <div class="flex flex-wrap justify-center">
            {{-- 2 cai nut --}}
            <div class="w-full flex justify-center">
                <div class="describe w-1/5 text-5xl  font-black text-center bg-pink cursor-pointer"
                    onclick="toggleTab('describe')">
                    <button class="p-7">Describe</button>
                </div>
                <div class="review w-1/5 text-5xl  font-black text-center cursor-pointer" onclick="toggleTab('review')">
                    <button class="p-7">Review</button>
                </div>
            </div>
            <div class="w-5/6">
                <div class="bg-textgray text-description text-2xl font-bold p-3 border-t-4 border-yellow-200 transition-opacity duration-500 opacity-100"
                    id="describeTab">
                    Product Description:
                    <br>
                    Whipping Cream Anchor 1L is a premium-quality fresh cream imported from New Zealand, offering superior
                    quality and a perfect richness. With a high fat content, this cream whips quickly, holds its shape well,
                    and delivers a naturally rich and creamy flavor. It’s an ideal ingredient for a variety of baked goods,
                    mousses, cake decorations, and high-end desserts.
                    <br>
                    Ingredients: Pure fresh cream with a high fat content.
                    <br>
                    Uses: Suitable for whipping, cake decoration, beverage mixing, or preparing desserts like mousse and
                    tiramisu. <br>
                    Benefits: Easy to whip, retains shape for extended periods, and provides a smooth, beautiful texture.
                    Its naturally rich and creamy flavor is perfect for many different recipes.
                    <br>
                    Storage Instructions: <br>
                    Storage: Keep refrigerated, do not freeze. <br>
                    Shelf Life: 12 months from the production date. Once opened, it should be used within 7 days to maintain
                    freshness <br>
                    Overall Review: <br>
                    Anchor Whipping Cream 1L is trusted by many professional chefs and bakers worldwide. With its smooth
                    whipping consistency and rich, creamy flavor, this product helps create perfect desserts and baked
                    goods.
                </div>
                {{-- reviews --}}
                <div class="border-t-4 border-yellow-200 hidden opacity-0 transition-opacity duration-500" id="reviewTab">
                    <div class="flex">
                        <div class="w-1/2 flex justify-center text-3xl">
                            <div class="w-1/2 flex flex-col">
                                <div class="flex items-center mt-4 ">
                                    <i class="fa-solid fa-star" style="color: yellow"></i>
                                    <span class="mx-3">5</span>
                                    <div class="w-1/4 h-full rounded-lg" style="background-color: #FFCCCC"></div>
                                    <!-- thêm chiều cao cho thanh -->
                                    <span class="mx-3">25%</span>
                                </div>
                                <div class="flex items-center mt-4 ">
                                    <i class="fa-solid fa-star" style="color: yellow"></i>
                                    <span class="mx-3">4</span>
                                    <div class="w-1/2 h-full rounded-lg" style="background-color: #FFCCCC"></div>
                                    <span class="mx-3">50%</span>
                                </div>
                                <div class="flex items-center mt-4 ">
                                    <i class="fa-solid fa-star" style="color: yellow"></i>
                                    <span class="mx-3">3</span>
                                    <div class="w-1/6 h-full rounded-lg" style="background-color: #FFCCCC"></div>
                                    <span class="mx-3">16,7%</span>
                                </div>
                                <div class="flex items-center mt-4 ">
                                    <i class="fa-solid fa-star" style="color: yellow"></i>
                                    <span class="mx-3">2</span>
                                    <div class="w-1/12 h-full rounded-lg" style="background-color: #FFCCCC"></div>
                                    <span class="mx-3">10%</span>
                                </div>
                                <div class="flex items-center my-4 ">
                                    <i class="fa-solid fa-star" style="color: yellow"></i>
                                    <span class="mx-3">1</span>
                                    <div class="w-1/12 h-full rounded-lg" style="background-color: #FFCCCC"></div>
                                    <span class="mx-3">5%</span>
                                </div>
                            </div>

                        </div>
                        {{-- 4 sao --}}
                        <div class="w-1/2 flex flex-col items-center justify-center">

                            <div class="flex">
                                <i class="fa-solid fa-star text-7xl" style="color: yellow"></i>
                                <span class="text-7xl font-black">4.0</span>
                            </div>
                            <div class="">
                                <span class="px-2">4</span>Reviews
                            </div>

                        </div>
                    </div>
                    {{-- 1 review --}}
                    <div class="flex items-start justify-center w-2/3 space-x-4 mt-8">
                        <!-- Avatar -->
                        <div class="flex flex-col items-center">
                            <div class=" h-32 w-32 rounded-full overflow-hidden">
                                <img src="{{ asset('public/frontend/client/page/image/avatartest.png') }}" alt="Avatar">
                            </div>
                            <p class="text-gray-600 mt-2 text-4xl">Thư</p>
                        </div>

                        <!-- Nội dung đánh giá -->
                        <div>
                            <div class="flex items-center space-x-2 text-3xl">
                                <!-- Icon ngôi sao và điểm số -->
                                <i class="fa-solid fa-star text-yellow-400"></i>
                                <span class="font-semibold">5.0</span>
                            </div>
                            <p class="text-3xl mt-6">Nguyên liệu ngon đến mức mình còn muốn ăn sống luôn!</p>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- các bài báo -->
        <div class="text-center text-6xl font-black rounded-3xl my-5 py-6" style="background-color: #FFCCCC">
            Some recipes use this ingredient
        </div>
        {{-- 1 bài báo --}}
        <div class="products flex flex-col gap-y-10 items-center justify-center">
            <div class="flex items-center bg-pink-200 rounded-xl shadow-lg relative w-3/4 md:w-2/3 h-[200px] my-3">
                <!-- Image placeholder -->
                <div class="bg-gray-300 rounded-lg mr-4" style="width: 200px; height: 200px;"></div>

                <!-- Paper details -->
                <div class="flex-grow text-center">
                    <h2 class="ten-san-pham font-bold text-black mb-2">Tiêu đề bài báo</h2>
                </div>
            </div>
            <div class="flex items-center bg-pink-200 rounded-xl shadow-lg relative w-3/4 md:w-2/3 h-[200px] my-3">
                <!-- Image placeholder -->
                <div class="bg-gray-300 rounded-lg mr-4" style="width: 200px; height: 200px;"></div>

                <!-- Paper details -->
                <div class="flex-grow text-center">
                    <h2 class="ten-san-pham font-bold text-black mb-2">Tiêu đề bài báo</h2>
                </div>
            </div>
        </div>


    </div>
@endsection
