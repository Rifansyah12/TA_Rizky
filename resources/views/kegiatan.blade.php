@extends('layouts.app')
@section('title','Kegiatan')

@section('content')


<style>
.page-header {
    position: relative;
    background-image: url("{{ asset('img/kegiatan/kegiatan3(1).jpeg') }}");
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    z-index: 1;
}

.page-header::before {
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(128, 128, 128, 0.5); /* Abu-abu dengan transparansi */
    z-index: 2;
}

.page-header .container {
    position: relative;
    z-index: 3; /* Pastikan kontennya tampil di atas layer abu-abu */
}
</style>
<!-- Page Header Start -->
<div class="container-xxl py-5 page-header position-relative mb-5">
    <div class="container py-5">
        <h1 class="display-2 text-white animated slideInDown mb-4">Kegiatan</h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item text-white active" aria-current="page">Kegiatan</li>
            </ol>
        </nav>
    </div>
</div>
<!-- Page Header End -->

<!-- Kegiatan Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="mb-3">Dokumentasi Kegiatan</h2>
            <p class="text-muted">Berikut beberapa kegiatan yang telah dilaksanakan oleh RA Ar-Risalah.</p>
        </div>

        <div class="row g-4">
            <!-- Kegiatan 1 -->
            <div class="col-lg-4 col-md-6">
                <div class="card h-100 shadow-sm border-0">
                    <img src="{{ asset('img/kegiatan1.jpg') }}" class="card-img-top" alt="Kegiatan 1">
                    <div class="card-body">
                        <h5 class="card-title">Kegiatan Belajar di Luar Kelas</h5>
                        <p class="card-text">Siswa diajak untuk belajar sambil bermain di lingkungan sekitar sekolah guna meningkatkan pemahaman secara praktis dan menyenangkan.</p>
                    </div>
                </div>
            </div>

            <!-- Kegiatan 2 -->
            <div class="col-lg-4 col-md-6">
                <div class="card h-100 shadow-sm border-0">
                    <img src="{{ asset('img/kegiatan2.jpg') }}" class="card-img-top" alt="Kegiatan 2">
                    <div class="card-body">
                        <h5 class="card-title">Peringatan Hari Besar Islam</h5>
                        <p class="card-text">Anak-anak berpartisipasi dalam kegiatan memperingati Maulid Nabi dengan ceramah dan pawai bersama warga sekitar.</p>
                    </div>
                </div>
            </div>

            <!-- Kegiatan 3 -->
            <div class="col-lg-4 col-md-6">
                <div class="card h-100 shadow-sm border-0">
                    <img src="{{ asset('img/kegiatan3.jpg') }}" class="card-img-top" alt="Kegiatan 3">
                    <div class="card-body">
                        <h5 class="card-title">Senam Ceria Setiap Jumat</h5>
                        <p class="card-text">Untuk menjaga kebugaran fisik dan membangun kebersamaan, anak-anak rutin melakukan senam bersama setiap hari Jumat pagi.</p>
                    </div>
                </div>
            </div>

            <!-- Tambahkan kegiatan lainnya sesuai kebutuhan -->
        </div>
    </div>
</div>
<!-- Kegiatan End -->

@endsection
