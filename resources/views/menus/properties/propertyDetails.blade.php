@extends('layouts.mainLayout')
@section('content')
    <div class="flex flex-col p-10">
        <div class="flex justify-between">
            <div>
                <h1 class="text-2xl text-slate-600 font-bold">Properties</h1>
                <p class="mt-2 text-slate-400">All details of property provided by owner.</p>
            </div>
            <div class="fleitems-center p-3 gap-4">
                <a href="{{route('properties')}}"><button class="bg-white text-slate-400 rounded-md border border-gray-300 pr-4 pl-4 pt-2 pb-2 hover:bg-gray-600 hover:text-white">← Back</button></a>
            </div>
        </div>
        <div class="flex flex-col justify-evenly bg-white rounded-sm border mt-8 border-gray-300 px-6 pt-2 pb-6">
            <div class="flex gap-6 border-b border-gray-300">
                <div id="detailsTitle" class="py-3 text-blue-600 border-b-2 border-blue-600">
                    <h3 onclick="display('details', 'detailsTitle')" class=" hover:text-blue-500 h-full"><i class="fa-regular fa-user"></i> Personal</h3>
                </div>
                <div id="attachmentsTitle" class="py-3">
                    <h3 onclick="display('attachments', 'attachmentsTitle')" class=" hover:text-blue-500"><i class="fa-regular fa-file"></i> Attachments</h3>
                </div>
                <div id="locationTitle" class="py-3">
                    <h3 onclick="display('location','locationTitle')" class=" hover:text-blue-500"><i class="fa-solid fa-map-location-dot"></i> Location</h3>
                </div>

            </div>
            <div id='details' class="grid mt-6 border border-gray-300 md:grid-cols-[1fr,2fr] grid-cols-2">
                <div class="flex items-center p-3 text-slate-400 font-bold border border-gray-300">Property ID</div>
                <div class="flex items-center p-3 text-slate-400 font-bold border border-gray-300">{{$property->id}}</div>
                <div class="flex items-center p-3 text-slate-400 font-bold border border-gray-300">Property Name</div>
                <div class="flex items-center p-3 text-slate-400 font-bold border border-gray-300">{{$property->title}}</div>
                <div class="flex items-center p-3 text-slate-400 font-bold border border-gray-300">Property ID</div>
                <div class="flex items-center p-3 text-slate-400 font-bold border border-gray-300">{{$property->address_line_1}},{{$property->address_line_2}},{{$property->city}},{{$property->state}},{{$property->country}}({{$property->pincode}})</div>
                <div class="flex items-center p-3 text-slate-400 font-bold border border-gray-300">Property Description</div>
                <div class="flex items-center p-3 text-slate-400 font-bold border border-gray-300">{{$property->description}}</div>
                <div class="flex items-center p-3 text-slate-400 font-bold border border-gray-300">Rent</div>
                <div class="flex items-center p-3 text-slate-400 font-bold border border-gray-300">{{$property->rent}}</div>
                <div class="flex items-center p-3 text-slate-400 font-bold border border-gray-300">Care Taker Name</div>
                <div class="flex items-center p-3 text-slate-400 font-bold border border-gray-300"></div>
                <div class="flex items-center p-3 text-slate-400 font-bold border border-gray-300">Care Taker Contact</div>
                <div class="flex items-center p-3 text-slate-400 font-bold border border-gray-300"></div>
                <div class="flex items-center p-3 text-slate-400 font-bold border border-gray-300">Care Taker Email</div>
                <div class="flex items-center p-3 text-slate-400 font-bold border border-gray-300"></div>
                <div class="flex items-center p-3 text-slate-400 font-bold border border-gray-300">Property Tenant</div>
                <div class="flex items-center p-3 text-slate-400 font-bold border border-gray-300"></div>
            </div>
            <div  id="attachments" class="hidden">
                hello
            </div>
            <div  id="location" class="hidden">
                location
            </div>


        </div>
    </div>

    <script>

        var listOfItems = ['details','attachments','location']
        var listOfTitles = ['detailsTitle', 'attachmentsTitle', 'locationTitle']

        function display(id,titleId){
            var x = document.getElementById(id);
            var z = document.getElementById(titleId);

            for(let i=0; i<listOfItems.length; i++){
                var y = document.getElementById(listOfItems[i]);
                y.classList.add('hidden');
                var a = document.getElementById(listOfTitles[i]);
                a.classList.remove('text-blue-600', 'border-b-2', 'border-blue-600')
            }

            x.classList.remove('hidden');
            z.classList.add('text-blue-600', 'border-b-2','border-blue-600')

        }
    </script>

@endsection
