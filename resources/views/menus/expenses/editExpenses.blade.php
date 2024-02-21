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
            <form action="" method='post' enctype="multipart/form-data">
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
                        <input class="rounded-sm p-2 border mt-2 border-gray-300 w-full" type="date" name="date" value="{{$expense->date}}" placeholder="Enter date of occurence of expense">
                        @error('date')
                            <span class="text-red-400">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="mt-2 mb-6">
                        <label class="block text-gray-700 font-semibold" for="amount">Amount</label>
                        <input class="rounded-sm p-2 border mt-2 border-gray-300 w-full" type="number" name="amount" value="{{$expense->amount}}" placeholder="Enter amount of expense">
                        @error('amount')
                            <span class="text-red-400">{{$message}}</span>
                        @enderror
                    </div>


                </div>
                <div class="border-b gap-4 border-gray-300 grid">
                    <div class="mt-2 mb-6">
                        <label class="block text-gray-700 font-semibold" for="expenseDescription">Expense Description</label>
                        <textarea class="rounded-sm p-2 border mt-2 border-gray-300 w-full" name="expenseDescription" rows="2" placeholder="Enter Expense Description">{{$expense->expenseDescription}}</textarea>
                        @error('expenseDescrip')
                            <span class="text-red-400">{{$message}}</span>
                        @enderror
                    </div>

                    <document class="write">{{$expense->expenseDescription}}</document>

                </div>

                <div class="border-b gap-4 border-gray-300 grid">
                    <div class="mt-2 mb-6">
                        <label for='file' class="block text-gray-700 font-semibold">File Upload</label>
                        <input name="file" type="file">

                    </div>
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
        // displays form
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
    </script>

@endsection
