@extends('admin.cms.layouts')

@section('cms_content')
<div class="card">
    <div class="card-body">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h5 class="mb-0">Konten Galeri</h5>
            <div class="d-flex gap-2">
                <!-- Form Pencarian -->
                <form method="GET" action="{{ route('cms.galeri.index') }}" class="d-flex" role="search">
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

        <table class="table table-bordered">
            <thead class="table-light">
                <tr>
                    <th width="5%">No</th>
                    <th width="20%">Judul</th>
                    <th>Deskripsi</th>
                    <th width="15%">Gambar</th>
                    <th width="15%">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($galeris as $galeri)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $galeri->judul }}</td>
                    <td>{{ $galeri->deskripsi }}</td>
                    <td>
                        @if($galeri->gambar)
                            <img src="{{ asset('storage/' . $galeri->gambar) }}" width="80" class="img-thumbnail">
                        @endif
                    </td>
                    <td>
                        <button class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#editModal{{ $galeri->id }}">Edit</button>
                        <form method="POST" action="{{ route('cms.galeri.destroy', $galeri) }}" class="d-inline">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus?')">Hapus</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center">Tidak ada data galeri.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

                <!-- Modal Edit -->
                <div class="modal fade" id="editModal{{ $galeri->id }}" tabindex="-1">
                  <div class="modal-dialog">
                    <form method="POST" action="{{ route('cms.galeri.update', $galeri) }}" enctype="multipart/form-data" class="modal-content">
                        @csrf @method('PUT')
                        <div class="modal-header">
                            <h5 class="modal-title">Edit Galeri</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-2">
                                <label>Judul</label>
                                <input type="text" name="judul" class="form-control" value="{{ $galeri->judul }}" required>
                            </div>
                            <div class="mb-2">
                                <label>Deskripsi</label>
                                <textarea name="deskripsi" class="form-control">{{ $galeri->deskripsi }}</textarea>
                            </div>
                            <div class="mb-2">
                                <label>Gambar</label>
                                <input type="file" name="gambar" class="form-control">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                  </div>
                </div>

<!-- Modal Tambah -->
<div class="modal fade" id="createModal" tabindex="-1">
  <div class="modal-dialog">
    <form method="POST" action="{{ route('cms.galeri.store') }}" enctype="multipart/form-data" class="modal-content">
        @csrf
        <div class="modal-header">
            <h5 class="modal-title">Tambah Galeri</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
            <div class="mb-2">
                <label>Judul</label>
                <input type="text" name="judul" class="form-control" required>
            </div>
            <div class="mb-2">
                <label>Deskripsi</label>
                <textarea name="deskripsi" class="form-control"></textarea>
            </div>
            <div class="mb-2">
                <label>Gambar</label>
                <input type="file" name="gambar" class="form-control">
            </div>
        </div>
        <div class="modal-footer">
            <button class="btn btn-primary">Simpan</button>
        </div>
    </form>
  </div>
</div>
@endsection
