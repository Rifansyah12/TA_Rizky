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
                    <td>{{ $guru->nama }}</td>
                    <td>{{ $guru->nip }}</td>
                    <td>{{ $guru->mapel }}</td>
                    <td>{{ $guru->no_hp }}</td>
                    <td>
                        {{-- Detail --}}
                        <button class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#detailModal{{ $guru->id }}">Detail</button>

                        {{-- Edit --}}
                        <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editModal{{ $guru->id }}">Edit</button>

                        {{-- Hapus --}}
                        <form action="{{ route('management_guru.destroy', $guru->id) }}" method="POST" class="d-inline">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</button>
                        </form>
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
                <form method="POST" action="{{ route('management_guru.store') }}">
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
