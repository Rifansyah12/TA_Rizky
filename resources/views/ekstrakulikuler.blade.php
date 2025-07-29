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
            @forelse($ekstrakurikulers as $item)
                <div class="col-md-4">
                    <div class="card h-100 shadow-sm">
                        <img src="{{ asset('storage/' . $item->foto) }}" class="card-img-top img-fixed" alt="{{ $item->nama }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $item->nama }}</h5>
                            <p class="card-text">{{ $item->deskripsi }}</p>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center">
                    <p class="text-muted">Belum ada data ekstrakurikuler.</p>
                </div>
            @endforelse
        </div>
    </div>
</section>
<!-- Ekstrakurikuler Section End -->

<style>
.img-fixed {
    width: 100%;
    height: 250px;
    object-fit: cover;
}
</style>


@endsection
