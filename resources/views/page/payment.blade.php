@extends('layouts.master')

@section('title', 'Payment method')
@section('content')
    <div class="mt-9">
        <div class="text-center text-6xl font-black rounded-3xl" style="background-color: #FFCCCC">
            PAYMENT METHOD
        </div>
        <div class="">
            <div class="text-[40px] font-black text-center mt-5">
                Client Information
            </div>
            <div class="flex justify-center">
                <form class="flex flex-col ml-6 md:w-[645px] items-center" method="POST" action="">
                    <!-- Name -->
                    <div class="flex items-center justify-between my-7">
                        <label class="text-[50px] md:text-5xl font-normal font-[Jomhuria] p-0 md:pr-12"
                            for="name">Name</label>
                        <input
                            class="md:placeholder:text-[50px] md:placeholder:flex md:placeholder:items-center md:placeholder:leading-[50px] font-[Jomhuria] text-black md:font-normal md:w-[490px] leading-[50px] h-[50px] rounded-[20px] md:h-[50px] border text-center text-[50px] font-normal"
                            style="background-color: #D9D9D9;" type="text" id="name" name="name"
                            placeholder="Enter your name">
                    </div>

                    <!-- Email -->
                    <div class="flex items-center justify-between my-7">
                        <label class="text-[50px] md:text-5xl font-normal font-[Jomhuria] p-0 md:pr-12"
                            for="email">Email</label>
                        <input
                            class="md:placeholder:text-[50px] md:placeholder:flex md:placeholder:items-center md:placeholder:leading-[50px] font-[Jomhuria] text-black md:font-normal md:w-[490px] leading-[50px] h-[50px] rounded-[20px] md:h-[50px] border text-center text-[50px] font-normal"
                            style="background-color: #D9D9D9;" type="email" id="email" name="email"
                            placeholder="Enter your email">
                    </div>

                    <!-- Phone -->
                    <div class="flex items-center justify-between my-7">
                        <label class="text-[50px] md:text-5xl font-normal font-[Jomhuria] p-0 md:pr-12"
                            for="phone">Phone</label>
                        <input
                            class="md:placeholder:text-[50px] md:placeholder:flex md:placeholder:items-center md:placeholder:leading-[50px] font-[Jomhuria] text-black md:font-normal md:w-[490px] leading-[50px] h-[50px] rounded-[20px] md:h-[50px] border text-center text-[50px] font-normal"
                            style="background-color: #D9D9D9;" type="tel" id="phone" name="phone"
                            placeholder="Enter your phone">
                    </div>

                    <!-- Address -->
                    <div class="flex items-center justify-between my-7">
                        <label class="text-[50px] md:text-5xl font-normal font-[Jomhuria] p-0 md:pr-12"
                            for="address">Address</label>
                        <input
                            class="md:placeholder:text-[50px] md:placeholder:flex md:placeholder:items-center md:placeholder:leading-[50px] font-[Jomhuria] text-black md:font-normal md:w-[490px] leading-[50px] h-[50px] rounded-[20px] md:h-[50px] border text-center text-[50px] font-normal"
                            style="background-color: #D9D9D9;" type="text" id="address" name="address"
                            placeholder="Enter your address">
                    </div>
                </form>
            </div>
        </div>
        {{-- thanh ngang --}}
        <div class="flex justify-center mt-5">
            <div class="w-[80%] h-0.5 bg-black"></div>
        </div>
        {{-- Payment method --}}
        <div class="">
            <div class="text-[40px] font-black text-center mt-5">
                Invoice Detail
            </div>
            <div class="text-[32px] font-black text-center mt-5">
                Date: <span>23/11/2024</span>
            </div>
            <div class="max-w-[564px] mx-auto bg-white rounded-md shadow-md p-4 text-2xl">
                <!-- Item 1 -->
                <div class="flex items-center justify-between py-2 border-b">
                    <div>
                        <p class="font-bold">Whipping cream Anchor (1L)</p>
                        <p class="text-gray-500">x 1</p>
                    </div>
                    <p class="font-bold">148,000</p>
                </div>
                <!-- Item 2 -->
                <div class="flex items-center justify-between py-2 border-b">
                    <div>
                        <p class="font-bold">Butter Anchor (300g)</p>
                        <p class="text-gray-500">x 1</p>
                    </div>
                    <p class="font-bold">100,000</p>
                </div>
                <!-- Item 3 -->
                <div class="flex items-center justify-between py-2">
                    <div>
                        <p class="font-bold">Chocolate chip (100g)</p>
                        <p class="text-gray-500">x 2</p>
                    </div>
                    <p class="font-bold">45,000</p>
                </div>
            </div>

        </div>
        {{-- thanh ngang --}}
        <div class="flex justify-center mt-5">
            <div class="w-[80%] h-0.5 bg-black"></div>
        </div>
        {{-- Total --}}
        <div class="text-[28px] font-black text-center mt-5">
            Total: <span>338,000</span>
        </div>
        <div class="bg-[#FFCCCC] text-[32px] font-black rounded-[20px] max-w-[528px] text-center">
            Choose your payment method
        </div>
        <div class="flex justify-between mx-40 mt-20">
            <div
                class="w-[438px] h-[100px] text-[40px] font-black bg-black text-white rounded-[20px] flex items-center justify-center">
                Cash on delivery
            </div>
            <div
                class="w-[438px] h-[100px] text-[40px] font-black bg-black text-white rounded-[20px] flex items-center justify-center">
                Momo
            </div>
        </div>
    </div>
@endsection
