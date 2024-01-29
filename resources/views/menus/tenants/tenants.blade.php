@extends('layouts.mainLayout')
@section('content')
    <div class="flex flex-col p-10">
        <div class="flex justify-between">
            <div>
                <h1 class="text-2xl text-slate-600 font-semibold">Tenants</h1>
                <p class="mt-2 text-slate-400">You currently have 0 tenants.</p>
            </div>
            <div class="flex items-center gap-4">
                <button class="bg-white text-gray-700 rounded-md pl-4 pr-4 pt-2 pb-2 border border-gray-300">↓  Export</button>
                <a href="{{route('createTenants')}}"><button class="bg-purple-800 text-white rounded-md pr-4 pl-4 pt-2 pb-2">+ New Tenant</button></a>
            </div>
        </div>
        <div class="flex flex-col bg-white rounded-sm border mt-8 border-gray-300 p-4">
            <div class="px-4 grid grid-flow-col grid-cols-[2fr,2fr,1fr,1fr,1fr,2fr] border-b border-gray-300 pb-2 text-slate-400 font-semibold text-sm">
                <h3>Name</h3>
                <h3>Property</h3>
                <h3>Contact No.</h3>
                <h3>Payable Rent</h3>
                <h3>Status</h3>
                <div></div>
            </div>
            <div class="p-4 grid grid-flow-col grid-cols-[2fr,2fr,1fr,1fr,1fr,2fr] border-b border-gray-300 pb-4 text-slate-400">
                @if ($tenants->count() > 0)
                    @foreach ($tenants as $tenant)
                        <div class="flex">
                            <div class="pr-3">
                                <button class="rounded-full bg-red-500 px-4 py-2">{{$tenant->name[0]}}</button>
                            </div>
                            <div>
                                <h3>{{$tenant->name}}</h3>
                                <h4 class="text-sm">{{$tenant->email}}</h4>
                            </div>
                        </div>

                        <h3></h3>
                        <h3>{{$tenant->contactNo}}</h3>
                        <h3></h3>
                        <h3></h3>
                        <div>
                            <a href=""><button class="bg-blue-300 rounded-md pr-2 pl-2 text-white hover:bg-blue-700">View details</button></a>
                            <a href=""><button class="bg-green-300 rounded-md pr-2 pl-2 text-white hover:bg-green-700">Edit</button></a>
                            <button class="bg-red-300 rounded-md pr-2 pl-2 text-white hover:bg-red-700">Deactivate</button></div>
                    @endforeach
                @else
                    <div class="flex justify-center pt-2">
                        <p>There are no properties.</p>
                    </div>
                @endif
            </div>



        </div>
    </div>


@endsection
