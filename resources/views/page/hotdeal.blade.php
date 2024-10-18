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
        <div class="px-40">
            {{-- hot 1 --}}
            <div class="text-left font-normal text-4xl">Mid Autumn Festive Sale!</div>
            <div class="flex flex-wrap gap-x-96 justify-around py-6">
                <div class="w-full md:w-1/3">
                    <div class="bg-yellow-100 text-center p-8 rounded-full w-full h-full flex justify-center items-center">
                        <p class="text-4xl text-gray-800 font-medium">
                            Enjoy maximum discounts on our exclusive Mid Autumn collection! Limited time offer from
                            31.08 to 18.09. Don't miss out on these fantastic deals!
                        </p>
                    </div>
                </div>
                <div class="w-full md:w-1/3">
                    <img src="{{ asset('public/frontend/client/page/image/Deal_1.png') }}" alt="Mid Autumn Festive Sale"
                        class="img-fluid">

                </div>
                <div class="flex flex-wrap pt-6 justify-end pr-[76px]">
                    <button class="text-center h-24 bg-red-500 rounded-2xl text-white font-black w-[320px]"
                        style="font-size: 50px; line-height: 61px;">BUY
                        NOW</button>
                </div>
            </div>
            {{-- hot deal2 --}}
            <div class="text-left font-normal text-4xl">Mid Autumn Festive Sale!</div>
            <div class="flex-wrap gap-x-96 flex justify-around py-6">

                <div class="w-full md:w-1/3">
                    <img src="{{ asset('public/frontend/client/page/image/Deal_1.png') }}" alt="Mid Autumn Festive Sale"
                        class="img-fluid">

                </div>
                <div class="w-full md:w-1/3">
                    <div class="bg-yellow-100 text-center  p-8 rounded-full w-full h-full flex justify-center items-center">
                        <p class="text-4xl text-gray-800 font-medium">
                            Enjoy maximum discounts on our exclusive Mid Autumn collection! Limited time offer from
                            31.08 to 18.09. Don't miss out on these fantastic deals!
                        </p>
                    </div>
                </div>
                <div class="flex-wrap pt-6 flex justify-start" style="padding-left: 58px">
                    <button class="text-center h-24 bg-red-500 rounded-2xl text-white font-black w-[320px]"
                        style="font-size: 50px; line-height: 61px;">BUY
                        NOW</button>
                </div>
            </div>
            {{-- hot 3 --}}
            <div class="text-left font-normal text-4xl">Mid Autumn Festive Sale!</div>
            <div class="flex-wrap gap-x-96 flex justify-around py-6">
                <div class="w-full md:w-1/3">
                    <div class="bg-yellow-100 text-center  p-8 rounded-full w-full h-full flex justify-center items-center">
                        <p class="text-4xl text-gray-800 font-medium">
                            Enjoy maximum discounts on our exclusive Mid Autumn collection! Limited time offer from
                            31.08 to 18.09. Don't miss out on these fantastic deals!
                        </p>
                    </div>
                </div>
                <div class="w-full md:w-1/3">
                    <img src="{{ asset('public/frontend/client/page/image/Deal_1.png') }}" alt="Mid Autumn Festive Sale"
                        class="img-fluid">

                </div>
                <div class="flex-wrap pt-6 flex justify-end" style="padding-right: 76px">
                    <button class="text-center h-24 bg-red-500 rounded-2xl text-white font-black"
                        style="font-size: 50px; line-height: 61px;width: 320px;">BUY
                        NOW</button>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
