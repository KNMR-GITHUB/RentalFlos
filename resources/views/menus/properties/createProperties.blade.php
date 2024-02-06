@extends('layouts.mainLayout')
@section('content')
    <div class="flex flex-col p-10">
        <div class="flex justify-between">
            <div>
                <h1 class="text-2xl font-semibold">Properties</h1>
                <p class="mt-2 text-gray-400 font-medium">Fill new property details.</p>
            </div>
            <div class="flex items-center">
                <a href="{{route('properties')}}"><button class="bg-purple-800 text-white rounded-md pr-4 pl-4 pt-2 pb-2">← Back</button></a>
            </div>
        </div>
        <div class="bg-white rounded-sm border mt-8 border-gray-300 p-4">
            <form action="storeProperties" method="post" enctype="multipart/form-data">
                @csrf
                <div class="grid lg:grid-cols-2 pr-2 pl-2 gap-4 pb-4">
                    <div>
                        <label for="title" class="mt-2 block text-gray-700 text-sm font-semibold mb-2">Title</label>
                        <input type="text" placeholder="Enter property title/name" id="title" name="title" value="{{old('title')}}" class="border rounded w-full py-2 px-3 text-gray-700 text-sm">
                        @error('title')
                            <span class="text-red-400">{{$message}}</span>
                        @enderror
                    </div>

                    <div>
                        <label for="address_line_1" class="mt-2 block text-gray-700 text-sm font-semibold mb-2">Address 1</label>
                        <input type="text" placeholder="Enter address line-1" id="address_1" name="address_line_1" value="{{old('address_line_1')}}" class="border rounded w-full py-2 px-3 text-gray-700 text-sm">
                        @error('address_line_1')
                            <span class="text-red-400">{{$message}}</span>
                        @enderror
                    </div>

                    <div>
                        <label for="address_line_2" class="mt-2 block text-gray-700 text-sm font-semibold mb-2">Address 2</label>
                        <input type="text" placeholder="Enter address line-2" id="address_1" name="address_line_2" value="{{old('address_line_2')}}" class="border rounded w-full py-2 px-3 text-gray-700 text-sm">
                        @error('address_line_2')
                            <span class="text-red-400">{{$message}}</span>
                        @enderror
                    </div>

                    <div>
                        <label for="country" class="mt-2 block text-gray-700 text-sm font-semibold mb-2">Country</label>
                        <select name="country" class="border rounded w-full py-2 px-3 text-gray-700 text-sm">
                            <option class="text-gray-400" value="" selected>Select country</option>
                            <option value="India" class="text-gray-700 ">India</option>
                        </select>
                        @error('country')
                            <span class="text-red-400">{{$message}}</span>
                        @enderror
                    </div>

                    <div>
                        <label for="state" class="mt-2 block text-gray-700 text-sm font-semibold mb-2">State</label>
                        <select name="state" class="border rounded w-full py-2 px-3 text-gray-700 text-sm">
                            <option class="text-gray-400" value="" selected>Select state</option>
                            <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                        </select>
                        @error('state')
                            <span class="text-red-400">{{$message}}</span>
                        @enderror
                    </div>

                    <div>
                        <label for="city" class="mt-2 block text-gray-700 text-sm font-semibold mb-2">City</label>
                        <select name="city" class="border rounded w-full py-2 px-3 text-gray-700 text-sm">
                            <option class="text-gray-400" value="" selected>Select city</option>
                            <option value="Itanagar">Itanagar</option>
                            <option value="Naharlagun">Naharlagun</option>
                            <option value="Nirjuli">Nirjuli</option>
                            <option value="Doimukh">Doimukh</option>
                        </select>
                        @error('country')
                            <span class="text-red-400">{{$message}}</span>
                        @enderror
                    </div>

                    <div>
                        <label for="pincode" class="mt-2 block text-gray-700 text-sm font-semibold mb-2">Pin Code</label>
                        <input type="text" placeholder="Enter pin code" id="pincode" name="pincode" value="{{old('pincode')}}" class="border rounded w-full py-2 px-3 text-gray-700 text-sm">
                        @error('pincode')
                            <span class="text-red-400">{{$message}}</span>
                        @enderror
                    </div>

                    <div>
                        <label for="rent" class="mt-2 block text-gray-700 text-sm font-semibold mb-2">Rent</label>
                        <input type="text" placeholder="Enter rent" id="rent" name="rent" value="{{old('rent')}}" class="border rounded w-full py-2 px-3 text-gray-700 text-sm">
                        @error('rent')
                            <span class="text-red-400">{{$message}}</span>
                        @enderror
                    </div>

                </div>

                <div class="border-t border-b border-gray-300 mt-4 mb-4 pb-4 pr-2 pl-2">
                    <label for="description" class="mt-2 block text-gray-700 text-sm font-semibold mb-2">Description</label>
                        <input type="text" placeholder="Enter description" id="description" name="description" value="{{old('description')}}" class="border rounded w-full py-2 px-3 text-gray-700 text-sm">
                        @error('description')
                            <span class="text-red-400">{{$message}}</span>
                        @enderror
                </div>

                <div class="border-b border-gray-300 mb-4 pb-4 pr-2 pl-2">
                    <label for="file_upload" class="mt-2 block text-gray-700 text-sm font-semibold mb-2">File Upload</label>
                        <input type="file" accept="*" placeholder="Choose file" id="file_upload" name="file" value="{{old('file_upload')}}" class="border rounded w-full py-2 px-3 text-gray-700 text-sm">
                        @error('file_upload')
                            <span class="text-red-400">{{$message}}</span>
                        @enderror
                </div>
                <div class="border-b border-gray-300 mb-4 pb-4 pr-2 pl-2">
                    <label for="latitude">latitude</label>
                    <input id='latitude' type="number" step="0.0000000000000001" placeholder="latitude" name="latitude" class="border rounded w-full py-2 px-3 text-gray-700 text-sm">
                    <label for="longitude">longitude</label>
                    <input id='longitude' type="number" step="0.0000000000000001" placeholder="longitude" name="longitude" class="border rounded w-full py-2 px-3 text-gray-700 text-sm">
                </div>

                <div id='justDoIt' class="h-80 border-b border-gray-300 mb-4 pb-4 pr-2 pl-2">

                </div>
                <button class="rounded-md bg-purple-800 text-white pt-2 pb-2 pl-5 pr-5">
                    ✓ Save
                </button>
            </form>
        </div>
    </div>

    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    <script>

        // map initialization
        var coordinates;
        var map = L.map('justDoIt').setView([28.6139, 77.2090], 5);

        // layers
        var osm = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        });

        var myMarker = L.marker([28.6139, 77.2090])
        // myMarker.addTo(map) will add the marker (this is a very basic marker)
        myMarker.addTo(map)

        map.on('click',function(e) {
            myMarker.setLatLng(e.latlng)

            document.getElementById('latitude').value = e.latlng.lat;
            document.getElementById('longitude').value = e.latlng.lng;
        });

        myMarker.addTo(map);
        osm.addTo(map);

    </script>

@endsection



