@extends('layouts.mainLayout')
@section('content')
    <div class="flex flex-col p-10">
        <div class="flex justify-between">
            <div>
                <h1 class="text-2xl text-slate-600 font-bold">Tenants</h1>
                <p class="mt-2 text-slate-400">All details of tenant provided by owner.</p>
            </div>
            <div class="fleitems-center p-3 gap-4">
                <a href="{{route('tenants')}}"><button class="bg-white text-slate-400 rounded-md border border-gray-300 pr-4 pl-4 pt-2 pb-2 hover:bg-gray-600 hover:text-white">← Back</button></a>
            </div>
        </div>
        <div class="flex flex-col justify-evenly bg-white rounded-sm border mt-8 border-gray-300 p-4">
            <div class="flex gap-6 border-b border-gray-300">
                <div id="detailsTitle" class="py-3 text-blue-600 border-b-2 border-blue-600">
                    <h3 onclick="display('details', 'detailsTitle')" class=" hover:text-blue-500 h-full"><i class="fa-regular fa-user"></i> Personal</h3>
                </div>
                <div id="attachmentsTitle" class="py-3">
                    <h3 onclick="display('attachments', 'attachmentsTitle')" class=" hover:text-blue-500"><i class="fa-regular fa-file"></i> Attachments</h3>
                </div>

            </div>
            <div id='details' class="grid mt-6 border border-gray-300 md:grid-cols-[1fr,1fr] grid-cols-2">
                <div class="flex items-center p-3 text-slate-400 font-bold border border-gray-300">Tenant ID</div>
                <div class="flex items-center p-3 text-slate-400 font-bold border border-gray-300">{{$tenant->id}}</div>
                <div class="flex items-center p-3 text-slate-400 font-bold border border-gray-300">Tenant Name</div>
                <div class="flex items-center p-3 text-slate-400 font-bold border border-gray-300">{{$tenant->name}}</div>
                <div class="flex items-center p-3 text-slate-400 font-bold border border-gray-300">Contact No</div>
                <div class="flex items-center p-3 text-slate-400 font-bold border border-gray-300">{{$tenant->contactNo}}</div>
                <div class="flex items-center p-3 text-slate-400 font-bold border border-gray-300">Email address</div>
                <div class="flex items-center p-3 text-slate-400 font-bold border border-gray-300">{{$tenant->email}}</div>
                <div class="flex items-center p-3 text-slate-400 font-bold border border-gray-300">Rent</div>
                <div class="flex items-center p-3 text-slate-400 font-bold border border-gray-300">
                    @if ($tenant->rent !== null)
                        {{$tenant->rent}}
                    @endif
                </div>
                <div class="flex items-center p-3 text-slate-400 font-bold border border-gray-300">Address</div>
                <div class="flex items-center p-3 text-slate-400 font-bold border border-gray-300">{{$tenant->address}}</div>
                <div class="flex items-center p-3 text-slate-400 font-bold border border-gray-300">Property</div>
                <div class="flex items-center p-3 text-slate-400 font-bold border border-gray-300">
                    @if ($tenant->propertyName !== null)
                        {{$tenant->propertyName}}
                    @endif
                </div>
                <div class="flex items-center p-3 text-slate-400 font-bold border border-gray-300">Start Date</div>
                <div class="flex items-center p-3 text-slate-400 font-bold border border-gray-300">
                    @if ($tenant->startDate !== null)
                        {{$tenant->startDate}}
                    @endif
                </div>
                <div class="flex items-center p-3 text-slate-400 font-bold border border-gray-300">End Date</div>
                <div class="flex items-center p-3 text-slate-400 font-bold border border-gray-300">
                    @if ($tenant->endDate !== null)
                        {{$tenant->endDate}}
                    @endif
                </div>


            </div>
            <div  id="attachments" class="hidden mt-6">
                @if ($tenant->file !== null)
                    @php
                        $unserializeThis = $tenant->file;
                        $list = unserialize($unserializeThis);
                    @endphp
                    <div class="flex gap-4">
                        @for ($i = 0; $i < count($list); $i++)
                            @php
                                $path = $list[$i];
                                $info = pathInfo($path);
                                $extension = $info['extension'];
                                $hello = str_replace('/','_',$path);
                                $fileName = explode('file/',$path);
                            @endphp

                            @if ($extension == 'xlsx')

                                <div class="block">
                                    <a href="{{route('downloadPropertiesFile',['propId' => $tenant->id, 'fileName' => $hello])}}"><img src="/images/xlsx_icon.png"  class= "h-[150px] w-[150px]" alt=""></a>
                                    <p>{{$fileName[1]}}</p>
                                </div>
                            @elseif ($extension == 'pdf')
                                <div class="block">
                                    <a href="{{route('downloadPropertiesFile',['propId' => $tenant->id, 'fileName' => $hello])}}"><img src="/images/pdf-file-format.png"  class= "h-[150px] w-[150px]" alt=""></a>
                                    <p>{{$fileName[1]}}</p>
                                </div>
                            @elseif ($extension == 'csv')
                                <div class="block">
                                    <a href="{{route('downloadPropertiesFile',['propId' => $tenant->id, 'fileName' => $hello])}}"><img src="/images/csv-file.png"  class= "h-[150px] w-[150px]" alt=""></a>
                                    <p>{{$fileName[1]}}</p>
                                </div>
                            @elseif ($extension == 'doc' || $extension == 'docx')
                                <div class="block">
                                    <a href="{{route('downloadPropertiesFile',['propId' => $tenant->id, 'fileName' => $hello])}}"><img src="/images/word.png"  class= "h-[150px] w-[150px] px-4" alt=""></a>
                                    <p>{{$fileName[1]}}</p>
                                </div>
                            @else
                                <div class="block w-[150px]">
                                    <img src="/storage/{{$list[$i]}}" class= "h-[150px] w-[150px] cursor-pointer image" alt="">
                                    <p>{{$fileName[1]}}</p>
                                </div>
                            @endif

                        @endfor
                    </div>
                    <!-- The modal -->
                    <div id="myModal" class="modal fixed w-full h-full top-0 left-0 flex justify-center items-center bg-black bg-opacity-75 overflow-hidden hidden">
                        <!-- Button to close the modal -->
                        <span class="close absolute top-4 right-4 text-white text-3xl cursor-pointer">&times;</span>

                        <!-- Contents of the modal, i.e., images -->
                        <div class="modal-content max-w-[80%] h-[80vh] relative">
                            <!-- Image container -->
                            <div class="w-full h-full flex justify-center items-center">

                                <img id="modalImage" class="max-w-full max-h-full object-contain" />
                            </div>
                            <!-- Div that has the preview images of previous and next images, if any -->
                            <div id="previewImages" class="flex justify-center items-center mt-4"></div>
                        </div>
                        <span class="left absolute left-10 top-1/2 text-white"><i class="fa-solid fa-arrow-left-long text-6xl cursor-pointer" onclick="prevImage()"></i></span>
                        <span class="right absolute right-10 top-1/2 text-white"><i class="fa-solid fa-arrow-right-long text-6xl cursor-pointer" onclick="nextImage()"></i></span>
                    </div>


                @else
                    <div class="flex justify-center">
                        <p>No attachments.</p>
                    </div>

                @endif
            </div>


        </div>
    </div>

