@extends('layouts.app')
@section('title','Ekstrakulikuler')

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
        <h1 class="display-2 text-white animated slideInDown mb-4">Ekstrakulikuler</h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item text-white active" aria-current="page">Ekstrakulikuler</li>
            </ol>
        </nav>
    </div>
</div>
<!-- Page Header End -->

<!-- Ekstrakurikuler Section Start -->
<section class="ftco-section bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="mb-3">Kegiatan Ekstrakurikuler</h2>
            <p class="text-muted">Berikut adalah berbagai kegiatan ekstrakurikuler yang dapat diikuti oleh siswa untuk mengembangkan bakat dan minat mereka.</p>
        </div>

        <div class="row g-4">
            <!-- Eskul 1 -->
            <div class="col-md-4">
                <div class="card h-100 shadow-sm">
                    <img src="{{ asset('img/eskul/pramuka.jpeg') }}" class="card-img-top" alt="Pramuka">
                    <div class="card-body">
                        <h5 class="card-title">Pramuka</h5>
                        <p class="card-text">Kegiatan yang melatih kedisiplinan, kemandirian, dan kepemimpinan siswa melalui berbagai aktivitas alam terbuka.</p>
                    </div>
                </div>
            </div>

            <!-- Eskul 2 -->
            <div class="col-md-4">
                <div class="card h-100 shadow-sm">
                    <img src="{{ asset('img/eskul/marawis.jpeg') }}" class="card-img-top" alt="Marawis">
                    <div class="card-body">
                        <h5 class="card-title">Marawis</h5>
                        <p class="card-text">Seni musik tradisional Islami yang mengasah bakat siswa dalam seni tabuhan dan melatih kekompakan tim.</p>
                    </div>
                </div>
            </div>

            <!-- Eskul 3 -->
            <div class="col-md-4">
                <div class="card h-100 shadow-sm">
                    <img src="{{ asset('img/eskul/tahfidz.jpeg') }}" class="card-img-top" alt="Tahfidz">
                    <div class="card-body">
                        <h5 class="card-title">Tahfidz</h5>
                        <p class="card-text">Program menghafal Al-Qur'an yang ditujukan untuk membentuk karakter religius dan cinta terhadap Al-Qur'an.</p>
                    </div>
                </div>
            </div>

            <!-- Eskul 4 -->
            <div class="col-md-4">
                <div class="card h-100 shadow-sm">
                    <img src="{{ asset('img/eskul/olahraga.jpeg') }}" class="card-img-top" alt="Olahraga">
                    <div class="card-body">
                        <h5 class="card-title">Olahraga</h5>
                        <p class="card-text">Meliputi kegiatan seperti futsal, badminton, dan senam yang bertujuan menjaga kesehatan dan kebugaran tubuh siswa.</p>
                    </div>
                </div>
            </div>

            <!-- Eskul 5 -->
            <div class="col-md-4">
                <div class="card h-100 shadow-sm">
                    <img src="{{ asset('img/eskul/hadroh.jpeg') }}" class="card-img-top" alt="Hadroh">
                    <div class="card-body">
                        <h5 class="card-title">Hadroh</h5>
                        <p class="card-text">Grup musik religi yang membawakan shalawat dan lagu-lagu Islami untuk menumbuhkan kecintaan kepada Rasulullah.</p>
                    </div>
                </div>
            </div>

            <!-- Eskul 6 -->
            <div class="col-md-4">
                <div class="card h-100 shadow-sm">
                    <img src="{{ asset('img/eskul/kesenian.jpeg') }}" class="card-img-top" alt="Kesenian">
                    <div class="card-body">
                        <h5 class="card-title">Kesenian</h5>
                        <p class="card-text">Mengembangkan bakat seni siswa dalam bidang tari, lukis, drama, dan kegiatan kreatif lainnya.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Ekstrakurikuler Section End -->

@endsection
