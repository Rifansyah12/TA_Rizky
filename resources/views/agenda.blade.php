@extends('layouts.app')
@section('title','Agenda')

@section('content')

<!-- Page Header Start -->
<div class="container-xxl py-5 page-header position-relative mb-5">
    <div class="container py-5">
        <h1 class="display-2 text-white animated slideInDown mb-4">Agenda</h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item text-white active" aria-current="page">Agenda</li>
            </ol>
        </nav>
    </div>
</div>
<!-- Page Header End -->

<!-- Agenda Content Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="mb-3">Agenda Kegiatan</h2>
            <p class="text-muted">Berikut ini adalah agenda kegiatan RA Ar-Risalah yang akan datang maupun yang telah dilaksanakan.</p>
        </div>

        <!-- Timeline Agenda -->
        <div class="timeline">
            <!-- Agenda 1 -->
            <div class="timeline-item left">
                <div class="timeline-content shadow-sm bg-light rounded p-4">
                    <h5 class="text-primary">Senin, 5 Agustus 2025</h5>
                    <h6 class="fw-bold">Kegiatan Pemeriksaan Kesehatan</h6>
                    <p class="mb-0">Pemeriksaan kesehatan rutin oleh puskesmas untuk semua siswa. Kegiatan dilaksanakan mulai pukul 08.00 WIB di aula sekolah.</p>
                </div>
            </div>

            <!-- Agenda 2 -->
            <div class="timeline-item right">
                <div class="timeline-content shadow-sm bg-light rounded p-4">
                    <h5 class="text-success">Jumat, 16 Agustus 2025</h5>
                    <h6 class="fw-bold">Lomba 17 Agustus</h6>
                    <p class="mb-0">Berbagai lomba diselenggarakan untuk memperingati HUT RI ke-80. Siswa dan guru turut berpartisipasi dalam kegiatan ini.</p>
                </div>
            </div>

            <!-- Agenda 3 -->
            <div class="timeline-item left">
                <div class="timeline-content shadow-sm bg-light rounded p-4">
                    <h5 class="text-danger">Rabu, 20 Agustus 2025</h5>
                    <h6 class="fw-bold">Kegiatan Parenting</h6>
                    <p class="mb-0">Sosialisasi dan sharing session untuk orang tua siswa dalam rangka mendukung tumbuh kembang anak secara optimal.</p>
                </div>
            </div>

            <!-- Tambah agenda lainnya di sini -->
        </div>
    </div>
</div>
<!-- Agenda Content End -->

<!-- Timeline CSS -->
<style>
.timeline {
    position: relative;
    padding: 2rem 0;
}

.timeline::before {
    content: '';
    position: absolute;
    left: 50%;
    top: 0;
    width: 4px;
    height: 100%;
    background: #d4d4d4;
    transform: translateX(-50%);
}

.timeline-item {
    position: relative;
    width: 50%;
    padding: 1rem 2rem;
    box-sizing: border-box;
}

.timeline-item.left {
    left: 0;
    text-align: right;
}

.timeline-item.right {
    left: 50%;
    text-align: left;
}

.timeline-content {
    position: relative;
}

.timeline-item::after {
    content: '';
    position: absolute;
    top: 20px;
    width: 20px;
    height: 20px;
    background: #fff;
    border: 4px solid #0d6efd;
    border-radius: 50%;
    z-index: 1;
}

.timeline-item.left::after {
    right: -10px;
}

.timeline-item.right::after {
    left: -10px;
}

@media (max-width: 767.98px) {
    .timeline::before {
        left: 8px;
    }

    .timeline-item {
        width: 100%;
        padding-left: 2.5rem;
        padding-right: 1rem;
        text-align: left !important;
    }

    .timeline-item.right {
        left: 0;
    }

    .timeline-item.left::after,
    .timeline-item.right::after {
        left: 0;
    }
}


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

@endsection
