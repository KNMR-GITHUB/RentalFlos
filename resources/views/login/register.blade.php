<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>RentalFLO</title>

    @vite('resources/css/app.css')
</head>
<body class="flex justify-center w-full h-full bg-gray-400">

        <div id="register_card" class=" w-custom_width">
            <div class="flex flex-col m-4 bg-white rounded-md">
                <div class="flex items-center justify-center">
                    <a href="{{route("home")}}"><img class="h-16 mt-4 mb-6" src="images/logo.png" alt=""></a>
                </div>
                <div>
                    <div class="mt-4 mr-10 ml-10 mb-10 grid grid-flow-row grid-rows-[1fr,5fr]">
                        <div class="">
                            <h1 class="text-2xl font-semibold">Register</h1>
                            <p class="text-gray-600 text-lg">Create New RENTALFLO Account</p>
                        </div>
                        <div>
                            <form action="{{route('create_user')}}" method="post">
                                @csrf
                                <div>
                                    <label for="fname" class="mt-2 block text-gray-700 text-sm font-bold mb-2">First Name</label>
                                    <input type="text" placeholder="Enter your first name" id="fname" name="fname" value="{{old('fname')}}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                    @error('fname')
                                        <span class="text-red-400">{{$message}}</span>
                                    @enderror
                                </div>
                                <div>
                                    <label for="lname" class="mt-4 block text-gray-700 text-sm font-bold mb-2">Last Name</label>
                                    <input type="text" placeholder="Enter your last name" id="lname" name="lname" value="{{old('lname')}}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                    @error('lname')
                                        <span class="text-red-400">{{$message}}</span>
                                    @enderror
                                </div>
                                <div>
                                    <label for="email" class="mt-4 block text-gray-700 text-sm font-bold mb-2">Email</label>
                                    <input type="email" placeholder="Enter your email address" id="email" name="email" value="{{old('email')}}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                    @error('email')
                                        <span class="text-red-400">{{$message}}</span>
                                    @enderror
                                </div>
                                <div>
                                    <label for="password" class="mt-4 block text-gray-700 text-sm font-bold mb-2">Password</label>
                                    <input type="password" placeholder="Enter your passcode" id="password" name="password" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                    @error('password')
                                        <span class="text-red-400">{{$message}}</span>
                                    @enderror
                                </div>

                                <div class="flex gap-2 mt-2">
                                    <input type="checkbox" name="checkbox">
                                    <p>I agree to RENTALFLO Privacy Policy & Terms.*</p>
                                </div>
                                <div>
                                    <button  class="mt-6 rounded-md bg-purple-800 p-4 w-full text-white">
                                        Register
                                    </button>
                                </div>
                            </form>
                            <div class="flex flex-col items-center justify-center ">
                                <h3 class="mt-2">Already have an account? <span class="font-semibold"><a href="{{route("login")}}">Sign In instead</a></span> </h3>
                            </div>
                        </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>


</body>
</html>
