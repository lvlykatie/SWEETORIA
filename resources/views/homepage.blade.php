@extends('layouts.master')

@section('title', 'Trang chủ')

@section('content')
<div class="">
    <div class="search-bg relative flex items-center justify-center"
        style="background-image: url('{{ asset('public/frontend/client/page/image/homepagebg.png') }}');
        background-size: cover; background-position: center; height: 450px;">
        <div class="flex justify-center absolute bottom-20">
            <!-- Dropdown Location -->
            <div class="location bg-white w-24 rounded-lg mr-10">
                <div class="inline-block relative">
                    <label for="location" class="block text-s text-center text-gray-500 mb-1 pb-1 pt-2">Location</label>
                    <select id="location"
                        class="appearance-none text-center w-full pr-9 bg-white font-medium rounded-md py-2 text-sm text-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-400 focus:border-gray-400">
                        <option value="TPHCM">TP.HCM</option>
                        <option value="HN">Hà Nội</option>
                        <option value="DN">Đà Nẵng</option>
                    </select>
                    <div style="bottom: 7px; right: -3px;"
                        class="pointer-events-none absolute flex items-center px-2 text-gray-700">
                        <svg xmlns="http://www.w3.org/2000/svg" width="17" height="11" viewBox="0 0 17 11"
                            fill="none">
                            <path
                                d="M16 2.11417L8.46976 10L1 2.15751L2.0625 1.0444L8.47077 7.77378L14.9395 1L16 2.11417Z"
                                fill="#001A37" stroke="black" stroke-opacity="0.5" stroke-width="0.5" />
                        </svg>
                    </div>
                </div>
            </div>
            <!-- Search Form -->
            <form class="relative flex items-center" action="" method="get">
                <input style="height: 52px; width: 643px; border-radius:20px; font-size:16px; line-heigh: 24px"
                    type="text" class="text-center" placeholder="What you want to buy?" />
                <button type="submit" class="absolute right-4 w-6 h-6">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </button>
            </form>
        </div>
        I
    </div>
    {{-- hot deal --}}
    <div class="hot-deal my-16 mx-16 rounded-3xl" style="background-color: #FFFDD0;">
        <div class="text-center font-black text-6xl py-12">Hot Deals</div>
        <div class="hotdeal-images row gap-32 px-6 py-16">
            <div class="col-md ">
                <img class="" src="{{ asset('public/frontend/client/page/image/Deal_1.png') }}" alt="Hot Deal 1">
            </div>
            <div class="col-md ">
                <img class="w-full" src="{{ asset('public/frontend/client/page/image/Deal_2.png') }}" alt="Hot Deal 2">
            </div>
            <div class="col-md ">
                <img class="w-full" src="{{ asset('public/frontend/client/page/image/Deal_3.png') }}" alt="Hot Deal 3">
            </div>

        </div>
    </div>
    {{-- categories --}}
    <div class="categories">
        <div class="text-center text-6xl font-black rounded-3xl text" style="background-color: #FFCCCC">
            Categories
        </div>
        <div class="categories-items">
            <div class="row mt-10">
                <div class="col-6 flex flex-col justify-center">
                    <div class="flex justify-center">
                        <img src="{{ asset('public/frontend/client/page/image/category1.png') }}" width="auto"
                            alt="Baking ingredients">
                    </div>
                    <div class=" text-center text-5xl py-6 font-extrabold"> Baking ingredientss</div>
                </div>
                <div class="col-6 flex flex-col justify-center">
                    <div class="flex justify-center">
                        <img src="{{ asset('public/frontend/client/page/image/category1.png') }}" width="auto"
                            alt="Baking ingredients">
                    </div>
                    <div class=" text-center text-5xl py-6 font-extrabold"> Baking ingredientss</div>
                </div>
            </div>
            <div class="row mt-10">
                <div class="col-6 flex flex-col justify-center">
                    <div class="flex justify-center">
                        <img src="{{ asset('public/frontend/client/page/image/category1.png') }}" width="auto"
                            alt="Baking ingredients">
                    </div>
                    <div class="text-center text-5xl py-6 font-extrabold"> Baking ingredientss</div>
                </div>
                <div class="col-6 flex flex-col justify-center">
                    <div class="flex justify-center">
                        <img src="{{ asset('public/frontend/client/page/image/category1.png') }}" width="auto"
                            alt="Baking ingredients">
                    </div>
                    <div class=" text-center text-5xl py-6 font-extrabold"> Baking ingredients</div>
                </div>
            </div>
        </div>
    </div>
    {{-- best seller    --}}
    <div class="best_seller my-16">
        <div class="text-center text-6xl font-black rounded-3xl text" style="background-color: #FFFDD0">
            Best Seller
        </div>
        <div class="best-seller_items my-16 rounded-3xl" style="background-color: #FCC">
            <div class="row py-16 justify-content-between">
                <div class="col-md-3 d-flex flex-column align-items-center">
                    <img src="{{ asset('public/frontend/client/page/image/bestsell.png') }}" width="299" />
                    <div class="item-name text-3xl text-center font-extrabold">
                        Whipping cream Anchor
                    </div>
                    <div class="price relative text-center pt-2">
                        <span class="text-3xl font-normal">200,000</span>
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
                <div class="col-md-3 d-flex flex-column align-items-center">
                    <img src="{{ asset('public/frontend/client/page/image/bestsell.png') }}" width="299" />
                    <div class="item-name text-3xl text-center font-extrabold">
                        Whipping cream Anchor
                    </div>
                    <div class="price relative text-center pt-2">
                        <span class="text-3xl font-normal">200,000</span>
                        <div class="absolute bottom-0" style="right: -110px">
                            <svg xmlns="http://www.w3.org/2000/svg" width="29" height="100%"
                                viewBox="0 0 33 30" fill="none">
                                <path
                                    d="M28.5398 18.75H12.254L12.6176 20.625H27.5297C28.3853 20.625 29.0195 21.4629 28.8299 22.3429L28.5234 23.7653C29.5618 24.2969 30.2778 25.4196 30.2778 26.7187C30.2778 28.547 28.8601 30.026 27.1209 29.9996C25.4641 29.9745 24.1014 28.5564 24.0567 26.8094C24.0323 25.8551 24.3948 24.9901 24.9902 24.3749H13.3431C13.9196 24.9706 14.2778 25.8003 14.2778 26.7187C14.2778 28.5828 12.804 30.0838 11.0183 29.9964C9.43278 29.9187 8.14328 28.5676 8.05995 26.8958C7.99561 25.6047 8.63972 24.4668 9.61834 23.8731L5.71572 3.75H1.83333C1.09694 3.75 0.5 3.12041 0.5 2.34375V1.40625C0.5 0.62959 1.09694 0 1.83333 0H7.52939C8.16278 0 8.70872 0.46998 8.83567 1.12441L9.34489 3.75H31.1661C32.0217 3.75 32.6559 4.58795 32.4663 5.46791L29.84 17.6554C29.7021 18.2957 29.1624 18.75 28.5398 18.75ZM23.1667 9.84375H20.5V7.5C20.5 6.98221 20.1021 6.5625 19.6111 6.5625H18.7222C18.2313 6.5625 17.8333 6.98221 17.8333 7.5V9.84375H15.1667C14.6757 9.84375 14.2778 10.2635 14.2778 10.7812V11.7187C14.2778 12.2365 14.6757 12.6562 15.1667 12.6562H17.8333V15C17.8333 15.5178 18.2313 15.9375 18.7222 15.9375H19.6111C20.1021 15.9375 20.5 15.5178 20.5 15V12.6562H23.1667C23.6576 12.6562 24.0556 12.2365 24.0556 11.7187V10.7812C24.0556 10.2635 23.6576 9.84375 23.1667 9.84375Z"
                                    fill="black" />
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 d-flex flex-column align-items-center">
                    <img src="{{ asset('public/frontend/client/page/image/bestsell.png') }}" width="299" />
                    <div class="item-name text-3xl text-center font-extrabold">
                        Whipping cream Anchor
                    </div>
                    <div class="price relative text-center pt-2">
                        <span class="text-3xl font-normal">200,000</span>
                        <div class="absolute bottom-0" style="right: -110px">
                            <svg xmlns="http://www.w3.org/2000/svg" width="29" height="100%"
                                viewBox="0 0 33 30" fill="none">
                                <path
                                    d="M28.5398 18.75H12.254L12.6176 20.625H27.5297C28.3853 20.625 29.0195 21.4629 28.8299 22.3429L28.5234 23.7653C29.5618 24.2969 30.2778 25.4196 30.2778 26.7187C30.2778 28.547 28.8601 30.026 27.1209 29.9996C25.4641 29.9745 24.1014 28.5564 24.0567 26.8094C24.0323 25.8551 24.3948 24.9901 24.9902 24.3749H13.3431C13.9196 24.9706 14.2778 25.8003 14.2778 26.7187C14.2778 28.5828 12.804 30.0838 11.0183 29.9964C9.43278 29.9187 8.14328 28.5676 8.05995 26.8958C7.99561 25.6047 8.63972 24.4668 9.61834 23.8731L5.71572 3.75H1.83333C1.09694 3.75 0.5 3.12041 0.5 2.34375V1.40625C0.5 0.62959 1.09694 0 1.83333 0H7.52939C8.16278 0 8.70872 0.46998 8.83567 1.12441L9.34489 3.75H31.1661C32.0217 3.75 32.6559 4.58795 32.4663 5.46791L29.84 17.6554C29.7021 18.2957 29.1624 18.75 28.5398 18.75ZM23.1667 9.84375H20.5V7.5C20.5 6.98221 20.1021 6.5625 19.6111 6.5625H18.7222C18.2313 6.5625 17.8333 6.98221 17.8333 7.5V9.84375H15.1667C14.6757 9.84375 14.2778 10.2635 14.2778 10.7812V11.7187C14.2778 12.2365 14.6757 12.6562 15.1667 12.6562H17.8333V15C17.8333 15.5178 18.2313 15.9375 18.7222 15.9375H19.6111C20.1021 15.9375 20.5 15.5178 20.5 15V12.6562H23.1667C23.6576 12.6562 24.0556 12.2365 24.0556 11.7187V10.7812C24.0556 10.2635 23.6576 9.84375 23.1667 9.84375Z"
                                    fill="black" />
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 d-flex flex-column align-items-center">
                    <img src="{{ asset('public/frontend/client/page/image/bestsell.png') }}" width="299" />
                    <div class="item-name text-3xl text-center font-extrabold">
                        Whipping cream Anchor
                    </div>
                    <div class="price relative text-center pt-2">
                        <span class="text-3xl font-normal">200,000</span>
                        <div class="absolute bottom-0" style="right: -110px">
                            <svg xmlns="http://www.w3.org/2000/svg" width="29" height="100%"
                                viewBox="0 0 33 30" fill="none">
                                <path
                                    d="M28.5398 18.75H12.254L12.6176 20.625H27.5297C28.3853 20.625 29.0195 21.4629 28.8299 22.3429L28.5234 23.7653C29.5618 24.2969 30.2778 25.4196 30.2778 26.7187C30.2778 28.547 28.8601 30.026 27.1209 29.9996C25.4641 29.9745 24.1014 28.5564 24.0567 26.8094C24.0323 25.8551 24.3948 24.9901 24.9902 24.3749H13.3431C13.9196 24.9706 14.2778 25.8003 14.2778 26.7187C14.2778 28.5828 12.804 30.0838 11.0183 29.9964C9.43278 29.9187 8.14328 28.5676 8.05995 26.8958C7.99561 25.6047 8.63972 24.4668 9.61834 23.8731L5.71572 3.75H1.83333C1.09694 3.75 0.5 3.12041 0.5 2.34375V1.40625C0.5 0.62959 1.09694 0 1.83333 0H7.52939C8.16278 0 8.70872 0.46998 8.83567 1.12441L9.34489 3.75H31.1661C32.0217 3.75 32.6559 4.58795 32.4663 5.46791L29.84 17.6554C29.7021 18.2957 29.1624 18.75 28.5398 18.75ZM23.1667 9.84375H20.5V7.5C20.5 6.98221 20.1021 6.5625 19.6111 6.5625H18.7222C18.2313 6.5625 17.8333 6.98221 17.8333 7.5V9.84375H15.1667C14.6757 9.84375 14.2778 10.2635 14.2778 10.7812V11.7187C14.2778 12.2365 14.6757 12.6562 15.1667 12.6562H17.8333V15C17.8333 15.5178 18.2313 15.9375 18.7222 15.9375H19.6111C20.1021 15.9375 20.5 15.5178 20.5 15V12.6562H23.1667C23.6576 12.6562 24.0556 12.2365 24.0556 11.7187V10.7812C24.0556 10.2635 23.6576 9.84375 23.1667 9.84375Z"
                                    fill="black" />
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection