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
    background-color: rgba(128, 128, 128, 0.5);
    z-index: 2;
}

.page-header .container {
    position: relative;
    z-index: 3;
}

.card-img-top {
    object-fit: cover;
    height: 200px;
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
            <h2 class="mb-3">Kegiatan Unggulan</h2>
            <p class="text-muted">Berikut beberapa kegiatan yang telah dilaksanakan oleh RA Ar-Risalah.</p>
        </div>

        <div class="row g-4">
            @forelse($kegiatans as $item)
            <div class="col-lg-4 col-md-6">
                <div class="card h-100 shadow-sm border-0">
                    <img src="{{ asset('storage/' . $item->foto) }}" class="card-img-top" alt="Kegiatan">
                    <div class="card-body">
                        <h5 class="card-title">{{ $item->judul }}</h5>
                        <p class="card-text">{{ $item->deskripsi }}</p>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12 text-center">
                <p class="text-muted">Belum ada kegiatan ditambahkan.</p>
            </div>
            @endforelse
        </div>
    </div>
</div>
<!-- Kegiatan End -->

@endsection
