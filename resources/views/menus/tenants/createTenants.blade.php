@extends('layouts.mainLayout')
@section('content')
    <div class="flex flex-col p-10 h-full">
        <div class="flex justify-between">
            <div>
                <h1 class="text-3xl text-gray-600 font-semibold">Tenants</h1>
                <p class="mt-2 text-gray-400 font-medium">Fill new tenants details</p>
            </div>
            <div class="group flex items-center gap-4 ">
                <a href="{{route('tenants')}}"><button class="hover:bg-slate-600 hover:text-white bg-white text-gray-500 text-sm border border-gray-300 rounded-md px-5 py-2">← Back</button></a>
            </div>

        </div>
        <div class="bg-white grid rounded-sm p-6 border border-gray-300 mt-8">
            <form action="{{route('storeTenants')}}" method='post' enctype="multipart/form-data" multiple>
                @csrf
                <div class="flex flex-col justify-center items-center pb-6">
                    <div class="rounded-full h-36 w-36 flex justify-center items-center bg-white shadow-md mb-6">
                        <div class="rounded-full overflow-hidden w-32 h-32 flex justify-center items-end bg-blue-300" style="background-image:url('/images/user-solid.svg'); background-position:center;">
                            <img class="h-32 w-32" src="/images/user-solid.svg" alt="">
                        </div>
                    </div>
                    <input name="image" value="{{old('image')}}" class="border border-gray-300" accept="image/*" type="file" placeholder="image">
                </div>
                <div class="border-b gap-4 border-gray-300 grid lg:grid-cols-2">
                    <div class="mt-2">
                        <label class="block text-gray-700 font-semibold" for="name">Name</label>
                        <input class="rounded-sm border pl-2 pt-2 pb-2 mt-2 border-gray-300 w-full" type="text" name="name" value="{{old('name')}}" placeholder="Enter name">
                        @error('name')
                            <span class="text-red-400">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="mt-2">
                        <label class="block text-gray-700 font-semibold" for="contactNo">Contact No.</label>
                        <input class="rounded-sm pl-2 pt-2 pb-2 border mt-2 border-gray-300 w-full" type="number" name="contactNo" value="{{old('contactNo')}}"  placeholder="Enter contact no.">
                        @error('contactNo')
                            <span class="text-red-400">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="mt-2 mb-6">
                        <label class="block text-gray-700 font-semibold" for="email">Contact Email</label>
                        <input class="rounded-sm pl-2 pt-2 pb-2 border mt-2 border-gray-300 w-full" type="email" name="email" value="{{old('email')}}" placeholder="Enter contact email">
                        @error('email')
                            <span class="text-red-400">{{$message}}</span>
                        @enderror
                    </div>


                </div>
                <div class="border-b gap-4 border-gray-300 grid">
                    <div class="mt-2 mb-6">
                        <label class="block text-gray-700 font-semibold" for="address">Address</label>
                        <textarea class="rounded-sm pl-2 pt-2 pb-2 border mt-2 border-gray-300 w-full" name="address" rows="2" placeholder="Enter full address">{{old('address')}}</textarea>
                        @error('address')
                            <span class="text-red-400">{{$message}}</span>
                        @enderror
                    </div>

                </div>
                <div class="border-b gap-4 border-gray-300 grid">
                    <div class="mt-2 mb-6 flex items-center justify-between">
                        <label class=" text-gray-700 font-semibold">Add members</label>
                        <a class="bg-purple-800 mt-6 px-5 py-2 rounded-md text-white"> +</a>
                    </div>
                </div>

                <!--File Upload-->
                <div class="border-b border-gray-300 mb-4 pb-4 pr-2 pl-2">
                    <label for="file_upload" class="mt-2 block text-gray-700 text-sm font-semibold mb-2">File Upload (ID Proof - Aadhaar card, Pan card, Voter Id, License...)</label>
                    <input type="file" accept="*" placeholder="Choose file" id="file_upload" name="files[]" value="" class="border rounded w-full py-2 px-3 text-gray-700 text-sm" multiple>
                    <br>
                    <!--File Preview-->
                    <div class="flex" id="file-previews"></div>
                        @error('file_upload')
                            <span class="text-red-400">{{$message}}</span>
                        @enderror
                </div>
                <div>
                    <button class="bg-purple-800 mt-6 px-5 py-2 rounded-md text-white">✓ Save</button>
                </div>
            </form>
        </div>

    </div>

<script>
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
