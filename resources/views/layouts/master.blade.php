<!DOCTYPE html>
<html>

<head>
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Iceland&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Jomhuria&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html {
            font-size: 62.5%;
            line-height: 1.6rem;
            font-family: 'Inter', sans-serif;
            box-sizing: border-box;
        }

        header {
            background-color: #FFFDD0;
            padding: 0 30px;
            text-align: center;
            position: fixed;
            margin: 0 90px;
        }

        footer {
            background-color: #FFFDD0;
            padding: 0 30px;
            text-align: center;
        }

        header {
            top: 0;
            left: 0;
            right: 0;
            z-index: 100;
        }

        body {
            padding: 20px 90px;
            /* background-color: #FFFDD0; */
        }

        .title {
            font-size: 30px;
            line-height: 24px;
        }

        input::placeholder {
            text-align: center;
            font-family: 'Roboto', sans-serif;
            color: #888;
            font-size: 16px;
            line-height: 24px;

            /* Optional: make the placeholder text italic */
        }

        input[type="checkbox"] {
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            width: 30px;
            height: 30px;
            background-color: #fff;
            border: 2px solid #ddd;
            border-radius: 5px;
            position: relative;
            cursor: pointer;
        }

        input[type="checkbox"]:checked {
            background-color: #4CAF50;
            border-color: #4CAF50;
        }

        input[type="checkbox"]:checked::before {
            content: "✓";
            color: #fff;
            font-weight: bold;
            position: absolute;
            top: 2px;
            left: 6px;
            font-size: 18px;
        }

        .bg-yellow-100 {
            background-color: #FFFDD0;
        }

        .acc-input {
            font-family: "Jomhuria", serif;
            font-size: 5rem;
            height: 5rem;
            /* Adjust the height as needed */
            line-height: 5rem;
            /* Match the line-height to the height */
        }

        .font-jomhuria {
            font-family: "Jomhuria", serif;
        }

        .acc-input::placeholder {
            color: #D5A759;
            font-family: "Jomhuria", serif;
            font-size: 5rem;
            font-weight: 400;
            line-height: 5rem;
            /* Match the line-height to the height */
            text-align: center;
            /* Center the text horizontally */
        }

        .acc-input:focus {
            outline: none;
            background-color: #E6E6E6;
            border: 2px solid #D5A759;
            color: #D5A759;
        }

        .ten-san-pham {
            font-size: 45px;
            line-height: 32px;
        }

        .bg-product {
            background-color: #ffcccc;
        }

        .nav-item:hover {
            background-color: #ccb7b7;
            cursor: pointer;
        }
    </style>
</head>


<body>
    <!-- Include header -->
    @include('layouts.header')

    <!-- Nội dung chính -->
    <div class="content contain-content">
        @yield('content')
    </div>

    <!-- Include footer -->
    @include('layouts.footer')
</body>

</html>