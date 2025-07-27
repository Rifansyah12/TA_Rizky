@extends('admin.layouts.app')

@section('content')
<div class="container">
    <h4 class="mb-4">Data Siswa RA Arisalah</h4>

    {{-- Form Pencarian --}}
    <form method="GET" action="{{ route('management_siswa.index') }}" class="mb-4">
        <div class="input-group">
            <input type="text" name="keyword" class="form-control" placeholder="Cari nama siswa..." value="{{ request('keyword') }}">
            <button type="submit" class="btn btn-primary">Cari</button>
        </div>
    </form>

    {{-- Tabel Siswa --}}
    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>Nama Siswa</th>
                <th>Jenis Kelamin</th>
                <th>Umur</th>
                <th>Alamat</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            {{-- Data dummy sementara --}}
            @foreach ($siswa as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->nama_lengkap }}</td>
                <td>{{ $item->jenis_kelamin }}</td>
                <td>{{ $item->umur }} Tahun</td>
                <td>{{ $item->alamat }}</td>
                <td>
                    <button class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#detailModal{{ $item->id }}">Detail</button>
                    <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editModal{{ $item->id }}">Edit</button>
                    <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#hapusModal{{ $item->id }}">Hapus</button>
                </td>
            </tr>

            <!-- Modal Detail -->
            <div class="modal fade" id="detailModal{{ $item->id }}" tabindex="-1" aria-labelledby="detailModalLabel{{ $item->id }}" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="detailModalLabel{{ $item->id }}">Detail Siswa</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                        </div>
                        <div class="modal-body">
                            <p><strong>Nama Lengkap:</strong> {{ $item->nama_lengkap }}</p>
                            <p><strong>NIK:</strong> {{ $item->nik }}</p>
                            <p><strong>Tempat Lahir:</strong> {{ $item->tempat_lahir }}</p>
                            <p><strong>Tanggal Lahir:</strong> {{ \Carbon\Carbon::parse($item->tanggal_lahir)->translatedFormat('d F Y') }}</p>
                            <p><strong>Jenis Kelamin:</strong> {{ $item->jenis_kelamin }}</p>
                            <p><strong>Alamat:</strong> {{ $item->alamat }}</p>
                            <p><strong>Nama Ayah:</strong> {{ $item->nama_ayah }}</p>
                            <p><strong>Nama Ibu:</strong> {{ $item->nama_ibu }}</p>
                            <p><strong>No HP:</strong> {{ $item->no_hp }}</p>
                        </div>
                    </div>
                </div>
            </div>


            <!-- Modal Edit -->
            <div class="modal fade" id="editModal{{ $item->id }}" tabindex="-1" aria-labelledby="editModalLabel{{ $item->id }}" aria-hidden="true">
                <div class="modal-dialog">
                    <form action="{{ route('management_siswa.update', $item->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editModalLabel{{ $item->id }}">Edit Siswa</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label>Nama Lengkap</label>
                                    <input type="text" name="nama_lengkap" class="form-control" value="{{ $item->nama_lengkap }}" required>
                                </div>
                                <div class="mb-3">
                                    <label>NIK</label>
                                    <input type="text" name="nik" class="form-control" value="{{ $item->nik }}" required>
                                </div>
                                <div class="mb-3">
                                    <label>Tempat Lahir</label>
                                    <input type="text" name="tempat_lahir" class="form-control" value="{{ $item->tempat_lahir }}" required>
                                </div>
                                <div class="mb-3">
                                    <label>Tanggal Lahir</label>
                                    <input type="date" name="tanggal_lahir" class="form-control" value="{{ $item->tanggal_lahir }}" required>
                                </div>
                                <div class="mb-3">
                                    <label>Jenis Kelamin</label>
                                    <select name="jenis_kelamin" class="form-control" required>
                                        <option value="Laki-laki" {{ $item->jenis_kelamin == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                        <option value="Perempuan" {{ $item->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label>Alamat</label>
                                    <textarea name="alamat" class="form-control" required>{{ $item->alamat }}</textarea>
                                </div>
                                <div class="mb-3">
                                    <label>Nama Ayah</label>
                                    <input type="text" name="nama_ayah" class="form-control" value="{{ $item->nama_ayah }}" required>
                                </div>
                                <div class="mb-3">
                                    <label>Nama Ibu</label>
                                    <input type="text" name="nama_ibu" class="form-control" value="{{ $item->nama_ibu }}" required>
                                </div>
                                <div class="mb-3">
                                    <label>No HP</label>
                                    <input type="text" name="no_hp" class="form-control" value="{{ $item->no_hp }}" required>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>


            <!-- Modal Hapus -->
            <div class="modal fade" id="hapusModal{{ $item->id }}" tabindex="-1" aria-labelledby="hapusModalLabel{{ $item->id }}" aria-hidden="true">
            <div class="modal-dialog">
                <form action="{{ route('management_siswa.destroy', $item->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="hapusModalLabel{{ $item->id }}">Hapus Siswa</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                    </div>
                    <div class="modal-body">
                    <p>Apakah Anda yakin ingin menghapus <strong>{{ $item->nama_lengkap }}</strong>?</p>
                    </div>
                    <div class="modal-footer">
                    <button type="submit" class="btn btn-danger">Hapus</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    </div>
                </div>
                </form>
            </div>
            </div>

            
            @endforeach
        </tbody>
    </table>

    {{-- Tambah siswa baru --}}
    <button class="btn btn-success mt-3" data-bs-toggle="modal" data-bs-target="#tambahModal">
        <i class="bi bi-plus-circle me-1"></i> Tambah Siswa
    </button>

</div>

<!-- Modal Tambah Siswa -->
<div class="modal fade" id="tambahModal" tabindex="-1" aria-labelledby="tambahModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="{{ route('management_siswa.store') }}" method="POST">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tambahModalLabel">Tambah Siswa</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label>Nama Lengkap</label>
                        <input type="text" name="nama_lengkap" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>NIK</label>
                        <input type="text" name="nik" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Tempat Lahir</label>
                        <input type="text" name="tempat_lahir" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Tanggal Lahir</label>
                        <input type="date" name="tanggal_lahir" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Jenis Kelamin</label>
                        <select name="jenis_kelamin" class="form-control" required>
                            <option value="">-- Pilih --</option>
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label>Alamat</label>
                        <textarea name="alamat" class="form-control" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label>Nama Ayah</label>
                        <input type="text" name="nama_ayah" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Nama Ibu</label>
                        <input type="text" name="nama_ibu" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>No HP</label>
                        <input type="text" name="no_hp" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection
