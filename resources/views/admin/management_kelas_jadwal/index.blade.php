@extends('admin.layouts.app')

@section('content')
<div class="container">
    <h4 class="mb-4">Data Kelas & Jadwal RA Arisalah</h4>

    {{-- Tabel --}}
    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>Nama Kelas</th>
                <th>Hari</th>
                <th>Jam</th>
                <th>Wali Kelas</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($data as $index => $item)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $item->kelas }}</td>
                    <td>{{ $item->hari }}</td>
                    <td>{{ $item->jam }}</td>
                    <td>{{ $item->wali_kelas }}</td>
                    <td>
                        {{-- Edit --}}
                        <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editModal{{ $item->id }}">Edit</button>

                        {{-- Hapus --}}
                        <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#hapusModal{{ $item->id }}">Hapus</button>
                    </td>
                </tr>

                {{-- Modal Edit --}}
                <div class="modal fade" id="editModal{{ $item->id }}" tabindex="-1">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form action="{{ route('jadwal.update', $item->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="modal-header">
                                    <h5 class="modal-title">Edit Jadwal</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="mb-2">
                                        <label>Nama Kelas</label>
                                        <input type="text" name="kelas" class="form-control" value="{{ $item->kelas }}" required>
                                    </div>
                                    <div class="mb-2">
                                        <label>Hari</label>
                                        <input type="text" name="hari" class="form-control" value="{{ $item->hari }}" required>
                                    </div>
                                    <div class="mb-2">
                                        <label>Jam</label>
                                        <input type="text" name="jam" class="form-control" value="{{ $item->jam }}" required>
                                    </div>
                                    <div class="mb-2">
                                        <label>Wali Kelas</label>
                                        <input type="text" name="wali_kelas" class="form-control" value="{{ $item->wali_kelas }}" required>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                    <button type="submit" class="btn btn-warning">Simpan Perubahan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                {{-- Modal Hapus --}}
                <div class="modal fade" id="hapusModal{{ $item->id }}" tabindex="-1">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form action="{{ route('jadwal.destroy', $item->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <div class="modal-header">
                                    <h5 class="modal-title">Hapus Jadwal</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                                <div class="modal-body">
                                    <p>Apakah Anda yakin ingin menghapus jadwal kelas <strong>{{ $item->kelas }}</strong>?</p>
                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                    <button type="submit" class="btn btn-danger">Hapus</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            @empty
                <tr>
                    <td colspan="6" class="text-center">Tidak ada data kelas & jadwal.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{-- Tombol Tambah --}}
    <button class="btn btn-success mt-3" data-bs-toggle="modal" data-bs-target="#tambahModal">
        <i class="bi bi-plus-circle me-1"></i> Tambah Kelas & Jadwal
    </button>

    {{-- Modal Tambah --}}
    <div class="modal fade" id="tambahModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('jadwal.store') }}" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title">Tambah Kelas & Jadwal</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-2">
                            <label>Nama Kelas</label>
                            <input type="text" name="kelas" class="form-control" required>
                        </div>
                        <div class="mb-2">
                            <label>Hari</label>
                            <input type="text" name="hari" class="form-control" required>
                        </div>
                        <div class="mb-2">
                            <label>Jam</label>
                            <input type="text" name="jam" class="form-control" required>
                        </div>
                        <div class="mb-2">
                            <label>Wali Kelas</label>
                            <input type="text" name="wali_kelas" class="form-control" required>
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
