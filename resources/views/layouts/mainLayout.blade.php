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
        <div id="nav" class="bg-green-400 sticky flex flex-col">
            <div class="bg-yellow-300 h-16 pt-2">
                <img class=" h-10 pt-2" src="images/logo.png" alt="">
            </div>
            <div class="bg-pink-600 h-full m-8">
                <ul>
                    <li class="text-gray-600 font-semibold  mb-5"> Dashboard</li>
                    <li class="text-gray-600 font-semibold  mb-5"> Properties</li>
                    <li class="text-gray-600 font-semibold  mb-5"> Tenants</li>
                    <li class="text-gray-600 font-semibold  mb-5"> Rent</li>
                    <li class="text-gray-600 font-semibold  mb-5"> Expenses</li>
                    <li class="text-gray-600 font-semibold  mb-5"> Settings</li>
                </ul>
            </div>

        </div>
        <div id="body" class="">
            <div id="user_profile" class=" bg-blue-500 h-16">
                <div class="flex flex-row-reverse">
                    <div class="grid grid-flow-col gap-3 pt-2">
                        <button class="rounded-full bg-pink-500 pt-1 pb-1 pr-3.5 pl-3.5 text-white font-semibold">TU</button>
                        <div>
                            <p class="text-sm">OWNER</p>
                            <p class="text-sm">xyz</p>
                        </div>
                        <div class="text-sm">
                            Notification
                        </div>
                    </div>
                </div>
            </div>
            <div id="content" class="h-screen">
                afds
                @yield('content')
            </div>
        </div>

    </div>


</body>
</html>
