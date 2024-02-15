@extends('layouts.mainLayout')
@section('content')
    <div class="flex flex-col p-10">
        <div class="flex justify-between">
            <div>
                <h1 class="text-2xl text-slate-600 font-semibold">Tenants</h1>
                <p class="mt-2 text-slate-400">You currently have {{$tenants->count()}} tenants.</p>
            </div>
            <div class="flex items-center gap-4">
                <button class="bg-white text-gray-700 rounded-md pl-4 pr-4 pt-2 pb-2 border border-gray-300">↓  Export</button>
                <a href="{{route('createTenants')}}"><button class="bg-purple-800 text-white rounded-md pr-4 pl-4 pt-2 pb-2">+ New Tenant</button></a>
            </div>
        </div>
        <div class="flex flex-col bg-white rounded-sm border mt-8 border-gray-300 p-4">
            <div class="px-4 grid grid-flow-col grid-cols-[2fr,2fr,1fr,1fr,1fr,1fr] border-b border-gray-300 pb-2 text-slate-400 font-semibold text-sm">
                <h3>Name</h3>
                <h3>Property</h3>
                <h3>Contact No.</h3>
                <h3>Payable Rent</h3>
                <h3>Status</h3>
                <div></div>
            </div>

                @if ($tenants->count() > 0)
                    @foreach ($tenants as $tenant)
                        <div class="group p-4 grid grid-flow-col grid-cols-[2fr,2fr,1fr,1fr,1fr,1fr] border-b border-gray-300 pb-4 text-slate-400 hover:bg-gray-100">
                            <div class="grid grid-cols-[1fr,4fr] text-slate-400">
                                <div class="w-20">
                                    <div class="h-10 w-10 rounded-full border border-gray-300 overflow-hidden">
                                        @if ($tenant->image === null)
                                            <button class="rounded-full bg-pink-500 h-10 w-10 text-white text-sm font-semibold">
                                                {{$tenant->name[0]}}
                                            </button>
                                        @else
                                            <img class="object-cover h-10 w-10" src="/storage/{{($tenant->image)}}" alt="">
                                        @endif
                                    </div>
                                </div>

                                <div>
                                    <h3 class="text-slate-600 font-medium">{{$tenant->name}}</h3>
                                    <h4 class="text-sm">{{$tenant->email}}</h4>
                                </div>
                            </div>

                            <h3>
                                @if ($tenant->propertyName !== null)
                                    {{$tenant->propertyName}}
                                @endif
                            </h3>
                            <h3>{{$tenant->contactNo}}</h3>
                            <h3>
                                @if ($tenant->rent !== null)
                                    {{$tenant->rent}}
                                @endif
                            </h3>
                            <div>
                                @if ($tenant->status === 'Active')
                                    <h3 class="text-green-400">{{$tenant->status}}</h3>
                                @else
                                    <h3 class="text-red-400"> {{$tenant->status}}</h3>
                                @endif

                            </div>

                            <div class="basis-1/12 flex items-center justify-end pr-10">
                                <button id="dropdownMenuIconButton" data-dropdown-toggle="{{$tenant->id}}" class="group-hover:bg-gray-100 inline-flex justify-center items-center p-2 text-sm font-medium text-center w-10 h-10 text-gray-900 bg-white rounded-full  focus:outline-none" type="button">
                                    <i class="fa-solid fa-ellipsis"></i>
                                </button>

                                    <!-- Dropdown menu  -->
                                <div id="{{$tenant->id}}" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44">
                                    <ul class="py-2 text-sm text-gray-500" aria-labelledby="dropdownMenuIconButton">
                                        <li>
                                            <a href="{{route('showTenants', $tenant->id)}}" class="block py-2 hover:bg-gray-100 dark:hover:bg-gray-500 dark:hover:text-white text-sm">
                                                <i class="fa-solid fa-eye px-3"></i> View
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{route('editTenants', $tenant->id)}}" class="block py-2 hover:bg-gray-100 dark:hover:bg-gray-500 dark:hover:text-white text-sm" >
                                                <i class="fa-solid fa-user-pen px-3"></i> Edit
                                            </a>
                                        </li>

                                        <li class="border-t border-gray-300">
                                            <div class="w-full">
                                                <form action="{{ route('tenantStatus', $tenant->id) }}" method="post">
                                                    @csrf
                                                    @method('put')
                                                    <input id="statusInput" type="hidden" name="status" value="active">
                                                    @if ($tenant->status === 'Inactive')
                                                        <input type="hidden" name="status" value="Active">
                                                        <button class="" type="submit">
                                                            <i class="fa-regular fa-circle-xmark px-3"></i> {{$tenant->status}}
                                                        </button>
                                                    @else
                                                        <input type="hidden" name="status" value="Inactive">
                                                        <button class="" type="submit">
                                                            <i class="fa-regular fa-circle-check px-3"></i> {{$tenant->status}}
                                                        </button>
                                                    @endif
                                                </form>
                                            </div>
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
