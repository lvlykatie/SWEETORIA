<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thanh toán Momo</title>
    <link rel="icon" href="{{ asset('public/frontend/admin/images/logo.png') }}" type="image/x-icon">
</head>
<?php
$total = session('total');
$name = session('name');
$phone = session('phone');
$address = session('address');
?>

<body>
@if ($errors->any())
    <div class="bg-red-500 text-white text-center p-4 rounded-md mb-5">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif



    <h1>Thanh toán với Momo</h1>
    <form action="{{ url('/payment/momo') }}" method="POST">
        @csrf
        <!-- Thêm các trường input ẩn chứa thông tin -->
        <input type="hidden" name="name" value="{{ $name }}">
        <input type="hidden" name="phone" value="{{ $phone }}">
        <input type="hidden" name="address" value="{{ $address }}">
        <input type="hidden" name="total" value="{{ $total }}">
        <h1>Thanh toán số tiền:</h1> <span>{{ number_format($total, 0, ',', '.') }} VND</span>  
        <button type="submit" class="w-[438px] h-[100px] text-[40px] font-black bg-black text-white rounded-[20px] flex items-center justify-center">
            Xác nhận thanh toán</button>
    </form>
</body>
</html>
