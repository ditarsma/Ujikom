@extends('layouts.app')

@section('content')
    <h1>Detail Murid</h1>

    <div class="card">
        <div class="card-body d-flex justify-content-between">
            <!-- Informasi murid di sebelah kiri -->
            <div>
                <h5 class="card-title">Nama: {{ $murid->nama }}</h5>
                <p class="card-text">Alamat: {{ $murid->alamat }}</p>
                <p class="card-text">Jenis Kelamin: {{ $murid->jenis_kelamin }}</p>
                <p class="card-text">Kelas: {{ $murid->kelas }}</p>
            </div>

            <!-- Foto murid di sebelah kanan -->
            <div>
                @if($murid->foto)
                    <img src="{{ asset('storage/' . $murid->foto) }}" alt="Foto Murid" width="200" class="img-thumbnail">
                @else
                    <p class="card-text">Tidak ada foto</p>
                @endif
            </div>
        </div>
    </div>

    <a href="{{ route('murid.index') }}" class="btn btn-primary mt-3">Kembali ke Daftar Murid</a>
@endsection
