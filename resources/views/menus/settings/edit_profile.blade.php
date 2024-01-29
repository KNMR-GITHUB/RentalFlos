@extends('layouts.mainLayout')
@section('content')
    <div class="flex flex-col p-10">
        <div class="flex justify-between">
            <div>
                <h1 class="text-3xl font-semibold">User Profile</h1>
                <p class="mt-2 text-gray-400 font-medium">Manage user profile details</p>
            </div>
            <div class="group flex items-center gap-4 ">
                <a href="{{route('settings')}}"><button class="hover:bg-slate-600 hover:text-white bg-white text-gray-500 text-sm border border-gray-300 rounded-md px-5 py-2">← Back</button></a>
            </div>

        </div>
        <div class="bg-white grid rounded-sm p-6 border border-gray-300 mt-8">
            <form action="{{route('updateUsers',Auth::user()->id)}}" method='post'>
                @csrf
                <div class="border-b border-gray-300">
                    <input class="mb-4" type="text" placeholder="image">
                </div>
                <div class="border-b gap-4 border-gray-300 grid lg:grid-cols-2">
                    <div class="mt-2">
                        <label class="block text-gray-700 font-semibold" for="lname">Last Name</label>
                        <input class="rounded-sm p-3 border mt-2 border-gray-300 w-full" type="text" name="lname" value="{{Auth::user()->lname}}">
                        @error('lname')
                            <span class="text-red-400">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="mt-2">
                        <label class="block text-gray-700 font-semibold" for="fname">First Name</label>
                        <input class="rounded-sm p-3 border mt-2 border-gray-300 w-full" type="text" name="fname" value="{{Auth::user()->fname}}">
                        @error('fname')
                            <span class="text-red-400">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="mt-2 mb-6">
                        <label class="block text-gray-700 font-semibold" for="email">Email Address</label>
                        <input class="rounded-sm p-3 border mt-2 border-gray-300 w-full" type="text" name="email" value="{{Auth::user()->email}}">
                        @error('email')
                            <span class="text-red-400">{{$message}}</span>
                        @enderror
                    </div>

                </div>
                <div>
                    <button class="bg-purple-800 mt-6 px-5 py-2 rounded-md text-white">✓ Save</button>
                </div>
            </form>
        </div>

    </div>


@endsection
