@extends('layouts.master')

@section('title', 'Contact')

@section('content')
    <div class="mt-16">
        <div
            class="contact w-[324px] h-[105px] bg-pink rounded-[50px] m-auto flex items-center justify-center font-bold text-[40px]">
            CONTACT
        </div>
        {{-- input group --}}
        <form class="m-auto mt-10 md:w-[966px]">
            <div class="flex justify-between items-center">
                <label for="" class="text-5xl h-[60px] w-[80px] font-normal mr-16 flex items-center">Email</label>
                <input type="text" class="w-[727px] h-[50px] border-2 border-black rounded-[20px] p-2 text-5xl">
            </div>
            <div class="flex justify-between items-center">
                <label for="" class="text-5xl h-[60px] w-[80px] font-normal mr-16 flex items-center">Phone</label>
                <input type="text" class="w-[727px] h-[50px] border-2 border-black rounded-[20px] p-2 text-5xl">
            </div>
            <div class="flex justify-between items-center">
                <label for="" class="text-5xl h-[60px] w-[80px] font-normal mr-16 flex items-center">Text</label>
                <textarea type="text" class="w-[727px] h-[202px] border-2 border-black rounded-[20px] p-4 text-5xl leading-tight">
                </textarea>
            </div>
            <div>
                <button
                    class="md:w-[186px] bg-[#000000CC] h-[68px] rounded-[50px] m-auto flex items-center justify-center font-bold text-[42px] text-white mt-10">SEND</button>
            </div>
        </form>
        <div
            class="contact w-[324px] h-[105px] bg-pink rounded-[50px] m-auto mt-20 flex items-center justify-center font-bold text-[40px]">
            STORES
        </div>
        <div class="px-20 mt-20 space-y-10 flex flex-wrap justify-center">
            {{-- 1 store --}}
            <div class="flex">
                <div class="store-img">
                    <img src="{{ asset('public/frontend/client/page/image/store1.png') }}" width="421" alt="">
                </div>
                <div class="store-info ml-[105px] md:w-[1366px] flex flex-col justify-between space-y-6">
                    <div class="text-5xl font-bold text-center">Store 1</div>
                    <div class="text-5xl">
                        <i class="fa-solid fa-location-dot"></i>
                        Số 123, Đường Hoa Mai, Phường 2, Quận Phú Nhuận, TP. Hồ Chí Minh, Việt Nam
                    </div>
                    <div class="text-5xl">
                        <i class="fa-solid fa-phone"></i>
                        123456789
                    </div>
                    <div class="text-5xl">
                        <i class="fa-regular fa-clock"></i>
                        8:00 - 22:00
                    </div>
                </div>
            </div>
            {{-- 1  --}}
            <div class="flex">
                <div class="store-img">
                    <img src="{{ asset('public/frontend/client/page/image/store1.png') }}" width="421" alt="">
                </div>
                <div class="store-info ml-[105px] md:w-[1366px] flex flex-col justify-between space-y-6">
                    <div class="text-5xl font-bold text-center">Store 1</div>
                    <div class="text-5xl">
                        <i class="fa-solid fa-location-dot"></i>
                        Số 123, Đường Hoa Mai, Phường 2, Quận Phú Nhuận, TP. Hồ Chí Minh, Việt Nam
                    </div>
                    <div class="text-5xl">
                        <i class="fa-solid fa-phone"></i>
                        123456789
                    </div>
                    <div class="text-5xl">
                        <i class="fa-regular fa-clock"></i>
                        8:00 - 22:00
                    </div>
                </div>
            </div>
            {{-- 1  --}}
            <div class="flex">
                <div class="store-img">
                    <img src="{{ asset('public/frontend/client/page/image/store1.png') }}" width="421" alt="">
                </div>
                <div class="store-info ml-[105px] md:w-[1366px] flex flex-col justify-between space-y-6">
                    <div class="text-5xl font-bold text-center">Store 1</div>
                    <div class="text-5xl">
                        <i class="fa-solid fa-location-dot"></i>
                        Số 123, Đường Hoa Mai, Phường 2, Quận Phú Nhuận, TP. Hồ Chí Minh, Việt Nam
                    </div>
                    <div class="text-5xl">
                        <i class="fa-solid fa-phone"></i>
                        123456789
                    </div>
                    <div class="text-5xl">
                        <i class="fa-regular fa-clock"></i>
                        8:00 - 22:00
                    </div>
                </div>
            </div>

        </div>


    </div>
@endsection
