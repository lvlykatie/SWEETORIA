@extends('layouts.master')
<?php
session(['total' => $total]);
?>
@section('title', 'Payment method')
@section('content')
<div id="message"></div>
@if ($errors->any())
<div class="bg-red-500 text-white text-center p-4 rounded-md mb-5">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<style>
    .voucher-radio {
        width: 30px;
        height: 30px;
    }
</style>
<!-- Thông báo thành công khi lưu thông tin -->
@if (session('success'))
<div class="bg-green-500 text-white text-center p-4 rounded-md mb-5">
    {{ session('success') }}
</div>
@endif

<div class="mt-9">
    <div class="text-center text-6xl font-black rounded-3xl" style="background-color: #FFCCCC">
        PAYMENT METHOD
    </div>
    <div class="clientInfo">
        <div class="text-[40px] font-black text-center mt-5">
            Client Information
        </div>
        <div class="flex justify-center">
            <!-- {{ route('account.update') }} -->
            <form id="client-info-form" class="flex flex-col ml-6 md:w-[645px] items-center" method="POST"
                action="{{ url('/save-client-info') }}">
                @csrf
                <!-- @method('PUT') Sử dụng PUT để khớp với route -->
                <!-- Name -->
                <div class="flex items-center justify-between my-7">
                    <label class="text-[50px] md:text-5xl font-normal font-[Jomhuria] p-0 md:pr-12"
                        for="name">Name</label>
                    <input
                        class="md:placeholder:text-[50px] md:placeholder:flex md:placeholder:items-center md:placeholder:leading-[50px] font-[Jomhuria] text-black md:font-normal md:w-[490px] leading-[50px] h-[50px] rounded-[20px] md:h-[50px] border text-center text-[50px] font-normal"
                        style="background-color: #D9D9D9;" type="text" id="name" name="name"
                        value="{{ old('name', session('name', $user->user_name ?? '')) }}"
                        placeholder="Enter your name">
                </div>

                <!-- Email -->
                <div class="flex items-center justify-between my-7">
                    <label class="text-[50px] md:text-5xl font-normal font-[Jomhuria] p-0 md:pr-12"
                        for="email">Email</label>
                    <input
                        class="md:placeholder:text-[50px] md:placeholder:flex md:placeholder:items-center md:placeholder:leading-[50px] font-[Jomhuria] text-black md:font-normal md:w-[490px] leading-[50px] h-[50px] rounded-[20px] md:h-[50px] border text-center text-[50px] font-normal"
                        style="background-color: #D9D9D9;" type="email" id="email" name="email"
                        value="{{ old('email', session('email', $user->user_email ?? '')) }}"
                        placeholder="Enter your email">
                </div>

                <!-- Phone -->
                <div class="flex items-center justify-between my-7">
                    <label class="text-[50px] md:text-5xl font-normal font-[Jomhuria] p-0 md:pr-12"
                        for="phone">Phone</label>
                    <input
                        class="md:placeholder:text-[50px] md:placeholder:flex md:placeholder:items-center md:placeholder:leading-[50px] font-[Jomhuria] text-black md:font-normal md:w-[490px] leading-[50px] h-[50px] rounded-[20px] md:h-[50px] border text-center text-[50px] font-normal"
                        style="background-color: #D9D9D9;" type="tel" id="phone" name="phone"
                        value="{{ old('phone', session('phone', $user->user_phone ?? '')) }}"
                        placeholder="Enter your phone">
                </div>

                <!-- Address -->
                <div class="flex items-center justify-between my-7">
                    <label class="text-[50px] md:text-5xl font-normal font-[Jomhuria] p-0 md:pr-12"
                        for="address">Address</label>
                    <input
                        class="md:placeholder:text-[50px] md:placeholder:flex md:placeholder:items-center md:placeholder:leading-[50px] font-[Jomhuria] text-black md:font-normal md:w-[490px] leading-[50px] h-[50px] rounded-[20px] md:h-[50px] border text-center text-[50px] font-normal"
                        style="background-color: #D9D9D9;" type="text" id="address" name="address"
                        value="{{ old('address', session('address', $user->user_address ?? '')) }}"
                        placeholder="Enter your address">
                </div>
                <button type="submit"
                    class="w-[438px] h-[100px] text-[40px] font-black bg-black text-white rounded-[20px] flex items-center justify-center">
                    Save Information
                </button>
            </form>
        </div>
    </div>
    {{-- thanh ngang --}}
    <div class="flex justify-center mt-5">
        <div class="w-[80%] h-0.5 bg-black"></div>
    </div>
    {{-- Payment method --}}
    <div class="paymentDetail mt-5 flex">
        {{-- voucher --}}
        <div class="w-2/3">
            <div class="text-[40px] font-black text-center mt-5">
                Vouchers
            </div>
            <div class="list-voucher">
                @foreach ($vouchers as $voucher)
                <div
                    class="w-2/3 border border-blue-900 flex items-center p-2 rounded-[25px] mx-auto mt-5 justify-between">
                    <img src="{{ asset('public/frontend/admin/images/logo.png') }}" alt="Voucher Image" width="90"
                        height="90">
                    <div class="ml-4 flex flex-col space-y-4">
                        <!-- Tên Voucher -->
                        <div class="text-[32px] font-black text-center">{{ $voucher->voucher_name }}</div>

                        <!-- Mô tả giảm giá -->
                        <div class="description text-2xl">
                            Decrease {{ $voucher->discount_value }}% of total price
                        </div>

                        <!-- Thời gian hiệu lực -->
                        <div class="expire text-2xl">
                            Expiration:
                            <span>{{ \Carbon\Carbon::parse($voucher->startdate)->format('d/m/Y') }}</span> to
                            <span>{{ \Carbon\Carbon::parse($voucher->enddate)->format('d/m/Y') }}</span>
                        </div>
                    </div>
                    <div class="checkbox">
                        <input type="radio" name="voucher" value="{{ $voucher->voucher_id }}" class="voucher-radio"
                            data-discount-value="{{ $voucher->discount_value }}">
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        {{-- Invoice --}}
        <div class="w-2/3">
            <div class="text-[40px] font-black text-center mt-5">
                Invoice Detail
            </div>
            <div class="text-[32px] font-black text-center mt-5">
                Date: <span>{{ $date }}</span>
            </div>
            <div class="max-w-[564px] mx-auto bg-white rounded-md shadow-md p-4 text-2xl">
                <!-- Item 1 -->
                <div class="flex items-center justify-between py-2 border-b">
                    <div>
                        <p class="font-bold">Product Name</p>
                        <p class="text-gray-500">x Quantity</p>
                    </div>
                    <p class="font-bold">Price</p>
                </div>

                @foreach ($products as $product)
                <div class="flex items-center justify-between py-2 border-b">
                    <div>
                        <p class="font-bold">{{ $product['name'] }}</p>
                        <p class="text-gray-500">x {{ $product['quantity'] }}</p>
                    </div>
                    <p class="font-bold">{{ number_format($product['total'], 0, ',', '.') }} VND</p>
                </div>
                @endforeach

            </div>
        </div>

    </div>
    {{-- thanh ngang --}}
    <div class="flex justify-center mt-5">
        <div class="w-[80%] h-0.5 bg-black"></div>
    </div>
    {{-- Total --}}
    <div id="total" class="text-[28px] font-black text-center mt-5">
        Total: <span>{{ number_format($total, 0, ',', '.') }} VND</span>
    </div>
    <div class="bg-[#FFCCCC] text-[32px] font-black rounded-[20px] max-w-[528px] text-center">
        Choose your payment method
    </div>
    <div class="flex justify-between mx-40 mt-20">
        <div
            class="w-[438px] h-[100px] text-[40px] font-black bg-black text-white rounded-[20px] flex items-center justify-center">
            Cash on delivery
        </div>
        <a href="{{ url('/payment_momo') }}">
            <div
                class="w-[438px] h-[100px] text-[40px] font-black bg-black text-white rounded-[20px] flex items-center justify-center">
                Momo
            </div>
        </a>
    </div>
