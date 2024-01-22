@extends('layouts.mainLayout')
@section('content')
    <div class="flex flex-col p-10">
        <div class="flex justify-between">
            <div>
                <h1 class="text-3xl font-semibold">Expenses</h1>
                <p class="mt-2 text-gray-400 font-medium">Total expense amount on property - ₹.</p>
            </div>
            <div class="flex items-center gap-4">
                <a href=""><button class="bg-purple-800 text-white rounded-md pr-4 pl-4 pt-2 pb-2">+ New Expense</button></a>
            </div>

        </div>
        <div class="bg-white rounded-sm border border-gray-300 mt-8">
            <div class="flex text-sm px-5 py-4 gap-5">
                <button class="border border-gray-300 rounded-md px-4 py-2">Select Property</button>
                <button class="border border-gray-300 rounded-md px-4 py-2">From Date</button>
                <button class="border border-gray-300 rounded-md px-4 py-2">To Date</button>
                <button class=" bg-purple-700 rounded-md px-4 py-2 text-white">✓ Apply</button>
                <button class=" bg-white border border-black rounded-md px-4 py-2">↓ Export</button>
            </div>
            <div class="flex justify-center items-center p-4 border-t border-gray-300">
                no expense to show
            </div>
        </div>

    </div>


@endsection
