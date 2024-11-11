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
        <div class="text-center text-6xl font-black rounded-3xl my-5 py-6 bg-[#FFFDD0]">
            Some recipes use this ingredient
        </div>
        <div class="products flex flex-col gap-y-10 items-center justify-center">
            {{-- 1 bài báo --}}
            <div class="flex items-center bg-[#FFFDD0] rounded-xl shadow-lg relative w-3/4 md:w-2/3 h-[200px] my-3">
                <!-- Image placeholder -->
                <img class="rounded-lg mr-4 w-[200px] h-[200px]"
                    src="{{ asset('public/frontend/client/page/image/post2.jpg') }}">

                <!-- Paper details -->
                <div class="self-start space-y-8">
                    <div class="ten-san-pham font-bold text-[30px] text-black mb-2">5+ Ways to make birthday cakes without
                        an oven for busy people</div>
                    <div class="description text-2xl font-medium"> Are you preparing to make a birthday cake for your
                        relatives or friends but
                        worried because you have no experience making birthday cakes? Don't worry, here are 8 great tips...
                    </div>
                </div>
            </div>
            <div class="flex items-center bg-[#FFFDD0] rounded-xl shadow-lg relative w-3/4 md:w-2/3 h-[200px] my-3">
                <!-- Image placeholder -->
                <img class="rounded-lg mr-4 w-[200px] h-[200px]"
                    src="{{ asset('public/frontend/client/page/image/post2.jpg') }}">

                <!-- Paper details -->
                <div class="self-start space-y-8">
                    <div class="ten-san-pham font-bold text-[30px] text-black mb-2">5+ Ways to make birthday cakes without
                        an oven for busy people</div>
                    <div class="description text-2xl font-medium"> Are you preparing to make a birthday cake for your
                        relatives or friends but
                        worried because you have no experience making birthday cakes? Don't worry, here are 8 great tips...
                    </div>
                </div>
            </div>
        </div>
        {{-- see more --}}
        <div class="flex justify-center mt-10">
            <div class="w-96 h-16 text-center text-black text-3xl font-black font-['Inter']">See more >></div>
        </div>
        <div class="w-96 h-20 text-center text-black text-4xl font-bold font-['Inter'] leading-normal tracking-wide">
            Similar products
        </div>
        <div class="flex flex-wrap">
            <div class="md:w-1/3 w-full flex flex-col items-center">
                <img src="{{ asset('public/backend/image/chocolate.png') }}" width="299" height="299"
                    style="width: 299px; height: 299px; object-fit: cover;" alt="Product Image">
                <div class="item-name text-3xl text-center font-extrabold">
                    Chocolate
                </div>
                <div class="price relative text-center pt-2">
                    <span class="text-3xl font-normal">140,000</span>
                    <div class="absolute bottom-0" style="right: -110px">
                        <svg xmlns="http://www.w3.org/2000/svg" width="29" height="100%" viewBox="0 0 33 30"
                            fill="none">
                            <path
                                d="M28.5398 18.75H12.254L12.6176 20.625H27.5297C28.3853 20.625 29.0195 21.4629 28.8299 22.3429L28.5234 23.7653C29.5618 24.2969 30.2778 25.4196 30.2778 26.7187C30.2778 28.547 28.8601 30.026 27.1209 29.9996C25.4641 29.9745 24.1014 28.5564 24.0567 26.8094C24.0323 25.8551 24.3948 24.9901 24.9902 24.3749H13.3431C13.9196 24.9706 14.2778 25.8003 14.2778 26.7187C14.2778 28.5828 12.804 30.0838 11.0183 29.9964C9.43278 29.9187 8.14328 28.5676 8.05995 26.8958C7.99561 25.6047 8.63972 24.4668 9.61834 23.8731L5.71572 3.75H1.83333C1.09694 3.75 0.5 3.12041 0.5 2.34375V1.40625C0.5 0.62959 1.09694 0 1.83333 0H7.52939C8.16278 0 8.70872 0.46998 8.83567 1.12441L9.34489 3.75H31.1661C32.0217 3.75 32.6559 4.58795 32.4663 5.46791L29.84 17.6554C29.7021 18.2957 29.1624 18.75 28.5398 18.75ZM23.1667 9.84375H20.5V7.5C20.5 6.98221 20.1021 6.5625 19.6111 6.5625H18.7222C18.2313 6.5625 17.8333 6.98221 17.8333 7.5V9.84375H15.1667C14.6757 9.84375 14.2778 10.2635 14.2778 10.7812V11.7187C14.2778 12.2365 14.6757 12.6562 15.1667 12.6562H17.8333V15C17.8333 15.5178 18.2313 15.9375 18.7222 15.9375H19.6111C20.1021 15.9375 20.5 15.5178 20.5 15V12.6562H23.1667C23.6576 12.6562 24.0556 12.2365 24.0556 11.7187V10.7812C24.0556 10.2635 23.6576 9.84375 23.1667 9.84375Z"
                                fill="black" />
                        </svg>
                    </div>
                </div>
            </div>
            <div class="md:w-1/3 w-full flex flex-col items-center">
                <img src="{{ asset('public/backend/image/chocolate.png') }}" width="299" height="299"
                    style="width: 299px; height: 299px; object-fit: cover;" alt="Product Image">
                <div class="item-name text-3xl text-center font-extrabold">
                    Chocolate
                </div>
                <div class="price relative text-center pt-2">
                    <span class="text-3xl font-normal">140,000</span>
                    <div class="absolute bottom-0" style="right: -110px">
                        <svg xmlns="http://www.w3.org/2000/svg" width="29" height="100%" viewBox="0 0 33 30"
                            fill="none">
                            <path
                                d="M28.5398 18.75H12.254L12.6176 20.625H27.5297C28.3853 20.625 29.0195 21.4629 28.8299 22.3429L28.5234 23.7653C29.5618 24.2969 30.2778 25.4196 30.2778 26.7187C30.2778 28.547 28.8601 30.026 27.1209 29.9996C25.4641 29.9745 24.1014 28.5564 24.0567 26.8094C24.0323 25.8551 24.3948 24.9901 24.9902 24.3749H13.3431C13.9196 24.9706 14.2778 25.8003 14.2778 26.7187C14.2778 28.5828 12.804 30.0838 11.0183 29.9964C9.43278 29.9187 8.14328 28.5676 8.05995 26.8958C7.99561 25.6047 8.63972 24.4668 9.61834 23.8731L5.71572 3.75H1.83333C1.09694 3.75 0.5 3.12041 0.5 2.34375V1.40625C0.5 0.62959 1.09694 0 1.83333 0H7.52939C8.16278 0 8.70872 0.46998 8.83567 1.12441L9.34489 3.75H31.1661C32.0217 3.75 32.6559 4.58795 32.4663 5.46791L29.84 17.6554C29.7021 18.2957 29.1624 18.75 28.5398 18.75ZM23.1667 9.84375H20.5V7.5C20.5 6.98221 20.1021 6.5625 19.6111 6.5625H18.7222C18.2313 6.5625 17.8333 6.98221 17.8333 7.5V9.84375H15.1667C14.6757 9.84375 14.2778 10.2635 14.2778 10.7812V11.7187C14.2778 12.2365 14.6757 12.6562 15.1667 12.6562H17.8333V15C17.8333 15.5178 18.2313 15.9375 18.7222 15.9375H19.6111C20.1021 15.9375 20.5 15.5178 20.5 15V12.6562H23.1667C23.6576 12.6562 24.0556 12.2365 24.0556 11.7187V10.7812C24.0556 10.2635 23.6576 9.84375 23.1667 9.84375Z"
                                fill="black" />
                        </svg>
                    </div>
                </div>
            </div>
            <div class="md:w-1/3 w-full flex flex-col items-center">
                <img src="{{ asset('public/backend/image/chocolate.png') }}" width="299" height="299"
                    style="width: 299px; height: 299px; object-fit: cover;" alt="Product Image">
                <div class="item-name text-3xl text-center font-extrabold">
                    Chocolate
                </div>
                <div class="price relative text-center pt-2">
                    <span class="text-3xl font-normal">140,000</span>
                    <div class="absolute bottom-0" style="right: -110px">
                        <svg xmlns="http://www.w3.org/2000/svg" width="29" height="100%" viewBox="0 0 33 30"
                            fill="none">
                            <path
                                d="M28.5398 18.75H12.254L12.6176 20.625H27.5297C28.3853 20.625 29.0195 21.4629 28.8299 22.3429L28.5234 23.7653C29.5618 24.2969 30.2778 25.4196 30.2778 26.7187C30.2778 28.547 28.8601 30.026 27.1209 29.9996C25.4641 29.9745 24.1014 28.5564 24.0567 26.8094C24.0323 25.8551 24.3948 24.9901 24.9902 24.3749H13.3431C13.9196 24.9706 14.2778 25.8003 14.2778 26.7187C14.2778 28.5828 12.804 30.0838 11.0183 29.9964C9.43278 29.9187 8.14328 28.5676 8.05995 26.8958C7.99561 25.6047 8.63972 24.4668 9.61834 23.8731L5.71572 3.75H1.83333C1.09694 3.75 0.5 3.12041 0.5 2.34375V1.40625C0.5 0.62959 1.09694 0 1.83333 0H7.52939C8.16278 0 8.70872 0.46998 8.83567 1.12441L9.34489 3.75H31.1661C32.0217 3.75 32.6559 4.58795 32.4663 5.46791L29.84 17.6554C29.7021 18.2957 29.1624 18.75 28.5398 18.75ZM23.1667 9.84375H20.5V7.5C20.5 6.98221 20.1021 6.5625 19.6111 6.5625H18.7222C18.2313 6.5625 17.8333 6.98221 17.8333 7.5V9.84375H15.1667C14.6757 9.84375 14.2778 10.2635 14.2778 10.7812V11.7187C14.2778 12.2365 14.6757 12.6562 15.1667 12.6562H17.8333V15C17.8333 15.5178 18.2313 15.9375 18.7222 15.9375H19.6111C20.1021 15.9375 20.5 15.5178 20.5 15V12.6562H23.1667C23.6576 12.6562 24.0556 12.2365 24.0556 11.7187V10.7812C24.0556 10.2635 23.6576 9.84375 23.1667 9.84375Z"
                                fill="black" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>



    </div>
@endsection
