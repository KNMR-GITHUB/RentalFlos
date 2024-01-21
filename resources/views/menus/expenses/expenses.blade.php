@extends('layouts.mainLayout')
@section('content')
    <div class="flex flex-col p-10">
        <div class="flex justify-between">
            <div>
                <h1 class="text-3xl font-semibold">Expenses</h1>
                <p class="mt-2 text-gray-400 font-medium">Total expense amount on property - $.</p>
            </div>
            <div class="flex items-center gap-4">
                <a href=""><button class="bg-purple-800 text-white rounded-md pr-4 pl-4 pt-2 pb-2">+ New Expense</button></a>
            </div>

        </div>
        <div class="bg-white rounded-sm border border-gray-300 h-12 mt-8">

        </div>

    </div>


@endsection
