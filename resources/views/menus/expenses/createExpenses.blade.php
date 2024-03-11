@extends('layouts.mainLayout')
@section('content')
    <div class="flex flex-col p-10 h-full">
        <div class="flex justify-between">
            <div>
                <h1 class="text-3xl text-gray-600 font-semibold">Expenses</h1>
                <p class="mt-2 text-gray-400 font-medium">Fill new expense details</p>
            </div>
            <div class="group flex items-center gap-4 ">
                <a href="{{route('expenses')}}"><button class="hover:bg-slate-600 hover:text-white bg-white text-gray-500 text-sm border border-gray-300 rounded-md px-5 py-2">← Back</button></a>
            </div>

        </div>
        <div class="bg-white grid rounded-sm p-6 border border-gray-300 mt-8">
            <form action="{{route('storeExpenses')}}" method='post' enctype="multipart/form-data" multiple>
                @csrf

                <div class="border-b gap-4 border-gray-300 grid lg:grid-cols-2">

                    <div class="mt-2 mb-6">
                        <label class ="block text-gray-700 font-semibold" for="propertyName">Property</label>
                        <select name="propertyName" class="rounded-sm p-2 border mt-2 border-gray-300 w-full">
                            <option class="text-gray-300 p-2" value="" selected>Select a Property</option>
                                @if ($property->count()>0)
                                    @foreach ($property as $prop)
                                        <option class="text-gray-700" value="{{$prop->id}}">{{$prop->title}}</option>
                                    @endforeach
                                @else
                                    <h1>There are no properties added yet.</h1>
                                @endif

                        </select>
                    </div>


                    <div class="mt-2 mb-6">
                        <div class ="flex justify-between  text-gray-700 font-semibold">
                            <label for="expenseType">Expense Type</label>
                            <div class="rounded-sm text-white bg-purple-600 px-2 text-sm hover:cursor-pointer" onclick="addExpenseType()">+ Add New Expense</div>
                        </div>

                        <select name="expenseType" class="rounded-sm p-2 border mt-2 border-gray-300 w-full">
                            <option class="text-gray-300" value="" selected>Select an expense</option>
                            @if ($expenseType->count()>0)
                                @foreach ($expenseType as $expense)
                                    <option class="text-gray-700" value="{{$expense->name}}">{{$expense->name}}</option>
                                @endforeach
                            @else
                                <h1>There are no expenses added yet.</h1>
                            @endif

                        </select>
                    </div>

                    <div class="mt-2 mb-6">
                        <label class="block text-gray-700 font-semibold" for="date">Date</label>
                        <input class="rounded-sm p-2 border mt-2 border-gray-300 w-full" type="date" name="date" value="{{old('date')}}" placeholder="Enter date of occurence of expense">
                        @error('date')
                            <span class="text-red-400">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="mt-2 mb-6">
                        <label class="block text-gray-700 font-semibold" for="amount">Amount</label>
                        <input class="rounded-sm p-2 border mt-2 border-gray-300 w-full" type="number" name="amount" value="{{old('amount')}}" placeholder="Enter amount of expense">
                        @error('amount')
                            <span class="text-red-400">{{$message}}</span>
                        @enderror
                    </div>


                </div>
                <div class="border-b gap-4 border-gray-300 grid">
                    <div class="mt-2 mb-6">
                        <label class="block text-gray-700 font-semibold" for="expenseDescription">Expense Description</label>
                        <textarea class="rounded-sm p-2 border mt-2 border-gray-300 w-full" name="expenseDescription" rows="2" placeholder="Enter Expense Description">{{old('expenseDescrip')}}</textarea>
                        @error('expenseDescrip')
                            <span class="text-red-400">{{$message}}</span>
                        @enderror
                    </div>

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
                <div>
                    <button class="bg-purple-800 mt-6 px-5 py-2 rounded-md text-white">✓ Save</button>
                </div>
            </form>
        </div>

        {{-- popup to add expense type --}}
        <div id="popup-container" class="shadow-md shadow-black fixed inset-0 bg-zinc-600 bg-opacity-45 flex items-center justify-center hidden">
            <div id="form" class="bg-white pt-6 px-6 pb-4 rounded-lg w-card_width">
                <h2 class="text-lg flex text-slate-600 font-bold" > New Expense Type</h2>
                <div class="mt-4 pt-4 border-t border-gray-300">
                    <form action="{{route('expenseList')}}" method="post" >
                        @csrf
                        <div>
                            <label for="name" class="text-slate-600 font-semibold">Expense Type</label>
                            <input id="name" class="py-2 px-4 block mt-2 mb-4 shadow-sm border border-gray-300 rounded-sm w-full text-sm" type="text" name="name" placeholder="Enter New Expense Type" required>

                        </div>

                        <div class="flex flex-row gap-6 border-t border-gray-300 pt-4 mt-8 justify-between" >
                            <button class="bg-green-300 rounded-md text-white px-6 py-2 hover:bg-green-700 hover:text-black" type="submit">Save</button>
                        </div>

                    </form>
                </div>

            </div>
        </div>
        {{-- popup ends --}}

    </div>

    <script>

        //
        // displays add expense type form
        //

        function addExpenseType() {
            var popup = document.getElementById("popup-container");
            if (popup.classList.contains("hidden")) {
                popup.classList.remove("hidden");
            } else {
                popup.classList.add("hidden");
            }
        }

        var popupContainer = document.getElementById("popup-container");
        popupContainer.addEventListener("click", function(event) {
            // Check if the clicked element is the div itself
            if (event.target === popupContainer) {
                addExpenseType();
            }
        });

        //
        // File Upload
        //

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
