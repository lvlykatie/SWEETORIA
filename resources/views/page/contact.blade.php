@extends('layouts.master')

@section('title', 'Contact')

@section('content')
<div class="container mx-auto mt-10">
    <div class="flex flex-wrap">
        <!-- Store Addresses -->
        <div class="w-full md:w-2/3 p-4">
            <div
                class="contact w-[324px] h-[105px] bg-pink rounded-[50px] m-auto flex items-center justify-center font-bold text-[40px] mb-10">
                STORES
            </div>
            <div class="px-10 space-y-10">
                {{-- Store locations --}}
                @php
                $stores = [
                [
                'name' => 'Store 1',
                'address' => '1 Đường Hàn Thuyên, khu phố 6 P, Thủ Đức, Hồ Chí Minh',
                'phone' => '123456789',
                'hours' => '8:00 - 22:00',
                'map' => 'Đường Hàn Thuyên, khu phố 6 P, Thủ Đức, Hồ Chí Minh',
                ],
                [
                'name' => 'Store 2',
                'address' => '10-12 Đ. Đinh Tiên Hoàng, Bến Nghé, Quận 1, Hồ Chí Minh',
                'phone' => '987654321',
                'hours' => '9:00 - 21:00',
                'map' => '10-12 Đ. Đinh Tiên Hoàng, Bến Nghé, Quận 1, Hồ Chí Minh',
                ],
                ];
                @endphp

                @foreach ($stores as $store)
                <div class="flex store-item cursor-pointer" onclick="updateMap('{{ $store['map'] }}')">
                    <div class="store-img w-[421px] h-[300px] overflow-hidden">
                        <img src="{{ asset('public/frontend/client/page/image/store1.png') }}" class="w-full h-full object-cover" alt="">
                    </div>
                    <div class="store-info ml-[20px] flex flex-col justify-between space-y-6">
                        <div class="text-5xl font-bold text-center">{{ $store['name'] }}</div>
                        <div class="text-5xl">
                            <i class="fa-solid fa-location-dot"></i>
                            {{ $store['address'] }}
                        </div>
                        <div class="text-5xl">
                            <i class="fa-solid fa-phone"></i>
                            {{ $store['phone'] }}
                        </div>
                        <div class="text-5xl">
                            <i class="fa-regular fa-clock"></i>
                            {{ $store['hours'] }}
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <!-- Contact Form -->
        <div class="w-full md:w-1/3 p-4">
            <div
                class="contact w-[324px] h-[105px] bg-pink rounded-[50px] m-auto flex items-center justify-center font-bold text-[40px] mb-10">
                CONTACT
            </div>
            {{-- input group --}}
            <form class="m-auto">
                <div class="mb-5">
                    <label for="" class="text-5xl font-normal block mb-3">Email</label>
                    <input type="text" class="w-full h-[50px] border-2 border-black rounded-[20px] p-2 text-5xl">
                </div>
                <div class="mb-5">
                    <label for="" class="text-5xl font-normal block mb-3">Phone</label>
                    <input type="text" class="w-full h-[50px] border-2 border-black rounded-[20px] p-2 text-5xl">
                </div>
                <div class="mb-5">
                    <label for="" class="text-5xl font-normal block mb-3">Text</label>
                    <textarea type="text" class="w-full h-[202px] border-2 border-black rounded-[20px] p-4 text-5xl leading-tight"></textarea>
                </div>
                <div>
                    <button
                        class="w-[186px] bg-[#000000CC] h-[68px] rounded-[50px] m-auto flex items-center justify-center font-bold text-[42px] text-white">SEND</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Map -->
<div class="mt-10">
    <div class="mapouter">
        <div class="gmap_canvas">
            <iframe width="100%" height="272px" id="map" src="https://maps.google.com/maps?q=Số%20123,%20Đường%20Hoa%20Mai,%20Phường%202,%20Quận%20Phú%20Nhuận,%20TP.%20Hồ%20Chí%20Minh,%20Việt%20Nam&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
            <style>
                .mapouter {
                    position: relative;
                    text-align: right;
                    height: 272px;
                    width: 100%;
                }

                .gmap_canvas {
                    overflow: hidden;
                    background: none !important;
                    height: 272px;
                    width: 100%;
                }
            </style>
        </div>
    </div>
</div>
</div>
<script>
    function updateMap(address) {
        const map = document.getElementById('map');
        const encodedAddress = encodeURIComponent(address);
        const newSrc = `https://maps.google.com/maps?width=655&height=272&hl=en&q=${encodedAddress}&t=&z=14&ie=UTF8&iwloc=B&output=embed`;
        map.src = newSrc;
    }
</script>
@endsection