<!-- resources/views/detailuser.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Detail Murid: {{ $murid->nama }}</h1>

    <div class="card">
        <div class="card-body d-flex justify-content-between">
            <div>
                <h5 class="card-title">Nama: {{ $murid->nama }}</h5>
                <p class="card-text">Alamat: {{ $murid->alamat }}</p>
                <p class="card-text">Jenis Kelamin: {{ $murid->jenis_kelamin }}</p>
                <p class="card-text">Kelas: {{ $murid->kelas }}</p>
            </div>

            <div>
                @if($murid->foto)
                    <img src="{{ asset('storage/' . $murid->foto) }}" alt="Foto Murid" width="200" class="img-thumbnail">
                @else
                    <p>Tidak ada foto</p>
                @endif
            </div>
        </div>
    </div>

    <a href="{{ route('dashboard') }}" class="btn btn-primary mt-3">Kembali ke Dashboard</a>
@endsection
