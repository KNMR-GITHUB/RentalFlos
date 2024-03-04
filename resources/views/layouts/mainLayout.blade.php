<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>RentalFlos</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
</head>
<body>
    {{--Main--}}
    <div id='main' class="grid grid-flow-col grid-cols-[1.1fr,6fr]">
        {{--Left--}}
        <div id="nav" class="sticky top-0 left-0 h-screen flex flex-col ">
            {{--Logo--}}
            <div class=" h-16 flex items-center pl-4 border-b border-gray-300">
                <a href="{{route('dashboard')}}"><img class="h-9" src='/images/logo.png' alt="rental flo logo"></a>
            </div>
            {{--Menu links--}}
            <div class="p-8">
                <ul class="h-full">
                    <li class="{{(Route::is('dashboard')) ? 'text-blue-500':''}}  font-semibold  mb-5 hover:text-blue-500"> <a href="{{route('dashboard')}}">
                        <i class="fa-solid fa-table-cells-large mr-3"></i> Dashboard</a>
                    </li>
                    <li class="{{(Route::is('properties')) || (Route::is('editProperties')) || (Route::is('showProperties')) || (Route::is('createProperties')) ? 'text-blue-500':''}} font-semibold  mb-5 hover:text-blue-500">
                         <a href="{{route('properties')}}"><i class="fa-solid fa-hotel mr-3"></i> Properties</a>
                    </li>
                    <li class="{{(Route::is('tenants')) || (Route::is('editTenants')) || (Route::is('showTenants')) || (Route::is('createTenants')) ? 'text-blue-500':''}}  font-semibold  mb-5 hover:text-blue-500">
                        <a href="{{route('tenants')}}"><i class="fa-solid fa-user-group mr-2"></i> Tenants</a>
                    </li>
                    <li class="{{(Route::is('rent')) ? 'text-blue-500':''}} font-semibold  mb-5 hover:text-blue-500">
                        <a href="{{route('rent')}}"><i class="fa-solid fa-indian-rupee-sign mr-4 ml-1"></i> Rent</a>
                    </li>
                    <li class="{{(Route::is('expenses')) || (Route::is('createExpenses')) ? 'text-blue-500':''}}  font-semibold  mb-5 hover:text-blue-500">
                        <a href="{{route('expenses')}}"><i class="fa-solid fa-coins mr-3"></i> Expenses</a>
                    </li>
                    <li class="{{(Route::is('settings')) || (Route::is('edit_profile')) ? 'text-blue-500':''}} font-semibold  mb-5 hover:text-blue-500">
                        <a href="{{route('settings')}}"><i class="fa-solid fa-sliders mr-3"></i> Settings</a>
                    </li>
                </ul>
            </div>

        </div>
        {{--Right--}}
        <div id="body" class="flex relative flex-col h-full">
            {{--Nav Bar--}}
            <div id="user_profile" class="bg-white border-l border-b border-gray-300 m-0 p-0 h-16 sticky top-0">
                <div class="flex flex-row-reverse">
                    @auth

                        <div class="grid grid-flow-col h-16  gap-5 pl-5 pt-4 pr-5">
                                <a href="{{route('edit_profile')}}">
                                    <div class="h-10 w-10 rounded-full overflow-hidden">
                                        @if (Auth::user()->image === null)
                                        <button class="rounded-full bg-pink-500 h-10 w-10 pr-2 pl-2 text-white text-sm font-semibold">
                                            {{Auth::user()->fname[0]}}{{Auth::user()->lname[0]}}
                                        </button>
                                        @else
                                            <img class="object-cover h-10 w-10" src="/storage/{{(Auth::user()->image)}}" alt="">
                                        @endif
                                    </div>
                                </a>
                                <div id='menu' onclick="toggleProfile()">
                                    <p class="text-xs text-blue-400 font-semibold">OWNER</p>
                                    <p class="font-md">{{Auth::user()->fname}} </p>
                                </div>
                                <div class="text-sm">
                                    Notification
                                </div>


                        </div>

                        {{-- popup container --}}
                            <div id="profileCard" class="hidden bg-white shadow-md rounded-lg flex-col border-l border-r border-b border-l-gray-300 border-r-gray-300 border-b-gray-300 border-t-sky-600 border-t-4 absolute top-14 right-24 w-profile_card_width h-profile_card_height">
                                <div class="flex gap-4  bg-gray-100 px-4 pt-4 pb-2 rounded-t-lg border-b border-gray-300">
                                    <div class="h-12 w-12 rounded-full overflow-hidden">
                                        @if (Auth::user()->image === null)
                                        <button class="rounded-full bg-pink-500 h-12 w-12 pr-2 pl-2 text-white text-sm font-semibold">
                                            {{Auth::user()->fname[0]}}{{Auth::user()->lname[0]}}
                                        </button>
                                        @else
                                            <img class="object-cover h-12 w-12" src="/storage/{{(Auth::user()->image)}}" alt="">
                                        @endif
                                    </div>
                                    <div class="flex flex-col">
                                        <h2 class=" flex justify-center text-slate-600 font-bold" > {{Auth::user()->email}} </h2>
                                        <h3>{{Auth::user()->fname}} {{Auth::user()->lname}}</h3>
                                    </div>
                                </div>

                                <div class="p-4">
                                    <a href="{{route('edit_profile')}}"><h3 class="text-slate-700 text-sm hover:text-blue-600"><i class="fa-regular fa-user mr-3 w-4"></i>View Profile</h3></a>
                                </div>

                                <div class="border-t border-slate-400 p-4">
                                        <form action="{{route('logout')}}" method="post">
                                            @csrf

                                            <button type="submit"><h3 class="text-slate-700 text-sm hover:text-blue-600"><i class="fa-solid fa-right-from-bracket w-4 mr-3"></i>Sign Out</h3></button>
                                        </form>
                                </div>
                            </div>
                    @endauth

                </div>
            </div>
            {{--Content--}}
            <div id="content" class="h-full bg-gray-100 border-l border-gray-300">
                    @yield('content')

            </div>
            {{--Footer--}}
            <footer class="h-16 w-full bottom-0 text-slate-400 bg-white border-t border-l border-gray-300 flex items-center pl-8 justify-between">
                <h2>© {{date('Y')}} XYZ Softlutions Pvt. Ltd.</h2>
                <div class="flex justify-evenly gap-6 pr-6 text-sm ">
                    <h3 class="hover:text-blue-400"><a href="">Terms</a></h3>
                    <h3 class="hover:text-blue-400"><a href="">Privacy</a></h3>
                    <h3 class="hover:text-blue-400"><a href="">Help</a></h3>
                </div>
            </footer>



        </div>

    </div>


    <script>
        function toggleProfile(event) {
            var popup = document.getElementById("profileCard");
            if (popup.classList.contains("hidden")) {
                popup.classList.remove("hidden");
            } else {
                popup.classList.add("hidden");


            }

        }

        document.addEventListener('click',function(event){
            var clickedOn = document.getElementById('profileCard').contains(event.target) || document.getElementById('menu').contains(event.target);
                    if(!clickedOn){
                        document.getElementById('profileCard').classList.add('hidden');
                    }
        });
    </script>

</body>
</html>
