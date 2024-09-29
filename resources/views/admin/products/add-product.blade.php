@extends('admin.layout')
@section('add-product')
<main class="w-full flex-grow p-6">
    <h1 class="w-full text-3xl text-black pb-6">Create new product</h1>

    <div class="flex flex-wrap">
        <div class="w-full my-6 pr-0 lg:pr-2">
            <p class="text-xl pb-6 flex items-center">
                <svg class="svg-inline--fa fa-list fa-w-16 mr-3" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="list" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                    <path fill="currentColor" d="M80 368H16a16 16 0 0 0-16 16v64a16 16 0 0 0 16 16h64a16 16 0 0 0 16-16v-64a16 16 0 0 0-16-16zm0-320H16A16 16 0 0 0 0 64v64a16 16 0 0 0 16 16h64a16 16 0 0 0 16-16V64a16 16 0 0 0-16-16zm0 160H16a16 16 0 0 0-16 16v64a16 16 0 0 0 16 16h64a16 16 0 0 0 16-16v-64a16 16 0 0 0-16-16zm416 176H176a16 16 0 0 0-16 16v32a16 16 0 0 0 16 16h320a16 16 0 0 0 16-16v-32a16 16 0 0 0-16-16zm0-320H176a16 16 0 0 0-16 16v32a16 16 0 0 0 16 16h320a16 16 0 0 0 16-16V80a16 16 0 0 0-16-16zm0 160H176a16 16 0 0 0-16 16v32a16 16 0 0 0 16 16h320a16 16 0 0 0 16-16v-32a16 16 0 0 0-16-16z"></path>
                </svg><!-- <i class="fas fa-list mr-3"></i> --> Information
            </p>
            <div class="leading-loose">
                <form class="p-10 bg-white rounded shadow-xl" role="form" action="{{URL::to('/save')}}" method="post">
                    {{ csrf_field() }}
                    <div class="">
                        <label class="block text-xl text-gray-600" for="name">Product name</label>
                        <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" id="name" name="product_name" type="text" required="" placeholder="Enter product's name" aria-label="Name">
                    </div>
                    <div class="mt-2">
                        <label class="block text-xl text-gray-600" for="category">Category</label>
                        <select id="category" name="category" class="w-full px-5 py-4 text-gray-700 bg-gray-200 rounded border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500" role="combobox" aria-label="Category" required>
                            <option value="baking-ingredients">Baking ingredients</option>
                            <option value="baking-tools">Baking tools</option>
                            <option value="baking-trays-molds">Baking trays, molds</option>
                            <option value="bags-boxes-cups-jars">Bags, boxes, cups, jars</option>
                        </select>
                    </div>
                    <div class="mt-2">
                        <label class="block text-xl text-gray-600" for="sku">SKU</label>
                        <input class="w-full px-5 py-2 text-gray-700 bg-gray-200 rounded border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500"
                            id="sku"
                            name="product_sku"
                            type="number"
                            required
                            placeholder="Enter SKU"
                            aria-label="SKU">
                    </div>
                    <div class="mt-2 relative">
                        <label class="block text-xl text-gray-600" for="price">Price</label>
                        <input class="w-full pl-16 pr-5 py-2 text-gray-700 bg-gray-200 rounded border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500"
                            id="price"
                            name="product_price"
                            type="number"
                            step="1000"
                            min="1000"
                            required
                            placeholder="1000"
                            aria-label="Price">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-500">₫</span>
                    </div>
                    <div class="mt-2 relative">
                        <label class="block text-xl text-gray-600" for="name">Describe</label>
                        <textarea class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" id="name" name="product_desc" type="text" required="" placeholder="Enter product's describe" aria-label="Name"></textarea> 
                    </div>
                    <div class="mt-2 relative">
                        <label class="block text-xl text-gray-600">Image</label>
                        <div class="py-1 flex justify-center rounded-lg border border-dashed bg-gray-200 border-gray-900 py-1">
                            <div class="text-center">
                                <svg class="mx-auto h-12 w-12 text-gray-300" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M1.5 6a2.25 2.25 0 012.25-2.25h16.5A2.25 2.25 0 0122.5 6v12a2.25 2.25 0 01-2.25 2.25H3.75A2.25 2.25 0 011.5 18V6zM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0021 18v-1.94l-2.69-2.689a1.5 1.5 0 00-2.12 0l-.88.879.97.97a.75.75 0 11-1.06 1.06l-5.16-5.159a1.5 1.5 0 00-2.12 0L3 16.061zm10.125-7.81a1.125 1.125 0 112.25 0 1.125 1.125 0 01-2.25 0z" clip-rule="evenodd"></path>
                                </svg>

                                <div class="flex text-sm leading-6 text-gray-600 ">
                                    <label for="fileUpload" class="relative cursor-pointer rounded-md bg-white font-semibold text-black-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-blue-800 focus-within:ring-offset-2 hover:text-blue-800">
                                        <span>Upload an image</span>
                                        <input id="fileUpload" name="product_image" type="file" class="sr-only">
                                    </label>
                                    <p class="pl-1">up to 50mb</p>
                                </div>
                                <p class="text-xs leading-5 text-gray-600">PNG, JPG, JPEG</p>
                            </div>
                        </div>
                        <div class="sm:col-span-full mt-12 mx-auto">
                            <img style="display:none" class="h-52" src="#"
                                alt="img preview" id="imgPreview">
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