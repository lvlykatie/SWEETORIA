@extends('layouts.master')

@section('title', 'Trang chủ')

@section('content')

    <div class="flex border border-gray-300 text-center text-[20px] font-normal font-[Joan] mt-16">
        <div class="flex-1 h-[105px] py-2 bg-red-100 font-bold text-black flex items-center justify-center cursor-pointer"
            data-type="all">All</div>
        <div class="flex-1 h-[105px] py-2 border-l border-gray-300 flex items-center justify-center cursor-pointer"
            data-type="transport">Transport</div>
        <div class="flex-1 h-[105px] py-2 border-l border-gray-300 flex items-center justify-center cursor-pointer"
            data-type="waiting">Waiting for delivery</div>
        <div class="flex-1 h-[105px] py-2 border-l border-gray-300 flex items-center justify-center cursor-pointer"
            data-type="complete">Complete</div>
        <div class="flex-1 h-[105px] py-2 border-l border-gray-300 flex items-center justify-center cursor-pointer"
            data-type="canceled">Canceled</div>
        <div class="flex-1 h-[105px] py-2 border-l border-gray-300 flex items-center justify-center cursor-pointer"
            data-type="returns">Returns/Refunds</div>
    </div>

    <div
        class="flex md:flex-row flex-col flex-wrap space-y-9 md:items-start px-7 md:mt-32 mt-16 mb-14 items-center justify-around ">


        {{-- 1 order --}}
        <div class="order flex flex-col md:w-[1135px] md:items-center gap-y-10 border border-gray-300">
            {{-- product --}}
            <div class="flex items-center rounded-xl shadow-lg relative bg-product w-full md:w-5/6 h-44 md:h-[200px] mt-6">
                <!-- Image placeholder -->
                <div class="bg-gray-300 rounded-lg mr-4 h-full w-[110px] md:w-[200px]"></div>

                <!-- Product details -->
                <div class="flex-grow">
                    <h2 class=" text-[64px] ten-san-pham font-normal text-black mb-2  font-[Jomhuria]">Tên spham</h2>
                    <div class="flex items-center space-x-4 font-[Jomhuria]">
                        <p class="text-[64px] text-black">X1</p>
                        {{-- <p class="text-xl text-black">Số lượng</p>
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
                        </div> --}}
                    </div>
                </div>

                <!-- Price -->
                <div class="font-medium text-[30px] md:text-5xl absolute right-2 bottom-5">
                    50000
                </div>
            </div>
            <div class="flex items-center rounded-xl shadow-lg relative bg-product w-full md:w-5/6 h-44 md:h-[200px] mt-6">
                <!-- Image placeholder -->
                <div class="bg-gray-300 rounded-lg mr-4 h-full w-[110px] md:w-[200px]"></div>

                <!-- Product details -->
                <div class="flex-grow">
                    <h2 class=" text-[64px] ten-san-pham font-normal text-black mb-2  font-[Jomhuria]">Tên spham</h2>
                    <div class="flex items-center space-x-4 font-[Jomhuria]">
                        <p class="text-[64px] text-black">X1</p>
                        {{-- <p class="text-xl text-black">Số lượng</p>
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
                        </div> --}}
                    </div>
                </div>

                <!-- Price -->
                <div class="font-medium text-[30px] md:text-5xl absolute right-2 bottom-5">
                    50000
                </div>
            </div>
            {{-- Total amount --}}
            <div class="text-[64px] font-[Jomhuria] self-end">
                <p class="font-normal opacity-50">Total amount: <span class="opacity-100">170,000</span></p>
            </div>
            {{-- status --}}
            <div class="text-[54px] font-[Jomhuria] self-end flex space-x-2">
                <div class="md:w-[188px] md:h-[57px] border flex items-center justify-center bg-[#FFCACA]">Received</div>
                <div class="md:w-[370px] md:h-[57px] border flex items-center justify-center">Return/Refunds request</div>
                <div class="md:w-[188px] md:h-[57px] border flex items-center justify-center">Contact Seller</div>
            </div>


        </div>


        {{-- 1 order --}}
        <div class="order flex flex-col md:w-[1135px] md:items-center gap-y-10 border border-gray-300">
            {{-- product --}}
            <div class="flex items-center rounded-xl shadow-lg relative bg-product w-full md:w-5/6 h-44 md:h-[200px] mt-6">
                <!-- Image placeholder -->
                <div class="bg-gray-300 rounded-lg mr-4 h-full w-[110px] md:w-[200px]"></div>

                <!-- Product details -->
                <div class="flex-grow">
                    <h2 class=" text-[64px] ten-san-pham font-normal text-black mb-2  font-[Jomhuria]">Tên spham</h2>
                    <div class="flex items-center space-x-4 font-[Jomhuria]">
                        <p class="text-[64px] text-black">X1</p>
                        {{-- <p class="text-xl text-black">Số lượng</p>
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
                        </div> --}}
                    </div>
                </div>

                <!-- Price -->
                <div class="font-medium text-[30px] md:text-5xl absolute right-2 bottom-5">
                    50000
                </div>
            </div>
            <div class="flex items-center rounded-xl shadow-lg relative bg-product w-full md:w-5/6 h-44 md:h-[200px] mt-6">
                <!-- Image placeholder -->
                <div class="bg-gray-300 rounded-lg mr-4 h-full w-[110px] md:w-[200px]"></div>

                <!-- Product details -->
                <div class="flex-grow">
                    <h2 class=" text-[64px] ten-san-pham font-normal text-black mb-2  font-[Jomhuria]">Tên spham</h2>
                    <div class="flex items-center space-x-4 font-[Jomhuria]">
                        <p class="text-[64px] text-black">X1</p>
                        {{-- <p class="text-xl text-black">Số lượng</p>
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
                        </div> --}}
                    </div>
                </div>

                <!-- Price -->
                <div class="font-medium text-[30px] md:text-5xl absolute right-2 bottom-5">
                    50000
                </div>
            </div>
            {{-- Total amount --}}
            <div class="text-[64px] font-[Jomhuria] self-end">
                <p class="font-normal opacity-50">Total amount: <span class="opacity-100">170,000</span></p>
            </div>
            {{-- status --}}
            <div class="text-[54px] font-[Jomhuria] self-end flex space-x-2">
                {{-- <div class="md:w-[188px] md:h-[57px] border flex items-center justify-center bg-[#FFCACA]">Received</div> --}}
                <div class="md:w-[370px] md:h-[57px] border flex items-center justify-center">Return/Refunds request</div>
                <div class="md:w-[188px] md:h-[57px] border flex items-center justify-center">Contact Seller</div>
            </div>


        </div>
    </div>
@endsection
