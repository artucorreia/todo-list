@extends('layouts.main')

@section('title', 'Dashboard Page')

@section('content')
    <link rel="stylesheet" href="/css/background/bg.css">

    <div class="min-h-screen bg-gradient-to-b from-gray-100 to-gray-300 flex flex-col items-center p-6 background_image">
        <!-- <x-date-filter-form></x-date-filter-form> -->

        <div class="bg-white shadow-lg rounded-lg p-6 w-full max-w-2xl mt-6">
            <h2 class="text-xl font-semibold text-gray-700 mb-4">Tasks By Priority</h2>
            <canvas id="tasksCountByPriority"></canvas>
        </div>

        <div class="flex flex-wrap max-md:flex-col my-5">
            <x-bladewind::card title="Completed Tasks" class="my-3">
                <div class="text-3xl font-bold flex justify-center">{{ $amountOfFinished }}</div>
            </x-bladewind::card>
            <x-bladewind::card title="Pending Tasks" class="my-3">
                <div class="text-3xl font-bold flex justify-center">{{ $amountOfPending }}</div>
            </x-bladewind::card>
            <x-bladewind::card title="Total Tasks" class="my-3">
                <div class="text-3xl font-bold flex justify-center">{{ $totalAmount }}</div>
            </x-bladewind::card>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        async function loadChartData() {
            try {
                const response = await fetch('/tasks-by-priority-data');
                const result = await response.json();

                const ctx = document.getElementById('tasksCountByPriority').getContext('2d');
                new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: result.labels,
                        datasets: [{
                            label: 'Tasks',
                            data: result.data,
                            backgroundColor: ['#ff6384', '#36a2eb', '#ffce56']
                        }]
                    },
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    },
                });
            } catch (error) {
                console.error("Error while loading chart data:", error);
            }
        }

        loadChartData();
    </script>

@endsection

