@extends('layouts.master')

@section('title', 'Product detail')
@section('content')
    <div class="mt-32 mb-14">
        <div class="text-center text-6xl font-black rounded-3xl my-5" style="background-color: #FFCCCC">
            PRODUCT DESCRIPTION
        </div>
        <div class="flex gap-x-28 justify-center">
            <div class="w-full md:w-[485px] flex flex-col">
                <div class="img w-full relative">
                    <img src="{{ $product->product_image }}" width="100%" alt="Whipping Cream Anchor" />
                    {{-- sale --}}
                    <div
                        class="bg-[#004FA8] w-[128px] h-[36px] rounded-tr-[20px] rounded-br-[20px] flex justify-center items-center absolute left-0 top-4">
                        <i class="fa-solid fa-bolt text-yellow-300 mr-5"></i>
                        <span class="text-white text-2xl font-bold">SALE <span>-35%</span></span>
                    </div>
                    {{-- best seller --}}
                    <div
                        class="md:w-[148px] md:h-[30px] bg-[#FFCB06] flex justify-center items-center rounded-xl absolute bottom-0 right-0">
                        <span class="text-2xl text-center font-bold text-black">BEST SELLER
                            <i class="fa-solid fa-circle-check text-[#004FA8]"></i>
                        </span>
                    </div>
                    <div class="text-3xl font-normal absolute left-0 bottom-0">
                        <i class="fa-solid fa-star text-yellow-300"></i>
                        <span>4.9</span>
                    </div>
                </div>
                <div class="md:h-[85px] font-[Jomhuria] text-[64px] font-normal mt-4 text-center">
                    {{ $product->product_name }}
                </div>
                <div class="md:h-auto font-[Jomhuria] text-[64px] font-normal text-center">
                    {{ $product->product_price }}
                </div>
                <div class="flex items-center justify-around">
                    <i class="fa-regular fa-heart text-[40px]"></i>
                    <div class="flex border-y border-x border-[#979797] text-2xl font-bold md:h-14 ">
                        <div class="flex items-center w-[56px] justify-center border-r border-[#979797] bg-[#FFDEDE]">
                            -
                        </div>
                        <div class="flex items-center w-[56px] justify-center border-r border-[#979797]">
                            1
                        </div>
                        <div class="flex items-center w-[56px] justify-center bg-[#FFDEDE]">
                            +
                        </div>
                    </div>
                    <i class="fa-solid fa-cart-plus text-[40px]"></i>
                </div>
                <button
                    class="md:w-full font-semibold mt-4 md:h-[60px] text-[48px] text-white bg-[#D65050] rounded-[60px] flex items-center justify-center">
                    <span>BUY NOW</span>
                </button>

            </div>
            <div class="w-full md:w-[570px] flex flex-col font-[Inter] text-[32px] font-normal leading-[60px]">
                {{-- product description --}}
                <div id="origin">
                    <span class="font-extrabold">Origin: </span>
                    <span>New Zealand</span>
                </div>
                <div id="weight">
                    <span class="font-extrabold">Weight: </span>
                    <span>1kg</span>
                </div>
                {{-- storage --}}
                <div id="storage">
                    <span class="font-extrabold">Storage: </span>
                    <span>Keep in the fridge</span>
                </div>
                {{-- expiration --}}
                <div id="expiration">
                    <span class="font-extrabold">Expiration: </span>
                    <span>12 months from the date of production. After opening, Anchor cream cheese should be used within 7
                        days.</span>
                </div>
            </div>
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
                {{ $product->product_desc }}
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
                        <div class="h-32 w-32 rounded-full overflow-hidden">
                            <img src="{{ asset('frontend/client/page/image/avatartest.png') }}" alt="Avatar">
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
                <!-- send review -->
                <div class="w-full mx-auto p-4 border rounded-md shadow-sm mt-10">
                    <textarea
                        class="w-full p-2 border border-gray-300 rounded-md resize-none focus:outline-none focus:ring-2 focus:ring-blue-500 text-2xl font-normal"
                        rows="4" placeholder="Type your topic here"></textarea>

                    <div class="flex items-center justify-between mt-4">
                        <div class="flex items-center">
                            <button
                                class="w-[116px] h-[80px] border border-gray-300 flex items-center justify-center focus:outline-none hover:bg-gray-100"
                                aria-label="Upload image">
                                <i class="fa-solid fa-camera text-[40px]"></i>
                            </button>

                            <div class="h-32 w-32 rounded-full overflow-hidden ml-10">
                                <img src="{{ asset('frontend/client/page/image/avatartest.png') }}" alt="Avatar">
                            </div>
                            <p class="text-gray-600 mt-2 text-4xl ml-8">Thanh</p>

                        </div>
                        {{-- star --}}
                        <div class="flex items-center">
                            <div class="flex items-center space-x-1 text-yellow-400 text-4xl">
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                            </div>
                        </div>
                        <button
                            class="w-[192px] h-[82px] text-3xl font-normal bg-[#ffcccc] text-black rounded-md hover:opacity-80">
                            Send
                        </button>
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
    <div id="productContainer" class="flex gap-x-[45px] overflow-hidden justify-center">
        @foreach ($related_product as $item)
            <div class="md:w-[356px] h-[507px] w-full flex flex-col items-center bg-[#FFDEDE80] rounded-[28px] relative ">
                {{-- sale --}}
                <div
                    class="bg-[#004FA8] w-[128px] h-[36px] rounded-tr-[20px] rounded-br-[20px] flex justify-center items-center absolute left-0 top-4">
                    <i class="fa-solid fa-bolt text-yellow-300 mr-5"></i>
                    <span class="text-white text-2xl font-bold">SALE <span>-35%</span></span>
                </div>
                {{-- best seller --}}
                <div
                    class="md:w-[148px] md:h-[30px] bg-[#FFCB06] flex justify-center items-center rounded-xl absolute bottom-[185px] right-0">
                    <span class="text-2xl text-center font-bold text-black">BEST SELLER
                        <i class="fa-solid fa-circle-check text-[#004FA8]"></i>
                    </span>

                </div>
                <a href="{{ route('detail', ['id' => $item->product_id]) }}" class="cursor-pointer">
                    <img src="{{ filter_var($item->product_image, FILTER_VALIDATE_URL) ? $item->product_image : asset('public/backend/image/' . $item->product_image) }}"
                        class="hover:scale-90 w-[305px] h-auto mt-6 ml-6 mr-6  object-cover rounded-[20px]"
                        alt="Product Image">
                </a>
                <div class="item-name text-3xl text-center font-bold mt-8">
                    <a href="{{ route('detail', ['id' => $item->product_id]) }}" class="text-black hover:underline">
                        {{ $item->product_name }}
                    </a>
                </div>
                <div class="price relative w-full pt-2 ml-6 flex justify-between mt-6">
                    <span
                        class="text-3xl ml-[20px] font-medium">{{ number_format($item->product_price, 0, ',', '.') . ' VND' }}
                    </span>
                    <span class="text-3xl font-normal">
                        <i class="fa-solid fa-star text-yellow-300"></i>
                        <span>{{ $item->product_rate }}</span>
                    </span>

                    <!-- icon thêm giỏ hàng -->
                    <div class="mr-[35px]">
                        <svg xmlns="http://www.w3.org/2000/svg" width="29" height="100%" viewBox="0 0 33 30"
                            fill="none" id="addToCartIcon" class="add-to-cart-icon"
                            data-product-id="{{ $product->product_id }}" data-product-name="{{ $item->product_name }}"
                            data-product-price="{{ $item->product_price }}">
                            <path
                                d="M28.5398 18.75H12.254L12.6176 20.625H27.5297C28.3853 20.625 29.0195 21.4629 28.8299 22.3429L28.5234 23.7653C29.5618 24.2969 30.2778 25.4196 30.2778 26.7187C30.2778 28.547 28.8601 30.026 27.1209 29.9996C25.4641 29.9745 24.1014 28.5564 24.0567 26.8094C24.0323 25.8551 24.3948 24.9901 24.9902 24.3749H13.3431C13.9196 24.9706 14.2778 25.8003 14.2778 26.7187C14.2778 28.5828 12.804 30.0838 11.0183 29.9964C9.43278 29.9187 8.14328 28.5676 8.05995 26.8958C7.99561 25.6047 8.63972 24.4668 9.61834 23.8731L5.71572 3.75H1.83333C1.09694 3.75 0.5 3.12041 0.5 2.34375V1.40625C0.5 0.62959 1.09694 0 1.83333 0H7.52939C8.16278 0 8.70872 0.46998 8.83567 1.12441L9.34489 3.75H31.1661C32.0217 3.75 32.6559 4.58795 32.4663 5.46791L29.84 17.6554C29.7021 18.2957 29.1624 18.75 28.5398 18.75ZM23.1667 9.84375H20.5V7.5C20.5 6.98221 20.1021 6.5625 19.6111 6.5625H18.7222C18.2313 6.5625 17.8333 6.98221 17.8333 7.5V9.84375H15.1667C14.6757 9.84375 14.2778 10.2635 14.2778 10.7812V11.7187C14.2778 12.2365 14.6757 12.6562 15.1667 12.6562H17.8333V15C17.8333 15.5178 18.2313 15.9375 18.7222 15.9375H19.6111C20.1021 15.9375 20.5 15.5178 20.5 15V12.6562H23.1667C23.6576 12.6562 24.0556 12.2365 24.0556 11.7187V10.7812C24.0556 10.2635 23.6576 9.84375 23.1667 9.84375Z"
                                fill="black" />
                        </svg>
                    </div>
                    <!-- icon thêm giỏ hàng -->
                </div>
                <button
                    class="md:w-[330px] font-semibold mt-4 md:h-[60px] text-2xl text-white bg-[#D65050] rounded-[60px]">
                    <span class="px-4 py-8">BUY NOW</span>
                </button>
            </div>
        @endforeach
    </div>

    </div>

@endsection
