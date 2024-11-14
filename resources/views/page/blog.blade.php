@extends('layouts.master')

@section('title', 'Blog')

@section('content')
    <div class="mt-16 mx-10">
        <div class="text-center text-6xl font-black rounded-3xl text my-5 py-6 bg-pink mb-24 mx-0">
            Blogs - Our Stories
        </div>
        <div class="text-4xl font-bold mb-7 ">Recent Posts</div>
        <div class="recent-posts w-full flex space-x-7">
            <div class="w-1/2 flex flex-wrap">
                <img src="{{ asset('public/frontend/client/page/image/post_img.jpg') }}" class="w-full" alt="ssss">\
                <p id="time" class="text-2xl font-normal w-full">05/11/2024</p>
                <div class="title text-2xl font-normal">Flour – The Foundation of Textur</div>
                <div class="description text-2xl font-normal">Did you know that flour comes in various types like
                    all-purpose,
                    cake flour, and bread flour? Each type will create a different texture, whether you're aiming for light
                    and airy or chewy and dense.
                    Always keep flour in a cool, dry place away from sunlight to preserve its freshness.
                </div>
            </div>
            <div class="w-1/2 space-y-14">
                {{-- 1 post --}}
                <div class="flex space-x-7">
                    <img src="{{ asset('public/frontend/client/page/image/post_img.jpg') }}" class="w-1/2" alt>
                    <div class="w-1/2 space-y-7">
                        <p id="time" class="text-2xl font-normal w-full">05/11/2024</p>
                        <div class="title text-2xl font-bold">Flour – The Foundation of Textur</div>
                        <div class="description text-2xl font-normal">Did you know that flour comes in various types like
                            all-purpose,
                            cake flour, and bread flour? Each type will create a different texture, whether you're aiming
                            for light
                            and airy or chewy and dense.
                            Always keep flour in a cool, dry place away from sunlight to preserve its freshness.
                        </div>
                    </div>
                </div>
                <div class="flex space-x-7">
                    <img src="{{ asset('public/frontend/client/page/image/post_img.jpg') }}" class="w-1/2" alt>
                    <div class="w-1/2 space-y-7">
                        <p id="time" class="text-2xl font-normal w-full">05/11/2024</p>
                        <div class="title text-2xl font-bold">Flour – The Foundation of Textur</div>
                        <div class="description text-2xl font-normal">Did you know that flour comes in various types like
                            all-purpose,
                            cake flour, and bread flour? Each type will create a different texture, whether you're aiming
                            for light
                            and airy or chewy and dense.
                            Always keep flour in a cool, dry place away from sunlight to preserve its freshness.
                        </div>
                    </div>
                </div>
                <div class="flex space-x-7">
                    <img src="{{ asset('public/frontend/client/page/image/post_img.jpg') }}" class="w-1/2" alt>
                    <div class="w-1/2 space-y-7">
                        <p id="time" class="text-2xl font-normal w-full">05/11/2024</p>
                        <div class="title text-2xl font-bold">Flour – The Foundation of Textur</div>
                        <div class="description text-2xl font-normal">Did you know that flour comes in various types like
                            all-purpose,
                            cake flour, and bread flour? Each type will create a different texture, whether you're aiming
                            for light
                            and airy or chewy and dense.
                            Always keep flour in a cool, dry place away from sunlight to preserve its freshness.
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-4xl font-bold my-7 ">All Posts</div>
        {{-- all post --}}
        <div class="mt-16 w-full flex flex-wrap justify-between">
            {{-- 1 post  --}}
            <div class="post w-[calc(33.33%-20px)] space-y-7 mb-10">
                <img src="{{ asset('public/frontend/client/page/image/post_img.jpg') }}" class="w-full" alt>
                <p id="time" class="text-2xl font-normal w-full">05/11/2024</p>
                <div class="title text-2xl font-bold">Flour – The Foundation of Textur</div>
                <div class="description text-2xl font-normal">
                    Did you know that flour comes in various types like all-purpose, cake flour, and bread flour? Each type
                    will create a different texture, whether you're aiming for light and airy or chewy and dense. Always
                    keep flour in a cool, dry place away from sunlight to preserve its freshness.
                </div>
            </div>
            <div class="post w-[calc(33.33%-20px)] space-y-7 mb-10">
                <img src="{{ asset('public/frontend/client/page/image/post_img.jpg') }}" class="w-full" alt>
                <p id="time" class="text-2xl font-normal w-full">05/11/2024</p>
                <div class="title text-2xl font-bold">Flour – The Foundation of Textur</div>
                <div class="description text-2xl font-normal">
                    Did you know that flour comes in various types like all-purpose, cake flour, and bread flour? Each type
                    will create a different texture, whether you're aiming for light and airy or chewy and dense. Always
                    keep flour in a cool, dry place away from sunlight to preserve its freshness.
                </div>
            </div>
            <div class="post w-[calc(33.33%-20px)] space-y-7 mb-10">
                <img src="{{ asset('public/frontend/client/page/image/post_img.jpg') }}" class="w-full" alt>
                <p id="time" class="text-2xl font-normal w-full">05/11/2024</p>
                <div class="title text-2xl font-bold">Flour – The Foundation of Textur</div>
                <div class="description text-2xl font-normal">
                    Did you know that flour comes in various types like all-purpose, cake flour, and bread flour? Each type
                    will create a different texture, whether you're aiming for light and airy or chewy and dense. Always
                    keep flour in a cool, dry place away from sunlight to preserve its freshness.
                </div>
            </div>
            <div class="post w-[calc(33.33%-20px)] space-y-7 mb-10">
                <img src="{{ asset('public/frontend/client/page/image/post_img.jpg') }}" class="w-full" alt>
                <p id="time" class="text-2xl font-normal w-full">05/11/2024</p>
                <div class="title text-2xl font-bold">Flour – The Foundation of Textur</div>
                <div class="description text-2xl font-normal">
                    Did you know that flour comes in various types like all-purpose, cake flour, and bread flour? Each type
                    will create a different texture, whether you're aiming for light and airy or chewy and dense. Always
                    keep flour in a cool, dry place away from sunlight to preserve its freshness.
                </div>
            </div>
        </div>


    </div>
    {{-- pagination --}}
    <div class="flex items-center justify-center border-t border-gray-200 bg-white px-4 py-3 sm:px-6">
        <div class="flex flex-1 justify-center sm:justify-center">
            <nav class="isolate inline-flex -space-x-px rounded-md shadow-sm" aria-label="Pagination">
                <a href="#"
                    class="relative inline-flex items-center rounded-l-md px-2 py-2 text-gray-400 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0">
                    <span class="sr-only">Previous</span>
                    <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
                        <path fill-rule="evenodd"
                            d="M11.78 5.22a.75.75 0 0 1 0 1.06L8.06 10l3.72 3.72a.75.75 0 1 1-1.06 1.06l-4.25-4.25a.75.75 0 0 1 0-1.06l4.25-4.25a.75.75 0 0 1 1.06 0Z"
                            clip-rule="evenodd" />
                    </svg>
                </a>
                <a href="#" aria-current="page"
                    class="relative z-10 inline-flex items-center bg-yellow-200 px-4 py-2 text-2xl font-semibold text-white focus:z-20 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">1</a>
                <a href="#"
                    class="relative inline-flex items-center px-4 py-2 text-2xl font-semibold text-gray-900 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0">2</a>
                <a href="#"
                    class="relative hidden items-center px-4 py-2 text-2xl font-semibold text-gray-900 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0 md:inline-flex">3</a>
                <span
                    class="relative inline-flex items-center px-4 py-2 text-2xl font-semibold text-gray-700 ring-1 ring-inset ring-gray-300 focus:outline-offset-0">...</span>
                <a href="#"
                    class="relative hidden items-center px-4 py-2 text-2xl font-semibold text-gray-900 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0 md:inline-flex">8</a>
                <a href="#"
                    class="relative inline-flex items-center px-4 py-2 text-2xl font-semibold text-gray-900 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0">9</a>
                <a href="#"
                    class="relative inline-flex items-center px-4 py-2 text-2xl font-semibold text-gray-900 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0">10</a>
                <a href="#"
                    class="relative inline-flex items-center rounded-r-md px-2 py-2 text-gray-400 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0">
                    <span class="sr-only">Next</span>
                    <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
                        <path fill-rule="evenodd"
                            d="M8.22 5.22a.75.75 0 0 1 1.06 0l4.25 4.25a.75.75 0 0 1 0 1.06l-4.25 4.25a.75.75 0 0 1-1.06-1.06L11.94 10 8.22 6.28a.75.75 0 0 1 0-1.06Z"
                            clip-rule="evenodd" />
                    </svg>
                </a>
            </nav>
        </div>
    </div>

@endsection