<script>
        //
        // page navigation starts
        //
        var listOfItems = ['details','attachments']
        var listOfTitles = ['detailsTitle', 'attachmentsTitle']

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

        //
        // page navigation ends
        //

        //
        // file download/image display
        // Get all images with the 'image' class
        //
        var images = document.querySelectorAll('.image');

        if (images !== null) {
            // Get the modal
        var modal = document.getElementById("myModal");

        // Get the modal content (image)
        var modalImg = document.getElementById("modalImage");

        // Get the index of the current image
        var currentIndex = 0;

        // For each image, add a click event listener
        images.forEach(function(image, index) {
            image.addEventListener('click', function() {
                // Set the source of the modal image to the clicked image source
                modalImg.src = this.src;
                // Show the modal
                modal.classList.remove("hidden");
                // Set the current index
                currentIndex = index;
                // Update preview images
                updatePreviewImages();
            });
        });

        // Get the <span> element that closes the modal
        var span = document.querySelector(".close");

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
            modal.classList.add("hidden");
        }

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.classList.add("hidden");
            }
        }

        // Listen for arrow key presses
        document.addEventListener('keydown', function(event) {
            if (!modal.classList.contains('hidden')) {
                if (event.key === 'ArrowLeft') {
                    // Go to the previous image
                    prevImage();
                } else if (event.key === 'ArrowRight') {
                    // Go to the next image
                    nextImage();
                }
            }
        });

            // Get the preview images container
            var previewImagesContainer = document.getElementById("previewImages");

            // Create and append preview images
            function updatePreviewImages() {
                // Clear previous preview images
                previewImagesContainer.innerHTML = "";

                // Show preview images of previous and next images
                for (var i = Math.max(0, currentIndex - 1); i <= Math.min(images.length - 1, currentIndex + 1); i++) {
                    var previewImage = document.createElement('img');
                    previewImage.src = images[i].src;
                    previewImage.classList.add('h-12', 'w-12', 'object-cover', 'cursor-pointer', 'mx-1', 'border', 'border-gray-300');

                    // Highlight the current image
                    if (i === currentIndex) {
                    previewImage.classList.add('border-blue-500');
                    }

                    // Add click event to change main image
                    previewImage.addEventListener('click', function() {
                    modalImg.src = this.src;
                    currentIndex = Array.from(previewImagesContainer.children).indexOf(this);
                    updatePreviewImages();
                    });

                    previewImagesContainer.appendChild(previewImage);
                }
            }

            // Get the previous image
            function prevImage() {
                currentIndex = (currentIndex - 1 + images.length) % images.length;
                modalImg.src = images[currentIndex].src;
                updatePreviewImages();
            }

            // Get the next image
            function nextImage() {
                currentIndex = (currentIndex + 1) % images.length;
                modalImg.src = images[currentIndex].src;
                updatePreviewImages();
            }
        }

        //
        //
        //
</script>
@endsection
