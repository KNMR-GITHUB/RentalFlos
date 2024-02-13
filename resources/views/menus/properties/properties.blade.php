@extends('layouts.mainLayout')
@section('content')
    <div class="flex flex-col p-10">
        <div class="flex justify-between">
            <div>
                <h1 class="text-2xl text-slate-600 font-semibold">Properties</h1>
                <p class="mt-2 text-slate-400">You currently have {{$properties->count()}} properties.</p>
            </div>
            @auth
                <div class="flex items-center gap-4">
                    <button class="bg-white text-gray-700 rounded-md pl-4 pr-4 pt-2 pb-2 border border-gray-300 hover:bg-gray-500 hover:text-white">↓  Export</button>
                    <a href="{{route('createProperties')}}"><button class="bg-purple-800 text-white rounded-md pr-4 pl-4 pt-2 pb-2">+ New Property</button></a>
                </div>
            @endauth

        </div>
        <div class="flex flex-col justify-evenly bg-white rounded-sm border mt-8 border-gray-300 p-4">
            <div class="grid grid-flow-col grid-cols-[2.5fr,3fr,1fr,2fr,1.5fr] border-b pl-4 border-gray-300 pb-4 text-slate-400 font-semibold">
                <h3>Name</h3>
                <h3>Address</h3>
                <h3>Status</h3>
                <h3>Occupancy</h3>
                <div></div>
            </div>
                @if ($properties->count() > 0)
                    @foreach ($properties as $property)
                        <div class="group grid grid-flow-col grid-cols-[2.5fr,3fr,1fr,2fr,1.5fr] border-b border-gray-300 pt-4 pb-4 pl-4 hover:bg-gray-100">
                            <div class="flex gap-4">
                                <button class="rounded-full h-10 w-10 bg-pink-500 pr-2 pl-2 text-white text-sm font-semibold">{{$property->title[0]}}</button>
                                <h3 class="text-slate-600 font-semibold">{{$property->title}}</h3>
                            </div>

                            <h3 class="text-slate-400 font-semibold">{{$property->address_line_1}}, {{$property->address_line_2}}, {{$property->pincode}}</h3>
                            <h3 class="text-green-500">active</h3>

                            @if ($property->tenantName !== null)
                                <h3>{{$property->tenantName}}</h3>
                            @else
                                <h3 class="text-green-500">
                                    vacant
                                </h3>
                            @endif
                                    {{-- three dots --}}
                            <div id="three_dots"  class="basis-1/12 flex items-center justify-end pr-10">
                                <button id="dropdownMenuIconButton" data-dropdown-toggle="{{$property->id}}" class="group-hover:bg-gray-100 inline-flex justify-center items-center p-2 text-sm font-medium text-center w-10 h-10 text-gray-900 bg-white rounded-full  focus:outline-none" type="button">
                                    <i class="fa-solid fa-ellipsis"></i>
                                </button>

                                    <!-- Dropdown menu  -->
                                <div id="{{$property->id}}" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44" >
                                    <ul class="py-2 text-sm text-gray-500" aria-labelledby="dropdownMenuIconButton">
                                        <li>
                                            <a href="{{route('showProperties', $property->id)}}" class="block py-2 hover:bg-gray-100 dark:hover:bg-gray-500 dark:hover:text-white text-sm">
                                                <i class="fa-solid fa-eye px-3"></i> View
                                            </a>
                                        </li>

                                        <li>
                                            <a href="{{route('editProperties', $property->id)}}" class="block py-2 hover:bg-gray-100 dark:hover:bg-gray-500 dark:hover:text-white text-sm">
                                                <i class="fa-solid fa-user-pen px-3"></i> Edit
                                            </a>
                                        </li>

                                        <li class="border-t border-gray-300 block py-2 hover:bg-gray-100 dark:hover:bg-gray-500 dark:hover:text-white text-sm" onclick="toggleAssignCaretaker()">
                                                <i class="fa-solid fa-people-roof px-3"></i> Assign care taker
                                        </li>

                                        <li class="block py-2 hover:bg-gray-100 dark:hover:bg-gray-500 dark:hover:text-white text-sm " >
                                            @if ($property->tenantName === null)
                                                <div class="w-full" onclick="toggleAssignTenant({{$property->id}},{{$property->rent}})">
                                                    <i class="fa-solid fa-user-plus px-3"></i> Assign Tenant
                                                </div>
                                            @else
                                                <div class="w-full">
                                                    <form action="{{route('unAssignTenant',$property->id)}}" method="post">
                                                        @csrf
                                                        @method('put')
                                                        <button class="" type="submit">
                                                            <i class="fa-solid fa-user-minus px-3"></i> Unassign Tenant
                                                        </button>
                                                    </form>

                                                </div>
                                            @endif


                                        </li>

                                        <li id="statusIn" onclick="toggleStatus(this)"  class="border-t border-gray-300 block py-2 hover:bg-gray-100 dark:hover:bg-gray-500 dark:hover:text-white text-sm" >
                                                <i class="fa-regular fa-circle-xmark px-3"></i> Inactive
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <!-- popup to assign tenant to a property -->
                            <div id="assignTenantPopup" class="shadow-md shadow-black fixed inset-0 bg-zinc-600 bg-opacity-45 flex items-center justify-center hidden">
                                <div id="assignTenantCard" class="w-[500px] p-6 rounded-md bg-white">
                                    <div class="border-b border-gray-300 mb-4">
                                        <h1 class="text-2xl text-slate-700 p-6 font-semibold">Assign Tenant</h1>
                                    </div>
                                    <form id="assignTenantForm" action="{{route('assignTenant',$property->id)}}" method="post" class="text-slate-600 font-medium">
                                        @csrf
                                        @method('put')

                                        <label for="tenantName">Tenant Name</label>
                                        <select name="tenantName" class="text-gray-400 border rounded w-full py-2 px-3 text-sm">
                                            <option class="text-gray-300" value="" selected>Select a Tenant</option>
                                            @if ($tenants->count()>0)
                                                @foreach ($tenants as $tenant)
                                                    <option class="text-gray-700" value="{{$tenant->id}}">{{$tenant->name}}</option>
                                                @endforeach
                                            @endif

                                        </select>

                                        <label for="rent">Rent</label>
                                        <input type="text" name="rent" id="rent" class="block w-full mt-2 mb-2 rounded-md border text-sm p-2 border-gray-300" placeholder="Rent">

                                        <label for="startDate">Start Date</label>
                                        <input type="date" name="startDate" id="startDate" class="block w-full mt-2 mb-2 rounded-md text-sm p-2 border border-gray-300" placeholder="Start Date">

                                        <label for="endDate">End Date</label>
                                        <input type="date" name="endDate" id="endDate" class="block w-full mt-2 mb-2 rounded-md border p-2 text-sm border-gray-300" placeholder="End Date">

                                        <div class="flex justify-end gap-2 pr-2 mt-4 border-t border-gray-300 pt-3">
                                            <a href="{{route('createTenants')}}"><div id=newTenant class="rounded-md  bg-blue-400 px-3 py-2 hover:bg-blue-700 text-white">+ New Tenant</div></a>
                                            <button id="save" type="submit" class="rounded-md  bg-purple-400 px-3 py-2 hover:bg-purple-700 text-white">✓ Save</button>
                                            <button id="cancel1" type="reset" class="rounded-md  bg-red-400 px-3 py-2 hover:bg-red-700 text-white" onclick="toggleAssignTenant(); resetAssignTenantForm();">✕ Cancel</button>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>



                        <!-- popup to assign caretaker -->
                        <div id="assignCaretakerPopup" class="shadow-md shadow-black fixed inset-0 bg-zinc-600 bg-opacity-45 flex items-center justify-center hidden">
                            <div id="assignCaretakerCard" class="w-[500px] p-6 rounded-md bg-white">
                                <div class="border-b border-gray-300 mb-4">
                                    <h1 class="text-2xl text-slate-700 p-6 font-semibold">Care Taker</h1>
                                </div>
                                <form  action="" class="text-slate-600 font-medium">

                                    <!-- add new caretaker -->
                                    <div id="addNew" class="grid grid-cols-2">
                                        <div class="p-2">
                                            <label for="tenantName">First Name</label>
                                            <input type="text" name="firstName" id="firstName" class="block w-full mt-2 mb-2 rounded-md text-sm border p-2 border-gray-300" placeholder="Enter Caretaker First Name">
                                        </div>

                                        <div class="p-2">
                                            <label for="rent">Last Name</label>
                                            <input type="text" name="lastName" id="lastName" class="block w-full mt-2 mb-2 rounded-md border text-sm p-2 border-gray-300" placeholder="Enter Caretaker Last Name">
                                        </div>

                                        <div class="p-2">
                                            <label for="caretakerEmail">Email</label>
                                            <input type="email" name="cartakerEmail" id="caretakerEmail" class="block w-full mt-2 mb-2 rounded-md text-sm p-2 border border-gray-300" placeholder="Enter Caretaker Email">
                                        </div>

                                        <div class="p-2">
                                            <label for="contactNo">Contact No.</label>
                                            <input type="number" name="contactNo" id="contactNo" class="block w-full mt-2 mb-2 rounded-md border p-2 text-sm border-gray-300" placeholder="Enter Caretaker Contact">
                                        </div>
                                    </div>

                                    <!-- Show list of caretakers -->
                                    <div id="showList" action="" class="text-slate-600 font-medium hidden">
                                        <div class="p-2">
                                            <h1>Select One Caretaker</h1>
                                        </div>
                                        <div class="p-2">
                                            <input type="radio" id="html" name="language" value="HTML">
                                            <label for="html">HTML</label><br>
                                        </div>

                                    </div>

                                    <div class="flex justify-end gap-2 pr-2 mt-4 border-t border-gray-300 pt-3">
                                        <div id="toggleList" class="rounded-md  bg-green-400 px-3 py-2 hover:bg-green-700 text-white" onclick="toggleShowList(this)">≣ Show List</div>
                                        <button id="save" class="rounded-md  bg-purple-400 px-3 py-2 hover:bg-purple-700 text-white">✓ Save</button>
                                        <button id="cancel2" type="reset"  class="rounded-md  bg-red-400 px-3 py-2 hover:bg-red-700 text-white" onclick="toggleAssignCaretaker(); resetAssignCaretakerForm();">✕ Cancel</button>
                                    </div>

                                </form>


                            </div>
                        </div>

                    @endforeach
                @else
                    <div class="flex justify-center pt-2">
                        <p>There are no properties.</p>
                    </div>
                @endif
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>
    <script>

        function toggleStatus(stat){
            if(stat.id === "statusIn"){
                stat.innerHTML = '<i class="fa-regular fa-circle-check px-3"></i> Active'
                stat.id = "statusAc"
            }else {
                stat.innerHTML = '<i class="fa-regular fa-circle-xmark px-3"></i> Inactive'
                stat.id = "statusIn"
            }
        }

        function toggleShowList(ele){
            var eleId = ele.id;

            if(eleId === "toggleList"){
                document.getElementById("addNew").classList.add("hidden");
                document.getElementById("showList").classList.remove("hidden");
                document.getElementById(eleId).innerHTML = "+ Add New"
                document.getElementById(eleId).id = "toggle"
            }else if(eleId === "toggle") {
                document.getElementById("addNew").classList.remove("hidden");
                document.getElementById("showList").classList.add("hidden");
                document.getElementById(eleId).innerHTML = "≣ Show List"
                document.getElementById(eleId).id = "toggleList"
            }
        }

        function toggleAssignTenant(id,rent){
            var popup = document.getElementById("assignTenantPopup");

            var propID = id;

            var form = document.getElementById('assignTenantForm');
            form.action = "{{ route('assignTenant', $property->id) }}".replace({{$property->id}}, propID);
            form.elements['rent'].value = rent;


            if (popup.classList.contains("hidden")) {

                popup.classList.remove("hidden");

                if(!document.getElementById("assignCaretakerPopup").classList.contains("hidden")){
                    document.getElementById("assignCaretakerPopup").classList.add("hidden");
                }


                popup.addEventListener("click", function(event) {

                    if (event.target === popup) {
                        document.getElementById('cancel1').click();
                    }
                });

            } else {
                popup.classList.add("hidden");
            }


        }

        function toggleAssignCaretaker(){
            var popup = document.getElementById("assignCaretakerPopup");

            if (popup.classList.contains("hidden")) {
                popup.classList.remove("hidden");
                if(!document.getElementById("assignTenantPopup").classList.contains("hidden")){
                    document.getElementById("assignTenantPopup").classList.add("hidden");
                }
                popup.addEventListener("click", function(event) {
                    // Check if the clicked element is the div itself
                    if (event.target === popup) {
                        document.getElementById('cancel2').click();
                    }
                });

            } else {
                popup.classList.add("hidden");
            }

        }

        function resetAssignTenantForm(){
            document.getElementById("tenantName").innerHTML = '';
            document.getElementById("startDate").innerHTML = '';
            document.getElementById("endDate").innerHTML = '';
        }

        function resetAssignCaretakerForm(){
            document.getElementById("firstName").innerHTML = '';
            document.getElementById("lastName").innerHTML = '';
            document.getElementById("caretakerEmail").innerHTML = '';
            document.getElementById("contactNo").innerHTML = '';
        }
    </script>
@endsection



