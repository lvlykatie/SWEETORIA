@extends('layouts.master')

@section('title', 'Policy')

@section('content')
    <div class="flex md:flex-row flex-col px-7 md:mt-32 mt-16 mb-14 items-center justify-around">
        {{-- navbar
        <div class="flex-row flex md:flex-col self-start">
            <div class="bg-yellow-100 text-center border-b hover:bg-gray-200 cursor-pointer">
                <a href="{{ route('account') }}" class=" text-2xl md:text-4xl font-bold p-8 block">Account</a>
            </div>
            <div class="bg-yellow-100 text-center border-b hover:bg-gray-200 cursor-pointer">
                <a href="{{ route('orders') }}" class=" text-2xl md:text-4xl font-bold p-8 block">My orders</a>
            </div>
            <div class="bg-yellow-100 text-center border-b hover:bg-gray-200 cursor-pointer">
                <a href="{{ route('changepw') }}" class=" text-2xl md:text-4xl font-bold p-8 block">Change password</a>
            </div>
            <div class="bg-yellow-100 text-center border-b hover:bg-gray-200 cursor-pointer">
                <a href="{{ route('policy') }}" class=" text-2xl md:text-4xl font-bold p-8 block">Policy</a>
            </div>
        </div> --}}
        <div class=" flex flex-col w-full md:items-center gap-y-10">
            <div class="order-policy">
                <div class="text-[40px] font-bold">Order Policy</div>
                <div class="md:w-[895px] md:h-[565px] tracking-[1px] leading-[50px] font-bold text-[32px] bg-pink">
                    <div class="mx-10">
                        Customers are encouraged to place orders at least 1-2 days in advance to ensure sufficient
                        ingredients
                        and preparation time.
                        <br>
                        After placing an order, customers will receive a confirmation via phone or email, including details
                        about their order and pickup or delivery time.
                    </div>
                </div>
            </div>
            <div class="order-policy">
                <div class="text-[40px] font-bold">Order Policy</div>
                <div class="md:w-[895px] md:h-[565px] tracking-[1px] leading-[50px] font-bold text-[32px] bg-pink">
                    <div class="mx-10">
                        Customers are encouraged to place orders at least 1-2 days in advance to ensure sufficient
                        ingredients
                        and preparation time.
                        <br>
                        After placing an order, customers will receive a confirmation via phone or email, including details
                        about their order and pickup or delivery time.
                    </div>
                </div>
            </div>
            <div class="order-policy">
                <div class="text-[40px] font-bold">Order Policy</div>
                <div class="md:w-[895px] md:h-[565px] tracking-[1px] leading-[50px] font-bold text-[32px] bg-pink">
                    <div class="mx-10">
                        Customers are encouraged to place orders at least 1-2 days in advance to ensure sufficient
                        ingredients
                        and preparation time.
                        <br>
                        After placing an order, customers will receive a confirmation via phone or email, including details
                        about their order and pickup or delivery time.
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
