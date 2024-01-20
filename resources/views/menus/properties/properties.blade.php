@extends('layouts.mainLayout')
@section('content')
    <div class="flex flex-col p-10">
        <div class="flex">
            <div>
                <h1 class="text-2xl font-semibold">Properties</h1>
                <p class="mt-2 text-gray-400 font-medium">You currently have 0 properties.</p>
            </div>
            <div>
                <button class="bg-white text-gray-700 rounded-md pl-4 pr-4 pt-2 pb-2">↓  Export</button>
                <button class="bg-purple-800 text-white rounded-md pr-4 pl-4 pt-2 pb-2">+ New Property</button>
            </div>
        </div>
        <div class="flex bg-white rounded-sm border mt-8 border-gray-300 p-4">
            <h3>Name</h3>
            <h3>Address</h3>
            <h3>Status</h3>
            <h3>Occupancy</h3>
            <hr>
        </div>
    </div>


@endsection
