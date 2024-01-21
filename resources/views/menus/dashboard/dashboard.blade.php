@extends('layouts.mainLayout')
@section('content')
    <div class="flex flex-col p-10">
        <div class="flex justify-between">
            <div>
                <h1 class="text-3xl font-semibold">Dashboard</h1>
                <p class="mt-2 text-gray-400 font-medium">Monthly statics.</p>
            </div>
            <div class="flex items-center gap-4">
                <a href=""><button class="bg-white text-gray-400 rounded-md pr-4 pl-4 pt-2 pb-2 border border-gray-300">Last 30 days ></button></a>
            </div>
        </div>
        <div class="flex flex-col justify-evenly bg-white rounded-sm border mt-8 border-gray-300 p-4">

        </div>
    </div>


@endsection
