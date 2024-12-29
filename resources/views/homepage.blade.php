@extends('layouts.master')

@section('title', 'Trang chủ')

@section('content')
<div class="">
    <div class="search-bg relative flex items-center justify-center bg-cover bg-center h-72 md:h-[463px]"
        style="background-image: url('{{ asset('public/frontend/client/page/image/homepagebg.png') }}');">
        <div class="flex flex-col md:flex-row justify-center items-center absolute bottom-20 w-full">
            <!-- <div class="location bg-white w-32 rounded-lg md:mb-0 md:mr-10">
                <div class="inline-block relative w-full">
                    <label for="location" class="block text-xl text-center text-gray-500 mb-1 pb-1 pt-2">Location</label>
                    <select id="location"
                        class="appearance-none text-center w-full pr-9 bg-white font-medium rounded-md py-2 text-xl text-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-400 focus:border-gray-400">
                        <option value="TPHCM">TP.HCM</option>
                        <option value="HN">Hà Nội</option>
                        <option value="DN">Đà Nẵng</option>
                    </select>
                    <div class="pointer-events-none absolute flex items-center px-2 text-gray-700"
                        style="bottom: 7px; right: -3px;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="17" height="11" viewBox="0 0 17 11"
                            fill="none">
                            <path
                                d="M16 2.11417L8.46976 10L1 2.15751L2.0625 1.0444L8.47077 7.77378L14.9395 1L16 2.11417Z"
                                fill="#001A37" stroke="black" stroke-opacity="0.5" stroke-width="0.5" />
                        </svg>
                    </div>
                </div>
            </div> -->

            <div class="relative justify-center mt-3 md:mt-0 flex items-center w-full md:w-auto">
                <input class="w-full md:w-[643px] h-[52px] rounded-[20px] text-3xl text-center placeholder:text-3xl"
                    type="text" placeholder="What do you want to buy?" id="search" />
                <button class="absolute right-4 w-8 h-8">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </button>
            </div>
        </div>

    </div>
    {{-- hot deal --}}
    <div class="hot-deal my-16 mx-16 rounded-3xl bg-yellow-100">
        <a href="{{ route('hotdeals') }}">
            <div class="text-center font-black text-6xl py-12">Hot Deals</div>
        </a>

        <div class="hotdeal-images flex flex-col md:flex-row gap-8 px-6 py-16">
            <div class="w-full md:w-1/3">
                <img class="w-full" src="{{ asset('public/frontend/client/page/image/Deal_1.png') }}" alt="Hot Deal 1">
            </div>
            <div class="w-full md:w-1/3">
                <img class="w-full" src="{{ asset('public/frontend/client/page/image/Deal_2.png') }}" alt="Hot Deal 2">
            </div>
            <div class="w-full md:w-1/3">
                <img class="w-full" src="{{ asset('public/frontend/client/page/image/Deal_3.png') }}" alt="Hot Deal 3">
            </div>
        </div>
    </div>

    {{-- categories --}}
    <div class="categories">
        <div class="text-center text-6xl font-black text py-6 mb-7 bg-pink mx-auto" style="width: 30%; border-radius: 50px;">
            CATEGORIES
        </div>
        <div class="categories-items">
            <!-- Row 1 -->
            <div class="flex flex-col md:flex-row justify-between mt-10">
                <!-- Column 1 -->
                <div class="w-full md:w-1/2 flex flex-col justify-center items-center">
                    <div class="flex justify-center">
                        <img src="{{ asset('public/frontend/client/page/image/category1.png') }}" class="w-auto"
                            alt="Baking ingredients">
                    </div>
                    <div class="text-center text-5xl py-6 font-extrabold">Baking ingredients</div>
                </div>
                <!-- Column 2 -->
                <div class="w-full md:w-1/2 flex flex-col justify-center items-center">
                    <div class="flex justify-center">
                        <img src="{{ asset('public/frontend/client/page/image/category2.png') }}" class="w-auto"
                            alt="Baking tools">
                    </div>
                    <div class="text-center text-5xl py-6 font-extrabold">Baking tools</div>
                </div>
            </div>
            <!-- Row 2 -->
            <div class="flex flex-col md:flex-row justify-between mt-10">
                <!-- Column 1 -->
                <div class="w-full md:w-1/2 flex flex-col justify-center items-center">
                    <div class="flex justify-center">
                        <img src="{{ asset('public/frontend/client/page/image/category3.png') }}" class="w-auto"
                            alt="Baking trays, molds">
                    </div>
                    <div class="text-center text-5xl py-6 font-extrabold">Baking trays, molds</div>
                </div>
                <!-- Column 2 -->
                <div class="w-full md:w-1/2 flex flex-col justify-center items-center">
                    <div class="flex justify-center">
                        <img src="{{ asset('public/frontend/client/page/image/category4.png') }}" class="w-auto"
                            alt="Bags, boxes, cups, jars">
                    </div>
                    <div class="text-center text-5xl py-6 font-extrabold">Bags, boxes, cups, jars</div>
                </div>
            </div>
        </div>
    </div>

    {{-- best seller --}}
    <div class="best_seller my-16">
        <!-- <div class="text-center text-6xl font-black text py-6" style="">

        </div> -->
        <div class="text-center text-6xl font-black text py-6 mb-7 mx-auto" style="width: 30%; border-radius: 50px;background-color: #FFFDD0">
            BEST SELLER
        </div>
        <div class="best-seller_items m-24 rounded-3xl">
            <div class="relative">
                <!-- Nút bấm Trái -->
                <button id="prevBtn"
                    class="absolute left-0 top-1/2 transform -translate-y-1/2 bg-gray-300 rounded-full p-2 w-[70px] h-[70px]">
                    <i class="fa-solid fa-chevron-left text-3xl"></i>
                </button>

                <!-- Danh sách sản phẩm -->
                <div id="productContainer" class="flex gap-x-[45px] overflow-hidden justify-center">
                    @foreach ($products as $product)
                    <div class="md:w-[356px] h-[507px] w-full flex flex-col items-center bg-[#FFDEDE80] rounded-[28px] relative">
                        {{-- sale --}}
                        @if ($product->deal_id)
                        <div class="bg-[#004FA8] w-[128px] h-[36px] rounded-tr-[20px] rounded-br-[20px] flex justify-center items-center absolute left-0 top-4" style="z-index: 1000;">
                            <i class="fa-solid fa-bolt text-yellow-300 mr-5"></i>
                            <span class="text-white text-2xl font-bold">SALE <span>{{ $product->deal_discount * 100 }}%</span></span>
                        </div>
                        @endif
                        <div class="md:w-[160px] md:h-[40px] bg-gray-200 flex justify-center items-center rounded-full absolute bottom-2 right-2 shadow-lg">
                            <span class="text-lg font-semibold text-gray-800 flex items-center gap-1">
                                {{-- Hiển thị sao vàng --}}
                                @for ($i = 1; $i <= floor($product->product_rate); $i++)
                                    <i class="fa-solid fa-star text-yellow-500"></i>
                                    @endfor

                                    {{-- Hiển thị sao nửa nếu cần --}}
                                    @if ($product->product_rate - floor($product->product_rate) >= 0.5)
                                    <i class="fa-solid fa-star-half-alt text-yellow-500"></i>
                                    @endif

                                    {{-- Hiển thị sao trống nếu chưa đủ 5 sao --}}
                                    @for ($i = ceil($product->product_rate); $i < 5; $i++)
                                        <i class="fa-regular fa-star text-gray-400"></i>
                                        @endfor

                                        {{-- Hiển thị giá trị đánh giá --}}
                                        <span class="ml-2 text-sm font-medium text-gray-600">({{ number_format($product->product_rate, 1) }})</span>
                            </span>
                        </div>
                        <a href="{{ route('detail', ['id' => $product->product_id]) }}" class="cursor-pointer">
                            <img src="{{ filter_var($product->product_image, FILTER_VALIDATE_URL) ? $product->product_image : asset('public/backend/image/' . $product->product_image) }}"
                                class="hover:scale-90 w-[305px] h-[305px] mt-6 ml-6 mr-6 object-cover rounded-[20px]" alt="Product Image">
                        </a>
                        <div class="item-name text-3xl text-center font-bold mt-8">
                            <a href="{{ route('detail', ['id' => $product->product_id]) }}" class="text-black hover:underline">
                                {{ $product->product_name }}
                            </a>
                        </div>
                        <div class="price relative w-full pt-2 ml-6 flex justify-between mt-6">
                            <span class="text-3xl ml-[20px] font-medium">{{ number_format($product->product_price, 0, ',', '.') . ' VND' }}</span>
                            <span class="text-3xl font-normal">
                                <i class="fa-solid fa-star text-yellow-300"></i>
                                <span>{{ $product->product_rate }}</span>
                            </span>

                            <!-- icon thêm giỏ hàng -->
                            <div class="mr-[35px]">
                                <svg xmlns="http://www.w3.org/2000/svg" width="29" height="100%" viewBox="0 0 33 30" fill="none" id="addToCartIcon"
                                    class="add-to-cart-icon" data-product-id="{{ $product->product_id }}" data-product-name="{{ $product->product_name }}"
                                    data-product-price="{{ $product->product_price }}">
                                    <path d="M28.5398 18.75H12.254L12.6176 20.625H27.5297C28.3853 20.625 29.0195 21.4629 28.8299 22.3429L28.5234 23.7653C29.5618 24.2969 30.2778 25.4196 30.2778 26.7187C30.2778 28.547 28.8601 30.026 27.1209 29.9996C25.4641 29.9745 24.1014 28.5564 24.0567 26.8094C24.0323 25.8551 24.3948 24.9901 24.9902 24.3749H13.3431C13.9196 24.9706 14.2778 25.8003 14.2778 26.7187C14.2778 28.5828 12.804 30.0838 11.0183 29.9964C9.43278 29.9187 8.14328 28.5676 8.05995 26.8958C7.99561 25.6047 8.63972 24.4668 9.61834 23.8731L5.71572 3.75H1.83333C1.09694 3.75 0.5 3.12041 0.5 2.34375V1.40625C0.5 0.62959 1.09694 0 1.83333 0H7.52939C8.16278 0 8.70872 0.46998 8.83567 1.12441L9.34489 3.75H31.1661C32.0217 3.75 32.6559 4.58795 32.4663 5.46791L29.84 17.6554C29.7021 18.2957 29.1624 18.75 28.5398 18.75ZM23.1667 9.84375H20.5V7.5C20.5 6.98221 20.1021 6.5625 19.6111 6.5625H18.7222C18.2313 6.5625 17.8333 6.98221 17.8333 7.5V9.84375H15.1667C14.6757 9.84375 14.2778 10.2635 14.2778 10.7812V11.7187C14.2778 12.2365 14.6757 12.6562 15.1667 12.6562H17.8333V15C17.8333 15.5178 18.2313 15.9375 18.7222 15.9375H19.6111C20.1021 15.9375 20.5 15.5178 20.5 15V12.6562H23.1667C23.6576 12.6562 24.0556 12.2365 24.0556 11.7187V10.7812C24.0556 10.2635 23.6576 9.84375 23.1667 9.84375Z"
                                        fill="black" />
                                </svg>
                            </div>
                            <!-- icon thêm giỏ hàng -->
                        </div>
                        <button class="md:w-[330px] font-semibold mt-4 md:h-[60px] text-2xl text-white bg-[#D65050] rounded-[60px] absolute bottom-4 left-1/2 transform -translate-x-1/2">
                            <span class="px-4 py-8">BUY NOW</span>
                        </button>
                    </div>
                    @endforeach
                </div>

                <!-- Nút bấm Phải -->
                <button id="nextBtn"
                    class="absolute right-0 top-1/2 transform -translate-y-1/2 bg-gray-300 rounded-full p-2 w-[70px] h-[70px]">
                    <i class="fa-solid fa-chevron-right text-3xl"></i>
                </button>
            </div>
        </div>
    </div>


    <div class="text-center text-6xl font-black text py-6 mb-7 bg-pink mx-auto" style="width: 30%; border-radius: 50px;">
        BLOG
    </div>
    {{-- see more in left --}}
    <div class="flex w-full justify-center mb-7">
        <div class="w-[1352px] text-right">
            <a href="{{ route('blog') }}"
                class="text-black text-3xl font-bold font-['Inter'] leading-normal cursor-pointe hover:text-yellow-200">See
                more >></a>
        </div>
    </div>

    <div class="w-full flex flex-wrap justify-center p-6 bg-gray-100">
        <!-- Video Section -->
        <div id="video-section" class="md:w-[795px] flex flex-col items-center shadow-xl rounded-lg bg-white p-6 mr-6 mb-6">
            <iframe
                id="video-frame"
                class="rounded-lg"
                width="560"
                height="315"
                src="https://www.youtube.com/embed/MhbEaJUoy5M?autoplay=1&mute=1&si=fLPF4uIvF3nkxxMZ"
                title="YouTube video player"
                frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                referrerpolicy="strict-origin-when-cross-origin"
                allowfullscreen>
            </iframe>
            <h2 id="video-title" class="title text-2xl text-center font-semibold mt-4 text-gray-800">
                [Không Cần Lò Vi Sóng] Bánh Phô Mai Oreo Béo Ngậy ngất ngây cực dễ làm
            </h2>
        </div>

        <!-- Post List Section -->
        <div class="w-[530px] space-y-6">
            <!-- Post Item 1 -->
            <div class="post-item w-full h-[124px] bg-white rounded-lg shadow-md flex items-center hover:shadow-xl transition-shadow duration-300 cursor-pointer"
                data-video-url="https://www.youtube.com/embed/4_YBELE4LpM?autoplay=1&mute=1&si=gtFPJfPjxf2h3Zc7"
                data-title="Truffle Sicula cho Valentine CỰC DỄ ai cũng làm được với 2 nguyên liệu">
                <img
                    src="{{ asset('public/frontend/client/page/image/truffle.jpg') }}"
                    class="w-[150px] h-[104px] ml-4 rounded-lg object-cover"
                    alt="post">
                <div class="info flex flex-col justify-center ml-4">
                    <h3 class="title text-lg font-semibold text-gray-800 hover:text-blue-600 transition-colors duration-300">
                        Truffle Sicula cho Valentine CỰC DỄ ai cũng làm được với 2 nguyên liệu
                    </h3>
                    <p class="date text-sm text-gray-500 font-normal">2021-03-10</p>
                </div>
            </div>

            <!-- Post Item 2 -->
            <div class="post-item w-full h-[124px] bg-white rounded-lg shadow-md flex items-center hover:shadow-xl transition-shadow duration-300 cursor-pointer"
                data-video-url="https://www.youtube.com/embed/E9gvM522EqI?autoplay=1&mute=1&si=-YOm3CzSjaOmBUcA"
                data-title="Bánh Phô Mai Xoài mát lạnh siêu béo ngậy siêu thơm ngonnn">
                <img
                    src="{{ asset('public/frontend/client/page/image/phomaixoai.jpg') }}"
                    class="w-[150px] h-[104px] ml-4 rounded-lg object-cover"
                    alt="post">
                <div class="info flex flex-col justify-center ml-4">
                    <h3 class="title text-lg font-semibold text-gray-800 hover:text-blue-600 transition-colors duration-300">
                        Bánh Phô Mai Xoài mát lạnh siêu béo ngậy siêu thơm ngonnn
                    </h3>
                    <p class="date text-sm text-gray-500 font-normal">2021-03-20</p>
                </div>
            </div>
            <!-- Post Item 3 -->
            <div class="post-item w-full h-[124px] bg-white rounded-lg shadow-md flex items-center hover:shadow-xl transition-shadow duration-300 cursor-pointer"
                data-video-url="https://www.youtube.com/embed/iQqnozpzElc?autoplay=1&mute=1&si=gtFPJfPjxf2h3Zc7"
                data-title="Angry Bơ - Bánh bơ béo bồng bột [KO CẦN LÒ]">
                <img
                    src="{{ asset('public/frontend/client/page/image/angrybo.jpg') }}"
                    class="w-[150px] h-[104px] ml-4 rounded-lg object-cover"
                    alt="post">
                <div class="info flex flex-col justify-center ml-4">
                    <h3 class="title text-lg font-semibold text-gray-800 hover:text-blue-600 transition-colors duration-300">
                        Angry Bơ - Bánh bơ béo bồng bột [KO CẦN LÒ]
                    </h3>
                    <p class="date text-sm text-gray-500 font-normal">2021-07-09</p>
                </div>
            </div>
        </div>
    </div>