</div>

<!-- Thêm jQuery và AJAX script -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $('#client-info-form').on('submit', function(e) {
        e.preventDefault(); // Ngừng reload trang khi submit form

        var formData = $(this).serialize(); // Lấy dữ liệu form

        $.ajax({
            type: 'POST',
            url: $(this).attr('action'), // Đường dẫn tới controller saveClientInfo
            data: formData,
            success: function(response) {
                // Hiển thị thông báo thành công
                $('#message').html(
                    '<div class="bg-green-500 text-white text-center p-4 rounded-md mb-5">' +
                    response.success + '</div>');
            },
            error: function(xhr, status, error) {
                // Hiển thị lỗi nếu có
                $('#message').html(
                    '<div class="bg-red-500 text-white text-center p-4 rounded-md mb-5">Có lỗi xảy ra. Vui lòng thử lại!</div>'
                );
            }
        });

    });
</script>
<script>
    $(document).ready(function() {
        // Khi người dùng chọn hoặc bỏ chọn một voucher
        $('input[name="voucher"]').on('change', function() {
            // Nếu người dùng chọn một voucher
            if ($(this).prop('checked')) {
                // Bỏ chọn tất cả các voucher khác
                $('input[name="voucher"]').not(this).prop('checked', false);
            }

            // Cập nhật tổng sau khi chọn voucher
            updateTotal();
        });

        // Hàm cập nhật tổng sau khi chọn voucher
        function updateTotal() {
            var selectedVoucher = $('input[name="voucher"]:checked');
            var discountValue = selectedVoucher.data('discount') || 0; // Lấy giá trị giảm giá từ voucher
            var total = {
                {
                    $total
                }
            }; // Giá trị tổng hiện tại

            // Tính toán tổng mới sau khi áp dụng giảm giá
            total = total - (total * (discountValue / 100));

            // Cập nhật tổng tiền hiển thị trên trang
            $('#total').text(total.toFixed(0).replace(/\B(?=(\d{3})+(?!\d))/g, ',') + ' VND');

            // Gửi giá trị tổng về server để cập nhật session
            updateSessionTotal(total);
        }

        // Hàm gửi giá trị tổng về server để cập nhật session
        function updateSessionTotal(total) {
            $.ajax({
                url: '/apply-voucher', // URL cho yêu cầu API
                type: 'POST',
                data: {
                    total: total,
                    _token: $('meta[name="csrf-token"]').attr('content') // Thêm CSRF token
                }, // Gửi giá trị tổng
                success: function(response) {
                    console.log('Total updated in session:', response);
                },
                error: function(xhr, status, error) {
                    console.error('Error updating total in session:', error);
                }
            });
        }
    });
</script>
@endsection
