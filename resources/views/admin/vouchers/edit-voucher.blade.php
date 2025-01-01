@extends('admin.layout')
@section('edit-voucher')
<main class="w-full flex-grow p-6">
    <h1 class="w-full text-3xl text-black pb-6">Edit voucher</h1>

    <div class='panel-body'>
        <?php
        $message = Session::get('message');
        if ($message) {
            echo '<span class="text-green-600">' . $message . '</span>';
            Session::put('message', null);
        }
        ?>
    </div>

    <div class="flex flex-wrap">
        <div class="w-full my-6 pr-0 lg:pr-2">
            <p class="text-xl pb-6 flex items-center">
                <svg class="svg-inline--fa fa-list fa-w-16 mr-3" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="list" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                    <path fill="currentColor" d="M80 368H16a16 16 0 0 0-16 16v64a16 16 0 0 0 16 16h64a16 16 0 0 0 16-16v-64a16 16 0 0 0-16-16zm0-320H16A16 16 0 0 0 0 64v64a16 16 0 0 0 16 16h64a16 16 0 0 0 16-16V64a16 16 0 0 0-16-16zm0 160H16a16 16 0 0 0-16 16v64a16 16 0 0 0 16 16h64a16 16 0 0 0 16-16v-64a16 16 0 0 0-16-16zm416 176H176a16 16 0 0 0-16 16v32a16 16 0 0 0 16 16h320a16 16 0 0 0 16-16v-32a16 16 0 0 0-16-16zm0-320H176a16 16 0 0 0-16 16v32a16 16 0 0 0 16 16h320a16 16 0 0 0 16-16V80a16 16 0 0 0-16-16zm0 160H176a16 16 0 0 0-16 16v32a16 16 0 0 0 16 16h320a16 16 0 0 0 16-16v-32a16 16 0 0 0-16-16z"></path>
                </svg><!-- <i class="fas fa-list mr-3"></i> --> Information
            </p>
            <div class="leading-loose">
            @foreach($edit_voucher as $key => $voucher)
                <form class="p-10 bg-white rounded shadow-xl" role="form" action="{{URL::to('admin/vouchers/update/'.$voucher->voucher_id)}}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="">
                        <label class="block text-xl text-gray-600" for="name">Voucher name</label>
                        <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" id="name" value="{{$voucher->voucher_name }}" name="voucher_name" type="text" required="" placeholder="Enter voucher's name" aria-label="Name">
                    </div>
                    <div class="mt-2">
                        <label class="block text-xl text-gray-600" for="sku">Discount value</label>
                        <input class="w-full px-5 py-2 text-gray-700 bg-gray-200 rounded border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500"
                            id="discount_value"
                            name="discount_value"
                            type="number"
                            step="0.01" 
                            value="{{$voucher->discount_value }}"
                            required
                            placeholder="Enter discount value"
                            aria-label="Discount value">
                    </div>
                    <div class="mt-2 relative">
                        <label class="block text-xl text-gray-600" for="name">Max usage</label>
                        <input type="number" class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" id="max_usage" value="{{$voucher->max_usage }}" name="max_usage" required="" placeholder="Enter voucher's max usage" aria-label="Max usage"></input>
                    </div>
                    <div class="mt-2 relative">
                        <label class="block text-xl text-gray-600" for="name">Minimum order value</label>
                        <input type="number" class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" id="minimum_order_value" value="{{$voucher->minimum_order_value }}" name="minimum_order_value" required="" placeholder="Enter voucher's minimum order value" aria-label="Minimum order value"></input>
                    </div>
                    <div class="">
                        <label class="block text-xl text-gray-600" for="name">Start date</label>
                        <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" id="startdate" value="{{$voucher->startdate }}" name="startdate" type="date" required="" placeholder="Choose start date" aria-label="Start date" oninput="validateDateRange()">
                    </div>
                    <div class="">
                        <label class="block text-xl text-gray-600" for="name">End date</label>
                        <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" id="enddate" value="{{$voucher->enddate }}" name="enddate" type="date" required="" placeholder="Choose end date" aria-label="End date" oninput="validateDateRange()">
                    </div>
                    <p id="date-error" class="text-red-500 mt-2 hidden">End date must be later than start date.</p>
                    <div class="mt-6 flex justify-center">
                        <button id="submit-button" class="px-4 py-1 text-white font-light tracking-wider bg-gray-900 rounded" type="submit">Submit</button>
                    </div>
                </form>
                @endforeach
            </div>
        </div>
    </div>
</main>

@endsection