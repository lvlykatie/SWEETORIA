@extends('layouts.master')

@section('title', 'Product')
@section('content')
    <div id="product">
        <div class="search-bg relative flex items-center justify-center bg-cover bg-center h-72 md:h-[463px]"
            style="background-image: url('{{ asset('public/frontend/client/page/image/homepagebg.png') }}');">
        </div>
        <div class="filter w-full p-6 bg-white shadow-md rounded-md">
            <div class="flex flex-wrap">
                <div class="w-1/2 flex flex-col items-center">
                    <div class="flex flex-wrap text-3xl font-black">
                        Filter
                    </div>
                    <div class="flex flex-col flex-wrap gap-7 mt-4">
                        <div class="w-full text-3xl font-extrabold flex items-center">
                            <input type="checkbox" style="width: 30px; height: 30px;" id="baking-ingredients" name="filter[]"
                                value="baking-ingredients">
                            <label class="pl-8" for="">Baking ingredients </label>
                        </div>
                        <div class="w-auto text-3xl font-extrabold flex items-center">
                            <input type="checkbox" style="width: 30px; height: 30px;" id="baking tools" name="filter[]"
                                value="baking-tools">
                            <label class="pl-8" for="">Baking Tools </label>
                        </div>
                    </div>


                </div>
                <div class="w-1/2 text-3xl">
                    <div class="flex flex-wrap justify-center ">
                        <button class="w-2/3 md:w-1/6 text-3xl font-black rounded-xl bg-gray-500">Clear filter</button>
                    </div>
                    <div class="flex flex-col items-center flex-wrap gap-7 mt-4">
                        <div class="w-auto text-3xl font-extrabold flex items-center">
                            <input type="checkbox" class="rounded-md" style="width: 30px; height: 30px; border-radius: 5px;"
                                id="baking-trays" name="filter[]" value="Baking trays, molds">
                            <label class="pl-8" for="">Baking trays, molds</label>
                        </div>
                        <div class="w-auto text-3xl font-extrabold flex items-center">
                            <input type="checkbox" style="width: 30px; height: 30px;" id="bags boxes" name="filter[]"
                                value="Bags, boxes, cups, jars">
                            <label class="pl-8" for="">Bags, boxes, cups, jars</label>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Price Filter -->
            <div class="flex w-1/2 justify-center text-3xl font-black mt-4">
                Price
            </div>
            <div class="flex flex-wrap mt-4 justify-center">
                <div class="w-1/2 text-3xl font-extrabold flex justify-center">
                    <div class="w-auto text-3xl font-extrabold flex items-center">
                        <input type="radio" class="rounded-md" style="width: 30px; height: 30px; border-radius: 5px;"
                            id="low-to-high" name="sort" value="low-to-high">
                        <label class="pl-8" for="low-to-high">Low to high</label>
                    </div>
                </div>
                <div class="w-1/2 text-3xl font-extrabold flex justify-center">
                    <div class="w-auto text-3xl font-extrabold flex items-center">
                        <input type="radio" class="rounded-md" style="width: 30px; height: 30px; border-radius: 5px;"
                            id="high-to-low" name="sort" value="high-to-low">
                        <label class="pl-8" for="high-to-low">High to low</label>
                    </div>
                </div>
            </div>
            <div class="flex justify-center">
                <button
                    class="bg-yellow-200 text-3xl hover:bg-blue-400 hover:text-white text-black font-bold py-3 px-5 rounded-xl"
                    id="filterBtn" onclick="handleSubmitFilter()">
                    Filter
                </button>
            </div>
        </div>
        <div class="text-center text-6xl font-black rounded-3xl text py-6 mb-7" style="background-color: #FFFDD0">
            PRODUCTS
        </div>
        <div class="product-list">
            <div class="flex flex-wrap">
                @foreach ($products as $product)
                    <div class="md:w-1/3 w-full flex flex-col items-center">
                        <img src="{{ filter_var($product->product_image, FILTER_VALIDATE_URL) ? $product->product_image : asset('public/backend/image/' . $product->product_image) }}"
                            width="299" height="299" style="width: 299px; height: 299px; object-fit: cover;"
                            alt="Product Image">
                        <div class="item-name text-3xl text-center font-extrabold">
                            {{ $product->product_name }}
                        </div>
                        <div class="price relative text-center pt-2">
                            <span
                                class="text-3xl font-normal">{{ number_format($product->product_price, 0, ',', '.') . ' VND' }}</span>
                            <div class="absolute bottom-0" style="right: -110px">
                                <svg xmlns="http://www.w3.org/2000/svg" width="29" height="100%" viewBox="0 0 33 30"
                                    fill="none">
                                    <path
                                        d="M28.5398 18.75H12.254L12.6176 20.625H27.5297C28.3853 20.625 29.0195 21.4629 28.8299 22.3429L28.5234 23.7653C29.5618 24.2969 30.2778 25.4196 30.2778 26.7187C30.2778 28.547 28.8601 30.026 27.1209 29.9996C25.4641 29.9745 24.1014 28.5564 24.0567 26.8094C24.0323 25.8551 24.3948 24.9901 24.9902 24.3749H13.3431C13.9196 24.9706 14.2778 25.8003 14.2778 26.7187C14.2778 28.5828 12.804 30.0838 11.0183 29.9964C9.43278 29.9187 8.14328 28.5676 8.05995 26.8958C7.99561 25.6047 8.63972 24.4668 9.61834 23.8731L5.71572 3.75H1.83333C1.09694 3.75 0.5 3.12041 0.5 2.34375V1.40625C0.5 0.62959 1.09694 0 1.83333 0H7.52939C8.16278 0 8.70872 0.46998 8.83567 1.12441L9.34489 3.75H31.1661C32.0217 3.75 32.6559 4.58795 32.4663 5.46791L29.84 17.6554C29.7021 18.2957 29.1624 18.75 28.5398 18.75ZM23.1667 9.84375H20.5V7.5C20.5 6.98221 20.1021 6.5625 19.6111 6.5625H18.7222C18.2313 6.5625 17.8333 6.98221 17.8333 7.5V9.84375H15.1667C14.6757 9.84375 14.2778 10.2635 14.2778 10.7812V11.7187C14.2778 12.2365 14.6757 12.6562 15.1667 12.6562H17.8333V15C17.8333 15.5178 18.2313 15.9375 18.7222 15.9375H19.6111C20.1021 15.9375 20.5 15.5178 20.5 15V12.6562H23.1667C23.6576 12.6562 24.0556 12.2365 24.0556 11.7187V10.7812C24.0556 10.2635 23.6576 9.84375 23.1667 9.84375Z"
                                        fill="black" />
                                </svg>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        {{-- pagination --}}
        <div class="flex items-center justify-center border-t border-gray-200 bg-white px-4 py-3 sm:px-6">
            <div class="flex flex-1 justify-center sm:justify-center">
                <nav class="isolate inline-flex -space-x-px rounded-md shadow-sm" aria-label="Pagination">
                    <!-- Previous Page Link -->
                    <a href="{{ $products->previousPageUrl() . (request()->has('filter') ? '&filter=' . request('filter') : '') . (request()->has('sort') ? '&sort=' . request('sort') : '') }}"
                        class="relative inline-flex items-center rounded-l-md px-2 py-2 text-gray-400 ring-1 ring-inset ring-gray-300 hover:bg-blue-100">
                        <span class="sr-only">Previous</span>
                        <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M11.78 5.22a.75.75 0 0 1 0 1.06L8.06 10l3.72 3.72a.75.75 0 1 1-1.06 1.06l-4.25-4.25a.75.75 0 0 1 0-1.06l4.25-4.25a.75.75 0 0 1 1.06 0Z"
                                clip-rule="evenodd" />
                        </svg>
                    </a>

                    <!-- Pagination Links -->
                    @foreach ($products->getUrlRange(1, $products->lastPage()) as $page => $url)
                        <a href="{{ $url . (request()->has('filter') ? '&filter=' . request('filter') : '') . (request()->has('sort') ? '&sort=' . request('sort') : '') }}"
                            class="{{ $page == $products->currentPage() ? 'bg-yellow-300' : '' }} relative inline-flex items-center px-4 py-2 text-2xl font-semibold text-gray-900 ring-1 ring-inset ring-gray-300 hover:bg-blue-100">
                            {{ $page }}
                        </a>
                    @endforeach

                    <!-- Next Page Link -->
                    <a href="{{ $products->nextPageUrl() . (request()->has('filter') ? '&filter=' . request('filter') : '') . (request()->has('sort') ? '&sort=' . request('sort') : '') }}"
                        class="relative inline-flex items-center rounded-r-md px-2 py-2 text-gray-400 ring-1 ring-inset ring-gray-300 hover:bg-blue-100">
                        <span class="sr-only">Next</span>
                        <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M8.22 5.22a.75.75 0 0 1 1.06 0l4.25 4.25a.75.75 0 0 1 0 1.06l-4.25 4.25a.75.75 0 0 1-1.06-1.06L11.94 10 8.22 6.28a.75.75 0 0 1 0-1.06Z"
                                clip-rule="evenodd" />
                        </svg>
                    </a>
                </nav>
            </div>
        </div>


    @endsection
