@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card shadow-sm border-0">
                <div class="card-body p-4">
                    
                    {{-- Judul Artikel --}}
                    <h2 class="card-title text-primary mb-3">{{ $artikel->judul }}</h2>
                    
                    {{-- Gambar Artikel --}}
                    @if($artikel->gambar)
                        <img src="{{ asset('storage/' . $artikel->gambar) }}" class="img-fluid rounded mb-4" alt="Gambar Artikel">
                    @endif

                    {{-- Deskripsi --}}
                    <div class="card-text fs-5 text-secondary" style="line-height: 1.7;">
                        {{ $artikel->deskripsi }}
                    </div>

                    {{-- Tombol Kembali --}}
                    <div class="mt-4">
                        <a href="{{ route('artikel') }}" class="btn btn-outline-primary">
                            <i class="bi bi-arrow-left me-1"></i> Kembali ke Daftar Artikel
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
