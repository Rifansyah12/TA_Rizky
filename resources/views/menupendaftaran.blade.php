@extends('layouts.app')
@section('title','Pendaftaran')

@section('content')


<style>
.page-header {
    position: relative;
    background-image: url("{{ asset('img/kegiatan/kegiatan_28.jpeg') }}");
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
        <h1 class="display-2 text-white animated slideInDown mb-4">Pendaftaran</h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item text-white active" aria-current="page">Pendaftaran</li>
            </ol>
        </nav>
    </div>
</div>
<!-- Page Header End -->

<!-- Alur Pendaftaran Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="mb-3">Alur Pendaftaran Siswa Baru</h2>
            <p class="text-muted">Ikuti alur berikut untuk melakukan pendaftaran di RA Ar-Risalah.</p>
        </div>

        <div class="d-flex flex-wrap justify-content-center align-items-center gap-4">

            <!-- Step 1 -->
            <div class="step-box text-center">
                <div class="icon-box bg-primary text-white mb-3">
                    <i class="fas fa-clipboard-list fa-2x"></i>
                </div>
                <h6 class="fw-bold">1. Isi Formulir</h6>
                <p class="small">Formulir dapat diisi online atau langsung di sekolah.</p>
            </div>

            <!-- Arrow -->
            <div class="arrow-box">
                <i class="fas fa-chevron-right fa-2x text-muted"></i>
            </div>

            <!-- Step 2 -->
            <div class="step-box text-center">
                <div class="icon-box bg-success text-white mb-3">
                    <i class="fas fa-file-upload fa-2x"></i>
                </div>
                <h6 class="fw-bold">2. Upload Dokumen</h6>
                <p class="small">Unggah KTP, KK, dan Akta Kelahiran.</p>
            </div>

            <!-- Arrow -->
            <div class="arrow-box">
                <i class="fas fa-chevron-right fa-2x text-muted"></i>
            </div>

            <!-- Step 3 -->
            <div class="step-box text-center">
                <div class="icon-box bg-warning text-white mb-3">
                    <i class="fas fa-user-check fa-2x"></i>
                </div>
                <h6 class="fw-bold">3. Verifikasi</h6>
                <p class="small">Tim sekolah akan memeriksa data dan dokumen Anda.</p>
            </div>

            <!-- Arrow -->
            <div class="arrow-box">
                <i class="fas fa-chevron-right fa-2x text-muted"></i>
            </div>

            <!-- Step 4 -->
            <div class="step-box text-center">
                <div class="icon-box bg-danger text-white mb-3">
                    <i class="fas fa-bullhorn fa-2x"></i>
                </div>
                <h6 class="fw-bold">4. Pengumuman</h6>
                <p class="small">Hasil seleksi disampaikan melalui kontak yang diberikan.</p>
            </div>

            <!-- Arrow -->
            <div class="arrow-box">
                <i class="fas fa-chevron-right fa-2x text-muted"></i>
            </div>

            <!-- Step 5 -->
            <div class="step-box text-center">
                <div class="icon-box bg-info text-white mb-3">
                    <i class="fas fa-school fa-2x"></i>
                </div>
                <h6 class="fw-bold">5. Masuk Sekolah</h6>
                <p class="small">Siswa mulai mengikuti kegiatan belajar di tahun ajaran baru.</p>
            </div>

        </div>
    </div>
</div>
<!-- Alur Pendaftaran End -->

<style>
    .step-box {
        width: 180px;
        padding: 15px;
        border-radius: 12px;
        background-color: #f8f9fa;
        box-shadow: 0 4px 8px rgba(0,0,0,0.05);
    }
    .icon-box {
        width: 60px;
        height: 60px;
        line-height: 60px;
        border-radius: 50%;
        margin: 0 auto;
    }
    .arrow-box {
        display: flex;
        align-items: center;
        justify-content: center;
    }
    @media (max-width: 767.98px) {
        .arrow-box {
            transform: rotate(90deg);
        }
    }
</style>

@endsection
