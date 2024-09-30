@extends('layouts.master')

@section('title', 'Trang chủ')

@section('content')
    <div class="flex px-7 mt-32 mb-14 items-center justify-around ">
        {{-- navbar --}}
        <div class="">
            <div class="bg-yellow-100 text-center border-b hover:bg-gray-200 cursor-pointer">
                <a href="{{ route('account') }}" class="text-4xl font-bold p-8 block">Account</a>
            </div>
            <div class="bg-yellow-100 text-center border-b hover:bg-gray-200 cursor-pointer">
                <a href="{{ route('orders') }}" class="text-4xl font-bold p-8 block">My orders</a>
            </div>
            <div class="bg-yellow-100 text-center border-b hover:bg-gray-200 cursor-pointer">
                <a href="{{ route('changepw') }}" class="text-4xl font-bold p-8 block">Change password</a>
            </div>
        </div>


        <div class="">
            <img src="{{ asset('frontend/client/page/image/ava.png') }}" alt="">
        </div>
        <form class="flex flex-col ml-6" method="POST" action="">
            <div class="flex items-center justify-between my-7">
                <label class=" text-5xl pr-12" for="name">Name</label>
                <input class="acc-input h-12 font-normal flex items-center "
                    style="background-color: #D9D9D9; width: 490px;color: #D5A759;" type="text" id="name"
                    name="name" placeholder="Enter your name">
            </div>
            <div class="flex items-center justify-between my-7">
                <label class=" text-5xl pr-12" for="email">Email</label>
                <input class="acc-input h-12 p-1 font-normal flex items-center text-center"
                    style="background-color: #D9D9D9; width: 490px;color: #D5A759" type="email" id="email"
                    name="email" placeholder="Enter your email">
            </div>
            <div class="flex items-center justify-between my-7">
                <label class=" text-5xl pr-12" for="phone">Phone</label>
                <input class="acc-input h-12 font-normal flex items-center"
                    style="background-color: #D9D9D9; width: 490px;color: #D5A759" type="tel" id="phone"
                    name="phone" placeholder="Enter your phone number">
            </div>
        </form>
    </div>
@endsection
