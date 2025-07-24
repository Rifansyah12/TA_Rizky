@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Selamat datang, {{ Auth::user()->name }}</h1>
        <p>Anda login sebagai <strong>Admin</strong></p>
        <a href="{{ route('logout') }}">Logout</a>
    </div>
@endsection
