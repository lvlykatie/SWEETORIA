@extends('manager.manager-layout')
@section('edit-order')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<main class="w-full flex-grow p-6">
    <h1 class="w-full text-3xl text-black pb-6">Edit order</h1>

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
                @foreach($edit_order as $key => $order)
                <form class="p-10 bg-white rounded shadow-xl" role="form" action="{{URL::to('manager/orders/update/'.$order->iv_id)}}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="">
                        <label class="block text-xl text-gray-600" for="name">Receiver</label>
                        <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" id="name" value="{{$order->iv_receiver}}" name="iv_receiver" type="text" required="" placeholder="Enter receiver's name" aria-label="Name">
                    </div>
                    <div class="">
                        <label class="block text-xl text-gray-600" for="name">Phone</label>
                        <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" id="name" value="{{$order->iv_phone}}" name="iv_phone" type="text" required="" placeholder="Enter receiver's phone number" aria-label="Name">
                    </div>
                    <div class="">
                        <label class="block text-xl text-gray-600" for="name">Address</label>
                        <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" id="name" value="{{$order->iv_address}}" name="iv_address" type="text" required="" placeholder="Enter receiver's address" aria-label="Name">
                    </div>
                    <div class="">
                        <label class="block text-xl text-gray-600" for="name">Status</label>
                        <select id="status" name="status" class="w-full px-5 py-4 text-gray-700 bg-gray-200 rounded border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500" role="combobox" aria-label="Category" required>
                            @if ($order->iv_status=='Pending')
                            <option selected value="Pending">Pending</option>
                            <option value="Paid">Paid</option>
                            <option value="Dispatched">Dispatched</option>
                            <option value="Returned">Returned</option>
                            <option value="Completed">Completed</option>

                            @elseif ($order->iv_status=='Paid')
                            <option value="Pending">Pending</option>
                            <option selected value="Paid">Paid</option>
                            <option value="Dispatched">Dispatched</option>
                            <option value="Returned">Returned</option>
                            <option value="Completed">Completed</option>

                            @elseif ($order->iv_status=='Dispatched')
                            <option value="Pending">Pending</option>
                            <option value="Paid">Paid</option>
                            <option selected value="Dispatched">Dispatched</option>
                            <option value="Returned">Returned</option>
                            <option value="Completed">Completed</option>

                            @elseif ($order->iv_status=='Returned')
                            <option value="Pending">Pending</option>
                            <option value="Paid">Paid</option>
                            <option value="Dispatched">Dispatched</option>
                            <option selected value="Returned">Returned</option>
                            <option value="Completed">Completed</option>

                            @elseif ($order->iv_status=='Completed')
                            <option value="Pending">Pending</option>
                            <option value="Paid">Paid</option>
                            <option value="Dispatched">Dispatched</option>
                            <option value="Returned">Returned</option>
                            <option selected value="Completed">Completed</option>

                            @endif
                        </select>
                    </div>
                    <div class="mt-6 flex justify-center">
                        <button class="px-4 py-1 text-white font-light tracking-wider bg-gray-900 rounded" type="submit">Submit</button>
                    </div>
                </form>
                @endforeach
            </div>
        </div>
    </div>
</main>
@endsection
