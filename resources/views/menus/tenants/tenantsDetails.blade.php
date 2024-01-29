@extends('layouts.mainLayout')
@section('content')
    <div class="flex flex-col p-10">
        <div class="flex justify-between">
            <div>
                <h1 class="text-2xl text-slate-600 font-bold">Properties</h1>
                <p class="mt-2 text-slate-400">All details of property provided by owner.</p>
            </div>
            <div class="fleitems-center p-3 gap-4">
                <a href="{{route('tenants')}}"><button class="bg-white text-slate-400 rounded-md border border-gray-300 pr-4 pl-4 pt-2 pb-2 hover:bg-gray-600 hover:text-white">← Back</button></a>
            </div>
        </div>
        <div class="flex flex-col justify-evenly bg-white rounded-sm border mt-8 border-gray-300 p-4">
            <div class="flex gap-4 border-b border-gray-300 pb-4">
                <h3>Personal</h3>
                <h3>Attachments</h3>
            </div>
            <div class="grid mt-6 border border-gray-300 md:grid-cols-[1fr,2fr] grid-cols-2">
                <div class="flex items-center p-3 text-slate-400 font-bold border border-gray-300">Tenant ID</div>
                <div class="flex items-center p-3 text-slate-400 font-bold border border-gray-300">{{$tenant->id}}</div>
                <div class="flex items-center p-3 text-slate-400 font-bold border border-gray-300">Tenant Name</div>
                <div class="flex items-center p-3 text-slate-400 font-bold border border-gray-300">{{$tenant->name}}</div>
                <div class="flex items-center p-3 text-slate-400 font-bold border border-gray-300">Contact No</div>
                <div class="flex items-center p-3 text-slate-400 font-bold border border-gray-300">{{$tenant->contactNo}}</div>
                <div class="flex items-center p-3 text-slate-400 font-bold border border-gray-300">Email address</div>
                <div class="flex items-center p-3 text-slate-400 font-bold border border-gray-300">{{$tenant->email}}</div>
                <div class="flex items-center p-3 text-slate-400 font-bold border border-gray-300">Rent</div>
                <div class="flex items-center p-3 text-slate-400 font-bold border border-gray-300"></div>
                <div class="flex items-center p-3 text-slate-400 font-bold border border-gray-300">Address</div>
                <div class="flex items-center p-3 text-slate-400 font-bold border border-gray-300">{{$tenant->address}}</div>
                <div class="flex items-center p-3 text-slate-400 font-bold border border-gray-300">Property</div>
                <div class="flex items-center p-3 text-slate-400 font-bold border border-gray-300"></div>
                <div class="flex items-center p-3 text-slate-400 font-bold border border-gray-300">Start Date</div>
                <div class="flex items-center p-3 text-slate-400 font-bold border border-gray-300"></div>
                <div class="flex items-center p-3 text-slate-400 font-bold border border-gray-300">End Date</div>
                <div class="flex items-center p-3 text-slate-400 font-bold border border-gray-300"></div>


            </div>


        </div>
    </div>


@endsection
