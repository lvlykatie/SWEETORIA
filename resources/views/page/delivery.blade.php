@extends('layouts.master')

@section('title', 'Delivery')

@section('content')
    <div class="mt-16 mx-10">
        <div class="flex justify-center flex-wrap">
            <div class="flex items-center">
                <i class="fa-solid fa-backward text-5xl mr-7"></i>
                <p class="text-5xl">Pickup Status</p>
            </div>
            <div class="text-4xl w-full text-center mt-16">Estimated delivery</div>
            <div class="text-4xl text-center mb-32">18 Dec 2024, 11:00 AM</div>
            <div class="w-full bg-[#D9D9D980] flex h-[134px] rounded-[40px]">
                <div class="w-1/2 justify-center text-[40px] flex items-center">
                    Track order
                </div>
                <div class="w-1/2 justify-center text-[40px] flex items-center">18122022</div>
            </div>
            <div class="w-1/3 mt-10 space-y-28">
                {{-- order confirm --}}
                <div class="flex items-center space-x-7 ">
                    <div class="check">
                        <i class="fa-solid fa-circle-check text-[122px] text-green-500"></i>
                    </div>
                    <div class="flex-col space-y-14">
                        <div class="text-5xl">Order confirm</div>
                        <div class="time text-5xl">
                            <i class="fa-regular fa-clock"></i>
                            <span> 18 Dec 2024, 09:00 AM</span>
                        </div>
                    </div>
                </div>
                <div
                    style="width: 252.38px; height: 0px; transform: rotate(90deg); transform-origin: 0 0; border: 1px black dotted">
                </div>
                <div class="flex items-center space-x-7 ">
                    <div class="check">
                        <svg xmlns="http://www.w3.org/2000/svg" width="123" height="122" viewBox="0 0 123 119"
                            fill="none">
                            <mask id="mask0_786_2342" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="0"
                                width="123" height="119">
                                <rect x="0.249023" width="122.066" height="118.97" fill="#D9D9D9" />
                            </mask>
                            <g mask="url(#mask0_786_2342)">
                                <path
                                    d="M62.0382 114.608C55.439 114.608 49.2587 113.399 43.4973 110.981C37.7323 108.559 32.694 105.289 28.3826 101.169C24.0712 97.0528 20.6836 92.2131 18.2199 86.65C15.7563 81.0903 14.5244 75.1264 14.5244 68.7584C14.5244 62.3904 15.7563 56.4248 18.2199 50.8617C20.6836 45.302 24.0712 40.4623 28.3826 36.3427C32.694 32.2264 37.7323 28.9575 43.4973 26.5359C49.2587 24.1178 55.439 22.9087 62.0382 22.9087C68.6373 22.9087 74.9514 24.1823 80.9803 26.7295C87.0058 29.2767 92.2622 32.8428 96.7496 37.4278L62.0382 70.9235V28.0031C50.2477 28.0031 40.261 31.9513 32.0781 39.8476C23.8952 47.744 19.8037 57.3809 19.8037 68.7584C19.8037 80.1359 23.8952 89.7729 32.0781 97.6692C40.261 105.566 50.2477 109.514 62.0382 109.514C68.8133 109.514 75.1696 107.985 81.107 104.929C87.048 101.872 92.1302 97.6692 96.3537 92.3201V100.089C91.7783 104.674 86.543 108.24 80.6478 110.787C74.7525 113.335 68.5493 114.608 62.0382 114.608ZM106.912 99.3249V61.1168H112.192V99.3249H106.912ZM109.552 112.825C108.584 112.825 107.792 112.528 107.176 111.934C106.56 111.339 106.252 110.618 106.252 109.768C106.252 108.834 106.56 108.07 107.176 107.476C107.792 106.882 108.584 106.584 109.552 106.584C110.432 106.584 111.18 106.882 111.796 107.476C112.412 108.07 112.72 108.834 112.72 109.768C112.72 110.618 112.412 111.339 111.796 111.934C111.18 112.528 110.432 112.825 109.552 112.825Z"
                                    fill="#FCE361" />
                            </g>
                        </svg>
                    </div>
                    <div class="flex-col space-y-14">
                        <div class="text-5xl">Order confirm</div>
                        <div class="time text-5xl">
                            <i class="fa-regular fa-clock"></i>
                            <span> 18 Dec 2024, 09:00 AM</span>
                        </div>
                    </div>
                </div>
                <div class="flex items-center space-x-7">
                    <div class="check">
                        <i class="fa-regular fa-thumbs-up text-[122px]"></i>
                    </div>
                    <div class="flex-col space-y-14">
                        <div class="text-5xl">Order ready to collect</div>
                        <div class="time text-5xl">
                            <i class="fa-regular fa-clock"></i>
                            <span>Soon</span>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="w-full shadow border-2 border-black mb-14"></div>
        {{--  --}}
        <div class="flex">
            <div class="w-1/3 flex-col flex">
                <div class="text-[40px] font-bold">Delivery address</div>
                <div class="name text-[30px] font-light">Ngọc Thủy</div>
                <div class="phone text-[30px] font-light">(+84) 353426895</div>
                <div class="adress text-[30px] font-light">123 Hàn Huyên, Linh Trung
                    Thủ Đức, TP.HCM.</div>
            </div>
            <div class="w-2/3 border border-black">
                <div class="title w-full mt-10">Product Infomation</div>
                <div class="flex justify-center items-center mt-12">
                    <div class="flex flex-col justify-center w-[724px] bg-pink m-10">
                        <div class="product-name text-[30px] font-normal">
                            Whipping cream Anchor 1000g from New Zeeland
                        </div>
                        <div class="product-quantity flex justify-between mx-10">
                            <span class="text-xl font-normal">X1</span>
                            <span class="text-xl font-medium font-['Inter']">148 000</span>
                        </div>
                        <div class="flex flex-col items-end mx-10">
                            <div class="text-black text-xl font-medium font-['Inter']">Total cost of goods:
                                <span>148,000</span>
                            </div>
                            <div class="text-black text-xl font-medium font-['Inter']">Total
                                shipping cost: <span>22,000</span>
                            </div>
                            <div class="text-black text-xl font-medium font-['Inter']">Total promotional cost:
                                <span>0</span>
                            </div>

                            <div class="opacity-40 text-black text-5xl font-normal font-['Jomhuria']">Total
                                amount: <span class="">170,000</span></div>
                        </div>
                    </div>
                </div>
                <div class="w-full text-right">
                    <a href="#" class="text-[50px] font-normal font-['Jomhuria']">See detail >></a>
                </div>
            </div>
        </div>
    </div>
@endsection
