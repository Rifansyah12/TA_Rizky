@extends('admin.layouts.app')

@section('content')
<div class="container">
    <h4 class="mb-4">Data Guru RA Arisalah</h4>

    {{-- Pencarian --}}
    <form method="GET" action="{{ route('management_guru.index') }}" class="mb-4">
        <div class="input-group">
            <input type="text" name="keyword" class="form-control" placeholder="Cari nama guru..." value="{{ request('keyword') }}">
            <button type="submit" class="btn btn-primary">Cari</button>
        </div>
    </form>

    {{-- Tabel --}}
    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>Foto</th>
                <th>Nama Guru</th>
                <th>NIP</th>
                <th>Mata Pelajaran</th>
                <th>No HP</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($dataGuru as $index => $guru)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>
                        @if($guru->foto)
                            <img src="{{ asset('uploads/foto_guru/' . $guru->foto) }}" width="50" height="50" class="rounded-circle" alt="Foto Guru">
                        @else
                            <span class="text-muted">Tidak ada</span>
                        @endif
                    </td>
                    <td>{{ $guru->nama }}</td>
                    <td>{{ $guru->nip }}</td>
                    <td>{{ $guru->mapel }}</td>
                    <td>{{ $guru->no_hp }}</td>
                    <td>
                        ...
                    </td>
                </tr>


                {{-- Modal Detail --}}
                <div class="modal fade" id="detailModal{{ $guru->id }}" tabindex="-1">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header"><h5 class="modal-title">Detail Guru</h5></div>
                            <div class="modal-body">
                                <p><strong>Nama:</strong> {{ $guru->nama }}</p>
                                <p><strong>NIP:</strong> {{ $guru->nip }}</p>
                                <p><strong>Mata Pelajaran:</strong> {{ $guru->mapel }}</p>
                                <p><strong>No HP:</strong> {{ $guru->no_hp }}</p>
                                @if($guru->foto)
                                    <p><strong>Foto:</strong><br>
                                        <img src="{{ asset('uploads/foto_guru/' . $guru->foto) }}" width="120" alt="Foto Guru">
                                    </p>
                                @endif
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Modal Edit --}}
                <div class="modal fade" id="editModal{{ $guru->id }}" tabindex="-1">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form method="POST" action="{{ route('management_guru.update', $guru->id) }}">
                                @csrf @method('PUT')
                                <div class="modal-header"><h5 class="modal-title">Edit Guru</h5></div>
                                <div class="modal-body">
                                    <div class="mb-2">
                                        <label>Nama</label>
                                        <input type="text" name="nama" class="form-control" value="{{ $guru->nama }}" required>
                                    </div>
                                    <div class="mb-2">
                                        <label>NIP</label>
                                        <input type="text" name="nip" class="form-control" value="{{ $guru->nip }}" required>
                                    </div>
                                    <div class="mb-2">
                                        <label>Mata Pelajaran</label>
                                        <input type="text" name="mapel" class="form-control" value="{{ $guru->mapel }}" required>
                                    </div>
                                    <div class="mb-2">
                                        <label>No HP</label>
                                        <input type="text" name="no_hp" class="form-control" value="{{ $guru->no_hp }}" required>
                                    </div>
                                    <div class="mb-2">
                                        <label>Foto (opsional)</label>
                                        <input type="file" name="foto" class="form-control">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            @empty
                <tr><td colspan="6" class="text-center">Tidak ada data guru.</td></tr>
            @endforelse
        </tbody>
    </table>

    {{-- Button Tambah --}}
    <button class="btn btn-success mt-3" data-bs-toggle="modal" data-bs-target="#tambahModal">
        <i class="bi bi-plus-circle me-1"></i> Tambah Guru
    </button>

    {{-- Modal Tambah --}}
    <div class="modal fade" id="tambahModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="POST" action="{{ route('management_guru.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header"><h5 class="modal-title">Tambah Guru</h5></div>
                    <div class="modal-body">
                        <div class="mb-2">
                            <label>Nama</label>
                            <input type="text" name="nama" class="form-control" required>
                        </div>
                        <div class="mb-2">
                            <label>NIP</label>
                            <input type="text" name="nip" class="form-control" required>
                        </div>
                        <div class="mb-2">
                            <label>Mata Pelajaran</label>
                            <input type="text" name="mapel" class="form-control" required>
                        </div>
                        <div class="mb-2">
                            <label>No HP</label>
                            <input type="text" name="no_hp" class="form-control" required>
                        </div>
                        <div class="mb-2">
                            <label>Foto (opsional)</label>
                            <input type="file" name="foto" class="form-control">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-success">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
