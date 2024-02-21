@extends('layouts.mainLayout')
@section('content')
    <div class="flex flex-col p-10">
        <div class="flex justify-between">
            <div>
                <h1 class="text-3xl font-semibold">Expenses</h1>
                <p class="mt-2 text-gray-400 font-medium">Total expense amount on property - ₹ {{$sum}}</p>
            </div>
            <div class="flex items-center gap-4">
                <a href="{{route('createExpenses')}}"><button class="bg-purple-800 text-white rounded-md pr-4 pl-4 pt-2 pb-2">+ New Expense</button></a>
            </div>

        </div>
        <div class="bg-white rounded-sm border border-gray-300 mt-8">
            <div >
                <form id='filter' class="flex text-sm px-3 py-2 gap-5" action="{{route('filterExpense')}}" method="post">
                    @csrf
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
                        <input id="fromDate" class="rounded-sm p-2 border mt-2 border-gray-300 w-full" type="date" name="fromDate" value="{{old('fromDate')}}" placeholder="From Date">
                    </div>
                    <div class="mt-2 mb-6">
                        <input id="toDate" class="rounded-sm p-2 border mt-2 border-gray-300 w-full" type="date" name="toDate" value="{{old('toDate')}}" placeholder="To Date">
                    </div>
                    <div class="mt-2 mb-6">
                        <button class="rounded-md font-semibold py-3 px-6 text-white border mt-2 bg-purple-500 hover:bg-purple-800"  type="submit" name="submit">✓ Apply</button>
                    </div>
                    <div class="mt-2 mb-6">
                        <div class="rounded-md font-semibold py-3 px-6 border mt-2 border-gray-500 text-gray-800 hover:bg-gray-800 hover:text-white"  type="submit" name="submit"><i class="fa-solid fa-download"></i> Export</div>
                    </div>
                </form>
            </div>
            <div id="results" class="flex justify-center items-center p-4 border-t border-gray-300">
                @if ($data === null)

                @elseif ($data->isEmpty() )
                    <h1>No Records Found.</h1>
                @else
                    <table class="w-full h-full table-auto border-collapse border border-gray-300">
                        <thead>
                            <tr class="grid grid-cols-[1fr,3fr,3fr,3fr,3fr,2fr,3fr,2fr]">
                                <th class="border border-gray-300 text-slate-500">#</th>
                                <th class="border border-gray-300 text-slate-500">Property Name</th>
                                <th class="border border-gray-300 text-slate-500">Tenant Name</th>
                                <th class="border border-gray-300 text-slate-500">Expense Type</th>
                                <th class="border border-gray-300 text-slate-500">Date</th>
                                <th class="border border-gray-300 text-slate-500">Amount</th>
                                <th class="border border-gray-300 text-slate-500">Paid By</th>
                                <th class="border border-gray-300">

                                </th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($data as $item)
                                <tr class="grid grid-cols-[1fr,3fr,3fr,3fr,3fr,2fr,3fr,2fr] group hover:bg-gray-100">
                                    <td class="border border-gray-300 flex justify-center text-slate-500 font-semibold">{{$loop->iteration}}</td>
                                    <td class="border border-gray-300 flex justify-center text-slate-500 font-semibold">{{$item->propertyName}}</td>
                                    <td class="border border-gray-300 flex justify-center text-slate-500 font-semibold">{{$item->tenantName}}</td>
                                    <td class="border border-gray-300 flex justify-center text-slate-500 font-semibold">{{$item->expenseType}}</td>
                                    <td class="border border-gray-300 flex justify-center text-slate-500 font-semibold">{{$item->date}}</td>
                                    <td class="border border-gray-300 flex justify-center text-slate-500 font-semibold">{{$item->amount}}</td>
                                    <td class="border border-gray-300 flex justify-center font-semibold text-orange-400">{{$item->paidBy}}</td>
                                    <td class="border border-gray-300 flex justify-center">
                                        <div id="three_dots"  class="basis-1/12 flex items-center justify-end pr-10">
                                            <button id="dropdownMenuIconButton" data-dropdown-toggle="{{$item->id}}" class="group-hover:bg-gray-100 inline-flex justify-center items-center p-2 text-sm font-medium text-center w-10 h-10 text-gray-900 bg-white rounded-full  focus:outline-none" type="button">
                                                <i class="fa-solid fa-ellipsis"></i>
                                            </button>

                                                <!-- Dropdown menu  -->
                                            <div id="{{$item->id}}" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44" >
                                                <ul class="py-2 text-sm text-gray-500" aria-labelledby="dropdownMenuIconButton">
                                                    <li>
                                                        <a href="{{route('expenseDetails',$item->id)}}" class="block py-2 hover:bg-gray-100 dark:hover:bg-gray-500 dark:hover:text-white text-sm">
                                                            <i class="fa-solid fa-eye px-3"></i> View
                                                        </a>
                                                    </li>

                                                    <li>
                                                        <a href="{{route('editExpenses',$item->id)}}" class="block py-2 hover:bg-gray-100 dark:hover:bg-gray-500 dark:hover:text-white text-sm">
                                                            <i class="fa-solid fa-user-pen px-3"></i> Edit
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </td>
                                </tr>

                            @endforeach
                                <tr class="grid grid-cols-[10fr,3fr,2fr,3fr,2fr]">
                                    <td class="border border-gray-300 flex justify-center"></td>
                                    <td class="border border-gray-300 flex justify-center font-bold text-slate-500">Total</td>
                                    <td class="border border-gray-300 flex justify-center font-bold text-slate-500">{{$data->sum('amount')}}</td>
                                    <td class="border border-gray-300 flex justify-center"></td>
                                    <td class="border border-gray-300 flex justify-center"></td>
                                </tr>
                        </tbody>
                    </table>
                @endif

            </div>
        </div>

    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>

@endsection

