<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thanh toán Momo</title>
</head>
<?php
$total = session('total');
?>
<body>
    <h1>Thanh toán thử nghiệm với Momo</h1>
    <form action="{{ url('/payment/momo') }}" method="GET">
        @csrf
        <h1>Thanh toán số tiền:</h1> <span>{{ number_format($total, 0, ',', '.') }} VND</span>  
        <button type="submit" class="w-[438px] h-[100px] text-[40px] font-black bg-black text-white rounded-[20px] flex items-center justify-center">
            Xác nhận thanh toán</button>
    </form>
</body>
</html>
