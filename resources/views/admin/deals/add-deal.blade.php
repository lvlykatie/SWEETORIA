@extends('admin.layout')
@section('add-deal')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<main class="w-full flex-grow p-6">
    <h1 class="w-full text-3xl text-black pb-6">Create new deal</h1>

    <div class="flex flex-wrap">
        <div class="w-full my-6 pr-0 lg:pr-2">
            <p class="text-xl pb-6 flex items-center">
                <svg class="svg-inline--fa fa-list fa-w-16 mr-3" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="list" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                    <path fill="currentColor" d="M80 368H16a16 16 0 0 0-16 16v64a16 16 0 0 0 16 16h64a16 16 0 0 0 16-16v-64a16 16 0 0 0-16-16zm0-320H16A16 16 0 0 0 0 64v64a16 16 0 0 0 16 16h64a16 16 0 0 0 16-16V64a16 16 0 0 0-16-16zm0 160H16a16 16 0 0 0-16 16v64a16 16 0 0 0 16 16h64a16 16 0 0 0 16-16v-64a16 16 0 0 0-16-16zm416 176H176a16 16 0 0 0-16 16v32a16 16 0 0 0 16 16h320a16 16 0 0 0 16-16v-32a16 16 0 0 0-16-16zm0-320H176a16 16 0 0 0-16 16v32a16 16 0 0 0 16 16h320a16 16 0 0 0 16-16V80a16 16 0 0 0-16-16zm0 160H176a16 16 0 0 0-16 16v32a16 16 0 0 0 16 16h320a16 16 0 0 0 16-16v-32a16 16 0 0 0-16-16z"></path>
                </svg><!-- <i class="fas fa-list mr-3"></i> --> Information
            </p>
            <div class="leading-loose">
                <form class="p-10 bg-white rounded shadow-xl">
                    <div class="">
                        <label class="block text-xl text-gray-600" for="name">Deal title</label>
                        <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" id="name" name="name" type="text" required="" placeholder="Enter product's name" aria-label="Name">
                    </div>
                    <div id="product-list">
                        <div class="mt-2 flex items-center space-x-3">
                            <!-- Product Name Input -->
                            <div class="flex-grow">
                                <label class="block text-sm text-gray-600" for="product-name">Product Name</label>
                                <input class="w-full px-5 py-2 text-gray-700 bg-gray-200 rounded border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500"
                                    id="product-name"
                                    name="product-name[]"
                                    type="text"
                                    required
                                    placeholder="Enter product name"
                                    aria-label="Product Name">
                            </div>

                            <!-- Price Input with Currency Symbol -->
                            <div class="flex-grow relative">
                                <label class="block text-sm text-gray-600" for="price">Price</label>
                                <input class="w-full pl-16 pr-5 py-2 text-gray-700 bg-gray-200 rounded border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500"
                                    id="price"
                                    name="price[]"
                                    type="number"
                                    step="0.01"
                                    min="1000"
                                    required
                                    placeholder="1000"
                                    aria-label="Price">
                                <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-500">₫</span>
                            </div>

                            <!-- Remove Button (X) -->
                            <button type="button" class="mt-6 text-red-500 hover:text-red-700" onclick="removeProduct(this)">
                                X
                            </button>
                        </div>
                    </div>

                    <!-- Add Product Button -->
                    <div class="mt-4">
                        <button type="button" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700" onclick="addProduct()">
                        <i class="fa-solid fa-circle-plus mr-1"></i>Product
                        </button>
                    </div>
                    <div class="mt-6">
                        <button class="px-4 py-1 text-white font-light tracking-wider bg-gray-900 rounded" type="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>
@endsection