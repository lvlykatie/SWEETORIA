@extends('admin.layout')
@section('add-deal')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<main class="w-full flex-grow p-6">
    <h1 class="w-full text-3xl text-black pb-6">Create new deal</h1>

    <div class='panel-body'>
        <?php
        $message = Session::get('message');
        if ($message) {
            echo '<span class="text-green-600">' . $message . '</span>';
            Session::put('message', null);
        }
        ?>
    </div>

    <div class="flex flex-wrap">
        <div class="w-full my-6 pr-0 lg:pr-2">
            <p class="text-xl pb-6 flex items-center">
                <svg class="svg-inline--fa fa-list fa-w-16 mr-3" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="list" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                    <path fill="currentColor" d="M80 368H16a16 16 0 0 0-16 16v64a16 16 0 0 0 16 16h64a16 16 0 0 0 16-16v-64a16 16 0 0 0-16-16zm0-320H16A16 16 0 0 0 0 64v64a16 16 0 0 0 16 16h64a16 16 0 0 0 16-16V64a16 16 0 0 0-16-16zm0 160H16a16 16 0 0 0-16 16v64a16 16 0 0 0 16 16h64a16 16 0 0 0 16-16v-64a16 16 0 0 0-16-16zm416 176H176a16 16 0 0 0-16 16v32a16 16 0 0 0 16 16h320a16 16 0 0 0 16-16v-32a16 16 0 0 0-16-16zm0-320H176a16 16 0 0 0-16 16v32a16 16 0 0 0 16 16h320a16 16 0 0 0 16-16V80a16 16 0 0 0-16-16zm0 160H176a16 16 0 0 0-16 16v32a16 16 0 0 0 16 16h320a16 16 0 0 0 16-16v-32a16 16 0 0 0-16-16z"></path>
                </svg><!-- <i class="fas fa-list mr-3"></i> --> Information
            </p>
            <div class="leading-loose">
                <form class="p-10 bg-white rounded shadow-xl" role="form" action="{{URL::to('admin/deals/save')}}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="">
                        <label class="block text-xl text-gray-600" for="name">Deal title</label>
                        <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" id="name" name="deal_name" type="text" required="" placeholder="Enter deal's title" aria-label="Name">
                    </div>
                    <div class="">
                        <label class="block text-xl text-gray-600" for="name">Describe</label>
                        <textarea class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" id="name" name="deal_desc" type="text" required="" placeholder="Enter deal's describe" aria-label="Name"></textarea>
                    </div>
                    <div class="">
                        <label class="block text-xl text-gray-600" for="name">Deal discount</label>
                        <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" type="number" step="0.01" min="0.1" id="name" name="deal_discount" type="text" required="" placeholder="Enter deal's discount" aria-label="Name">
                    </div>
                    <div class="mt-2 relative">
                        <label class="block text-xl text-gray-600">Image</label>
                        <div class="py-4 flex flex-col items-center justify-center rounded-lg border border-dashed bg-gray-200 border-gray-900">

                            <!-- Image Preview -->
                            <div class="mb-4" id="imageContainer">
                                <img style="display: none;" class="h-52" src="#" alt="img preview" id="imgPreview">
                            </div>

                            <!-- SVG and Upload Button -->
                            <div class="text-center">
                                <svg class="mx-auto h-12 w-12 text-gray-300" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M1.5 6a2.25 2.25 0 012.25-2.25h16.5A2.25 2.25 0 0122.5 6v12a2.25 2.25 0 01-2.25 2.25H3.75A2.25 2.25 0 011.5 18V6zM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0021 18v-1.94l-2.69-2.689a1.5 1.5 0 00-2.12 0l-.88.879.97.97a.75.75 0 11-1.06 1.06l-5.16-5.159a1.5 1.5 0 00-2.12 0L3 16.061zm10.125-7.81a1.125 1.125 0 112.25 0 1.125 1.125 0 01-2.25 0z" clip-rule="evenodd"></path>
                                </svg>

                                <!-- Upload Button -->
                                <div class="flex text-sm leading-6 text-gray-600 mt-2">
                                    <label for="fileUpload" class="relative cursor-pointer rounded-md bg-white font-semibold text-black-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-blue-800 focus-within:ring-offset-2 hover:text-blue-800">
                                        <span>Upload an image</span>
                                        <input id="fileUpload" name="deal_image" type="file" class="sr-only">
                                    </label>
                                    <p class="pl-1">up to 50mb</p>
                                </div>
                                <p class="text-xs leading-5 text-gray-600">PNG, JPG, JPEG</p>
                            </div>
                        </div>
                    </div>
                    <div id="product-list">
                        <div class="mt-2 flex items-center space-x-3" id="product-block">
                            <!-- Product Name Input -->
                            <div class="flex-grow">
                                <label class="block text-sm text-gray-600" for="product-name">Product Name</label>
                                <select id="product-name" name="product_name[]" required aria-label="Product Name" class="w-full px-5 py-2 text-gray-700 bg-gray-200 rounded border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500">
                                    <option value="" disabled selected>Select product</option>
                                    @foreach($products as $product)
                                        <option value="<?= htmlspecialchars($product->product_name); ?>"><?= htmlspecialchars($product->product_name); ?></option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Remove Button (X) -->
                            <button type="button" class="mt-6 text-red-500 hover:text-red-700" onclick="removeProduct(this)">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </div>
                    </div>

                    <!-- Add Product Button -->
                    <div class="mt-4">
                        <button type="button" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700" onclick="addProducts()">
                            <i class="fa-solid fa-circle-plus mr-1"></i>Product
                        </button>
                    </div>
                    <div class="mt-6 flex justify-center">
                        <button class="px-4 py-1 text-white font-light tracking-wider bg-gray-900 rounded" type="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>
@endsection

<!--Sửa id, name từ product về deal, đổi dòng tên product thành thanh tìm kiếm kèm combo box-->