@extends('layouts.app')

@section('title', 'Tahapan Proyek')

@section('content')
<div class="container px-6 mx-auto grid">
    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
        Tahapan Proyek
    </h2>

    <!-- Cards / Summary -->
    <div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-4">
        <div class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
            <h4 class="mb-4 font-semibold text-gray-800 dark:text-gray-300">Total Tahapan</h4>
            <p class="text-gray-600 dark:text-gray-400 text-lg">
                {{ $tahapans->count() ?? 0 }}
            </p>
        </div>
        <div class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
            <h4 class="mb-4 font-semibold text-gray-800 dark:text-gray-300">Tahapan Selesai</h4>
            <p class="text-gray-600 dark:text-gray-400 text-lg">
                {{ $tahapans->where('status', 'selesai')->count() ?? 0 }}
            </p>
        </div>
        <div class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
            <h4 class="mb-4 font-semibold text-gray-800 dark:text-gray-300">Tahapan Berjalan</h4>
            <p class="text-gray-600 dark:text-gray-400 text-lg">
                {{ $tahapans->where('status', 'berjalan')->count() ?? 0 }}
            </p>
        </div>
        <div class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
            <h4 class="mb-4 font-semibold text-gray-800 dark:text-gray-300">Tahapan Tertunda</h4>
            <p class="text-gray-600 dark:text-gray-400 text-lg">
                {{ $tahapans->where('status', 'tertunda')->count() ?? 0 }}
            </p>
        </div>
    </div>

    <!-- Charts -->
    <div class="grid gap-6 mb-8 md:grid-cols-2">
        <!-- Doughnut Chart -->
        <div class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
            <h4 class="mb-4 font-semibold text-gray-800 dark:text-gray-300">Doughnut/Pie</h4>
            <canvas id="pie"></canvas>
        </div>

        <!-- Line Chart -->
        <div class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
            <h4 class="mb-4 font-semibold text-gray-800 dark:text-gray-300">Line Chart</h4>
            <canvas id="line"></canvas>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Pie Chart
    const pieChart = new Chart(document.getElementById('pie'), {
        type: 'doughnut',
        data: {
            labels: ['Selesai', 'Berjalan', 'Tertunda'],
            datasets: [{
                label: 'Tahapan Proyek',
                data: [
                    {{ $tahapans->where('status', 'selesai')->count() }},
                    {{ $tahapans->where('status', 'berjalan')->count() }},
                    {{ $tahapans->where('status', 'tertunda')->count() }}
                ],
                backgroundColor: ['#4ade80', '#60a5fa', '#facc15']
            }]
        },
        options: {
            responsive: true,
            plugins: { legend: { position: 'bottom' } }
        }
    });

    // Line Chart
    const lineChart = new Chart(document.getElementById('line'), {
        type: 'line',
        data: {
            labels: {!! json_encode($tahapans->pluck('nama')->toArray()) !!},
            datasets: [{
                label: 'Progress (%)',
                data: {!! json_encode($tahapans->pluck('progress')->toArray()) !!},
                borderColor: '#6366f1',
                backgroundColor: 'rgba(99, 102, 241, 0.2)',
                tension: 0.4,
                fill: true
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: { beginAtZero: true, max: 100 }
            }
        }
    });
</script>
@endpush
