@extends('layouts.master')

@section('title', 'Change password')

@section('content')
    <div class="flex md:flex-row flex-col px-7 md:mt-32 mt-16 mb-14 items-center justify-around ">
        {{-- navbar
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
            <div class="bg-yellow-100 text-center border-b hover:bg-gray-200 cursor-pointer">
                <a href="{{ route('policy') }}" class=" text-2xl md:text-4xl font-bold p-8 block">Policy</a>
            </div>
        </div> --}}
        <div class="md:w-auto w-0">
            <img src="{{ asset('public/frontend/client/page/image/ava.png') }}" alt="">
        </div>
        <form class="flex flex-col ml-6" method="POST" action="">
            <div class="flex flex-col flex-wrap items-center justify-center my-7">
                <label class="text-2xl w-auto md:text-5xl p-0 mb-5" for="current">Current password</label>
                <input
                    class="acc-input md-acc-input md:placeholder:text-7xl font-jomhuria h-12 md:font-normal flex items-center md:w-[490px] w-5/6"
                    style="background-color: #D9D9D9;color: #D5A759;" type="password" id="current" name="current">

            </div>
            <div class="flex flex-col flex-wrap items-center justify-center my-7">
                <label class="text-2xl w-auto md:text-5xl p-0 mb-5" for="newpw">New password</label>
                <input
                    class="acc-input md-acc-input md:placeholder:text-7xl font-jomhuria h-12 md:font-normal flex items-center md:w-[490px] w-5/6"
                    style="background-color: #D9D9D9;color: #D5A759;" type="password" id="newpw" name="newpw">

            </div>
            <div class="flex flex-col flex-wrap items-center justify-center my-7">
                <label class="text-2xl w-auto md:text-5xl p-0 mb-5" for="confirm">Confirm</label>
                <input
                    class="acc-input md-acc-input md:placeholder:text-7xl font-jomhuria h-12 md:font-normal flex items-center md:w-[490px] w-5/6"
                    style="background-color: #D9D9D9;color: #D5A759;" type="password" id="confirm" name="confirm">
            </div>
            <div class="flex items-center justify-center my-7">
                <button class="text-white font-jomhuria p-6 w-28"
                    style="background-color: #3e2b25; border-radius: 20px; font-size: 35px; line-height: 35px;
                ">Save</button>
            </div>

        </form>

    </div>
@endsection
