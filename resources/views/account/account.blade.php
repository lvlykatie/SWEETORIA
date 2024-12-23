@extends('layouts.master')

@section('title', 'Trang chủ')

@section('content')
    <div class="flex md:flex-row flex-col px-7 md:mt-32 mt-16 items-center justify-around mb-28">
        <div class="md:w-auto w-0">
            <img src="{{ asset('public/frontend/client/page/image/ava.png') }}" alt="">
        </div>
        <form class="flex flex-col ml-6" method="POST" action="">
            <!-- Name -->
            <div class="flex items-center justify-between my-7">
                <label class="text-[50px] md:text-5xl font-normal font-[Jomhuria] p-0 md:pr-12" for="name">Name</label>
                <input
                    class="md:placeholder:text-[50px] md:placeholder:flex md:placeholder:items-center md:placeholder:leading-[50px] font-[Jomhuria] text-black md:font-normal md:w-[490px] leading-[50px] h-[50px] rounded-[20px] md:h-[50px] border text-center text-[50px] font-normal"
                    style="background-color: #D9D9D9;" type="text" id="name" name="name" readonly
                    value="{{ $user->user_name }}" placeholder="Enter your name">
            </div>

            <!-- Email -->
            <div class="flex items-center justify-between my-7">
                <label class="text-[50px] md:text-5xl font-normal font-[Jomhuria] p-0 md:pr-12" for="email">Email</label>
                <input
                    class="md:placeholder:text-[50px] md:placeholder:flex md:placeholder:items-center md:placeholder:leading-[50px] font-[Jomhuria] text-black md:font-normal md:w-[490px] leading-[50px] h-[50px] rounded-[20px] md:h-[50px] border text-center text-[50px] font-normal"
                    style="background-color: #D9D9D9;" type="email" id="email" name="email" readonly
                    value="{{ $user->user_email }}" placeholder="Enter your email">
            </div>

            <!-- Phone -->
            <div class="flex items-center justify-between my-7">
                <label class="text-[50px] md:text-5xl font-normal font-[Jomhuria] p-0 md:pr-12" for="phone">Phone</label>
                <input
                    class="md:placeholder:text-[50px] md:placeholder:flex md:placeholder:items-center md:placeholder:leading-[50px] font-[Jomhuria] text-black md:font-normal md:w-[490px] leading-[50px] h-[50px] rounded-[20px] md:h-[50px] border text-center text-[50px] font-normal"
                    style="background-color: #D9D9D9;" type="tel" id="phone" name="phone" readonly
                    value="{{ $user->user_phone }}" placeholder="Enter your phone">
            </div>

            <!-- Address -->
            <div class="flex items-center justify-between my-7">
                <label class="text-[50px] md:text-5xl font-normal font-[Jomhuria] p-0 md:pr-12"
                    for="address">Address</label>
                <input
                    class="md:placeholder:text-[50px] md:placeholder:flex md:placeholder:items-center md:placeholder:leading-[50px] font-[Jomhuria] text-black md:font-normal md:w-[490px] leading-[50px] h-[50px] rounded-[20px] md:h-[50px] border text-center text-[50px] font-normal"
                    style="background-color: #D9D9D9;" type="text" id="address" name="address" readonly
                    value="{{ $user->user_address }}" placeholder="Enter your address">
            </div>
            <div
                class="w-28 h-12 p-3 bg-stone-800 rounded-lg border border-Border-Brand-Default justify-center items-center gap-2 inline-flex overflow-hidden cursor-pointer">
                <a href="{{ route('account.edit') }}"
                    class="text-neutral-100 text-4xl font-normal font-['Jomhuria'] leading-9">Change</a>
            </div>
        </form>
        @if (session('success'))
            <div id="toast-success"
                class="fixed flex items-center w-full max-w-md p-6 mb-4 top-5 right-5  text-gray-700 bg-gray-50 rounded-lg shadow dark:text-gray-400 "
                role="alert">
                <div
                    class="inline-flex items-center justify-center flex-shrink-0 w-12 h-12 text-green-600 bg-green-100 rounded-full dark:bg-green-800 dark:text-green-300">
                    <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                        viewBox="0 0 20 20">
                        <path
                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z" />
                    </svg>
                    <span class="sr-only">Check icon</span>
                </div>
                <div class="ms-4 text-2xl font-semibold text-black">{{ session('success') }}</div>
                <button type="button"
                    class="ms-auto -mx-2 -my-2 bg-gray-50 text-gray-500 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-2 hover:bg-gray-100 inline-flex items-center justify-center h-10 w-10 dark:text-gray-500 dark:hover:text-white dark:hover:bg-gray-700"
                    data-dismiss-target="#toast-success" aria-label="Close">
                    <span class="sr-only">Close</span>
                    <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                </button>
            </div>
            <script>
                // Tự động ẩn thông báo sau 3 giây
                document.addEventListener('DOMContentLoaded', function() {
                    const toast = document.getElementById('toast-success');
                    if (toast) {
                        setTimeout(() => {
                            toast.style.opacity = '0';
                            setTimeout(() => {
                                toast.remove();
                            }, 500); // Thời gian để hiệu ứng mờ hoàn thành
                        }, 3000); // 3 giây
                    }
                });
            </script>
        @endif

    </div>
@endsection
