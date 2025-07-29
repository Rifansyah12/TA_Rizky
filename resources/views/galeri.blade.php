@extends('layouts.app')
@section('title','Galeri')

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
        <h1 class="display-2 text-white animated slideInDown mb-4">Galeri</h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item text-white active" aria-current="page">Galeri</li>
            </ol>
        </nav>
    </div>
</div>
<!-- Page Header End -->

<!-- Kegiatan Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="mb-3">Galeri</h2>
            <p class="text-muted">Berikut beberapa dokumentasi yang telah dilaksanakan oleh RA Ar-Risalah.</p>
        </div>

        <div class="row g-4">
            @forelse($galeris as $item)
                <div class="col-lg-4 col-md-6">
                    <div class="card h-100 shadow-sm border-0">
                        <img src="{{ asset('storage/' . $item->gambar) }}"
                        class="card-img-top img-fixed img-clickable"
                        alt="{{ $item->judul }}"
                        data-img="{{ asset('storage/' . $item->gambar) }}"
                        data-title="{{ $item->judul }}">

                        <div class="card-body">
                            <h5 class="card-title">{{ $item->judul }}</h5>
                            <p class="card-text">{{ $item->deskripsi }}</p>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center">
                    <p class="text-muted">Belum ada data galeri.</p>
                </div>
            @endforelse
            <!-- Modal Gambar -->
            <div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content bg-white">
                <div class="modal-header">
                    <h5 class="modal-title" id="imageModalLabel">Judul Gambar</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                </div>
                <div class="modal-body text-center">
                    <img src="" id="modalImage" class="img-fluid" alt="Gambar">
                </div>
                </div>
            </div>
            </div>

        </div>
    </div>
</div>
<!-- Kegiatan End -->

<style>
.img-fixed {
    width: 100%;
    height: 250px;
    object-fit: cover;
}
</style>


@endsection
@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const imageElements = document.querySelectorAll('.img-clickable');

        imageElements.forEach(img => {
            img.addEventListener('click', function () {
                const modalImage = document.getElementById('modalImage');
                const modalTitle = document.getElementById('imageModalLabel');

                modalImage.src = this.getAttribute('data-img');
                modalTitle.textContent = this.getAttribute('data-title');

                const imageModal = new bootstrap.Modal(document.getElementById('imageModal'));
                imageModal.show();
            });
        });
    });
</script>
@endpush
