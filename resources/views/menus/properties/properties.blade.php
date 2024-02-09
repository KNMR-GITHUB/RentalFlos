@extends('layouts.mainLayout')
@section('content')
    <div class="flex flex-col p-10">
        <div class="flex justify-between">
            <div>
                <h1 class="text-2xl text-slate-600 font-semibold">Properties</h1>
                <p class="mt-2 text-slate-400">You currently have {{$properties->count()}} properties.</p>
            </div>
            @auth
                <div class="flex items-center gap-4">
                    <button class="bg-white text-gray-700 rounded-md pl-4 pr-4 pt-2 pb-2 border border-gray-300 hover:bg-gray-500 hover:text-white">↓  Export</button>
                    <a href="{{route('createProperties')}}"><button class="bg-purple-800 text-white rounded-md pr-4 pl-4 pt-2 pb-2">+ New Property</button></a>
                </div>
            @endauth

        </div>
        <div class="flex flex-col justify-evenly bg-white rounded-sm border mt-8 border-gray-300 p-4">
            <div class="grid grid-flow-col grid-cols-[2.5fr,3fr,1fr,2fr,1.5fr] border-b pl-4 border-gray-300 pb-4 text-slate-400 font-semibold">
                <h3>Name</h3>
                <h3>Address</h3>
                <h3>Status</h3>
                <h3>Occupancy</h3>
                <div></div>
            </div>
                @if ($properties->count() > 0)
                    @foreach ($properties as $property)
                        <div class="group grid grid-flow-col grid-cols-[2.5fr,3fr,1fr,2fr,1.5fr] border-b border-gray-300 pt-4 pb-4 pl-4 hover:bg-gray-100">
                            <div class="flex gap-4">
                                <button class="rounded-full h-10 w-10 bg-pink-500 pr-2 pl-2 text-white text-sm font-semibold">{{$property->title[0]}}</button>
                                <h3 class="text-slate-600 font-semibold">{{$property->title}}</h3>
                            </div>

                            <h3 class="text-slate-400 font-semibold">{{$property->address_line_1}}, {{$property->address_line_2}}, {{$property->pincode}}</h3>
                            <h3 class="text-green-500">active</h3>
                            <h3 class="text-green-500">vacant</h3>

                                    {{-- tintu gooti --}}
                            <div class="basis-1/12 flex items-center justify-end pr-10">
                                <button id="dropdownMenuIconButton" data-dropdown-toggle="{{$property->id}}" class="group-hover:bg-gray-100 inline-flex justify-center items-center p-2 text-sm font-medium text-center w-10 h-10 text-gray-900 bg-white rounded-full  focus:outline-none" type="button">
                                    <i class="fa-solid fa-ellipsis"></i>
                                </button>

                                    <!-- Dropdown menu  -->
                                <div id="{{$property->id}}" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44">
                                    <ul class="py-2 text-sm text-gray-500" aria-labelledby="dropdownMenuIconButton">
                                        <li>
                                            <a href="{{route('showProperties', $property->id)}}" class="block py-2 hover:bg-gray-100 dark:hover:bg-gray-500 dark:hover:text-white text-sm">
                                                <i class="fa-solid fa-eye px-3"></i> View
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{route('editProperties', $property->id)}}" class="block py-2 hover:bg-gray-100 dark:hover:bg-gray-500 dark:hover:text-white text-sm" >
                                                <i class="fa-solid fa-user-pen px-3"></i> Edit
                                            </a>
                                        </li>
                                        <li class="border-t border-gray-300">
                                            <a href="" class="block py-2 hover:bg-gray-100 dark:hover:bg-gray-500 dark:hover:text-white text-sm">
                                                <i class="fa-solid fa-people-roof px-3"></i> Assign care taker
                                            </a>
                                        </li>
                                        <li>
                                            <a href="" class="block py-2 hover:bg-gray-100 dark:hover:bg-gray-500 dark:hover:text-white text-sm">
                                                <i class="fa-solid fa-person-circle-plus px-3"></i> Assign Tenant
                                            </a>
                                        </li>
                                        <li class="border-t border-gray-300">
                                            <a href="" class="block py-2 hover:bg-gray-100 dark:hover:bg-gray-500 dark:hover:text-white text-sm">
                                                <i class="fa-solid fa-ban px-3"></i> Deactivate
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>


                        </div>
                    @endforeach
                @else
                    <div class="flex justify-center pt-2">
                        <p>There are no properties.</p>
                    </div>
                @endif
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>
@endsection



