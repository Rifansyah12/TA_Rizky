@extends('admin.layouts.app')

@section('content')
<div class="container">
    <h4 class="mb-4">Data Pendaftar RA Arisalah</h4>

    <div class="card mb-4 shadow-sm">
        <div class="card-body">

        
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

            <form method="GET" action="{{ route('kelola_pendaftaran.index') }}">
                <div class="row align-items-center">
                    <div class="col-md-10">
                        <input type="text" name="keyword" class="form-control" placeholder="Cari nama siswa atau orang tua..." value="{{ request('keyword') }}">
                    </div>
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-primary w-100">Cari</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <table class="table table-bordered table-striped">
       <thead class="table-dark">
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
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
        @foreach($data as $pendaftar)
                <tr>
                    <td>{{ $pendaftar->nama_lengkap }}</td>
                    <td>{{ $pendaftar->nik }}</td>
                    <td>{{ $pendaftar->tempat_lahir }}, {{ $pendaftar->tanggal_lahir }}</td>
                    <td>{{ $pendaftar->jenis_kelamin }}</td>
                    <td>{{ $pendaftar->alamat }}</td>
                    <td>{{ $pendaftar->nama_ayah }}</td>
                    <td>{{ $pendaftar->nama_ibu }}</td>
                    <td>
                        <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $pendaftar->no_hp) }}" target="_blank">
                            <i class="fab fa-whatsapp" style="color: green; margin-right: 5px;"></i>
                            {{ $pendaftar->no_hp }}
                        </a>
                    </td>


                    <td>
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
                </tr>
            @endforeach
        </tbody>

    </table>
</div>
@endsection