</div>
<script>
    // Lấy tất cả các bài viết
    const postItems = document.querySelectorAll('.post-item');

    // Lấy phần tử video và tiêu đề
    const videoFrame = document.getElementById('video-frame');
    const videoTitle = document.getElementById('video-title');

    // Thêm sự kiện click cho mỗi bài viết
    postItems.forEach((post) => {
        post.addEventListener('click', () => {
            // Lấy URL video và tiêu đề từ thuộc tính data
            const videoUrl = post.getAttribute('data-video-url');
            const title = post.getAttribute('data-title');

            // Cập nhật URL của iframe và tiêu đề
            videoFrame.src = videoUrl;
            videoTitle.textContent = title;
        });
    });

    document.addEventListener("DOMContentLoaded", () => {
        const container = document.getElementById("productContainer");
        const prevBtn = document.getElementById("prevBtn");
        const nextBtn = document.getElementById("nextBtn");

        let currentIndex = 0;
        const items = container.children;
        const totalItems = items.length;

        const updateVisibility = () => {
            Array.from(items).forEach((item, index) => {
                item.style.display = (index >= currentIndex && index < currentIndex + 3) ? "block" :
                    "none";
            });
        };

        prevBtn.addEventListener("click", () => {
            if (currentIndex > 0) {
                currentIndex -= 3;
                updateVisibility();
            }
        });

        nextBtn.addEventListener("click", () => {
            if (currentIndex + 3 < totalItems) {
                currentIndex += 3;
                updateVisibility();
            }
        });

        updateVisibility();
    });

    const searchInput = document.getElementById('search');

    searchInput.addEventListener('keydown', function(event) {
        if (event.key === 'Enter') {
            event.preventDefault(); // Prevents form submission if that's unintended
            search();
        }
    });

    function search() {
        // Lấy các giá trị filter và sort
        const filters = Array.from(document.querySelectorAll('input[name="filter[]"]:checked'))
            .map(input => input.value)
            .join('.');

        const sort = document.querySelector('input[name="sort"]:checked')?.value;

        // Lấy giá trị tìm kiếm
        const search = document.getElementById('search').value;


        // Xây dựng URL mới với các tham số filter, sort và search
        let url = new URL('sweetoria/product', window.location.origin);
        url.searchParams.set('page', 1);

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

        if (search) {
            url.searchParams.set('search', search);
        } else {
            url.searchParams.delete('search');
        }

        // Cập nhật lại URL mà không reload trang
        window.history.pushState({}, '', url);

        // Gửi yêu cầu lọc lại sản phẩm
        window.location.href = url;
    }

    window.add = function(element) {
        const productId = element.dataset.productId;
        const productName = element.dataset.productName;
        const productPrice = element.dataset.productPrice;

        // Gửi yêu cầu Ajax để thêm vào giỏ hàng
        fetch('{{ url('/cart/add') }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({
                    product_id: productId,
                    quantity: 1 // Số lượng mặc định là 1
                })
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Server error: ' + response.status);
                }
                return response.json();
            })
            .then(data => {
                if (data.success) {
                    alert('Sản phẩm đã được thêm vào giỏ hàng!');
                } else {
                    alert(data.message || 'Có lỗi xảy ra!');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Không thể thêm sản phẩm vào giỏ hàng. Vui lòng thử lại!');
            });
    }

    document.querySelectorAll('.add-to-cart-icon').forEach(icon => {
        icon.addEventListener('click', function() {
            window.add(this);
        });
    });
</script>
@endsection