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
    <div id="popup-container" class="shadow-md shadow-black fixed inset-0 bg-zinc-600 bg-opacity-45 flex items-center justify-center hidden" onclick="togglePopup(e)">
        <div id="form" class="bg-white pt-6 px-6 pb-4 rounded-lg w-card_width">
            <h2 class="text-lg flex justify-center text-slate-600 font-bold" > Change Password</h2>
            <div class="mt-4 pt-4 border-t border-gray-300">
                <form action="{{route('changeUserPassword',Auth::user()->id)}}" method="post" >
                    @csrf
                    @method('put')
                    <div>
                        <label for="old_password" class="text-slate-600 font-semibold">Old Password</label>
                        <input id="old_password" class="py-2 px-4 block mt-2 mb-4 shadow-sm border border-gray-300 rounded-sm w-full text-sm" type="password" name="old_password" placeholder="Enter old password" required>
                        <span id="old_error"></span>
                        @error('old_password')
                            <span id="old_error" class="text-sm text-red-500">{{$message}}</span>
                        @enderror
                    </div>

                    <div>
                        <label for="password" class="text-slate-600 font-semibold">New Password</label>
                        <input id="password" class="py-2 px-4 block mt-2 mb-4 shadow-sm border border-gray-300 rounded-sm w-full text-sm" type="password" name="password" placeholder="Enter new password" required>
                        @error('password')
                            <span class="text-sm text-red-500">{{$message}}</span>
                        @enderror
                    </div>

                    <div>
                        <label for="password_confirmation" class="text-slate-600 font-semibold">Confirm Password</label>
                        <input id="password_confirmation" class="py-2 px-4 block mt-2 mb-4 shadow-sm border border-gray-300 rounded-sm w-full text-sm" type="password" name="password_confirmation" placeholder="Enter confirm password" required>
                        <span id="confirm_pass"></span>
                        @error('password_confirmation')
                            <span class="text-sm text-red-500">{{$message}}</span>
                        @enderror
                    </div>


                    <div class="flex flex-row gap-6 border-t border-gray-300 pt-4 mt-8 justify-between" >
                        <button class="bg-red-300 rounded-md text-white px-6 py-2 hover:bg-red-700 hover:text-black" id="reset" type="reset" onclick="togglePopup(); resetForm()">Cancel</button>
                        <button class="bg-green-300 rounded-md text-white px-6 py-2 hover:bg-green-700 hover:text-black" type="submit">Submit</button>
                    </div>

                </form>
            </div>

        </div>
    </div>

    <script>

        // displays form
        function togglePopup() {
            var popup = document.getElementById("popup-container");
            if (popup.classList.contains("hidden")) {
                popup.classList.remove("hidden");
            } else {
                popup.classList.add("hidden");
            }
        }

        var popupContainer = document.getElementById("popup-container");
        popupContainer.addEventListener("click", function(event) {
            // Check if the clicked element is the div itself
            if (event.target === popupContainer) {
                document.getElementById('reset').click();
            }
        });

        // reset form
        function resetForm(){
            document.getElementById("confirm_pass").innerHTML = ''
            document.getElementById("old_error").innerHTML = ''
        }



        // confirm passwords
        document.getElementById("old_password").addEventListener("input",confirmPasswords);
        document.getElementById("password").addEventListener("input", confirmPasswords);
        document.getElementById("password_confirmation").addEventListener("input", confirmPasswords);

        function confirmPasswords() {
            var old_password = document.getElementById('old_password').value;
            var password = document.getElementById("password").value;
            var confirmPassword = document.getElementById("password_confirmation").value;

            if (password === confirmPassword) {
                document.getElementById("confirm_pass").innerHTML = '<span></span>'
            }else{
                document.getElementById("confirm_pass").innerHTML = '<span class="text-sm text-red-300">New Password and Confirm Password field do not match.</span>'
            }

            if (old_password.length < 8){
                document.getElementById("old_error").innerHTML = '<span class="text-sm text-red-300">Old Password should be min 8 characters.</span>'
            }else{
                document.getElementById("old_error").innerHTML = ''
            }
        }
    </script>

@endsection
