@extends('layouts.master')

@section('title', 'Cart')

@section('content')
    <div class="flex px-7 mt-32 mb-14 justify-around ">

        <div class="products flex flex-col items-center w-full gap-y-10">
            {{-- Bắt đầu vòng lặp để hiển thị sản phẩm từ giỏ hàng --}}
            @foreach ($products as $product)
                <div class="flex items-center rounded-xl shadow-lg relative bg-product w-full md:w-2/3 h-44 md:h-[200px]"
                    data-product-id="{{ $product['id'] }}">
                    <!-- Checkbox -->
                    <input type="checkbox" class="mr-4 ml-2 h-6 w-6">
                    <!-- Product Image -->
                    <img class="rounded-lg mr-4 h-full w-[110px] md:w-[200px]"
                        src="{{ filter_var($product['image'], FILTER_VALIDATE_URL) ? $product['image'] : asset('public/backend/image/' . $product['image']) }}"
                        alt="{{ $product['name'] }}">

                    <!-- Product Details -->
                    <div class="flex-grow">
                        <h2 class="text-4xl ten-san-pham font-bold text-black mb-2">{{ $product['name'] }}</h2>
                        <div class="flex items-center space-x-4">
                            <p class="text-xl text-black">Quantity: </p>
                            <!-- Quantity controls -->
                            <div class="flex items-center rounded-md py-10">
                                <!-- Nút giảm số lượng -->
                                <button class="decrease-quantity px-2 py-1 bg-gray-100 hover:bg-gray-200"><svg
                                        xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 22 22"
                                        fill="none">
                                        <path d="M15.2319 10.986H6.73926" stroke="#004FA8" stroke-width="2.12316"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                    </svg></button>
                                <!-- Nút giảm số lượng -->
                                <span class="quantity px-4 text-2xl">{{ $product['quantity'] }}</span>
                                <!-- Nút tăng số lượng -->
                                <button class="increase-quantity px-2 py-1 bg-gray-100 hover:bg-gray-200"><svg
                                        xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 22 22"
                                        fill="none">
                                        <path
                                            d="M11.2659 6.73999V10.9863M11.2659 15.2326V10.9863M11.2659 10.9863H15.5122M11.2659 10.9863H7.01953"
                                            stroke="#004FA8" stroke-width="2.12316" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                    </svg></button>
                                <!-- Nút tăng số lượng -->
                            </div>
                        </div>
                    </div>

                    <!-- Product Price -->
                    <div
                        class="product-total-price text-red-800 text-5xl font-light font-['Inter'] md:text-5xl absolute right-2 bottom-0">
                        {{ number_format($product['total'], 0, ',', '.') }} VND
                    </div>
                </div>
            @endforeach

            <div class="flex-wrap pt-6 flex justify-end md:pr-[76px]">
                <button
                    class="text-center  bg-red-500 rounded-2xl text-white font-black md:max-w-[400px] text-3xl md:text-5xl">
                    <span>Total: 50000</span>
                    <br>
                    BUY
                    NOW</button>
            </div>
        </div>

    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const updateQuantity = (productId, quantity) => {
                console.log(`Updating product ID: ${productId}, new quantity: ${quantity}`); // Log kiểm tra

                fetch('{{ route('cart.updateQuantity') }}', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute(
                                'content')
                        },
                        body: JSON.stringify({
                            product_id: productId,
                            quantity: quantity
                        })
                    })
                    .then(response => response.json())
                    .then(data => {
                        console.log('Server response:', data); // Log kiểm tra

                        if (data.success) {
                            const productElement = document.querySelector(
                                `[data-product-id="${productId}"]`);
                            if (productElement) {
                                productElement.querySelector('.quantity').textContent = quantity;
                                productElement.querySelector('.product-total-price').textContent =
                                    `${new Intl.NumberFormat().format(data.productTotalPrice)} VND`;
                            }
                            document.getElementById('total-price').textContent =
                                `${new Intl.NumberFormat().format(data.newTotalPrice)} VND`;
                        } else {
                            alert(data.message);
                        }
                    })
                    .catch(error => console.error('Error updating quantity:', error));
            };

            document.querySelectorAll('.decrease-quantity').forEach(button => {
                button.addEventListener('click', () => {
                    const productElement = button.closest('[data-product-id]');
                    if (!productElement) {
                        console.error('Product element not found for decrease button');
                        return;
                    }

                    const productId = productElement.dataset.productId;
                    const quantity = parseInt(productElement.querySelector('.quantity')
                    .textContent);
                    if (quantity > 1) {
                        updateQuantity(productId, quantity - 1);
                    }
                });
            });

            document.querySelectorAll('.increase-quantity').forEach(button => {
                button.addEventListener('click', () => {
                    const productElement = button.closest('[data-product-id]');
                    if (!productElement) {
                        console.error('Product element not found for increase button');
                        return;
                    }

                    const productId = productElement.dataset.productId;
                    const quantity = parseInt(productElement.querySelector('.quantity')
                    .textContent);
                    updateQuantity(productId, quantity + 1);
                });
            });
        });
    </script>
@endsection
