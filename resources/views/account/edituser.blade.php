@extends('layouts.master')

@section('title', 'Trang chủ')

@section('content')
    <div class="flex md:flex-row flex-col px-7 md:mt-32 mt-16 items-center justify-around mb-28">
        <div class="md:w-auto w-0">
            <img src="{{ asset('public/frontend/client/page/image/ava.png') }}" alt="">
        </div>
        <form class="flex flex-col ml-6" method="POST" action="{{ route('account.update') }}">
            @csrf
            @method('PUT')

            <!-- Name -->
            <div class="flex flex-col my-7">
                <label class="text-[50px] md:text-5xl font-normal font-[Jomhuria] p-0 md:pr-12" for="name">Name</label>
                <input
                    class="md:placeholder:text-[50px] md:placeholder:flex md:placeholder:items-center md:placeholder:leading-[50px] font-[Jomhuria] text-black md:font-normal md:w-[490px] leading-[50px] h-[50px] rounded-[20px] md:h-[50px] border text-center text-[50px] font-normal"
                    style="background-color: #D9D9D9;" type="text" id="name" name="name"
                    value="{{ old('name', $user->user_name) }}" placeholder="Enter your name">
                @error('name')
                    <span class="text-red-500 text-lg mt-2">{{ $message }}</span>
                @enderror
            </div>

            <!-- Email -->
            <div class="flex flex-col my-7">
                <label class="text-[50px] md:text-5xl font-normal font-[Jomhuria] p-0 md:pr-12" for="email">Email</label>
                <input
                    class="md:placeholder:text-[50px] md:placeholder:flex md:placeholder:items-center md:placeholder:leading-[50px] font-[Jomhuria] text-black md:font-normal md:w-[490px] leading-[50px] h-[50px] rounded-[20px] md:h-[50px] border text-center text-[50px] font-normal"
                    style="background-color: #D9D9D9;" type="email" id="email" name="email"
                    value="{{ old('email', $user->user_email) }}" placeholder="Enter your email">
                @error('email')
                    <span class="text-red-500 text-lg mt-2">{{ $message }}</span>
                @enderror
            </div>

            <!-- Phone -->
            <div class="flex flex-col my-7">
                <label class="text-[50px] md:text-5xl font-normal font-[Jomhuria] p-0 md:pr-12" for="phone">Phone</label>
                <input
                    class="md:placeholder:text-[50px] md:placeholder:flex md:placeholder:items-center md:placeholder:leading-[50px] font-[Jomhuria] text-black md:font-normal md:w-[490px] leading-[50px] h-[50px] rounded-[20px] md:h-[50px] border text-center text-[50px] font-normal"
                    style="background-color: #D9D9D9;" type="tel" id="phone" name="phone"
                    value="{{ old('phone', $user->user_phone) }}" placeholder="Enter your phone">
                @error('phone')
                    <span class="text-red-500 text-lg mt-2">{{ $message }}</span>
                @enderror
            </div>

            <!-- Address -->
            <div class="flex flex-col my-7">
                <label class="text-[50px] md:text-5xl font-normal font-[Jomhuria] p-0 md:pr-12"
                    for="address">Address</label>
                <input
                    class="md:placeholder:text-[50px] md:placeholder:flex md:placeholder:items-center md:placeholder:leading-[50px] font-[Jomhuria] text-black md:font-normal md:w-[490px] leading-[50px] h-[50px] rounded-[20px] md:h-[50px] border text-center text-[50px] font-normal"
                    style="background-color: #D9D9D9;" type="text" id="address" name="address"
                    value="{{ old('address', $user->user_address) }}" placeholder="Enter your address">
                @error('address')
                    <span class="text-red-500 text-lg mt-2">{{ $message }}</span>
                @enderror
            </div>

            <div
                class="w-28 h-12 p-3 bg-stone-800 rounded-lg border border-Border-Brand-Default justify-center items-center gap-2 inline-flex overflow-hidden cursor-pointer">
                <button type="submit"
                    class="text-neutral-100 text-4xl font-normal font-['Jomhuria'] leading-9">Save</button>
            </div>
        </form>

    </div>
@endsection
