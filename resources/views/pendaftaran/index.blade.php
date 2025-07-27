@extends('layouts.app')

@section('content')

        <!-- Page Header End -->
        <div class="container-xxl py-5 page-header position-relative mb-5">
            <div class="container py-5">
                <h1 class="display-2 text-white animated slideInDown mb-4">Pendaftaran</h1>
                <nav aria-label="breadcrumb animated slideInDown">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page">PPDB</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- Page Header End -->

        <!-- Form Pendaftaran RA -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="bg-light rounded p-5">
                    <h2 class="mb-4 text-center">Formulir Pendaftaran RA Ar-risalah</h2>
    
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('pendaftaran.store') }}">
                        @csrf
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" name="nama_lengkap" class="form-control" id="nama_lengkap" placeholder="Nama Lengkap" required>
                                    <label for="nama_lengkap">Nama Lengkap Anak</label>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" name="nik" class="form-control" id="nik" placeholder="NIK Anak" required>
                                    <label for="nik">NIK Anak</label>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" name="tempat_lahir" class="form-control" id="tempat_lahir" placeholder="Tempat Lahir" required>
                                    <label for="tempat_lahir">Tempat Lahir</label>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="date" name="tanggal_lahir" class="form-control" id="tanggal_lahir" required>
                                    <label for="tanggal_lahir">Tanggal Lahir</label>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-floating">
                                    <select name="jenis_kelamin" class="form-select" id="jenis_kelamin" required>
                                        <option value="">-- Pilih Jenis Kelamin --</option>
                                        <option value="Laki-laki">Laki-laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
                                    <label for="jenis_kelamin">Jenis Kelamin</label>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" name="alamat" class="form-control" id="alamat" placeholder="Alamat Lengkap" required>
                                    <label for="alamat">Alamat Lengkap</label>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" name="nama_ayah" class="form-control" id="nama_ayah" placeholder="Nama Ayah" required>
                                    <label for="nama_ayah">Nama Ayah</label>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" name="nama_ibu" class="form-control" id="nama_ibu" placeholder="Nama Ibu" required>
                                    <label for="nama_ibu">Nama Ibu</label>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-floating">
                                    <input type="tel" name="no_hp" class="form-control" id="no_hp" placeholder="Nomor HP Aktif" required>
                                    <label for="no_hp">Nomor HP Orang Tua/Wali</label>
                                </div>
                            </div>

                            <div class="col-12">
                                <button class="btn btn-primary w-100 py-3" type="submit">Kirim Pendaftaran</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
@endsection