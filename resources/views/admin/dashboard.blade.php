@extends('admin.layouts.app')

@section('content')
<div class="container">
    <h1>Selamat datang, {{ Auth::user()->name }}</h1>
    <p>Anda login sebagai <strong>Admin</strong></p>

    <div class="mt-5">
        <h4>Statistik Pendaftaran Siswa RA</h4>
        <canvas id="chartSiswaRA" height="100"></canvas>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('chartSiswaRA').getContext('2d');
    const chartSiswaRA = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Januari', 'Februari', 'Maret', 'April', 'Mei'],
            datasets: [{
                label: 'Jumlah Pendaftar',
                data: [15, 22, 30, 18, 27], // Dummy data
                backgroundColor: 'rgba(54, 162, 235, 0.6)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true,
                    title: {
                        display: true,
                        text: 'Jumlah Siswa'
                    }
                },
                x: {
                    title: {
                        display: true,
                        text: 'Bulan'
                    }
                }
            }
        }
    });
</script>
@endsection
