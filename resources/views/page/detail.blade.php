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
                <div class="flex flex-wrap pt-6 justify-center">
                    <button class="text-center h-auto bg-red-500 rounded-2xl text-white font-black w-1/2 md:w-[300px]"
                        style="font-size: 50px; line-height: 61px;">BUY
                        NOW</button>
                </div>
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
        <div class="text-center text-6xl font-black rounded-3xl my-5" style="background-color: #FFCCCC">
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
            {{-- <div class="flex items-center bg-pink-200 rounded-xl shadow-lg relative" style="width: 900px; height: 200px;">
                <!-- Image placeholder -->
                <div class="bg-gray-300 rounded-lg mr-4" style="width: 200px; height: 200px;"></div>

                <!-- Paper details -->
                <div class="flex-grow text-center">
                    <h2 class="ten-san-pham font-bold text-black mb-2">Tiêu đề bài báo</h2>
                </div>
            </div> --}}
        </div>


    </div>

    </div>
@endsection
