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

                <!-- Lặp qua các đơn hàng -->
                @if ($orders->isEmpty())
                    <p class="text-center text-xl text-gray-500">You have no orders yet.</p>
                @else
                    @foreach ($orders as $order)
                        <div class="order flex flex-col md:w-[1135px] md:items-center gap-y-10 border border-gray-300">
                            <div class="w-full bg-gray-100 p-4 flex justify-between items-center">
                                <div>
                                    <h2 class="font-bold text-xl">Order #{{ $order->iv_id }}</h2>
                                    <p>Date: {{ $order->orderdate }}</p>
                                    <p>Status: <span class="text-blue-500">{{ $order->iv_status }}</span></p>
                                </div>
                                <div class="font-bold text-lg text-red-500">
                                    Total: {{ number_format($order->total_price, 0, ',', '.') }} VND
                                </div>
                            </div>

                            <!-- Hiển thị sản phẩm của đơn hàng -->
                            @foreach ($orderDetails->where('invoice_id', $order->iv_id) as $detail)
                                <div
                                    class="flex items-center rounded-xl shadow-lg relative bg-product w-full md:w-5/6 h-44 md:h-[200px] mt-6">
                                    <!-- Product Image -->
                                    <img src="{{ asset('public/backend/image/' . $detail->product->product_image) }}" alt="{{ $detail->product->product_name }}"
                                        class="rounded-lg mr-4 h-full w-[110px] md:w-[200px]" />

                                    <!-- Product details -->
                                    <div class="flex-grow">
                                        <h2 class="text-[64px] ten-san-pham font-normal text-black mb-2 font-[Jomhuria]">
                                            {{ $detail->product->product_name }}
                                        </h2>
                                        <div class="flex items-center space-x-4 font-[Jomhuria]">
                                            <p class="text-[64px] text-black">x{{ $detail->quantity }}</p>
                                        </div>
                                    </div>

                                    <!-- Price -->
                                    <div class="font-medium text-[30px] md:text-5xl absolute right-2 bottom-5">
                                        {{ number_format($detail->price * $detail->quantity, 0, ',', '.') }} VND
                                    </div>
                                </div>
                            @endforeach

                            {{-- Status --}}
                            <div class="text-[54px] font-[Jomhuria] self-end flex space-x-2">
                                <div
                                    class="md:w-[188px] md:h-[57px] border flex items-center justify-center bg-[#FFCACA]">Received</div>
                                <div
                                    class="md:w-[370px] md:h-[57px] border flex items-center justify-center">Return/Refunds request</div>
                                <div
                                    class="md:w-[188px] md:h-[57px] border flex items-center justify-center">Contact Seller</div>
                            </div>
                        </div>
                    @endforeach
                @endif


        </div>
    


@endsection

