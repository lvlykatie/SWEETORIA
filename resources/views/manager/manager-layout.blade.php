<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sweetoria Manager Dashboard</title>
    <meta name="author" content="David Grzyb">
    <meta name="description" content="">
    <link rel="icon" href="{{ asset('public/frontend/admin/images/logo.png') }}" type="image/x-icon">
    <!-- Tailwind -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('public/frontend/admin/css/dashboard-styles.css')}}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/choices.js/public/assets/styles/choices.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/choices.js/public/assets/scripts/choices.min.js"></script>


</head>

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
            <a href="{{URL::to('manager/dashboard')}}" class="flex items-center text-black py-4 pl-6 nav-item">
                <i class="fas fa-tachometer-alt mr-3"></i>
                Dashboard
            </a>
            <a href="{{URL::to('manager/products')}}" class="flex items-center text-black opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
                <i class="fas fa-sticky-note mr-3"></i>
                Products
            </a>
            <a href="{{URL::to('manager/orders')}}" class=" flex items-center text-black opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
                <i class="fas fa-table mr-3"></i>
                Orders
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
                    <form action="{{ URL::to('manager/logout') }}" method="post" class="block px-4 py-2 account-link hover:text-black">
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
                <a href="{{('./dashboard')}}" class="flex items-center active-nav-link text-black py-4 pl-6 nav-item">
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
            @yield('add-product')
            @yield('edit-product')


            @yield('add-voucher')
            @yield('edit-voucher')

            @yield('add-deal')
            @yield('edit-deal')

            @yield('edit-order')
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" integrity="sha256-KzZiKy0DWYsnwMF+X1DvQngQ2/FxF7MF3Ff72XcpuPs=" crossorigin="anonymous"></script>
</body>
<script>
    fileUpload.onchange = evt => {
        const [file] = fileUpload.files;
        if (file) {
            imgPreview.src = URL.createObjectURL(file);
            $("#imgPreview").css({
                "display": "block"
            });
        }
    }

    document.addEventListener('DOMContentLoaded', function() {
        const productSelect = document.getElementById('product-name');
        const choices = new Choices(productSelect, {
            searchEnabled: true,
            placeholder: true,
            searchPlaceholderValue: 'Search products...',
        });
    });
    function validateDateRange() {
    const startDate = document.getElementById('startdate').value;
    const endDate = document.getElementById('enddate').value;
    const errorMessage = document.getElementById('date-error');
    const submitButton = document.getElementById('submit-button');

    // Check if both dates are selected and if enddate is after startdate
    if (startDate && endDate && new Date(endDate) > new Date(startDate)) {
        errorMessage.classList.add('hidden'); // Hide error message
        submitButton.disabled = false; // Enable submit button
    } else {
        errorMessage.classList.remove('hidden'); // Show error message
        submitButton.disabled = true; // Disable submit button
    }
}
</script>

</html>