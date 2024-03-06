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
                    <h3 onclick="display('location', 'locationTitle')" class=" hover:text-blue-500"><i class="fa-regular fa-file"></i> Location</h3>
                </div>

            </div>
            <div id='details' class="grid mt-6 border border-gray-300 md:grid-cols-[1fr,2fr] lg:grid-cols-[1fr,3fr] grid-cols-2">
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
                <div class="flex items-center p-3 text-slate-400 font-bold border border-gray-300">
                    @if ($caretaker !== null)
                        {{$caretaker->fname}} {{$caretaker->lname}}
                    @endif
                </div>
                <div class="flex items-center p-3 text-slate-400 font-bold border border-gray-300">Care Taker Contact</div>
                <div class="flex items-center p-3 text-slate-400 font-bold border border-gray-300">
                    @if ($caretaker !== null)
                        {{$caretaker->contactNo}}
                    @endif
                </div>
                <div class="flex items-center p-3 text-slate-400 font-bold border border-gray-300">Care Taker Email</div>
                <div class="flex items-center p-3 text-slate-400 font-bold border border-gray-300">
                    @if ($caretaker !== null)
                        {{$caretaker->email}}
                    @endif
                </div>
                <div class="flex items-center p-3 text-slate-400 font-bold border border-gray-300">Property Tenant</div>
                <div class="flex items-center p-3 text-slate-400 font-bold border border-gray-300">
                    @if ($property->tenantName !== null)
                        {{$property->tenantName}}
                    @endif
                </div>


            </div>
            <div  id="attachments" class="hidden mt-6">
                @if ($property->file !== null)
                    @php
                        $unserializeThis = $property->file;
                        $list = unserialize($unserializeThis);
                    @endphp
                    <div class="flex flex-cols gap-4">
                        @for ($i = 0; $i < count($list); $i++)
                            @php
                                $path = $list[$i];
                                $info = pathInfo($path);
                                $extension = $info['extension'];
                                $hello = str_replace('/','_',$path)
                            @endphp

                            @if ($extension == 'xlsx')

                                <div class="flex">
                                    <a href="{{route('downloadPropertiesFile',['propId' => $property->id, 'fileName' => $hello])}}"><img src="/images/xlsx_icon.png"  class= "h-[150px] w-[150px]" alt=""></a>
                                </div>
                            @else
                                <div class="flex">
                                    <img src="/storage/{{$list[$i]}}" class= "h-[150px] w-[150px] cursor-pointer image" alt="">
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


                @endif
            </div>
            <div  id="location" class="hidden h-[500px] mt-6 col-span-2 mb-4 border-t border-gray-300" >
                <div id='justDoIt' class="h-[500px] w-full  ">

                </div>
            </div>


        </div>
    </div>

    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>

    <script>
        // page navigation
        var listOfItems = ['details','attachments','location']
        var listOfTitles = ['detailsTitle', 'attachmentsTitle','locationTitle']
        var mapInitialized = 0;

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

            if (id === 'location' && mapInitialized === 0){
                @if ($property->latitude === null || $property->longitude === null)
                    document.getElementById('location').innerHTML = "<h1 class='flex justify-center'>No location set yet.</h1>"
                    document.getElementById('location').classList.remove('h-[500px]')
                @else
                    // map initialization
                    var map = L.map('justDoIt').setView([{{$property->latitude}}, {{$property->longitude}}], 15);

                    // layers
                    var osm = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
                    });

                    var myMarker = L.marker([{{$property->latitude}}, {{$property->longitude}}])
                    // myMarker.addTo(map) will add the marker (this is a very basic marker)
                    myMarker.addTo(map);

                    osm.addTo(map);
                @endif

                mapInitialized = 1;
            }
        }


        // Get all images with the 'image' class
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


    </script>

@endsection
