@extends('layouts.master')

@section('title', 'Trang chủ')

@section('content')
    <div class="flex md:flex-row flex-col md:items-start px-7 md:mt-32 mt-16 mb-14 items-center justify-around ">
        {{-- navbar --}}
        <div class="flex-row flex md:flex-col">
            <div class="bg-yellow-100 text-center border-b hover:bg-gray-200 cursor-pointer">
                <a href="{{ route('account') }}" class=" text-2xl md:text-4xl font-bold p-8 block">Account</a>
            </div>
            <div class="bg-yellow-100 text-center border-b hover:bg-gray-200 cursor-pointer">
                <a href="{{ route('orders') }}" class=" text-2xl md:text-4xl font-bold p-8 block">My orders</a>
            </div>
            <div class="bg-yellow-100 text-center border-b hover:bg-gray-200 cursor-pointer">
                <a href="{{ route('changepw') }}" class=" text-2xl md:text-4xl font-bold p-8 block">Change password</a>
            </div>
            <div class="bg-yellow-100 text-center border-b hover:bg-gray-200 cursor-pointer">
                <a href="{{ route('policy') }}" class=" text-2xl md:text-4xl font-bold p-8 block">Policy</a>
            </div>
        </div>


        <div class="products flex flex-col w-full md:items-center gap-y-10">
            {{-- product --}}
            <div class="flex items-center rounded-xl shadow-lg relative bg-product w-full md:w-2/3 h-44 md:h-[200px] mt-6">
                <!-- Image placeholder -->
                <div class="bg-gray-300 rounded-lg mr-4 h-full w-[110px] md:w-[200px]"></div>

                <!-- Product details -->
                <div class="flex-grow">
                    <h2 class=" text-4xl ten-san-pham font-bold text-black mb-2">Tên spham</h2>
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
                <div class="text-red-500 text-3xl md:text-5xl font-bold absolute right-2 bottom-0">
                    50000
                </div>
            </div>
            <div class="flex items-center rounded-xl shadow-lg relative bg-product w-full md:w-2/3 h-44 md:h-[200px] mt-6">
                <!-- Image placeholder -->
                <div class="bg-gray-300 rounded-lg mr-4 h-full w-[110px] md:w-[200px]"></div>

                <!-- Product details -->
                <div class="flex-grow">
                    <h2 class=" text-4xl ten-san-pham font-bold text-black mb-2">Tên spham</h2>
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
                <div class="text-red-500 text-3xl md:text-5xl font-bold absolute right-2 bottom-0">
                    50000
                </div>
            </div>

        </div>

    </div>
@endsection
