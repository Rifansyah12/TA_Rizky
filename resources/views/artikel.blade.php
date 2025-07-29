@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h1 class="mb-4 text-center">Daftar Artikel</h1>

    <div class="row g-4">
        @forelse($artikels as $artikel)
        <div class="col-lg-4 col-md-6">
            <div class="card h-100 shadow-sm border-0">
                <div class="card-body d-flex flex-column">
                    <h4 class="card-title text-primary">{{ $artikel->judul }}</h4>
                    <p class="card-text text-muted flex-grow-1">
                        {{ Str::limit(strip_tags($artikel->deskripsi), 150, '...') }}
                    </p>
                    <a href="{{ route('artikel.show', $artikel->id) }}" class="btn btn-outline-primary mt-auto btn-sm">
                        Baca Selengkapnya
                    </a>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12 text-center">
            <p class="text-muted">Belum ada artikel tersedia.</p>
        </div>
        @endforelse
    </div>
</div>
@endsection
