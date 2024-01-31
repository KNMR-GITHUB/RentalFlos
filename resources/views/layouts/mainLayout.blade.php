<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>RentalFlos</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    @vite('resources/css/app.css')
</head>
<body>
    {{--Main--}}
    <div class="grid grid-flow-col grid-cols-[1.1fr,6fr]">
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
                    <li class="{{(Route::is('expenses')) ? 'text-blue-500':''}}  font-semibold  mb-5 hover:text-blue-500">
                        <a href="{{route('expenses')}}"><i class="fa-solid fa-coins mr-3"></i> Expenses</a>
                    </li>
                    <li class="{{(Route::is('settings')) || (Route::is('edit_profile')) ? 'text-blue-500':''}} font-semibold  mb-5 hover:text-blue-500">
                        <a href="{{route('settings')}}"><i class="fa-solid fa-sliders mr-3"></i> Settings</a>
                    </li>
                </ul>
            </div>

        </div>
        {{--Right--}}
        <div id="body" class="flex flex-col h-full">
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
                                <div>
                                    <p class="text-xs">OWNER</p>
                                    <p class="text-xs">{{Auth::user()->fname}}</p>
                                </div>
                                <div class="text-sm">
                                    Notification
                                </div>
                                <form action="{{route('logout')}}" method='post'>
                                    @csrf
                                    <button class="bg-red-500 pl-3 pr-3 pt-2 pb-2 rounded-md text-sm text-white hover:bg-red-700 hover:text-gray-300">Logout</button>
                                </form>

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

</body>
</html>
