<!-- resources/views/dashboard.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mb-4">Dashboard</h1>

        <!-- Tampilkan pesan sukses jika ada -->
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <!-- Tabel Data Murid -->
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Jenis Kelamin</th>
                    <th>Kelas</th>
                    <th>Foto</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($murids as $murid)
                    <tr>
                        <td>{{ $murid->nama }}</td>
                        <td>{{ $murid->alamat }}</td>
                        <td>{{ $murid->jenis_kelamin }}</td>
                        <td>{{ $murid->kelas }}</td>
                        <td>
                            @if($murid->foto)
                                <img src="{{ asset('storage/' . $murid->foto) }}" alt="Foto Murid" width="50" class="img-thumbnail">
                            @else
                                <p>Tidak ada foto</p>
                            @endif
                        </td>
          
                        <td>
                            <a href="{{ route('murid.detailuser', $murid->id) }}" class="btn btn-info btn-sm">Detail</a>
                        </td>

                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
