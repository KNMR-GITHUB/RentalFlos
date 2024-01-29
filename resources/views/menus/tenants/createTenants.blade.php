@extends('layouts.mainLayout')
@section('content')
    <div class="flex flex-col p-10">
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
            <form action="{{route('storeTenants')}}" method='post'>
                @csrf
                <div class="border-b border-gray-300">
                    <input class="mb-4" type="text" placeholder="image">
                </div>
                <div class="border-b gap-4 border-gray-300 grid lg:grid-cols-2">
                    <div class="mt-2">
                        <label class="block text-gray-700 font-semibold" for="name">Name</label>
                        <input class="rounded-sm border pl-2 pt-2 pb-2 mt-2 border-gray-300 w-full" type="text" name="name" placeholder="Enter name">
                        @error('name')
                            <span class="text-red-400">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="mt-2">
                        <label class="block text-gray-700 font-semibold" for="contactNo">Contact No.</label>
                        <input class="rounded-sm pl-2 pt-2 pb-2 border mt-2 border-gray-300 w-full" type="number" name="contactNo" placeholder="Enter contact no.">
                        @error('contactNo')
                            <span class="text-red-400">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="mt-2 mb-6">
                        <label class="block text-gray-700 font-semibold" for="email">Contact Email</label>
                        <input class="rounded-sm pl-2 pt-2 pb-2 border mt-2 border-gray-300 w-full" type="email" name="email" placeholder="Enter contact email">
                        @error('email')
                            <span class="text-red-400">{{$message}}</span>
                        @enderror
                    </div>


                </div>
                <div class="border-b gap-4 border-gray-300 grid">
                    <div class="mt-2 mb-6">
                        <label class="block text-gray-700 font-semibold" for="address">Address</label>
                        <textarea class="rounded-sm pl-2 pt-2 pb-2 border mt-2 border-gray-300 w-full" name="address" rows="2" placeholder="Enter full address"></textarea>
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
                <div class="border-b gap-4 border-gray-300 grid">
                    <div class="mt-2 mb-6">
                        <label class="block text-gray-700 font-semibold">File Upload (ID Proof - Aadhaar card, Pan card, Voter Id, License...)</label>
                        <input type="file">

                    </div>
                </div>
                <div>
                    <button class="bg-purple-800 mt-6 px-5 py-2 rounded-md text-white">✓ Save</button>
                </div>
            </form>
        </div>

    </div>


@endsection
