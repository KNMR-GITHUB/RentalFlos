@extends('layouts.mainLayout')
@section('content')
    <div class="flex flex-col p-10">
        <div class="flex justify-between">
            <div>
                <h1 class="text-3xl text-gray-600 font-semibold">Settings</h1>
            </div>

        </div>
        <div class=" text-gray-400  text-sm gap-6 grid xl:w-1/2 lg:grid-cols-3 md:grid-cols-2 rounded-sm mt-8">
            <div class=" bg-white border border-gray-300 py-8 rounded-sm flex justify-center items-center">
                <div>
                    <img src="images/change_password.png" alt="change password">
                    <p class="flex justify-center mt-4">Change Password</p>
                </div>
            </div>
            <div class=" bg-white border border-gray-300 py-8 rounded-sm flex justify-center items-center">
                <a href="{{route('edit_profile')}}">
                    <div>
                        <img src="images/profile.png" alt="profile">
                        <p class="flex justify-center mt-4">Profile</p>
                    </div>
                </a>
            </div>
            <div class=" bg-white border border-gray-300 py-8 rounded-sm flex justify-center items-center">
                <div class="">
                    <img src="images/payment.png" alt="payments">
                    <p class="flex justify-center mt-4">Payment</p>
                </div>

            </div>
        </div>

    </div>


@endsection
