@extends('layouts.mainLayout')
@section('content')
    <div class="flex flex-col p-8">
        <div class="flex justify-between">
            <div>
                <h1 class="text-3xl text-slate-600 font-semibold">Dashboard</h1>
                <p class="mt-2 text-slate-400">Monthly statics.</p>
            </div>
            <div class="flex items-center gap-4">
                <a href="">
                    <button class="bg-white text-slate-600 font-semibold text-sm rounded-md pr-4 pl-4 pt-2 pb-2 border border-gray-300">
                        <i class="fa-regular fa-calendar-days"></i>
                        Last 30 days >
                    </button>
                </a>
            </div>
        </div>
        <div class="flex flex-col justify-evenly rounded-sm mt-8">
            <div class="grid gap-y-4">
                <div class="grid text-lg gap-4 text-gray-800 font-semibold lg:grid-cols-2">
                    <div class="bg-white rounded-sm p-4 h-36 border border-gray-300  text-slate-600 font-semibold">
                        <h1 class="px-2">Active Properties</h1>
                        <div class="h-20 flex">
                            <div class="p-4 text-3xl flex justify-center items-center">{{$property->count()}}</div>
                            <canvas id="propActive" class="h-100% pt-4"></canvas>
                        </div>
                    </div>
                    <div class="bg-white rounded-sm h-36 p-3 border border-gray-300 text-slate-600 font-semibold">
                        <h1 class="px-2">Active Tenants</h1>
                        <div class="h-20 flex">
                            <div class="p-4 text-3xl flex justify-center items-center">{{$tenant->count()}}</div>
                            <canvas id="tentActive" class="h-100% pt-4"></canvas>
                        </div>
                    </div>
                </div>
                <div class="grid gap-4 grid-cols-1 lg:grid-cols-3">
                    <div class="bg-white rounded-sm border col-span-2 border-gray-300 p-3 text-slate-600 font-semibold">
                        <h3>Rent Collection 2024 (₹ 0)</h3>
                        <div class="p-6 w-full h-full">
                            <canvas id="rentG" class="p-4 w-full"></canvas>
                        </div>
                    </div>
                    <div id="doughnut" class="bg-white flex flex-col rounded-sm w-full border border-gray-300 text-slate-600 font-semibold">
                        <h3 class="p-4">Rent Collection (0)</h3>
                        <div class="w-full h-full">
                            <canvas id="circle" class="p-4 w-full"></canvas>
                        </div>
                    </div>
                    <div class="flex flex-col bg-white rounded-sm border col-span-2 border-gray-300 text-slate-600 font-semibold">
                        <h1 class="py-4 pl-6 border-b border-gray-300">Last Five Transaction</h1>
                        <div class="flex flex-col">
                            <div class="grid grid-cols-[2fr,1fr,1fr,2fr,1fr,1fr] border-b border-gray-300">
                                <div class="pl-6 py-3 text-sm"><h3>Property</h3></div>
                                <div class="pl-3 py-3 text-sm"><h3>Tenant</h3></div>
                                <div class="pl-3 py-3 text-sm"><h3>Date</h3></div>
                                <div class="pl-3 py-3 text-sm"><h3>Amount</h3></div>
                                <div class="pl-3 py-3 text-sm"><h3>Status</h3></div>
                                <div class="pl-3"></div>
                            </div>
                        </div>
                    </div>
                    <div class="grid bg-white rounded-sm border border-gray-300 text-slate-600 font-semibold">
                        <div class="flex justify-between border-b border-gray-300 p-4">
                            <h1 class="">New Tenants</h1>
                            <h3 class="text-blue-700"><a href="{{route('tenants')}}">View All</a></h3>
                        </div>
                        <div class='flex flex-col'>
                            <p class='hidden'>{{$count=0}}</p>
                            @foreach ($tenant as $ten)

                                <div class="flex justify-between gap-4 p-4 text-slate-400">
                                    <div class='flex gap-3'>
                                        <div class="w-15">
                                            <div class="h-10 w-10 rounded-full border border-gray-300 overflow-hidden">
                                                @if ($ten->image === null)
                                                    <button class="rounded-full bg-pink-500 h-10 w-10 text-white text-sm font-semibold">
                                                        {{$ten->name[0]}}
                                                    </button>
                                                @else
                                                    <img class="object-cover h-10 w-10" src="/storage/{{($ten->image)}}" alt="">
                                                @endif
                                            </div>
                                        </div>

                                        <div>
                                            <h3 class="text-slate-600 font-medium">{{$ten->name}}</h3>
                                            <h4 class="text-sm">{{$ten->email}}</h4>
                                        </div>
                                    </div>


                                    <div class="basis-1/12 flex items-center justify-end">
                                        <button id="dropdownMenuIconButton" data-dropdown-toggle="{{$ten->id}}" class="group-hover:bg-gray-100 inline-flex justify-center items-center p-2 text-sm font-medium text-center w-10 h-10 text-gray-900 bg-white rounded-full  focus:outline-none" type="button">
                                            <i class="fa-solid fa-ellipsis"></i>
                                        </button>

                                            <!-- Dropdown menu  -->
                                        <div id="{{$ten->id}}" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44">
                                            <ul class="py-2 text-sm text-gray-500" aria-labelledby="dropdownMenuIconButton">
                                                <li>
                                                    <a href="{{route('showTenants', $ten->id)}}" class="block py-2 hover:bg-gray-100 dark:hover:bg-gray-500 dark:hover:text-white text-sm">
                                                        <i class="fa-solid fa-eye px-3"></i> View
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <p class="hidden">{{$count++}}</p>
                                @if ($count === 5)
                                    @break
                                @endif

                            @endforeach
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.1/dist/chart.umd.min.js"></script>
    <script >

                const prop = document.getElementById('propActive');
                const tent = document.getElementById('tentActive');
                const nut = document.getElementById('circle');
                const rent = document.getElementById('rentG');


                var propChart = new Chart(prop, {
                    type: 'bar',
                    data: {
                    labels: ['Active'],
                    datasets: [{
                        label: 'Active Properties',
                        data: [{{$property->count()}}],
                        backgroundColor: [
                            'rgba(250, 247, 200, 0.2)',
                        ],
                        borderColor: [
                            'rgba(237, 227, 74)',
                        ],
                        borderWidth: 1
                    }]
                    },
                    options: {
                        plugins: {
                                legend: {
                                display: false,
                            }
                        },


                        scales: {
                            x: {
                                display: false,
                                grid: {
                                    drawBorder: false
                                }
                            },

                            y: {
                                display: false,
                                beginAtZero: true,
                                grid: {
                                    drawOnChartArea: false,
                                    drawBorder: false
                                }

                            }
                        }
                    }
                });

                var tentChart = new Chart(tent, {
                    type: 'bar',
                    data: {
                    labels: ['Active'],
                    datasets: [{
                        label: 'Active Tenants',
                        data: [{{$tenant->count()}}],
                        backgroundColor: [
                            'rgba(250, 247, 200, 0.2)',
                        ],
                        borderColor: [
                            'rgba(237, 227, 74)',
                        ],
                        borderWidth: 1
                    }]
                    },
                    options: {
                        plugins: {
                                legend: {
                                display: false,
                            }
                        },


                        scales: {
                            x: {
                                display: false,
                                grid: {
                                    drawBorder: false
                                }
                            },

                            y: {
                                display: false,
                                beginAtZero: true,
                                grid: {
                                    drawOnChartArea: false,
                                    drawBorder: false
                                }

                            }
                        }
                    }
                });

                var nutChart = new Chart(nut, {
                    type: 'doughnut',
                    data: {
                        labels: ["Collected", "Not Collected",],
                        datasets: [{

                        data: [20, 40,],
                        backgroundColor: ['rgba(120, 21, 138, 0.6)', 'rgba(17, 96, 242, 0.7)',],
                        hoverOffset: 5
                        }],
                    },
                    options: {

                    },
                });
                const DATA_COUNT = 12;
                const randomData = Array.from({ length: DATA_COUNT }, () => Math.floor(Math.random() * 10000000));
                var rentChart = new Chart(rent, {
                    type: 'line',
                    data: {
                        labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                        datasets: [{
                            label: 'Rent',
                            data: randomData,
                            borderColor: 'red',
                            backgroundColor: 'red',
                        }],
                    },
                    options: {

                    },
                });

    </script>

@endsection
