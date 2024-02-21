@extends('layouts.mainLayout')
@section('content')
    <div class="flex flex-col p-10">
        <div class="flex justify-between">
            <div>
                <h1 class="text-3xl font-semibold">Expenses</h1>
                <p class="mt-2 text-gray-400 font-medium">Total expense amount on property - ₹.</p>
            </div>
            <div class="flex items-center gap-4">
                <a href="{{route('createExpenses')}}"><button class="bg-purple-800 text-white rounded-md pr-4 pl-4 pt-2 pb-2">+ New Expense</button></a>
            </div>

        </div>
        <div class="bg-white rounded-sm border border-gray-300 mt-8">
            <div >
                <form class="flex text-sm px-3 py-2 gap-5" action="">
                    <div class="mt-2 mb-6">
                        <select name="propertyName" class="rounded-sm p-2 border mt-2 border-gray-300 w-full">
                            <option class="text-gray-300 p-2" value="" selected>Select a Property</option>
                                @if ($property->count()>0)
                                    @foreach ($property as $prop)
                                        <option class="text-gray-700" value="{{$prop->title}}">{{$prop->title}}</option>
                                    @endforeach
                                @else
                                    <h1>There are no properties added yet.</h1>
                                @endif

                        </select>
                    </div>
                    <div class="mt-2 mb-6">
                        <input class="rounded-sm p-2 border mt-2 border-gray-300 w-full" type="date" name="fromDate" value="{{old('fromDate')}}" placeholder="From Date">
                    </div>
                    <div class="mt-2 mb-6">
                        <input class="rounded-sm p-2 border mt-2 border-gray-300 w-full" type="date" name="toDate" value="{{old('toDate')}}" placeholder="">
                    </div>
                    <div class="mt-2 mb-6">
                        <button class="rounded-md p-2 text-white border mt-2 bg-green-500" type="submit" name="submit">Submit</button>
                    </div>
                </form>
            </div>
            <div class="flex justify-center items-center p-4 border-t border-gray-300">
                no expense to show
            </div>
        </div>

    </div>


@endsection

