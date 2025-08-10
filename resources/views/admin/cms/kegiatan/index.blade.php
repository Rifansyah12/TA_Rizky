@extends('admin.cms.layouts')

@section('cms_content')
<div class="card">
    <div class="card-body">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h5 class="mb-0">Konten Kegiatan</h5>
            <div class="d-flex gap-2">
                <!-- Form Pencarian -->
                <form method="GET" action="{{ route('cms.kegiatan.index') }}" class="d-flex" role="search">
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

        <table class="table table-bordered table-hover mt-3">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Judul</th>
                    <th>Deskripsi</th>
                    <th>Foto</th>
                    <th>Tanggal</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($kegiatans as $kegiatan)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $kegiatan->judul }}</td>
                        <td>{{ $kegiatan->deskripsi }}</td>
                        <td>
                            @if($kegiatan->foto)
                                <img src="{{ asset('storage/' . $kegiatan->foto) }}" width="80" class="img-thumbnail">
                            @endif
                        </td>
                        <td>{{ \Carbon\Carbon::parse($kegiatan->tanggal)->format('d M Y') }}</td>
                        <td>
                            <button class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#editModal{{ $kegiatan->id }}">Edit</button>
                            <form action="{{ route('cms.kegiatan.destroy', $kegiatan) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger" onclick="return confirm('Hapus kegiatan ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center">Belum ada kegiatan.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<!-- Modal Tambah -->
<div class="modal fade" id="createModal" tabindex="-1">
    <div class="modal-dialog">
        <form method="POST" action="{{ route('cms.kegiatan.store') }}" enctype="multipart/form-data" class="modal-content">
            @csrf
            <div class="modal-header">
                <h5 class="modal-title">Tambah Kegiatan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="mb-2">
                    <label>Judul</label>
                    <input type="text" name="judul" class="form-control" required>
                </div>
                <div class="mb-2">
                    <label>Foto</label>
                    <input type="file" name="foto" class="form-control">
                </div>
                <div class="mb-2">
                    <label>Deskripsi</label>
                    <textarea name="deskripsi" class="form-control" rows="3"></textarea>
                </div>
                <div class="mb-2">
                    <label>Tanggal</label>
                    <input type="date" name="tanggal" class="form-control">
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
</div>
@endsection

 <!-- Modal Edit (dalam loop agar $kegiatan tidak undefined) -->
  @foreach ($kegiatans as $kegiatan)
  @if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="modal fade" id="editModal{{ $kegiatan->id }}" tabindex="-1">
    <div class="modal-dialog">
        <form method="POST" action="{{ route('cms.kegiatan.update', $kegiatan) }}" class="modal-content" enctype="multipart/form-data">
             @csrf
             @method('PUT')
             <div class="modal-header">
                <h5 class="modal-title">Edit Kegiatan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
             </div>
             <div class="modal-body">
                <div class="mb-2">
                 <label>Judul</label>
                  <input type="text" name="judul" class="form-control" value="{{ $kegiatan->judul }}" required>
                </div>
             <div class="mb-2">
                 <label>Foto</label><br>
                   @if($kegiatan->foto)
                       <img src="{{ asset('storage/' . $kegiatan->foto) }}" width="100" class="mb-2">
                        @endif
                  <input type="file" name="foto" class="form-control">
             </div>
             <div class="mb-2">
                   <label>Deskripsi</label>
                        <textarea name="deskripsi" class="form-control" rows="3">{{ $kegiatan->deskripsi }}</textarea>
             </div>
             <div class="mb-2">
                   <label>Tanggal</label>
                        <input type="date" name="tanggal" class="form-control" value="{{ $kegiatan->tanggal }}">
             </div>
            </div>
             <div class="modal-footer">
                    <button class="btn btn-primary">Simpan</button>
             </div>
    </form>
   </div>
</div>
@endforeach