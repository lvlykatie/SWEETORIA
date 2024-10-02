@extends('layouts.master')

@section('title', 'Product')
@section('content')
    <div id="product">
        <div class="search-bg relative flex items-center justify-center"
            style="background-image: url('{{ asset('public/frontend/client/page/image/homepagebg.png') }}');
        background-size: cover; background-position: center; height: 450px;">
        </div>
        <div class="filter w-full p-6 bg-white shadow-md rounded-md">
            <div class="row">
                <div class="col-6 pl-16">
                    <div class="row text-3xl font-black">
                        Filter
                    </div>
                    <div class="row gap-7 mt-4">
                        <div class="col-12 text-3xl font-extrabold flex items-center">
                            <input type="checkbox" style="width: 30px; height: 30px;" name="" id="">
                            <label class="pl-8" for="">Baking ingredients </label>
                        </div>
                        <div class="col-12 text-3xl font-extrabold flex items-center">
                            <input type="checkbox" style="width: 30px; height: 30px;" name="" id="">
                            <label class="pl-8" for="">Baking ingredients </label>
                        </div>
                    </div>


                </div>
                <div class="col-6 text-3xl">
                    <div class="row flex justify-center ">
                        <button class="w-1/6 text-3xl font-black rounded-xl bg-gray-500">Clear filter</button>
                    </div>
                    <div class="row pl-16 gap-7 mt-4">
                        <div class="col-12 text-3xl font-extrabold flex items-center">
                            <input type="checkbox" class="rounded-md" style="width: 30px; height: 30px; border-radius: 5px;"
                                name="" id="">
                            <label class="pl-8" for="">Baking ingredients </label>
                        </div>
                        <div class="col-12 text-3xl font-extrabold flex items-center">
                            <input type="checkbox" style="width: 30px; height: 30px;" name="" id="">
                            <label class="pl-8" for="">Baking ingredients </label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row text-3xl font-black mt-4 " style="padding-left: 32px">
                Price
            </div>
            <div class="row mt-4">
                <div class="col-6 pl-16 text-3xl font-extrabold flex items-center">
                    <input type="checkbox" style="width: 30px; height: 30px;" name="" id="">
                    <label class="pl-8" for="">Low to high </label>
                </div>
                <div class="col-6 text-3xl font-extrabold flex items-center" style="padding-left: 48px">
                    <input type="checkbox" style="width: 30px; height: 30px;" name="" id="">
                    <label class="pl-8" for="">High to low</label>
                </div>
            </div>
        </div>
        <div class="text-center text-6xl font-black rounded-3xl text" style="background-color: #FFFDD0">
            Products
        </div>
        <div class="product-list">
            <div class="row">
                <div class="col-md-4 d-flex flex-column align-items-center">
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
                <div class="col-md-4 flex flex-column align-items-center">
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
                <div class="col-md-4 d-flex flex-column align-items-center">
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
            </div>
        </div>
    @endsection
