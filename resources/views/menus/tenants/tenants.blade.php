@extends('layouts.mainLayout')
@section('content')
    <div class="flex flex-col p-10">
        <div class="flex justify-between">
            <div>
                <h1 class="text-2xl font-semibold">Tenants</h1>
                <p class="mt-2 text-gray-400 font-medium">You currently have 0 tenants.</p>
            </div>
            <div class="flex items-center gap-4">
                <button class="bg-white text-gray-700 rounded-md pl-4 pr-4 pt-2 pb-2 border border-gray-300">↓  Export</button>
                <a href=""><button class="bg-purple-800 text-white rounded-md pr-4 pl-4 pt-2 pb-2">+ New Tenant</button></a>
            </div>
        </div>
        <div class="flex flex-col justify-evenly bg-white rounded-sm border mt-8 border-gray-300 p-4">
            <div class="grid grid-flow-col grid-cols-[3fr,fr,1fr,1fr,1fr,2fr] border-b border-gray-300 pb-4">
                <h3>Name</h3>
                <h3>Property</h3>
                <h3>Contact No.</h3>
                <h3>Payable Rent</h3>
                <h3>Status</h3>
                <div></div>
            </div>


        </div>
    </div>


@endsection
