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
                    <input type="checkbox" class="product-checkbox mr-4 ml-2 h-6 w-6">
                    <!-- Product Image -->
                    <img class="rounded-lg mr-4 h-full w-[110px] md:w-[200px]"
                        src="{{ filter_var($product['image'], FILTER_VALIDATE_URL) ? $product['image'] : asset('public/backend/image/' . $product['image']) }}"
                        alt="{{ $product['name'] }}">

                    <!-- Product Details -->
                    <div class="flex-grow">
                        <h2 class="text-[36px] ten-san-pham font-bold text-black mb-24">{{ $product['name'] }}</h2>
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

                    <!-- Product total Price -->
                    <div
                        class="product-total-price text-red-800 text-5xl font-light font-['Inter'] md:text-5xl absolute right-2 bottom-0">
                        {{ number_format($product['total'], 0, ',', '.') }} VND
                    </div>
                    <!-- Icon trash delete this product -->
                    <div class="absolute right-2 top-2 cursor-pointer hover:text-[#D65050]">
                        <i class="fa-solid fa-trash text-[36px] remove-wishlist-item"
                        data-product-id="{{ $product['id'] }}"></i>
                    </div>
                </div>
            @endforeach

            <div class="flex-wrap pt-6 flex justify-between md:pr-[76px] md:w-[990px]">
                <!-- Checkbox chọn mua tất cả sản phẩm -->
                <div class="product-checkbox-all">
                    <input type="checkbox" class="product-checkbox-all mr-4 ml-2 h-6 w-6">
                    <label for="" class="text-[45px] font-medium">All</label>
                </div>
                <!-- <p class="text-[45px] font-medium ">Product quantity: <span></span></p> -->
                <button
                    class="text-center  bg-red-500 rounded-2xl text-white font-black md:max-w-[400px] text-3xl md:text-5xl">
                    <!-- tổng tiền giỏ hàng (Total) -->
                    <span id="selected-total-price">Total: 0 VND</span>
                    <br>
                    BUY
                    NOW</button>
            </div>
        </div>

    </div>

    <script>

        // Đặt hàm calculateSelectedTotal trong phạm vi toàn cục
        const calculateSelectedTotal = () => {
            let total = 0;
            const productCheckboxes = document.querySelectorAll('.product-checkbox');
            productCheckboxes.forEach(checkbox => {
                if (checkbox.checked) {
                    const productElement = checkbox.closest('[data-product-id]');
                    if (productElement) {
                        const productTotalPriceText = productElement.querySelector('.product-total-price').textContent;
                        const productTotalPrice = parseFloat(productTotalPriceText.replace(/[^0-9.-]+/g, ''));
                        if (!isNaN(productTotalPrice)) {
                            total += productTotalPrice;
                        }
                    }
                }
            });

            total = total * 1000; // Nếu tổng tiền cần nhân thêm hệ số
            const totalElement = document.querySelector('#selected-total-price');
            if (totalElement) {
                totalElement.textContent = 'Total: ' + total.toLocaleString() + ' VND';
            }
        };

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

            // Hàm tính tổng tiền của các sản phẩm được chọn
            const productCheckboxes = document.querySelectorAll('.product-checkbox');
            const totalElement = document.querySelector('#selected-total-price'); // Phần hiển thị tổng tiền


            // Lắng nghe sự kiện thay đổi checkbox
            productCheckboxes.forEach(checkbox => {
                checkbox.addEventListener('change', calculateSelectedTotal);
            });

            // Gọi hàm tính tổng tiền một lần khi trang tải (nếu cần)
            calculateSelectedTotal();


        });

        // Xử lý sự kiện khi click vào nút "BUY NOW"

        document.querySelector('.bg-red-500').addEventListener('click', () => {
            const selectedProducts = [];
            document.querySelectorAll('.product-checkbox:checked').forEach((checkbox) => {
                const productElement = checkbox.closest('[data-product-id]');
                if (productElement) {
                    const productId = productElement.dataset.productId;
                    const quantity = parseInt(productElement.querySelector('.quantity').textContent);
                    selectedProducts.push({
                        productId,
                        quantity
                    });
                }
            });

            // Kiểm tra nếu không có sản phẩm nào được chọn
            if (selectedProducts.length === 0) {
                alert('Please select at least one product to proceed.');
                return;
            }

            // Gửi dữ liệu đến backend
            fetch('{{ route('cart.buyNow') }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute(
                            'content'),
                    },
                    body: JSON.stringify({
                        selectedProducts
                    }),
                })
                .then((response) => response.json())
                .then((data) => {
                    if (data.success) {
                        window.location.href = data.redirectUrl;
                    } else {
                        alert(data.message);
                    }
                })
                .catch((error) => console.error('Error:', error));
        });

        // Xử lý sự kiện xóa sản phẩm khỏi giỏ hàng

        document.addEventListener('DOMContentLoaded', function () {
            const removeButtons = document.querySelectorAll('.fa-trash');

            removeButtons.forEach(button => {
                button.addEventListener('click', function () {
                    const productId = this.closest('[data-product-id]').getAttribute('data-product-id');
                    const productElement = this.closest('[data-product-id]'); // Tìm phần tử chứa sản phẩm

                    if (confirm('Are you sure you want to remove this product from the cart?')) {
                        fetch('{{ route("cart.remove") }}', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                            },
                            body: JSON.stringify({ product_id: productId }),
                        })
                            .then(response => {
                                if (!response.ok) {
                                    throw new Error(`Server error: ${response.status}`);
                                }
                                return response.json();
                            })
                            .then(data => {
                                if (data.success) {
                                    // Xóa sản phẩm khỏi giao diện
                                    productElement.remove();

                                    // Cập nhật tổng giá giỏ hàng
                                    const totalPriceElement = document.getElementById('total-price');
                                    if (totalPriceElement) {
                                        totalPriceElement.textContent = `${new Intl.NumberFormat().format(data.newTotalPrice)} VND`;
                                    }

                                    alert(data.message);
                                    window.location.reload();
                                } else {
                                    alert(data.message || 'An error occurred.');
                                }
                            })
                            .catch(error => {
                                console.error('Error:', error);
                                alert('An error occurred. Please try again.');
                            });
                    }
                });
            });
        });

        document.addEventListener('DOMContentLoaded', () => {
            const allCheckbox = document.querySelector('.product-checkbox-all');
            const productCheckboxes = document.querySelectorAll('.product-checkbox');

            if (allCheckbox) {
                allCheckbox.addEventListener('change', () => {
                    const isChecked = allCheckbox.checked;
                    productCheckboxes.forEach(checkbox => {
                        checkbox.checked = isChecked;
                    });

                    // Gọi lại hàm calculateSelectedTotal
                    calculateSelectedTotal();
                });
            }

            productCheckboxes.forEach(checkbox => {
                checkbox.addEventListener('change', () => {
                    if (!checkbox.checked) {
                        allCheckbox.checked = false;
                    }

                    if (Array.from(productCheckboxes).every(cb => cb.checked)) {
                        allCheckbox.checked = true;
                    }

                    calculateSelectedTotal();
                });
            });
        });



    </script>
@endsection
