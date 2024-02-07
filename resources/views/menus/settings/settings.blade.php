@extends('layouts.mainLayout')
@section('content')
    <div class="flex flex-col p-10">
        <div class="flex justify-between">
            <div>
                <h1 class="text-3xl text-gray-600 font-semibold">Settings</h1>
            </div>

        </div>
        <div class=" text-gray-400  text-sm gap-6 grid xl:w-1/2 lg:grid-cols-3 md:grid-cols-2 rounded-sm mt-8">
            <div onclick="togglePopup()" class=" bg-white border border-gray-300 py-8 rounded-sm flex justify-center items-center hover:cursor-pointer">
                <div  class="hover">
                    <img src="images/change_password.png" alt="change password">
                    <p class="flex justify-center mt-4">Change Password</p>
                </div>
            </div>
            <a href="{{route('edit_profile')}}">
                <div class=" bg-white border border-gray-300 py-8 rounded-sm flex justify-center items-center">
                        <div>
                            <img src="images/profile.png" alt="profile">
                            <p class="flex justify-center mt-4">Profile</p>
                        </div>
                </div>
            </a>
            <div class=" bg-white border border-gray-300 py-8 rounded-sm flex justify-center items-center">
                <div class="">
                    <img src="images/payment.png" alt="payments">
                    <p class="flex justify-center mt-4">Payment</p>
                </div>

            </div>
        </div>

    </div>

    {{-- popup for changing password--}}
    <div id="popup-container" class=" shadow-md shadow-black fixed inset-0 bg-zinc-600 bg-opacity-45 flex items-center justify-center hidden">
        <div class="bg-white pt-6 px-6 pb-4 rounded-lg">
            <h2 class="text-lg flex justify-center text-slate-600 font-bold" > Change Password</h2>
            <div class="mt-4 pt-4 border-t border-gray-300">
                <form action="{{route('changeUserPassword',Auth::user()->id)}}" method="post" >
                    @csrf
                    @method('put')

                    <label for="old_password" class="text-slate-600 font-semibold">Old Password</label>
                    <input class="py-2 px-4 block mt-2 mb-4 shadow-sm border border-gray-300 rounded-sm w-full text-sm" type="password" name="old_password" placeholder="Enter old password">
                    @error('old_password')
                        <span class="text-sm text-red-500">{{$message}}</span>
                    @enderror

                    <label for="new_password" class="text-slate-600 font-semibold">New Password</label>
                    <input class="py-2 px-4 block mt-2 mb-4 shadow-sm border border-gray-300 rounded-sm w-full text-sm" type="password" name="new_password" placeholder="Enter new password">
                    @error('new_password')
                        <span class="text-sm text-red-500">{{$message}}</span>
                    @enderror

                    <label for="password_confirmation" class="text-slate-600 font-semibold">Confirm Password</label>
                    <input class="py-2 px-4 block mt-2 mb-4 shadow-sm border border-gray-300 rounded-sm w-full text-sm" type="password" name="password_confirmation" placeholder="Enter confirm password">
                    @error('password_confirmation')
                        <span class="text-sm text-red-500">{{$message}}</span>
                    @enderror

                    <div class="flex flex-row gap-6 border-t border-gray-300 pt-4 mt-8" onclick="togglePopup()">
                        <button class="bg-red-300 rounded-md text-white px-6 py-2 hover:bg-red-700 hover:text-black" type="reset">Cancel</button>
                        <button class="bg-green-300 rounded-md text-white px-6 py-2 hover:bg-green-700 hover:text-black" type="submit">Submit</button>
                    </div>

                </form>
            </div>

        </div>
    </div>

    <script>
        function togglePopup(hello) {
            var popup = document.getElementById("popup-container");
            if (popup.classList.contains("hidden")) {
                popup.classList.remove("hidden");
            } else {
                popup.classList.add("hidden");
            }
        }
    </script>

@endsection
