@extends('layouts.master')

@section('title', 'Trang chủ')

@section('content')


<div id="menu" class="flex border border-gray-300 text-center text-[20px] font-normal font-[Joan] mt-16">
        <div class="item flex-1 h-[105px] py-2 bg-red-100 font-bold text-black flex items-center justify-center cursor-pointer"
            data-type="all">All</div>
        <div class="item flex-1 h-[105px] py-2 border-l border-gray-300 flex items-center justify-center cursor-pointer"
            data-type="pending">Pending</div>
        <div class="item flex-1 h-[105px] py-2 border-l border-gray-300 flex items-center justify-center cursor-pointer"
            data-type="paid">Paid</div>
        <div class="item flex-1 h-[105px] py-2 border-l border-gray-300 flex items-center justify-center cursor-pointer"
            data-type="dispatched">Dispatched</div>
        <div class="item flex-1 h-[105px] py-2 border-l border-gray-300 flex items-center justify-center cursor-pointer"
            data-type="returned">Returned</div>
        <div class="item flex-1 h-[105px] py-2 border-l border-gray-300 flex items-center justify-center cursor-pointer"
            data-type="completed">Completed</div>
</div>

<div
    class="order-container flex md:flex-row flex-col flex-wrap space-y-9 md:items-start px-7 md:mt-32 mt-16 mb-14 items-center justify-around ">

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
        <div class="product flex justify-between w-full p-4">
            <div class="flex items-center">
                <img src="{{ filter_var($detail->product->product_image, FILTER_VALIDATE_URL) ? $detail->product->product_image : asset('public/backend/image/' . $detail->product->product_image) }}" alt="{{ $detail->product->product_name }}" class="w-20 h-20 object-cover rounded">
                <div class="ml-4">
                    <h3 class="font-bold">{{ $detail->product->product_name }}</h3>
                    <p>Quantity: {{ $detail->quantity }}</p>
                    <p>Price: {{ number_format($detail->price, 0, ',', '.') }} VND</p>
                </div>
            </div>
            <div class="flex items-center">
                <p class="font-bold">{{ number_format($detail->quantity * $detail->price, 0, ',', '.') }} VND</p>
            </div>
        </div>
        @endforeach
    </div>
    @endforeach
    @endif
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        // Sự kiện click vào item trong menu
        $('#menu .item').click(function() {
            // Xóa class bg-red-100 khỏi tất cả các item
            $('#menu .item').removeClass('bg-red-100 font-bold text-black');

            // Thêm class bg-red-100 cho item được click
            $(this).addClass('bg-red-100 font-bold text-black');

            // Lấy loại trạng thái từ data-type
            let status = $(this).data('type');

                // Gửi yêu cầu AJAX để lấy dữ liệu
                $.ajax({
                    url: '{{ route("orders.status") }}',
                    type: 'GET',
                    success: function(response) {
                        // Xóa nội dung cũ
                        $('.order-container')
                    .empty(); // Xóa tất cả nội dung cũ, bao gồm thông báo nếu có

                    if (response.orders.length === 0) {
                        $('.order-container').html(
                            '<p class="text-center text-xl text-gray-500">No orders found for this status.</p>'
                        );
                    } else {
                        // Render lại danh sách orders
                        response.orders.forEach(order => {
                            let orderDetails = response.orderDetails.filter(
                                detail => detail.invoice_id === order.iv_id);
                            let orderHtml = `
                            <div class="order flex flex-col md:w-[1135px] md:items-center gap-y-10 border border-gray-300">
                                <div class="w-full bg-gray-100 p-4 flex justify-between items-center">
                                    <div>
                                        <h2 class="font-bold text-xl">Order #${order.iv_id}</h2>
                                        <p>Date: ${order.orderdate}</p>
                                        <p>Status: <span class="text-blue-500">${order.iv_status}</span></p>
                                    </div>
                                    <div class="font-bold text-lg text-red-500">
                                        Total: ${new Intl.NumberFormat('vi-VN').format(order.total_price)} VND
                                    </div>
                                </div>
                                ${orderDetails.map(detail => `
                                                        <div class="flex items-center rounded-xl shadow-lg relative bg-product w-full md:w-5/6 h-44 md:h-[200px] mt-6">
                                                            <img src="/public/backend/image/${detail.product.product_image}" alt="${detail.product.product_name}" class="rounded-lg mr-4 h-full w-[110px] md:w-[200px]" />
                                                            <div class="flex-grow">
                                                                <h2 class="text-[64px] ten-san-pham font-normal text-black mb-2 font-[Jomhuria]">${detail.product.product_name}</h2>
                                                                <div class="flex items-center space-x-4 font-[Jomhuria]">
                                                                    <p class="text-[64px] text-black">x${detail.quantity}</p>
                                                                </div>
                                                            </div>
                                                            <div class="font-medium text-[30px] md:text-5xl absolute right-2 bottom-5">
                                                                ${new Intl.NumberFormat('vi-VN').format(detail.price * detail.quantity)} VND
                                                            </div>
                                                        </div>
                                                    `).join('')}
                            </div>
                        `;
                            $('.order-container').append(orderHtml);
                        });
                    }
                },
                error: function(e) {
                    alert('Failed to fetch orders. Please try again.', e);
                }
            });
        });
    });
</script>



@endsection
