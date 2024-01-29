@extends('layouts.mainLayout')
@section('content')
    <div class="flex flex-col p-10">
        <div class="flex justify-between">
            <div>
                <h1 class="text-3xl text-slate-600 font-semibold">Rent</h1>
                <p class="mt-2 text-slate-400 ">You have total $ rent collection.</p>
            </div>

        </div>
        <div class="bg-white rounded-sm border border-gray-300 mt-8">
            <div class="flex px-5 py-4 gap-5">
                <button class="border border-gray-300 rounded-md px-4 py-2">January</button>
                <button class="border border-gray-300 rounded-md px-4 py-2">2024</button>
                <button class=" bg-purple-700 rounded-md px-4 py-2">✓ Apply</button>
            </div>
            <div class="flex justify-center items-center p-4 border-t border-gray-300">
                no rent to show
            </div>
        </div>

    </div>


@endsection
