@extends('admin.layouts.app')

@section('content')
<div class="container">
    <h1>Selamat datang, {{ Auth::user()->name }}</h1>
    <p>Anda login sebagai <strong>Admin</strong></p>

    <div class="row mt-4">
        <div class="col-md-6">
            <div class="card text-white bg-primary mb-3">
                <div class="card-header">Total Pendaftar</div>
                <div class="card-body">
                    <h5 class="card-title">{{ $totalPendaftar }}</h5>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card text-white bg-success mb-3">
                <div class="card-header">Sudah Dikonfirmasi</div>
                <div class="card-body">
                    <h5 class="card-title">{{ $sudahDikonfirmasi }}</h5>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-5">
        <h4>Diagram Statistik Pendaftar</h4>
        <canvas id="diagramStatistik" style="max-height: 150px;"></canvas>
    </div>
</div>
@endsection

@section('scripts')
{{-- Pastikan ini berada di bagian @yield('scripts') dalam layout --}}
<script src="https://cdn.jsdelivr.net/npm/chart.js@3.9.1/dist/chart.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function () {
    const totalPendaftar = {{ $totalPendaftar }};
    const sudahDikonfirmasi = {{ $sudahDikonfirmasi }};
    
    const ctx = document.getElementById('diagramStatistik')?.getContext('2d');
    if (!ctx) {
        console.error('Canvas dengan id "diagramStatistik" tidak ditemukan.');
        return;
    }

    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Total Pendaftar', 'Sudah Dikonfirmasi'],
            datasets: [{
                label: 'Jumlah',
                data: [totalPendaftar, sudahDikonfirmasi],
                backgroundColor: ['#007bff', '#28a745'],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    display: true,
                    position: 'top'
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        stepSize: 1
                    }
                }
            }
        }
    });
});
</script>
@endsection