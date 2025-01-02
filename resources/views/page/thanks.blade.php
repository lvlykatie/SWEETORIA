<!DOCTYPE html>
<html lang="en">
<head>
<link rel="icon" href="{{ asset('public/frontend/admin/images/logo.png') }}" type="image/x-icon">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thanh toán thành công</title>
    <style>
        body {
            font-family: sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-color: #f0f0f0; /* Màu nền trang */
        }

        .modal {
            background-color: white;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
            position: relative; /* Để định vị nút đóng */
            border: 4px solidrgb(0, 0, 0); /* Viền dden*/
        }

        .close-button {
            position: absolute;
            top: 10px;
            right: 10px;
            cursor: pointer;
            font-size: 20px;
            font-weight: bold;
        }

        .message-box {
            background-color: #ffe6e6; /* Màu hồng nhạt */
            padding: 20px;
            border-radius: 20px;
            text-align: center;
            margin-bottom: 20px;
        }

        .message-box p {
          margin: 5px 0; /* Giảm khoảng cách giữa các dòng */
        }

        .order-button {
            background-color:rgb(1, 6, 11);
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            cursor: pointer;
        }

        .bottom-area {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            font-weight: bold;
        }

        .bread-icon {
            width: 80px; /* Điều chỉnh kích thước biểu tượng bánh mì */
            height: auto;
            margin-left: 10px;
        }
    </style>

</head>

<body>
    <!-- @if(isset($message))
        <div class="alert alert-info">
            {{ $message }}
        </div>
    @endif -->

    <!-- <h1>SWEETORIA THANK YOU!</h1>
    <a href="{{ url('/account/orders') }}">See your Orders</a> -->

    <div class="modal">
        
        <div class="message-box">
            <p>Your order has been successfully created. Please carefully check the products upon receipt. Sweetoria thank you!</p>
        </div>
        <div class="bottom-area">
          <a href="{{ url('/account/orders') }}" class="order-button">See my order >></a>
          <div class="logo"><img class="bread-icon" src="{{ asset('public/frontend/client/form/img_form/Weblogo.png') }}" alt="Logo"></div>
        </div>
    </div>

</body>
</html>