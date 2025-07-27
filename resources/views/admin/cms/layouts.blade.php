{{-- resources/views/admin/cms/layout.blade.php --}}
@extends('admin.layouts.app')

@section('content')
<div class="container">
    <h4 class="mb-4">Management Konten RA Arisalah</h4>

    {{-- Tombol kategori konten --}}
    <div class="mb-4 d-flex flex-wrap gap-2">
        <a href="{{ route('cms.galeri.index') }}" class="btn btn-outline-primary {{ request()->routeIs('cms.galeri.*') ? 'active' : '' }}">Galeri</a>
        <a href="{{ route('cms.artikel.index') }}" class="btn btn-outline-primary {{ request()->routeIs('cms.artikel.*') ? 'active' : '' }}">Artikel</a>
        <a href="{{ route('cms.kegiatan.index') }}" class="btn btn-outline-primary {{ request()->routeIs('cms.kegiatan.*') ? 'active' : '' }}">Kegiatan</a>
        <a href="{{ route('cms.agenda.index') }}" class="btn btn-outline-primary {{ request()->routeIs('cms.agenda.*') ? 'active' : '' }}">Agenda</a>
        <a href="{{ route('cms.prestasi.index') }}" class="btn btn-outline-primary {{ request()->routeIs('cms.prestasi.*') ? 'active' : '' }}">Prestasi</a>
        <a href="{{ route('cms.ekstrakurikuler.index') }}" class="btn btn-outline-primary {{ request()->routeIs('cms.ekstrakurikuler.*') ? 'active' : '' }}">Ekstrakurikuler</a>
    </div>

    {{-- Konten halaman spesifik --}}
    @yield('cms_content')
</div>
@endsection