@extends('layouts.mainLayout')
@section('content')
    <div class="flex flex-col p-10">
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
                <div class="grid text-lg gap-4 h-36 text-gray-800 font-semibold lg:grid-cols-2">
                    <div class="bg-white rounded-sm p-4 h-36  text-slate-600 font-semibold">
                        <h1>Active Properties</h1>
                        <div class="h-20 flex">
                            <div class="p-4 text-3xl flex justify-center items-center">{{$property->count()}}</div>
                            <canvas id="propActive" class="h-100% pt-4"></canvas>
                        </div>
                    </div>
                    <div class="bg-white rounded-sm h-36 p-3 text-slate-600 font-semibold">
                        <h1>Active Tenants</h1>

                        <canvas id="chart2"></canvas>
                    </div>
                </div>
                <div class="grid gap-4  lg:grid-cols-[2fr,1fr] hidden">
                    <div class="bg-white  rounded-sm h-12 p-3 text-slate-600 font-semibold">
                        <h3>Rent Collection 2024 (₹ 0)</h3>
                    </div>
                    <div class="bg-white  rounded-sm h-12 p-3 text-slate-600 font-semibold">
                        <h3>Rent Collection (0)</h3>
                    </div>
                    <div class="bg-white rounded-sm h-12 p-3 text-slate-600 font-semibold">
                        <h1>Last Five Transaction</h1>
                    </div>
                    <div class="bg-white rounded-sm h-12 p-3 text-slate-600 font-semibold">
                        <h1>New Tenants</h1>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.1/dist/chart.umd.min.js"></script>
    <script>
            const prop = document.getElementById('propActive');

            var propChart = new Chart(prop, {
                type: 'bar',
                data: {
                labels: ['Active'],
                datasets: [{
                    label: 'Active',
                    data: [{{$property->count()}}],
                    backgroundColor: [
                        'rgba(250, 247, 200, 0.3)',
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
    </script>

@endsection
