<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sweetoria Admin Dashboard</title>
    <meta name="author" content="David Grzyb">
    <meta name="description" content="">
    <link rel="icon" href="{{ asset('public/frontend/admin/images/logo.png') }}" type="image/x-icon">
    <!-- Tailwind -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('public/frontend/admin/css/dashboard-styles.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<style>
    th {
        display: flex-col;
        justify-content: space-between;
        /* Space between text and icon */
        align-items: center;
        /* Align text and icon vertically */
        padding: 0 10px;
        /* Add padding for proper spacing */
        position: relative;
        cursor: default;
        /* Default cursor for the header */
    }

    .sort-icon {
        cursor: pointer;
        color: white;
        /* Match the icon color to header text */
        font-size: 0.8rem;
        /* Adjust the icon size */
        margin-left: auto;
        /* Ensure the icon is pushed to the far right */
    }

    /* Optional hover effect for icon */
    .sort-icon:hover {
        color: #ccc;
        /* Change color on hover */
    }
</style>

<body class="bg-gray-100 font-family-karla flex">

    <aside class="relative bg-sidebar h-screen w-64 hidden sm:block shadow-xl">
        <div class="p-6">
            <a href="{{('./dashboard')}}" class="flex flex-col items-center justify-center text-black text-2xl font-bold sentencecase hover:text-yellow-900">
                <img src="{{ asset('public/frontend/admin/images/logo.png') }}" alt="Sweetoria Icon" class="w-20 h-20 mb-0">
                Sweetoria
            </a>
            <button class="w-full bg-red-50 cta-btn font-semibold py-2 mt-5 rounded-br-lg rounded-bl-lg rounded-tr-lg flex items-center justify-center">
                <i class="fas fa-plus mr-3"></i> New Report
            </button>
        </div>
        <nav class="text-black text-base font-semibold pt-3">
            <a href="{{('./dashboard')}}" class="flex items-center  text-black py-4 pl-6 nav-item">
                <i class="fas fa-tachometer-alt mr-3"></i>
                Dashboard
            </a>
            <a href="{{('./products')}}" class="flex items-center text-black opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
                <i class="fas fa-sticky-note mr-3"></i>
                Products
            </a>
            <a href="{{('./orders')}}" class="flex items-center text-black opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
                <i class="fas fa-table mr-3"></i>
                Orders
            </a>
            <a href="{{('./users')}}" class="flex items-center text-black opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
                <i class="fas fa-align-left mr-3"></i>
                Users
            </a>
            <a href="{{('./deals')}}" class="flex items-center active-nav-link text-black opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
                <i class="fas fa-calendar mr-3"></i>
                Deals
            </a>
            <a href="{{('./vouchers')}}" class="flex items-center text-black opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
                <i class="fas fa-calendar mr-3"></i>
                Vouchers
            </a>
            <a href="{{('./feedbacks')}}" class="flex items-center text-black opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
                <i class="fas fa-tablet-alt mr-3"></i>
                Feedback
            </a>
        </nav>
    </aside>

    <div class="w-full flex flex-col h-screen overflow-y-hidden">
        <!-- Desktop Header -->
        <header class="w-full items-center bg-white py-2 px-6 hidden sm:flex">
            <div class="w-1/2"></div>
            <div x-data="{ isOpen: false }" class="relative w-1/2 flex justify-end">
                <button @click="isOpen = !isOpen" class="realtive z-10 w-12 h-12 rounded-full overflow-hidden border-4 border-gray-400 hover:border-gray-300 focus:border-gray-300 focus:outline-none">
                    <img src="{{ asset('public/frontend/admin/images/sweetoria.png') }}" />
                </button>
                <button x-show="isOpen" @click="isOpen = false" class="h-full w-full fixed inset-0 cursor-default"></button>
                <div x-show="isOpen" class="loginbox absolute w-32 bg-white rounded-lg shadow-lg py-2 mt-16">
                    <a href="#" class="block px-4 py-2 account-link hover:text-black">Account</a>
                    <form action="{{ URL::to('admin/logout') }}" method="post" class="block px-4 py-2 account-link hover:text-black">
                        @csrf
                        <button>Sign Out</button>
                    </form>
                </div>
            </div>
        </header>

        <!-- Mobile Header & Nav -->
        <header x-data="{ isOpen: false }" class="w-full bg-sidebar py-5 px-6 sm:hidden">
            <div class="flex items-center justify-between">
                <a href="index.html" class="text-black text-3xl font-semibold uppercase hover:text-gray-300">Admin</a>
                <button @click="isOpen = !isOpen" class="text-black text-3xl focus:outline-none">
                    <i x-show="!isOpen" class="fas fa-bars"></i>
                    <i x-show="isOpen" class="fas fa-times"></i>
                </button>
            </div>

            <!-- Dropdown Nav -->
            <nav class="text-black text-base font-semibold pt-3">
                <a href="{{('./dashboard')}}" class="flex items-center  text-black py-4 pl-6 nav-item">
                    <i class="fas fa-tachometer-alt mr-3"></i>
                    Dashboard
                </a>
                <a href="{{('./products')}}" class="flex items-center text-black opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
                    <i class="fas fa-sticky-note mr-3"></i>
                    Products
                </a>
                <a href="{{('./orders')}}" class="flex items-center text-black opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
                    <i class="fas fa-table mr-3"></i>
                    Orders
                </a>
                <a href="{{('./users')}}" class="flex items-center text-black opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
                    <i class="fas fa-align-left mr-3"></i>
                    Users
                </a>
                <a href="{{('./deals')}}" class="flex items-center text-black opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
                    <i class="fas fa-calendar mr-3"></i>
                    Deals
                </a>
                <a href="{{('./vouchers')}}" class="flex items-center text-black opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
                    <i class="fas fa-calendar mr-3"></i>
                    Vouchers
                </a>
                <a href="{{('./feedbacks')}}" class="flex items-center text-black opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
                    <i class="fas fa-tablet-alt mr-3"></i>
                    Feedback
                </a>

            </nav>
            <!-- <button class="w-full bg-white cta-btn font-semibold py-2 mt-5 rounded-br-lg rounded-bl-lg rounded-tr-lg shadow-lg hover:shadow-xl hover:bg-gray-300 flex items-center justify-center">
                <i class="fas fa-plus mr-3"></i> New Report
            </button> -->
        </header>

        <div class="w-full overflow-x-hidden border-t flex flex-col">
            <main class="w-full flex-grow p-6">
                <div class="flex justify-between">
                    <h1 class="text-3xl text-extrabold pb-6">Deals</h1>
                    <!-- Search form -->
                    <form class="max-w-md" style="width: 500px;" action="{{ route('deals.search') }}" method="GET">
                        <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
                        <div class="relative">
                            <input type="search" name="query" id="default-search" class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search deals" />
                            <button type="submit" class="text-white absolute top-2 right-2.5 bg-yellow-700 hover:bg-yellow-800 focus:ring-4 focus:outline-none focus:ring-yellow-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-yellow-600 dark:hover:bg-yellow-700 dark:focus:ring-yellow-800">Search</button>
                        </div>
                    </form>
                    <!-- Search form -->

                </div>

                <div class="w-full mt-6">
                    <p class="text-xl pb-3 flex items-center justify-between">
                        <!-- Left section: All products -->
                        <span class="flex items-center">
                            <svg class="svg-inline--fa fa-list fa-w-16 mr-3" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="list" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                                <path fill="currentColor" d="M80 368H16a16 16 0 0 0-16 16v64a16 16 0 0 0 16 16h64a16 16 0 0 0 16-16v-64a16 16 0 0 0-16-16zm0-320H16A16 16 0 0 0 0 64v64a16 16 0 0 0 16 16h64a16 16 0 0 0 16-16V64a16 16 0 0 0-16-16zm0 160H16a16 16 0 0 0-16 16v64a16 16 0 0 0 16 16h64a16 16 0 0 0 16-16v-64a16 16 0 0 0-16-16zm416 176H176a16 16 0 0 0-16 16v32a16 16 0 0 0 16 16h320a16 16 0 0 0 16-16v-32a16 16 0 0 0-16-16zm0-320H176a16 16 0 0 0-16 16v32a16 16 0 0 0 16 16h320a16 16 0 0 0 16-16V80a16 16 0 0 0-16-16zm0 160H176a16 16 0 0 0-16 16v32a16 16 0 0 0 16 16h320a16 16 0 0 0 16-16v-32a16 16 0 0 0-16-16z"></path>
                            </svg>
                            <span>All deals</span>
                        </span>
                        <button class="bg-blue-500 text-white py-1 px-4 rounded ml-auto">
                            <i class="fa-solid fa-circle-plus mr-1"></i>
                            <a href="{{URL::to('admin/deals/create')}}">Deal</a>
                        </button>
                    </p>
                    <div class="bg-white overflow-auto">
                        <table class="min-w-full bg-white">
                            <thead class="bg-gray-800 text-white">
                                <tr>
                                    <th class="text-center py-3 px-4 uppercase font-semibold text-sm">
                                        Deal ID
                                        <i class="fa-solid fa-sort sort-icon" onclick="sortTable(0, this)"></i>
                                    </th>
                                    <th class="text-center py-3 px-4 uppercase font-semibold text-sm">
                                        Deal
                                    </th>
                                    <th class="text-center py-3 px-4 uppercase font-semibold text-sm">
                                        Title
                                        <i class="fa-solid fa-sort sort-icon" onclick="sortTable(1, this)"></i>
                                    </th>
                                    <th class="text-center py-3 px-4 uppercase font-semibold text-sm">
                                        Price
                                        <i class="fa-solid fa-sort sort-icon" onclick="sortTable(2, this)"></i>
                                    </th>
                                    <th class="text-center py-3 px-4 uppercase font-semibold text-sm">
                                        Describe
                                        <i class="fa-solid fa-sort sort-icon" onclick="sortTable(3, this)"></i>
                                    </th>
                                    <th class="text-center py-3 px-4 uppercase font-semibold text-sm">
                                        Applied products
                                    </th>
                                    <th class="text-center py-3 px-4 uppercase font-semibold text-sm">Manage</th>
                                </tr>
                            </thead>
                            <tbody class="text-gray-700" id="dealTable">
                                @foreach($all_deals as $deal)
                                <td class="text-center py-3">{{ $deal->deal_id }}</td>
                                <td class="text-center py-3 mx-auto">
                                    <img src="{{ asset('public/backend/image/'.$deal->deal_image) }}" class="mx-auto" width="100px" height="100px" alt="">
                                </td>
                                <td class="text-center py-3">{{ $deal->deal_name }}</td>
                                <td class="text-center py-3">{{ $deal->deal_discount }}</td>
                                <td class="text-center py-3 px-4">{{ $deal->deal_desc }}</td>
                                <td>
                                    <div class="ml-4">
                                        <ul class="list-disc list-inside">
                                            @if(isset($products_by_deal[$deal->deal_id]) && $products_by_deal[$deal->deal_id]->isNotEmpty())
                                                @foreach($products_by_deal[$deal->deal_id] as $product)
                                                    <li>{{ $product->product_name }} - {{ number_format($product->product_price, 0, ',', '.') . ' VND' }}</li>
                                                @endforeach
                                            @else
                                            <li>No products associated with this deal</li>
                                            @endif
                                        </ul>
                                    </div>
                                </td>
                                <td class="text-center py-3 px-1">
                                    <button onclick="window.location.href='{{URL::to('/admin/deals/edit/' . $deal->deal_id)}}'" class="bg-green-500 text-white py-1 px-4 rounded hover:bg-green-600">
                                        <i class="fa-solid fa-pen"></i>
                                    </button>
                                    <button onclick="if(confirm('Are you sure you want to delete this deal?')) { window.location.href='{{URL::to('/admin/deals/delete/' . $deal->deal_id)}}' }" class="bg-red-500 text-white py-1 px-4 rounded hover:bg-red-600">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </main>

        </div>

    </div>

    <!-- AlpineJS -->
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <!-- Font Awesome -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" integrity="sha256-KzZiKy0DWYsnwMF+X1DvQngQ2/FxF7MF3Ff72XcpuPs=" crossorigin="anonymous"></script>
    <!-- ChartJS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js" integrity="sha256-R4pqcOYV8lt7snxMQO/HSbVCFRPMdrhAFMH+vr9giYI=" crossorigin="anonymous"></script>

    <script>
        let sortDirection = true; // true for ascending, false for descending

        function sortTable(n, icon) {
            var table = icon.closest("table"); // Lấy bảng chứa icon
            var rows = Array.from(table.getElementsByTagName("tr")).slice(1); // Lấy các hàng trong bảng (loại bỏ hàng tiêu đề)
            var isAscending = icon.classList.contains("fa-sort-up");

            // Đảo ngược thứ tự sắp xếp nếu cột đã được sắp xếp theo thứ tự tăng dần
            rows.sort(function(rowA, rowB) {
                var cellA = rowA.getElementsByTagName("td")[n].textContent.trim();
                var cellB = rowB.getElementsByTagName("td")[n].textContent.trim();

                if (isNaN(cellA)) cellA = cellA.toLowerCase(); // Nếu là chuỗi
                if (isNaN(cellB)) cellB = cellB.toLowerCase(); // Nếu là chuỗi

                if (cellA < cellB) {
                    return isAscending ? -1 : 1;
                } else if (cellA > cellB) {
                    return isAscending ? 1 : -1;
                }
                return 0;
            });

            // Đưa các hàng đã sắp xếp lại vào bảng
            rows.forEach(function(row) {
                table.appendChild(row);
            });

            // Toggle icon sort
            icon.classList.toggle("fa-sort-up", !isAscending);
            icon.classList.toggle("fa-sort-down", isAscending);
        }
    </script>
</body>

</html>