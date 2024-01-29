@extends('layouts.mainLayout')
@section('content')
    <div class="flex flex-col p-10">
        <div class="flex justify-between">
            <div>
                <h1 class="text-3xl text-slate-600 font-semibold">Dashboard</h1>
                <p class="mt-2 text-slate-400">Monthly statics.</p>
            </div>
            <div class="flex items-center gap-4">
                <a href="">
                    <button class="bg-white text-slate-600 font-semibold text-sm rounded-md pr-4 pl-4 pt-2 pb-2 border border-gray-300">
                        <i class="fa-regular fa-calendar-days"></i>
                        Last 30 days >
                    </button>
                </a>
            </div>
        </div>
        <div class="flex flex-col justify-evenly rounded-sm mt-8">
            <div class="grid gap-y-2">
                <div class="grid text-lg text-gray-800 font-semibold gap-2 lg:grid-cols-2">
                    <div class="bg-white rounded-sm h-12 p-3 text-slate-600 font-semibold">
                        <h1>Active Properties</h1>
                    </div>
                    <div class="bg-white rounded-sm h-12 p-3 text-slate-600 font-semibold">
                        <h1>Active Tenants</h1>
                    </div>
                </div>
                <div class="grid gap-2  lg:grid-cols-[2fr,1fr]">
                    <div class="bg-white  rounded-sm h-12 p-3 text-slate-600 font-semibold">
                        <h3>Rent Collection 2024 (₹ 0)</h3>
                    </div>
                    <div class="bg-white  rounded-sm h-12 p-3 text-slate-600 font-semibold">
                        <h3>Rent Collection (0)</h3>
                    </div>
                    <div class="bg-white rounded-sm h-12 p-3 text-slate-600 font-semibold">
                        <h1>Last Five Transaction</h1>
                    </div>
                    <div class="bg-white rounded-sm h-12 p-3 text-slate-600 font-semibold">
                        <h1>New Tenants</h1>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection
