@extends('admin.cms.layouts')

@section('cms_content')
<div class="card">
    <div class="card-body">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h5 class="mb-0">Konten Prestasi</h5>
            <div class="d-flex gap-2">
                <!-- Form Pencarian -->
                <form method="GET" action="{{ route('cms.prestasi.index') }}" class="d-flex" role="search">
                    <input type="text" name="q" class="form-control form-control-sm me-2" placeholder="Cari judul..." value="{{ request('q') }}">
                    <button class="btn btn-outline-primary btn-sm" type="submit">Cari</button>
                </form>

                <!-- Tombol Tambah -->
                <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#createModal">
                    + Tambah
                </button>
            </div>
        </div>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered table-hover mt-3">
            <thead class="table-light">
                <tr>
                    <th>No</th>
                    <th>Judul</th>
                    <th>Deskripsi</th>
                    <th>Tanggal</th>
                    <th>Foto</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($prestasis as $prestasi)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $prestasi->judul }}</td>
                        <td>{{ $prestasi->deskripsi }}</td>
                        <td>{{ \Carbon\Carbon::parse($prestasi->tanggal)->format('d M Y') }}</td>
                        <td>
                            @if($prestasi->foto)
                                <img src="{{ asset('storage/' . $prestasi->foto) }}" alt="Foto" width="60">
                            @else
                                <span class="text-muted">-</span>
                            @endif
                        </td>
                        <td>
                            <button class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#editModal{{ $prestasi->id }}">Edit</button>
                            <form action="{{ route('cms.prestasi.destroy', $prestasi) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus data ini?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center">Belum ada data prestasi.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<!-- Modal Tambah -->
<div class="modal fade" id="createModal" tabindex="-1">
    <div class="modal-dialog">
        <form method="POST" action="{{ route('cms.prestasi.store') }}" class="modal-content" enctype="multipart/form-data">
            @csrf
            <div class="modal-header">
                <h5 class="modal-title">Tambah Prestasi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="mb-2">
                    <label>Judul</label>
                    <input type="text" name="judul" class="form-control" required>
                </div>
                <div class="mb-2">
                    <label>Deskripsi</label>
                    <textarea name="deskripsi" class="form-control" required></textarea>
                </div>
                <div class="mb-2">
                    <label>Tanggal</label>
                    <input type="date" name="tanggal" class="form-control" required>
                </div>
                <div class="mb-2">
                    <label>Foto</label>
                    <input type="file" name="foto" class="form-control">
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
</div>

<!-- Semua Modal Edit (DI LUAR FORELSE) -->
@foreach($prestasis as $prestasi)
<div class="modal fade" id="editModal{{ $prestasi->id }}" tabindex="-1">
    <div class="modal-dialog">
        <form method="POST" action="{{ route('cms.prestasi.update', $prestasi) }}" class="modal-content" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="modal-header">
                <h5 class="modal-title">Edit Prestasi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="mb-2">
                    <label>Judul</label>
                    <input type="text" name="judul" class="form-control" value="{{ $prestasi->judul }}" required>
                </div>
                <div class="mb-2">
                    <label>Deskripsi</label>
                    <textarea name="deskripsi" class="form-control" required>{{ $prestasi->deskripsi }}</textarea>
                </div>
                <div class="mb-2">
                    <label>Tanggal</label>
                    <input type="date" name="tanggal" class="form-control" value="{{ $prestasi->tanggal }}" required>
                </div>
                <div class="mb-2">
                    <label>Foto</label>
                    <input type="file" name="foto" class="form-control">
                    @if($prestasi->foto)
                        <small>Foto saat ini:</small><br>
                        <img src="{{ asset('storage/' . $prestasi->foto) }}" width="60" class="mt-1">
                    @endif
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
</div>
@endforeach

@endsection
