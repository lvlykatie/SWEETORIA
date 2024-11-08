@extends('Admin.layout')
@section('edit-user')
<main class="w-full flex-grow p-6">
    <h1 class="w-full text-3xl text-black pb-6">Edit user</h1>

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
                @foreach($edit_user as $key => $user)
                <form class="p-10 bg-white rounded shadow-xl" role="form" action="{{URL::to('admin/users/update/'.$user->user_id)}}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="">
                        <label class="block text-xl text-gray-600" for="name">User name</label>
                        <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" id="name" value="{{$user->user_name }}" name="user_name" type="text" required="" placeholder="Enter user's name" aria-label="Name">
                    </div>
                    <div class="mt-2">
                        <label class="block text-xl text-gray-600" for="sku">SKU</label>
                        <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" id="email" value="{{$user->user_email }}" name="user_email" type="text" required="" placeholder="Enter user's email" aria-label="Email">
                    </div>
                    <div class="mt-2 relative">
                        <label class="block text-xl text-gray-600" for="price">Price</label>
                        <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" id="name" value="{{$user->user_phone }}" name="user_phone" type="text" required="" placeholder="Enter user's phone" aria-label="Phone">
                    </div>
                    <div class="mt-2">
                        <label class="block text-xl text-gray-600" for="role">Role</label>
                        <select id="role" name="role" class="w-full px-5 py-4 text-gray-700 bg-gray-200 rounded border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500" role="combobox" aria-label="Category" required>
                            @if ($user->role =='Client')
                            <option selected value="Client">Client</option>
                            <option value="Admin">Admin</option>
                            <option value="Manager">Manager</option>
                            <option value="Seller">Seller</option>

                            @elseif ($user->role =='Admin')
                            <option value="Client">Client</option>
                            <option selected value="Admin">Admin</option>
                            <option value="Manager">Manager</option>
                            <option value="Seller">Seller</option>

                            @elseif ($user->role =='Manager')
                            <option value="Client">Client</option>
                            <option value="Admin">Admin</option>
                            <option selected value="Manager">Manager</option>
                            <option value="Seller">Seller</option>

                            @elseif ($user->role =='Seller')
                            <option value="Client">Client</option>
                            <option value="Admin">Admin</option>
                            <option value="Manager">Manager</option>
                            <option selected value="Seller">Seller</option>

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