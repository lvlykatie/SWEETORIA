@extends('layouts.master')

@section('title', 'Trang chủ')

@section('content')
    <div class="flex md:flex-row flex-col px-7 md:mt-32 mt-16 mb-14 items-center justify-around ">
        {{-- navbar --}}
        <div class="flex-row flex md:flex-col">
            <div class="bg-yellow-100 text-center border-b hover:bg-gray-200 cursor-pointer">
                <a href="{{ route('account') }}" class=" text-2xl md:text-4xl font-bold p-8 block">Account</a>
            </div>
            <div class="bg-yellow-100 text-center border-b hover:bg-gray-200 cursor-pointer">
                <a href="{{ route('orders') }}" class=" text-2xl md:text-4xl font-bold p-8 block">My orders</a>
            </div>
            <div class="bg-yellow-100 text-center border-b hover:bg-gray-200 cursor-pointer">
                <a href="{{ route('changepw') }}" class=" text-2xl md:text-4xl font-bold p-8 block">Change password</a>
            </div>
        </div>


        <div class="md:w-auto w-0">
            <img src="{{ asset('public/frontend/client/page/image/ava.png') }}" alt="">
        </div>
        <form class="flex flex-col ml-6" method="POST" action="">
            <div class="flex items-center justify-between my-7">
                <label class="text-2xl md:text-5xl p-0 md:pr-12" for="name">Name</label>
                <input
                    class="acc-input md-acc-input md:placeholder:text-7xl font-jomhuria h-12 md:font-normal flex items-center md:w-[490px] w-5/6"
                    style="background-color: #D9D9D9;color: #D5A759;" type="text" id="name" name="name"
                    placeholder="Enter your name">

            </div>
            <div class="flex items-center justify-between my-7">
                <label class=" text-2xl md:text-5xl p-0 md:pr-12" for="email">Email</label>
                <input
                    class="acc-input md-acc-input md:placeholder:text-7xl font-jomhuria h-12 p-1 md:font-normal flex items-center md:w-[490px] w-5/6"
                    style="background-color: #D9D9D9;color: #D5A759" type="email" id="email" name="email"
                    placeholder="Enter your email">
            </div>
            <div class="flex items-center justify-between my-7">
                <label class=" text-2xl md:text-5xl p-0 md:pr-12" for="phone">Phone</label>
                <input
                    class="acc-input md-acc-input md:placeholder:text-7xl font-jomhuria h-12 md:font-normal flex items-center md:w-[490px] w-5/6"
                    style="background-color: #D9D9D9; color: #D5A759" type="tel" id="phone" name="phone"
                    placeholder="Enter your phone number">
            </div>
            <div class="flex items-center justify-center my-7">
                <button class="text-white font-jomhuria p-6 w-28"
                    style="background-color: #3e2b25; border-radius: 20px; font-size: 35px; line-height: 35px;
                ">Save</button>
            </div>

        </form>
    </div>
@endsection
