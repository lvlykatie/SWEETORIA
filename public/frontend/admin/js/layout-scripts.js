function addProducts() {
    const container = document.getElementById('product-list');
    const newProductBlock = document.createElement('div');
    newProductBlock.classList.add('product-block', 'flex', 'flex-col', 'mb-4');

    newProductBlock.innerHTML = `
    <div class="mt-2 flex items-center space-x-3" id="product-block">
        <div class="flex-grow">
            <label class="block text-sm text-gray-600" for="product-name">Product Name</label>
            <select class="product-name" name="product_name[]" required aria-label="Product Name" class="w-full px-5 py-2 text-gray-700 bg-gray-200 rounded border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500">
                <option value="" disabled selected>Select product</option>
                @foreach($product as $product)
                    <option value="{{ $product->product_name}}">{{ $product->product_name }}</option>
                @endforeach
            </select>
        </div>
        <button type="button" class="mt-6 text-red-500 hover:text-red-700" onclick="removeProduct(this)">
            <i class="fa-solid fa-trash"></i>
        </button>
    </div>
`;

    // Thêm block sản phẩm vào container
    container.appendChild(newProductBlock);

    // Khởi tạo Choices cho select box mới
    const productSelect = newProductBlock.querySelector('.product-name');
    new Choices(productSelect, {
        searchEnabled: true,
        placeholder: true,
        searchPlaceholderValue: 'Search products...',
    });
}


function removeProduct(button) {
    const productBlock = button.closest('.product-block'); // Lấy khối sản phẩm chứa nút bấm
    productBlock.remove(); // Xóa khối sản phẩm
}