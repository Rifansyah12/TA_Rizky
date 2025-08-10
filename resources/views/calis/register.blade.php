@extends('calis.layouts.app')

@section('title', 'Register Calon Siswa')

@section('content')

<style>
  .container_Register {
    min-height: 100vh;
    background-image: url('{{ asset('img/bg_loginCalis.jpg') }}');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
  }
</style>

<div class="container_Register d-flex justify-content-center align-items-center">
    <div class="card shadow-sm" style="width: 400px;">
        <div class="card-body">
            <h2 class="text-center mb-4">Register Calon Siswa</h2>

            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <form action="{{ route('RegisterCalis') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Nama</label>
                    <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}" required>
                    @error('name') <div class="text-danger">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}" required>
                    @error('email') <div class="text-danger">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" id="password" name="password" class="form-control" required>
                    @error('password') <div class="text-danger">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3">
                    <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" required>
                </div>

                <button class="btn btn-primary w-100" type="submit">Register</button>
            </form>

            <p class="mt-3 text-center">Sudah punya akun? <a href="{{ route('LoginCalis') }}">Login di sini</a></p>
        </div>
    </div>
</div>

@endsection
