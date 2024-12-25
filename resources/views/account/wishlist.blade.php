@extends('layouts.master')

@section('title', 'Wishlist')

@section('content')
    <div class="flex px-7 mt-32 mb-14 justify-around ">

        <div class="products flex flex-col items-center w-full gap-y-10">
            {{-- Bắt đầu vòng lặp để hiển thị sản phẩm được thêm vào wishlist --}}
            @foreach ($wishlistItems as $wishlistItem)
                <div class="flex items-center rounded-xl shadow-lg relative bg-product w-full md:w-2/3 h-44 md:h-[200px]"
                    data-product-id="{{ $wishlistItem->product_id }}">

                    <!-- Product Image -->
                    <img 
                    src="{{ filter_var($wishlistItem->product->product_image, FILTER_VALIDATE_URL) ? $wishlistItem->product->product_image : asset('public/backend/image/' . $wishlistItem->product->product_image) }}" 
                    alt="{{ $wishlistItem->product->product_name }}" 
                    class="rounded-lg mr-4 h-full w-[110px] md:w-[200px]"
                    >


                    <!-- Product Details -->
                    <div class="flex-grow">
                        <h2 class="text-[36px] ten-san-pham font-bold text-black mb-24">
                            {{ $wishlistItem->product->product_name }}
                        </h2>
                    </div>

                    <!-- Product Price -->
                    <div class="product-total-price text-red-800 text-5xl font-light md:text-5xl absolute right-2 bottom-0">
                        {{ number_format($wishlistItem->product->product_price, 0, ',', '.') }} VND
                    </div>
                    
                    <!-- Remove from Wishlist -->
                    <div class="absolute right-2 top-2 cursor-pointer hover:text-[#D65050]">
                        <i class="fa-solid fa-trash text-[36px] remove-wishlist-item" 
                            data-product-id="{{ $wishlistItem->product_id }}"></i>
                    </div>
                </div>
            @endforeach

        </div>

    </div>
@endsection
