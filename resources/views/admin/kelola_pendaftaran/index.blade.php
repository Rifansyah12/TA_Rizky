@extends('admin.layouts.app')

@section('content')
<div class="container">
    <h4 class="mb-4 text-center">Data Pendaftar RA Arisalah</h4>

    <div class="card mb-4 shadow-sm">
        <div class="card-body">

            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <form method="GET" action="{{ route('kelola_pendaftaran.index') }}" class="mb-4">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <input type="text" name="keyword" class="form-control" placeholder="Cari nama siswa atau orang tua..." value="{{ request('keyword') }}">
                    </div>
                    <div class="col-md-3">
                        <select name="perPage" class="form-select" onchange="this.form.submit()">
                            <option value="5" {{ request('perPage') == 5 ? 'selected' : '' }}>5</option>
                            <option value="10" {{ request('perPage') == 10 ? 'selected' : '' }}>10</option>
                            <option value="25" {{ request('perPage') == 25 ? 'selected' : '' }}>25</option>
                            <option value="50" {{ request('perPage') == 50 ? 'selected' : '' }}>50</option>
                            <option value="100" {{ request('perPage') == 100 ? 'selected' : '' }}>100</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <button type="submit" class="btn btn-primary w-100">Cari</button>
                    </div>
                </div>
            </form>

            <div class="table-responsive" style="max-height: 400px; overflow-y: auto;">
                <table class="table table-bordered table-striped align-middle">
                    <thead class="table-dark text-center">
                        <tr>
                            <th>Nama Lengkap</th>
                            <th>NIK</th>
                            <th>Tempat & Tanggal Lahir</th>
                            <th>Jenis Kelamin</th>
                            <th>Alamat</th>
                            <th>Nama Ayah</th>
                            <th>Nama Ibu</th>
                            <th>No HP</th>
                            <th>Status</th>
                            <th>Konfirmasi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($data as $pendaftar)
                            <tr>
                                <td>{{ $pendaftar->nama_lengkap }}</td>
                                <td>{{ $pendaftar->nik }}</td>
                                <td>{{ $pendaftar->tempat_lahir }}, {{ $pendaftar->tanggal_lahir }}</td>
                                <td class="text-center">{{ $pendaftar->jenis_kelamin }}</td>
                                <td>{{ $pendaftar->alamat }}</td>
                                <td>{{ $pendaftar->nama_ayah }}</td>
                                <td>{{ $pendaftar->nama_ibu }}</td>
                                <td>
                                    <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $pendaftar->no_hp) }}" target="_blank">
                                        <i class="fab fa-whatsapp" style="color: green; margin-right: 5px;"></i>
                                        {{ $pendaftar->no_hp }}
                                    </a>
                                </td>
                                <td class="text-center">
                                    @if($pendaftar->status == 'diterima')
                                        <span class="badge bg-success">Diterima</span>
                                    @elseif($pendaftar->status == 'ditolak')
                                        <span class="badge bg-danger">Ditolak</span>
                                    @else
                                        <span class="badge bg-warning text-dark">Menunggu</span>
                                    @endif
                                </td>

<td>
                        @if($pendaftar->status == 'menunggu')
                        <form action="{{ route('kelola_pendaftaran.konfirmasi', $pendaftar->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('PUT')
                            <button type="submit" name="aksi" value="terima" class="btn btn-success btn-sm">Terima</button>
                            <button type="submit" name="aksi" value="tolak" class="btn btn-danger btn-sm">Tolak</button>
                        </form>
                        @else
                        <em>Terkonfirmasi</em>
                        @endif
                    </td>
                                <td class="text-center">
                                    <form action="{{ route('kelola_pendaftaran.hapus', $pendaftar->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="10" class="text-center">Data tidak ditemukan</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="d-flex justify-content-center mt-4">
                <div class="pagination">
                    {!! $data->appends(request()->query())->links('vendor.pagination.bootstrap-5') !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection