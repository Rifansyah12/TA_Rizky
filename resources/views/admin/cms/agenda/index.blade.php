@extends('admin.cms.layouts')

@section('cms_content')
<div class="card">
    <div class="card-body">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h5 class="mb-0">Konten Agenda</h5>
            <div class="d-flex gap-2">
                <form method="GET" action="{{ route('cms.agenda.index') }}" class="d-flex" role="search">
                    <input type="text" name="q" class="form-control form-control-sm me-2" placeholder="Cari judul..." value="{{ request('q') }}">
                    <button class="btn btn-outline-primary btn-sm" type="submit">Cari</button>
                </form>
                <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#createModal">
                    + Tambah
                </button>
            </div>
        </div>

        @if(session('success'))
            <div class="alert alert-success mt-2">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered table-hover mt-3">
            <thead class="table-light">
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
                @forelse($agendas as $agenda)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $agenda->judul }}</td>
                        <td>{{ $agenda->deskripsi }}</td>
                        <td>
                            @if ($agenda->foto)
                                <img src="{{ asset('storage/' . $agenda->foto) }}" alt="Foto" width="80" class="img-thumbnail">
                            @else
                                -
                            @endif
                        </td>
                        <td>{{ \Carbon\Carbon::parse($agenda->tanggal)->format('d M Y') }}</td>
                        <td>
                            <button class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#editModal{{ $agenda->id }}">Edit</button>
                            <form action="{{ route('cms.agenda.destroy', $agenda) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center">Data agenda belum tersedia.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

{{-- Modals Edit (diletakkan di luar <table>) --}}
@foreach($agendas as $agenda)
<div class="modal fade" id="editModal{{ $agenda->id }}" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('cms.agenda.update', $agenda->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="modal-header">
                    <h5 class="modal-title">Edit Agenda</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">
                    <div class="mb-3">
                        <label for="judul{{ $agenda->id }}" class="form-label">Judul</label>
                        <input type="text" class="form-control" name="judul" id="judul{{ $agenda->id }}" value="{{ $agenda->judul }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="deskripsi{{ $agenda->id }}" class="form-label">Deskripsi</label>
                        <textarea class="form-control" name="deskripsi" id="deskripsi{{ $agenda->id }}">{{ $agenda->deskripsi }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="tanggal{{ $agenda->id }}" class="form-label">Tanggal</label>
                        <input type="date" class="form-control" name="tanggal" id="tanggal{{ $agenda->id }}" value="{{ $agenda->tanggal }}">
                    </div>

                    <div class="mb-3">
                        <label for="foto{{ $agenda->id }}" class="form-label">Foto</label>
                        <input type="file" class="form-control" name="foto" id="foto{{ $agenda->id }}" accept="image/*">
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach

<!-- Modal Tambah -->
<div class="modal fade" id="createModal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <form action="{{ route('cms.agenda.store') }}" method="POST" enctype="multipart/form-data">
          @csrf

          <div class="modal-header">
              <h5 class="modal-title">Tambah Agenda</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
          </div>

          <div class="modal-body">
              <div class="mb-3">
                  <label for="judul" class="form-label">Judul</label>
                  <input type="text" class="form-control" name="judul" id="judul" required>
              </div>

              <div class="mb-3">
                  <label for="deskripsi" class="form-label">Deskripsi</label>
                  <textarea class="form-control" name="deskripsi" id="deskripsi"></textarea>
              </div>

              <div class="mb-3">
                  <label for="tanggal" class="form-label">Tanggal</label>
                  <input type="date" class="form-control" name="tanggal" id="tanggal">
              </div>

              <div class="mb-3">
                  <label for="foto" class="form-label">Foto</label>
                  <input type="file" class="form-control" name="foto" id="foto" accept="image/*">
              </div>
          </div>

          <div class="modal-footer">
              <button type="submit" class="btn btn-primary">Simpan</button>
          </div>
      </form>
    </div>
  </div>
</div>
@endsection