@extends('layouts.master')

@section('title', 'Change password')

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
                <label class="text-4xl pr-12" for="current-password">Current Password</label>
                <input class="acc-input h-12 font-normal flex items-center"
                    style="background-color: #D9D9D9; width: 490px;color: #D5A759;" type="password" id="current-password"
                    name="current-password" placeholder="Enter current password">
            </div>
            <div class="flex items-center justify-between my-7">
                <label class="text-4xl pr-12" for="new-password">New Password</label>
                <input class="acc-input h-12 font-normal flex items-center"
                    style="background-color: #D9D9D9; width: 490px;color: #D5A759;" type="password" id="new-password"
                    name="new-password" placeholder="Enter new password">
            </div>
            <div class="flex items-center justify-between my-7">
                <label class="text-4xl pr-12" for="confirm-password">Confirm Password</label>
                <input class="acc-input h-12 font-normal flex items-center"
                    style="background-color: #D9D9D9; width: 490px;color: #D5A759;" type="password" id="confirm-password"
                    name="confirm-password" placeholder="Confirm new password">
            </div>
            <div class="flex items-center justify-center my-7">
                <button class="text-white font-jomhuria p-6 w-28"
                    style="background-color: #3e2b25; border-radius: 20px; font-size: 35px; line-height: 35px;
                ">Save</button>
            </div>
        </form>

    </div>
@endsection
