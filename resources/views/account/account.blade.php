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
                    value="{{ $user->phone }}" placeholder="Enter your phone">
            </div>

            <!-- Address -->
            <div class="flex items-center justify-between my-7">
                <label class="text-[50px] md:text-5xl font-normal font-[Jomhuria] p-0 md:pr-12"
                    for="address">Address</label>
                <input
                    class="md:placeholder:text-[50px] md:placeholder:flex md:placeholder:items-center md:placeholder:leading-[50px] font-[Jomhuria] text-black md:font-normal md:w-[490px] leading-[50px] h-[50px] rounded-[20px] md:h-[50px] border text-center text-[50px] font-normal"
                    style="background-color: #D9D9D9;" type="text" id="address" name="address" readonly
                    value="{{ $user->address }}" placeholder="Enter your address">
            </div>
            <div
                class="w-28 h-12 p-3 bg-stone-800 rounded-lg border border-Border-Brand-Default justify-center items-center gap-2 inline-flex overflow-hidden cursor-pointer">
                <a href="" class="text-neutral-100 text-4xl font-normal font-['Jomhuria'] leading-9">Change</a>
            </div>
        </form>
    </div>
@endsection
