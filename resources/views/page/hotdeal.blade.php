@extends('layouts.master')

@section('title', 'Trang chủ')

@section('content')
    <div class="hot-deal">
        <div class="search-bg relative flex items-center justify-center bg-cover bg-center h-72 md:h-[463px]"
            style="background-image: url('{{ asset('public/frontend/client/page/image/homepagebg.png') }}');">
        </div>
        <div class="text-center text-6xl font-black rounded-3xl text my-5 py-6" style="background-color: #FFFDD0">
            HOT DEALS !!
        </div>
        <div class="px-14 mt-14 space-y-20">
            {{-- hot 1 --}}
            <div class="flex flex-wrap justify-around">
                <div class="w-full md:w-[745px] md:h-[559px]">
                    <img src="{{ asset('public/frontend/client/page/image/Deal_4.png') }}" alt="Mid Autumn Festive Sale"
                        width="100%" height="100%">

                </div>
                <div class="flex flex-col items-center">
                    <div class="md:w-[510px] md:h-[478px] font-[Inter] font-normal text-5xl leading-[50px] text-gray-800">
                        Get 20% off on our Donut Making Combo! All the ingredients you need to make delicious donuts at
                        home.
                        Hurry, limited time offer!
                    </div>

                    <button class="text-center h-24 bg-red-500 rounded-2xl text-white font-black w-[320px]"
                        style="font-size: 50px; line-height: 61px;">BUY
                        NOW</button>

                </div>
            </div>
            {{-- hot deal2 --}}
            <div class="flex flex-wrap justify-around">
                <div class="flex flex-col items-center">
                    <div class="md:w-[510px] md:h-[478px] font-[Inter] font-normal text-5xl leading-[50px] text-gray-800">
                        Get 20% off on our Donut Making Combo! All the ingredients you need to make delicious donuts at
                        home.
                        Hurry, limited time offer!
                    </div>

                    <button class="text-center h-24 bg-red-500 rounded-2xl text-white font-black w-[320px]"
                        style="font-size: 50px; line-height: 61px;">BUY
                        NOW</button>

                </div>
                <div class="w-full md:w-[745px] md:h-[559px]">
                    <img src="{{ asset('public/frontend/client/page/image/Deal_4.png') }}" alt="Mid Autumn Festive Sale"
                        width="100%" height="100%">

                </div>

            </div>
            {{-- hot 3 --}}
            <div class="flex flex-wrap justify-around">
                <div class="w-full md:w-[745px] md:h-[559px]">
                    <img src="{{ asset('public/frontend/client/page/image/Deal_4.png') }}" alt="Mid Autumn Festive Sale"
                        width="100%" height="100%">

                </div>
                <div class="flex flex-col items-center">
                    <div class="md:w-[510px] md:h-[478px] font-[Inter] font-normal text-5xl leading-[50px] text-gray-800">
                        Get 20% off on our Donut Making Combo! All the ingredients you need to make delicious donuts at
                        home.
                        Hurry, limited time offer!
                    </div>

                    <button class="text-center h-24 bg-red-500 rounded-2xl text-white font-black w-[320px]"
                        style="font-size: 50px; line-height: 61px;">BUY
                        NOW</button>

                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
