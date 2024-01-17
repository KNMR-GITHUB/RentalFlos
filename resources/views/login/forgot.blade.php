<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>RentalFLO</title>

    @vite('resources/css/app.css')
</head>
<body class="grid w-full">
    <div id="main-container" class="grid grid-flow-col grid-cols-[1.5fr,1.12fr,1.5fr] h-screen w-full bg-gray-300">
        <div id="left_part" class="">

        </div>
        <div id="forgot_card" class="mt-20">
            <div class="grid grid-flow-row grid-rows-[1fr,5fr] m-4 bg-white rounded-md h-3/5">
                <div class="flex items-center justify-center">
                    <img class="h-16 mt-4 mb-6" src="images/logo.png" alt="">
                </div>
                <div>
                    <div class="mt-8 mr-10 ml-10 grid grid-flow-row grid-rows-[1fr,2fr,1fr]">
                        <div class="">
                            <h1 class="text-2xl font-semibold">Reset password</h1>
                            <p class="text-gray-600 text-lg">If you forgot your password, well, then we’ll email you instructions to reset your password.</p>
                        </div>
                        <div class="">
                            <form action="">
                                <div>
                                    <label for="email" class="mt-2 block text-gray-700 text-sm font-bold mb-2">Email</label>
                                    <input type="email" placeholder="Enter your email address" id="email" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                </div>

                                <div>
                                    <button type="button" class="mt-6 rounded-md bg-purple-800 p-4 w-full text-white">
                                        Send Reset Link
                                    </button>
                                </div>
                            </form>

                        </div>
                        <div class="flex flex-col items-center justify-center ">
                            <h3 class="text-lg"><a href="{{route('login')}}">Return to login</a></h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="right_part" class="">

        </div>
    </div>

</body>
</html>
