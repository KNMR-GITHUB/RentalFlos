<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>RentalFlos</title>
    @vite('resources/css/app.css')
</head>
<body>
    <div class="grid grid-flow-col grid-cols-[1.1fr,6fr]">
        <div id="nav" class="sticky top-0 h-screen grid grid-flow-row grid-rows-[1fr,13fr] ">
            <div class=" h-16 flex items-center pl-4 border-b border-gray-300">
                <img class="h-9 w-24" src="images/logo.png" alt="">
            </div>
            <div class="h-full p-8">
                <ul>
                    <li class="text-gray-600 font-semibold  mb-5 hover:text-blue-500"> <a href="">Dashboard</a></li>
                    <li class="text-gray-600 font-semibold  mb-5 hover:text-blue-500"> <a href="">Properties</a></li>
                    <li class="text-gray-600 font-semibold  mb-5 hover:text-blue-500"> <a href="">Tenants</a></li>
                    <li class="text-gray-600 font-semibold  mb-5 hover:text-blue-500"> <a href="">Rent</a></li>
                    <li class="text-gray-600 font-semibold  mb-5 hover:text-blue-500"> <a href="">Expenses</a></li>
                    <li class="text-gray-600 font-semibold  mb-5 hover:text-blue-500"> <a href="">Settings</a></li>
                </ul>
            </div>

        </div>
        <div id="body" class="">
            <div id="user_profile" class="bg-white border-l border-b border-gray-300 m-0 p-0 h-16 sticky top-0">
                <div class="flex flex-row-reverse">
                    <div class="grid grid-flow-col h-16  gap-5 pl-5 pt-3 pr-5">
                        <button class="rounded-full bg-pink-500 h-8 pr-2 pl-2 text-white text-sm font-semibold">TU</button>
                        <div>
                            <p class="text-xs">OWNER</p>
                            <p class="text-xs">xyz</p>
                        </div>
                        <div class="text-sm">
                            Notification
                        </div>
                    </div>
                </div>
            </div>
            <div id="content" class="h-screen bg-gray-200 border-l border-gray-300">
                @yield('content')
            </div>
        </div>

    </div>


</body>
</html>
