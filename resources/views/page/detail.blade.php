@extends('layouts.master')

@section('title', 'Product detail')
@section('content')
    <div class="mt-32 mb-14">
        <div class="text-center text-6xl font-black text py-6 mb-7 bg-pink mx-auto" style="width: 40%; border-radius: 50px;">
            PRODUCT DESCRIPTION
        </div>
        <div class="flex gap-x-28 justify-center">
            <div class="w-full md:w-[485px] flex flex-col">
                <div class="img w-full relative">
                    <img src="{{ $product->product_image }}" width="100%" alt="Whipping Cream Anchor" />
                    {{-- sale --}}
                    @if ($product->deal_id)
                        <div
                            class="bg-[#004FA8] w-[128px] h-[36px] rounded-tr-[20px] rounded-br-[20px] flex justify-center items-center absolute left-0 top-4">
                            <i class="fa-solid fa-bolt text-yellow-300 mr-5"></i>
                            <span class="text-white text-2xl font-bold">SALE
                                <span>{{ $product->deal_discount * 100 }}%</span></span>
                        </div>
                    @endif
                    <div
                        class="md:w-[160px] md:h-[40px] bg-gray-200 flex justify-center items-center rounded-full absolute bottom-2 right-2 shadow-lg">
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
                            <span
                                class="ml-2 text-sm font-medium text-gray-600">({{ number_format($product->product_rate, 1) }})</span>
                        </span>
                    </div>
                </div>
                <div class="md:h-[85px] font-[Jomhuria] text-[64px] font-normal mt-4 text-center">
                    {{ $product->product_name }}
                </div>
                <div class="md:h-auto font-[Jomhuria] text-[64px] font-normal text-center">
                    {{ number_format($product->product_price, 0, ',', '.') . ' VND' }}
                </div>
                <div class="flex items-center justify-around">
                    <!-- icon trái tim thêm sản phẩm vào wishlist -->
                    <i class="fa-regular fa-heart text-[40px] cursor-pointer wishlist-icon"
                        data-product-id="{{ $product->product_id }}"></i>
                    <div class="flex border-y border-x border-[#979797] text-2xl font-bold md:h-14 ">
                        <div class="decrease-quantity flex items-center w-[56px] justify-center border-r border-[#979797] bg-[#FFDEDE]">
                            -
                        </div>
                        <div class="flex items-center w-[56px] justify-center border-r border-[#979797]">
                            1
                        </div>
                        <div class="increase-quantity flex items-center w-[56px] justify-center bg-[#FFDEDE]">
                            +
                        </div>
                    </div>
                    <!-- icon thêm giỏ hàng -->
                    <i class="fa-solid fa-cart-plus text-[40px]" id="addToCartIcon" class="add-to-cart-icon"
                        data-product-id="{{ $product->product_id }}" data-product-name="{{ $product->product_name }}"
                        data-product-price="{{ number_format($product->product_price, 0, ',', '.') . ' VND' }}"></i>
                </div>
                <button
                    class="buy-now-btnPD md:w-full font-semibold mt-4 md:h-[60px] text-[48px] text-white bg-[#D65050] rounded-[60px] flex items-center justify-center"
                    data-product-id="{{ $product->product_id }}" 
                    data-product-name="{{ $product->product_name }}" 
                    data-product-price="{{ number_format($product->product_price, 0, ',', '.') . ' VND' }}">
                    <span>BUY NOW</span>
                </button>

            </div>
            <div class="w-full md:w-[570px] flex flex-col font-[Inter] text-[32px] font-normal leading-[60px]">
                {{-- product description --}}
                <div id="origin">
                    <span class="font-extrabold">Origin: </span>
                    <span>New Zealand</span>
                </div>
                <div id="weight">
                    <span class="font-extrabold">Weight: </span>
                    <span>1kg</span>
                </div>
                {{-- storage --}}
                <div id="storage">
                    <span class="font-extrabold">Storage: </span>
                    <span>Keep in the fridge</span>
                </div>
                {{-- expiration --}}
                <div id="expiration">
                    <span class="font-extrabold">Expiration: </span>
                    <span>12 months from the date of production. After opening, Anchor cream cheese should be used within 7
                        days.</span>
                </div>
            </div>
        </div>

    </div>


    {{-- thanh ngang --}}
    <hr class=" mt-20 h-1 bg-black">
    <div class="flex flex-wrap justify-center">
        {{-- 2 cai nut --}}
        <div class="w-full flex justify-center">
            <div class="describe w-1/5 text-5xl  font-black text-center bg-pink cursor-pointer"
                onclick="toggleTab('describe')">
                <button class="p-7">Describe</button>
            </div>
            <div class="review w-1/5 text-5xl  font-black text-center cursor-pointer" onclick="toggleTab('review')">
                <button class="p-7">Review</button>
            </div>
        </div>
        <div class="w-5/6">
            <div class="bg-textgray text-description text-2xl font-bold p-3 border-t-4 border-yellow-200 transition-opacity duration-500 opacity-100"
                id="describeTab">
                {{ $product->product_desc }}
            </div>
            <div class="border-t-4 border-yellow-200 hidden opacity-0 transition-opacity duration-500" id="reviewTab">
                <div class="flex">
                    <div class="w-1/2 flex justify-center text-3xl">
                        <div class="w-1/2 flex flex-col">
                            @foreach ($ratingPercentages as $rating => $percentage)
                                <div class="flex items-center mt-4">
                                    <i class="fa-solid fa-star" style="color: yellow"></i>
                                    <span class="mx-3">{{ $rating }}</span>
                                    <div class="h-4 rounded-lg"
                                        style="background-color: #FFCCCC; width: {{ $percentage }}%;"></div>
                                    <span class="mx-3">{{ number_format($percentage, 1) }}%</span>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

        </div>
        {{-- số sao --}}
        <div class="w-1/2 flex flex-col items-center justify-center">

            <div class="flex">
                <i class="fa-solid fa-star text-7xl" style="color: yellow"></i>
                <span class="text-7xl font-black">{{ $product->product_rate }}</span>
            </div>
            <div class="">
                <span class="px-2">{{ $feedbackCount }}</span>Reviews
            </div>
        </div>
    </div>
    {{-- 1 review --}}
    @if ($feedbacks->isEmpty())
        <p class="text-center text-3xl text-gray-500">Chưa có đánh giá nào cho sản phẩm này.</p>
    @else
        @foreach ($feedbacks as $feedback)
            <div class="flex items-start justify-center w-2/3 space-x-4 mt-8">
                <!-- Avatar -->
                <div class="flex flex-col items-center">
                    <div class="h-32 w-32 rounded-full overflow-hidden">
                        <img src="{{ asset('public/frontend/client/page/image/avatartest.png') }}" alt="Avatar">
                    </div>
                    <p class="text-gray-600 mt-2 text-4xl">{{ $feedback->user_name }}</p>
                </div>

                <!-- Nội dung đánh giá -->
                <div>
                    <div class="flex items-center space-x-2 text-3xl">
                        <!-- Icon ngôi sao và điểm số -->
                        <i class="fa-solid fa-star text-yellow-400"></i>
                        <span class="font-semibold">{{ $feedback->rate }}</span>
                    </div>
                    <p class="text-3xl mt-6">{{ $feedback->comment }}</p>
                    @if ($feedback->image)
                        <img src="{{ asset('public/backend/image/feedback_images/' . $feedback->image) }}"
                            class="w-32 h-auto rounded-md mt-4" alt="Feedback Image">
                    @endif
                    <p class="text-gray-500 mt-4 text-2xl">
                        {{ \Carbon\Carbon::parse($feedback->created_at)->format('d/m/Y H:i') }}
                    </p>
                </div>
            </div>
        @endforeach
    @endif
    <!-- send review -->
    @if (Auth::check())
        <form action="{{ route('feedback') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="w-full mx-auto p-4 border rounded-md shadow-sm mt-10">
                <input
                    class="w-full p-2 border border-gray-300 rounded-md resize-none focus:outline-none focus:ring-2 focus:ring-blue-500 text-2xl font-normal"
                    rows="4" name="feedback_content" placeholder="Type your feedback here">

                {{-- image uploaded --}}
                <div class="image-upload-container">
                    <img id="uploaded-image" src="" alt="Uploaded Image" class="hidden w-32 h-auto rounded-md">
                </div>

                <div class="flex items-center justify-between mt-4">
                    {{-- nút upload --}}
                    <div id="image-upload-container"
                        class="w-[116px] h-[80px] border border-gray-300 flex items-center justify-center rounded-md overflow-hidden cursor-pointer hover:bg-gray-100">
                        <label for="image-upload" class="flex items-center justify-center w-full h-full">
                            <i class="fa-solid fa-camera text-[40px]" id="camera-icon"></i>
                            <input type="file" id="image-upload" name="feedback_image" accept="image/*"
                                class="hidden">
                        </label>
                    </div>
                    {{-- Hiển thị avatar mặc định --}}
                    <div class="h-32 w-32 rounded-full overflow-hidden ml-10">
                        <img src="{{ asset('public/frontend/client/page/image/avatartest.png') }}" alt="Avatar">
                    </div>
                    <div class="flex items-center">
                        <p class="text-gray-600 mt-2 text-4xl ml-8">{{ Auth::user()->user_name }}</p>
                    </div>
                    {{-- Star rating --}}
                    <div class="flex items-center">
                        <div class="flex items-center space-x-1 text-4xl" id="star-rating">
                            @for ($i = 1; $i <= 5; $i++)
                                <i class="fa-solid fa-star cursor-pointer" data-rating="{{ $i }}"></i>
                            @endfor
                        </div>
                        <input type="hidden" name="rating" id="rating" value="0">
                    </div>

                    {{-- Thêm product_id --}}
                    <input type="hidden" name="product_id" value="{{ $product->product_id }}">

                    {{-- Nút gửi đánh giá --}}
                    <button type="submit"
                        class="w-[192px] h-[82px] text-3xl font-normal bg-[#ffcccc] text-black rounded-md hover:opacity-80">
                        Send
                    </button>
                </div>
            </div>
        </form>
    @endif
    </div>
    </div>
    </div>
    <!-- các bài báo -->
    <div class="text-center text-6xl font-black text py-6 mb-7 mx-auto mt-16" style="width: 50%; border-radius: 50px;background-color: #FFFDD0">
        Some recipes use this ingredient
    </div>
    <div class="products flex flex-col gap-y-10 items-center justify-center">
        {{-- 1 bài báo --}}
        <div class="flex items-center bg-[#FFFDD0] rounded-xl shadow-lg relative w-3/4 md:w-2/3 h-[200px] my-3">
            <!-- Image placeholder -->
            <img class="rounded-lg mr-4 w-[200px] h-[200px]"
                src="{{ asset('public/frontend/client/page/image/post2.jpg') }}">

            <!-- Paper details -->
            <div class="self-start space-y-8">
                <div class="ten-san-pham font-bold text-[30px] text-black mb-2">5+ Ways to make birthday cakes without
                    an oven for busy people</div>
                <div class="description text-2xl font-medium"> Are you preparing to make a birthday cake for your
                    relatives or friends but
                    worried because you have no experience making birthday cakes? Don't worry, here are 8 great tips...
                </div>
            </div>
        </div>
        <div class="flex items-center bg-[#FFFDD0] rounded-xl shadow-lg relative w-3/4 md:w-2/3 h-[200px] my-3">
            <!-- Image placeholder -->
            <img class="rounded-lg mr-4 w-[200px] h-[200px]"
                src="{{ asset('public/frontend/client/page/image/post2.jpg') }}">

            <!-- Paper details -->
            <div class="self-start space-y-8">
                <div class="ten-san-pham font-bold text-[30px] text-black mb-2">5+ Ways to make birthday cakes without
                    an oven for busy people</div>
                <div class="description text-2xl font-medium"> Are you preparing to make a birthday cake for your
                    relatives or friends but
                    worried because you have no experience making birthday cakes? Don't worry, here are 8 great tips...
                </div>
            </div>
        </div>
    </div>
    {{-- see more --}}
    <div class="flex justify-center mt-10">
        <div class="w-96 h-16 text-center text-black text-3xl font-black font-['Inter']">See more >></div>
    </div>

    <div class="w-96 h-20 text-center text-black text-4xl font-bold font-['Inter'] leading-normal tracking-wide">
        Similar products
    </div>
    <div id="productContainer" class="flex gap-x-[45px] overflow-hidden justify-center">
        @foreach ($related_product as $product)
            <div class="md:w-[356px] h-[507px] w-full flex flex-col items-center bg-[#FFDEDE80] rounded-[28px] relative">
                {{-- sale --}}
                @if ($product->deal_id)
                    <div class="bg-[#004FA8] w-[128px] h-[36px] rounded-tr-[20px] rounded-br-[20px] flex justify-center items-center absolute left-0 top-4"
                        style="z-index: 1000;">
                        <i class="fa-solid fa-bolt text-yellow-300 mr-5"></i>
                        <span class="text-white text-2xl font-bold">SALE
                            <span>{{ $product->deal_discount * 100 }}%</span></span>
                    </div>
                @endif
                <!-- {{-- best seller --}}
                            <div class="md:w-[148px] md:h-[30px] bg-[#FFCB06] flex justify-center items-center rounded-xl absolute bottom-[185px] right-0">
                                <span class="text-2xl text-center font-bold text-black">BEST SELLER
                                    <i class="fa-solid fa-circle-check text-[#004FA8]"></i>
                                </span>
                            </div> -->
                            <a href="{{ route('detail', ['id' => $product->product_id]) }}" class="cursor-pointer relative">
                            <img src="{{ filter_var($product->product_image, FILTER_VALIDATE_URL) ? $product->product_image : asset('public/backend/image/' . $product->product_image) }}"
                                class="hover:scale-90 w-[305px] h-[305px] mt-6 ml-6 mr-6 object-cover rounded-[20px]" alt="Product Image">
                            <div class="md:w-[160px] md:h-[40px] bg-[#f8f8f8] flex justify-center items-center rounded-full absolute bottom-2 right-2 shadow-lg">
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
                        </a>
                <div class="item-name text-3xl text-center font-bold mt-8">
                    <a href="{{ route('detail', ['id' => $product->product_id]) }}" class="text-black hover:underline">
                        {{ $product->product_name }}
                    </a>
                </div>
                <div class="price relative w-full pt-2 ml-6 flex justify-between mt-6">
                    <span
                        class="text-3xl ml-[20px] font-medium">{{ number_format($product->product_price, 0, ',', '.') . ' VND' }}</span>

                    <!-- icon thêm giỏ hàng -->
                    <div class="mr-[35px]">
                    <i class="fa-solid fa-cart-plus text-[30px]" id="addToCartIcon1" class="add-to-cart-icon"
                        data-product-id="{{ $product->product_id }}" data-product-name="{{ $product->product_name }}"
                        data-product-price="{{ number_format($product->product_price, 0, ',', '.') . ' VND' }}"></i>
                    </div>
                    <!-- icon thêm giỏ hàng -->
                </div>
                <button
                    class="buy-now-btn md:w-[330px] font-semibold mt-4 md:h-[60px] text-2xl text-white bg-[#D65050] rounded-[60px] absolute bottom-4 left-1/2 transform -translate-x-1/2"
                    data-product-id="{{ $product->product_id }}" 
                    data-product-name="{{ $product->product_name }}" 
                    data-product-price="{{ number_format($product->product_price, 0, ',', '.') . ' VND' }}">
                    <span class="px-4 py-8">BUY NOW</span>
                </button>
            </div>
        @endforeach
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const wishlistIcons = document.querySelectorAll('.wishlist-icon');

            wishlistIcons.forEach(icon => {
                icon.addEventListener('click', function() {
                    const productId = this.getAttribute('data-product-id');

                    fetch('{{ route('wishlist.toggle') }}', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': document.querySelector(
                                    'meta[name="csrf-token"]').getAttribute('content'),
                            },
                            body: JSON.stringify({
                                product_id: productId
                            }),
                        })
                        .then(response => {
                            if (!response.ok) {
                                throw new Error(`Server error: ${response.status}`);
                            }
                            return response.json();
                        })
                        .then(data => {
                            if (data.success) {
                                this.classList.toggle('text-red-500');
                                alert(data.message);
                            } else {
                                alert(data.message || 'An error occurred.');
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            alert('An error occurred. Please try again.');
                        });
                });
            });
        });
    </script>

    <script>
        document.getElementById('image-upload').addEventListener('change', function(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const img = document.getElementById('uploaded-image');
                    img.src = e.target.result; // Hiển thị ảnh preview từ local
                    img.classList.remove('hidden'); // Hiển thị ảnh nếu đang ẩn
                };
                reader.readAsDataURL(file);
            }
        });
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const stars = document.querySelectorAll("#star-rating .fa-star");
            const ratingInput = document.getElementById("rating");
            stars.forEach(star => {
                star.addEventListener("click", function() {
                    const rating = this.getAttribute("data-rating");
                    // Cập nhật giá trị của input hidden
                    ratingInput.value = rating;
                    console.log(rating);
                    // Cập nhật màu sắc của các sao
                    stars.forEach(star => {
                        if (parseInt(star.getAttribute("data-rating")) <= rating) {
                            star.classList.add("text-yellow-400");
                        } else {
                            star.classList.remove("text-yellow-400");
                        }
                    });
                });
            });
        });

        document.getElementById('addToCartIcon').addEventListener('click', function() {
            const productId = this.getAttribute('data-product-id');
            const productName = this.getAttribute('data-product-name');
            const productPrice = this.getAttribute('data-product-price');

            // Gửi yêu cầu thêm sản phẩm vào giỏ hàng
            addToCart(productId, productName, productPrice);
        });
        document.getElementById('addToCartIcon1').addEventListener('click', function() {
            const productId = this.getAttribute('data-product-id');
            const productName = this.getAttribute('data-product-name');
            const productPrice = this.getAttribute('data-product-price');

            // Gửi yêu cầu thêm sản phẩm vào giỏ hàng
            addToCart(productId, productName, productPrice);
        });

        function addToCart(productId, productName, productPrice) {
            fetch('{{ url('/cart/add') }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: JSON.stringify({
                        product_id: productId,
                        product_name: productName,
                        product_price: productPrice
                    })
                }).then(response => response.json())
                .then(data => {
                    if (data.success) {
                        alert('Sản phẩm đã được thêm vào giỏ hàng!');
                    } else {
                        alert('Không thể thêm sản phẩm vào giỏ hàng.');
                    }
                }).catch(error => console.error('Error:', error));
        }
    </script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const buyNowButtons = document.querySelectorAll('.buy-now-btn');
        
        buyNowButtons.forEach(button => {
            button.addEventListener('click', function() {
                const productId = this.dataset.productId;
                const productName = this.dataset.productName;
                const productPrice = this.dataset.productPrice;

                // Gửi thông tin sản phẩm tới server qua AJAX
                fetch('{{ route("buy.now") }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({
                        productId: productId,
                        productName: productName,
                        productPrice: productPrice,
                        quantity: 1 // Số lượng mặc định
                    })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        // Chuyển hướng sang trang payment
                        window.location.href = '{{ route("payment.page") }}';
                    } else {
                        alert('Error adding product to cart: ' + data.message);
                    }
                })
                .catch(error => console.error('Error:', error));
            });
        });
    });
</script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const buyNowButtons = document.querySelectorAll('.buy-now-btnPD');
        
        buyNowButtons.forEach(button => {
            button.addEventListener('click', function() {
                const productId = this.dataset.productId;
                const productName = this.dataset.productName;
                const productPrice = this.dataset.productPrice;

                // Gửi thông tin sản phẩm tới server qua AJAX
                fetch('{{ route("buy.nowPD") }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({
                        productId: productId,
                        productName: productName,
                        productPrice: productPrice,
                        quantity: 1 // Số lượng mặc định
                    })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        // Chuyển hướng sang trang payment
                        window.location.href = '{{ route("payment.page") }}';
                    } else {
                        alert('Error adding product to cart: ' + data.message);
                    }
                })
                .catch(error => console.error('Error:', error));
            });
        });
    });
</script>

@endsection
