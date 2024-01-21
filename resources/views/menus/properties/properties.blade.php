@extends('layouts.mainLayout')
@section('content')
    <div class="flex flex-col p-10">
        <div class="flex justify-between">
            <div>
                <h1 class="text-2xl font-semibold">Properties</h1>
                <p class="mt-2 text-gray-400 font-medium">You currently have 0 properties.</p>
            </div>
            <div class="flex items-center gap-4">
                <button class="bg-white text-gray-700 rounded-md pl-4 pr-4 pt-2 pb-2 border border-gray-300">↓  Export</button>
                <a href="{{route('createProperties')}}"><button class="bg-purple-800 text-white rounded-md pr-4 pl-4 pt-2 pb-2">+ New Property</button></a>
            </div>
        </div>
        <div class="flex flex-col justify-evenly bg-white rounded-sm border mt-8 border-gray-300 p-4">
            <div class="grid grid-flow-col grid-cols-[3fr,3fr,1fr,1fr,2fr] border-b border-gray-300 pb-4">
                <h3>Name</h3>
                <h3>Address</h3>
                <h3>Status</h3>
                <h3>Occupancy</h3>
                <div></div>
            </div>

                @foreach ($properties as $property)
                    <div class="grid grid-flow-col grid-cols-[3fr,3fr,1fr,1fr,2fr] border-b border-gray-300 pt-4 pb-4">
                        <div class="flex gap-4">
                            <button class="rounded-full bg-pink-500 pr-2 pl-2 text-white text-sm font-semibold">{{$property->title[0]}}</button>
                            <h3>{{$property->title}}</h3>
                        </div>

                        <h3>{{$property->address_line_1}}, {{$property->address_line_2}}, {{$property->pincode}}</h3>
                        <h3 class="text-green-500">active</h3>
                        <h3 class="text-green-500">vacant</h3>
                        <div>
                            <button class="bg-blue-300 rounded-md pr-2 pl-2 text-white hover:bg-blue-700">View details</button>
                            <button class="bg-green-300 rounded-md pr-2 pl-2 text-white hover:bg-green-700">Edit</button>
                            <button class="bg-red-300 rounded-md pr-2 pl-2 text-white hover:bg-red-700">Deactivate</button>
                        </div>
                    </div>
                @endforeach


        </div>
    </div>


@endsection
