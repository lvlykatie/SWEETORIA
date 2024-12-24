<header class="flex justify-around">
    <div class="logo flex items-center cursor-pointer">
        <img class="h-24 w-24 pr-4" src="{{ asset('public/frontend/admin/images/logo.png') }}" alt="Logo">
        <div class="title font-medium italic">SWEETORIA</div>
    </div>
    <nav class="md:px-40 md:flex hidden px-0">
        <ul class="flex justify-between items-center h-full w-full">
            <li
                class="nav-item h-full text-2xl font-black relative group hover:bg-[#FFCCCC] transition duration-300 ease-in-out d-none d-md-block">
                <a href="{{ route('homepage') }}"
                    class="flex items-center h-full py-3 px-6 w-full transition duration-300 ease-in-out transform group-hover:scale-110">
                    HOME
                </a>
            </li>
            <li
                class="nav-item h-full text-2xl font-black relative group hover:bg-[#FFCCCC] transition duration-300 ease-in-out d-none d-md-block">
                <a href="{{ route('product') }}"
                    class="flex items-center h-full py-3 px-6 w-full transition duration-300 ease-in-out transform group-hover:scale-110">
                    PRODUCTS
                </a>
            </li>
            <li
                class="nav-item h-full text-2xl font-black relative group hover:bg-[#FFCCCC] transition duration-300 ease-in-out">
                <a href="{{ route('hotdeals') }}"
                    class="flex items-center h-full py-3 px-6 w-full transition duration-300 ease-in-out transform group-hover:scale-110">
                    HOT DEALS
                </a>
            </li>
            <li
                class="nav-item h-full text-2xl font-black relative group hover:bg-[#FFCCCC] transition duration-300 ease-in-out">
                <a href="{{ route('contact') }}"
                    class="flex items-center h-full py-3 px-6 w-full transition duration-300 ease-in-out transform group-hover:scale-110">
                    CONTACT
                </a>
            </li>
        </ul>
    </nav>

    <div class="flex items-center gap-4 sm:justify-center">
        <a href="{{ route('cart') }}">
            <svg class=" nav-item" width="40" height="40" viewBox="0 0 48 50" fill="none"
                xmlns="http://www.w3.org/2000/svg">
                <g clip-path="url(#clip0_1_98)">
                    <path
                        d="M1.98621 2.12H9.93103L15.2541 29.9712C15.4357 30.9288 15.9332 31.789 16.6594 32.4013C17.3856 33.0135 18.2944 33.3387 19.2265 33.32H38.5324C39.4645 33.3387 40.3733 33.0135 41.0995 32.4013C41.8257 31.789 42.3232 30.9288 42.5048 29.9712L45.6828 12.52H11.9172M19.8621 43.72C19.8621 44.8687 18.9728 45.8 17.8759 45.8C16.7789 45.8 15.8897 44.8687 15.8897 43.72C15.8897 42.5712 16.7789 41.64 17.8759 41.64C18.9728 41.64 19.8621 42.5712 19.8621 43.72ZM41.7103 43.72C41.7103 44.8687 40.8211 45.8 39.7241 45.8C38.6272 45.8 37.7379 44.8687 37.7379 43.72C37.7379 42.5712 38.6272 41.64 39.7241 41.64C40.8211 41.64 41.7103 42.5712 41.7103 43.72Z"
                        stroke="#1E1E1E" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" />
                </g>
                <defs>
                    <clipPath id="clip0_1_98">
                        <rect width="47.669" height="49.92" fill="white" transform="translate(0 0.0400085)" />
                    </clipPath>
                </defs>
            </svg>
        </a>
        <button id="dropdownDefaultButton" class="relative">
            <svg class="nav-item" width="40" height="40" viewBox="0 0 50 52" fill="none"
                xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M12.4483 37.05C14.2069 35.6417 16.1724 34.5313 18.3449 33.7188C20.5173 32.9063 22.7931 32.5 25.1724 32.5C27.5518 32.5 29.8276 32.9063 32 33.7188C34.1724 34.5313 36.138 35.6417 37.8966 37.05C39.1035 35.5695 40.0431 33.8903 40.7155 32.0125C41.388 30.1347 41.7242 28.1306 41.7242 26C41.7242 21.1972 40.1121 17.1076 36.888 13.7313C33.6638 10.3549 29.7586 8.66668 25.1724 8.66668C20.5862 8.66668 16.6811 10.3549 13.4569 13.7313C10.2328 17.1076 8.62072 21.1972 8.62072 26C8.62072 28.1306 8.95693 30.1347 9.62934 32.0125C10.3018 33.8903 11.2414 35.5695 12.4483 37.05ZM25.1724 28.1667C23.138 28.1667 21.4224 27.4354 20.0259 25.9729C18.6293 24.5104 17.9311 22.7139 17.9311 20.5833C17.9311 18.4528 18.6293 16.6563 20.0259 15.1938C21.4224 13.7313 23.138 13 25.1724 13C27.2069 13 28.9224 13.7313 30.319 15.1938C31.7155 16.6563 32.4138 18.4528 32.4138 20.5833C32.4138 22.7139 31.7155 24.5104 30.319 25.9729C28.9224 27.4354 27.2069 28.1667 25.1724 28.1667ZM25.1724 47.6667C22.3104 47.6667 19.6207 47.0979 17.1035 45.9604C14.5862 44.8229 12.3966 43.2792 10.5345 41.3292C8.67244 39.3792 7.19831 37.0861 6.1121 34.45C5.02589 31.8139 4.48279 28.9972 4.48279 26C4.48279 23.0028 5.02589 20.1861 6.1121 17.55C7.19831 14.9139 8.67244 12.6208 10.5345 10.6708C12.3966 8.72084 14.5862 7.17709 17.1035 6.03959C19.6207 4.90209 22.3104 4.33334 25.1724 4.33334C28.0345 4.33334 30.7242 4.90209 33.2414 6.03959C35.7586 7.17709 37.9483 8.72084 39.8104 10.6708C41.6724 12.6208 43.1466 14.9139 44.2328 17.55C45.319 20.1861 45.8621 23.0028 45.8621 26C45.8621 28.9972 45.319 31.8139 44.2328 34.45C43.1466 37.0861 41.6724 39.3792 39.8104 41.3292C37.9483 43.2792 35.7586 44.8229 33.2414 45.9604C30.7242 47.0979 28.0345 47.6667 25.1724 47.6667Z"
                    fill="#1D1B20" />
            </svg>
        </button>
        <div id="dropdown"
            class="hidden absolute bg-white shadow-lg rounded-md flex flex-col w-48 top-[60px] right-[45px]">
            @if (Auth::check())
                <div class="bg-yellow-100 text-center border-b hover:bg-gray-200 cursor-pointer">
                    <a href="{{ route('account') }}" class="text-xl font-bold p-4 block">Account</a>
                </div>
                <div class="bg-yellow-100 text-center border-b hover:bg-gray-200 cursor-pointer">
                    <a href="{{ route('orders') }}" class="text-xl font-bold p-4 block">My orders</a>
                </div>
                <div class="bg-yellow-100 text-center border-b hover:bg-gray-200 cursor-pointer">
                    <a href="{{ route('changepw') }}" class="text-xl font-bold p-4 block">Change password</a>
                </div>
                <div class="bg-yellow-100 text-center border-b hover:bg-gray-200 cursor-pointer">
                    <a href="{{ route('policy') }}" class="text-xl font-bold p-4 block">Policy</a>
                </div>
                <div class="bg-yellow-100 text-center border-b hover:bg-gray-200 cursor-pointer">

                    <form action="{{ route('logout') }}" method="POST" class="text-xl font-bold p-4 block">
                        @csrf
                        <button type="submit">Logout</button>
                    </form>


                </div>
            @else
                <div class="bg-yellow-100 text-center border-b hover:bg-gray-200 cursor-pointer">
                    <a href="{{ url('signin') }}" class="text-xl font-bold p-4 block">Sign In</a>
                </div>
            @endif
        </div>
        {{-- responsive nav button --}}
        <a class="block md:hidden text-6xl p-4 text-black nav-item float-right" onclick="toggleMenu()"
            title="Toggle Navigation Menu">
            <i class="fa fa-bars"></i>
        </a>
        {{-- user name --}}
        <div class="hidden md:block text-2xl font-bold text-black">
            @if (Auth::check())
                <p>Welcome, {{ Auth::user()->user_name }}</p>
            @else
                <p>Welcome, Guest</p>
                {{-- signin button --}}
                <a href="{{ url('/signin') }}" class="text-2x font-bold text-blue-400 hover:underline">Sign In</a>
            @endif
        </div>

    </div>
    {{-- nav demo --}}
    <div id="navDemo"
        class="hidden bg-yellow-100 text-black text-3xl flex-col space-y-2 py-4 fixed top-24 left-0 w-full z-50 md:hidden">
        <a href="" class="block px-4 py-2 text-center nav-item" onclick="toggleMenu()">HOME</a>
        <a href="" class="block px-4 py-2 text-center nav-item" onclick="toggleMenu()">PRODUCTS</a>
        <a href="" class="block px-4 py-2 text-center nav-item" onclick="toggleMenu()">HOTDEAL</a>
        <a href="" class="block px-4 py-2 text-center nav-item" onclick="toggleMenu()">CONTACT</a>
    </div>

</header>
