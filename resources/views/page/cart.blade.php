@extends('layouts.master')

@section('title', 'Cart')

@section('content')
    <div class="flex px-7 mt-32 mb-14  justify-around ">



        {{-- product --}}
        <div class="products flex flex-col gap-y-10">
            <div class="flex items-center rounded-xl shadow-lg relative bg-product" style="width: 900px; height:200px">
                <!-- Checkbox -->
                <input type="checkbox" class="mr-4 ml-2 h-6 w-6">
                <!-- Image placeholder -->
                <div class="bg-gray-300 rounded-lg mr-4" style="width: 200px; height:200px"></div>

                <!-- Product details -->
                <div class="flex-grow">
                    <h2 class="ten-san-pham font-bold text-black mb-2">Tên spham</h2>
                    <div class="flex items-center space-x-4">
                        <p class="text-xl text-black">Số lượng</p>
                        <!-- Quantity controls -->
                        <div class="flex items-center rounded-md py-10">
                            <button class="px-2 py-1 bg-gray-100 hover:bg-gray-200"><svg xmlns="http://www.w3.org/2000/svg"
                                    width="22" height="22" viewBox="0 0 22 22" fill="none">
                                    <path d="M15.2319 10.986H6.73926" stroke="#004FA8" stroke-width="2.12316"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                </svg></button>
                            <span class="px-4 text-2xl">1</span>
                            <button class="px-2 py-1 bg-gray-100 hover:bg-gray-200"><svg xmlns="http://www.w3.org/2000/svg"
                                    width="22" height="22" viewBox="0 0 22 22" fill="none">
                                    <path
                                        d="M11.2659 6.73999V10.9863M11.2659 15.2326V10.9863M11.2659 10.9863H15.5122M11.2659 10.9863H7.01953"
                                        stroke="#004FA8" stroke-width="2.12316" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg></button>
                        </div>
                    </div>
                </div>

                <!-- Price -->
                <div class="text-red-500 text-5xl font-bold absolute right-2 bottom-0">
                    50000
                </div>
            </div>
            <div class="flex items-center rounded-xl shadow-lg relative bg-product" style="width: 900px; height:200px">
                <!-- Checkbox -->
                <input type="checkbox" class="mr-4 ml-2 h-6 w-6">
                <!-- Image placeholder -->
                <div class="bg-gray-300 rounded-lg mr-4" style="width: 200px; height:200px"></div>

                <!-- Product details -->
                <div class="flex-grow">
                    <h2 class="ten-san-pham font-bold text-black mb-2">Tên spham</h2>
                    <div class="flex items-center space-x-4">
                        <p class="text-xl text-black">Số lượng</p>
                        <!-- Quantity controls -->
                        <div class="flex items-center rounded-md py-10">
                            <button class="px-2 py-1 bg-gray-100 hover:bg-gray-200"><svg xmlns="http://www.w3.org/2000/svg"
                                    width="22" height="22" viewBox="0 0 22 22" fill="none">
                                    <path d="M15.2319 10.986H6.73926" stroke="#004FA8" stroke-width="2.12316"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                </svg></button>
                            <span class="px-4 text-2xl">1</span>
                            <button class="px-2 py-1 bg-gray-100 hover:bg-gray-200"><svg xmlns="http://www.w3.org/2000/svg"
                                    width="22" height="22" viewBox="0 0 22 22" fill="none">
                                    <path
                                        d="M11.2659 6.73999V10.9863M11.2659 15.2326V10.9863M11.2659 10.9863H15.5122M11.2659 10.9863H7.01953"
                                        stroke="#004FA8" stroke-width="2.12316" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg></button>
                        </div>
                    </div>
                </div>

                <!-- Price -->
                <div class="text-red-500 text-5xl font-bold absolute right-2 bottom-0">
                    50000
                </div>
            </div>
            <div class="flex items-center rounded-xl shadow-lg relative bg-product" style="width: 900px; height:200px">
                <!-- Checkbox -->
                <input type="checkbox" class="mr-4 ml-2 h-6 w-6">
                <!-- Image placeholder -->
                <div class="bg-gray-300 rounded-lg mr-4" style="width: 200px; height:200px"></div>

                <!-- Product details -->
                <div class="flex-grow">
                    <h2 class="ten-san-pham font-bold text-black mb-2">Tên spham</h2>
                    <div class="flex items-center space-x-4">
                        <p class="text-xl text-black">Số lượng</p>
                        <!-- Quantity controls -->
                        <div class="flex items-center rounded-md py-10">
                            <button class="px-2 py-1 bg-gray-100 hover:bg-gray-200"><svg xmlns="http://www.w3.org/2000/svg"
                                    width="22" height="22" viewBox="0 0 22 22" fill="none">
                                    <path d="M15.2319 10.986H6.73926" stroke="#004FA8" stroke-width="2.12316"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                </svg></button>
                            <span class="px-4 text-2xl">1</span>
                            <button class="px-2 py-1 bg-gray-100 hover:bg-gray-200"><svg xmlns="http://www.w3.org/2000/svg"
                                    width="22" height="22" viewBox="0 0 22 22" fill="none">
                                    <path
                                        d="M11.2659 6.73999V10.9863M11.2659 15.2326V10.9863M11.2659 10.9863H15.5122M11.2659 10.9863H7.01953"
                                        stroke="#004FA8" stroke-width="2.12316" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg></button>
                        </div>
                    </div>
                </div>

                <!-- Price -->
                <div class="text-red-500 text-5xl font-bold absolute right-2 bottom-0">
                    50000
                </div>
            </div>
            <div class="row pt-6 flex justify-end" style="padding-right: 76px">
                <button class="text-center  bg-red-500 rounded-2xl text-white font-black"
                    style="font-size: 50px; line-height: 61px;max-width: 400px;">
                    <span>Total: 50000</span>
                    <br>
                    BUY
                    NOW</button>
            </div>
        </div>

    </div>
@endsection
