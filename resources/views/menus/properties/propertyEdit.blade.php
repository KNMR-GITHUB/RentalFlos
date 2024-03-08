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
            <form id="file-form" action="{{route('updateProperties',$property->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="grid lg:grid-cols-2 pr-2 pl-2 gap-4 pb-4">
                    <div>
                        <label for="title" class="mt-2 block text-gray-700 text-sm font-semibold mb-2">Title</label>
                        <input type="text" placeholder="Enter property title/name" id="title" name="title" value="{{$property->title}}" class="border rounded w-full py-2 px-3 text-gray-700 text-sm">
                        @error('title')
                            <span class="text-red-400">{{$message}}</span>
                        @enderror
                    </div>

                    <div>
                        <label for="address_1" class="mt-2 block text-gray-700 text-sm font-semibold mb-2">Address 1</label>
                        <input type="text" placeholder="Enter address line-1" id="address_1" name="address_line_1" value="{{$property->address_line_1}}" class="border rounded w-full py-2 px-3 text-gray-700 text-sm">
                        @error('address_line_1')
                            <span class="text-red-400">{{$message}}</span>
                        @enderror
                    </div>

                    <div>
                        <label for="address_2" class="mt-2 block text-gray-700 text-sm font-semibold mb-2">Address 2</label>
                        <input type="text" placeholder="Enter address line-2" id="address_2" name="address_line_2" value="{{$property->address_line_2}}" class="border rounded w-full py-2 px-3 text-gray-700 text-sm">
                        @error('address_line_2')
                            <span class="text-red-400">{{$message}}</span>
                        @enderror
                    </div>

                    <div>
                        <label for="country" class="mt-2 block text-gray-700 text-sm font-semibold mb-2">Country</label>
                        <input type="text" placeholder="Select country" id="country" name="country" value="{{$property->country}}" class="border rounded w-full py-2 px-3 text-gray-700 text-sm">
                        @error('country')
                            <span class="text-red-400">{{$message}}</span>
                        @enderror
                    </div>

                    <div>
                        <label for="state" class="mt-2 block text-gray-700 text-sm font-semibold mb-2">State</label>
                        <input type="text" placeholder="Select state" id="state" name="state" value="{{$property->state}}" class="border rounded w-full py-2 px-3 text-gray-700 text-sm">
                        @error('state')
                            <span class="text-red-400">{{$message}}</span>
                        @enderror
                    </div>

                    <div>
                        <label for="city" class="mt-2 block text-gray-700 text-sm font-semibold mb-2">City</label>
                        <input type="text" placeholder="Select city" id="city" name="city" value="{{$property->city}}" class="border rounded w-full py-2 px-3 text-gray-700 text-sm">
                        @error('city')
                            <span class="text-red-400">{{$message}}</span>
                        @enderror
                    </div>

                    <div>
                        <label for="pincode" class="mt-2 block text-gray-700 text-sm font-semibold mb-2">Pin Code</label>
                        <input type="text" placeholder="Enter pin code" id="pincode" name="pincode" value="{{$property->pincode}}" class="border rounded w-full py-2 px-3 text-gray-700 text-sm">
                        @error('pincode')
                            <span class="text-red-400">{{$message}}</span>
                        @enderror
                    </div>

                    <div>
                        <label for="rent" class="mt-2 block text-gray-700 text-sm font-semibold mb-2">Rent</label>
                        <input type="text" placeholder="Enter rent" id="rent" name="rent" value="{{$property->rent}}" class="border rounded w-full py-2 px-3 text-gray-700 text-sm">
                        @error('rent')
                            <span class="text-red-400">{{$message}}</span>
                        @enderror
                    </div>

                </div>

                <div class="border-t border-b border-gray-300 mt-4 mb-4 pb-4 pr-2 pl-2">
                    <label for="description" class="mt-2 block text-gray-700 text-sm font-semibold mb-2">Description</label>
                        <input type="text" placeholder="Enter description" id="description" name="description" value="{{$property->description}}" class="border rounded w-full py-2 px-3 text-gray-700 text-sm">
                        @error('description')
                            <span class="text-red-400">{{$message}}</span>
                        @enderror
                </div>

                <!--File Upload-->
                <div class="border-b border-gray-300 mb-4 pb-4 pr-2 pl-2">
                    <label for="file_upload" class="mt-2 block text-gray-700 text-sm font-semibold mb-2">File Upload</label>
                    <input type="file" accept="*" placeholder="Choose file" id="file_upload" name="files[]" value="" class="border rounded w-full py-2 px-3 text-gray-700 text-sm" multiple>
                    <br>
                    <!--File Preview-->
                    <div class="flex" id="file-previews"></div>
                        @error('file_upload')
                            <span class="text-red-400">{{$message}}</span>
                        @enderror
                </div>

                <div class="border-b border-gray-300 mb-4 pb-4 pr-2 pl-2">
                    <label for="latitude">latitude</label>
                    <input id='latitude' type="text" placeholder="latitude" name="latitude" class="border rounded w-full py-2 px-3 text-gray-700 text-sm" value={{$property->latitude}}>
                    <label for="longitude">longitude</label>
                    <input id='longitude' type="text" placeholder="longitude" name="longitude" class="border rounded w-full py-2 px-3 text-gray-700 text-sm" value={{$property->longitude}}>
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
        var map;
        var myMarker;
        var x_coor,y_coor;

        @if ($property->latitude === null || $property->longitude === null)
            x_coor = 28.6139;
            y_coor = 77.2090;
        @else
            x_coor = {{ $property->latitude }};
            y_coor = {{ $property->longitude }};
        @endif

        map = L.map('justDoIt').setView([x_coor, y_coor], 12);
        myMarker = L.marker([x_coor, y_coor]);

        // layers
        var osm = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        });

        myMarker.addTo(map)

        map.on('click',function(e) {
            myMarker.setLatLng(e.latlng)

            document.getElementById('latitude').value = e.latlng.lat;
            document.getElementById('longitude').value = e.latlng.lng;
        });

        myMarker.addTo(map);
        osm.addTo(map);

        // file upload
        const fileInput = document.getElementById('file_upload');
        // Get a reference to the file previews container
        const filePreviews = document.getElementById('file-previews');

        // Add event listener to the file input for change event
        fileInput.addEventListener('change', function() {
            // Clear previous previews
            filePreviews.innerHTML = '';

            // Loop through each file selected
            for (const file of this.files) {
                // Create a container for the file preview
                const previewContainer = document.createElement('div');
                previewContainer.classList.add('block', 'items-center', );

                // Create a new image element
                const img = document.createElement('img');
                // Set the file URL as the image source
                const fileName = file.name;
                const fileExtension = fileName.split('.').pop();

                if (fileExtension == 'pdf') {
                    img.src = '/images/pdf-file-format.png';
                }
                else if(fileExtension == 'xls' || fileExtension == 'xlsx'){
                    img.src = '/images/xlsx_icon.png';
                }
                else if(fileExtension == 'doc' || fileExtension == 'docx'){
                    img.src = '/images/word.png';
                }
                else if(fileExtension == 'csv'){
                    img.src = '/images/csv-file.png';
                }
                else {
                    img.src = URL.createObjectURL(file);
                }

                // Set some styles for the image
                img.classList.add('w-36', 'h-36', 'object-cover', 'm-1');

                // Append the image to the preview container
                previewContainer.appendChild(img);

                // Create a new paragraph element for the file name
                const fileNamePara = document.createElement('p');
                fileNamePara.textContent = file.name; // Set the file name as text content
                fileNamePara.classList.add('text-sm', 'text-gray-700', 'ml-1', 'w-36');

                // Append the file name paragraph to the preview container
                previewContainer.appendChild(fileNamePara);

                // Append the preview container to the file previews container
                filePreviews.appendChild(previewContainer);
            }
        });

    </script>

@endsection



