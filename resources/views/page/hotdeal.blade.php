@extends('layouts.master')

@section('title', 'Trang chủ')

@section('content')
<div class="hot-deal">
    <div class="search-bg relative flex items-center justify-center bg-cover bg-center h-72 md:h-[463px]"
        style="background-image: url('{{ asset('public/frontend/client/page/image/hotdeal.png') }}');">
    </div>
    <div class="text-center text-6xl font-black text py-6 mb-7 mx-auto mt-8" style="width: 30%; border-radius: 50px; background-color: #FFFDD0;">
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
                    style="font-size: 50px; line-height: 61px;" onclick="showDeals()">BUY
                    NOW</button>

            </div>
        </div>

    </div>
</div>
</div>
<script>
    const showDeals = () => {
        // Lấy các giá trị filter và sort
        const filters = 'dealnow';

        // Xây dựng URL mới với các tham số filter, sort và search
        let url = new URL(window.location.href);
        url.pathname = "/sweetoria/product"; // Cập nhật đường dẫn

        // Cập nhật tham số filter
        if (filters) {
            url.searchParams.set('filters', filters);
        } else {
            url.searchParams.delete('filters');
        }

        // Thêm tham số page (set page = 1)
        url.searchParams.set('page', 1);

        // Cập nhật URL mà không reload trang
        window.history.pushState({}, '', url);

        // Gửi yêu cầu lọc lại sản phẩm (bằng cách reload trang với URL mới)
        window.location.href = url.toString();
    }
</script>
@endsection