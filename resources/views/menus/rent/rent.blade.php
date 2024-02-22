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

                <select class="w-40 border border-gray-300 rounded-md p-2" name="month" id="month">
                    <option value="January">January</option>
                    <option value="February">February</option>
                </select>

                <select class="w-40 border border-gray-300 rounded-md p-2" name="year" id="year">
                    <option value="2024">2024</option>
                    <option value="2023">2023</option>
                </select>
                <button class=" bg-purple-500 text-white rounded-md px-4 py-2 hover:bg-purple-800">✓ Apply</button>
            </div>
            <div class="flex justify-center items-center p-4 border-t border-gray-300">
                no rent to show
            </div>
        </div>

    </div>


@endsection
