<!DOCTYPE html>
<html>

<head>
    <title>@yield('title')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
            /* padding: 0 30px; */
            text-align: center;
            position: fixed;
            /* margin: 0 90px; */
        }


        header {
            top: 0;
            left: 0;
            right: 0;
            z-index: 100;
        }

        body {
            /*             padding: 20px 0; */
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
            font-size: 3rem;
            height: 5rem;
            line-height: 5rem;
        }

        @media(min-width: 768px) {
            .md-acc-input {
                font-family: "Jomhuria", serif;
                font-size: 4.5rem;
                height: 5rem;
                line-height: 5rem;

            }
        }

        .font-jomhuria {
            font-family: "Jomhuria", serif;
        }

        .acc-input::placeholder {
            color: #D5A759;
            font-family: "Jomhuria", serif;
            font-size: 3rem;
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

        @media (min-width: 768px) {
            .ten-san-pham {
                font-size: 45px;
                line-height: 32px;
            }
        }

        .bg-product {
            background-color: #ffcccc;
        }

        .nav-item:hover {
            background-color: #ccb7b7;
            cursor: pointer;
        }

        .content {
            margin-top: 40px;
        }

        .font-16 {
            font-size: 16px;
        }

        @media (min-width: 768px) {
            .md-h-450 {
                height: 450px;
            }
        }

        @media (min-width: 768px) {
            .md-w-643 {
                width: 643px;
            }
        }
    </style>
</head>


<body>
    <!-- Include header -->
    @include('layouts.header')

    <!-- Nội dung chính -->
    <div class="content contain-content container-fluid ">
        @yield('content')
    </div>

    <!-- Include footer -->
    @include('layouts.footer')
</body>


<script>
    const dropdownButton = document.getElementById("dropdownDefaultButton");
    const dropdown = document.getElementById("dropdown");

    dropdownButton.addEventListener("click", () => {
        dropdown.classList.toggle("hidden");
    });

    document.addEventListener("click", (event) => {
        if (!dropdownButton.contains(event.target) && !dropdown.contains(event.target)) {
            dropdown.classList.add("hidden");
        }
    });

    function toggleDropdown() {
        var dropdown = document.getElementById('dropdown');
        dropdown.classList.toggle('hidden');
    }

    function toggleMenu() {
        var navDemo = document.getElementById('navDemo');
        navDemo.classList.toggle('hidden');
    }

    function toggleTab(tab) {
        const describeTab = document.getElementById('describeTab');
        const reviewTab = document.getElementById('reviewTab');
        const describeBtn = document.querySelector('.describe');
        const reviewBtn = document.querySelector('.review');

        if (tab === 'describe') {
            // Hiển thị tab Describe với hiệu ứng fade-in, ẩn tab Review với hiệu ứng fade-out
            describeTab.classList.remove('hidden', 'opacity-0');
            describeTab.classList.add('opacity-100', 'transition-opacity', 'duration-500');

            reviewTab.classList.add('opacity-0', 'transition-opacity', 'duration-500');
            setTimeout(() => {
                reviewTab.classList.add('hidden');
            }, 500); // Ẩn tab Review sau khi hiệu ứng hoàn tất

            // Thêm màu cho nút Describe, bỏ màu cho nút Review
            describeBtn.classList.add('bg-pink');
            reviewBtn.classList.remove('bg-pink');
        } else if (tab === 'review') {
            // Hiển thị tab Review với hiệu ứng fade-in, ẩn tab Describe với hiệu ứng fade-out
            reviewTab.classList.remove('hidden', 'opacity-0');
            reviewTab.classList.add('opacity-100', 'transition-opacity', 'duration-500');

            describeTab.classList.add('opacity-0', 'transition-opacity', 'duration-500');
            setTimeout(() => {
                describeTab.classList.add('hidden');
            }, 500);

            // Thêm màu cho nút Review, bỏ màu cho nút Describe
            reviewBtn.classList.add('bg-pink');
            describeBtn.classList.remove('bg-pink');
        }
    }

    tailwind.config = {
        theme: {
            extend: {
                colors: {
                    pink: '#FFDEDE',
                    textgray: '#D9D9D9'

                }
            }
        }
    }
    // Hàm xử lý khi người dùng bấm nút lọc
    document.addEventListener('DOMContentLoaded', () => {
        const params = new URLSearchParams(window.location.search);
        const filterParam = params.get('filter');
        if (filterParam) {
            const filters = filterParam.split(/[.]/).map(f => f.trim());
            filters.forEach(value => {
                const checkbox = document.querySelector(`input[name="filter[]"][value="${value}"]`);
                if (checkbox) {
                    checkbox.checked = true;
                }
            });
        }

        const sortParam = params.get('sort');
        if (sortParam) {
            const radio = document.querySelector(`input[name="sort"][value="${sortParam}"]`);
            if (radio) {
                radio.checked = true;
            }
        }
    });

    function handleSubmitFilter() {
        // Lấy các giá trị filter và sort
        const filters = Array.from(document.querySelectorAll('input[name="filter[]"]:checked'))
            .map(input => input.value)
            .join('.');

        const sort = document.querySelector('input[name="sort"]:checked')?.value;

        // Xây dựng URL mới với các tham số filter và sort
        let url = new URL(window.location.href);
        url.searchParams.set('page', 1)
        if (filters) {
            url.searchParams.set('filter', filters);
        } else {
            url.searchParams.delete('filter');
        }
        if (sort) {
            url.searchParams.set('sort', sort);
        } else {
            url.searchParams.delete('sort');
        }

        // Cập nhật lại URL mà không reload trang
        window.history.pushState({}, '', url);

        // Gửi yêu cầu lọc lại sản phẩm
        window.location.href = url;
    }
    const handleClearFilter = () => {
        const url = new URL(window.location.href);
        url.searchParams.delete('filter');
        url.searchParams.delete('sort');
        window.location.href = url;
    }
</script>


</html>
