@extends('layouts.mainLayout')
@section('content')
    <div class="flex flex-col p-10">
        <div class="flex justify-between">
            <div>
                <h1 class="text-2xl text-slate-600 font-bold">Expenses</h1>
                <p class="mt-2 text-slate-400">All details of expense provided by owner.</p>
            </div>
            <div class="fleitems-center p-3 gap-4">
                <a href="{{route('expenses')}}"><button class="bg-white text-slate-400 rounded-md border border-gray-300 pr-4 pl-4 pt-2 pb-2 hover:bg-gray-600 hover:text-white">← Back</button></a>
            </div>
        </div>
        <div class="flex flex-col justify-evenly bg-white rounded-sm border mt-8 border-gray-300 p-4">
            <div class="flex gap-4 border-b border-gray-300 pb-4">
                <h3>Personal</h3>
                <h3>Attachments</h3>
            </div>
            <div class="grid mt-6 border border-gray-300 md:grid-cols-[1fr,1fr] lg:grid-cols-[1fr,3fr] grid-cols-2">
                <div class="flex items-center p-3 text-slate-400 font-bold border border-gray-300">Property Name</div>
                <div class="flex items-center p-3 text-slate-400 font-bold border border-gray-300">{{$expense->propertyName}}</div>
                <div class="flex items-center p-3 text-slate-400 font-bold border border-gray-300">Tenant Name</div>
                <div class="flex items-center p-3 text-slate-400 font-bold border border-gray-300">{{$expense->tenantName}}</div>
                <div class="flex items-center p-3 text-slate-400 font-bold border border-gray-300">Expense Type</div>
                <div class="flex items-center p-3 text-slate-400 font-bold border border-gray-300">{{$expense->expenseType}}</div>
                <div class="flex items-center p-3 text-slate-400 font-bold border border-gray-300">Date</div>
                <div class="flex items-center p-3 text-slate-400 font-bold border border-gray-300">{{$expense->date}}</div>
                <div class="flex items-center p-3 text-slate-400 font-bold border border-gray-300">Description</div>
                <div class="flex items-center p-3 text-slate-400 font-bold border border-gray-300">
                    @if ($expense->expenseDescription !== null)
                        {{$expense->expenseDescription}}
                    @endif
                </div>
                <div class="flex items-center p-3 text-slate-400 font-bold border border-gray-300">Amount</div>
                <div class="flex items-center p-3 text-slate-400 font-bold border border-gray-300">{{$expense->amount}}</div>
                <div class="flex items-center p-3 text-slate-400 font-bold border border-gray-300">Submitted Date</div>
                <div class="flex items-center p-3 text-slate-400 font-bold border border-gray-300">
                    @if ($expense->created_at !== null)
                        {{$expense->created_at}}
                    @endif
                </div>
                <div class="flex items-center p-3 text-slate-400 font-bold border border-gray-300">Paid By</div>
                <div class="flex items-center p-3 font-bold border border-gray-300 text-green-500">
                    {{$expense->paidBy}}
                </div>
            </div>


        </div>
    </div>


@endsection
