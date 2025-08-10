@extends('calis.layouts.app')

@section('title', 'Login Calon Siswa')

@section('content')


<style>
  .container_login {
    min-height: 100vh;
    background-image: url('{{ asset('img/bg_loginCalis.jpg') }}');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
  }
</style>
<div class="container_login d-flex justify-content-center align-items-center">
    <div class="card shadow-sm" style="width: 400px;">
        <div class="card-body">
            <h2 class="text-center mb-4">Login Calon Siswa</h2>

            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <form action="{{ route('LoginCalis') }}" method="POST">
                @csrf
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

                <button class="btn btn-primary w-100" type="submit">Login</button>
            </form>

            <p class="mt-3 text-center">Belum punya akun? <a href="{{ route('RegisterCalis') }}">Daftar di sini</a></p>
        </div>
    </div>
</div>
@endsection