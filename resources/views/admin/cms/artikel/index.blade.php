@extends('admin.cms.layouts')

@section('cms_content')
<div class="card">
    <div class="card-body">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h5 class="mb-0">Konten Artikel</h5>
            <div class="d-flex gap-2">
                <!-- Form Pencarian -->
                <form method="GET" action="{{ route('cms.artikel.index') }}" class="d-flex" role="search">
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
            <div class="alert alert-success mt-2">{{ session('success') }}</div>
        @endif

        <!-- Form Pencarian -->
        <form method="GET" action="{{ route('cms.artikel.index') }}" class="mb-3 mt-3">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Cari judul artikel..." value="{{ request('q') }}">
                <button class="btn btn-outline-secondary" type="submit">Cari</button>
            </div>
        </form>

        <table class="table table-bordered mt-2">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Judul</th>
                    <th>Deskripsi</th>
                    <th>Gambar</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($artikels as $artikel)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $artikel->judul }}</td>
                    <td>{{ $artikel->deskripsi }}</td>
                    <td>
                        @if($artikel->gambar)
                            <img src="{{ asset('storage/' . $artikel->gambar) }}" width="80" class="img-thumbnail">
                        @endif
                    </td>
                    <td>
                        <button class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#editModal{{ $artikel->id }}">Edit</button>
                        <form action="{{ route('cms.artikel.destroy', $artikel) }}" method="POST" class="d-inline">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus artikel ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

                <!-- Modal Edit -->
                <div class="modal fade" id="editModal{{ $artikel->id }}" tabindex="-1">
                  <div class="modal-dialog">
                    <form method="POST" action="{{ route('cms.artikel.update', $artikel) }}" enctype="multipart/form-data" class="modal-content">
                        @csrf @method('PUT')
                        <div class="modal-header">
                            <h5 class="modal-title">Edit Artikel</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-2">
                                <label>Judul</label>
                                <input type="text" name="judul" class="form-control" value="{{ $artikel->judul }}" required>
                            </div>
                            <div class="mb-2">
                                <label>Deskripsi</label>
                                <textarea name="deskripsi" class="form-control">{{ $artikel->deskripsi }}</textarea>
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
    <form method="POST" action="{{ route('cms.artikel.store') }}" enctype="multipart/form-data" class="modal-content">
        @csrf
        <div class="modal-header">
            <h5 class="modal-title">Tambah Artikel</h5>
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
