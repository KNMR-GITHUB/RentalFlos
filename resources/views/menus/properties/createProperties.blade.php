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
            <form action="storeProperties" method="post">
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
                        <select name="country" class="border rounded w-full py-2 px-3 text-gray-400 text-sm">
                            <option class="text-gray-400" value="" selected>Select country</option>
                            <option value="India">India</option>
                        </select>
                        @error('country')
                            <span class="text-red-400">{{$message}}</span>
                        @enderror
                    </div>

                    <div>
                        <label for="state" class="mt-2 block text-gray-700 text-sm font-semibold mb-2">State</label>
                        <select name="country" class="border rounded w-full py-2 px-3 text-gray-400 text-sm">
                            <option class="text-gray-400" value="" selected>Select state</option>
                            <option value="Arunachal">Arunachal</option>
                        </select>
                        @error('state')
                            <span class="text-red-400">{{$message}}</span>
                        @enderror
                    </div>

                    <div>
                        <label for="city" class="mt-2 block text-gray-700 text-sm font-semibold mb-2">City</label>
                        <select name="country" class="border rounded w-full py-2 px-3 text-gray-400 text-sm">
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
                        <input type="text" placeholder="Choose file" id="file_upload" name="file_upload" value="{{old('file_upload')}}" class="border rounded w-full py-2 px-3 text-gray-700 text-sm">
                        @error('file_upload')
                            <span class="text-red-400">{{$message}}</span>
                        @enderror
                </div>

                <div class="border-b border-gray-300 mb-4 pb-4 pr-2 pl-2">
                    <label for="map" class="mt-2 block text-gray-700 text-sm font-semibold mb-2">Map</label>
                        <input type="text" placeholder="map" id="map" name="map" value="{{old('map')}}" class="border rounded w-full py-2 px-3 text-gray-700 text-sm">
                        @error('map')
                            <span class="text-red-400">{{$message}}</span>
                        @enderror
                </div>

                <button class="rounded-md bg-purple-800 text-white pt-2 pb-2 pl-5 pr-5">
                    ✓ Save
                </button>
            </form>
        </div>
    </div>


@endsection



